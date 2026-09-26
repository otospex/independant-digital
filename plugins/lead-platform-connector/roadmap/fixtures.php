<?php
/*
 * Profils d'exemple pour prévisualiser et tester la feuille de route.
 * Les valeurs sont celles que le formulaire envoie réellement.
 * Ajoutez un profil pour chaque cas que vous voulez surveiller.
 */
return [
	'pme' => [
		'full_name' => 'Claire Martin', 'company' => 'Atelier Martin', 'job_title' => 'Dirigeant(e) de PME',
		'org_type' => 'PME', 'company_size' => '< 50',
		'current_tools' => ['Microsoft 365', 'Teams'], 'use_cases' => ['Messagerie', 'Bureautique'],
		'constraints' => ['Données sensibles / RGPD'], 'trigger' => 'Hausse de prix ou renouvellement de contrat',
		'timeline' => '< 3 mois', 'budget' => '< 10 k€', 'financing_interest' => '1', 'ai_platform_interest' => '',
	],
	'eti' => [
		'full_name' => 'Karim Benali', 'company' => 'Industries Benali', 'job_title' => 'DSI',
		'org_type' => 'ETI', 'company_size' => '250–999',
		'current_tools' => ['Microsoft 365', 'VMware', 'Oracle', 'AWS'], 'use_cases' => ['Visioconférence et collaboration', 'Hébergement et cloud', 'IA et agents'],
		'constraints' => ['NIS2'], 'trigger' => 'Préparation NIS2 / DORA',
		'timeline' => '6–12 mois', 'budget' => '50–200 k€', 'financing_interest' => '', 'ai_platform_interest' => '1',
	],
	'public' => [
		'full_name' => 'Sophie Laurent', 'company' => 'Communauté de communes du Val', 'job_title' => 'DG / DGS',
		'org_type' => 'Collectivité', 'company_size' => '1 000–4 999',
		'current_tools' => ['Google Workspace', 'Zoom'], 'use_cases' => ['Visioconférence et collaboration', 'Fichiers et partage'],
		'constraints' => ['Commande publique', 'SecNumCloud'], 'trigger' => 'Exigence de tutelle ou de direction',
		'timeline' => '> 12 mois', 'budget' => 'Non défini', 'financing_interest' => '1', 'ai_platform_interest' => '',
	],
	'petite-visio' => [
		'full_name' => 'Paul Durand', 'company' => 'Cabinet Durand', 'job_title' => 'Autre',
		'org_type' => 'PME', 'company_size' => '50–99',
		'current_tools' => ['Zoom'], 'use_cases' => ['Visioconférence et collaboration'],
		'constraints' => ['Aucune contrainte identifiée'], 'trigger' => 'Réduction des coûts',
		'timeline' => '3–6 mois', 'budget' => '< 10 k€', 'financing_interest' => '', 'ai_platform_interest' => '',
	],
];
