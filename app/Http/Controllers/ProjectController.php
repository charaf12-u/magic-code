<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index(): View
    {
        return view('pages.projects', [
            'title' => __('site.nav_projects') . ' — Magic Code',
            'metaDescription' => __('site.projects_page_lead'),
            'projects' => ProjectRepository::all(),
        ]);
    }

    /**
     * Display the specified project.
     */
    public function show(string $slug): View
    {
        $project = ProjectRepository::findOrFail($slug);

        return view('projects.show', [
            'title' => "{$project['title']} — Étude de cas | Magic Code",
            'metaDescription' => $project['short_description'],
            'project' => $project,
            'otherProjects' => array_filter(ProjectRepository::all(), fn ($p) => $p['slug'] !== $slug),
        ]);
    }
}

