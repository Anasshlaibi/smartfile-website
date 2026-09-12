<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $pages = Page::where('is_active', true)->latest()->get();
        $projects = Project::latest()->get();

        $content = view('sitemap', compact('pages', 'projects'))->render();

        return response($content, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
