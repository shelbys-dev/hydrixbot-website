<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string)$request->query('q', ''));

        // Sidebar (sommaire)
        $docs = Doc::orderBy('position')->get();

        if ($q === '') {
            // Affichage normal (pas de recherche)
            return view('docs.index', [
                'docs' => $docs,
                'q'    => $q,
                'results' => null,
            ]);
        }

        // Recherche : titre + contenu (LIKE)
        $results = Doc::query()
            ->where(function ($qq) use ($q) {
                $qq->where('title', 'like', "%{$q}%")
                   ->orWhere('content', 'like', "%{$q}%");
            })
            ->orderBy('position')
            ->paginate(10)
            ->appends(['q' => $q]); // garde le terme dans la pagination

        // Préparer un extrait propre + surlignage du terme
        $results->getCollection()->transform(function ($doc) use ($q) {
            $plain = trim(Str::of(strip_tags($doc->content))->squish());
            // Cherche la 1ère occurrence pour centrer l’extrait
            $pos = stripos($plain, $q);
            $start = $pos !== false ? max(0, $pos - 60) : 0;
            $snippet = mb_substr($plain, $start, 180);

            // Surligner
            $safeQ = preg_quote($q, '/');
            $highlight = function ($text) use ($safeQ) {
                return preg_replace('/('.$safeQ.')/i', '<mark>$1</mark>', e($text));
            };

            $doc->highlighted_title = $highlight($doc->title);
            $doc->highlighted_snippet = $highlight($snippet). (mb_strlen($plain) > $start+180 ? '…' : '');

            return $doc;
        });

        return view('docs.search', [
            'q'       => $q,
            'docs'    => $docs,    // sidebar
            'results' => $results, // pagination + snippets
        ]);
    }

    public function show($slug)
    {
        $doc  = Doc::where('slug',$slug)->firstOrFail();
        $docs = Doc::orderBy('position')->get();

        return view('docs.show', compact('doc','docs'));
    }
}

