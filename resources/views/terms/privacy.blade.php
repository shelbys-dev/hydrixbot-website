@extends('layouts.app')

@section('title','Hydrix Bot — Privacy')
@section('meta_description','Hydrix Bot - modération, annonces, autorôle, XP, SQL-first')

@section('content')
  <div class="container">
    <div class="card">
      <div class="header">
        <h1>Politique de confidentialité</h1>
        <span class="badge">Dernière mise à jour : 26/09/2025</span>
      </div>
      <p>La présente politique explique quelles données le bot Discord (ci‑après « le Bot ») traite, dans quel but et
        comment exercer vos droits. Le Bot est développé et maintenu par <strong>Shelby S. — ShelbyDev</strong>.</p>

      <nav>
        <a href="#controleur">1. Responsable du traitement</a>
        <a href="#donnees">2. Données traitées</a>
        <a href="#finalites">3. Finalités & base légale</a>
        <a href="#duree">4. Durées de conservation</a>
        <a href="#partage">5. Partage & transferts</a>
        <a href="#securite">6. Sécurité</a>
        <a href="#droits">7. Vos droits (RGPD)</a>
        <a href="#mineurs">8. Mineurs</a>
        <a href="#contact">9. Contact</a>
      </nav>

      <h2 id="controleur">1. Responsable du traitement</h2>
      <p><strong>Shelby S. — ShelbyDev</strong> (France). Contact : <a
          href="mailto:contact@shelbydev.fr">contact@shelbydev.fr</a>.</p>
      <p>Hébergement du Bot et de sa base de données sur un VPS OVH (France/UE).</p>

      <h2 id="donnees">2. Données traitées</h2>
      <p>Le Bot traite uniquement les données nécessaires à ses fonctions :</p>
      <ul>
        <li><strong>Identifiants Discord :</strong> ID de serveur, ID d’utilisateur, ID/nom de rôles et salons.</li>
        <li><strong>Configuration serveur :</strong> liens utiles, canal d’annonces, messages automatiques (contenu et
          intervalle), configuration de rôles (admin/mute/autorole), ID du salon « création vocale ».</li>
        <li><strong>Interactions & modération :</strong> comptages de réactions pour signalements, liste d’utilisateurs
          ayant signalé, messages signalés (contenu) lorsque nécessaire à la modération.</li>
        <li><strong>Niveaux/XP :</strong> XP et niveau par utilisateur pour un serveur donné.</li>
      </ul>
      <p>Aucun cookie, aucune donnée sensible, aucun suivi publicitaire.</p>

      <h2 id="finalites">3. Finalités & base légale</h2>
      <ul>
        <li><strong>Fourniture des fonctionnalités du Bot</strong> (annonces, auto‑messages, autorôle, salons vocaux
          temporaires, leaderboard XP, système de signalements).<br />
          Base légale : <em>intérêt légitime</em> (art. 6‑1 f RGPD) à opérer et sécuriser le service pour les
          communautés Discord.</li>
        <li><strong>Sécurité & anti‑abus</strong> (limiter le spam, muter temporairement, journaliser dans #logs).<br />
          Base légale : <em>intérêt légitime</em>.</li>
        <li><strong>Support</strong> (réponse aux demandes via e‑mail ou serveur support).<br />
          Base légale : <em>intérêt légitime</em>.</li>
      </ul>

      <h2 id="duree">4. Durées de conservation</h2>
      <ul>
        <li>Configurations serveur : tant que le Bot est présent sur le serveur (suppression à la désinstallation ou sur
          demande).</li>
        <li>Comptes de réactions/signaux : remis à zéro quand un seuil est atteint ou après traitement/modération ;
          sinon purge périodique.</li>
        <li>XP/Niveaux : tant que la fonctionnalité est active sur le serveur, ou suppression sur demande.</li>
      </ul>

      <h2 id="partage">5. Partage & transferts</h2>
      <ul>
        <li>Aucune vente de données. Pas de partage à des tiers hors prestataires techniques indispensables
          (hébergeur/VPS).</li>
        <li>Les données restent hébergées dans l’UE (VPS OVH France). Aucun transfert hors UE prévu.</li>
      </ul>

      <h2 id="securite">6. Sécurité</h2>
      <ul>
        <li>Accès restreint au serveur (clés SSH, mises à jour régulières).</li>
        <li>Stockage MySQL protégé ; accès par variables d’environnement.</li>
        <li>Permissions Discord minimales nécessaires au fonctionnement.</li>
      </ul>

      <h2 id="droits">7. Vos droits (RGPD)</h2>
      <p>Vous disposez des droits d’accès, de rectification, d’effacement, d’opposition, de limitation et de portabilité
        dans les conditions légales applicables.</p>
      <p><strong>Comment exercer :</strong></p>
      <ul>
        <li>Utilisateur : contactez d’abord l’administrateur du serveur (pour les données locales comme XP, rôles,
          configurations spécifiques).</li>
        <li>Ou bien écrivez directement à <a href="mailto:contact@shelbydev.fr">contact@shelbydev.fr</a> en précisant
          votre <em>ID utilisateur Discord</em> et le <em>serveur</em> concerné.</li>
      </ul>

      <h2 id="mineurs">8. Mineurs</h2>
      <p>Le Bot n’est pas destiné aux personnes de moins de 13 ans (ou l’âge minimum requis par Discord dans votre
        pays). Toute donnée concernant un mineur identifiée sera supprimée sur demande légitime.</p>

      <h2 id="contact">9. Contact & réclamations</h2>
      <p>Contact : <a href="mailto:contact@shelbydev.fr">contact@shelbydev.fr</a>. Vous pouvez également saisir
        l’autorité de contrôle compétente (CNIL en France).</p>

      <hr />
      <p class="muted">Références : <a href="https://discord.com/privacy" target="_blank" rel="noopener">Politique de
          confidentialité de Discord</a> — <a href="/tos.html">Conditions d’utilisation du Bot</a>.</p>
      <div class="footer">
        <span class="muted">© 2025 ShelbyDev. Tous droits réservés.</span>
        <span class="muted">Document : <span class="code">privacy.html</span></span>
      </div>
    </div>
  </div>
@endsection
