@extends('layouts.app')

@section('title', $doc->title)
@section('content')
    <div class="container">
        <div class="layout">
            <aside>
                <nav aria-label="Sommaire" class="nav">
                    @foreach ($docs as $d)
                        <a href="{{ route('docs.show', $d->slug) }}"
                            class="{{ $doc->id === $d->id ? 'font-bold text-blue-600' : '' }}">
                            {{ $d->title }}
                        </a>
                    @endforeach
                </nav>
            </aside>
            <main class="card">
                <span class="badge">Dernière mise à jour : 28/09/2025</span>
                <section class="section">
                    <h1>{{ $doc->title }}</h1>
                    {!! $doc->content !!}
                </section>
            </main>
        </div>
    </div>
@endsection
