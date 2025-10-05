@extends('layouts.app')

@section('title', 'Documentation')
@section('content')
    <div class="container">
        <h1>Documentation</h1>

        <div class="layout">
            <aside>
                @include('docs.components.search-form')
                
                <nav aria-label="Sommaire" class="nav">
                    @foreach ($docs as $doc)
                        <a href="{{ route('docs.show', $doc->slug) }}" class="text-blue-600 hover:underline">
                            {{ $doc->title }}
                        </a>
                    @endforeach
                </nav>
            </aside>

            <main class="card">
                <section class="section">
                    Bienvenue dans la documentation de Hydrix Bot. Sélectionnez un sujet dans le menu de gauche pour
                    commencer.
                </section>
            </main>
        </div>
    </div>
@endsection
