<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Ads;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function scrapeAds()
    {
        $output = [];
        $return_var = 0;

        // Execute the Node.js script
        exec('node scripts/scrape.js 2>&1', $output, $return_var);

        // Display debugging results
        foreach ($output as $line) {
            echo $line . "<br>";
        }

        // Decode the JSON output into a PHP array
        $json_output = implode("", $output);
        $json_output = str_replace('Page loaded', '', $json_output);
        $ads = json_decode($json_output, true);

        // Check if json_decode failed
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'JSON decode error: ' . json_last_error_msg()], 500);
        }

        // Check if $ads is null or not an array
        if (!is_array($ads)) {
            return response()->json(['error' => 'Invalid JSON data'], 500);
        }

        // Insert the ads into the database
        foreach ($ads as $item) {
            Ads::create([
                'imageUrl' => $item['imageUrl'] ?? null,
                'title' => $item['title'] ?? null,
                'price' => $item['price'] ?? null,
                'location' => $item['location'] ?? null,
                'rooms' => $item['rooms'] ?? null,
                'size' => $item['size'] ?? null,
                'type' => $item['type'] ?? null,
                'endDate' => $item['endDate'] ?? null,
                'description' => $item['description'] ?? null, // New field for description
            ]);
        }

        return response()->json(['message' => 'Ads inserted successfully']);
    }

    public function showAd($id)
    {
        $ad = Ads::find($id);

        if (!$ad) {
            return redirect()->back()->with('error', 'Ad not found');
        }

        return view('Ads.ad_details', ['ad' => $ad]);
    }
}