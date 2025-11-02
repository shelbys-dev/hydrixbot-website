

<?php $__env->startSection('title', 'Hydrix Bot — Accueil'); ?>
<?php $__env->startSection('meta_description', 'Hydrix Bot - modération, annonces, autorôle, XP, SQL-first'); ?>

<?php $__env->startSection('content'); ?>
    <!-- HERO -->
    <section class="hero" aria-labelledby="hero-title">
        <div class="grid cols-2 container-g">
            <div id="info" data-stagger-child>
                <span class="pill" aria-hidden="true" id="members-count" data-fade-up>0</span>

                <h1 id="hero-title" data-i>Le bot Discord simple, utile et sécurisé.</h1>
                <p class="lead" data-i>Modération, annonces automatiques, rôles, salons vocaux éphémères et plus encore.
                    Conçu
                    pour
                    une
                    configuration <em>SQL-first</em> et une transparence totale (ToS & Privacy dédiées).</p>
                <div class="hero-cta" data-i>
                    <a class="btn primary" href="/invite" rel="nofollow">🚀 Inviter Hydrix Bot</a>
                    <a class="btn ghost" href="<?php echo e(route('docs')); ?>">📚 Documentation</a>
                    <a class="btn ghost" href="<?php echo e(route('tos')); ?>">Conditions d'utilisation</a>
                </div>
                <div class="chips" role="list" aria-label="Points clés" data-i>
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
            <div class="panel hero-card" aria-label="Aperçu du bot" data-stagger-child>
                <div data-i>
                    <b>Exemple de commande</b>
                    <pre class="code" aria-label="Code exemple"><code>/clear membre:@shelby_dev nombre:100</code></pre>
                </div>
                <hr class="sep">
                <div data-i>
                    <b>Statuts dynamiques</b>
                    <p class="muted">Le bot alterne automatiquement des statuts (membres, /help, etc.).</p>
                </div>
                <hr class="sep">
                <div class="muted" data-i>Besoin d'un guide d'auto‑hébergement ? <a href="#faq">Voir la FAQ</a>.</div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section id="features" class="features container-g">
        <h2>Fonctionnalités clés</h2>

        <div class="features-grid" data-stagger-child>
            <article class="feat" aria-labelledby="f1" data-i>
                <h3 id="f1">Modération assistée</h3>
                <p>Réactions de signalement → mute temporaire, logs détaillés et rétablissement de rôle automatique.</p>
            </article>
            <article class="feat" aria-labelledby="f2" data-i>
                <h3 id="f2">Messages automatiques</h3>
                <p>Planifiez des annonces dans un salon : fréquence, contenu et canal configurables.</p>
            </article>
            <article class="feat" aria-labelledby="f3" data-i>
                <h3 id="f3">Autorole & Onboarding</h3>
                <p>Attribuez un rôle à l'arrivée, envoyez un message de bienvenue et centralisez vos liens utiles.</p>
            </article>
            <article class="feat" aria-labelledby="f4" data-i>
                <h3 id="f4">Salons vocaux éphémères</h3>
                <p>Création automatique d'un vocal privé, supprimé dès qu'il est vide.</p>
            </article>
            <article class="feat" aria-labelledby="f5" data-i>
                <h3 id="f5">SQL‑first</h3>
                <p>Configuration stockée en base (MySQL), robuste aux redémarrages & déploiements.</p>
            </article>
            <article class="feat" aria-labelledby="f6" data-i>
                <h3 id="f6">Confidentialité</h3>
                <p>Politique claire, aucune donnée superflue. Voir <a href="<?php echo e(route('privacy')); ?>">Confidentialité</a>.
                </p>
            </article>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how" class="how container-g" data-stagger-child>
        <h2>Installer le bot en 3 étapes</h2>
        <div class="steps">
            <div class="step" data-i><b>1. <br> Invitez le bot</b>
                <p>Utilisez le lien d'invitation avec les scopes requis (bot & applications.commands).</p>
            </div>
            <div class="step" data-i><b>2. <br> Configurez</b>
                <p>Ouvrez <span class="code">/config ui</span> pour définir les salons (logs, annonces), les rôles et
                    l'autorole.</p>
            </div>
            <div class="step" data-i><b>3. <br> Personnalisez</b>
                <p>Ajoutez vos liens via <span class="code">/config liens</span>, et planifiez vos messages automatiques.
                </p>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faqs" class="faq container-g">
        <h2>Questions fréquentes</h2>

        <div id="faq" data-stagger-child>
            <?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <details data-i>
                    <summary><?php echo e($faq['question']); ?></summary>
                    <p>
                        <?php echo e(\Illuminate\Support\Str::limit(strip_tags(\Illuminate\Support\Str::of($faq['answer_md'])->markdown()->toHtmlString()), 180)); ?>

                    </p>
                </details>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>Aucune question à la une pour le moment.</p>
            <?php endif; ?>

            <a class="btn primary" href="<?php echo e(route('faq.index')); ?>">Voir toute la FAQ</a>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pc\Documents\dev\Laravel\hydrixbot\resources\views/home.blade.php ENDPATH**/ ?>