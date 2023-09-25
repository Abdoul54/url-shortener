<?php

namespace App\Http\Controllers;

use App\Models\UrlMapping;
use Illuminate\Http\Request;

class URLShortenerController extends Controller
{
    public function shortenURL(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $originalURL = $request->input('original_url');

        $existingMapping = UrlMapping::where('original_url', $originalURL)->first();

        if ($existingMapping) {
            return response()->json([
                'short_url' => $existingMapping->short_url,
                'mapping_id' => $existingMapping->id,
            ]);
        }

        $shortURL = $this->generateShortURL();

        $mapping = UrlMapping::create([
            'original_url' => $originalURL,
            'short_url' => $shortURL,
        ]);

        return response()->json([
            'short_url' => $shortURL,
            'mapping_id' => $mapping->id,
        ]);
    }


    private function generateShortURL()
    {
        $shortURL = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 6);
        $shortURL = "http://localhost:8000/" . $shortURL;

        return $shortURL;
    }

    public function redirectShortURL($shortURL)
    {
        $shortURL = "http://localhost:8000/" . $shortURL;
        $mapping = UrlMapping::where('short_url', $shortURL)->first();

        if (!$mapping) {
            abort(404);
        }

        $mapping->click_count++;
        $mapping->save();

        return redirect()->away($mapping->original_url);
    }

    public function getShortenedURLs()
    {
        $shortenedURLs = UrlMapping::all()
            ->sortByDesc('click_count');

        return response()->json(['shortenedURLs' => $shortenedURLs]);
    }
}
