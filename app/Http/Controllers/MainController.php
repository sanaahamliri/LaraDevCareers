<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class MainController extends Controller
{
    public function scrapeAdvertisements()
    {
        // Initialiser Guzzle
        $client = new Client();

        // Effectuer une requête GET à l'URL
        $response = $client->request('GET', 'https://amsterdam.mijndak.nl/Woningaanbod');

        // Initialiser un tableau pour les annonces
        $ads = [];

        // Vérifier que la requête a réussi
        if ($response->getStatusCode() == 200) {
            // Récupérer le contenu HTML de la réponse
            $htmlContent = $response->getBody()->getContents();

            // Analyser le contenu HTML avec Symfony DomCrawler
            $crawler = new Crawler($htmlContent);

            // Trouver les éléments contenant les annonces
            $crawler->filter('.251887')->each(function (Crawler $node) use (&$ads) {
                // Adapter les sélecteurs CSS en fonction de la structure HTML
                $title = $node->filter('.display-flex align-items-center justify-content-space-between')->text('No title'); // Remplacer 'title-selector' par le sélecteur réel pour le titre
                $price = $node->filter('.columns-item')->text('No price'); // Remplacer 'price-selector' par le sélecteur réel pour le prix

                // Ajouter l'annonce au tableau
                $ads[] = [
                    'title' => $title,
                    'price' => $price,
                ];
            });
        }

        // Passer les annonces à la vue
        return view('scraper_results', ['ads' => $ads]);
    }
}
