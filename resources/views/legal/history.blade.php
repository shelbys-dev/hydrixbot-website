@extends('layouts.app')

@section('title', 'Historique des versions')

@section('content')
    <h1 class="text-2xl font-bold mb-6">
        Historique des versions</h1>

    <h2 class="text-xl font-semibold mb-2">Conditions d’utilisation</h2>
    <ul class="mb-6">
        @foreach ($tos as $v)
            <li><strong>v{{ $v->version }}</strong> —
                {{ optional($v->effective_date)->translatedFormat('d F Y') ?? 'N/A' }} @if ($v->is_active)
                    <span class="text-green-600">(active)</span>
                @endif
            </li>
        @endforeach
    </ul>

    <h2 class="text-xl font-semibold mb-2">Politique de confidentialité</h2>
    <ul>
        @foreach ($privacy as $v)
            <li><strong>v{{ $v->version }}</strong> —
                {{ optional($v->effective_date)->translatedFormat('d F Y') ?? 'N/A' }} @if ($v->is_active)
                    <span class="text-green-600">(active)</span>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
