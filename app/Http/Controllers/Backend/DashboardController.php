<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Template; // Ensure you import the Template model

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Fetch all templates from the database
        $templates = Template::all();

        // Pass the templates to the view
        return view('backend.dashboard', compact('templates'));
    }
}
