<?php
namespace App\Services;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class AIService {
    protected $client;
    protected $apiKey;

    public function __construct() {
        $this->client = new Client(['base_uri' => 'https://generativelanguage.googleapis.com/']);
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function evaluateFormData($data, $locale) {
        try {
            $prompt = $locale === 'en'
                ? "Summarize the following business metrics in English for digital transformation recommendations: " . $data['metrics']
                : "Résumez les métriques commerciales suivantes en français pour des recommandations de transformation numérique : " . $data['metrics'];
            Log::info('Gemini prompt sent', ['prompt' => $prompt]);
            $response = $this->client->post('v1beta/models/gemini-2.5-flash:generateContent?key=' . $this->apiKey, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ],
                    'generationConfig' => [
                        'thinkingConfig' => [
                            'thinkingBudget' => 0
                        ]
                    ]
                ],
            ]);
            $result = json_decode($response->getBody(), true);
            return $result['candidates'][0]['content']['parts'][0]['text'] ?? 'No summary generated.';
        } catch (RequestException $e) {
            Log::error('Gemini API error: ' . $e->getMessage());
            return 'Error processing data.';
        }
    }
}