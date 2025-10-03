

<?php $__env->startSection('title', 'Hydrix Bot — Accueil'); ?>
<?php $__env->startSection('meta_description', 'Hydrix Bot - modération, annonces, autorôle, XP, SQL-first'); ?>

<?php $__env->startSection('content'); ?>
    <!-- HERO -->
    <section class="hero container-g grid cols-2" aria-labelledby="hero-title">
        <div>
            <span class="pill" aria-hidden="true">Nouvelle version</span>
            <h1 id="hero-title">Le bot Discord simple, utile et sécurisé.</h1>
            <p class="lead">Modération, annonces automatiques, rôles, salons vocaux éphémères et plus encore. Conçu pour
                une
                configuration <em>SQL-first</em> et une transparence totale (ToS & Privacy dédiées).</p>
            <div class="hero-cta">
                <a class="btn primary" href="/invite" rel="nofollow">🚀 Inviter Hydrix Bot</a>
                <a class="btn" href="<?php echo e(route('docs')); ?>">📚 Documentation</a>
                <a class="btn ghost" href="<?php echo e(route('tos')); ?>">Conditions d'utilisation</a>
            </div>
            <div class="chips" role="list" aria-label="Points clés">
                <div class="check" role="listitem">✅ <b>Modération réactive</b> <span class="muted">/ mute auto au
                        signalement</span></div>
                <div class="check" role="listitem">✅ <b>Liens & annonces</b> <span class="muted">/ messages
                        planifiés</span>
                </div>
                <div class="check" role="listitem">✅ <b>Rôles & autoroles</b> <span class="muted">/ onboarding
                        propre</span>
                </div>
            </div>
        </div>
        <div class="panel hero-card" aria-label="Aperçu du bot">
            <div>
                <b>Exemple de commande</b>
                <pre class="code" aria-label="Code exemple"><code>/_config automessage 
  channel: #annonces
  message: "Bienvenue sur le serveur !"
  interval: 3600s</code></pre>
            </div>
            <div>
                <b>Statuts dynamiques</b>
                <p class="muted">Le bot alterne automatiquement des statuts (membres, /help, etc.).</p>
            </div>
            <div class="sep"></div>
            <div class="muted">Besoin d'un guide d'auto‑hébergement ? <a href="#faq">Voir la FAQ</a>.</div>
        </div>
    </section>

    <!-- FEATURES -->
    <section id="features" class="features container-g">
        <h2>Fonctionnalités clés</h2>
        <div class="features-grid">
            <article class="feat" aria-labelledby="f1">
                <h3 id="f1">Modération assistée</h3>
                <p>Réactions de signalement → mute temporaire, logs détaillés et rétablissement de rôle automatique.</p>
            </article>
            <article class="feat" aria-labelledby="f2">
                <h3 id="f2">Messages automatiques</h3>
                <p>Planifiez des annonces dans un salon : fréquence, contenu et canal configurables.</p>
            </article>
            <article class="feat" aria-labelledby="f3">
                <h3 id="f3">Autorole & Onboarding</h3>
                <p>Attribuez un rôle à l'arrivée, envoyez un message de bienvenue et centralisez vos liens utiles.</p>
            </article>
            <article class="feat" aria-labelledby="f4">
                <h3 id="f4">Salons vocaux éphémères</h3>
                <p>Création automatique d'un vocal privé, supprimé dès qu'il est vide.</p>
            </article>
            <article class="feat" aria-labelledby="f5">
                <h3 id="f5">SQL‑first</h3>
                <p>Configuration stockée en base (MySQL), robuste aux redémarrages & déploiements.</p>
            </article>
            <article class="feat" aria-labelledby="f6">
                <h3 id="f6">Confidentialité</h3>
                <p>Politique claire, aucune donnée superflue. Voir <a href="<?php echo e(route('privacy')); ?>">Confidentialité</a>.</p>
            </article>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how" class="how container-g">
        <h2>Installer le bot en 3 étapes</h2>
        <div class="steps">
            <div class="step"><b>1. Invitez le bot</b>
                <p>Utilisez le lien d'invitation avec les scopes requis (bot & applications.commands).</p>
            </div>
            <div class="step"><b>2. Configurez</b>
                <p>Ouvrez <code>/config</code> pour définir les salons (logs, annonces), les rôles et l'autorole.</p>
            </div>
            <div class="step"><b>3. Personnalisez</b>
                <p>Ajoutez vos liens via <code>/config liens</code>, et planifiez vos messages automatiques.</p>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="faq container-g">
        <h2>FAQ</h2>
        <details>
            <summary>Collectez-vous des données personnelles ?</summary>
            <p>Uniquement le strict nécessaire au fonctionnement du bot (IDs Discord, paramètres de serveur). Consultez la
                <a href="<?php echo e(route('privacy')); ?>">Politique de Confidentialité</a>.
            </p>
        </details>
        <details>
            <summary>Le bot est-il open‑source ?</summary>
            <p>Oui à partir de <a href="https://git.lehub.tf/ShelbyDev.fr/HydrixBot.git">ce dépôt Git.</a></p>
        </details>
        <details>
            <summary>Comment supprimer mes données ?</summary>
            <p>Vous pouvez retirer le bot à tout moment. Des procédures dédiées sont détaillées dans les <a
                    href="<?php echo e(route('tos')); ?>">Conditions</a> et la <a href="<?php echo e(route('privacy')); ?>">Confidentialité</a>.</p>
        </details>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pc\Documents\dev\Laravel\hydrixbot\resources\views/home.blade.php ENDPATH**/ ?>