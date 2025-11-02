<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Hydrix Bot')</title>
    <meta name="description" content="@yield('meta_description', 'Hydrix Bot — site officiel')" />
    <!-- Open Graph / Twitter -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Hydrix Bot — Le bot Discord simple, utile et sécurisé" />
    <meta property="og:description"
        content="Modération, automatisation et outils communautaires. Installez-le en quelques clics." />
    <meta property="og:image" content="{{ asset('assets/img/logo-800.webp') }}" />
    <meta property="og:site_name" content="Hydrix Bot" />
    <meta property="og:url" content="https://hydrixbot.shelbydev.fr/" />
    <meta property="og:locale" content="fr_FR" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@HydrixBot" />
    <meta name="twitter:title" content="Hydrix Bot — Le bot Discord simple, utile et sécurisé" />
    <meta name="twitter:description"
        content="Modération, automatisation et outils communautaires. Installez-le en quelques clics." />

    <link rel="manifest" href="/manifest.json">

    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    @if (Route::is('home'))
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    @elseif (Route::is('docs', 'docs.show', 'docs.search'))
        <link rel="stylesheet" href="{{ asset('assets/css/docs.css') }}">
    @elseif (Route::is('tos') || Route::is('privacy') || Route::is('legal.history'))
        <link rel="stylesheet" href="{{ asset('assets/css/terms.css') }}">
    @endif

    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo-800.png') }}" />
    <link rel="icon" type="image/avif" href="{{ asset('assets/img/logo-800.avif') }}" />
    <link rel="icon" type="image/webp" href="{{ asset('assets/img/logo-800.webp') }}" />
    <link rel="icon" href="{{ asset('assets/img/logo-800.webp') }}" />
</head>

<body class="min-h-screen antialiased">
    <header>
        @include('partials.nav')
    </header>

    <main>@yield('content')</main>

    <footer>
        <div class="footer-flex">
            <small>© {{ date('Y') }} ShelbyDev — Hydrix Bot. Tous droits réservés.</small>
            <nav aria-label="Liens légaux">
                <a href="{{ route('tos') }}" class="muted">Conditions d'utilisation</a>
                <a href="{{ route('privacy') }}" class="muted">Politique de confidentialité</a>
                <a href="#" class="muted">Contact</a>
            </nav>
        </div>
    </footer>

    <!-- Cookie consent minimal -->
    <div id="cookie" class="cookie" role="dialog" aria-labelledby="cookie-title" aria-live="polite">
        <b id="cookie-title">🍪 Cookies & stockage local</b>
        <div class="muted">Nous utilisons un stockage local minimal (ex. préférences d'interface). Aucun traqueur
            externe
            sans votre accord.</div>
        <div class="row">
            <button type="button" class="decline" id="cookie-decline">Refuser</button>
            <button type="button" class="accept" id="cookie-accept">Tout accepter</button>
        </div>
    </div>

    <script>
        // Cookie/Consent
        const el = document.getElementById('cookie');
        const key = 'Hydrix-consent-v1';
        const stored = localStorage.getItem(key);
        if (!stored) {
            el.classList.add('show');
        }
        document.getElementById('cookie-accept').addEventListener('click', () => {
            localStorage.setItem(key, JSON.stringify({
                all: true,
                ts: Date.now()
            }));
            el.classList.remove('show');
        });
        document.getElementById('cookie-decline').addEventListener('click', () => {
            localStorage.setItem(key, JSON.stringify({
                all: false,
                ts: Date.now()
            }));
            el.classList.remove('show');
        });
    </script>

    @vite(['resources/js/app.js'])
</body>

</html>
