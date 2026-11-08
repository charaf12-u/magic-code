<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Home page.
     */
    public function home(): View
    {
        return view('pages.home', [
            'title' => 'Magic Code — Freelance Digital Studio au Maroc | Web, Mobile, Data & AI',
            'metaDescription' => 'Studio digital freelance au Maroc. Conception et développement de sites web Laravel, applications mobiles, pipelines de données et solutions IA sur mesure.',
            'featuredServices' => ServiceRepository::featured(4),
            'featuredProjects' => ProjectRepository::featured(3),
        ]);
    }

    /**
     * About page.
     */
    public function about(): View
    {
        return view('pages.about', [
            'title' => 'À Propos de Magic Code — Philosophie & Vision Digitale',
            'metaDescription' => 'Découvrez Magic Code : un studio freelance axé sur la clarté technique, la performance et l\'accompagnement sur mesure pour vos produits digitaux.',
        ]);
    }

    /**
     * Legal notices.
     */
    public function legal(): View
    {
        return view('legal.legal', [
            'title' => 'Mentions Légales — Magic Code',
            'metaDescription' => 'Mentions légales et informations éditoriales du studio digital Magic Code.',
        ]);
    }

    /**
     * Privacy policy.
     */
    public function privacy(): View
    {
        return view('legal.privacy', [
            'title' => 'Politique de Confidentialité — Magic Code',
            'metaDescription' => 'Politique de confidentialité et protection des données personnelles sur le site de Magic Code.',
        ]);
    }

    /**
     * Dynamic sitemap.xml.
     */
    public function sitemap(): Response
    {
        $urls = [
            ['loc' => route('home'), 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['loc' => route('services'), 'changefreq' => 'monthly', 'priority' => '0.9'],
            ['loc' => route('projects'), 'changefreq' => 'weekly', 'priority' => '0.9'],
            ['loc' => route('about'), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('contact'), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('privacy'), 'changefreq' => 'yearly', 'priority' => '0.2'],
            ['loc' => route('legal'), 'changefreq' => 'yearly', 'priority' => '0.2'],
        ];

        // Add all dynamic service pages
        foreach (ServiceRepository::all() as $service) {
            $urls[] = [
                'loc' => route('services.show', $service['slug']),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ];
        }

        // Add all dynamic project pages
        foreach (ProjectRepository::all() as $project) {
            $urls[] = [
                'loc' => route('projects.show', $project['slug']),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ];
        }

        return response()
            ->view('sitemap', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }
}
