<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use GuzzleHttp\Client;

class TranslateMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1); // Get the first segment of the URL as the language code

        if ($locale && in_array($locale, ['es'])) { // Check if the language code is supported
            $content = $this->translateContent($request->getContent(), $locale); // Translate content
            $request->replace(json_decode($content, true)); // Replace request content with translated content
        }

        return $next($request);
    }

    protected function translateContent($content, $targetLanguage)
    {
        $client = new Client();
        $apiKey = env('GOOGLE_TRANSLATE_API_KEY');

        $response = $client->request('POST', 'https://translation.googleapis.com/language/translate/v2', [
            'query' => [
                'key' => $apiKey,
                'target' => $targetLanguage,
            ],
            'form_params' => [
                'q' => $content,
            ]
        ]);

        return $response->getBody();
    }
}
