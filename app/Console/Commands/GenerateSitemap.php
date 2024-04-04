<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use App\Models\Article;


class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate sitemap for search engines';

    public function handle()
    {
       
   $sitemap = Sitemap::create();

        // Add your homepage URL first
        $sitemap->add(route('welcome'));

        // Fetch dynamic URLs from database and add them to the sitemap
        $articles = Article::all(); // Example: Fetch all posts from 'posts' table
        foreach ($articles as $article) {

//dd($article);


            $sitemap->add(route('articles.showslug', $article->slug)); // Assuming you have a route for individual posts
        }

        // Write sitemap to file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');













/*

        SitemapGenerator::create(config('app.url'))
         ->add('/'); // Add your homepage first

         // Fetch dynamic URLs from database and add them to the sitemap
        $articles = Article::all(); // Example: Fetch all posts from 'posts' table
        foreach ($articles as $article) {
            SitemapGenerator::add(route('articles.show', $articles->slug)); // Assuming you have a route for individual posts
        }

        SitemapGenerator::writeToFile(public_path('sitemap.xml'));
        
  //          ->writeToFile(public_path('sitemap.xml'));
        
        $this->info('Sitemap generated successfully.');

        */
    }
}