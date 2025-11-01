{{-- resources/views/faq/index.blade.php --}}
@extends('layouts.app')
@section('title', 'FAQ')
@section('meta_description', 'Foire aux questions - Hydrix Bot')

@section('content')
    <section id="faqs" class="container-g">
        <h1>Foire aux Questions</h1>

        <div id="faq">
            @foreach ($categories as $cat)
                <section id="{{ $cat['slug'] }}" class="container-g">
                    <h2>{{ $cat['name'] }}</h2>

                    <div class="space-y-3" x-data="{ open: null }">
                        @foreach ($cat['items'] as $i => $item)
                            <details>
                                <summary>{{ $item['question'] }}</summary>
                                <p>
                                    {!! Str::of($item['answer_md'])->markdown() !!}
                                </p>
                            </details>
                        @endforeach
                    </div>
                </section>
            @endforeach
        </div>
    </section>

    {{-- JSON-LD FAQPage for SEO --}}
    @push('structured-data')
        <script type="application/ld+json">
{!! json_encode([
'@context' => 'https://schema.org',
'@type' => 'FAQPage',
'mainEntity' => collect($categories)->flatMap(fn($cat) => collect($cat['items'])->map(fn($f) => [
'@type' => 'Question', 'name' => $f['question'],
'acceptedAnswer' => ['@type' => 'Answer', 'text' => Str::of($f['answer_md'])->markdown()->toHtmlString()],
]))->values()->all()
], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>
    @endpush
@endsection
