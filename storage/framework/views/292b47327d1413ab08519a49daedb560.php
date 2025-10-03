

<?php $__env->startSection('title', 'Hydrix Bot — Documentation'); ?>
<?php $__env->startSection('meta_description', 'Hydrix Bot - Documentation, guide d\'installation et commandes'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="layout">
            <aside>
                <nav aria-label="Sommaire" class="nav">
                    <h3>Sommaire</h3>
                    <a href="#intro">1. Introduction</a>
                    <a href="#prerequis">2. Prérequis</a>
                    <a href="#installation">3. Installation</a>
                    <a href="#commandes">4. Commandes</a>
                    <a href="#configuration">5. Configuration</a>
                    <a href="#securite">6. Sécurité &amp; Données</a>
                    <a href="#depannage">7. Dépannage</a>
                    <a href="#versions">8. Journal des versions</a>
                    <a href="#contact">9. Support &amp; Contact</a>
                </nav>
            </aside>
            <main class="card">
                <div class="header">
                    <h1>Documentation</h1>
                    <span class="badge">Dernière mise à jour : 28/09/2025</span>
                </div>
                <section class="section" id="intro">
                    <h2>1. Introduction</h2>
                    <p><strong>Hydrix Bot</strong> fournit des outils de modération, d’automatisation, d’onboarding et
                        de qualité de vie pour serveurs Discord — avec stockage <em>SQL‑first</em> pour la résilience.
                    </p>
                    <ul>
                        <li>Modération assistée par réactions (signalements → mute temporaire + logs).</li>
                        <li>Messages automatiques et annonces.</li>
                        <li>Autorôle, liens utiles, vocaux temporaires.</li>
                        <li>XP &amp; niveaux par serveur, <span class="code">/leaderboard</span>.</li>
                    </ul>
                </section>
                <section class="section" id="prerequis">
                    <h2>2. Prérequis</h2>
                    <ul>
                        <li>Permissions : voir, envoyer, gérer (selon les modules activés).</li>
                        <li>Scopes d’invitation : <span class="code">bot</span>, <span
                                class="code">applications.commands</span>.</li>
                        <li>Auto‑hébergement : Node.js 20+, accès MySQL, variables d’environnement.</li>
                    </ul>
                </section>
                <section class="section" id="installation">
                    <h2>3. Installation</h2>
                    <ol>
                        <li>Invitez le bot sur votre serveur avec les scopes requis.</li>
                        <li>Lancez <span class="code">/help</span> pour vérifier les commandes.</li>
                        <li>Créez le salon privé des journaux via <span class="code">/config setup</span> (nom :
                            <strong>#logs</strong>).
                        </li>
                    </ol>
                    <p class="note">Les commandes de configuration sont réservées aux administrateurs.</p>
                </section>
                <section class="section" id="commandes">
                    <h2>4. Commandes</h2>
                    <table aria-describedby="t1" class="table">
                        <caption class="sr-only" id="t1">Tableau des commandes</caption>
                        <thead>
                            <tr>
                                <th>Commande</th>
                                <th>Accès</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="code">/help</span></td>
                                <td>Tous</td>
                                <td>Affiche la liste des commandes disponibles.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/ping</span></td>
                                <td>Admin</td>
                                <td>Affiche la latence WebSocket et la latence message.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/liens</span></td>
                                <td>Tous</td>
                                <td>Affiche les liens configurés en base (ou des liens par défaut).</td>
                            </tr>
                            <tr>
                                <td><span class="code">/delete-lien nom:"Nom"</span></td>
                                <td>Admin</td>
                                <td>Supprime un lien configuré pour le serveur.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/leaderboard</span></td>
                                <td>Tous</td>
                                <td>Top 10 des membres par niveau/XP dans le serveur.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/chats</span></td>
                                <td>Tous</td>
                                <td>Envoie une image aléatoire de chat (réponse éphémère).</td>
                            </tr>
                            <tr>
                                <td><span class="code">/important contenu:"…"</span></td>
                                <td>Admin</td>
                                <td>Publie une annonce dans le salon d’annonces configuré.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/enableautomessage</span></td>
                                <td>Admin</td>
                                <td>Active l’envoi des messages automatiques.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/disableautomessage</span></td>
                                <td>Admin</td>
                                <td>Désactive l’envoi des messages automatiques.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/removeautomessage</span></td>
                                <td>Admin</td>
                                <td>Supprime la configuration des messages automatiques.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/config setup</span></td>
                                <td>Admin</td>
                                <td>Crée le salon privé <strong>#logs</strong>.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/config liens nom:"Nom" url:"https://…"</span></td>
                                <td>Admin</td>
                                <td>Ajoute ou met à jour un lien en base.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/config automessage channel:#canal message:"Texte"
                                        interval:secondes</span></td>
                                <td>Admin</td>
                                <td>Définit canal, contenu et intervalle des auto‑messages.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/config roles admin_role:"Admin" mute_role:"Muted"</span></td>
                                <td>Admin</td>
                                <td>Définit les noms de rôles pour l’admin et le mute.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/config voice channel:ID</span></td>
                                <td>Admin</td>
                                <td>Définit l’ID du salon “crée ton salon” (vocaux temporaires).</td>
                            </tr>
                            <tr>
                                <td><span class="code">/config autorole role_id:ID</span></td>
                                <td>Admin</td>
                                <td>Attribue un rôle automatique aux nouveaux membres.</td>
                            </tr>
                            <tr>
                                <td><span class="code">/config show</span></td>
                                <td>Tous</td>
                                <td>Affiche la configuration courante du serveur.</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section class="section" id="configuration">
                    <h2>5. Configuration</h2>
                    <h3>Liens personnalisés</h3>
                    <p>Ajout/MàJ : <span class="code">/config liens nom:"Site" url:https://exemple.com</span> —
                        Affichage : <span class="code">/liens</span> — Suppression : <span class="code">/delete-lien
                            nom:"Site"</span>.</p>
                    <h3>Messages automatiques</h3>
                    <p>Exemple : <span class="code">/config automessage channel:#général message:"Bienvenue sur le
                            serveur !" interval:3600</span>, puis <span class="code">/enableautomessage</span>.</p>
                    <h3>Rôles &amp; autorôle</h3>
                    <p>Rôles : <span class="code">/config roles …</span> — Autorôle : <span class="code">/config
                            autorole role_id:…</span>.</p>
                    <h3>Vocaux temporaires</h3>
                    <p>Définissez le salon “créateur” via <span class="code">/config voice channel:ID</span>. Un vocal
                        privé “Salon de @pseudo” est créé à la jonction et supprimé quand il redevient vide.</p>
                </section>
                <section class="section" id="securite">
                    <h2>6. Sécurité &amp; Données</h2>
                    <ul>
                        <li>Journalisation dans <strong>#logs</strong> des événements de modération.</li>
                        <li>Configuration persistée en MySQL (robuste aux redémarrages).</li>
                        <li>Voir <a href="/privacy.html">Politique de confidentialité</a> pour les aspects RGPD.</li>
                    </ul>
                </section>
                <section class="section" id="depannage">
                    <h2>7. Dépannage</h2>
                    <ul>
                        <li><strong>Le bot ne répond pas :</strong> statut en ligne, permissions, <span
                                class="code">/help</span>.</li>
                        <li><strong>Annonces :</strong> ID du salon d’annonces valable + droits d’envoi.</li>
                        <li><strong>Auto‑messages :</strong> intervalle &gt; 30s et état <span
                                class="code">enable/disable</span>.</li>
                        <li><strong>Autorôle :</strong> le rôle existe et le bot peut l’assigner (hiérarchie).</li>
                    </ul>
                </section>
                <section class="section" id="versions">
                    <h2>8. Journal des versions</h2>
                    <ul>
                        <li><strong>v1.0</strong> — Version initiale publique : modération par réactions, automessages,
                            autorôle, vocaux temporaires, leaderboard, liens, annonces.</li>
                    </ul>
                </section>
                <section class="section" id="contact">
                    <h2>9. Support &amp; Contact</h2>
                    <p>Support : <a href="mailto:contact@shelbydev.fr">contact@shelbydev.fr</a>. Voir aussi les <a
                            href="<?php echo e(route('tos')); ?>">Conditions d’utilisation</a> et la <a href="<?php echo e(route('privacy')); ?>">Politique de
                            confidentialité</a>.</p>
                    <hr />
                    <div class="footer">
                        <span class="muted">© 2025 ShelbyDev. Tous droits réservés.</span>
                        <span class="muted">Document : <span class="code">documentation</span></span>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script>
        (function() {
            const links = Array.from(document.querySelectorAll('.nav a'));
            const sections = links.map(a => document.querySelector(a.getAttribute('href'))).filter(Boolean);

            const byId = new Map(sections.map(s => [s.id, s]));

            function setActive(id) {
                links.forEach(l => {
                    const target = l.getAttribute('href').slice(1);
                    if (target === id) {
                        l.classList.add('active');
                    } else {
                        l.classList.remove('active');
                    }
                });
            }

            const observer = new IntersectionObserver((entries) => {
                // Pick the entry closest to the top (highest intersection ratio)
                let topEntry = null;
                for (const e of entries) {
                    if (!e.isIntersecting) continue;
                    if (!topEntry || e.intersectionRatio > topEntry.intersectionRatio) {
                        topEntry = e;
                    }
                }
                if (topEntry) {
                    setActive(topEntry.target.id);
                }
            }, {
                root: null,
                // Trigger when ~40% of the section is visible
                threshold: [0.4, 0.6, 0.9]
            });

            sections.forEach(sec => observer.observe(sec));

            // On load, set active based on hash or first section
            window.addEventListener('load', () => {
                const hash = window.location.hash ? window.location.hash.slice(1) : sections[0]?.id;
                if (hash) setActive(hash);
            });

            // When user clicks on nav, reflect active immediately
            links.forEach(a => a.addEventListener('click', () => {
                links.forEach(x => x.classList.remove('active'));
                a.classList.add('active');
            }));
        })();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pc\Documents\dev\Laravel\hydrixbot\resources\views/docs.blade.php ENDPATH**/ ?>