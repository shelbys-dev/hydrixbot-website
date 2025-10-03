<?php

namespace App\Http\Controllers;

use App\Models\Doc;

class DocController extends Controller
{
    public function index()
    {
        $docs = Doc::orderBy('position')->get();
        return view('docs.index', compact('docs'));
    }

    public function show($slug)
    {
        $doc = Doc::where('slug', $slug)->firstOrFail();
        $docs = Doc::orderBy('position')->get(); // pour sidebar
        return view('docs.show', compact('doc', 'docs'));
    }
}
