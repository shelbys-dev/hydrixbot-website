<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $__env->yieldContent('title', 'Hydrix Bot'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Hydrix Bot — site officiel'); ?>" />
    <!-- Open Graph / Twitter -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Hydrix Bot — Le bot Discord simple, utile et sécurisé" />
    <meta property="og:description"
        content="Modération, automatisation et outils communautaires. Installez-le en quelques clics." />
    <meta property="og:image" content="<?php echo e(asset('assets/img/logo-800.webp')); ?>" />
    <meta property="og:site_name" content="Hydrix Bot" />
    <meta property="og:url" content="https://hydrixbot.shelbydev.fr/" />
    <meta property="og:locale" content="fr_FR" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@HydrixBot" />
    <meta name="twitter:title" content="Hydrix Bot — Le bot Discord simple, utile et sécurisé" />
    <meta name="twitter:description"
        content="Modération, automatisation et outils communautaires. Installez-le en quelques clics." />

    <link rel="manifest" href="/manifest.json">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/nav.css')); ?>">
    <?php if(Route::is('home')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/index.css')); ?>">
    <?php elseif(Route::is('docs')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/docs.css')); ?>">
    <?php elseif(Route::is('tos') || Route::is('privacy')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/terms.css')); ?>">
    <?php endif; ?>

    <link rel="apple-touch-icon" href="<?php echo e(asset('assets/img/logo-800.png')); ?>" />
    <link rel="icon" type="image/avif" href="<?php echo e(asset('assets/img/logo-800.avif')); ?>" />
    <link rel="icon" type="image/webp" href="<?php echo e(asset('assets/img/logo-800.webp')); ?>" />
    <link rel="icon" href="<?php echo e(asset('assets/img/logo-800.webp')); ?>" />
</head>

<body class="min-h-screen antialiased">
    <header>
        <?php echo $__env->make('partials.nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </header>

    <main><?php echo $__env->yieldContent('content'); ?></main>

    <footer>
        <small>© <?php echo e(date('Y')); ?> ShelbyDev — Hydrix Bot</small>
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
</body>

</html>
<?php /**PATH C:\Users\pc\Documents\dev\Laravel\hydrixbot\resources\views/layouts/app.blade.php ENDPATH**/ ?>