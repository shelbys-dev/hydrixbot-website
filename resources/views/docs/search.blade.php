@extends('layouts.app')

@section('title', 'Résultats pour "' . e($q) . '"')

@section('content')
    <div class="container">
        <div class="layout">
            <aside>
                @include('docs.components.search-form')

                <h2 class="font-semibold mb-2">Sommaire</h2>

                <nav aria-label="Sommaire" class="nav">
                    @foreach ($docs as $d)
                        <a href="{{ route('docs.show', $d->slug) }}">{{ $d->title }}</a>
                    @endforeach
                </nav>
            </aside>

            <main class="card">
                <h1>Résultats pour « {{ e($q) }} »</h1>

                @if ($results->total() === 0)
                    <p>Aucun résultat.</p>
                @else
                    <p>{{ $results->total() }} résultat(s)</p>

                    <ul>
                        @foreach ($results as $r)
                            <li class="border rounded p-4">
                                <a href="{{ route('docs.show', $r->slug) }}"
                                    class="text-blue-700 hover:underline text-lg font-semibold">
                                    {!! $r->highlighted_title !!}
                                </a>
                                <p class="mt-2 text-sm text-gray-700">{!! $r->highlighted_snippet !!}</p>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-6">
                        {{ $results->links() }}
                    </div>
                @endif
            </main>
        </div>
    </div>
@endsection
