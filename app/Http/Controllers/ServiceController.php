<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceRepository;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index(): View
    {
        return view('pages.services', [
            'title' => 'Nos Services & Expertises — Web, Mobile, Data, IA & SEO | Magic Code',
            'metaDescription' => 'Découvrez toutes les expertises digitales de Magic Code : développement web & Laravel, applications mobiles, data engineering, IA et optimisation SEO.',
            'services' => ServiceRepository::all(),
        ]);
    }

    /**
     * Display the specified service.
     */
    public function show(string $slug): View
    {
        $service = ServiceRepository::findOrFail($slug);

        return view('services.show', [
            'title' => "{$service['title']} — Service Magic Code",
            'metaDescription' => $service['short_description'],
            'service' => $service,
            'otherServices' => array_filter(ServiceRepository::all(), fn ($s) => $s['slug'] !== $slug),
        ]);
    }
}

