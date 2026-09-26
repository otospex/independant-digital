# Souvara: market triggers, buyer vocabulary and copy audit

Prepared 2026-09-26. Live site fetched the same day (souvara.fr, 9 pages plus the legal notice and one solution page).
Analysis is in English. Every proposed site copy is in French, ready to paste.
Figures are only quoted when a source is linked. Anything else is marked `[CHIFFRE À SOURCER: …]`.

---

## 0. What matters (read this first)

1. **Price rises are now the strongest trigger, ahead of "sovereignty"**. Cigref (May 2026) found cloud and software costs rose +8.7 % a year over three years, with +12 %/yr expected. 71 % of IT directors call that path unsustainable by 2030. Microsoft 365 prices rise again in 2026 (Business Basic +17 %, F3 +25 %, applied on the contract anniversary in France). Broadcom/VMware increases were 10× or more for some French organisations. The site barely mentions money today.
2. **Compliance is the second trigger** (CESIN 2026: 85 % are affected by at least one cyber regulation, 59 % cite NIS2). For public buyers, the SREN decree of 14 April 2026 now makes SecNumCloud mandatory for some sensitive State data.
3. **For private companies, sovereignty on its own does not sell.** EY/Hexatrust found that international companies decide on "performance, fiabilité et adéquation aux risques". France Digitale/EY 2026: 76 % of large groups would switch only if performance is equal or better. Cigref's June 2026 doctrine says outright that sovereignty is a State matter and that companies manage **résilience** and **dépendances**. Use "sovereignty" for the public sector and SEO. Talk to companies about costs, risk and continuity.
4. **The gap Souvara can fill:** 90 % of large groups see supplier dependence as a risk, but 65 % cannot measure their non-European digital spend, and only 16 % of organisations analyse their dependencies (EY/Hexatrust 2025). A diagnostic that puts a number on dependence and cost is the right entry offer. The page has to *say* that is what you get.
5. **Pre-launch defects visible on the live site** (fix before any campaign):
   - `/diagnostic-souverainete` shows an internal note: « Les informations restent dans la file interne tant qu'aucun système de distribution n'est configuré. »
   - `/mentions-legales` shows the placeholder « Directeur de la publication : [À compléter : nom du gérant] ».
   - `/a-propos` says « Souvara est un site français… » while the legal notice names a Tunisian SARL as publisher. On a sovereignty site this is the first thing a sceptical RSSI will check. Reword it (see B3) and explain the set-up openly.
   - AIFEL is called « partenaire commercial non exclusif » in the form consent but « une future relation commerciale » on `/transparence-partenariats`. Make the two match.
   - `/contact` says « Le formulaire ci-dessous est le seul canal de contact publié au lancement » while contact@souvara.fr is published elsewhere (last commit). It also reads as an internal note.
   - `/sortir-microsoft-365` exposes editorial process: « Une future page de comparaison ne sera publiée qu'après validation de la demande de recherche et revue manuelle. »
   - Directory cards show the badge « Déclaré par l'éditeur » even where the solution page says the entry was built « à partir des sources publiques du fournisseur et du catalogue ANSSI ». The badge reads as "the vendor wrote this" and undercuts the "relu" promise.
   - The form's « Fonction » list has no DAF / direction financière and no « Dirigeant de PME », even though the money message targets them. « Élément déclencheur » has no « Hausse de prix » or « Appel d'offres / exigence client », and the regulation list has no DORA.
   - The form asks for email and name **before** any value (step 1 = coordonnées). Swap the order: situation first, contact last.
   - Page titles repeat the brand: « À propos de Souvara - Souvara — Souveraineté numérique par étapes ».

---

# PART A: Market research

## A1. What drives French organisations' cloud and software decisions

### A1.1 Sources reviewed and what they say

