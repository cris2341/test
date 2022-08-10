<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Goutte\Client;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    private $result = array();
    public function scraper()
    {
        $client = new Client();
        $url = 'https://www.bestjobs.eu/ro/locuri-de-munca-in-bucuresti/symfony';
        $page = $client->request('GET',$url);
      


         $page->filter('.job-card')->each(function($node) {
            $job = new Job;
            $job->title = $node->filter('span.d-none')->text();
            $job->company = $node->filter('div.h6 > small')->text();
             if($node->filter('div.d-flex > a')->text() != '')
              {
                $job->location = $node->filter('div.d-flex > a')->text();
            } else {
                $job->location = 'Bucuresti';
            }
            $job->description = "YYYYYYYYY"; 
            $job->save();         
        });

    }
}
