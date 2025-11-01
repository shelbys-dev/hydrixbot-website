<?php

namespace App\Http\Controllers;

use App\Support\FaqRepository;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $categories = FaqRepository::allPublished();

        $faqs = collect($categories)
            ->flatMap(fn($cat) => $cat['items'])
            ->where('is_featured', true)
            ->take(6)
            ->values();

        return view('home', compact('faqs')); // <-- on passe bien $faqs
    }
}
