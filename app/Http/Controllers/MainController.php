<?php

namespace App\Http\Controllers;

use App\Models\ads;
use Illuminate\Http\Request;
use App\Models\Property;

class MainController extends Controller
{
    public function scrapeAds()
    {
        $output = [];
        $return_var = 0;

        // Exécuter le script Node.js
        exec('node scripts/scrape.js 2>&1', $output, $return_var);

        // Afficher les résultats de débogage
        foreach ($output as $line) {
            echo $line . "<br>";
        }


        // Décoder la sortie JSON en un tableau PHP
        $json_output = implode("", $output);
        $json_output = str_replace('Page loaded', '', $json_output);
        $ads = json_decode($json_output, true);


        // Insérer les annonces dans la base de données
        foreach ($ads as $item) {
            ads::create([
                'imageUrl' => $item['imageUrl'],
                'title' => $item['title'],
                'price' => $item['price']
            ]);
        }

        return response()->json(['message' => 'Properties inserted successfully']);
    }
}
