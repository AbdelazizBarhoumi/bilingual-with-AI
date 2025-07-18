<?php
namespace App\Http\Controllers;
use App\Models\Submission;
use App\Services\AIService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FormController extends Controller {
    public function index() {
        return view('home');
    }

    public function submit(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'metrics' => 'required|string',
        ]);

        $locale = LaravelLocalization::getCurrentLocale();
        $aiResult = app(AIService::class)->evaluateFormData($data, $locale);

        $pdfPath = 'public/' . uniqid() . '.pdf';
        Pdf::loadView('pdf.output', ['data' => $aiResult, 'locale' => $locale])
            ->save(storage_path('app/' . $pdfPath));

        Submission::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'metrics' => $data['metrics'],
            'ai_result' => $aiResult,
            'pdf_path' => $pdfPath,
            'locale' => $locale,
        ]);

        return redirect()->route('landing', ['pdf' => $pdfPath]);
    }

    public function landing(Request $request) {
        return view('landing', ['pdfUrl' => $request->query('pdf')]);
    }

    public function download($pdf) {
        $filePath = storage_path('app/public/' . $pdf);
        if (file_exists($filePath)) {
            // Example: user_name_20250718.pdf
            $submission = Submission::where('pdf_path', 'public/' . $pdf)->first();
            $name = $submission ? $submission->name : 'report';
            $downloadName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $name)) . '_' . date('Ymd') . '.pdf';
            return response()->download($filePath, $downloadName, [
                'Content-Type' => 'application/pdf',
            ]);
        }
        abort(404);
    }
}