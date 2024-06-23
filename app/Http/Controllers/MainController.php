<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $ads = json_decode(implode("\n", $output), true);

        // Afficher les résultats pour déboguer

        // Vous pouvez également retourner une vue avec les annonces
        // return view('ads', ['ads' => $ads]);
    }
}