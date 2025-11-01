<?php

namespace App\Http\Controllers;


use App\Support\FaqRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;


class FaqController extends Controller
{
    public function index(): View
    {
        $categories = FaqRepository::allPublished();
        return view('faq.index', compact('categories'));
    }


    public function api(): JsonResponse
    {
        return response()->json([
            'categories' => FaqRepository::allPublished(),
            'updated_at' => now()->toIso8601String(),
        ]);
    }
}
