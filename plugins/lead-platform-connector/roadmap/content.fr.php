<?php
/*
 * Contenu de la feuille de route personnalisée (français).
 *
 * C'est le seul fichier à modifier pour améliorer la feuille de route :
 * les règles (qui voit quoi) sont dans system/roadmap-builder.php, la mise en
 * page dans roadmap/templates/. Toute la feuille de route est reconstruite à
 * partir de ce fichier à chaque consultation : une correction ici s'applique
 * aussi aux feuilles de route déjà envoyées.
 *
 * Règles d'écriture
 * - Chaque fait chiffré a une source (URL) et une date de vérification.
 * - Pas de tiret cadratin, vouvoiement, phrases courtes.
 * - Un fait qui vieillit (date, prix) se corrige ici, puis on change 'version'.
 * - Les clés des tableaux 'tools', 'use_cases', 'constraints' et 'triggers'
 *   sont les valeurs exactes envoyées par le formulaire de diagnostic.
 *
 * Après modification : php scripts/roadmap-preview.php (aperçu) puis
 * php plugins/lead-platform-connector/tests/roadmap-test.php (vérifications).
 */

return [
	// Changez cette valeur à chaque modification de fond : elle est affichée en
	// pied de page et enregistrée avec chaque feuille de route envoyée.
	'version' => '2026-09-26.1',

	// Lien de prise de rendez-vous (TidyCal). Vide : le lien pointe vers la
	// page contact. Peut aussi venir de la variable d'environnement
	// ROADMAP_BOOKING_URL, qui a priorité.
	'booking_url' => '',

	// Durée de validité du lien envoyé par e-mail, en jours.
	'link_days' => 180,

	'email' => [
		'from_name' => 'Souvara',
		'from_address' => 'contact@souvara.fr',
		'subject' => 'Votre feuille de route Souvara',
	],

	'intro' => 'Cette feuille de route est une première lecture, établie automatiquement à partir de vos réponses et de sources publiques vérifiées. Elle ne remplace pas un échange : nous la validons ensemble lors d\'un appel de découverte gratuit.',

	'disclaimer' => 'Les montants sont des ordres de grandeur calculés sur des prix publics. Les faits cités sont datés et sourcés ; nous les mettons à jour régulièrement.',

	// Faits valables pour tout le monde, en tête de la section « prix ».
	'general_price_facts' => [
		[
			'text' => 'Les DSI membres du Cigref constatent une hausse de 8,7 % par an en moyenne de leurs dépenses de logiciel et de cloud sur trois ans, et en anticipent 12 % par an.',
			'source' => 'https://www.cigref.fr/de-la-dependance-technologique-a-la-captation-economique-ce-que-les-hausses-tarifaires-du-cloud-logiciel-coutent-a-leurope',
			'checked' => '2026-09-26',
		],
		[
			'text' => 'Depuis le 12 septembre 2025, le Data Act européen vous permet de quitter un fournisseur cloud avec deux mois de préavis au plus. À partir du 12 janvier 2027, il interdit les frais de sortie.',
			'source' => 'https://eur-lex.europa.eu/eli/reg/2023/2854/oj',
			'checked' => '2026-09-26',
		],
		[
			'text' => 'Les fournisseurs européens augmentent aussi leurs prix. Ce qui change, c\'est le droit applicable à votre contrat et la liberté de partir si les conditions ne vous conviennent plus.',
			'source' => '',
			'checked' => '2026-09-26',
		],
	],

	// Outils cochés dans le formulaire. 'facts' : hausses et conditions
	// documentées ; 'action' : ce que nous conseillons ; 'directory' : page de
	// l'annuaire à proposer.
	'tools' => [
		'Microsoft 365' => [
			'facts' => [
				[
					'text' => 'Au 1er juillet 2026, Microsoft a relevé le prix de liste de Business Basic de 6 à 7 dollars (+16,7 %), de Business Standard de 12,50 à 14 dollars (+12 %) et d\'Office 365 E3 de 23 à 26 dollars (+13 %), appliqués à votre renouvellement.',
					'source' => 'https://www.microsoft.com/en-us/licensing/news/2026-m365-packaging-pricing-updates',
					'checked' => '2026-09-26',
				],
				[
					'text' => 'Depuis novembre 2025, Microsoft ne consent plus de remise sur volume pour ses services en ligne dans les contrats Enterprise Agreement : tous les clients paient le prix de liste.',
					'source' => 'https://www.microsoft.com/en-us/licensing/news/online-services-pricing-consistency-update',
					'checked' => '2026-09-26',
				],
				[
					'text' => 'Microsoft révise désormais ses prix en euros une fois par an. La prochaine révision est prévue le 1er janvier 2027.',
					'source' => 'https://learn.microsoft.com/en-us/partner-center/announcements/2026-july',
					'checked' => '2026-09-26',
				],
			],
			'action' => 'Auditez vos licences Microsoft 365 (comptes inactifs, licences surdimensionnées) avant votre prochain renouvellement : c\'est souvent la première économie, sans rien migrer.',
			'directory' => '/annuaire/alternative-a/microsoft-365',
		],
		'Teams' => [
			'facts' => [
				[
					'text' => 'Dans l\'Espace économique européen, Teams est vendu séparément des suites Microsoft depuis octobre 2023. Les engagements pris par Microsoft devant la Commission européenne sont contraignants depuis septembre 2025.',
					'source' => 'https://ec.europa.eu/commission/presscorner/api/files/document/print/en/ip_25_2048/IP_25_2048_EN.pdf',
					'checked' => '2026-09-26',
				],
			],
			'action' => 'Vérifiez si vous payez Teams dans votre suite alors qu\'un outil de visioconférence dédié suffirait à vos usages.',
			'directory' => '/annuaire/alternative-a/microsoft-teams',
		],
		'Google Workspace' => [
			'facts' => [
				[
					'text' => 'En 2025, Google a intégré son IA Gemini à toutes les offres Workspace et relevé les prix : Business Standard de 12 à 14 dollars (+16,7 %), Business Plus de 18 à 22 dollars (+22 %).',
					'source' => 'https://9to5google.com/2025/01/15/google-workspace-price-increase-2025/',
					'checked' => '2026-09-26',
				],
				[
					'text' => 'Les conditions standard de Google Workspace permettent de modifier les prix au renouvellement avec 30 jours de préavis, et désignent le droit californien et les tribunaux du comté de Santa Clara.',
					'source' => 'https://workspace.google.com/terms/premier_terms/',
					'checked' => '2026-09-26',
				],
			],
			'action' => 'Relevez votre date de renouvellement Google Workspace et le nombre de comptes réellement utilisés.',
			'directory' => '/annuaire/alternative-a/google-workspace',
		],
		'Zoom' => [
			'facts' => [],
			'action' => 'Comparez votre abonnement Zoom avec une solution de visioconférence européenne pour les réunions internes.',
			'directory' => '/annuaire/alternative-a/zoom',
		],
		'Slack' => [
			'facts' => [
				[
					'text' => 'En juin 2025, Slack a relevé son offre Business+ de 12,50 à 15 dollars par utilisateur et par mois (+20 %), en y intégrant l\'IA.',
					'source' => 'https://slack.com/blog/news/june-2025-pricing-and-packaging-announcement',
					'checked' => '2026-09-26',
				],
			],
			'action' => 'Vérifiez quelles fonctions de Slack vous utilisez vraiment avant votre renouvellement.',
			'directory' => '/annuaire/alternative-a/slack',
		],
		'AWS' => [
			'facts' => [
				[
					'text' => 'Depuis février 2024, AWS facture chaque adresse IPv4 publique, environ 44 dollars par an et par adresse.',
					'source' => 'https://aws.amazon.com/blogs/networking-and-content-delivery/identify-and-optimize-public-ipv4-address-usage-on-aws/',
					'checked' => '2026-09-26',
				],
				[
					'text' => 'Le trafic sortant coûte environ 79 € HT par To chez AWS (région Paris), contre 0 € pour les instances OVHcloud, Scaleway ou Outscale.',
					'source' => 'https://aws.amazon.com/ec2/pricing/on-demand/',
					'checked' => '2026-09-26',
				],
			],
			'action' => 'Mesurez votre trafic sortant et vos adresses IP : ce sont souvent les coûts les moins visibles.',
			'directory' => '/annuaire/alternative-a/aws',
		],
		'Azure' => [
			'facts' => [
				[
					'text' => 'Le trafic sortant d\'Azure coûte environ 75 € HT par To (France Central), contre 0 € pour les instances OVHcloud, Scaleway ou Outscale.',
					'source' => 'https://azure.microsoft.com/en-us/pricing/details/bandwidth/',
					'checked' => '2026-09-26',
				],
			],
			'action' => 'Mesurez votre trafic sortant et identifiez les services qui vous lient à Azure (identité, bases gérées).',
			'directory' => '/annuaire/alternative-a/microsoft-azure',
		],
		'Google Cloud' => [
			'facts' => [
				[
					'text' => 'Le trafic sortant de Google Cloud coûte entre 75 et 105 € HT par To depuis Paris, contre 0 € pour les instances OVHcloud, Scaleway ou Outscale.',
					'source' => 'https://cloud.google.com/vpc/network-pricing',
					'checked' => '2026-09-26',
				],
			],
			'action' => 'Mesurez votre trafic sortant et identifiez les services gérés difficiles à remplacer.',
			'directory' => '/annuaire/alternative-a/google-cloud',
		],
		'VMware' => [
			'facts' => [
				[
					'text' => 'Après le rachat de VMware par Broadcom, les licences perpétuelles ont pris fin en décembre 2023. Selon le CISPE, des fournisseurs cloud européens ont signalé à la Commission européenne des hausses de 800 à 1 500 %.',
					'source' => 'https://www.theregister.com/off-prem/2025/05/22/vmware-price-hikes-800-1500-claim-euro-customers/1488879',
					'checked' => '2026-09-26',
				],
			],
			'action' => 'Préparez une alternative d\'hébergement avant votre prochain renouvellement VMware : une migration de virtualisation prend plusieurs mois.',
			'directory' => '/annuaire/categorie/hebergement-et-cloud',
		],
		'Oracle' => [
			'facts' => [
				[
					'text' => 'Depuis janvier 2023, Oracle vend Java SE par employé : tout l\'effectif est compté, prestataires compris, et pas seulement les utilisateurs de Java.',
					'source' => 'https://www.oracle.com/a/ocom/docs/corporate/pricing/java-se-subscription-pricelist-5028356.pdf',
					'checked' => '2026-09-26',
				],
				[
					'text' => 'Le support Oracle coûte 22 % du prix de licence par an et augmente chaque année d\'un ajustement lié à l\'inflation, sauf plafond négocié dans le contrat.',
					'source' => 'https://www.oracle.com/us/corporate/pricing/technology-price-list-070617.pdf',
					'checked' => '2026-09-26',
				],
			],
			'action' => 'Inventoriez vos usages de Java et de bases Oracle : des distributions Java gratuites existent (OpenJDK), et des bases open source comme PostgreSQL remplacent Oracle dans de nombreux cas.',
			'directory' => '',
		],
		'Salesforce' => [
			'facts' => [
				[
					'text' => 'Salesforce a relevé ses prix de 6 % en moyenne en août 2025 sur ses éditions Enterprise et Unlimited, après une hausse d\'environ 9 % en 2023.',
					'source' => 'https://www.salesforce.com/news/stories/pricing-update-2025/',
					'checked' => '2026-09-26',
				],
			],
			'action' => 'Relevez votre date de renouvellement Salesforce et les licences réellement utilisées.',
			'directory' => '/annuaire/alternative-a/salesforce',
		],
	],

	// Contraintes cochées dans le formulaire.
	'constraints' => [
		'Données sensibles / RGPD' => [
			'text' => 'Le RGPD encadre tout transfert de données personnelles hors de l\'Union. Le cadre UE–États-Unis actuel reste valide, mais les deux précédents ont été annulés (2015 et 2020) et un recours est pendant devant la Cour de justice de l\'Union européenne.',
			'source' => 'https://curia.europa.eu/site/upload/docs/application/pdf/2025-09/cp250106en.pdf',
			'action' => 'Cartographiez où vos données personnelles sont hébergées et par qui elles sont opérées, sous-traitants compris.',
		],
		'HDS' => [
			'text' => 'Héberger des données de santé pour le compte d\'un tiers exige un hébergeur certifié HDS.',
			'source' => 'https://esante.gouv.fr/produits-services/hds',
			'action' => 'Vérifiez la certification HDS de chaque prestataire qui héberge vos données de santé, et son périmètre exact.',
		],
		'NIS2' => [
			'text' => 'La directive NIS2 est en cours de transposition en France. Elle prévoit des amendes jusqu\'à 10 millions d\'euros ou 2 % du chiffre d\'affaires mondial pour les entités essentielles, et impose de maîtriser les risques liés aux fournisseurs.',
			'source' => 'https://eur-lex.europa.eu/eli/dir/2022/2555/oj',
			'action' => 'Recensez vos prestataires informatiques critiques et documentez, pour chacun, un plan de sortie.',
		],
		'SecNumCloud' => [
			'text' => 'SecNumCloud est la qualification de l\'ANSSI qui protège un service cloud contre l\'accès d\'autorités non européennes. Seules les offres inscrites au catalogue de l\'ANSSI sont qualifiées.',
			'source' => 'https://cyber.gouv.fr/produits-services-qualifies',
			'action' => 'Vérifiez dans le catalogue de l\'ANSSI que l\'offre elle-même est qualifiée, et pas seulement le fournisseur.',
		],
		'Commande publique' => [
			'text' => 'Depuis le décret 2026-272 (loi SREN), l\'État et certains opérateurs doivent héberger leurs données sensibles sur un cloud protégé contre l\'accès d\'autorités non européennes, avec 18 mois au plus pour migrer une fois une offre conforme disponible.',
			'source' => 'https://www.legifrance.gouv.fr/jorf/id/JORFTEXT000053900789',
			'action' => 'Identifiez les données sensibles concernées et les offres qualifiées disponibles pour chacune.',
		],
		'DORA' => [
			'text' => 'Depuis janvier 2025, le règlement DORA impose aux entités financières une stratégie de sortie documentée pour leurs prestataires informatiques critiques.',
			'source' => 'https://eur-lex.europa.eu/eli/reg/2022/2554/oj',
			'action' => 'Documentez une stratégie de sortie testable pour chaque prestataire critique.',
		],
		'Aucune contrainte identifiée' => [
			'text' => 'Même sans obligation propre, vos clients et donneurs d\'ordre peuvent exiger un hébergement européen ou la maîtrise de vos sous-traitants dans leurs appels d\'offres.',
			'source' => '',
			'action' => '',
		],
	],

	// Usages cochés : page de l'annuaire et options à étudier. 'min_size' :
	// l'option n'apparaît qu'au-delà de cet effectif (ex. AIFEL, 100 postes).
	'use_cases' => [
		'Visioconférence et collaboration' => [
			'directory' => '/annuaire/categorie/visioconference',
			'options' => [
				['name' => 'Tixeo', 'text' => 'visioconférence chiffrée de bout en bout, éditeur français, technologie certifiée CSPN par l\'ANSSI.'],
				['name' => 'kMeet (Infomaniak)', 'text' => 'visioconférence incluse dans la suite kSuite, hébergée en Suisse.'],
				['name' => 'AIFEL', 'text' => 'visioconférence française, alternative à Google Meet, pour les organisations de 100 postes et plus.', 'min_size' => 100],
			],
		],
		'Messagerie' => [
			'directory' => '/annuaire/categorie/messagerie',
			'options' => [
				['name' => 'BlueMind', 'text' => 'messagerie collaborative open source, compatible Outlook sans connecteur.'],
				['name' => 'Proton Mail', 'text' => 'messagerie chiffrée, éditeur suisse.'],
				['name' => 'Zimbra (OVHcloud)', 'text' => 'messagerie hébergée en France.'],
			],
		],
		'Bureautique' => [
			'directory' => '/annuaire/categorie/bureautique',
			'options' => [
				['name' => 'kSuite (Infomaniak)', 'text' => 'suite complète (messagerie, fichiers, documents, visio), hébergée en Suisse.'],
				['name' => 'Wimi', 'text' => 'suite collaborative française, avec des offres qualifiées SecNumCloud.'],
				['name' => 'ONLYOFFICE ou Collabora', 'text' => 'édition de documents compatible Microsoft Office, installable chez vous ou chez un hébergeur européen.'],
			],
		],
		'Fichiers et partage' => [
			'directory' => '/annuaire/categorie/fichiers-et-partage',
			'options' => [
				['name' => 'Oodrive Work', 'text' => 'partage et coédition de documents, qualifié SecNumCloud et certifié HDS.'],
				['name' => 'Nextcloud', 'text' => 'plateforme de fichiers open source, installable chez vous ou chez un hébergeur européen.'],
			],
		],
		'Identité et accès' => [
			'directory' => '/annuaire/categorie/identite-et-acces',
			'options' => [],
		],
		'Hébergement et cloud' => [
			'directory' => '/annuaire/categorie/hebergement-et-cloud',
			'options' => [
				['name' => 'OVHcloud', 'text' => 'cloud européen, trafic sortant inclus, plusieurs offres qualifiées SecNumCloud.'],
				['name' => 'Outscale', 'text' => 'cloud de Dassault Systèmes, qualifié SecNumCloud.'],
				['name' => 'Scaleway', 'text' => 'cloud européen, trafic sortant des instances inclus.'],
			],
		],
		'Sauvegarde' => [
			'directory' => '/annuaire/categorie/sauvegarde',
			'options' => [],
		],
		'Cybersécurité' => [
			'directory' => '/annuaire/categorie/cybersecurite',
			'options' => [],
		],
		'IA et agents' => [
			'directory' => '/annuaire/categorie/ia-et-agents',
			'options' => [
				['name' => 'Mistral AI', 'text' => 'modèles d\'IA européens, disponibles par API.'],
				['name' => 'OVHcloud AI Endpoints, Scaleway Generative APIs', 'text' => 'modèles ouverts hébergés dans l\'Union européenne, à partir de quelques centimes par million de tokens.'],
			],
		],
		'Autre' => [
			'directory' => '/annuaire',
			'options' => [],
		],
	],

	// Déclencheurs qui rendent la date de renouvellement prioritaire.
	'price_triggers' => [
		'Hausse de prix ou renouvellement de contrat',
		'Réduction des coûts',
		'Renouvellement de contrat',
	],

	// Les trois étapes. Les actions marquées 'when' ne s'affichent que si la
	// condition est remplie (voir RoadmapBuilder::matches).
	'phases' => [
		[
			'title' => 'D\'ici 3 mois : mesurer et sécuriser',
			'items' => [
				['text' => 'Dressez l\'inventaire : outils, contrats, dates de renouvellement, préavis de résiliation, données concernées et coût annuel réel.'],
				['text' => 'Notez la date de votre prochain renouvellement et le préavis de résiliation : c\'est votre fenêtre de négociation.', 'when' => ['trigger_price' => true]],
				['text' => 'Auditez vos licences (comptes inactifs, licences surdimensionnées) : c\'est souvent la première économie, sans rien migrer.', 'when' => ['tools_any' => ['Microsoft 365', 'Google Workspace', 'Slack', 'Salesforce']]],
				['text' => 'Recensez vos prestataires informatiques critiques et documentez un plan de sortie pour chacun.', 'when' => ['constraints_any' => ['NIS2', 'DORA']]],
				['text' => 'Faites le diagnostic cyber gratuit MonAideCyber de l\'ANSSI (1 h 30 avec un aidant).', 'when' => ['use_cases_any' => ['Cybersécurité'], 'or_trigger' => ['Incident de sécurité', 'Préparation NIS2 / DORA']]],
			],
		],
		[
			'title' => 'De 3 à 12 mois : tester sur un périmètre réduit',
			'items' => [
				['text' => 'Commencez par la brique « {first_use_case} » : c\'est celle que vous avez citée en premier.', 'when' => ['has_use_case' => true]],
				['text' => 'Menez un pilote réversible avec une équipe représentative, et fixez les critères de réussite avant de commencer.'],
				['text' => 'Comparez le coût complet sur 3 à 5 ans : licences, migration, formation, double abonnement pendant la transition.'],
				['text' => 'Remettez en concurrence vos contrats {heavy_tools} avant leur échéance : leurs hausses récentes sont les plus fortes.', 'when' => ['tools_any' => ['VMware', 'Oracle']]],
			],
		],
		[
			'title' => 'Au-delà de 12 mois : migrer par étapes',
			'items' => [
				['text' => 'Migrez brique par brique, avec une période de coexistence datée et budgétée.'],
				['text' => 'Testez la sortie avant de signer : export complet des données, délai, coût.'],
				['text' => 'Revoyez les contrats restants à chaque renouvellement, avec une alternative prête.'],
			],
		],
	],

	// Message ajouté quand l'échéance est à moins de 3 mois.
	'urgent_note' => 'Votre échéance est proche. Concentrez-vous sur la première étape et, si possible, renouvelez pour une durée courte (un an) afin de garder la main pour la suite.',

	// Ordre de grandeur des coûts (même calcul que /calculateur, scénario
	// « léger »). Prix HT par utilisateur et par mois, relevés le 2026-09-26.
	'costs' => [
		'growth_us' => 0.08,
		'growth_eu' => 0.03,
		'years' => 5,
		'migration_per_user' => 50,
		'training_per_user' => 60,
		'overlap_months' => 1,
		'current' => [
			'Microsoft 365' => ['name' => 'Microsoft 365 Business Standard', 'price' => 12.13],
			'Google Workspace' => ['name' => 'Google Workspace Business Standard', 'price' => 13.60],
		],
		// Suites européennes à prix public, dans l'ordre de préférence. Au-delà
		// de 'max_users', l'offre est sur devis : la section affiche alors
		// 'quote_note' au lieu d'un chiffre.
		'targets' => [
			['name' => 'Infomaniak kSuite Business', 'price' => 6.58, 'max_users' => 300],
		],
		'quote_note' => 'Pour votre effectif, les suites européennes adaptées sont proposées sur devis : nous chiffrons ce point avec vous lors de l\'appel de découverte.',
		// Effectif retenu pour chaque tranche du formulaire.
		'users_by_size' => [
			'< 50' => 25,
			'50–99' => 75,
			'50–249' => 150,
			'100–249' => 175,
			'250–999' => 500,
			'1 000–4 999' => 2000,
			'≥ 5 000' => 5000,
		],
	],

	// Financements. 'min_size' / 'max_size' : effectif ; 'org_types' : types
	// d'organisation concernés (vide : tous) ; 'when' : condition optionnelle.
	'funding' => [
		[
			'name' => 'MonAideCyber (ANSSI)',
			'text' => 'Diagnostic cyber gratuit de 1 h 30 avec un aidant, pour les structures d\'au moins 2 salariés.',
			'url' => 'https://messervices.cyber.gouv.fr/cyberdepart',
			'min_size' => 2, 'max_size' => null, 'org_types' => [],
		],
		[
			'name' => 'Diag Cybersécurité (Bpifrance)',
			'text' => 'Diagnostic par un expert et plan d\'action, subventionné à 50 % : 4 400 € HT restent à votre charge. Pour les PME indépendantes de plus de 10 salariés.',
			'url' => 'https://www.bpifrance.fr/catalogue-offres/diag-cybersecurite',
			'min_size' => 10, 'max_size' => 2000, 'org_types' => ['PME', 'ETI'],
		],
		[
			'name' => 'Diag Data IA (Bpifrance, France 2030)',
			'text' => 'Huit jours d\'expertise sur vos données et vos usages d\'IA, financés à 40 % : 6 000 € HT restent à votre charge.',
			'url' => 'https://www.bpifrance.fr/catalogue-offres/diag-data-ia',
			'min_size' => 10, 'max_size' => 2000, 'org_types' => ['PME', 'ETI'],
			'when' => ['use_cases_any' => ['IA et agents'], 'or_ai_interest' => true],
		],
		[
			'name' => 'Prêt Boost Transformation numérique (Bpifrance)',
			'text' => 'Prêt de 5 000 à 75 000 € sans garantie personnelle pour les logiciels, le conseil et la formation, pour les entreprises de 2 à 49 salariés. Disponibilité à confirmer auprès de Bpifrance.',
			'url' => 'https://www.francenum.gouv.fr/aides-financieres/financez-la-numerisation-de-votre-tpe-pme-avec-le-pret-boost-transformation',
			'min_size' => 2, 'max_size' => 49, 'org_types' => ['PME', 'Association', 'Autre'],
		],
	],

	'funding_interest_note' => 'Vous avez demandé à étudier les financements : lors de l\'appel, nous vérifierons aussi les aides de votre région et les partenaires qui peuvent cofinancer le projet.',

	'next_step' => [
		'title' => 'La suite',
		'text' => 'Réservez un appel de découverte gratuit de 30 minutes : nous validons ensemble cette feuille de route, puis, si votre situation le demande, nous vous proposons un diagnostic approfondi, dont le périmètre et le coût sont fixés avec vous avant tout engagement.',
		'button' => 'Réserver mon appel de découverte',
		'fallback_text' => 'Répondez simplement à cet e-mail, ou écrivez-nous à contact@souvara.fr, pour convenir d\'un créneau.',
	],
];
