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
            'title' => 'Magic Code — ' . __('site.slogan'),
            'metaDescription' => __('site.meta_description'),
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
            'title' => __('site.nav_about') . ' — Magic Code',
            'metaDescription' => __('site.meta_description'),
        ]);
    }

    /**
     * Legal notices.
     */
    public function legal(): View
    {
        return view('legal.legal', [
            'title' => __('site.legal_notice') . ' — Magic Code',
            'metaDescription' => __('site.legal_page_desc'),
        ]);
    }

    /**
     * Privacy policy.
     */
    public function privacy(): View
    {
        return view('legal.privacy', [
            'title' => __('site.privacy_policy') . ' — Magic Code',
            'metaDescription' => __('site.privacy_page_desc'),
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
