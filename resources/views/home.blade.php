@extends('layouts.app')

@section('title', 'Hydrix Bot — Accueil')
@section('meta_description', 'Hydrix Bot - modération, annonces, autorôle, XP, SQL-first')

@section('content')
    <!-- HERO -->
    <section class="hero" aria-labelledby="hero-title">
        <div class="grid cols-2 container-g">
            <div id="info" data-i>
                <span class="pill" aria-hidden="true" id="members-count" data-fade-up>0</span>

                <h1 id="hero-title" data-i>Le bot Discord simple, utile et sécurisé.</h1>
                <p class="lead" data-i>Modération, annonces automatiques, rôles, salons vocaux éphémères et plus encore.
                    Conçu
                    pour
                    une
                    configuration <em>SQL-first</em> et une transparence totale (ToS & Privacy dédiées).</p>
                <div class="hero-cta" data-i>
                    <a class="btn primary" href="/invite" rel="nofollow">🚀 Inviter Hydrix Bot</a>
                    <a class="btn ghost" href="{{ route('docs') }}">📚 Documentation</a>
                    <a class="btn ghost" href="{{ route('tos') }}">Conditions d'utilisation</a>
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
            <div class="panel hero-card" aria-label="Aperçu du bot" data-i>
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
    <section class="container-g" id="features">
        <h2>Fonctionnalités clés</h2>

        <div class="features-grid" data-stagger-child>
            <!-- Feature 1 : Modération assistée -->
            <article class="feat-card" data-i>
                <header>
                    <span class="feat-icon">🛡️</span>
                    <h3>Modération assistée</h3>
                    <p>Mute auto via réactions, logs détaillés, rétablissement de rôles.</p>
                </header>

                <!-- Aperçu (faux Discord) -->
                <figure class="discord-preview" data-lightbox="/assets/previews/moderation.mp4" title="Aperçu plein écran">
                    <div class="discord-window">
                        <div class="dw-titlebar">
                            <span class="dw-dot red"></span><span class="dw-dot yellow"></span><span
                                class="dw-dot green"></span>
                            <strong>#logs</strong>
                        </div>
                        <div class="dw-body">
                            <!-- message embed -->
                            <div class="msg">
                                <img class="avatar" src="/assets/previews/bot.png" alt="" loading="lazy">
                                <div class="bubble">
                                    <div class="meta">Hydrix Bot <span class="muted">aujourd’hui 14:22</span></div>
                                    <div class="embed">
                                        <div class="embed-color"></div>
                                        <div class="embed-main">
                                            <div class="embed-title">🚨 Signalement Modération</div>
                                            <p class="embed-desc">
                                                Le message de shelby_dev a été signalé plusieurs fois et traité.
                                            </p>
                                            <div class="embed-fields">
                                                <div class="field"><span>✅ Action</span><b>Utilisateur muté et message
                                                        supprimé</b></div>
                                                <div class="field"><span>📄 Message</span><b>test</b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
            </article>

            <article class="feat-card" data-i>
                <header>
                    <span class="feat-icon">⚡</span>
                    <h3>Boosts</h3>
                    <p>Envoie un message dans le salon désiré qui annonce que quelqu'un a boost ton serveur</p>
                </header>

                <!-- Aperçu (faux Discord) -->
                <figure class="discord-preview" data-lightbox="/assets/previews/moderation.mp4" title="Aperçu plein écran">
                    <div class="discord-window">
                        <div class="dw-titlebar">
                            <span class="dw-dot red"></span><span class="dw-dot yellow"></span><span
                                class="dw-dot green"></span>
                            <strong>#logs</strong>
                        </div>
                        <div class="dw-body">
                            <!-- message embed -->
                            <div class="msg">
                                <img class="avatar" src="/assets/previews/bot.png" alt="" loading="lazy">
                                <div class="bubble">
                                    <div class="meta">Hydrix Bot <span class="muted">aujourd’hui 14:22</span></div>
                                    <div class="embed">
                                        <div class="embed-color"></div>
                                        <div class="embed-main">
                                            <div class="embed-title">💎 Boost — configuration modifiée (UI)</div>
                                            <div class="embed-fields">
                                                <div class="field"><span>Salon</span><b>⁠「⚡」boost</b></div>
                                                <div class="field"><span>Par</span><b>shelby_dev</b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
            </article>

            <article class="feat-card" data-i>
                <header>
                    <span class="feat-icon">👤</span>
                    <h3>Autorole & Onboarding</h3>
                    <p>Attribuez un rôle à l'arrivée, envoyez un message de bienvenue et centralisez vos liens utiles.</p>
                </header>

                <!-- Aperçu (faux Discord) -->
                <figure class="discord-preview" data-lightbox="/assets/previews/moderation.mp4" title="Aperçu plein écran">
                    <div class="discord-window">
                        <div class="dw-titlebar">
                            <span class="dw-dot red"></span><span class="dw-dot yellow"></span><span
                                class="dw-dot green"></span>
                            <strong>#logs</strong>
                        </div>
                        <div class="dw-body">
                            <!-- message embed -->
                            <div class="msg">
                                <img class="avatar" src="/assets/previews/bot.png" alt="" loading="lazy">
                                <div class="bubble">
                                    <div class="meta">Hydrix Bot <span class="muted">aujourd’hui 14:22</span></div>
                                    <div class="embed">
                                        <div class="embed-color"></div>
                                        <div class="embed-main">
                                            <div class="embed-title">👤 Autorole configuré</div>
                                            <div class="embed-fields">
                                                <div class="field"><span>Rôle</span><b>「💳」MEMBRES</b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
            </article>

            <article class="feat-card" data-i>
                <header>
                    <span class="feat-icon">🎙️</span>
                    <h3>Salons vocaux éphémères</h3>
                    <p>Création automatique d'un vocal privé, supprimé dès qu'il est vide.</p>
                </header>

                <!-- Aperçu (faux Discord) -->
                <figure class="discord-preview" data-lightbox="/assets/previews/moderation.mp4"
                    title="Aperçu plein écran">
                    <div class="discord-window">
                        <div class="dw-titlebar">
                            <span class="dw-dot red"></span><span class="dw-dot yellow"></span><span
                                class="dw-dot green"></span>
                            <strong>#logs</strong>
                        </div>
                        <div class="dw-body">
                            <!-- message embed -->
                            <div class="msg">
                                <img class="avatar" src="/assets/previews/bot.png" alt="" loading="lazy">
                                <div class="bubble">
                                    <div class="meta">Hydrix Bot <span class="muted">aujourd’hui 14:22</span></div>
                                    <div class="embed">
                                        <div class="embed-color"></div>
                                        <div class="embed-main">
                                            <div class="embed-title">🎙️ Salon vocal configuré</div>
                                            <div class="embed-fields">
                                                <div class="field"><span>Salon</span><b>⁠🔒 Create your private</b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
            </article>

            <article class="feat-card" data-i>
                <header>
                    <span class="feat-icon">🖼️</span>
                    <h3>Bot Profile</h3>
                    <p>Personnalisez le bot à votre guise.</p>
                </header>

                <!-- Aperçu (faux Discord) -->
                <figure class="discord-preview" data-lightbox="/assets/previews/moderation.mp4"
                    title="Aperçu plein écran">
                    <div class="discord-window">
                        <div class="dw-titlebar">
                            <span class="dw-dot red"></span><span class="dw-dot yellow"></span><span
                                class="dw-dot green"></span>
                            <strong>#logs</strong>
                        </div>
                        <div class="dw-body">
                            <!-- message embed -->
                            <div class="msg">
                                <img class="avatar" src="/assets/previews/bot.png" alt="" loading="lazy">
                                <div class="bubble">
                                    <div class="meta">Hydrix Bot <span class="muted">aujourd’hui 14:22</span></div>
                                    <div class="embed">
                                        <div class="embed-color"></div>
                                        <div class="embed-main">
                                            <div class="embed-title">nick, avatar, bannière modifié(s)</div>
                                            <p class="embed-desc">
                                                shelby_dev a mis à jour le profil du Bot pour ce serveur.
                                            </p>
                                            <div class="embed-fields">
                                                <div class="field"><span>Changements</span><b>✅ Profil du bot mis à jour
                                                        sur Shelbydev → nick, avatar, bannière</b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
            </article>

            <article class="feat-card" data-i>
                <header>
                    <span class="feat-icon">👋</span>
                    <h3>Messages de bienvenue</h3>
                    <p>Recevez des notifications quand quelqu'un arrive dans votre serveur.</p>
                </header>

                <!-- Aperçu (faux Discord) -->
                <figure class="discord-preview" data-lightbox="/assets/previews/moderation.mp4"
                    title="Aperçu plein écran">
                    <div class="discord-window">
                        <div class="dw-titlebar">
                            <span class="dw-dot red"></span><span class="dw-dot yellow"></span><span
                                class="dw-dot green"></span>
                            <strong>#logs</strong>
                        </div>
                        <div class="dw-body">
                            <!-- message embed -->
                            <div class="msg">
                                <img class="avatar" src="/assets/previews/bot.png" alt="" loading="lazy">
                                <div class="bubble">
                                    <div class="meta">Hydrix Bot <span class="muted">aujourd’hui 14:22</span></div>
                                    <div class="embed">
                                        <div class="embed-color"></div>
                                        <div class="embed-main">
                                            <div class="embed-title">👋 Nouveau membre</div>
                                            <p class="embed-desc">
                                                shelby_dev a rejoint le serveur ! 🎉
                                            </p>
                                            <div class="embed-fields">
                                                <div class="field"><span>🔗 ID du membre</span><b>656203551755862016</b>
                                                </div>
                                                <div class="field"><span>📊 Nombre total de membres</span><b>100</b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
            </article>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how" class="how container-g" data-i>
        <h2>Installer le bot en 3 étapes</h2>
        <ol class="steps">
            <li data-step="1">Invitez le bot <br>
                <p>Utilisez le lien d'invitation avec les scopes requis (bot & applications.commands).</p>
            </li>
            <li data-step="2">Configurez <br>
                <p>Ouvrez <span class="code">/config ui</span> pour définir les salons (logs, annonces), les rôles et
                    l'autorole.</p>
            </li>
            <li data-step="3">Personnalisez <br>
                <p>Ajoutez vos liens via <span class="code">/config liens</span>, et planifiez vos messages automatiques.
                </p>
            </li>
        </ol>
    </section>

    <!-- FAQ -->
    <section id="faqs" class="faq container-g">
        <h2>Questions fréquentes</h2>

        <div id="faq" data-i>
            @forelse($faqs as $faq)
                <details data-i>
                    <summary>{{ $faq['question'] }}</summary>
                    <p>
                        {{ \Illuminate\Support\Str::limit(strip_tags(\Illuminate\Support\Str::of($faq['answer_md'])->markdown()->toHtmlString()), 180) }}
                    </p>
                </details>
            @empty
                <p>Aucune question à la une pour le moment.</p>
            @endforelse

            <a class="btn primary" href="{{ route('faq.index') }}">Voir toute la FAQ</a>
        </div>
    </section>

    <script>
        // Ouvre une vidéo/GIF plein écran si data-lightbox est présent
        document.addEventListener('click', (e) => {
            const fig = e.target.closest('[data-lightbox]');
            if (!fig) return;
            const src = fig.getAttribute('data-lightbox');

            const overlay = document.createElement('div');
            overlay.style.cssText = `
      position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,.8);
      display:flex; align-items:center; justify-content:center; padding:2rem; cursor:zoom-out;`;
            overlay.innerHTML =
                `
      <video src="${src}" autoplay muted playsinline loop style="max-width:min(1100px,95vw);max-height:85vh;border-radius:14px;box-shadow:0 20px 60px rgba(0,0,0,.6)"></video>`;
            overlay.addEventListener('click', () => overlay.remove());
            document.body.appendChild(overlay);
        });
    </script>

@endsection
