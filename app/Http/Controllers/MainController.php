<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\ads;
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

        // Insert the ads into the database
        foreach ($ads as $item) {
            ads::create([
                'imageUrl' => $item['imageUrl'],
                'title' => $item['title'],
                'price' => $item['price'],
                'location' => $item['location'],
                'rooms' => $item['rooms'],
                'size' => $item['size'],
                'type' => $item['type'],
                'endDate' => $item['endDate'],
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
