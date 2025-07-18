<?php
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
        \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class
    ]
], function () {
    Route::get('/', [FormController::class, 'index'])->name('home');
    Route::post('/submit', [FormController::class, 'submit'])->name('form.submit');
    Route::get('/landing', [FormController::class, 'landing'])->name('landing');
    Route::get('/privacy', function () {
        return view('privacy', ['locale' => LaravelLocalization::getCurrentLocale()]);
    })->name('privacy');
    Route::get('/download/{pdf}', [FormController::class, 'download'])->name('download');
});