| Source (date, sample) | Key findings relevant to Souvara | Link |
|---|---|---|
| **Cigref / Asterès**, « De la dépendance technologique à la captation économique » (28 May 2026; IT directors from European user associations: Cigref, Beltug, CIO Platform Nederland, VOICE) | Cloud and software costs up **+8.7 %/yr** over the last 3 years, **+12 %/yr** expected over 5 years. **83 %** of the ~€400 bn European spend goes to US vendors. **40 %** of price rises are tied to imposed AI features; **60 %** see the productivity gains as « théoriques ». **71 %** say the path is unsustainable by 2030. **47 %** cut other digital spend to absorb it. The price rise is described as « un impôt qui ne dit pas son nom ». | https://www.cigref.fr/de-la-dependance-technologique-a-la-captation-economique-ce-que-les-hausses-tarifaires-du-cloud-logiciel-coutent-a-leurope |
| **Cigref** doctrine note « Souveraineté et résilience numériques » (4 June 2026) | Sovereignty « ne peut être attribuée à un objet technique, à un fournisseur ou à une entreprise privée ». Companies are responsible for **résilience numérique**: « la capacité d'une organisation à garantir la continuité de ses services critiques et son intégrité opérationnelle face aux perturbations ». | https://www.cigref.fr/souverainete-et-resilience-numeriques-note-de-position-doctrinale-du-cigref |
| **CESIN / OpinionWay**, 11th barometer (Jan 2026, 397 RSSI) | **40 %** hit by a significant attack in 2025 (down from 47 %), and **81 %** of those saw business impact. **35 %** of significant incidents came through third parties. **85 %** are affected by at least one regulation: **59 % NIS2, 32 % DORA, 30 % CRA**. **70 %** lack human and financial resources. Cloud risk is seen as mostly **legal/contractual** (clauses, extraterritoriality, subcontracting chains). Sovereignty is moving « du slogan à la maîtrise ». | https://www.itforbusiness.fr/11e-barometre-cesin-2026-cyber-99603 · https://www.informatiquenews.fr/barometre-cesin-2026-moins-dattaques-plus-dimpacts-109218 |
| **Hexatrust × EY**, Baromètre de la souveraineté numérique 2025 (Sept 2025; **96 DSI/RSSI, 79 % public sector**) | **79 %** say sovereignty will weigh more in future. **50 %** have already rejected an IT solution for sovereignty reasons. **40 %** do no monitoring of sovereign offers. **49 %** have no NIS2 action plan. **41 %** say executives don't understand cloud risks. **53 %** don't see the sovereign cyber offer as differentiating. Barriers: doubts on « maturité technologique, couverture fonctionnelle, fiabilité ou coût ». Private and international firms are « guidées par des critères de performance, de fiabilité et d'adéquation aux risques ». Jamespot CEO quote: sovereignty is still seen « comme un acte militant, plutôt que comme un acte stratégique ». *Caveat: small, public-sector-heavy sample.* | https://www.ey.com/content/dam/ey-unified-site/ey-com/fr-fr/services/cybersecurity/documents/ey-barometre-de-la-souverainete-numrique-sep-2025.pdf |
| **Hexatrust**, Baromètre 2026 (fieldwork summer 2026, target >1,000 respondents: DSI, RSSI, DG, achats, data/IA; results presented at UECC, 10 Sept 2026) | Measures sovereignty criteria in tenders, methods for assessing dependencies and the real share of European solutions. **Full 2026 figures were not publicly indexed at the time of writing.** Get the PDF from Hexatrust before quoting it. | https://www.solutions-numeriques.com/barometre-de-la-souverainete-numerique-2026-hexatrust-veut-mesurer-le-passage-a-laction/ |
| **France Digitale × EY**, Baromètre 2026 (7 May–28 July 2026; the large-group panel is **21 groups**) | **90 %** see dependence on certain suppliers as a risk. **65 %** cannot quantify their non-European digital spend. **74 %** have started to diversify (priorities: AI 57 %, cloud 52 %, sensitive data 52 %). **76 %** would switch only « à performance équivalente ou supérieure ». Other factors: risk of service interruption (71 %), tax advantages (57 %). | https://www.blogdumoderateur.com/souverainete-numerique-solutions-europeennes-pas-hauteur-grands-groupes |
| **Numspot × Acteurs publics × Ifop**, public-sector barometer | Top selection criteria: **data security 71 %**, **non-exposure to extraterritorial laws 43 %**, **SecNumCloud 40 %**. **81 %** say geopolitical tension affects their decisions. The « Cloud au centre » doctrine pushes **51 %** to speed up. | https://numspot.com/ressource/barometre-souverainete-numerique-et-secteur-public/ |
| **France Num (DGE)** barometer 2025 (**11,021 TPE/PME**) | **52 %** of owners worry about data hacking (+16 pts since 2020). **25 %** spent nothing on digital in 2024. **42 %** spent more than €1,000. Among firms with a digital project budget above €1,000, **60 %** plan to seek external financing, and **27 % specifically public subsidies**. That confirms demand for the financing route. Owners ask for « accompagnement » and cite technical and financial barriers. | https://www.francenum.gouv.fr/files/2025-09/Barom%C3%A8tre%20France%20Num%202025%20-%20Rapport.pdf |
| **INSEE**, TIC entreprises 2025 (published 21 July 2026; firms with 10+ employees) | **18 %** of firms use at least one AI technology (58 % among 250+). **73 %** of AI users buy paid cloud services, against 33 % of non-users. Data-protection concerns are a stated barrier (37–53 % of non-adopters depending on size). | https://www.insee.fr/fr/statistiques/9025878?sommaire=8677764 |
| **Numeum**, market outlook (Dec 2025) | Market expected +4.3 % in 2026 (€74.3 bn). Sovereignty projects are becoming actual investment. *A per-project average of €150–200k is attributed to Numeum by secondary sources only. Check it in the Numeum PDF before use.* | https://numeum.fr/wp-content/uploads/2025/12/2025-S2-Observatoire-de-conjoncture-NUMEUM-PAC-corrige-1.pdf |
| **Bpifrance Le Lab** | No dedicated sovereignty study found. Its AI study (1,209 leaders) says 58 % of PME-ETI leaders see AI as a survival issue. It is useful for the planned AI-agent platform, not for this message. | https://lelab.bpifrance.fr/storage/sites/31/2026/01/IA-dans-les-PME-et-ETI-Francaises-Revolution-Tranquille.pdf |
| **Wavestone** | No public sovereignty or cloud barometer found. Only webinar content (« Le cloud souverain en un coup d'œil », July 2025). Do not cite a Wavestone barometer. | https://www.wavestone.com/fr/event/le-cloud-souverain-en-un-coup-doeil-vers-une-strategie-cloud-optimale/ |
| **Syntec Conseil / Numeum (Fédération Syntec)** | No sovereignty-specific study found for 2026. Syntec Conseil lists **cost reduction** and **cybersecurity** among 2026 demand drivers for consulting. | https://www.consultor.fr/articles/conseil-en-strategie-bilan-2025-et-perspectives-2026 |

**Market facts that support the money argument:**

- **Microsoft 365, 2026 price rises** (monthly per user, annual commitment): Business Basic €5.60 → €6.50 (+17 %), Business Standard €11.70 → €13.10 (+12 %), Business Premium unchanged, O365 E3 +13 %, M365 E3 +8 %, E5 +5 %, F3 +25 %. In France they apply on the contract anniversary date; monthly no-commitment plans moved on 1 July 2026. Source: Le Monde Informatique, 5 Dec 2025, https://www.lemondeinformatique.fr/actualites/lire-hausse-des-prix-de-microsoft-365-pour-les-entreprises-en-2026-98712.html. *Check against Microsoft's official price list before publishing.*
- **Broadcom/VMware**: rises of 10× or more reported. The Université de Lille's VMware budget was multiplied by 12 before negotiation, and a social-protection body saw +700 %. AIFE (a State agency) saw +35 %. Even so, there was no mass exodus, « car la migration reste trop compliquée ». That is a direct argument for *preparing* reversibility before the next renewal. Sources: https://www.usine-digitale.fr/informatique/vmware/vmware-malgre-la-hausse-des-prix-il-ny-a-pas-eu-dexode-massif-des-clients-car-la-migration-reste-trop-compliquee-pour-beaucoup-dentre-eux.4JXP6BDK2NDSLHXJXAQ536W3YU.html · https://www.cigref.fr/de-la-dependance-technologique-a-la-captation-economique-ce-que-les-hausses-tarifaires-du-cloud-logiciel-coutent-a-leurope · CISPE complaint (Jan–Mar 2026) https://www.ictjournal.ch/news/2026-03-24/le-cispe-depose-une-plainte-contre-broadcom
- **EU Data Act (Reg. 2023/2854)**: since 12 Sept 2025, switching charges are limited to direct costs. **From 12 Jan 2027, cloud providers can no longer charge switching or egress fees for a migration.** Ongoing multi-cloud flows are excluded. This removes part of the "migration cost" objection. Source: https://www.donneespersonnelles.fr/portabilite-donnees-cloud-data-act. *Link the regulation text on EUR-Lex on the site.*
- **NIS2 in France**: the « loi Résilience » (transposing NIS2, REC and DORA) passed the Senate on 12 March 2025. At the time of writing, the Assemblée's floor debate was expected no earlier than September 2026. On 17 March 2026 ANSSI published the ReCyF framework. On 8 July 2026 the Commission referred France to the CJEU for late transposition. Scope is about 15,000 entities, with fines up to €10 m or 2 % of turnover. Supply-chain requirements reach suppliers that are not themselves in scope. Sources: https://aide.monespacenis2.cyber.gouv.fr/fr/article/avancement-de-la-transposition-de-la-directive-nis-2-1b3j1da/ · https://www.legiscope.com/blog/transposition-nis2-france.html. *Copy must say « en cours de transposition », not « en vigueur en France ».*
- **SREN art. 31**: decree n° 2026-272 of 14 April 2026 makes SecNumCloud mandatory for « données d'une sensibilité particulière » of State administrations, some operators and listed GIPs. https://www.economie.gouv.fr/daj/publication-du-decret-dapplication-de-larticle-31-de-la-loi-sren-relatif-la-protection-des-donnees-dune-sensibilite-particuliere-de-letat
- **Admissions in the record**: the Hexatrust/EY 2025 report quotes Senator Simon Uzenat on the risks of « hausses brutales des coûts, ruptures de services, soumission aux législations extraterritoriales… comme l'a d'ailleurs reconnu le Directeur des affaires publiques et juridiques de Microsoft France » (Senate inquiry on public procurement, 2025). This is a factual, non-alarmist proof point. Cite the Senate report itself.

### A1.2 Ranked triggers (synthesis)

The ranking is my judgement from the sources above, weighted towards the private SMEs and mid-caps that Souvara targets. Public bodies differ, as noted.

| Rank | Trigger | Evidence | Who it hits hardest | How Souvara should use it |
|---|---|---|---|---|
| 1 | **Price rises and renewal dates** (licences, AI bundling, VMware) | Cigref +8.7 %/yr, 71 % "unsustainable"; M365 2026 rises; Broadcom ×10 | DAF, DG, DSI of mid-caps and large companies; SMEs at M365 renewal | Lead with it. Ask for the renewal date in the form. Offer « avant votre prochain renouvellement ». |
| 2 | **Regulatory compliance** (NIS2, DORA, GDPR, SREN, HDS) | CESIN 85 % affected, 59 % NIS2; 49 % no NIS2 plan | RSSI, compliance, regulated sectors, suppliers of NIS2 entities | Second argument. Be precise about status (NIS2 not yet transposed). |
| 3 | **Security incidents and third-party risk** | CESIN 40 % attacked, 81 % with impact, 35 % via third parties; France Num 52 % of owners fear hacking | RSSI; SME owners | Frame as « maîtrise des risques tiers », not fear. Point to MonAideCyber and the Bpifrance Diag Cyber. |
| 4 | **Continuity: a supplier can cut, change terms or raise prices** | France Digitale/EY 71 % cite service-interruption risk; 90 % see dependence as risk | DG, DSI | « Réversibilité testée », « plan de sortie ». Avoid dramatic scenarios. |
| 5 | **Customer, tender and funder requirements** (EU hosting, SecNumCloud, sovereignty criteria in RFPs) | Numspot/Ifop public sector; SREN decree; Hexatrust 2026 measuring sovereignty criteria in tenders; NIS2 cascade to suppliers | Suppliers to the public sector, health and defence; subcontractors of NIS2 entities | A strong *revenue* argument (win contracts), underused by competitors. |
| 6 | **Sovereignty / geopolitics as such** | EY 79 % "will weigh more", 50 % already rejected a solution; Numspot 81 % geopolitics | Public sector above all; less so private and international firms | Keep it as the reason the change *lasts*, not as the hook. |
| 7 | **Access to public funding** | France Num: 27 % of SMEs with projects plan to use subsidies | SMEs | A route of its own. Name the verified schemes (A4). |
| 8 | **AI data exposure** (shadow AI, where AI data is processed) | CESIN: 75 % see unapproved AI use as risky; INSEE: AI users rely more on cloud | DSI, RSSI | A bridge to the future AI-agent platform. Don't lead with it yet. |

**Main barriers (what the copy must defuse):** performance parity (76 %), perceived immaturity or functional gaps of European tools, migration complexity (VMware), no internal resources (CESIN 70 %), not knowing the European offer (40 % do no monitoring), and not knowing one's own spend and dependencies (65 %; only 16 % analyse them).

---

## A2. The vocabulary buyers actually use

Terms in **bold** appear in the sources above. Others are standard in French IT purchasing. Use them. Avoid the column on the right.

| Persona | Words and phrases they use | Say it this way on Souvara | Avoid |
|---|---|---|---|
| **DSI** | **réversibilité**, **dépendance(s)**, **verrouillage** / lock-in, **portabilité**, **interopérabilité**, standards ouverts, plan de sortie, **trajectoire**, coexistence, dette technique, renouvellement, **multicloud**, **résilience** | « Réversibilité vérifiée, pas seulement contractuelle » ; « préparer la sortie avant le renouvellement » | « souveraineté totale », « 100 % souverain », « libérez-vous » |
| **RSSI** | **gestion des tiers**, **risque fournisseur**, **extraterritorialité** / **lois extraterritoriales**, CLOUD Act, **SecNumCloud**, **conformité NIS2**, DORA, **ReCyF**, EBIOS RM, PCA/PRA, chaîne de **sous-traitance**, homologation, **maîtrise** | « Réduire l'exposition aux lois extraterritoriales, sous-traitants compris » | « bouclier », « forteresse », scare wording |
| **DAF / CFO** | **coût complet / TCO**, **maîtrise des coûts**, **hausse tarifaire**, prévisibilité budgétaire, clause d'indexation, révision tarifaire, engagement pluriannuel, OPEX/CAPEX, reste à charge, retour sur investissement, frais de sortie, benchmark, remise en concurrence | « Un coût complet comparé sur 3 à 5 ans, frais de migration inclus » ; « des prix que vous pouvez prévoir » | « économies garanties », unsourced "-30 %" |
| **Dirigeant PME** | **piratage**, protéger mes données clients, « je ne sais pas par où commencer », **accompagnement**, **subvention**, aide, prêt, expert-comptable, temps, simplicité, « ça marche » | « Par où commencer, combien ça coûte, qui peut aider à financer » | « trajectoire finançable », « cartographie des dépendances » (explain it instead) |
| **Acheteur public / DGS** | **commande publique**, **doctrine Cloud au centre**, **SecNumCloud**, **SREN**, **données sensibles**, UGAP, marchés, critères d'attribution, **préférence européenne**, clause de non-soumission | « Répondre aux exigences de la doctrine et du décret SREN » | Private-sector ROI language only |

Notes:
- Cigref frames it as *captation économique* and « un impôt qui ne dit pas son nom ». These are strong but polemical; quote them, attributed, rather than adopting them.
- Hexatrust and Jamespot use « acte stratégique vs acte militant ». Souvara's register should clearly be the *strategic* one.
- "Souveraineté" is still the SEO head term and the public-sector word. On business-facing pages, pair it with or replace it by « indépendance », « maîtrise des dépendances », « résilience ».

---

## A3. How comparable French sites position themselves

Fetched 2026-09-26 (homepage H1, meta description and main promise).

| Site | Headline / H1 (verbatim) | Main promise | Money angle? |
|---|---|---|---|
| **OVHcloud** https://www.ovhcloud.com/fr/ | H1 « OVHcloud »; H2 « Économisez jusqu'à 30 % sur l'infrastructure Public Cloud »; meta « plus de 80 services au meilleur ratio performance/prix, ouverts et réversibles » | Price/performance, open, reversible, SecNumCloud range | **Yes, strong** (promo plus « coût maîtrisé ») |
| **Scaleway** https://www.scaleway.com/fr/ | « European Cloud & AI. » | « Levez l'incertitude sur vos coûts cloud grâce à une tarification simple et transparente… scaler sans mauvaise surprise » ; « La dépendance est l'ennemie de la résilience » | **Yes, predictability**: the best money phrasing in the set |
| **Numspot** https://numspot.com/ | « Déployez vos applications sur l'infrastructure de votre choix, sans verrouillage » | Portability, « réversibilité concrète pour limiter la dépendance fournisseur », SecNumCloud IaaS | Light (« Maîtrisez les performances et les coûts ») |
| **Whaller** https://whaller.com/fr/ | « Communiquer et collaborer en toute sécurité » | Security, « souveraine et cyber-renforcée » (DONJON), resilience back-up offer, UX score | No |
| **Jamespot** https://www.jamespot.com/ | « La plateforme collaborative souveraine au service du collectif » | Sovereign digital workplace, SecNumCloud/HDS hosting, « Réduisez les coûts logiciels » (a bullet) | Weak (one bullet) |
| **Wimi** https://www.wimi-teamwork.com/fr/ | « La suite collaborative souveraine et sécurisée » ; « Vos données restent en France. Point. » | All-in-one suite, SecNumCloud 3.2, hosted in France | Weak (only in a testimonial) |
| **Hexatrust** https://www.hexatrust.com/ · HexaSearch https://www.hexatrust.com/membres/ · HexaDiag https://www.hexatrust.com/hexadiag/ | « Trouver votre solution… l'HexaSwitch : le passage vers des solutions numériques européennes » | Free self-diagnostic (10 min, grade A–F, then referral to members) and a member catalogue | No. **Closest free substitute for Souvara's diagnostic and directory**, but members-only and cyber-centred |
| **La Suite numérique (DINUM)** https://lasuite.numerique.gouv.fr/ | « L'espace de travail ouvert et souverain des agents de l'État » | Open-source tools, hosted in France, « Utilisé chaque mois par plus de 500 000 agents » | No (free for agents) |
| **Cloud Temple** https://www.cloud-temple.com/ | « Accélérez votre transformation avec le meilleur du numérique de confiance » | SecNumCloud, HDS, managed services | No |
| **NoBullshit Conseil** (consultancy) https://nobullshitconseil.com/ | « On optimise vos opérations. On construit votre IA. Elle vous appartient. » | Ownership of code, models and data; measurable ROI case studies; France Num Activateur | **Yes, by outcome** (ROI in months) |
| **Nymphar.AI** (consultancy blog) https://nymphar.ai/blog/souverainete-numerique-pme-eti | « Souveraineté numérique PME : AI Act, NIS 2 et 4 étapes pour 2026 » | « sans rupture brutale, sans mégaprojet à 200 k€ » ; claims « TCO… 30 à 45 % inférieur » | Yes, but **unsourced claims**: the exact mistake Souvara must avoid |

**Overused clichés to avoid** (they appear on almost every site above):
- « souverain(e) » as an adjective on everything (« suite souveraine », « plateforme souveraine »). Cigref's doctrine now argues that a product cannot *be* sovereign.
- « en toute sécurité », « en toute confiance », « numérique de confiance »
- « Vos données restent en France » (necessary but not sufficient; it says nothing about the operator or the applicable law)
- « Ils nous font confiance » plus a logo wall, « +X 000 organisations »
- « Accélérez votre transformation », « au service de », « boostée à l'IA »
- « l'alternative européenne », « 100 % souverain », flag emojis 🇫🇷
- Unsourced savings percentages.

**Where Souvara can stand out:** nobody else in the set is **vendor-neutral across several vendors**, shows its **decision method**, and puts **cost, risk and funding** on the same page. Scaleway owns "predictable pricing" for infrastructure and OVH owns "price/performance". No one owns « **décider ce qui migre, ce qui reste, et à quel prix** » for a whole organisation.

---

## A4. Public funding an SME could use in 2026 (verified)

Rule: only list what the official page confirms as open. Re-check each quarter.

| Scheme | What it covers | Amount / cost left to pay | Eligibility | Status (checked 2026-09-26) | Link |
|---|---|---|---|---|---|
| **Diag Cybersécurité (Bpifrance)** | Expert cyber diagnostic plus action plan. A natural first step before choosing hosting or tools. | €8,800 HT; **50 % subsidised**, **€4,400 HT left to pay** (DGA covers 50 % for defence firms) | Independent SME >10 employees (EU definition); mid-caps case by case | Open (official page) | https://www.bpifrance.fr/catalogue-offres/diag-cybersecurite |
| **Diag Data IA (Bpifrance, France 2030, plan « Osez l'IA »)** | 8 expert-days: data and AI maturity, use cases, roadmap. Relevant when the migration includes data or AI hosting choices, and for the future AI-agent platform. | €10,000 HT max; **40 % funded by France 2030**, **€6,000 HT left to pay** | PME/ETI 10–2,000 FTE, revenue ≥ €1 m, registered in France | Open (official Bpifrance and DGE pages confirm 40 %; a secondary source says it was 25 % before 17 June 2026) | https://www.bpifrance.fr/catalogue-offres/diag-data-ia · https://www.entreprises.gouv.fr/priorites-et-actions/transition-numerique/accompagner-les-entreprises-dans-leur-transition/le-plan |
| **Accélérateurs IA (Bpifrance, France 2030)** | 12-day 360° diagnostic with an AI focus plus a programme | **46 % funded by France 2030** | PME/ETI | Open per DGE page (updated 30 July 2026) | https://conseil.bpifrance.fr/accelerateurs/accelerateurs-intelligence-artificielle |
| **MonAideCyber / « Diagnostic cyberdépart » (ANSSI)** | 1h30 guided diagnostic by an « Aidant cyber »; **6 priority measures** | **Free** | TPE/PME, local authorities, associations with **≥ 2 employees** (not sole traders) | Open | https://messervices.cyber.gouv.fr/cyberdepart · https://messervices.cyber.gouv.fr/services/mon-aide-cyber.html |
| **Prêt Boost – Transformation numérique (Bpifrance Flash, via France Num)** | Loan for software, **consulting**, **training / change management**, working capital for a digital project | **€5,000–75,000**, 3–5 years, **no personal guarantee**, 9–12 months deferral | Company > 3 years old, **2–49 employees** | Listed on France Num. Confirm current availability with Bpifrance before promising it. | https://www.francenum.gouv.fr/aides-financieres/financez-la-numerisation-de-votre-tpe-pme-avec-le-pret-boost-transformation |
| **France Num aid finder** (≈200 national and regional schemes, with CMA France) | A search tool for regional « chèques numériques » and similar | n/a | TPE/PME | Live | https://www.francenum.gouv.fr/aides-financieres |
| **EDIH (European Digital Innovation Hubs)** | "Test before invest", financing advice, training. The EU renewed 83 EDIHs in Oct 2025; 2026 call open | Often free or subsidised (varies by hub) | SMEs, public sector | Programme active. **Check which French hubs cover cloud/cyber before citing one.** | https://digital-strategy.ec.europa.eu/en/activities/edihs |
| **Crédit d'impôt innovation (CII)** | **Only** design of prototypes or pilot installations of a *new product*. **A migration to an existing tool is not eligible**; CIR is the same. Only relevant if the SME builds something new (e.g. its own product on the future AI platform). | 20 % in mainland France (higher overseas); spending up to 31 Dec 2027 | SMEs | Active (Service-Public checked 20 Feb 2026) | https://entreprendre.service-public.gouv.fr/vosdroits/F35494 |

**Do not list:**
- **Île-de-France « Chèque investissement Cyber »**: the official page says « CETTE AIDE N'EST PLUS PROPOSÉE ». https://www.iledefrance.fr/aides-et-appels-a-projets/cheque-investissement-cyber
- Regional schemes reported only by secondary blogs (AURA « Atouts numériques » up to €16k at 50 %, Hauts-de-France « Pass Cyber Conseil » €10k at 80 %, Occitanie « Chèque numérique ») and « France 2030 Cyber PME » (€80k at 70 %). **None could be confirmed on an official page in this session**; the official URLs tried returned 404 or 503. Verify each on the region's own site before publishing.

**Not a subsidy, but a money argument:** the EU Data Act removes cloud switching and egress fees for migrations from **12 Jan 2027** (see A1.1).

---

# PART B: Copy audit of souvara.fr

House rules kept in every rewrite: vouvoiement, sober and factual, no scare tactics, partners always disclosed, no invented numbers. Business outcome first (costs, predictability, risk); sovereignty as the reason it lasts.

Placeholders to fill before publishing: `[DÉLAI]` (response time), `[PRIX]` (price of the diagnostic, or « gratuit »), `[NOM]` (founder or publication director), `[N]` (number of directory entries).

---

## B1. Home: https://souvara.fr/

**Current**
- `<title>`: « Souvara — Souveraineté numérique par étapes »
- H1: « Vers la souveraineté numérique, par étapes. »
- Subheading: « Pour les DSI, RSSI, dirigeants et acteurs publics : cartographiez vos dépendances aux solutions étrangères, choisissez des alternatives adaptées et construisez une trajectoire finançable, sans interrompre les usages critiques. »
- Primary CTA: the embedded form « Diagnostic de souveraineté », « Commencez par vos coordonnées… », button « Continuer ». Secondary: « Voir la méthode ». Header: « Diagnostic de souveraineté ».

**What's weak**
- The H1 names a destination (« la souveraineté »), not a result for the reader. There is no cost, risk or time benefit above the fold.
- Half the subheading is an audience list, and the DAF is missing. « solutions étrangères » is vague and sounds political. « trajectoire finançable » is consultant jargon.
- « Continuer » is a button with no promise. Asking for email first, before any value, is the largest conversion leak on the site.
- « Trois voies, un même objectif » never names the objective.
- The AI-platform block (« en construction ») pulls attention away from the "step by step" promise and makes the offer look unfocused. Move it to a footer teaser or a separate page.
- No proof: no founder, no example deliverable, no response time, no price.

**Rewrite**

`<title>`: « Souvara — Réduire sa dépendance numérique, par étapes »
Meta description: « Diagnostic, comparaison de solutions françaises et européennes et recherche de financements pour réduire votre dépendance aux fournisseurs américains, sans rupture de service. »

H1 (recommended):
> **Maîtrisez vos coûts numériques et vos données, sans tout migrer d'un coup.**

Alternatives:
> Moins dépendre de vos fournisseurs américains, à votre rythme et à un coût prévisible.
> Vos licences augmentent. Votre marge de manœuvre peut augmenter aussi.

Subheading:
> Souvara identifie ce que vous coûtent réellement vos outils Microsoft, Google ou AWS et ce qui vous empêche d'en changer. Nous comparons les solutions françaises et européennes sur des critères publics et cherchons avec vous les financements disponibles. Vous décidez de ce qui migre, de ce qui reste, et quand.

Primary CTA: **« Faire le point sur ma situation »**, with the microcopy « 5 minutes · réponse sous [DÉLAI] · [PRIX] · aucune transmission à un fournisseur sans votre accord »
Secondary CTA: « Voir comment nous comparons les solutions »

Key paragraphs:

**Pourquoi maintenant**
> Les prix du logiciel et du cloud augmentent plus vite que les budgets : les DSI membres du Cigref constatent +8,7 % par an en moyenne sur trois ans et en anticipent +12 % par an ([Cigref, mai 2026](https://www.cigref.fr/de-la-dependance-technologique-a-la-captation-economique-ce-que-les-hausses-tarifaires-du-cloud-logiciel-coutent-a-leurope)). Microsoft 365 a relevé plusieurs de ses tarifs en 2026, appliqués à la date anniversaire de votre contrat. Dans le même temps, NIS2 et les exigences de vos clients renforcent les contrôles sur vos fournisseurs. Le meilleur moment pour préparer une alternative, c'est avant la prochaine échéance, pas le jour où elle tombe.

**Ce que vous obtenez** (replaces the abstract « Quatre décisions »)
> - **Un inventaire chiffré** : outils, contrats, dates de renouvellement, données concernées et coût annuel réel.
> - **Trois scénarios** : ce qui peut rester, ce qui gagne à être remis en concurrence, ce qui mérite une migration.
> - **Un coût complet comparé** sur 3 à 5 ans, frais de migration, formation et sortie inclus.
> - **Les financements mobilisables** pour votre cas : dispositifs publics et, si vous le souhaitez, partenaires.

**Trois façons d'avancer** (replaces « Trois voies, un même objectif »)
> 1. **Diagnostic et accompagnement.** Nous cartographions vos dépendances, chiffrons les scénarios et pilotons la trajectoire jusqu'au test de sortie.
> 2. **Solutions comparées.** [N] solutions françaises et européennes, décrites avec leurs preuves, leurs limites et leurs tarifs quand ils sont publics. Certaines sont des partenaires commerciaux : c'est indiqué sur chaque fiche, et cela ne change ni les critères ni l'ordre.
> 3. **Financement.** Diagnostics subventionnés par Bpifrance, prêts sans garantie personnelle, aides régionales : nous vérifions ce qui s'applique à votre organisation. Quand un partenaire finance une partie du projet, sa participation et notre éventuelle rémunération sont affichées.

**Pourquoi c'est durable**
> Réduire une dépendance, ce n'est pas seulement payer moins cette année. C'est pouvoir choisir votre fournisseur au prochain renouvellement, savoir quel droit s'applique à vos données et pouvoir en sortir si les conditions changent. C'est ce que recouvre, concrètement, la souveraineté numérique.

**Transparence** (short line above the directory preview)
> Souvara peut être rémunéré par certains fournisseurs pour une mise en relation. Ce lien est toujours affiché et ne vous engage à rien. [Notre politique de partenariats →]

---

## B2. Diagnostic: https://souvara.fr/diagnostic-souverainete

**Current**
- H1: « Diagnostic de souveraineté »
- Subheading: « Décrivez vos dépendances avant de choisir une solution. Indiquez les outils concernés, les données, les intégrations et votre échéance. La demande est relue avant toute orientation. »
- CTA: « Continuer » (step 1: coordonnées) … « Envoyer »
- Post-send block: « Après l'envoi — Les informations restent dans la file interne tant qu'aucun système de distribution n'est configuré… »

**What's weak**
- The page never says what the visitor receives, when, or at what price.
- « relue avant toute orientation » sounds administrative. « Résultat indépendant seulement » is unclear.
- **Internal note exposed** (see §0).
- The label « Mise en relation nominative » appears twice in a row.
- The form misses the money triggers: no « Hausse de prix / renouvellement » or « Appel d'offres ou exigence client » trigger, no « Réduire les coûts » goal, no DAF role, no DORA. The tool list misses VMware, Salesforce and Oracle, which are the main price-rise cases.
- Contact details come first.

**Rewrite**

H1:
> **Faites le point sur vos dépendances, vos coûts et vos options**

Subheading:
> Décrivez vos outils, vos contrats et vos échéances en 5 minutes. Sous [DÉLAI], vous recevez une première lecture écrite : ce qui peut rester, ce qui mérite d'être remis en concurrence, les points de conformité à vérifier et les financements auxquels vous pourriez prétendre.

CTA: **« Commencer le diagnostic »** (step 1). **« Recevoir ma première lecture »** (final submit).

Key paragraphs:

**Ce que contient la première lecture**
> - la liste de vos dépendances critiques et de leurs échéances contractuelles ;
> - une estimation de l'exposition aux hausses tarifaires annoncées pour vos outils ;
> - les obligations qui vous concernent (RGPD, NIS2, DORA, HDS, commande publique) ;
> - deux ou trois pistes concrètes, avec leur ordre de grandeur de coût : [CHIFFRE À SOURCER: fourchette type par pistes, à construire à partir des premiers diagnostics] ;
> - les dispositifs de financement applicables.

**Ce que nous ne faisons pas**
> Nous ne transmettons pas vos coordonnées à un fournisseur sans votre accord explicite, donné séparément et pour un fournisseur nommé. Vous pouvez demander un diagnostic sans aucune mise en relation.

**Après l'envoi** (replaces the internal note)
> Votre demande est lue par [NOM / « un consultant »], pas par un algorithme. Si des précisions sont nécessaires, nous vous proposons un échange de 30 minutes. Sinon, vous recevez la première lecture par e-mail sous [DÉLAI].

**Form changes**
- Order: 1. Votre situation, 2. Vos objectifs, 3. Vos coordonnées.
- « Fonction »: add « DAF / Direction financière », « Dirigeant(e) de PME », « Achats publics ».
- « Élément déclencheur »: add « Hausse de prix ou renouvellement », « Appel d'offres ou exigence d'un client », « Réduction des coûts », « Préparation NIS2 / DORA ».
- New field « Date du prochain renouvellement (facultatif) ».
- Tools: add VMware, Salesforce, Oracle, Dropbox, Zoom Phone (as relevant).
- Regulations: add DORA.
- Rename « Résultat indépendant seulement » to « Uniquement le diagnostic, sans mise en relation ».

---

## B3. À propos: https://souvara.fr/a-propos

**Current**
- `<title>`: « À propos de Souvara - Souvara — Souveraineté numérique par étapes »
- H1: « Rendre les choix numériques plus lisibles »
- Subheading: « Souvara est un site français de recherche, de diagnostic et d'orientation sur les dépendances numériques. »
- CTA: « Nous contacter »

**What's weak**
- The H1 is abstract; « lisibles » is not a buyer outcome.
- **« site français » conflicts with the legal notice** (publisher: Otospex Solutions SARL, Tunisia; hosting by Verpex Ltd, UK, with data in Frankfurt; no EU representative yet). A sovereignty audience *will* read the legal notice. Hiding this is the risk; explaining it is a credibility gain.
- No people, no experience, no reason to trust. « Le modèle prévoit » (future tense) makes the business sound hypothetical.
- The funding model is buried; no money benefit for the client.

**Rewrite**

`<title>`: « À propos — Souvara »

H1:
> **Un regard indépendant sur vos choix numériques, avec les coûts en face**

Subheading:
> Souvara aide les entreprises et les acteurs publics français à réduire leur dépendance aux fournisseurs américains en comparant les options sur des faits vérifiables : coût complet, droit applicable, sécurité, réversibilité.

CTA: « Faire le point sur ma situation »

Key paragraphs:

**Qui nous sommes**
> Souvara est dirigé par [NOM], [fonction / parcours en une phrase, ex. « X ans de conduite de projets d'infrastructure et de migration »]. [Ajouter 1 à 2 références vérifiables ou certifications.] Le service est édité par Otospex Solutions SARL, société de droit tunisien ; le site et les données des formulaires sont hébergés à Francfort, dans l'Union européenne. Les coordonnées complètes figurent dans les [mentions légales].
*(Editorial note: stating this openly beats being "found out". Also finish the EU representative designation (art. 27 GDPR) before launch, and consider an EU-headquartered host so the site practises what it recommends.)*

**Ce que nous faisons**
> Nous établissons l'inventaire de vos dépendances, chiffrons ce qu'elles vous coûtent et ce que coûterait d'en sortir, puis comparons les solutions françaises et européennes sur les mêmes critères. Nous cherchons aussi les financements publics ou privés qui peuvent réduire votre reste à charge.

**Comment nous sommes rémunérés**
> Par nos missions de diagnostic et d'accompagnement, et par certains fournisseurs lorsqu'une mise en relation aboutit. Cette relation est toujours affichée sur la fiche concernée ; elle ne permet à aucun fournisseur d'acheter une note, une place ou une recommandation. Si un partenaire participe au financement de votre projet, sa participation est indiquée au même titre.

**Ce que nous publions**
> Chaque fiche distingue les faits vérifiés, les affirmations du fournisseur et les questions ouvertes, avec ses sources et sa date de revue. Chaque fiche précise aussi les cas où la solution ne convient pas.

---

## B4. Méthode: https://souvara.fr/methode-evaluation

**Current**
- H1: « Évaluer une solution sans partir de sa marque »
- Subheading: « Nous partons du cas d'usage, des données et des contraintes de sortie. Une recommandation arrive ensuite, avec ses preuves, ses limites et ses alternatives. »
- CTA: « Évaluer mes dépendances » (and « Voir notre politique de transparence commerciale »)

**What's weak**
- The strongest page on the site: concrete and honest. The FAQ answer on cost (« Il n'existe pas d'écart universel… ») is exactly the right tone.
- But cost appears only as the last item of a list in step 3, and price predictability (indexation clauses, history of price rises, AI bundling) is not a criterion at all.
- « sans partir de sa marque » is clever but slightly obscure.

**Rewrite**

H1:
> **Comment nous comparons les solutions : coût complet, risques et réversibilité**

Subheading:
> Nous partons de votre usage réel, pas de la marque du fournisseur. Chaque option est examinée sur les mêmes critères publics, avec ses preuves, ses limites et ce qu'elle vous coûtera sur plusieurs années.

CTA: « Appliquer cette méthode à ma situation »

Key paragraphs (insert as a new step between the current steps 3 and 4):

**Chiffrer le coût complet, pas seulement l'abonnement**
> Nous comparons les scénarios sur 3 à 5 ans : licences, hébergement, intégration, migration, formation, support, exploitation et frais de sortie. Nous regardons aussi la prévisibilité : historique des hausses tarifaires, clauses d'indexation, fonctions imposées et facturées (par exemple l'IA intégrée), durée d'engagement. Une offre moins chère aujourd'hui peut coûter plus cher au deuxième renouvellement.

**Vérifier que la sortie est possible avant d'entrer**
> Une clause de réversibilité ne suffit pas. Nous demandons les formats d'export, les API, les délais et les coûts de sortie, et nous recommandons un test sur un périmètre réduit. Pour le cloud, le règlement européen sur les données (Data Act) supprime les frais de changement de fournisseur à partir du 12 janvier 2027 : un argument à faire valoir dès la négociation.

**Rendre le compromis explicite**
> Aucune solution n'est la meilleure partout. Nous indiquons où une solution européenne est au niveau, où elle est en retrait et ce que ce retrait coûte ou fait gagner.

Add to the FAQ: « Une solution européenne est-elle moins mature ? » (answer in the Objections section below).

---

## B5. Annuaire: https://souvara.fr/annuaire

**Current**
- H1: « Annuaire des solutions souveraines »
- Subheading: « Les fiches sont relues avant publication et classées par date de revue, puis par nom. Une relation commerciale ne modifie jamais cet ordre. »
- CTA: « Appliquer les filtres » / « Voir la fiche » / « Visiter le site »

**What's weak**
- Six entries under the word « Annuaire » over-promises. Say how many there are and how many are coming.
- « solutions souveraines » is the cliché, and per Cigref a product is not « souverain ».
- The subheading explains the sort order instead of the benefit.
- The « Déclaré par l'éditeur » badge contradicts « relues ».
- There is no filter by *what you are replacing* (the solution pages already carry « Alternative à Microsoft 365 », so expose it) and no filter by pricing model (« Tarifs publics » is a real differentiator for a DAF).

**Rewrite**

H1:
> **Solutions françaises et européennes, comparées sur les mêmes critères**

Subheading:
> [N] solutions décrites avec leur hébergement réel, leurs qualifications vérifiées, leur modèle tarifaire et leurs limites. Filtrez par outil à remplacer, par usage ou par type de tarif. Relation commerciale ou non, l'ordre et les critères sont les mêmes.

CTA per card: « Voir la fiche comparative ». Page-level CTA: « Pas sûr de la bonne option ? Décrire mon besoin ».

Key paragraphs:

**Ce que contient chaque fiche**
> Qui opère le service et depuis où, quel droit s'applique, quelles qualifications sont réellement publiées par l'ANSSI, combien cela coûte (quand le tarif est public), comment en sortir, et dans quels cas la solution ne convient pas.

**Badges** (replace « Déclaré par l'éditeur »): « Sources publiques, relu le JJ/MM/AAAA » · « Informations fournies par l'éditeur, vérifiées le … » · « Partenaire commercial » (always visible).

**Filters:** « Remplace : Microsoft 365 / Teams / Google Workspace / Slack / Zoom / AWS / Azure / VMware » · « Tarifs : publics / sur devis » · « Qualification : SecNumCloud / HDS / aucune ».

---

## B6. Indépendance numérique: https://souvara.fr/independance-numerique

**Current**
- H1: « Indépendance numérique : savoir de quoi l'on veut sortir »
- Subheading: « Réduire une dépendance ne consiste pas à remplacer tous les outils américains en une fois. Il faut identifier les services critiques, choisir une cible et vérifier que la sortie reste praticable. »
- CTA: « Demander un diagnostic »

**What's weak**
- Good substance, and « Une question de maîtrise, pas de drapeau » is the best line on the site: keep it.
- But the page never says what dependence *costs*: price rises taken without negotiating power, renewals signed by default, egress fees, coexistence paid twice. The « Classer avant de migrer » matrix is good and should also sort by money at stake.

**Rewrite**

H1:
> **Réduire sa dépendance numérique : par où commencer, et ce que cela change pour votre budget**

Subheading:
> Inutile de remplacer tous vos outils américains d'un coup. Commencez par ceux qui coûtent le plus cher, exposent vos données les plus sensibles ou arrivent bientôt à renouvellement.

CTA: « Faire l'inventaire de mes dépendances »

Key paragraphs:

**Ce que coûte une dépendance**
> Un fournisseur dont vous ne pouvez pas sortir fixe ses prix sans vraie négociation. Les DSI du Cigref constatent +8,7 % par an sur trois ans pour le logiciel et le cloud, et 40 % de ces hausses sont liées à des fonctions d'IA imposées ([Cigref, 2026](https://www.cigref.fr/de-la-dependance-technologique-a-la-captation-economique-ce-que-les-hausses-tarifaires-du-cloud-logiciel-coutent-a-leurope)). S'y ajoutent les frais de sortie, les connecteurs à maintenir et, pendant une migration mal préparée, deux abonnements à payer.

**Une question de maîtrise, pas de drapeau** (keep the current text; add one sentence)
> … Une solution française hébergée chez un sous-traitant soumis à un droit étranger ne règle pas le problème ; une solution américaine bien encadrée peut rester pertinente pour un usage peu sensible.

**Classer avant de migrer** (add a money axis)
> - **Critique, exposé et coûteux** : préparer une trajectoire et un test de sortie.
> - **Important mais substituable** : remettre en concurrence au prochain renouvellement, c'est souvent là que les économies se trouvent.
> - **Faible impact** : surveiller, sans ouvrir un projet disproportionné.

---

## B7. Sortir de Microsoft 365: https://souvara.fr/sortir-microsoft-365

**Current**
- `<title>`: « Sortir de Microsoft 365 sans migration brutale »
- H1: « Sortir de Microsoft 365 sans déplacer le risque ailleurs »
- Subheading: « La suite regroupe identité, messagerie, fichiers, réunions, bureautique et automatisations. Une trajectoire crédible sépare ces briques et traite leurs dépendances dans le bon ordre. »
- CTA: « Cadrer la trajectoire »

**What's weak**
- It is the highest-intent page on the site and **says nothing about the 2026 price rises**, the #1 reason people search for this.
- It skips the cheapest first step: right-sizing licences (unused seats, E3 users who only need Basic) before migrating anything.
- It names only two alternatives and says why the comparison is missing through an internal-process sentence.
- « Cadrer la trajectoire » is jargon for a CTA.

**Rewrite**

`<title>`: « Sortir de Microsoft 365 : réduire la facture et la dépendance, étape par étape »

H1:
> **Microsoft 365 : réduire la facture et la dépendance, brique par brique**

Subheading:
> Microsoft a relevé plusieurs de ses tarifs en 2026, appliqués à la date anniversaire de votre contrat. Avant de migrer quoi que ce soit, vérifiez ce que vous payez vraiment. Ensuite, séparez identité, messagerie, fichiers, réunions et bureautique pour ne migrer que ce qui en vaut la peine.

CTA: **« Estimer ma facture et mes options »**

Key paragraphs:

**Étape 0 : payer le juste prix, tout de suite**
> Comptes inactifs, licences surdimensionnées, options jamais utilisées : un audit des licences réduit souvent la facture avant toute migration. [CHIFFRE À SOURCER: part moyenne de licences inutilisées ou surdimensionnées, étude ou retour d'expérience]. C'est aussi ce qui vous donne un vrai point de comparaison.

**Ce qui change en 2026**
> Business Basic passe de 5,60 € à 6,50 € et Business Standard de 11,70 € à 13,10 € par utilisateur et par mois (engagement annuel) ; F3 augmente de 25 %. En France, la hausse s'applique à la date anniversaire du contrat ([Le Monde Informatique](https://www.lemondeinformatique.fr/actualites/lire-hausse-des-prix-de-microsoft-365-pour-les-entreprises-en-2026-98712.html) ; à vérifier sur la grille officielle Microsoft). Connaître votre date de renouvellement, c'est savoir de combien de temps vous disposez.

**Découper, puis comparer par brique** (keep the current list; add a line)
> Pour chaque brique, nous comparons le coût complet sur trois ans, l'effort de migration et le risque d'usage.

**Coexister sans payer deux fois indéfiniment** (reworked « Quand conserver une coexistence »)
> Une période hybride est souvent nécessaire. Elle doit avoir une date de fin, un responsable et un coût visible ; sinon, vous payez deux suites sans l'avoir décidé.

Delete the sentence « Une future page de comparaison ne sera publiée qu'après validation… ». Replace it with: « Comparatif détaillé en préparation. En attendant, voici les critères que nous utilisons → ».

---

## B8. Contact: https://souvara.fr/contact

**Current**
- `<title>`: « Nous contacter - Souvara — Souveraineté numérique par étapes »
- H1: « Nous contacter »
- Subheading: « Décrivez le cas d'usage, les outils concernés et vos contraintes de sortie. Nous utilisons les coordonnées fournies uniquement pour traiter votre demande conformément à notre notice de confidentialité. »
- CTA: « Continuer » / « Envoyer » (it is the full 3-step diagnostic form again)
- Bullet: « Le formulaire ci-dessous est le seul canal de contact publié au lancement. »

**What's weak**
- It duplicates the diagnostic, so there is no light way to ask a simple question. The « seul canal » line conflicts with contact@souvara.fr and reads as an internal note.
- The privacy sentence sits in the subheading.
- No response time.

**Rewrite**

H1:
> **Une question ? Écrivez-nous**

Subheading:
> Une question sur une solution, un financement ou un partenariat : réponse sous [DÉLAI]. Pour une analyse de votre situation, le [diagnostic] est plus rapide.

CTA: « Envoyer ma question ». Secondary: « Faire le diagnostic ».

Key paragraphs:
> **Par e-mail** : contact@souvara.fr
> **Fournisseurs** : pour signaler une erreur sur une fiche, indiquez l'URL, le passage concerné et votre source.
> **Vos données** : utilisées uniquement pour vous répondre. Jamais transmises à un fournisseur sans votre accord séparé. [Notice de confidentialité]

Form: 4 fields only (e-mail, nom, organisation, message) plus the consent box.

---

## B9. Transparence partenariats: https://souvara.fr/transparence-partenariats

**Current**
- H1: « Ce qui influence une recommandation, et ce qui ne l'influence pas »
- Subheading: « Souvara peut être rémunéré pour une mise en relation. Ce lien commercial est affiché sur la page concernée et ne donne pas droit à un classement favorable. »
- CTA: « Lire la méthode »

**What's weak**
- H1 and subheading are good. Keep them.
- Missing a **current partner list** (name, type of relationship, how Souvara is paid). Without it, "always disclosed" is a promise, not a proof.
- « Le cas AIFEL » contradicts the form (see §0).
- The financing route is not explained: if a financing partner pays Souvara, say so.
- « Règle pour les alternatives » is internal editorial policy wording.

**Rewrite**

H1: keep. Subheading:
> Souvara peut être rémunéré par un fournisseur pour une mise en relation, ou par un partenaire financeur. Chaque relation est listée ci-dessous et affichée sur la fiche concernée. Aucune ne donne droit à une meilleure note, une meilleure place ou une recommandation hors de son cas d'usage.

CTA: « Voir les critères d'évaluation ».

Key paragraphs:

**Nos partenaires à ce jour** (table)
> | Partenaire | Type | Ce que nous percevons | Depuis |
> |---|---|---|---|
> | AIFEL | Mise en relation, visioconférence | [commission / forfait — à préciser] | [date] |
> | … | Financement | … | … |
> *Liste mise à jour le JJ/MM/AAAA.*

**Ce que cela change pour vous**
> Rien sur l'analyse : mêmes critères, mêmes alternatives affichées. Une chose sur la mise en relation : vos coordonnées ne sont transmises qu'au fournisseur nommé, avec votre accord séparé, révocable à tout moment.

**Quand un partenaire finance votre projet**
> Certains partenaires peuvent cofinancer une migration. Leur participation, ses conditions et ce que Souvara perçoit sont indiqués avant tout engagement. Vous pouvez toujours comparer avec une solution non partenaire.

**Le cas AIFEL** (align with reality: choose one)
> « AIFEL est partenaire commercial non exclusif de Souvara depuis [date] pour la visioconférence. Aucune caractéristique technique ou environnementale n'est présentée comme acquise avant vérification des preuves. »
> *or*, if no contract yet, remove AIFEL from the form consent until it exists.

---

# PART C: Site-wide messaging hierarchy

### One-line value proposition
> **Souvara aide les organisations françaises à réduire leur dépendance aux fournisseurs américains, étape par étape : des coûts plus prévisibles, des données mieux protégées et un projet en partie financé.**

Short form (header, ads, LinkedIn): « Moins dépendre. Mieux prévoir. Étape par étape. »

### Three pillars

| Pillar | Promise (FR) | Supporting messages | Proof needed |
|---|---|---|---|
| **1. Maîtriser la facture** | « Payez ce que vous utilisez, à un prix que vous pouvez prévoir. » | Full cost over 3–5 years; right-sizing licences; renegotiate or re-tender at renewal; public prices preferred; Data Act removes switching fees from 2027 | Cigref figures; M365 price table; 2–3 anonymised diagnostics with before/after costs `[CHIFFRE À SOURCER: économies constatées sur les premiers diagnostics]` |
| **2. Réduire le risque** | « Savoir quel droit s'applique à vos données, et pouvoir partir si les conditions changent. » | Extraterritoriality, including subcontractors; NIS2/DORA/GDPR/SREN obligations; tested reversibility; continuity | Published method and criteria; ANSSI catalogue links on every sheet; sample exit-test checklist |
| **3. Avancer sans rupture, et pas seul** | « On garde ce qui fonctionne, on remplace ce qui coûte ou expose trop, avec les financements disponibles. » | Pilot batch; planned coexistence; change management; Bpifrance diagnostics, Prêt Boost, regional aid; disclosed partners | Verified funding table (A4); named consultant; response time; partner list |

**Sovereignty's role:** the closing line of each pillar, not the headline. For example: « C'est ce qui rend l'économie durable : au prochain renouvellement, vous aurez le choix. »

### Proof points to build before launch (ranked)
1. **A named person** and their relevant experience on `/a-propos`.
2. **A sample deliverable**: 1–2 anonymised pages of a diagnostic (inventory table plus scenarios plus funding).
3. **A published response time and price** (or « gratuit ») for the first reading.
4. **Partner list** with the remuneration model.
5. **Directory count and review dates** (already present per sheet; add a page-level count).
6. **First case studies** with real, sourced cost figures. Until then, write nothing that implies results.
7. **Consistency of the brand's own set-up** (EU representative, publication director filled in, optionally EU-headquartered hosting).

### Objections and answers (use in FAQs, on the diagnostic page and in sales calls)

**« Migrer va nous coûter plus cher que ce qu'on économise. »**
> Parfois, oui, et nous vous le dirons. C'est pour cela que nous comparons le coût complet sur plusieurs années, migration, formation et coexistence comprises, et que nous commençons par ce qui rapporte sans migrer : licences inutiles, renégociation, remise en concurrence au renouvellement. Côté cloud, le Data Act interdit les frais de changement de fournisseur à partir du 12 janvier 2027. Et une partie du diagnostic peut être subventionnée (par exemple 50 % pour le Diag Cybersécurité de Bpifrance).

**« Nos outils américains fonctionnent très bien. »**
> Nous ne proposons pas de les remplacer par principe. La question est ailleurs : pouvez-vous en changer si le prix, les conditions ou le cadre juridique évoluent ? Plusieurs éditeurs ont relevé leurs tarifs de façon importante ces dernières années, et les clients qui n'avaient pas préparé d'alternative ont eu peu de marge de négociation. Garder un outil qui marche, en sachant comment en sortir, est déjà un progrès.

**« Les solutions européennes sont moins matures. »**
> C'est vrai pour certains usages et faux pour d'autres. C'est pour cela que chaque fiche indique où la solution est au niveau, où elle est en retrait et pour qui elle ne convient pas. Les grands groupes interrogés par France Digitale et EY ne basculeraient qu'à performance équivalente : c'est aussi notre critère. Un pilote sur une équipe représentative permet de le vérifier chez vous avant de décider.

**« Nos équipes ne suivront pas. »**
> La conduite du changement fait partie du coût, et nous la chiffrons. Nous recommandons un lot pilote réversible, des critères de réussite fixés à l'avance et une coexistence datée. La formation et la conduite du changement peuvent être financées, par exemple par le Prêt Boost – Transformation numérique de Bpifrance pour les entreprises de 2 à 49 salariés.

**« Nous sommes trop petits pour ce sujet. »**
> Les TPE-PME sont les plus exposées aux hausses de licences, faute de pouvoir négocier. Le diagnostic est proportionné : pour une petite structure, il tient souvent en quelques échanges. L'ANSSI propose en plus un premier diagnostic cyber gratuit (MonAideCyber) à partir de deux salariés.

**« Si des fournisseurs vous paient, êtes-vous vraiment neutres ? »**
> Chaque relation est affichée, avec ce que nous percevons. Les critères et l'ordre de l'annuaire sont les mêmes pour tous, et vous pouvez demander un diagnostic sans aucune mise en relation.

**« Qui est derrière Souvara ? »**
> [Answer with the named person, the publisher, the data location, and a link to the legal notice. See B3.]

**« Microsoft propose une "frontière de données UE". Cela ne suffit pas ? »**
> Cela règle la localisation, pas nécessairement le droit applicable à l'opérateur. Le responsable juridique de Microsoft France l'a lui-même indiqué devant la commission d'enquête du Sénat en 2025. [Cite the Senate report directly.] Selon la sensibilité de vos données, cela peut suffire ou non : c'est précisément ce que le diagnostic établit.

---

## Sources (all accessed 2026-09-26)

Market and surveys
- Cigref/Asterès, price rises (May 2026): https://www.cigref.fr/de-la-dependance-technologique-a-la-captation-economique-ce-que-les-hausses-tarifaires-du-cloud-logiciel-coutent-a-leurope
- Cigref doctrine note (June 2026): https://www.cigref.fr/souverainete-et-resilience-numeriques-note-de-position-doctrinale-du-cigref
- CESIN barometer 2026: https://www.itforbusiness.fr/11e-barometre-cesin-2026-cyber-99603 · https://www.informatiquenews.fr/barometre-cesin-2026-moins-dattaques-plus-dimpacts-109218 · https://www.opinion-way.com/fr/publications/barometre-de-la-cybersecurite-des-entreprises-francaises-2026-22229/
- Hexatrust × EY barometer 2025 (PDF): https://www.ey.com/content/dam/ey-unified-site/ey-com/fr-fr/services/cybersecurity/documents/ey-barometre-de-la-souverainete-numrique-sep-2025.pdf
- Hexatrust barometer 2026 (announcement): https://www.solutions-numeriques.com/barometre-de-la-souverainete-numerique-2026-hexatrust-veut-mesurer-le-passage-a-laction/
- France Digitale × EY 2026: https://www.blogdumoderateur.com/souverainete-numerique-solutions-europeennes-pas-hauteur-grands-groupes
- Numspot/Acteurs publics/Ifop: https://numspot.com/ressource/barometre-souverainete-numerique-et-secteur-public/
- France Num barometer 2025: https://www.francenum.gouv.fr/files/2025-09/Barom%C3%A8tre%20France%20Num%202025%20-%20Rapport.pdf
- INSEE TIC 2025: https://www.insee.fr/fr/statistiques/9025878?sommaire=8677764
- Numeum outlook: https://numeum.fr/wp-content/uploads/2025/12/2025-S2-Observatoire-de-conjoncture-NUMEUM-PAC-corrige-1.pdf
- Bpifrance Le Lab AI study: https://lelab.bpifrance.fr/storage/sites/31/2026/01/IA-dans-les-PME-et-ETI-Francaises-Revolution-Tranquille.pdf
- Microsoft 365 prices 2026: https://www.lemondeinformatique.fr/actualites/lire-hausse-des-prix-de-microsoft-365-pour-les-entreprises-en-2026-98712.html
- VMware/Broadcom: https://www.usine-digitale.fr/informatique/vmware/vmware-malgre-la-hausse-des-prix-il-ny-a-pas-eu-dexode-massif-des-clients-car-la-migration-reste-trop-compliquee-pour-beaucoup-dentre-eux.4JXP6BDK2NDSLHXJXAQ536W3YU.html · https://www.ictjournal.ch/news/2026-03-24/le-cispe-depose-une-plainte-contre-broadcom
- Data Act switching: https://www.donneespersonnelles.fr/portabilite-donnees-cloud-data-act
- NIS2 transposition: https://aide.monespacenis2.cyber.gouv.fr/fr/article/avancement-de-la-transposition-de-la-directive-nis-2-1b3j1da/ · https://www.legiscope.com/blog/transposition-nis2-france.html
- SREN decree: https://www.economie.gouv.fr/daj/publication-du-decret-dapplication-de-larticle-31-de-la-loi-sren-relatif-la-protection-des-donnees-dune-sensibilite-particuliere-de-letat

Competitors
- https://www.ovhcloud.com/fr/ · https://www.scaleway.com/fr/ · https://numspot.com/ · https://whaller.com/fr/ · https://www.jamespot.com/ · https://www.wimi-teamwork.com/fr/ · https://www.hexatrust.com/membres/ · https://www.hexatrust.com/hexadiag/ · https://lasuite.numerique.gouv.fr/ · https://www.cloud-temple.com/ · https://nobullshitconseil.com/ · https://nymphar.ai/blog/souverainete-numerique-pme-eti

Funding
- https://www.bpifrance.fr/catalogue-offres/diag-cybersecurite
- https://www.bpifrance.fr/catalogue-offres/diag-data-ia
- https://www.entreprises.gouv.fr/priorites-et-actions/transition-numerique/accompagner-les-entreprises-dans-leur-transition/le-plan
- https://conseil.bpifrance.fr/accelerateurs/accelerateurs-intelligence-artificielle
- https://messervices.cyber.gouv.fr/cyberdepart · https://messervices.cyber.gouv.fr/services/mon-aide-cyber.html
- https://www.francenum.gouv.fr/aides-financieres/financez-la-numerisation-de-votre-tpe-pme-avec-le-pret-boost-transformation
- https://www.francenum.gouv.fr/aides-financieres
- https://digital-strategy.ec.europa.eu/en/activities/edihs
- https://entreprendre.service-public.gouv.fr/vosdroits/F35494
- Closed: https://www.iledefrance.fr/aides-et-appels-a-projets/cheque-investissement-cyber

Research limits: the web-search quota ran out before regional schemes (AURA, Hauts-de-France, Occitanie), the full Hexatrust 2026 results and a second Wavestone check could be confirmed. Those are marked "verify" above rather than stated.
