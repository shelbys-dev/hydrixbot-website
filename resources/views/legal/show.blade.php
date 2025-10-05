@php
    use League\CommonMark\CommonMarkConverter;
    $converter = new CommonMarkConverter([
        'html_input' => 'strip',
        'allow_unsafe_links' => false,
    ]);
    $html = $converter->convert($page->content)->getContent();
@endphp

@extends('layouts.app')
@section('title', $page->type === 'tos' ? 'Conditions d’utilisation' : 'Politique de confidentialité')

@section('content')
    <div class="container">
        <div class="card">
            <div class="header">
                <h1 class="text-3xl font-bold mb-2">
                    {{ $page->type === 'tos' ? 'Conditions d’utilisation' : 'Politique de confidentialité' }}
                </h1>

                <p>
                    Version {{ $page->version }}
                </p>

                <span class="badge">
                    Entrée en vigueur le {{ optional($page->effective_date)->translatedFormat('d F Y') ?? 'N/A' }}
                </span>

                @if (($history->count() ?? 0) > 1)
                    — <a href="{{ route('legal.history') }}" class="underline">Historique</a>
                @endif
            </div>

            {!! $html !!}
        </div>
    </div>
@endsection