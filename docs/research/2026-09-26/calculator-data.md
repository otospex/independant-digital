# Souvara cost calculator: pricing and assumption data

Compiled 2026-09-26 for the souvara.fr calculator: US vs European productivity suites and infrastructure, and AI API vs local inference.

**Conventions**
- Every price was read from the page cited in its row, on the date shown. Most rows are dated 2026-09-26.
- EUR HT (excluding VAT) unless stated otherwise.
- USD prices are converted at the ECB reference rate of 25 Sept 2026, **1 EUR = 1.1403 USD**, and every converted figure is marked **ESTIMATE**.
- **ESTIMATE** marks any derived or assumed value, with its reasoning. **UNVERIFIED** marks a figure seen only in a search snippet.
- **sur devis** means the vendor publishes no price.
- Section 2 (infrastructure) was compiled in French. The table columns are the same.

**Headline defaults (central case, details and sources in each section)**

| Parameter | Default | Where |
|---|---|---|
| Microsoft 365 Business Standard / Office 365 E3 / Microsoft 365 E3 | €12.13 / €26.27 / €37.78 per user/month (annual commitment) | §1a |
| Google Workspace Business Standard | €13.60 annual / €16.20 Flexible | §1a |
| Infomaniak kSuite Business / Enterprise | €6.58 / €12.41 (−50 % in year 1) | §1b |
| Nextcloud Enterprise Standard / Premium | €71.29 / €104.99 per user/year, 100-user minimum | §1b |
| VM 4 vCPU/16 GB, per month | AWS 150.57 · Azure 140.38 · GCP e2 99.53 · OVH 74.68 · Scaleway 107.31 · Outscale 148.92 | §2 |
| Egress per TB | AWS 79 · Azure 75 · GCP 75–105 · OVH / Scaleway instances / Outscale 0 | §2 |
| EU GPU per hour | L4 €0.75–0.79 · L40S €1.40–1.47 · H100 €2.80–3.31 (OVH, Scaleway) | §3a |
| Server purchase (ESTIMATE) | 1× L40S €20k · 1× RTX PRO 6000 €28k · 2× H100 NVL €75–85k | §3b |
| Electricity, French business | **€0.18/kWh HT** (range 0.13–0.23); TRV Bleu Pro 0.1624 from 1 Aug 2026 | §3b |
| PUE, small on-prem room | 1.8 (range 1.5–2.0) ESTIMATE | §3b |
| Migration / training per user | €150 / €150 (low 50/60, high 300/445) | §4 |
| Dual-running | 2 months (0.5–3, or until renewal) | §4 |
| US SaaS price escalation | **8 %/yr** (5 % / 12 %) | §4 |

---

# 1. Productivity suites

## 1a. US productivity suites: France list prices (EUR HT, per user per month)

All prices were read from the official France pages on 2026-09-26. Microsoft pages state "La T.V.A. n'est pas comprise dans le prix". Google states "n'inclut pas les taxes".

### Microsoft 365 Business (max 300 users)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Microsoft 365 Business Basic | Microsoft | 6,07 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/with-teams-plans-and-pricing |
| Microsoft 365 Business Basic | Microsoft | 7,28 € | per user/month, monthly commitment ("abonnement mensuel") | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/with-teams-plans-and-pricing |
| Microsoft 365 Business Standard | Microsoft | 12,13 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/with-teams-plans-and-pricing |
| Microsoft 365 Business Standard | Microsoft | 14,56 € | per user/month, monthly commitment | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/with-teams-plans-and-pricing |
| Microsoft 365 Business Premium | Microsoft | 19,06 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/microsoft-365-business-premium |
| Microsoft 365 Business Premium | Microsoft | 22,87 € | per user/month, monthly commitment | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/microsoft-365-business-premium |
| Microsoft 365 Business Basic EEE (sans Teams) | Microsoft | 4,67 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/no-teams-plans-and-pricing |
| Microsoft 365 Business Basic EEE (sans Teams) | Microsoft | 5,60 € | per user/month, monthly commitment | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/no-teams-plans-and-pricing |
| Microsoft 365 Business Standard EEE (sans Teams) | Microsoft | 9,34 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/no-teams-plans-and-pricing |
| Microsoft 365 Business Standard EEE (sans Teams) | Microsoft | 11,21 € | per user/month, monthly commitment | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/no-teams-plans-and-pricing |
| Microsoft 365 Business Premium EEE (sans Teams) | Microsoft | 16,28 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/no-teams-plans-and-pricing |
| Microsoft 365 Business Premium EEE (sans Teams) | Microsoft | 19,54 € | per user/month, monthly commitment | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/no-teams-plans-and-pricing |
| Microsoft 365 Apps for business (no Teams) | Microsoft | 11,00 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/no-teams-plans-and-pricing |
| Microsoft 365 Apps for business (no Teams) | Microsoft | 13,20 € | per user/month, monthly commitment | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/no-teams-plans-and-pricing |
| Microsoft 365 Business Standard + Copilot Business (bundle) | Microsoft | 20,36 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/compare-all-microsoft-365-business-products |
| Microsoft 365 Business Premium + Copilot Business (bundle) | Microsoft | 27,73 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/compare-all-microsoft-365-business-products |
| Business Standard EEE (sans Teams) + Copilot Business (bundle) | Microsoft | 17,58 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/compare-all-microsoft-365-business-products |
| Business Premium EEE (sans Teams) + Copilot Business (bundle) | Microsoft | 24,94 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/compare-all-microsoft-365-business-products |
| Microsoft 365 Copilot Business (add-on) | Microsoft | 18,20 € (promo 15,60 € in year 1) | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/with-teams-plans-and-pricing |
| Microsoft Teams Essentials | Microsoft | 3,50 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-teams/essentials |
| Microsoft Teams Phone Standard (add-on) | Microsoft | 8,70 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/with-teams-plans-and-pricing |
| Microsoft Defender for Business (add-on) | Microsoft | 2,60 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/with-teams-plans-and-pricing |
| Business plan, annual commitment paid monthly | Microsoft | not shown on page. ESTIMATE: annual price × 1.05 | per user/month, annual commitment, monthly payment | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/business/with-teams-plans-and-pricing |

Notes:
- The page's billing toggle has two options. **Annuel** ("Profitez de jusqu'à 16 % d'économies") gives the "paiement annuel" price. **Mensuel** gives the "Abonnement mensuel – renouvellement automatique" price. On every Business SKU the monthly-commitment price is exactly **+20 %** over the annual price (for example 19,06 → 22,87).
- The FAQ lists three options: monthly commitment paid monthly, **annual commitment paid monthly**, and annual commitment paid annually. The page does **not** give a price for "annual commitment paid monthly". The usual +5 % uplift for this option could not be confirmed on any page fetched today (the web-search quota ran out). Treat ×1.05 as an ESTIMATE only.
- Copilot Business promo: "valable du 1er juillet 2026 au 31 décembre 2026 … le prix promotionnel s'applique la première année uniquement". It requires an annual subscription and an existing Business subscription. Microsoft also announced that usage-based billing will be on by default for new Copilot Business licences from 2 Nov 2026 (Partner Center, Sept 2026 index).
- Copilot Chat (web-grounded) is included at no extra cost with eligible plans. Agents are billed on usage through an Azure subscription.

### Microsoft 365 / Office 365 Enterprise (no user cap, annual commitment only on the web page)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Office 365 E1 | Microsoft | 8,66 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/office-365-plans-and-pricing |
| Office 365 E1 EEE (sans Teams) | Microsoft | 5,88 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/office-365-plans-and-pricing |
| Office 365 E3 | Microsoft | 26,27 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/office-365-plans-and-pricing |
| Office 365 E3 EEE (sans Teams) | Microsoft | 18,85 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/office-365-plans-and-pricing |
| Office 365 E5 | Microsoft | 41,42 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/office-365-plans-and-pricing |
| Office 365 E5 EEE (sans Teams) | Microsoft | 34,01 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/office-365-plans-and-pricing |
| Microsoft 365 Apps for enterprise | Microsoft | 15,40 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/office-365-plans-and-pricing |
| Microsoft 365 E3 | Microsoft | 37,78 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/microsoft-365-plans-and-pricing |
| Microsoft 365 E3 EEE (sans Teams) | Microsoft | 30,36 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/microsoft-365-plans-and-pricing |
| Microsoft 365 E5 | Microsoft | 58,13 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/microsoft-365-plans-and-pricing |
| Microsoft 365 E5 EEE (sans Teams) | Microsoft | 50,71 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/microsoft-365-plans-and-pricing |
| Microsoft 365 E7 (Frontier Suite) | Microsoft | 91,92 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/microsoft-365-plans-and-pricing |
| Microsoft 365 E7 EEE (sans Teams) | Microsoft | 84,51 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/microsoft-365-plans-and-pricing |
| Microsoft Teams Enterprise / "Microsoft Teams EEE" (add-on for no-Teams suites) | Microsoft | 7,41 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/office-365-plans-and-pricing |
| Microsoft 365 Copilot (enterprise add-on) | Microsoft | 26,00 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/microsoft-365-plans-and-pricing |
| Agent 365 (add-on, included in E7) | Microsoft | 13,00 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/microsoft-365-plans-and-pricing |
| Enterprise Mobility + Security E3 (add-on) | Microsoft | 10,40 € | per user/month, annual commitment, paid annually | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/office-365-plans-and-pricing |
| Enterprise plans, monthly commitment or monthly payment | Microsoft | sur devis (not shown on page) | n/a | 2026-09-26 | https://www.microsoft.com/fr-fr/microsoft-365/enterprise/microsoft-365-plans-and-pricing |

Notes:
- The enterprise pages show only "paiement annuel (Abonnement annuel)". EA and CSP pricing is negotiated, so treat any other terms as sur devis.
- The "no Teams" suites and a separate Teams licence are Microsoft's EEE (EU/EEA) unbundling. To rebuild a "with Teams" equivalent: no-Teams suite + Teams Enterprise 7,41 € (for example O365 E3 no-Teams 18,85 + 7,41 = 26,26 ≈ O365 E3 26,27).

### Microsoft price changes 2026 (context for the calculator)

- **1 July 2026 global price increase.** Announced 4 Dec 2025 and effective 1 Jul 2026 for new customers and at the next renewal for existing ones. USD list prices, old → new: Business Basic $6→$7 (+16 %), Business Standard $12.50→$14 (+12 %), Business Premium $22 (unchanged), O365 E1 $10 (unchanged), O365 E3 $23→$26 (+13 %), O365 E5 $38→$41 (+8 %), M365 E3 $36→$39 (+8 %), M365 E5 $57→$60 (+5 %), F1 $2.25→$3, F3 $8→$10. No-Teams variants rise by similar dollar amounts (for example O365 E3 no-Teams $14.45→$17.45). Sources: https://www.microsoft.com/en-us/licensing/news/2026-m365-packaging-pricing-updates and https://learn.microsoft.com/en-us/partner-center/announcements/2025-december (both fetched 2026-09-26).
- **1 Feb 2026 EUR cut.** Cloud prices in EUR were cut by **−7.4 %** from 1 Feb 2026 to align with global levels. Source: https://learn.microsoft.com/en-us/partner-center/announcements/2025-december.
- The two changes together explain the current French prices: EUR list prices fell 7.4 % in February and then rose by the July USD percentages (Business Premium was not increased). No pre-2026 French price page was fetched, so older EUR figures are not recorded here.
- **Next EUR revision.** From FY27, local-currency prices will be revised once a year, every January. The next one is **1 Jan 2027**, with guidance due in November 2026. Source: https://learn.microsoft.com/en-us/partner-center/announcements/2026-july (#14). The calculator figures may therefore change in January 2027.

### Google Workspace (Starter, Standard, Plus: max 300 users)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Google Workspace Business Starter | Google | 6,80 € | per user/month, annual commitment ("Annuel", billed monthly) | 2026-09-26 | https://workspace.google.com/intl/fr/pricing |
| Google Workspace Business Starter | Google | 8,10 € | per user/month, Flexible plan (no commitment, billed monthly) | 2026-09-26 | https://workspace.google.com/intl/fr/pricing |
| Google Workspace Business Standard | Google | 13,60 € | per user/month, annual commitment, billed monthly | 2026-09-26 | https://workspace.google.com/intl/fr/pricing |
| Google Workspace Business Standard | Google | 16,20 € | per user/month, Flexible plan | 2026-09-26 | https://workspace.google.com/intl/fr/pricing |
| Google Workspace Business Plus | Google | 21,10 € | per user/month, annual commitment, billed monthly | 2026-09-26 | https://workspace.google.com/intl/fr/pricing |
| Google Workspace Business Plus | Google | 25,30 € | per user/month, Flexible plan | 2026-09-26 | https://workspace.google.com/intl/fr/pricing |
| Google Workspace Enterprise (Standard/Plus) | Google | sur devis | "Contacter le service commercial" | 2026-09-26 | https://workspace.google.com/intl/fr/pricing |

Notes:
- The page states: "Tous les forfaits facturés mensuellement. Tous les prix en €EUR. Le prix est par utilisateur et par mois, et n'inclut pas les taxes." The "Annuel (économisez 16 % en vous engageant pour un an)" switch is on by default. The flexible prices were read after switching it off. Annual ≈ flexible × 0.84.
- New-customer promotions vary between page loads, so do not use them as list prices. Offers seen today: annual −30 % (Starter/Standard) and −20 % (Plus) for 3 months; flexible −50 % (Starter/Standard) and −30 % (Plus) for 3 months. One load showed a "prix découverte" of 6,12 / 12,24 € for the first 20 users for 12 months.
- Gemini AI is bundled in every plan: Gemini in Gmail on Starter, and Gemini in Gmail, Docs, Meet and more on Standard and above. No separate Gemini add-on price is shown. Storage per user: 30 GB Starter, 2 TB Standard, 5 TB Plus and Enterprise.

## 1b. European productivity / collaboration suites: prices

Checked 2026-09-26. Prices come from pages fetched that day unless a row says otherwise. "HT not stated" means the page shows a bare € figure and does not say whether VAT is included (these are B2B pages, so HT is likely but not confirmed). ESTIMATE rows show the working.

### Infomaniak kSuite Pro (Swiss, hosted in CH)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| kSuite Free | Infomaniak | 0 | free, 15 GB total, 1 address | 2026-09-26 | https://www.infomaniak.com/fr/ksuite/ksuite-pro/tarifs |
| kSuite Standard | Infomaniak | 1.58 | per user/month, annual-commitment price shown | 2026-09-26 | https://www.infomaniak.com/fr/ksuite/ksuite-pro/tarifs |
| kSuite Business | Infomaniak | 6.58 (3.29 in year 1, -50%) | per user/month, annual commitment | 2026-09-26 | https://www.infomaniak.com/fr/ksuite/ksuite-pro/tarifs |
| kSuite Enterprise | Infomaniak | 12.41 (6.21 in year 1, -50%) | per user/month, annual commitment | 2026-09-26 | https://www.infomaniak.com/fr/ksuite/ksuite-pro/tarifs |
| kMeet (visio) | Infomaniak | 0 | free and unlimited, also included in kSuite | 2026-09-26 | https://www.infomaniak.com/fr/ksuite/kmeet |

Notes:
- The page says "Les prix n'incluent pas la TVA", so these are HT. The old names "kSuite Pro / Entreprise" are gone; the tiers are now Standard / Business / Enterprise.
- There is a Mensuel/Annuel toggle, but the page loads on the annual view (order links use `period=12`). I could not capture the monthly-billing price.
- Included:
  - Standard: 50 GB storage and 2 mail addresses per user, with unlimited mail storage.
  - Business: 3 TB and 5 addresses per user, plus Microsoft Office Online.
  - Enterprise: 6 TB and 10 addresses per user, plus SSO/SCIM. Custom Brand is included on Enterprise and an option on Business.
  - Every tier includes kDrive, OnlyOffice-based Docs/Grids/Points, kChat, kMeet and the Euria AI.
- Limits: up to 300 users (200 on Standard), then contact sales. Data is hosted in Switzerland. The page does not mention SecNumCloud or HDS.

### Nextcloud Enterprise (on-prem / self-hosted subscription)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Files Standard | Nextcloud GmbH | 71.29 (53.17 at 200+ users) | per user/year, min 100 users; VAT basis not stated | 2026-09-26 | https://nextcloud.com/pricing/ |
| Files Premium | Nextcloud GmbH | 104.99 (81.99 at 200+ users) | per user/year, min 100 users | 2026-09-26 | https://nextcloud.com/pricing/ |
| Files Ultimate | Nextcloud GmbH | 204.75 (183.75 at 200+ users) | per user/year, min 100 users | 2026-09-26 | https://nextcloud.com/pricing/ |
| Talk Standard (add-on) | Nextcloud GmbH | 42 (31.50 at 250+ users) | per user/year, min 100 users | 2026-09-26 | https://nextcloud.com/pricing/ |
| ESTIMATE: Files Standard per month | Nextcloud GmbH | 5.94 (4.43 at 200+ users) | per user/month = yearly ÷ 12 | 2026-09-26 | https://nextcloud.com/pricing/ |
| ESTIMATE: Files Premium per month | Nextcloud GmbH | 8.75 (6.83 at 200+ users) | per user/month = yearly ÷ 12 | 2026-09-26 | https://nextcloud.com/pricing/ |
| ESTIMATE: Files Ultimate per month | Nextcloud GmbH | 17.06 (15.31 at 200+ users) | per user/month = yearly ÷ 12 | 2026-09-26 | https://nextcloud.com/pricing/ |

Notes:
- The page no longer lists a "Basic" tier. The tiers are now Standard / Premium / Ultimate.
- These prices are for the software subscription and support only. Hosting and operations are extra.
- Ultimate adds the AI Assistant, workflow, whiteboard, MS integrations and 24/7 support.
- Office editing (Nextcloud Office/Collabora) is not priced separately on this page. Mail is not included.

### Hosted Nextcloud (EU hosts)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Nextcloud Workspace, 1 user | IONOS (DE datacentres) | 7.50 (promo 5.00 for 1 month) | per month for 1 user | 2026-09-26 | https://www.ionos.fr/solutions-bureau/nextcloud-workspace |
| Nextcloud Workspace, 5 users | IONOS | 35.00 (promo 10.00 for 3 months) | per month for 5 users (7.00/user) | 2026-09-26 | https://www.ionos.fr/solutions-bureau/nextcloud-workspace |
| Nextcloud Workspace, 25 users | IONOS | 158.00 (promo 25.00 for 1 month) | per month for 25 users (6.32/user) | 2026-09-26 | https://www.ionos.fr/solutions-bureau/nextcloud-workspace |
| Managed Nextcloud 500 GB | IONOS | 6.00 | per month, 5 users, cancel anytime | 2026-09-26 | https://www.ionos.fr/solutions-bureau/herbergement-managed-nextcloud |
| Managed Nextcloud 1 TB | IONOS | 9.00 (promo 1.00 for 3 months) | per month, 10 users | 2026-09-26 | https://www.ionos.fr/solutions-bureau/herbergement-managed-nextcloud |
| Managed Nextcloud 3 TB | IONOS | 20.00 | per month, 25 users | 2026-09-26 | https://www.ionos.fr/solutions-bureau/herbergement-managed-nextcloud |
| Managed Nextcloud 10 TB | IONOS | 45.00 | per month, 50 users | 2026-09-26 | https://www.ionos.fr/solutions-bureau/herbergement-managed-nextcloud |
| Managed Nextcloud + Collabora (500 GB / 1 TB / 3 TB / 10 TB) | IONOS | 8.00 / 11.00 / 28.50 / 53.50 | per month (5 / 10 / 25 / 50 users) | 2026-09-26 | https://www.ionos.fr/solutions-bureau/herbergement-managed-nextcloud |
| Storage Share NX11 (1 TB) | Hetzner (Falkenstein DE) | 4.29 (third-party listing, not checked on Hetzner's page) | per month per instance, unlimited users, excl. VAT | 2026-02-13 (per whtop) | https://www.whtop.com/amp/plans/hetzner.com/128273 |
| Storage Share NX21 (5 TB) / NX31 (10 TB) | Hetzner | not captured | per month per instance | 2026-09-26 | https://www.hetzner.com/storage/storage-share/ |

Notes:
- IONOS shows prices as HT with the TTC figure beside them. Nextcloud Workspace includes a 50 GB mailbox, 1 TB per user, online office, Talk chat and visio, and an AI assistant.
- Managed Nextcloud is file-centric. Office editing needs the Collabora option, and it has no mail box.
- Hetzner's page loads its prices with JavaScript and they did not render in either fetch. The €4.29 NX11 figure comes from a third-party directory and should be treated as unverified.

### ONLYOFFICE

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| DocSpace Startup (cloud) | Ascensio System (ONLYOFFICE) | 0 | free; max 3 admins, 12 rooms, 2 GB | 2026-09-26 | https://www.onlyoffice.com/fr/docspace-prices.aspx |
| DocSpace Business (cloud) | ONLYOFFICE | 20 (regular 30, "limited-time offer") | per ADMIN/month, unlimited users/guests; HT not stated | 2026-09-26 | https://www.onlyoffice.com/fr/docspace-prices.aspx |
| DocSpace Enterprise (on-prem) | ONLYOFFICE | sur devis | per number of connections | 2026-09-26 | https://www.onlyoffice.com/fr/docspace-prices.aspx |
| Workspace Enterprise / Plus / Premium (on-prem) | ONLYOFFICE | sur devis | lifetime licence, 50 users/server, 1 year of updates and support | 2026-09-26 | https://www.onlyoffice.com/fr/workspace-prices.aspx |
| Workspace cloud | ONLYOFFICE | sur devis | no public cloud price | 2026-09-26 | https://www.onlyoffice.com/fr/workspace.aspx |

Notes:
- DocSpace Business gives 250 GB per admin and covers document rooms and editing only. It has no mail or visio.
- The Workspace editions differ only in support SLA: 48 h, 24 h or 12 h.

### BlueMind, Wimi, Oodrive, Jamespot, Whaller (French suites)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| BlueMind (SaaS or on-prem) | BlueMind | sur devis | no public price on the official site | 2026-09-26 | https://www.bluemind.net/en/buy-bluemind/ |
| Wimi Communauté | Wimi | 3 | per user/month, no commitment; HT not stated | 2026-09-26 | https://www.wimi-teamwork.com/fr/tarifs |
| Wimi Drive | Wimi | 9 | per user/month, up to 100 internal users | 2026-09-26 | https://www.wimi-teamwork.com/fr/tarifs |
| Wimi Projets | Wimi | 12 | per user/month, up to 100 users | 2026-09-26 | https://www.wimi-teamwork.com/fr/tarifs |
| Wimi Suite | Wimi | 15 | per user/month, up to 100 users | 2026-09-26 | https://www.wimi-teamwork.com/fr/tarifs |
| Wimi Drive Entreprise | Wimi | 12 | per user/month, from 50 users | 2026-09-26 | https://www.wimi-teamwork.com/fr/tarifs |
| Wimi Projets Entreprise | Wimi | 15 | per user/month, from 50 users | 2026-09-26 | https://www.wimi-teamwork.com/fr/tarifs |
| Wimi Suite Entreprise / SecNumCloud / Diffusion Restreinte | Wimi | sur devis | from 50 users | 2026-09-26 | https://www.wimi-teamwork.com/fr/tarifs |
| Oodrive Work Standard / Enterprise (incl. SecNumCloud 3.2 variants) | Oodrive | sur devis | Standard from 1 user (25 GB/user); Enterprise from 10 users (1 TB/user) | 2026-09-26 | https://www.oodrive.com/fr/tarifs/ |
| Jamespot Suite bureautique (Team Work) Découverte | Jamespot | 3,480 | per year, up to 50 users; HT not stated | 2026-09-26 | https://www.jamespot.com/tarifs/ |
| Jamespot Suite bureautique Essentiel | Jamespot | 3.90 + 290 platform fee | per user/month + €290/month subscription | 2026-09-26 | https://www.jamespot.com/tarifs/ |
| Jamespot Suite bureautique Avancé | Jamespot | 6.90 + 290 platform fee | per user/month + €290/month subscription | 2026-09-26 | https://www.jamespot.com/tarifs/ |
| Jamespot RSE / Intranet Essentiel / Avancé | Jamespot | 2.90 / 4.90 + 290 platform fee | per user/month + €290/month (RSE Découverte 3,480/yr up to 100 users) | 2026-09-26 | https://www.jamespot.com/tarifs/ |
| Jamespot Enterprise (all lines) | Jamespot | sur devis | | 2026-09-26 | https://www.jamespot.com/tarifs/ |
| Whaller Standard | Whaller | 0 | free, up to 100 members/organisation | 2026-09-26 | https://whaller.com/fr/pricing |
| Whaller Pro | Whaller | 3 | per user/month (monthly or annual) | 2026-09-26 | https://whaller.com/fr/pricing |
| Whaller Business / Enterprise / DONJON | Whaller | sur devis | | 2026-09-26 | https://whaller.com/fr/pricing |
| ESTIMATE: Jamespot Essentiel, 20 users | Jamespot | 18.40 per user/month | (3.90×20 + 290) ÷ 20; the fixed fee dominates for small teams | 2026-09-26 | https://www.jamespot.com/tarifs/ |

Notes:
- **BlueMind** is a mail and groupware product (Outlook-compatible). Third-party sites quote about €2.10/user/month SaaS, but I could not confirm that on bluemind.net, so the calculator should use "sur devis".
- **Wimi**
  - Wimi Drive includes documents, drive and co-editing (OnlyOffice), with 250 GB. Projets adds chat, visio, tasks and agenda. Suite includes 1 TB. "Boites mails souveraines" is an option on every tier.
  - Commitment discounts: 1 year = 1 month free (about 8%); 2 years = 3 months free (about 12.5%).
  - The page states **SecNumCloud SaaS 3.2** for the SecNumCloud offers. It covers the chat/visio, documents/co-editing, projects and agenda services. It excludes Wimi Drive, Wimi Mail and Wimi Sign, and covers web access only. The page also states **HDS**. Hosting is in France.
- **Oodrive Work** covers secure file sharing, e-signature and co-editing. The page states **SecNumCloud qualified since 2019 (renewed as v3.2 in 2025)** and **HDS certified**.
- **Jamespot**
  - The Suite bureautique includes co-editing, chat, visio, agenda, Kanban and an AI assistant. Storage is 250 GB (Essentiel) or 500 GB (Avancé). Email is an option.
  - SaaS only. You choose the host: OVH, Outscale, Scaleway or Orange.
  - The page mentions ISO 27001. It does not mention SecNumCloud or HDS.
- **Whaller**
  - The free tier already includes visio. Pro adds agendas, boxes, kanbans and a portal.
  - Whaller **DONJON is SecNumCloud 3.2 qualified** (per the page).
  - Whaller is mainly a private social network, not a mail or office suite.

### Proton for Business (Swiss)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Mail Essentials | Proton AG | 6.99 | per user/month, billed annually (83.88/yr); "Des taxes peuvent s'appliquer" | 2026-09-26 | https://proton.me/fr/business/plans |
| Workspace Standard | Proton AG | 12.99 | per user/month, billed annually (155.88/yr) | 2026-09-26 | https://proton.me/fr/business/plans |
| Workspace Standard | Proton AG | 14.99 | per user/month, monthly billing | 2026-09-26 | https://proton.me/fr/business/plans |
| Workspace Premium | Proton AG | 19.99 | per user/month, billed annually (239.88/yr) | 2026-09-26 | https://proton.me/fr/business/plans |
| Workspace Premium | Proton AG | 24.99 | per user/month, monthly billing | 2026-09-26 | https://proton.me/fr/business/plans |
| Enterprise | Proton AG | sur devis | | 2026-09-26 | https://proton.me/fr/business/plans |

Notes:
- The names have changed. "Proton Business Suite" is now **Workspace Standard / Premium**. **Mail Professional is deprecated** (per https://proton.me/support/proton-for-business).
- I did not capture the monthly-billing price for Mail Essentials.
- Tax is shown as extra ("taxes may apply"), so treat these prices as excluding VAT.
- What each plan includes:
  - Mail Essentials: 15 GB, 3 domains, mail, calendar, docs and sheets, and Meet limited to 1 h / 50 participants.
  - Workspace Standard: 1 TB per user, Mail, Calendar, Drive, Docs/Sheets, Meet (100 participants, 24 h), VPN and Pass.
  - Workspace Premium: 3 TB, Meet up to 250 participants, and Lumo AI.

### Zimbra hosted (FR)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Zimbra Starter | OVHcloud | 0.30 (0.36 TTC) | per account/month | 2026-09-26 | https://www.ovhcloud.com/fr/emails/zimbra-emails/ |
| Zimbra Pro | OVHcloud | 1.82 (2.19 TTC) | per account/month | 2026-09-26 | https://www.ovhcloud.com/fr/emails/zimbra-emails/ |
| Zimbra Business | OVHcloud | not priced ("coming soon") | | 2026-09-26 | https://www.ovhcloud.com/fr/emails/zimbra-emails/ |

Notes:
- Starter: 15 GB, webmail, calendar, contacts and tasks.
- Pro: 50 GB, ActiveSync, file storage, office suite with real-time co-editing.
- Business (coming soon) adds team chat and visio.
- Hosted in France. The page does not mention SecNumCloud or HDS.

### Videoconferencing

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| TixeoCloud | Tixeo | sur devis | from 10 organisers; no public price | 2026-09-26 | https://www.tixeo.com/en/tixeo-offers/ |
| TixeoPrivateCloud / TixeoServer | Tixeo | sur devis | from 50 organisers | 2026-09-26 | https://www.tixeo.com/en/tixeo-offers/ |
| kMeet (Jitsi-based) | Infomaniak | 0 | free, unlimited; included in kSuite | 2026-09-26 | https://www.infomaniak.com/fr/ksuite/kmeet |
| JaaS Dev | 8x8 | 0 | 25 MAU | 2026-09-26 | https://jaas.8x8.vc/#/pricing |
| JaaS Basic | 8x8 | USD 99/month, ESTIMATE ≈ 86.82 | per month, 300 MAU, excl. taxes | 2026-09-26 | https://jaas.8x8.vc/#/pricing |
| JaaS Standard | 8x8 | USD 499/month, ESTIMATE ≈ 437.60 | per month, 1,500 MAU | 2026-09-26 | https://jaas.8x8.vc/#/pricing |
| JaaS Business | 8x8 | USD 999/month, ESTIMATE ≈ 876.09 | per month, 3,000 MAU | 2026-09-26 | https://jaas.8x8.vc/#/pricing |
| JaaS overage | 8x8 | USD 0.99, ESTIMATE ≈ 0.87 | per extra MAU | 2026-09-26 | https://jaas.8x8.vc/#/pricing |
| Visio (La Suite numérique) | DINUM | n/a for private companies | public agents only (see below) | 2026-09-26 | https://lasuite.numerique.gouv.fr/ |

Notes:
- **Tixeo**: the page states **ANSSI CSPN certification** for its technology. TixeoPrivateCloud runs on **SecNumCloud-qualified hosting**. TixeoCloud is on a European sovereign public cloud and the page does not claim SecNumCloud for it. A third-party site claims "2,880 € HT/an pour 20 organisateurs" (about €12/organiser/month), but I could not confirm it on tixeo.com, so do not use it.
- **8x8 JaaS**: USD was converted at the ECB reference rate of 1 EUR = 1.1403 USD (2026-09-25), from https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/eurofxref-graph-usd.en.html. 8x8 is a US company, so it is not a sovereignty alternative; it is included only as a Jitsi price reference.
- **Proton Meet** is bundled in the Proton Workspace plans (see above).

### La Suite numérique (DINUM)

The site quotes the eligibility rule verbatim: "Pour l'instant, l'accès aux outils de La Suite Numérique est réservé : aux agents de la fonction publique d'État, ainsi qu'à leurs collaborateurs et partenaires invités, uniquement dans le cadre de missions menées avec le service public, via la plateforme ProConnect." It also says "LaSuite n'est pas destinée à un usage interne aux entreprises privées."

- A private company can only take part as an invited partner on public missions. It cannot use La Suite for its own internal work.
- The components (Docs, Visio on LiveKit, Tchap on Matrix, Fichiers, Grist, Messagerie, FranceTransfert) are open source. A private organisation may "déployer sa propre instance, et l'exploiter sous sa responsabilité". That means self-hosting, with the cost being hosting plus operations. There is no DINUM price.
- Source: https://lasuite.numerique.gouv.fr/ (checked 2026-09-26).

### SecNumCloud / HDS summary (as stated on the pages)

| Offer | Qualification or certification stated |
|---|---|
| Oodrive Work | SecNumCloud 3.2 and HDS |
| Wimi | SecNumCloud SaaS 3.2 (only the SecNumCloud offers, partial scope) and HDS |
| Whaller | SecNumCloud 3.2 (DONJON offer only) |
| Tixeo | CSPN (ANSSI); SecNumCloud hosting for PrivateCloud only |
| Jamespot | ISO 27001 only |
| Infomaniak, Proton, OVH Zimbra, IONOS, Nextcloud, ONLYOFFICE, BlueMind | not stated on the pages fetched |

---

# 2. Infrastructure

## 2 — Infrastructure (IaaS) : prix de référence

Taux de change utilisé pour les conversions USD→EUR : **taux de référence BCE du 2026-09-25, 1 EUR = 1,1403 USD** (https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml, consulté le 2026-09-26). Toute valeur convertie est marquée **ESTIMATE**.
Convention : mois = 730 h. « 1 To » = 1 000 unités de facturation du fournisseur (Go ou Gio selon le fournisseur, précisé dans la base de facturation) ; pour un Tio exact, multiplier par 1,024. Tous les prix sont HT, en tarif public (list price), hors remises négociées.

### (a) VM généraliste 4 vCPU / 16 Go, Linux, à la demande

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| m7i.xlarge (4 vCPU / 16 GiB), eu-west-3 Paris | AWS | 0,2063 €/h ; 150,57 €/mois (ESTIMATE, de 0,2352 USD/h ; 171,70 USD/mois) | à l'heure, on-demand, Linux, tenancy partagée | 2026-09-26 | https://pricing.us-east-1.amazonaws.com/offers/v1.0/aws/AmazonEC2/current/eu-west-3/index.csv |
| m7i.xlarge, réservation 1 an Standard, sans paiement initial | AWS | 99,31 €/mois (ESTIMATE, de 0,15512 USD/h, soit 113,24 USD/mois) | taux horaire effectif sur un engagement de 1 an | 2026-09-26 | https://pricing.us-east-1.amazonaws.com/offers/v1.0/aws/AmazonEC2/current/eu-west-3/index.csv |
| m6i.xlarge (4 vCPU / 16 GiB), eu-west-3 Paris | AWS | 0,1964 €/h ; 143,40 €/mois (ESTIMATE, de 0,224 USD/h ; 163,52 USD/mois) | à l'heure, on-demand, Linux | 2026-09-26 | https://pricing.us-east-1.amazonaws.com/offers/v1.0/aws/AmazonEC2/current/eu-west-3/index.csv |
| m6i.xlarge, réservation 1 an Standard, sans paiement initial | AWS | 94,58 €/mois (ESTIMATE, de 0,14774 USD/h, soit 107,85 USD/mois) | engagement de 1 an | 2026-09-26 | https://pricing.us-east-1.amazonaws.com/offers/v1.0/aws/AmazonEC2/current/eu-west-3/index.csv |
| Standard_D4s_v5 (4 vCPU / 16 GiB), France Central | Azure | 0,1923 €/h ; 140,38 €/mois | à l'heure, paiement à l'usage, Linux (prix publié en EUR) | 2026-09-26 | https://prices.azure.com/api/retail/prices?currencyCode=EUR&$filter=armRegionName eq 'francecentral' and armSkuName eq 'Standard_D4s_v5' |
| Standard_D4s_v5, réservation 1 an | Azure | 1 039,84 €/an, soit 86,65 €/mois | engagement de 1 an (prix de réservation publié en EUR) | 2026-09-26 | https://prices.azure.com/api/retail/prices (même filtre) |
| e2-standard-4 (4 vCPU / 16 GiB), europe-west9 Paris | Google Cloud | 0,1363 €/h ; 99,53 €/mois (ESTIMATE, de 0,155464 USD/h ; 113,49 USD/mois) | à l'heure, on-demand | 2026-09-26 | https://cloud.google.com/products/compute/pricing/general-purpose |
| e2-standard-4, CUD 1 an (engagement de ressources) | Google Cloud | 62,70 €/mois (ESTIMATE, de 71,49 USD/mois) | engagement de 1 an | 2026-09-26 | https://cloud.google.com/products/compute/pricing/general-purpose |
| n2-standard-4 (4 vCPU / 16 GiB), europe-west9 Paris | Google Cloud | 0,1976 €/h ; 144,24 €/mois (ESTIMATE, de 0,22531 USD/h ; 164,48 USD/mois) | à l'heure, on-demand (avant remise automatique d'usage soutenu) | 2026-09-26 | https://cloud.google.com/products/compute/pricing/general-purpose |
| n2-standard-4, CUD 1 an | Google Cloud | 90,87 €/mois (ESTIMATE, de 103,62 USD/mois) | engagement de 1 an | 2026-09-26 | https://cloud.google.com/products/compute/pricing/general-purpose |
| b3-16 (4 vCore / 16 Go, 100 Go NVMe) | OVHcloud Public Cloud | 0,1023 €/h ; 74,68 €/mois (730 h) | à l'heure | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| b3-16, Savings Plan 12 mois | OVHcloud Public Cloud | 63,48 €/mois | engagement de 12 mois | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| b2-15 (4 vCore / 15 Go, 100 Go SSD) | OVHcloud Public Cloud | 0,1342 €/h ; 48,05 €/mois | à l'heure, ou forfait mensuel | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| POP2-4C-16G (4 vCPU / 16 Go) | Scaleway | 0,147 €/h ; ~107,31 €/mois | à l'heure, trafic sortant inclus | 2026-09-26 | https://www.scaleway.com/fr/tarifs/virtual-instances/ |
| VM sur mesure 4 vCore (v5) + 16 GiB, option MEDIUM, eu-west-2 | Outscale | 0,204 €/h ; 148,92 €/mois | calculé : 4 × 0,031 € (vCore) + 16 × 0,005 € (Gio RAM), facturé à la seconde | 2026-09-26 | https://fr.outscale.com/tarifs/ |
| VM sur mesure 4 vCore (v5) + 16 GiB, option HIGH, eu-west-2 | Outscale | 0,220 €/h ; 160,60 €/mois | calculé : 4 × 0,035 € + 16 × 0,005 € | 2026-09-26 | https://fr.outscale.com/tarifs/ |
| VM sur mesure 4 vCore (v7) + 16 GiB, option HIGH, eu-west-2 | Outscale | 0,232 €/h ; 169,36 €/mois | calculé : 4 × 0,038 € + 16 × 0,005 € | 2026-09-26 | https://fr.outscale.com/tarifs/ |
| VM sur mesure 4 vCore (v5) + 16 GiB, option HIGH, cloudgouv-eu-west-1 (région secteur public) | Outscale | 0,264 €/h ; 192,72 €/mois | calculé : 4 × 0,042 € + 16 × 0,006 € | 2026-09-26 | https://fr.outscale.com/tarifs/ |
| Outscale, réservation / Savings Plan | Outscale | sur devis | aucune grille publique relevée | 2026-09-26 | https://fr.outscale.com/tarifs/ |
| Scaler XL (8 vCPU / 16 Go), PaaS, zone Paris | Clever Cloud | 0,4222 €/h ; 308,22 €/mois | à l'heure, facturé à la seconde | 2026-09-26 | https://api.clever-cloud.com/v4/billing/price-system?zone_id=par |
| Scaler M (4 vCPU / 4 Go), zone Paris | Clever Cloud | 0,1056 €/h ; 77,06 €/mois | à l'heure | 2026-09-26 | https://api.clever-cloud.com/v4/billing/price-system?zone_id=par |
| Nœud Kubernetes composé : 4 vCPU + 16 Go, zone Paris | Clever Cloud | 0,100 €/h ; 73,00 €/mois | calculé : 4 × 0,002778 €/vCPU/h + 16 × 0,005556 €/Go/h | 2026-09-26 | https://api.clever-cloud.com/v4/billing/price-system?zone_id=par |

Notes :
- **AWS** : prix tirés de l'API officielle AWS Price List (publication du 2026-09-25). La page on-demand d'AWS précise que les 100 premiers Go de trafic sortant par mois sont gratuits, cumulés sur tous les services et toutes les régions.
- **GCP** : la page officielle intègre les données de toutes les régions. Les prix Paris ont été extraits de ces données, avec un contrôle sur le prix Iowa (0,134 USD/h pour e2, attendu) et un recoupement avec gcloud-compute.com (données du 2026-09-21 : e2-standard-4 Paris 0,1555 USD/h, CUD 1 an 71,49 USD/mois). N2 bénéficie en plus d'une remise automatique d'usage soutenu : gcloud-compute.com indique ~131,62 USD/mois pour une utilisation sur tout le mois.
- **OVHcloud** : la page indique qu'à compter du 1ᵉʳ octobre 2026, le stockage local et l'IPv4 ne seront plus inclus dans le prix des instances b3, c3 et r3 et seront facturés à part. Il faut donc ajouter une IPv4 publique au b3-16, dont le tarif n'a pas été relevé. Les prix affichés correspondent à la localisation par défaut de la page ; une région 3-AZ (Paris) peut coûter plus cher.
- **Clever Cloud** : c'est un PaaS, pas un IaaS. Il n'existe pas de scaler 4 vCPU / 16 Go ; XL est la taille la plus proche en RAM. Les prix viennent de l'API publique de tarification (devise EUR, zone par), celle que sert le simulateur du site. Le caractère HT est présumé mais n'est pas indiqué par l'API.
- **Outscale** : les prix sont publiés HT, par vCore et par Gio de RAM. Le niveau de performance (MEDIUM, HIGH, HIGHEST) et la génération de CPU font varier le prix.

### (b) Stockage bloc SSD — 1 To par mois

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| EBS gp3, eu-west-3 | AWS | 81,38 €/mois (ESTIMATE, de 0,0928 USD/Go-mois × 1 000 = 92,80 USD) | Go-mois provisionné (3 000 IOPS / 125 Mo/s inclus) | 2026-09-26 | https://pricing.us-east-1.amazonaws.com/offers/v1.0/aws/AmazonEC2/current/eu-west-3/index.csv |
| Premium SSD P30 (1 Tio), France Central | Azure | 140,43 €/mois | par disque et par mois (taille fixe de 1 024 Gio) | 2026-09-26 | https://prices.azure.com/api/retail/prices?currencyCode=EUR (serviceName 'Storage', skuName 'P30 LRS') |
| Standard SSD E30 (1 Tio), France Central | Azure | 72,54 €/mois (+ 0,0017 € par tranche de 10 000 opérations) | par disque et par mois (1 024 Gio) | 2026-09-26 | https://prices.azure.com/api/retail/prices?currencyCode=EUR (skuName 'E30 LRS') |
| pd-balanced, europe-west9 | Google Cloud | 101,73 €/mois (ESTIMATE, de 0,116 USD/Gio-mois × 1 000 = 116 USD) | Gio-mois provisionné | 2026-09-26 | https://cloud.google.com/compute/disks-image-pricing |
| Block Storage High Speed Gen2 | OVHcloud | 86,87 €/mois (~0,08687 €/Go-mois) | Go-heure (0,000119 €), granularité 1 Go | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| Block Storage Classic | OVHcloud | 43,07 €/mois (~0,04307 €/Go-mois) | Go-heure (0,000059 €) | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| Block Storage 5K, région Paris | Scaleway | 94,90 €/mois (0,000130 €/Go/h × 730) | Go-heure | 2026-09-26 | https://www.scaleway.com/fr/tarifs/storage/ |
| Block Storage 15K, région Paris | Scaleway | 129,21 €/mois (0,000177 €/Go/h × 730) | Go-heure | 2026-09-26 | https://www.scaleway.com/fr/tarifs/storage/ |
| BSU « Performance », eu-west-2 | Outscale | 110,00 €/mois (0,110 €/Gio-mois) | Gio-mois | 2026-09-26 | https://fr.outscale.com/tarifs/ |
| BSU « Performance », cloudgouv-eu-west-1 | Outscale | 132,00 €/mois (0,132 €/Gio-mois) | Gio-mois | 2026-09-26 | https://fr.outscale.com/tarifs/ |
| Stockage bloc | Clever Cloud | non applicable (PaaS ; FS Buckets à la place, non relevé) | — | 2026-09-26 | https://api.clever-cloud.com/v4/billing/price-system?zone_id=par |

Notes : AWS gp3 et GCP pd-balanced sont les classes SSD « généralistes » les plus comparables. Chez Azure, un disque P30 ou E30 est facturé comme un disque entier de 1 Tio. Premium SSD v2 existe aussi, mais l'API arrondit son prix de capacité à 0,0001 €/Gio/h, ce qui le rend inexploitable ici. Outscale « Enterprise » coûte 0,130 €/Gio + 0,010 € par IOPS provisionné et par mois.

### (c) Stockage objet, classe standard — 1 To par mois

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| S3 Standard, eu-west-3 | AWS | 21,05 €/mois (ESTIMATE, de 0,024 USD/Go × 1 000 = 24 USD) | Go-mois, palier jusqu'à 50 To | 2026-09-26 | https://pricing.us-east-1.amazonaws.com/offers/v1.0/aws/AmazonS3/current/eu-west-3/index.json |
| Blob Storage Hot LRS, France Central | Azure | 16,50 €/mois (0,0165 €/Go) | Go-mois, palier jusqu'à 50 To | 2026-09-26 | https://prices.azure.com/api/retail/prices?currencyCode=EUR (productName 'Blob Storage', skuName 'Hot LRS') |
| Cloud Storage Standard (régional), europe-west9 | Google Cloud | 20,17 €/mois (ESTIMATE, de 0,023 USD/Gio × 1 000 = 23 USD) | Gio-mois | 2026-09-26 | https://cloud.google.com/storage/pricing |
| Object Storage Standard | OVHcloud | 7,10 €/mois (~0,0070956 €/Gio-mois) | Gio-heure (0,00000972 €), requêtes et trafic gratuits | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| Object Storage High Performance | OVHcloud | 18,25 €/mois (~0,01825 €/Gio-mois) | Gio-heure | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| Object Storage Standard Multi-AZ | Scaleway | 16,06 €/mois (0,01606 €/Go-mois) | Go-heure (0,000022 €) | 2026-09-26 | https://www.scaleway.com/fr/tarifs/storage/ |
| Object Storage Standard One Zone | Scaleway | 8,03 €/mois (0,00803 €/Go-mois) | Go-heure (0,000011 €) | 2026-09-26 | https://www.scaleway.com/fr/tarifs/storage/ |
| OOS Enterprise, eu-west-2 | Outscale | 25,00 €/mois (0,025 €/Gio) | Gio-mois | 2026-09-26 | https://fr.outscale.com/tarifs/ |
| OOS Enterprise, cloudgouv-eu-west-1 | Outscale | 30,00 €/mois (0,030 €/Gio) | Gio-mois | 2026-09-26 | https://fr.outscale.com/tarifs/ |
| Cellar, zone Paris | Clever Cloud | 20,76 €/mois (0,000028444 €/Go/h × 730 ; soit 0,02048 €/Go sur 720 h) | Go-heure, 100 premiers Mo gratuits, palier jusqu'à 1 To | 2026-09-26 | https://api.clever-cloud.com/v4/billing/price-system?zone_id=par |

Note : les requêtes API sont en plus chez AWS, Azure et GCP. Elles sont gratuites chez OVHcloud Standard et incluses chez Scaleway.

### (d) Trafic sortant vers Internet — par To

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Transfert sortant vers Internet depuis eu-west-3 (palier 1 : jusqu'à 10 To) | AWS | 78,93 €/To (ESTIMATE, de 0,09 USD/Go × 1 000 = 90 USD) ; 100 Go/mois gratuits, cumulés sur tous les services et toutes les régions | par Go | 2026-09-26 | https://pricing.us-east-1.amazonaws.com/offers/v1.0/aws/AWSDataTransfer/current/eu-west-3/index.json ; https://aws.amazon.com/ec2/pricing/on-demand/ |
| Transfert sortant, routage réseau Microsoft (par défaut), France Central | Azure | 74,70 €/To (0,0747 €/Go) ; 100 premiers Go/mois gratuits | par Go, palier 100 Go → 10 To | 2026-09-26 | https://prices.azure.com/api/retail/prices?currencyCode=EUR&$filter=serviceName eq 'Bandwidth' and armRegionName eq 'francecentral' |
| Transfert sortant, routage « Internet », France Central | Azure | 68,70 €/To (0,0687 €/Go) ; 100 premiers Go/mois gratuits | par Go | 2026-09-26 | idem |
| Trafic sortant Premium Tier depuis Paris vers l'Europe (1 Gio → 1 Tio) | Google Cloud | 105,24 €/To (ESTIMATE, de 0,12 USD/Gio × 1 000 = 120 USD) ; 1 Gio/mois gratuit | par Gio | 2026-09-26 | https://cloud.google.com/vpc/network-pricing |
| Trafic sortant Standard Tier depuis Paris (200 Gio → 10 Tio) | Google Cloud | 74,54 €/To (ESTIMATE, de 0,085 USD/Gio) ; 200 Gio/mois gratuits, cumulés sur toutes les régions | par Gio | 2026-09-26 | https://cloud.google.com/vpc/network-pricing |
| Trafic sortant des instances Public Cloud | OVHcloud | 0 € (inclus) | inclus | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| Trafic sortant Object Storage | OVHcloud | 0 € (« gratuit pour l'ensemble de nos clients », hors entités APAC après le 31/12/2026) | inclus | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| Trafic sortant des instances | Scaleway | 0 € (« Les prix incluent le trafic sortant ») | inclus | 2026-09-26 | https://www.scaleway.com/fr/tarifs/virtual-instances/ |
| Egress Object Storage | Scaleway | 10 €/To (0,01 €/Go) ; 75 Go/mois gratuits | par Go | 2026-09-26 | https://www.scaleway.com/fr/tarifs/storage/ |
| Trafic sortant (IP publiques, BSU, OOS), eu-west-2 et cloudgouv-eu-west-1 | Outscale | 0 € (« Offert ») | inclus (sauf en Asie) | 2026-09-26 | https://fr.outscale.com/tarifs/ |
| Trafic sortant Cellar (palier jusqu'à 10 To) | Clever Cloud | 90 €/To (0,09 €/Go), puis 0,07 €/Go | par Go | 2026-09-26 | https://api.clever-cloud.com/v4/billing/price-system?zone_id=par |
| Trafic sortant des applications (scalers) | Clever Cloud | non publié dans l'API (non relevé) | — | 2026-09-26 | https://api.clever-cloud.com/v4/billing/price-system?zone_id=par |

Note : chez GCP, le palier suivant du Premium Tier (1 à 10 Tio) coûte 0,11 USD/Gio. Chez AWS, le palier « 40 To suivants » coûte 0,085 USD/Go.

### SecNumCloud : statut et prix publics

Source principale : catalogue ANSSI des produits et services qualifiés, mis à jour le 15/09/2026 (section 3.3), consulté le 2026-09-26. Source secondaire : page ANSSI « Prestataires en cours de qualification ».

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Hosted Private Cloud powered by VMware : QUALIFIÉ IaaS (28/12/2023 → 29/12/2026) | OVHcloud | sur devis | — | 2026-09-26 | https://messervices.cyber.gouv.fr/visas/catalogue-produits-services-profils-de-protection-sites-certifies-qualifies-agrees-anssi.pdf ; https://www.ovhcloud.com/fr/enterprise/products/hosted-private-cloud/secnumcloud-qualified/ |
| Bare Metal Pod : QUALIFIÉ IaaS (24/03/2025 → 24/03/2028) | OVHcloud | sur devis | — | 2026-09-26 | catalogue ANSSI (ci-dessus) ; https://www.ovhcloud.com/fr/bare-metal/secnumcloud/ |
| SNC Cloud Platform : QUALIFIÉ IaaS (31/07/2026 → 31/07/2029) | OVHcloud | sur devis (aucun prix public trouvé) | — | 2026-09-26 | catalogue ANSSI ; https://www.ovhcloud.com/fr/secnumcloud/ |
| IaaS Cloud on Demand : QUALIFIÉ IaaS (30/11/2023 → 30/11/2026, renouvellement à surveiller) | Outscale | prix publics ; ex. 4 vCore v5 HIGH + 16 Gio sur cloudgouv-eu-west-1 = 0,264 €/h (192,72 €/mois) ; bloc 0,132 €/Gio ; objet 0,030 €/Gio | à l'heure / Gio-mois | 2026-09-26 | catalogue ANSSI ; https://fr.outscale.com/tarifs/ |
| IaaS Secure Temple (VMware, open source, S3, HSM-KMS, bare metal) : QUALIFIÉ (31/07/2026 → 30/05/2028) ; PaaS OpenShift : QUALIFIÉ (→ 30/05/2028) | Cloud Temple | non relevé (page tarifs non consultée) | — | 2026-09-26 | catalogue ANSSI |
| Worldline Cloud Services – Secured IaaS : QUALIFIÉ (24/03/2025 → 31/03/2028) | Worldline | non relevé | — | 2026-09-26 | catalogue ANSSI |
| Oodrive_Meet / Oodrive_Work / Oodrive_Work_Share : QUALIFIÉ SaaS (→ 25/01/2028) | Oodrive | non relevé | — | 2026-09-26 | catalogue ANSSI |
| Cloud de confiance S3NS : QUALIFIÉ PaaS, CaaS et IaaS (17/12/2025 → 17/12/2028) | Thales Cloud Sécurisé (S3NS, technologie Google Cloud) | non relevé | — | 2026-09-26 | catalogue ANSSI |
| Cloud de Confiance Bleu (IaaS, PaaS, CaaS) : EN COURS de qualification, absent de la liste des services qualifiés | Bleu (technologie Microsoft) | non relevé | — | 2026-09-26 | https://cyber.gouv.fr/prestataires-de-services-dinformatique-en-nuage-secnumcloud |
| Scaleway SecNumCloud (IaaS, PaaS) : EN COURS de qualification | Scaleway | non relevé | — | 2026-09-26 | https://cyber.gouv.fr/prestataires-de-services-dinformatique-en-nuage-secnumcloud |
| Autres qualifiés : Numspot (31/07/2026), Orange Cloud Avenue SecNum (11/07/2025), Cegedim CegNumCloud (04/12/2024), Whaller, Cloud Solutions (Wimi), Index Education | divers | non relevé | — | 2026-09-26 | catalogue ANSSI |
| Clever Cloud : pas de qualification propre dans le catalogue ; la FAQ tarifs indique un hébergement possible chez Cloud Temple (SecNumCloud) | Clever Cloud | — | — | 2026-09-26 | https://www.clever.cloud/pricing/ |
| AWS, Azure, Google Cloud (offres publiques) : NON qualifiés, absents du catalogue | AWS / Microsoft / Google | — | — | 2026-09-26 | catalogue ANSSI |

Notes :
- La page ANSSI « en cours de qualification » liste encore « OVH SNC Cloud Platform », alors que le catalogue du 15/09/2026 la donne comme qualifiée depuis le 31/07/2026. La page « en cours » semble ne pas avoir été mise à jour ; c'est le catalogue qui fait foi.
- La qualification d'Outscale expire le 30/11/2026, et celle d'OVH Hosted Private Cloud VMware le 29/12/2026. Il faut revérifier leur renouvellement avant de publier.
- La qualification d'Outscale s'applique au service « IaaS Cloud on Demand ». Quelles régions elle couvre exactement (eu-west-2 et/ou cloudgouv-eu-west-1) n'a pas été vérifié aujourd'hui.

---

# 3. AI / LLM

## 3a — AI API prices & EU GPU rental (checked 2026-09-26)

**FX rate used for every conversion:** 1 EUR = **1.1403 USD** (ECB euro reference rate, 25 Sept 2026, the latest published; 26 Sept is a Saturday). Source: https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/eurofxref-graph-usd.en.html
Anything written "≈ € … (ESTIMATE)" is USD ÷ 1.1403, rounded. Figures in plain € are EUR prices as the provider publishes them. All prices exclude VAT (HT) unless noted. US providers do not add French VAT on B2B invoices; reverse charge applies.

---

### A. API inference, per 1M tokens (standard tier)

#### A1. OpenAI (USD, global processing)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| gpt-6-astra (flagship) | OpenAI | in $10.00 / out $50.00 → ≈ in €8.77 / out €43.85 (ESTIMATE) | per 1M tokens, short context | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-6-sol | OpenAI | in $2.00 / out $10.00 → ≈ in €1.75 / out €8.77 (ESTIMATE) | per 1M tokens, short context | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-6-luna (small) | OpenAI | in $0.10 / out $0.50 → ≈ in €0.088 / out €0.44 (ESTIMATE) | per 1M tokens, short context | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-5.6-sol (promo) | OpenAI | in $4.00 / out $20.00 → ≈ in €3.51 / out €17.54 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-5.6-terra | OpenAI | in $2.00 / out $12.00 → ≈ in €1.75 / out €10.52 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-5.6-luna | OpenAI | in $0.20 / out $1.20 → ≈ in €0.18 / out €1.05 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-5.5 | OpenAI | in $5.00 / out $30.00 → ≈ in €4.38 / out €26.31 (ESTIMATE) | per 1M tokens (<272K ctx) | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-5.4 | OpenAI | in $2.50 / out $15.00 → ≈ in €2.19 / out €13.15 (ESTIMATE) | per 1M tokens (<272K ctx) | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-5.4-mini | OpenAI | in $0.75 / out $4.50 → ≈ in €0.66 / out €3.95 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-5.4-nano | OpenAI | in $0.20 / out $1.25 → ≈ in €0.18 / out €1.10 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-5 | OpenAI | in $1.25 / out $10.00 → ≈ in €1.10 / out €8.77 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-5-mini | OpenAI | in $0.25 / out $2.00 → ≈ in €0.22 / out €1.75 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-5-nano | OpenAI | in $0.05 / out $0.40 → ≈ in €0.044 / out €0.35 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-4.1 | OpenAI | in $2.00 / out $8.00 → ≈ in €1.75 / out €7.02 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-4.1-mini | OpenAI | in $0.40 / out $1.60 → ≈ in €0.35 / out €1.40 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-4o | OpenAI | in $2.50 / out $10.00 → ≈ in €2.19 / out €8.77 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |
| gpt-4o-mini | OpenAI | in $0.15 / out $0.60 → ≈ in €0.13 / out €0.53 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://developers.openai.com/api/docs/pricing |

Notes: `platform.openai.com/docs/pricing` now 301-redirects to `developers.openai.com/api/docs/pricing`. Cached input costs 10% of the input price on GPT-6 and GPT-5.x (e.g. gpt-6-sol cached $0.20); on gpt-4.1 it is 25% and on gpt-4o 50%. GPT-6 also bills cache writes at 1.25× input. Long context on GPT-6 costs about 2× input and 1.5× output (gpt-6-sol: $4 in / $15 out). **Batch and Flex are −50%** (gpt-6-sol batch: $1 / $5). Fast mode (the former "Priority") costs 2×. **EU data residency adds 10%** for models released on or after 5 March 2026. For GPT-6 Sol/Luna, EU residency is only available with Standard processing. The GPT-5.6 Sol price is promotional until at least 21 Nov 2026.

#### A2. Anthropic Claude (USD, global routing)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Claude Fable 5.1 (top tier) | Anthropic | in $10 / out $50 → ≈ in €8.77 / out €43.85 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://platform.claude.com/docs/en/about-claude/pricing |
| Claude Opus 5.5 | Anthropic | in $4 / out $20 → ≈ in €3.51 / out €17.54 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://platform.claude.com/docs/en/about-claude/pricing |
| Claude Opus 5 / 4.8 / 4.7 / 4.6 / 4.5 | Anthropic | in $5 / out $25 → ≈ in €4.38 / out €21.92 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://platform.claude.com/docs/en/about-claude/pricing |
| Claude Sonnet 5 | Anthropic | in $2 / out $10 → ≈ in €1.75 / out €8.77 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://platform.claude.com/docs/en/about-claude/pricing |
| Claude Sonnet 4.6 / 4.5 | Anthropic | in $3 / out $15 → ≈ in €2.63 / out €13.15 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://platform.claude.com/docs/en/about-claude/pricing |
| Claude Haiku 4.5 | Anthropic | in $1 / out $5 → ≈ in €0.88 / out €4.38 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://platform.claude.com/docs/en/about-claude/pricing |

Notes: `docs.claude.com` redirects to `platform.claude.com`. Cache reads are 0.1× input by default, 0.05× on Opus 5.5 ($0.20) and 0.025× on Fable/Mythos 5.1 ($0.25). A 5-minute cache write costs 1.25× input; a 1-hour write costs 2×. **Batch is −50%** (Opus 5.5 batch: $2 / $10). Sonnet 5's $2/$10 was introductory pricing and is now the standard price; the planned move to $3/$15 was cancelled. Claude 4.7+ uses a new tokenizer that produces about **30% more tokens** for the same text, so the calculator should inflate token volumes for these models. `inference_geo: "us"` costs 1.1×. The price page lists **no EU-only first-party option**; for EU routing, the page points to Bedrock/Vertex regional endpoints, which cost +10% over global. Mythos 5/5.1 are invitation-only.

#### A3. Google Gemini API (USD, paid tier)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Gemini 3.1 Pro Preview (≤200k prompt) | Google | in $2.00 / out $12.00 → ≈ in €1.75 / out €10.52 (ESTIMATE) | per 1M tokens (output incl. thinking) | 2026-09-26 | https://ai.google.dev/gemini-api/docs/pricing |
| Gemini 3.1 Pro Preview (>200k prompt) | Google | in $4.00 / out $18.00 → ≈ in €3.51 / out €15.79 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://ai.google.dev/gemini-api/docs/pricing |
| Gemini 3.8 Flash (promo to 31 Dec 2026) | Google | in $0.75 / out $3.75 → ≈ in €0.66 / out €3.29 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://ai.google.dev/gemini-api/docs/pricing |
| Gemini 3.8 Flash (from 1 Jan 2027) | Google | in $1.50 / out $7.50 → ≈ in €1.32 / out €6.58 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://ai.google.dev/gemini-api/docs/pricing |
| Gemini 3.5 Flash | Google | in $1.50 / out $9.00 → ≈ in €1.32 / out €7.89 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://ai.google.dev/gemini-api/docs/pricing |
| Gemini 3.5 Flash-Lite | Google | in $0.30 / out $2.50 → ≈ in €0.26 / out €2.19 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://ai.google.dev/gemini-api/docs/pricing |
| Gemini 3.1 Flash-Lite | Google | in $0.25 / out $1.50 → ≈ in €0.22 / out €1.32 (ESTIMATE) | per 1M tokens (text/image/video) | 2026-09-26 | https://ai.google.dev/gemini-api/docs/pricing |
| Gemini 2.5 Pro (≤200k) | Google | in $1.25 / out $10.00 → ≈ in €1.10 / out €8.77 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://ai.google.dev/gemini-api/docs/pricing |

Notes: 3.7 Flash and 3.6 Flash carry the same promotional $0.75/$3.75. Context caching is about 0.1× input ($0.075 on 3.8 Flash, $0.20 on 3.1 Pro) plus a storage fee per 1M tokens per hour. **Batch is −50%** (e.g. 3.1 Pro batch $1 / $6), and Flex tiers also exist. The only Pro model listed as current is a **Preview** (3.1 Pro). On the free tier, data is used to improve Google's products, so a B2B calculator should assume the paid tier.

#### A4. Mistral AI, La Plateforme (USD as displayed)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Mistral Medium 3.5 | Mistral AI | in $1.5 / out $7.5 → ≈ in €1.32 / out €6.58 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://mistral.ai/pricing/api |
| Mistral Large 3 | Mistral AI | in $0.5 / out $1.5 → ≈ in €0.44 / out €1.32 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://mistral.ai/pricing/api |
| Mistral Small 4 | Mistral AI | in $0.15 / out $0.6 → ≈ in €0.13 / out €0.53 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://mistral.ai/pricing/api |
| Codestral | Mistral AI | in $0.3 / out $0.9 → ≈ in €0.26 / out €0.79 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://mistral.ai/pricing/api |
| Ministral 3 (14B) | Mistral AI | in $0.2 / out $0.2 → ≈ in €0.18 / out €0.18 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://mistral.ai/pricing/api |
| Ministral 3 (8B) | Mistral AI | in $0.15 / out $0.15 → ≈ in €0.13 / out €0.13 (ESTIMATE) | per 1M tokens | 2026-09-26 | https://mistral.ai/pricing/api |

Notes: the page has a USD/EUR toggle, but EUR values are rendered client-side and I could not capture them reliably, so the USD figures are the verified ones. Page modifiers: **Batch is −50%**, cached input is −90%, and **regional (EU) inference adds 10%**. "Enterprise APIs" (regional controls, SLA) cost +75% over list. Large 3 is listed cheaper than Medium 3.5; that is the published price. Devstral and Magistral are not on the API pricing page.

#### A5. EU-hosted inference (EUR as published)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| mistral-medium-3.5-128b | Scaleway Generative APIs | in €1.50 / out €7.50 | per 1M tokens | 2026-09-26 | https://www.scaleway.com/en/pricing/model-as-a-service/ |
| mistral-small-3.2-24b-instruct-2506 | Scaleway Generative APIs | in €0.15 / out €0.35 | per 1M tokens | 2026-09-26 | https://www.scaleway.com/en/pricing/model-as-a-service/ |
| gpt-oss-120b | Scaleway Generative APIs | in €0.15 / out €0.60 | per 1M tokens | 2026-09-26 | https://www.scaleway.com/en/pricing/model-as-a-service/ |
| llama-3.3-70b-instruct | Scaleway Generative APIs | in €0.90 / out €0.90 | per 1M tokens | 2026-09-26 | https://www.scaleway.com/en/pricing/model-as-a-service/ |
| qwen3.5-397b-a17b | Scaleway Generative APIs | in €0.60 / out €3.60 | per 1M tokens | 2026-09-26 | https://www.scaleway.com/en/pricing/model-as-a-service/ |
| qwen3.8-27b | Scaleway Generative APIs | in €0.60 (cached €0.12) / out €3.30 | per 1M tokens | 2026-09-26 | https://www.scaleway.com/en/pricing/model-as-a-service/ |
| glm-5.2 | Scaleway Generative APIs | in €1.80 / out €5.50 | per 1M tokens | 2026-09-26 | https://www.scaleway.com/en/pricing/model-as-a-service/ |
| deepseek-v4-flash-0731 | Scaleway Generative APIs | in €0.40 (cached €0.08) / out €0.80 | per 1M tokens | 2026-09-26 | https://www.scaleway.com/en/pricing/model-as-a-service/ |
| gpt-oss-120b | OVHcloud AI Endpoints | in €0.08 / out €0.40 | per 1M tokens | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/ai-endpoints/catalog/ |
| gpt-oss-20b | OVHcloud AI Endpoints | in €0.04 / out €0.15 | per 1M tokens | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/ai-endpoints/catalog/ |
| Meta-Llama-3.3-70B-Instruct | OVHcloud AI Endpoints | in €0.67 / out €0.67 | per 1M tokens | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/ai-endpoints/catalog/ |
| Qwen3.5-397B-A17B | OVHcloud AI Endpoints | in €0.60 / out €3.60 | per 1M tokens | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/ai-endpoints/catalog/ |
| Qwen3.8-27B | OVHcloud AI Endpoints | in €0.40 / out €2.70 | per 1M tokens | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/ai-endpoints/catalog/ |
| Qwen3.5-9B | OVHcloud AI Endpoints | in €0.10 / out €0.15 | per 1M tokens | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/ai-endpoints/catalog/ |
| gpt-oss-120b | IONOS AI Model Hub | in €0.15 / out €0.65 | per 1M tokens (zzgl. MwSt.) | 2026-09-26 | https://cloud.ionos.de/managed/ai-model-hub |
| Llama 3.3 70B Instruct | IONOS AI Model Hub | in €0.65 / out €0.65 | per 1M tokens (zzgl. MwSt.) | 2026-09-26 | https://cloud.ionos.de/managed/ai-model-hub |
| Mistral Small 24B Instruct | IONOS AI Model Hub | in €0.10 / out €0.30 | per 1M tokens (zzgl. MwSt.) | 2026-09-26 | https://cloud.ionos.de/managed/ai-model-hub |
| Qwen3.5-397B-A17B | IONOS AI Model Hub | in €0.60 / out €3.60 | per 1M tokens (zzgl. MwSt.) | 2026-09-26 | https://cloud.ionos.de/managed/ai-model-hub |

Notes: Scaleway says "Prices before tax" and gives a free tier on the first 1M tokens. OVH shows HT prices, and its catalogue lists **no Mistral models**. The IONOS US site (cloud.ionos.com) shows the same models in USD at slightly higher figures; use the .de EUR page. Scaleway also sells **dedicated Managed Inference** (per-hour GPU deployments): L4 about €0.93/h and H100-1 about €3.40/h ("isApproximation" in the page data). Those are separate from the instance prices in section B.

---

### B. Dedicated GPU rental, EU regions, on-demand

Monthly = hourly × 730 h unless the provider publishes its own monthly figure (noted). "Per GPU" = instance price ÷ GPU count. The per-GPU price includes the vCPU and RAM bundled with the instance.

#### B1. Scaleway (EUR HT, zone fr-par-2 unless noted)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| L4-1-24G (1× L4 24 GB) | Scaleway | €0.7875/h = €0.79/GPU-h; €575/mo | per instance-hour | 2026-09-26 | https://www.scaleway.com/en/pricing/gpu/ |
| L4-8-24G (8× L4) | Scaleway | €6.30/h = €0.79/GPU-h; €4,599/mo | per instance-hour | 2026-09-26 | https://www.scaleway.com/en/pricing/gpu/ |
| L40S-1-48G (1× L40S 48 GB) | Scaleway | €1.4699/h = €1.47/GPU-h; €1,073/mo | per instance-hour (fr-par-2, pl-waw-2) | 2026-09-26 | https://www.scaleway.com/en/pricing/gpu/ |
| L40S-8-48G (8× L40S) | Scaleway | €11.7593/h = €1.47/GPU-h; €8,584/mo | per instance-hour | 2026-09-26 | https://www.scaleway.com/en/pricing/gpu/ |
| H100-1-80G (1× H100 PCIe) | Scaleway | €2.8665/h = €2.87/GPU-h; €2,093/mo | per instance-hour (fr-par-2, pl-waw-2) | 2026-09-26 | https://www.scaleway.com/en/pricing/gpu/ |
| H100-2-80G (2× H100 PCIe) | Scaleway | €5.733/h = €2.87/GPU-h; €4,185/mo | per instance-hour | 2026-09-26 | https://www.scaleway.com/en/pricing/gpu/ |
| H100-SXM-2-80G (2× H100 SXM) | Scaleway | €6.6198/h = €3.31/GPU-h; €4,832/mo | per instance-hour | 2026-09-26 | https://www.scaleway.com/en/pricing/gpu/ |
| H100-SXM-4-80G (4× H100 SXM) | Scaleway | €12.771/h = €3.19/GPU-h; €9,323/mo | per instance-hour | 2026-09-26 | https://www.scaleway.com/en/pricing/gpu/ |
| H100-SXM-8-80G (8× H100 SXM) | Scaleway | €25.3308/h = €3.17/GPU-h; €18,491/mo | per instance-hour | 2026-09-26 | https://www.scaleway.com/en/pricing/gpu/ |
| B300-SXM-8-288G (8× B300) | Scaleway | €60.00/h = €7.50/GPU-h; €43,800/mo | per instance-hour | 2026-09-26 | https://www.scaleway.com/en/pricing/gpu/ |

Notes: the exact prices come from the page's embedded catalogue data; the visible page rounds them (e.g. L4-1 shows "€0.79/h, ~€574.87/month"). The page says "Prices before tax". **No H200 or B200** instances are listed. L40S/H100 are not offered in fr-par-1.

#### B2. OVHcloud Public Cloud GPU (EUR HT)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| l4-90 (1× L4 24 GB) | OVHcloud | €0.75/h = €0.75/GPU-h; €548/mo (OVH monthly: €540) | per instance-hour | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| l40s-90 (1× L40S 48 GB) | OVHcloud | €1.40/h = €1.40/GPU-h; €1,022/mo (OVH monthly: €1,008) | per instance-hour | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| a100-180 (1× A100 80 GB) | OVHcloud | €2.75/h = €2.75/GPU-h; €2,008/mo (OVH monthly: €1,100) | per instance-hour | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| h100-380 (1× H100 80 GB) | OVHcloud | €2.80/h = €2.80/GPU-h; €2,044/mo (OVH monthly: €1,940) | per instance-hour | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| h100-1520 (4× H100) | OVHcloud | €11.20/h = €2.80/GPU-h; €8,176/mo (OVH monthly: €7,770) | per instance-hour | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| h200-1920 (8× H200 141 GB) | OVHcloud | €42.00/h = €5.25/GPU-h; €30,660/mo | per instance-hour | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |
| a10-45 (1× A10 24 GB) | OVHcloud | €0.76/h; ~€554.8/mo | per instance-hour | 2026-09-26 | https://www.ovhcloud.com/fr/public-cloud/prices/ |

Notes: OVH's own "HT / mois" column is a monthly-billed price and is lower than 730 × hourly (e.g. A100 €1,100 vs €2,008). The calculator should use OVH's monthly figure for 24/7 workloads. Most GPUs are in Gravelines; Paris also hosts GPUs, including H200. **From 1 Oct 2026, IPv4 is billed separately** and is no longer included. No B200 is listed.

#### B3. AWS EC2 on-demand, Linux (USD → EUR ESTIMATE)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| g6.xlarge (1× L4), eu-west-3 Paris | AWS | $1.0216/h → ≈ €0.90/GPU-h; ≈ €654/mo (ESTIMATE) | per instance-hour | 2026-09-26 | https://aws.amazon.com/ec2/pricing/on-demand/ |
| g6.48xlarge (8× L4), eu-west-3 Paris | AWS | $16.9468/h → ≈ €14.86/h = ≈ €1.86/GPU-h; ≈ €10,849/mo (ESTIMATE) | per instance-hour | 2026-09-26 | https://aws.amazon.com/ec2/pricing/on-demand/ |
| g6e.xlarge (1× L40S), eu-central-1 Frankfurt | AWS | $2.327/h → ≈ €2.04/GPU-h; ≈ €1,490/mo (ESTIMATE) | per instance-hour | 2026-09-26 | https://aws.amazon.com/ec2/pricing/on-demand/ |
| g6e.48xlarge (8× L40S), Frankfurt | AWS | $37.6761/h → ≈ €33.04/h = ≈ €4.13/GPU-h; ≈ €24,120/mo (ESTIMATE) | per instance-hour | 2026-09-26 | https://aws.amazon.com/ec2/pricing/on-demand/ |
| p5.4xlarge (1× H100), eu-north-1 Stockholm | AWS | $7.3616/h → ≈ €6.46/GPU-h; ≈ €4,713/mo (ESTIMATE) | per instance-hour | 2026-09-26 | https://aws.amazon.com/ec2/pricing/on-demand/ |
| p5.48xlarge (8× H100), Stockholm | AWS | $58.8928/h → ≈ €51.65/h = ≈ €6.46/GPU-h; ≈ €37,702/mo (ESTIMATE) | per instance-hour | 2026-09-26 | https://aws.amazon.com/ec2/pricing/on-demand/ |
| p5en.48xlarge (8× H200), Stockholm | AWS | $67.7267/h → ≈ €59.39/h = ≈ €7.42/GPU-h (ESTIMATE) | per instance-hour | 2026-09-26 | https://aws.amazon.com/ec2/pricing/on-demand/ |
| p6-b200.48xlarge (8× B200), eu-west-3 Paris | AWS | $174.3172/h → ≈ €152.87/h = ≈ €19.11/GPU-h; ≈ €111,595/mo (ESTIMATE) | per instance-hour | 2026-09-26 | https://aws.amazon.com/ec2/pricing/on-demand/ |

Notes: the prices come from the JSON that feeds the on-demand page (`https://b0.p.awsstatic.com/pricing/2.0/meteredUnitMaps/ec2/USD/current/ec2-ondemand-without-sec-sel/EU%20(Paris)/Linux/index.json`, and the same path for Frankfurt and Stockholm). **No on-demand p5 is listed in Paris or Frankfurt**, and **no g6e in Paris**, so Stockholm and Frankfurt are used. Frankfurt g6.xlarge is $1.0064/h. GPU counts per instance come from AWS instance naming (not re-fetched). g6.48xlarge costs more per GPU than g6.xlarge because it bundles 192 vCPU and 768 GiB of RAM.

#### B4. Microsoft Azure, pay-as-you-go Linux (EUR as returned by the Azure Retail Prices API)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| NV36ads_A10_v5 (1× A10 24 GB), France Central | Azure | €3.4347/h = €3.43/GPU-h; €2,507/mo | per VM-hour | 2026-09-26 | https://prices.azure.com/api/retail/prices (armRegionName francecentral) |
| NC24ads_A100_v4 (1× A100 80 GB), France Central | Azure | €3.9421/h = €3.94/GPU-h; €2,878/mo | per VM-hour | 2026-09-26 | https://prices.azure.com/api/retail/prices (francecentral) |
| NC40ads_H100_v5 (1× H100 NVL 94 GB), Germany West Central | Azure | €7.7915/h = €7.79/GPU-h; €5,688/mo | per VM-hour | 2026-09-26 | https://prices.azure.com/api/retail/prices (germanywestcentral) |
| NC80adis_H100_v5 (2× H100 NVL), Germany West Central | Azure | €15.583/h = €7.79/GPU-h; €11,376/mo | per VM-hour | 2026-09-26 | https://prices.azure.com/api/retail/prices (germanywestcentral) |
| ND96isr_H200_v5 (8× H200), France Central | Azure | €91.0184/h = €11.38/GPU-h; €66,443/mo | per VM-hour | 2026-09-26 | https://prices.azure.com/api/retail/prices (francecentral) |
| ND96isr_H100_v5 (8× H100 SXM), Sweden Central | Azure | €109.751/h = €13.72/GPU-h; €80,118/mo | per VM-hour | 2026-09-26 | https://prices.azure.com/api/retail/prices (swedencentral) |

Notes: Microsoft's API returns EUR list prices directly (`currencyCode='EUR'`), so no FX conversion is involved. GPU counts were checked on Microsoft Learn (https://learn.microsoft.com/en-us/azure/virtual-machines/sizes/gpu-accelerated/ncadsh100v5-series and …/nvadsa10v5-series). **NC H100 v5 is not listed in France Central** and **no L4 or L40S VM SKUs exist** in FR/DE/SE/West Europe. In France Central the NVads A10 v5 sizes are the only A10 options; smaller sizes are fractional GPUs (1/6 to 1/2). The 8× H100 ND v5 is only in Sweden Central and West Europe.

#### B5. Google Cloud Compute Engine, on-demand (USD → EUR ESTIMATE)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| g2-standard-4 (1× L4, 4 vCPU, 16 GB), europe-west9 Paris | GCP | $0.8199/h (L4 $0.6496 + 4 vCPU × $0.02899 + 16 GiB × $0.003396) → ≈ €0.72/GPU-h; ≈ €525/mo (ESTIMATE) | per GPU-hour + vCPU-hour + GiB-hour | 2026-09-26 | https://cloud.google.com/skus/?currency=USD&filter=Nvidia%20L4%20GPU%20running%20in%20Paris |
| a3-highgpu-8g (8× H100 80 GB, 208 vCPU, 1,872 GB), europe-west4 Netherlands | GCP | $111.82/h (8 × $12.7355 GPU + 208 × $0.02677 + 1872 × $0.002331) → ≈ €98.06/h = ≈ €12.26/GPU-h; ≈ €71,583/mo (ESTIMATE) | per GPU-hour + vCPU-hour + GiB-hour | 2026-09-26 | https://cloud.google.com/skus/?currency=USD&filter=Nvidia%20H100%2080GB%20GPU%20running%20in%20Netherlands |
| Nvidia H100 80GB GPU SKU only, europe-west4 | GCP | $12.7355/GPU-h → ≈ €11.17/GPU-h (ESTIMATE) | per GPU-hour (excl. VM) | 2026-09-26 | https://cloud.google.com/skus/?currency=USD&filter=Nvidia%20H100%2080GB%20GPU%20running%20in%20Netherlands |

Notes: the GCP price pages (`/compute/gpus-pricing`, `/compute/vm-instance-pricing`) no longer render tables for scrapers, so figures come from the public SKU explorer. The A3 vCPU/RAM SKUs are at `https://cloud.google.com/skus/?currency=USD&filter=A3%20Instance%20running%20in%20Netherlands` and the G2 ones at `…filter=G2%20Instance%20running%20in%20Paris`. Machine shapes are from https://docs.cloud.google.com/compute/docs/gpus. **a3-highgpu-1g/2g/4g are Spot/Flex-start only**, so the smallest on-demand H100 is 8 GPUs. Other L4 SKUs: 1-year CUD $0.409, 3-year $0.292, Spot $0.073. Other H100 SKUs: DWS Defined Duration $4.20/GPU-h, 1-year CUD $8.84, 3-year $5.59. The H100 on-demand SKU looks high next to AWS; it was double-checked in the rendered page.

#### B6. Nebius AI Cloud (USD, optional EU-HQ comparator)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| NVIDIA HGX H100 | Nebius | $3.85 → ≈ €3.38/GPU-h; ≈ €2,465/mo (ESTIMATE); **$4.50 from 1 Oct 2026** (≈ €3.95) | per GPU-hour on-demand | 2026-09-26 | https://nebius.com/prices |
| NVIDIA HGX H200 | Nebius | $4.50 → ≈ €3.95/GPU-h (ESTIMATE); $5.40 from 1 Oct 2026 | per GPU-hour | 2026-09-26 | https://nebius.com/prices |
| NVIDIA HGX B200 | Nebius | $7.15 → ≈ €6.27/GPU-h (ESTIMATE); $8.50 from 1 Oct 2026 | per GPU-hour | 2026-09-26 | https://nebius.com/prices |
| NVIDIA L40S (Intel CPU) | Nebius | from $1.55 → ≈ €1.36/GPU-h (ESTIMATE) | per GPU-hour | 2026-09-26 | https://nebius.com/prices |

Notes: the page does not say which region these prices apply to; Nebius runs Finland, Paris and other locations. Prices exclude VAT. Commitments give up to −35%.

---

### Gaps / caveats
- **Mistral EUR prices:** the toggle exists, but the EUR values could not be captured. Use USD, or check by hand in a browser. Scaleway's own price for Mistral Medium 3.5 is €1.50/€7.50.
- **Scaleway H200/B200 and OVH B200:** not listed. Azure L4/L40S: no such SKUs in EU. AWS p5 in Paris/Frankfurt: not offered on-demand.
- **GCP:** no H100 in europe-west9 was checked, and no a3 1-GPU on-demand exists. GCP totals are computed from SKUs, not a published machine price.
- **Anthropic:** there is no published EU data-residency price for the first-party API; EU routing goes through Bedrock/Vertex regional endpoints at +10%.
- All USD→EUR conversions are ESTIMATES at 1.1403, and these values will move with FX.

## 3b — Hardware prices, power and throughput (on-prem GPU inference, France)

Checked 2026-09-26. Every figure below comes from a page fetched today unless it is marked **ESTIMATE**.
FX rate for USD conversions: **1 EUR = 1.1403 USD** (ECB reference rate of 2026-09-25, https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml). USD prices converted to EUR are US prices without sales tax, before EU import costs. They are marked ESTIMATE.
VAT removed from German retail prices at 19 % and from French prices at 20 %.

Context: GPU prices rose sharply in 2026. The RTX PRO 6000 went from USD 8,565 at launch (March 2025) to USD 16,000 on the NVIDIA marketplace in September 2026, and DDR5 server RAM costs about €2,000 HT per 64 GB module. Any server quote goes stale within weeks.

---

### 1. Hardware prices

#### 1a. GPU cards

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| NVIDIA L40S 48GB PCIe (900-2G133-0080-000) | Geizhals.de, lowest of 17 DE/AT offers (PC-KING, €9,369 TTC) | 7,873 | one-off purchase, new, bulk; TTC ÷ 1.19 | 2026-09-26 | https://geizhals.de/nvidia-l40s-900-2g133-0080-000-a3127476.html |
| NVIDIA L40S 48GB PCIe, offer range | Geizhals.de (17 offers, €9,369–10,810 TTC) | 7,873–9,084 | one-off purchase; TTC ÷ 1.19 | 2026-09-26 | https://geizhals.de/nvidia-l40s-900-2g133-0080-000-a3127476.html |
| RTX PRO 6000 Blackwell Max-Q Workstation Ed. 96GB (PNY VCNRTXPRO6000MQ-PB) | LDLC.pro (FR) | 14,758.29 | one-off purchase, 3-yr warranty, ships in 7 days | 2026-09-26 | https://www.ldlc.pro/pieces/carte-graphique-professionnelle/c5421/+fv121-133058.html |
| same card, retail | LDLC.com (FR), €17,709.95 TTC | 14,758 | TTC ÷ 1.20 (matches LDLC.pro HT) | 2026-09-26 | https://www.ldlc.com/en/product/PB00723366.html |
| RTX PRO 6000 Blackwell 96GB, the 2 other LDLC.pro SKUs (listing does not show edition; probably Workstation Ed. and OEM) | LDLC.pro (FR) | 14,733.29 | one-off purchase, ships in 15+ days | 2026-09-26 | https://www.ldlc.pro/pieces/carte-graphique-professionnelle/c5421/+fv121-133058.html |
| RTX PRO 6000 Blackwell **Server Edition** 96GB passive (900-2G153-0000-000) | Geizhals EU, lowest offer €19,369 TTC (DE) | 16,276 | one-off purchase; TTC ÷ 1.19; other offers €21,599–23,205 TTC | 2026-09-26 | https://geizhals.eu/nvidia-rtx-pro-6000-blackwell-server-edition-900-2g153-0000-000-a3492247.html |
| RTX PRO 6000 Blackwell Workstation Ed., US list price | NVIDIA Marketplace via Thunder Compute (USD 16,000) | 14,031 **ESTIMATE** (FX) | list price, Sept 2026; launch MSRP was USD 8,565 | 2026-09-26 | https://www.thundercompute.com/blog/nvidia-rtx-pro-6000-pricing |
| NVIDIA H100 PCIe 80GB HBM2e | smicro.eu (CZ, B2B) | 33,395.29 | "ex VAT", on demand, NCNR 52 weeks | 2026-09-26 | https://smicro.eu/nvidia-h100-hopper-pcie-5-0-x16-94-gb-900-21010-0020-000-1 (listed under "related products") |
| NVIDIA H100 NVL 94GB (900-21010-0020-000) | smicro.eu | quote only | "individual B2B price", on demand | 2026-09-26 | https://smicro.eu/nvidia-h100-hopper-pcie-5-0-x16-94-gb-900-21010-0020-000-1 |
| NVIDIA H100 NVL 94GB | Geizhals.de | no offer listed | – | 2026-09-26 | https://geizhals.de/nvidia-h100-nvl-900-21010-0020-000-a3356480.html |
| NVIDIA H100 NVL 94GB | Viperatech (US), USD 32,200 | 28,238 **ESTIMATE** (FX; EU landed cost probably higher) | one-off purchase, "in stock, ships in 2 weeks", price "changes every 48-72 hours" | 2026-09-26 | https://viperatech.com/product/nvidia-h100-nvl-hbm3-94gb-350w |

Notes:
- **L40S**: LDLC.com's PNY L40S listing is discontinued (last price €11,729.95 TTC). German distribution is the realistic EU street reference.
- **RTX PRO 6000**: the Max-Q (300 W, blower) and Workstation (600 W) editions cost the same at LDLC.pro, about €14.7k HT. The passive **Server Edition**, the one to use in a rack server, costs about 10 % more in Germany (€16.3k HT). Street price is now roughly twice the 2025 launch MSRP, and Comptoir du Hardware and Thunder Compute both report it.
- **H100**: no open-market EU price exists for the NVL. The only public EU figure is €33.4k HT for the H100 PCIe 80GB. Budget **€28–34k HT per H100 card**. Jarvislabs' price guide (updated 2026-09-08) itself uses "USD 30,000 per GPU installed" as a budgeting assumption and says buyers should get dated quotes (https://jarvislabs.ai/blog/h100-price).

#### 1b. Servers and components

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| 2U AMD single-CPU RA1208-TKEPGN (up to 2 full-height GPUs, 2×3200 W Titanium PSU, EPYC 9015 8-core, 16 GB, no GPU/no disk) | Thomas-Krenn (DE) | 6,209 | "starting at", net of VAT, B2B | 2026-09-26 | https://www.thomas-krenn.com/en/products/rack-server/2u-servers/amd-single-cpu/2he-amd-single-cpu-ra1208-tkepgn |
| 2U AMD single-CPU RA1208-GIEPG (up to 8 GPUs in 2U, EPYC 9015, 16 GB) | Thomas-Krenn | 10,699 | "starting at", net | 2026-09-26 | https://www.thomas-krenn.com/en/products/application/gpu-server |
| 2U Intel dual-CPU RI2208-TKXSG (10× PCIe, Xeon Silver 4410Y, 32 GB) | Thomas-Krenn | 8,499 (was 10,665) | "starting at", net, promo | 2026-09-26 | https://www.thomas-krenn.com/en/products/application/gpu-server |
| DDR5-5600 RDIMM 64 GB (Kingston KTD-PE556D4-64G) | Geizhals.de, lowest of 9 (€2,334.46 TTC) | 1,962 | per module; TTC ÷ 1.19 | 2026-09-26 | https://geizhals.de/kingston-rdimm-64gb-ktd-pe556d4-64g-a3576072.html |
| NVMe U.2 3.84 TB Samsung PM9A3 | Serverschmiede (DE) | 2,034.45 | per drive, "exkl. MwSt." (from DuckDuckGo result snippet of the shop page) | 2026-09-26 | https://www.serverschmiede.com/de/384tb-samsung-pm9a3-datacenter-enterprise-24-7-sff-25-u2-nvme-pcie-gen4-1000k-iops-6800mb-new |
| BIZON X8000 G3, 2U, 1× EPYC 9004/9005, up to 4 GPUs (RTX PRO 6000 / H100 / H200) | Bizon (US), USD 13,910 | 12,199 **ESTIMATE** (FX) | "starting at"; the page does not say whether the starting config includes a GPU | 2026-09-26 | https://bizon-tech.com/amd-epyc-servers |
| BIZON G9000, 4–8× A100/H100/H200 NVL server | Bizon, USD 28,588 | 25,071 **ESTIMATE** (FX) | "starting at" | 2026-09-26 | https://bizon-tech.com/amd-epyc-servers |
| **Server base (no GPU), lean: TK RA1208-TKEPGN + 2×64 GB RAM + 1×3.84 TB NVMe** | derived | **~12,200 ESTIMATE** | 6,209 + 2×1,962 + 2,034. Replaced 16 GB module and assembly ignored. ±20 % | 2026-09-26 | built from the TK, Geizhals and Serverschmiede rows above |
| **Server base (no GPU), 2-GPU class: TK base + 4×64 GB + 2×3.84 TB + CPU upgrade to ~16–24 cores** | derived | **~19,600 ESTIMATE** | 6,209 + 4×1,962 + 2×2,034 + ~1,500 CPU upgrade (**unsourced guess**). ±20 % | 2026-09-26 | as above |
| **Complete server, 1× L40S** | derived | **~20,000 ESTIMATE** | lean base 12.2k + card 7.9k | 2026-09-26 | as above |
| **Complete server, 1× RTX PRO 6000 Server Ed.** | derived | **~28,400 ESTIMATE** (~26,900 with Max-Q card) | lean base + 16.3k (or 14.8k Max-Q) | 2026-09-26 | as above |
| **Complete server, 2× H100 NVL** | derived | **~76,000 ESTIMATE** (~86,000 with 2× H100 PCIe at the smicro price) | 2-GPU base 19.6k + 2 × 28.2k (or 2 × 33.4k) | 2026-09-26 | as above |

Notes:
- The Thomas-Krenn configurator loads its option prices with JavaScript, and the scraper could not see the surcharges for GPUs, RAM or NVMe. Only the base price and the included parts came through. The TK page shows the barebone base config at **215 W** ("power consumption according to the manufacturer").
- I found no published EU "all-in" price for a server with 1× L40S, 1× RTX PRO 6000 or 2× H100. The complete-server rows are bottom-up ESTIMATES. RAM is now a large line item: 256 GB costs about €7.8k HT at today's German street prices. Integrators (TK, Boston, Sysgen) usually add 5–15 % margin plus a 3–5-year warranty. For conservative figures, add **+10 %** (ESTIMATE).
- Suggested calculator defaults, all **ESTIMATE**: 1×L40S server **€20k HT**, 1×RTX PRO 6000 server **€28k HT**, 2×H100 NVL server **€75–85k HT**. Straight-line depreciation over 3 years is typical for IT hardware (to be confirmed by the finance/tax part).

---

### 2. Power draw

| item | GPU / config | value | unit / conditions | date checked | source URL |
|---|---|---|---|---|---|
| GPU max power | NVIDIA L4 24GB (300 GB/s) | 72 | W, max TDP | 2026-09-26 | https://www.nvidia.com/en-us/data-center/l4/ |
| GPU max power | NVIDIA L40S 48GB (864 GB/s) | 350 | W, max power consumption | 2026-09-26 | https://www.nvidia.com/en-us/data-center/l40s/ |
| GPU max power | RTX PRO 6000 Blackwell **Server Ed.** 96GB (1,597 GB/s on NVIDIA page; Geizhals lists 1,792 GB/s) | up to 600 (configurable) | W | 2026-09-26 | https://www.nvidia.com/en-us/data-center/rtx-pro-6000-blackwell-server-edition/ |
| GPU max power | RTX PRO 6000 Blackwell **Max-Q** Workstation Ed. 96GB (1,792 GB/s) | 300 | W | 2026-09-26 | https://www.nvidia.com/en-us/products/workstations/professional-desktop-gpus/rtx-pro-6000-max-q/ |
| GPU max power | RTX PRO 6000 Blackwell Workstation Ed. (standard) | 600 | W ("300W compared to 600W on the standard version") | 2026-09-26 | https://www.ldlc.com/en/product/PB00723366.html |
| GPU max power | NVIDIA H100 PCIe 80GB (2 TB/s) | 350 | W, max power consumption | 2026-09-26 | https://lenovopress.lenovo.com/lp1732-thinksystem-nvidia-h100-pcie-gen5-gpu |
| GPU max power | NVIDIA H100 NVL 94GB (3.9 TB/s) | 350–400 (configurable) | W | 2026-09-26 | https://www.nvidia.com/en-us/data-center/h100/ |
| GPU max power | NVIDIA H100 SXM 80GB (3.35 TB/s) | up to 700 (configurable) | W | 2026-09-26 | https://www.nvidia.com/en-us/data-center/h100/ |
| Measured whole-server draw | 2× H100 94GB (NVL) + 2× Xeon Gold 6426Y, vLLM, Llama 8B, batch 256 | 1,382 total (GPU 784, CPU 182, DRAM 20.3) | W, measured with IPMI + NVML + RAPL; "others" (fans, board, PSU loss) = 20–25 % of total | 2026-09-26 | https://hotcarbon.org/assets/2025/paper-11.pdf |
| Measured idle | same 2× H100 server | ~120 | W, GPUs + CPUs at idle ("substantial baseline power") | 2026-09-26 | https://hotcarbon.org/assets/2025/paper-11.pdf |
| Barebone draw | TK RA1208-TKEPGN, base config (EPYC 9015, 16 GB, no GPU) | 215 | W, manufacturer figure | 2026-09-26 | https://www.thomas-krenn.com/en/products/rack-server/2u-servers/amd-single-cpu/2he-amd-single-cpu-ra1208-tkepgn |
| Whole server under inference load | 1× L40S server | **~550–650 ESTIMATE** | W. GPU ~300–350 + platform ~250–300 (TK barebone 215 W plus RAM/NVMe/fans) | 2026-09-26 | derived from rows above |
| Whole server under inference load | 1× RTX PRO 6000 Server Ed. (600 W) | **~800–900 ESTIMATE** | W. Use ~500–550 W with a Max-Q card | 2026-09-26 | derived |
| Whole server under inference load | 2× H100 NVL | **~1,300–1,400 ESTIMATE** | W, anchored on the 1,382 W measurement | 2026-09-26 | derived |
| Data-centre PUE, global average | Uptime Institute Global Data Center Survey 2025 | 1.54 | ratio, average of largest facility per respondent, unchanged for 6 years | 2026-09-26 | https://mgrid.org/2025/10/01/uptime-institute-data-center-pue-stagnation-2025-liquid-cooling/ |
| PUE by facility type | Uptime 2025 via mgrid | 1.10–1.15 hyperscale; **1.58–1.80 colocation/enterprise** | ratio | 2026-09-26 | https://mgrid.org/2025/10/01/uptime-institute-data-center-pue-stagnation-2025-liquid-cooling/ |
| **Suggested PUE, small on-prem server room** | – | **1.8 default (range 1.5–2.0) ESTIMATE** | ratio. Top of the enterprise range, because a small room with split-unit air conditioning and no free cooling is worse than a surveyed data centre. Use ~1.4–1.6 for a French colocation provider | 2026-09-26 | reasoning from the Uptime figures |

Notes:
- Under sustained vLLM batching, GPUs run close to their TDP: in the measurement above, 784 W for two 400 W NVL cards. At light single-user load they draw much less. For annual energy, a calculator should apply **(server W at load × duty cycle + idle W × (1 − duty cycle)) × PUE × 8,760 h** (formula ESTIMATE).
- NVIDIA's product page gives 1,597 GB/s for the RTX PRO 6000 Server Edition, while the Max-Q/Workstation pages and Geizhals give 1,792 GB/s. The rules of thumb below use 1.6–1.8 TB/s.

---

### 3. Electricity price for French businesses (2026)

| item | provider | price (EUR, HT) | billing basis | date checked | source URL |
|---|---|---|---|---|---|
| Tarif Bleu **Pro** (TRVE ≤36 kVA), option Base | EDF / CRE deliberation 2026-147, applies from **1 Aug 2026** | **0.1624** | €/kWh **HTVA** (accise + CTA included, VAT excluded); same price at every power 3–36 kVA | 2026-09-26 | https://entreprises.selectra.info/energie/fournisseurs/edf/tarifs-bleu-professionnel |
| Tarif Bleu Pro, HP/HC | same | 0.1713 HP / 0.1305 HC | €/kWh HTVA | 2026-09-26 | same |
| Tarif Bleu Pro subscription, Base | same | 21.56 (12 kVA) / 34.03 (24 kVA) / 46.74 (36 kVA) | €/month HTVA | 2026-09-26 | same |
| Tarif Bleu Pro, Base, **hors toutes taxes** | Séolis (local distributor applying the same TRV grid), from 1 Aug 2026 | 0.1318 | €/kWh HTT (excludes accise). 0.1318 + accise 0.03062 = 0.1624 ✓ | 2026-09-26 | https://www.seolis.net/wp-content/uploads/2026/07/D-R14-SU-46-D-Grille-tarifaire-SEOLIS-tarif-bleu-pros.pdf |
| Tarif Bleu Pro HP/HC, HTT | Séolis | 0.1407 HP / 0.0999 HC | €/kWh HTT | 2026-09-26 | same |
| Accise sur l'électricité (ex-CSPE) | EDF Entreprises | 30.62 (≤36 kVA); 26.35 (36–250 kVA) | €/MWh, from 1 Feb 2026 (−0.23 €/MWh); may change with the 2027 Finance Act | 2026-09-26 | https://www.edf.fr/entreprises/decryptages/normes-et-reglementations/trv-aout-2026 |
| Aug 2026 TRV change, Bleu non-residential | EDF / CRE 2026-147 | +2.93 % HT on average (+4.74 €/MWh HT) | includes TURPE +1.23 %, capacity +1.93 % | 2026-09-26 | https://www.edf.fr/entreprises/decryptages/normes-et-reglementations/trv-aout-2026 |
| TRV 36–250 kVA (C4, ex-Tarif Jaune), version 1 as listed | Selectra, grid from 1 Aug 2026 | HPH 0.2248 / HCH 0.1549 / HPE 0.1146 / HCE 0.1068 | €/kWh HTVA; subscription 114.55 €/month at 42 kVA | 2026-09-26 | https://entreprises.selectra.info/energie/fournisseurs/edf/tarifs-bleu-professionnel |
| TRV 36–250 kVA, version 2 as listed | Selectra | HPH 0.2122 / HCH 0.1473 / HPE 0.1134 / HCE 0.1065 | €/kWh HTVA; subscription 163.66 €/month at 42 kVA (probably "longue utilisation") | 2026-09-26 | same |
| Cheapest market offer vs TRV (15 MWh/yr, 12 kVA, Base) | Selectra comparator | 0.1490 (fixed 2 yr) – 0.1624 | €/kWh HTVA, offers checked 10 Aug–3 Sep 2026 | 2026-09-26 | same |
| Eurostat non-household, **France, 2025-S2**, band ID 20–499 MWh | Eurostat nrg_pc_205 | 0.1638 excl. all taxes / **0.1946 excl. VAT & recoverable taxes** / 0.2300 all taxes | €/kWh, dataset updated 2026-09-24; 2026-S1 not yet published | 2026-09-26 | https://ec.europa.eu/eurostat/api/dissemination/statistics/1.0/data/nrg_pc_205?format=JSON&geo=FR&nrg_cons=MWH20-499&currency=EUR&unit=KWH |
| Eurostat FR 2025-S2, band IA <20 MWh | Eurostat nrg_pc_205 | 0.2289 excl. taxes / **0.2688 excl. VAT** | €/kWh (fixed charges spread over little volume) | 2026-09-26 | same API, nrg_cons=MWH_LT20 |
| Eurostat FR 2025-S2, band IC 500–1,999 MWh | Eurostat nrg_pc_205 | 0.1297 excl. taxes / **0.1534 excl. VAT** | €/kWh | 2026-09-26 | same API, nrg_cons=MWH500-1999 |
| Eurostat FR 2025-S1 (for trend), band ID | Eurostat | 0.2234 excl. VAT | €/kWh | 2026-09-26 | same API |
| Eurostat EU-27 2025-S2, band ID | Eurostat | 0.2179 excl. VAT | €/kWh | 2026-09-26 | same API |
| **Recommended calculator default** | – | **0.18 €/kWh HT (excl. VAT, incl. accise and TURPE), range 0.13–0.23** **ESTIMATE** | marginal energy price. Default sits between TRV Bleu Pro Base (0.1624 energy only, plus subscription) and the Eurostat FR all-in average for 20–499 MWh (0.1946). Low end ≈ HC/summer hours or a large site (IC band 0.153, HCE 0.107). High end ≈ small consumers <20 MWh with fixed charges (0.27) or winter peak | 2026-09-26 | reasoning from the rows above |

Notes:
- **What is included.** The TRV Bleu is an integrated tariff: its kWh price already contains supply, TURPE (network) and capacity. Business prices are normally quoted **HTVA**, meaning accise (30.62 €/MWh ≤36 kVA) and CTA are included and only the recoverable VAT is left out. **HTT/HT hors toutes taxes** also removes the accise. For a calculator shown to businesses, use HTVA and label it "HT (hors TVA)".
- The CTA is computed on the fixed part of TURPE (15 %), so it goes into the subscription, not the kWh price (EDF page).
- TRV eligibility since 2025: fewer than 10 employees and ≤ €2 M turnover or balance sheet. Larger firms buy market offers, and the Eurostat ID band is a better benchmark for them.
- Scale check: one server at 1 kW × PUE 1.8 × 8,760 h ≈ 15.8 MWh/yr, which sits at the IA/ID band boundary. At 0.18 €/kWh that is about €2,840/yr (ESTIMATE, full load all year).

---

### 4. Throughput benchmarks (tokens/s)

Terms: **single-stream** means decode tok/s seen by one user. **Aggregate** means total output tok/s across all concurrent requests. Output-only unless marked "total (in+out)". Precision is given where the source states it.

#### 4a. Measured, target models

| item | GPU / config | value | unit / conditions | date checked | source URL |
|---|---|---|---|---|---|
| gpt-oss-20b, single-stream | 1× RTX PRO 6000 (vLLM, MXFP4) | 258 | tok/s, concurrency 1 | 2026-09-26 | https://github.com/iamthemovie/LLMBenchmarks |
| gpt-oss-20b, aggregate | 1× RTX PRO 6000 (vLLM) | 1,143 @c10 / 3,872 @c40 / 6,661 @c80 / 9,411 @c128 / peak 11,470 @c384 | tok/s | 2026-09-26 | https://github.com/iamthemovie/LLMBenchmarks |
| gpt-oss-20b | 1× RTX PRO 6000 (vLLM, MXFP4) | 255 single / 6,396 batched | tok/s | 2026-09-26 | https://github.com/chsasank/blackwell |
| gpt-oss-20b, aggregate | 1× RTX PRO 6000 (vLLM, "INT8" as labelled) | 3,753 output (4,378 total); median TPOT 12.9 ms (≈78 tok/s/user) | tok/s, 50 concurrent, in 100 / out 600, updated 2026-08-25 | 2026-09-26 | https://www.databasemart.com/blog/vllm-gpu-benchmark-pro6000 |
| gpt-oss-120b, single-stream | 1× RTX PRO 6000 (vLLM, MXFP4, 95 GB VRAM used) | 173 | tok/s | 2026-09-26 | https://github.com/chsasank/blackwell |
| gpt-oss-120b, aggregate | 1× RTX PRO 6000 (vLLM, MXFP4) | 6,545 | tok/s, "batched" (concurrency not stated) | 2026-09-26 | https://github.com/chsasank/blackwell |
| gpt-oss-120b, aggregate | 1× RTX PRO 6000 (vLLM) | 1,525 output (1,779 total); median TPOT 32.2 ms (≈31 tok/s/user) | tok/s, 50 concurrent, in 100 / out 600 | 2026-09-26 | https://www.databasemart.com/blog/vllm-gpu-benchmark-pro6000 |
| gpt-oss-120b, single-stream | 1× RTX PRO 6000 (llama.cpp b6112, flash-attn) | 148 @12k ctx → 83 @131k ctx | tok/s, Aug 2025 | 2026-09-26 | https://www.hardware-corner.net/guides/rtx-pro-6000-gpt-oss-120b-performance/ |
| gpt-oss-120b | 2× RTX PRO 6000, TP2 (vLLM 0.15–0.16, MXFP4) | 62 single-stream / 2,656 aggregate | tok/s, rate 16 req/s, in 512 / out 256. The single-stream figure is oddly low for TP2 | 2026-09-26 | https://eordano.github.io/rtx-6000-research/ |
| gpt-oss-120b, throughput at interactivity target | H100 (vLLM, FP4; variant not stated, probably SXM) | 8,973 @50 tok/s/user · 7,136 @75 · 5,863 @100 · 3,931 @150 · **2,558 @200 tok/s/user** · peak 10,284 | tok/s **per GPU**, in 8k / out 1k, runs 2026-03-27 → 05-17 | 2026-09-26 | https://inferencex.semianalysis.com/run/gptoss-120b-on-h100 |
| gpt-oss-120b, saturation | 2× H100 SXM, TP2 (vLLM 0.10.2, async scheduling) | 16,042 (TP1 baseline 6,095) | tok/s **total (in+out)**, ShareGPT; mean ITL 43 ms | 2026-09-26 | https://docs.gpustack.ai/2.1/performance-lab/gpt-oss-120b/h100/ |
| Llama 3.3 70B, throughput at interactivity target | H100 (vLLM, FP8; variant not stated) | 2,056 @30 tok/s/user · 1,496 @50 · 923 @75 · **100 tok/s/user not reached** · peak 2,568 | tok/s **per GPU**, in 8k / out 1k, run 2025-10-29 | 2026-09-26 | https://inferencex.semianalysis.com/run/llama-3-3-70b-on-h100 |
| Llama 3.3 70B | 4× H100 SXM5, TP4 (NIM/TensorRT-LLM, BF16) | ~7,000 @500 users (200→200 tok); ~2,600 @250 users (1,000→200) | tok/s aggregate; TTFT <5 s | 2026-09-26 | https://dlewis.io/evaluating-llama-33-70b-inference-h100-a100/ |
| Llama 3.3 70B | 1× RTX PRO 6000 (vLLM, **NVFP4**, 89.7 GB) | 18.8 single / 1,225 batched | tok/s | 2026-09-26 | https://github.com/chsasank/blackwell |
| Qwen3-32B FP8 | 1× L40S (vLLM) | 127 @c8 (ITL 59 ms ≈ 17 tok/s/user) / 244 @c32 / 245 @c64 | tok/s aggregate, in 1024 / out 256, published 2026-08-28 | 2026-09-26 | https://michalwojdylak.com/blog/llm-inference-benchmarks-vllm-sglang-tensorrt-llm |
| Qwen3-32B AWQ / GPTQ | 1× L40S (vLLM) | 349 / 348 @c32 (TTFT 2.8 s) | tok/s aggregate | 2026-09-26 | same |
| Qwen3-32B FP8 | 1× L40S (TensorRT-LLM) | 289 @c32 / 342 @c64 | tok/s aggregate | 2026-09-26 | same |
| Qwen3-30B-A3B FP8 (MoE) | 1× L40S (SGLang) | 897 @c32 (ITL 31 ms) | tok/s aggregate | 2026-09-26 | same |
| DeepSeek-R1-Distill-Qwen-32B (a Qwen2.5-32B architecture) FP16 | 1× RTX PRO 6000 (vLLM) | 829 output (966 total); TPOT 58.7 ms (≈17 tok/s/user) | tok/s, 50 concurrent, in 100 / out 600 | 2026-09-26 | https://www.databasemart.com/blog/vllm-gpu-benchmark-pro6000 |
| DeepSeek-R1-Distill-Qwen-32B | 1× RTX PRO 6000 / 1× H100 / 1× A100-80GB (vLLM) | 1,655 / 1,482 / 721 | tok/s **total**, 300 concurrent | 2026-09-26 | same |
| Qwen3-VL-32B FP16 | 1× RTX PRO 6000 (vLLM) | 796 output; TPOT 61 ms | tok/s, 50 concurrent | 2026-09-26 | same |
| Mistral Small 3.1 24B | 2× H100 SXM5 (vLLM, FP16) | 3,400 | tok/s aggregate, batch 256, 512/512. The source calls it "community data … engineering approximations" | 2026-09-26 | https://www.spheron.network/blog/gpu-cost-per-token-benchmark-llm-inference-2026/ |
| Qwen 3 32B | 2× H100 SXM5 (vLLM, FP16) | 3,200 | tok/s aggregate, batch 256 (same caveat) | 2026-09-26 | same |

#### 4b. Measured, small-model reference points (for scaling across GPUs)

| item | GPU / config | value | unit / conditions | date checked | source URL |
|---|---|---|---|---|---|
| Qwen2.5-7B-Instruct BF16, per-user decode at light load | L4 / L40S / RTX PRO 6000 / H100 PCIe / H100 NVL / H100 SXM (vLLM) | 17 / 48 / 89 / 109 / 160 / 165 | tok/s per user, 1 req/s, no saturation | 2026-09-26 | https://www.runpod.io/articles/guides/best-gpu-for-llm-inference |
| Qwen2.5-7B AWQ | 1× L40S (vLLM) | 136 single / 6,249 @64 concurrent | tok/s, article 2026-09-18 | 2026-09-26 | https://computingforgeeks.com/ollama-vs-vllm-vs-llama-cpp/ |
| Llama 3.1 8B | 1× L40S (vLLM) | 46 | tok/s, batch 1, 512×512 | 2026-09-26 | https://www.koyeb.com/docs/hardware/gpu-benchmarks |

#### 4c. ESTIMATES for gaps (use until measured)

Method, labelled **ESTIMATE**: single-stream decode ≈ k × memory bandwidth ÷ bytes read per token. Here k ≈ 0.6–0.75 for dense models (vLLM overheads), and "bytes" means active weights. For MoE models I scale the measured RTX PRO 6000 figure by the ratio of memory bandwidths, and I cap the result where compute or kernels likely limit it. Aggregate figures at ~32–64 concurrent are extrapolated from the closest measured model on the same or a similar GPU.

| item | GPU / config | value | unit / conditions | date checked | source URL |
|---|---|---|---|---|---|
| Mistral Small 3.x 24B, single-stream | L4 (AWQ-INT4, ~14 GB) | ~13–16 **ESTIMATE** | tok/s. 300 GB/s ÷ 14 GB ≈ 21 theoretical | 2026-09-26 | bandwidth: https://www.nvidia.com/en-us/data-center/l4/ |
| Mistral Small 3.x 24B, single-stream | L40S (FP8, ~25 GB) | ~22–26 **ESTIMATE** | tok/s. 864 ÷ 25 ≈ 35 theoretical, in line with 17 tok/s/user measured for 32B FP8 at c8 | 2026-09-26 | https://www.nvidia.com/en-us/data-center/l40s/ |
| Mistral Small 3.x 24B, single-stream | RTX PRO 6000 (FP8) | ~45–55 **ESTIMATE** | tok/s. 1.6–1.8 TB/s ÷ 25 GB | 2026-09-26 | NVIDIA pages above |
| Mistral Small 3.x 24B, single-stream | H100 PCIe / NVL (FP8) | ~55–60 / ~90–110 **ESTIMATE** | tok/s. 2.0 / 3.9 TB/s ÷ 25 GB × 0.7 | 2026-09-26 | https://www.nvidia.com/en-us/data-center/h100/ |
| Mistral Small 3.x 24B, aggregate @32–64 conc. | L40S FP8 / RTX PRO 6000 FP8 / H100 FP8 | ~350–450 / ~1,200–1,500 / ~1,500–2,000 **ESTIMATE** | tok/s. Extrapolated from Qwen3-32B FP8 on L40S (244 @c32; the 24B model leaves more KV-cache room), 32B/14B FP16 on PRO 6000 (829 / 1,744 @c50) and 2×H100 3,400 @b256 | 2026-09-26 | sources in 4a |
| Qwen 2.5/3 32B, single-stream | L40S FP8 / RTX PRO 6000 FP8 / H100 NVL FP8 | ~18–22 / ~35–40 / ~70–80 **ESTIMATE** | tok/s (33 GB weights) | 2026-09-26 | bandwidth sources above |
| Qwen 32B | L4 | does not fit usefully (INT4 ~18 GB + KV in 24 GB) → **not recommended** | – | 2026-09-26 | – |
| Llama 3.3 70B FP8, single-stream | 2× H100 NVL, TP2 | ~60–75 **ESTIMATE** | tok/s. 7.8 TB/s ÷ 72 GB ≈ 108 theoretical × ~0.6; InferenceX shows 75 tok/s/user reachable on H100 but not 100 | 2026-09-26 | https://inferencex.semianalysis.com/run/llama-3-3-70b-on-h100 |
| Llama 3.3 70B FP8, single-stream | 2× H100 PCIe 80GB, TP2 | ~35–45 **ESTIMATE** | tok/s. 4.0 TB/s ÷ 72 GB | 2026-09-26 | Lenovo H100 PCIe bandwidth, above |
| Llama 3.3 70B FP8, aggregate @32–64 conc. | 2× H100 (NVL or SXM) | ~1,500–3,000 **ESTIMATE** | tok/s. InferenceX 923–2,056 tok/s **per GPU** at 75–30 tok/s/user, ×2 GPUs, minus TP overhead; PCIe/NVL is lower than SXM | 2026-09-26 | same |
| Llama 3.3 70B FP8, single-stream | 1× RTX PRO 6000 (FP8 ~72 GB fits, little KV room) | ~15–20 **ESTIMATE** | tok/s. The measured NVFP4 figure is 18.8 | 2026-09-26 | https://github.com/chsasank/blackwell |
| Llama 3.3 70B | L40S (1 card) / L4 | does not fit (needs ≥2× L40S with INT4/FP8) | – | 2026-09-26 | – |
| gpt-oss-20b, single-stream | L4 / L40S / H100 PCIe | ~40 / ~110–125 / ~250–290 **ESTIMATE** | tok/s. PRO 6000 measured 258 scaled by bandwidth (0.30 / 0.86 / 2.0 vs 1.79 TB/s). On Ada (L4/L40S) vLLM has no native MXFP4 kernels, and the vLLM recipe lists Ada support as "actively working", so this is a risk | 2026-09-26 | https://github.com/iamthemovie/LLMBenchmarks |
| gpt-oss-20b, aggregate @32–64 conc. | L40S / H100 | ~1,500–2,500 / ~4,000–6,000 **ESTIMATE** | tok/s. PRO 6000 measured 3,872 @c40 and 6,661 @c80, scaled | 2026-09-26 | same |
| gpt-oss-120b, single-stream | 1× H100 80/94 GB | ~190–250 **ESTIMATE** | tok/s. PRO 6000 173 × 2.0/1.79 ≈ 193 for PCIe; InferenceX shows ≥200 tok/s/user reachable on H100 | 2026-09-26 | InferenceX + chsasank above |
| gpt-oss-120b | L40S (48 GB) / L4 | does not fit on one card (~65 GB of weights) | – | 2026-09-26 | – |

Notes:
- Decode speed is bound by memory bandwidth, so the single-stream ranking follows bandwidth: L4 (0.3 TB/s) ≪ L40S (0.86) < RTX PRO 6000 (1.6–1.8) < H100 PCIe (2.0) < H100 SXM (3.35) < H100 NVL (3.9). The Runpod 7B light-load row confirms the order: 17 / 48 / 89 / 109 / 165 / 160 tok/s.
- Aggregate throughput depends on the KV-cache room left after the weights. That is why the 48 GB L40S plateaus at about 245 tok/s on 32B FP8 (32 GB of weights) and why AWQ-INT4 does better there (349 tok/s).
- MoE models (gpt-oss-20b/120b, Qwen3-30B-A3B) give 3–5× the tok/s of dense models of the same size. For the calculator, the RTX PRO 6000 + gpt-oss-120b pairing is the standout: about 170 tok/s single-stream and more than 6k tok/s batched on one 96 GB card.
- Test conditions vary between sources (input/output lengths, request rate versus fixed concurrency, and total versus output tok/s). The calculator should use conservative mid-range values and show the source class.

---

# 4. Hidden and switching costs, price escalation

## Part 4: Hidden and switching costs, US SaaS price escalation

Checked 2026-09-26. Every figure below comes from a page fetched on that date, unless it is marked ESTIMATE (a value I derived, with the reasoning given) or UNVERIFIED (seen only in a search snippet and not confirmed on a fetched page).

FX used for conversions: ECB reference rate on 2026-09-25 was **EUR 1 = USD 1.1403**, so USD 1 = EUR 0.877. Pulled from the ECB series through the Frankfurter API (https://api.frankfurter.dev/v1/latest?base=EUR&symbols=USD). Every EUR figure converted from USD is an ESTIMATE at this rate, excluding VAT (HT).

---

### 1. Migration cost per user

#### 1a. Migration tools (list prices)

| item | source / provider | value | basis | date checked | source URL |
|---|---|---|---|---|---|
| MigrationWiz User Migration Bundle | BitTitan | USD 17.50/user, about **EUR 15.35 HT** (ESTIMATE, FX) | One licence per user, valid 12 months, no data cap. Covers mailbox, archive, OneDrive/Google Drive/Dropbox docs and Teams private chat. Promo: buy 2, get 1 free (up to 100 free) | 2026-09-26 | https://www.bittitan.com/pricing-bittitan-migrationwiz/ |
| MigrationWiz Mailbox | BitTitan | USD 14/user, about **EUR 12.28** (ESTIMATE) | Mailbox only, up to 50 GB | 2026-09-26 | same |
| MigrationWiz Tenant Migration Bundle | BitTitan | USD 57/user, about **EUR 49.99** (ESTIMATE) | User bundle plus Teams or shared documents up to 100 GB | 2026-09-26 | same |
| MigrationWiz Shared Documents / Teams | BitTitan | USD 25 per library (50 GB), USD 48 per library or team (100 GB) | Per library or per team | 2026-09-26 | same |
| MigrationWiz AD/Entra (SMB) | BitTitan | USD 6.25/user, about EUR 5.48 (ESTIMATE) | Identity migration, 12 months | 2026-09-26 | same |
| Movebot mailbox | Movebot | **EUR 15.00 per mailbox** (published in EUR) | Per transfer, unlimited data, no subscription | 2026-09-26 | https://movebot.io/en/pricing |
| Movebot files | Movebot | **EUR 0.75/GB or less** | Pay-as-you-go. Covers shared, team and personal drives. Scanning is free | 2026-09-26 | same |
| CloudM Migrate | CloudM | No public price, quote only | Priced per user (full or mail-only), per 10 GB (to Google) or per 100 GB (to M365). 12-month licence | 2026-09-26 | https://www.cloudm.io/pricing |
| AvePoint Fly Server | AvePoint | No public price, "one universal per-user price" | Covers Gmail, Google Drive/Chat, Slack, Box, Dropbox, IMAP, M365. Contact sales | 2026-09-26 | https://cdn.avepoint.com/pdfs/en/brochures/Fly-Server-User-SKUs.pdf |
| Microsoft FastTrack | Microsoft | **Free** with 150 or more eligible licences per tenant | Includes guidance and data migration services. Migrates Google Workspace mail, contacts and calendar, plus Drive only. Inbound to M365 only, English, 24x7. Data may be processed anywhere Microsoft has facilities | 2026-09-26 (page updated 2026-09-01) | https://learn.microsoft.com/en-us/microsoft-365/fasttrack/data-migration ; https://learn.microsoft.com/en-us/microsoft-365/fasttrack/eligibility |

Notes. The tooling itself costs about EUR 12–50 per user. FastTrack only helps with moves *into* Microsoft, and it becomes a switching barrier because leaving M365 gets no equivalent free help. The FastTrack page itself says its migration services are "not designed or intended for data subject to special legal or regulatory requirements" and that data may be processed anywhere Microsoft has facilities. That is a useful argument for souvara.

#### 1b. Service and all-in estimates (consultancy / MSP blogs)

| item | source / provider | value | basis | date checked | source URL |
|---|---|---|---|---|---|
| M365 migration tooling, by method | GMWARE (blog, 2026-05-26) | Cutover (<150 mbx) USD 15–40. Staged (150–2,000) USD 25–75. Hybrid (2,000+) USD 50–200 per mailbox | US market bands | 2026-09-26 | https://gmware.com/blog/microsoft-365-migration-cost/ |
| M365 migration, true all-in | GMWARE | **USD 50–200+/user**, about EUR 44–175 (ESTIMATE) | Includes labour at USD 85–175/h, licence overlap, downtime and rework. Tenant-to-tenant is 2–3x | 2026-09-26 | same |
| Worked examples | GMWARE | 15 users about USD 20k. 75 users about USD 80k. 200 users (tenant-to-tenant) USD 60–120k in year one | All-in first year, **including licences**, so it overstates pure migration cost | 2026-09-26 | same |
| Office 365 migration, market range | MedhaCloud (blog, 2026-08-01) | 10 users USD 1.5–3k. 50 users USD 5–12k. 250 users USD 20–45k. 1,000 users USD 75–200k | Market range for migration services (not licences). **Works out to about USD 75–300/user for small orgs and USD 75–200/user at 1,000 users** (ESTIMATE, division) | 2026-09-26 | https://medhacloud.com/blog/office-365-migration-cost |
| Email migration labour | MedhaCloud | USD 25–50 per mailbox (market). OneDrive about USD 10/user. SharePoint about USD 120/site. Teams about USD 12/team | Labour line items | 2026-09-26 | same |

#### 1c. Public-sector case studies

| item | source / provider | value | basis | date checked | source URL |
|---|---|---|---|---|---|
| Schleswig-Holstein (DE), one-off investment | State Chancellery press release, 2025-12-04 | **EUR 9M in 2026** | Migration plus further development of the open-source solutions | 2026-09-26 | https://www.schleswig-holstein.de/DE/landesregierung/ministerien-behoerden/I/_startseite/Artikel2025/IV/251204_cds_digitale_souveraenitaet |
| Schleswig-Holstein, recurring savings | same | **More than EUR 15M/yr** in licence costs | Payback in under 1 year | 2026-09-26 | same; https://www.heise.de/en/news/Goodbye-Microsoft-Schleswig-Holstein-relies-on-Open-Source-and-saves-millions-11105459.html |
| Schleswig-Holstein, scale | heise (DE) / Borncity | About 30,000 workplaces. 44,000 mailboxes and 110M mails and calendar entries moved to Open-Xchange/Thunderbird (done 2025-10-02). About 80% of workplaces on LibreOffice; about 6,000 still on MS Office | Scope | 2026-09-26 | https://www.heise.de/hintergrund/Schleswig-Holstein-Fast-80-Prozent-der-Microsoft-Lizenzen-gekuendigt-10960941.html ; https://borncity.com/blog/2025/12/08/schleswig-holstein-schon-80-der-arbeitsplaetze-auf-libreoffice-umgestellt/ |
| Schleswig-Holstein, per user | derived | **About EUR 300 one-off per workplace, against about EUR 500/yr saved per workplace** (ESTIMATE) | EUR 9M / 30,000 and EUR 15M / 30,000. The EUR 9M also funds software development, so it is an upper bound for pure migration | 2026-09-26 | derived from rows above |
| Munich, return to Windows (2017) | The Register | EUR 49.3M for the Windows 10 transition (inside an EUR 89M IT overhaul). Licences EUR 9M over 6 years | About 30,000 staff plus 5,000. About **EUR 1,400–1,650 per workstation** (ESTIMATE; includes hardware and infrastructure, so not comparable with a SaaS switch) | 2026-09-26 | https://www.theregister.com/2017/11/24/munich_will_spend_about_50_million_euros_on_windows_migration/ |
| Munich LiMux (original) | LWN | IT committee estimated EUR 20M savings. An unpublished HP study funded by Microsoft claimed Linux "cost EUR 43M more". 15,000 PCs migrated by 2013. 18,000 templates rebuilt | Shows how contested these TCO figures are, and the hidden cost of templates and macros | 2026-09-26 | https://lwn.net/Articles/737818/ |
| Gendarmerie nationale (FR) | Wikipedia (GendBuntu) | **About 40% TCO reduction** (Dec 2013). Target of about EUR 2M/yr software savings. 103,164 workstations (97% of the fleet) by June 2024 | Phased over 2004–2014: OpenOffice first, then Firefox/Thunderbird, then Ubuntu | 2026-09-26 | https://en.wikipedia.org/wiki/GendBuntu |
| Ville de Lyon (FR) | The Register / IT-Connect | EUR 2M ANCT grant for the "Territoire Numérique Ouvert" suite. Lyon's government employs "almost 10,000 people" | Moving to OnlyOffice and Linux. No per-user migration cost published | 2026-09-26 | https://www.theregister.com/2025/06/26/lyon_leaving_microsoft/ ; https://www.it-connect.fr/lyon-va-abandonner-windows-et-office-au-profit-de-linux-et-onlyoffice/ |
| Danish Ministry of Digitalisation | — | No cost figure found (computing.co.uk returned 403) | Moving about half of staff to LibreOffice from July 2025 | 2026-09-26 | https://www.computing.co.uk/news/2025/denmark-digital-ministry-drops-microsoft (blocked) |
| DINUM / La Suite (FR) | — | UNVERIFIED (search snippets only): ministries asked for about EUR 4M, EUR 12M total for 2026. Migration plans due autumn 2026, deployments 2027–2029 | Not fetched, so do not use as a figure | 2026-09-26 | https://acteurspublics.fr/articles/la-dinum-demande-aux-ministeres-de-mettre-la-main-au-portefeuille-pour-developper-sa-suite-numerique/ |

---

### 2. Training costs

| item | source / provider | value | basis | date checked | source URL |
|---|---|---|---|---|---|
| Cegos "Microsoft 365 – Exploiter les outils collaboratifs en ligne" | Cegos (FR) | **EUR 890 HT for 2 days (14 h)** | Inter-company course, in person or remote classroom, CPF-eligible. Works out to **EUR 445/person/day, about EUR 64/h** (ESTIMATE, division) | 2026-09-26 | https://www.cegos.fr/formations/bureautique/microsoft-365-exploiter-les-outils-collaboratifs-en-ligne |
| Cegos "S'initier à la bureautique", "Excel débutant" | Cegos | EUR 890 HT for 2 days each | Catalogue listing | 2026-09-26 | https://www.cegos.fr/formations/bureautique |
| LibreOffice course lengths | Dawan (FR) | Writer 2 days. Calc 2 days. Impress 1 day. Full Writer+Calc+Impress 5 days | Durations only, no prices shown | 2026-09-26 | https://www.dawan.fr/formations/bureautique |
| Structured adoption programme | EPC Group (vendor guide) | Instructor-led sessions of 1–2 h per application, plus 5–10 champions per 100 users. Claims "85%+ adoption within 30 days" with the programme, against 40–50% without | Vendor claim, not independent | 2026-09-26 | https://www.epcgroup.net/google-workspace-to-microsoft-365-migration-enterprise-guide |
| Post-migration orientation | MedhaCloud | A 1-hour orientation "significantly" reduces tickets | No EUR figure | 2026-09-26 | https://medhacloud.com/blog/office-365-migration-cost |

Notes. I did not verify an OPCO hourly funding cap or any per-user e-learning price, because the search budget ran out before I got to them. I found no published, quantified productivity-dip figure. The only nearby data point is EPC's vendor claim that a "big bang" cutover produces 3–5x more support tickets, which came from a search snippet and is not quantified in euros. Treat any productivity-dip input as a user-adjustable assumption and flag it in the UI.

---

### 3. Dual-running (coexistence) period

| item | source / provider | value | basis | date checked | source URL |
|---|---|---|---|---|---|
| Google Workspace to M365 coexistence | EPC Group | **2–4 weeks** typical. By size: <100 users 1 wk. 100–500 users 2 wk. 500–2k 2–3 wk. 2k–10k 3–4 wk. 10k+ 4 wk | Total project: 2–3 wk (<100 users) up to 16–24 wk (10k+) | 2026-09-26 | https://www.epcgroup.net/google-workspace-to-microsoft-365-migration-enterprise-guide |
| Old system kept after cutover | MedhaCloud | **30–90 days** of legacy hosting and licences | Parallel-operation cost | 2026-09-26 | https://medhacloud.com/blog/office-365-migration-cost |
| Licence overlap named as a main hidden cost | GMWARE | "You pay for the target Microsoft 365 licenses while the source system is still running" | Qualitative | 2026-09-26 | https://gmware.com/blog/microsoft-365-migration-cost/ |
| Schleswig-Holstein parallel use | — | UNVERIFIED (search snippet): both systems usable in parallel until end-2025 | Not confirmed on a fetched page | 2026-09-26 | — |

Notes. On annual contracts, the real dual-run cost usually runs **until the renewal date**, not just for the technical coexistence window. Microsoft states that "existing customers remain on current pricing until renewal" and that annual subscriptions cannot be shortened. The Directions on Microsoft piece notes Microsoft still requires "a full year minimum" commitment even when billing is monthly. The calculator should ask for the renewal month.

---

### 4. US SaaS price escalation

#### 4a. Analyst / index figures

| item | source / provider | value | basis | date checked | source URL |
|---|---|---|---|---|---|
| SaaS inflation, Jan 2025 YoY | Vertice | **11.4%** (G7 CPI 2.7%) | Vertice platform spend data. 58% of vendors raised prices in 2024, some by up to 25%. 33% have uncapped auto-increase clauses | 2026-09-26 | https://www.vertice.one/blog/mitigating-2025-saas-inflation-stats |
| SaaS inflation, monthly 2025–26 | Vertice | Nov 2025: 14.7% (peak at the time). Apr 2026: 12.1%. May 2026: 14.2%. **Jun 2026: 16.4% (record)**, against US CPI 4.2% | More than USD 75bn of processed spend. Page updated July 2026 | 2026-09-26 | https://www.vertice.one/insights/saas-inflation-rate |
| SaaS Inflation Index 2026 report | Vertice | Headline **13.2%** (about 5x G7 CPI). SaaS spend per employee USD 7,900 (2023), USD 8,700 (2024), USD 9,100 (2025) | Report landing page | 2026-09-26 | https://www.vertice.one/l/saas-inflation-index-report |
| SaaS inflation 2023 | Vertice via CFO Dive (2023-11-14) | **8.7%** (US CPI 3.2%). Productivity tools +10.1%. Sales +10.6%. Finance +10.2% | 16,000 vendors | 2026-09-26 | https://www.cfodive.com/news/stubbornly-high-saas-prices-outpace-cpi-inflation/699683/ |
| Gartner (M. Tucciarone), via CIO.com 2025-12-12 | Gartner | Subscription costs from several large vendors **rose 10–20% in 2025**, against IT budget growth of 2.8%. PE-owned vendors up to 900% | Analyst quote in press | 2026-09-26 | https://www.cio.com/article/4104365/saas-price-hikes-put-cios-budgets-in-a-bind.html |
| IDC, Forrester, Tropic, Sastrify, Vendr, SaaStr | — | Not verified (search budget exhausted) | — | 2026-09-26 | — |

#### 4b. Vendor-specific increases

| item | source / provider | value | basis | date checked | source URL |
|---|---|---|---|---|---|
| Microsoft 365, 1 Mar 2022 | Microsoft blog | Business Basic USD 5→6 (+20%). Business Premium 20→22 (+10%). O365 E1 8→10 (+25%). O365 E3 20→23 (+15%). O365 E5 35→38 (+9%). M365 E3 32→36 (+13%) | "first substantive pricing update since we launched Office 365 a decade ago" | 2026-09-26 | https://www.microsoft.com/en-us/microsoft-365/blog/2021/08/19/new-pricing-for-microsoft-365/ |
| Microsoft monthly-billing uplift, 1 Apr 2025 | Directions on Microsoft | **+5%** for an annual commitment billed monthly (M365, O365, EMS, D365, Power Platform, etc.) | New and renewing subscriptions from 2025-04-01 | 2026-09-26 | https://www.directionsonmicrosoft.com/microsoft-to-add-new-monthly-billing-option-but-at-a-5-premium/ |
| Microsoft 365, 1 Jul 2026 | Microsoft Licensing | O365 E3 23→26 (+13%). O365 E5 38→41 (+8%). M365 E3 36→39 (+8%). M365 E5 57→60 (+5%). **Business Basic 6→7 (+16%). Business Standard 12.50→14 (+12%).** Business Premium unchanged. F1 2.25→3 (+33%). F3 8→10 (+25%). M365 Apps 12→14 (+17%) | Applies at the next renewal on or after 2026-07-01 | 2026-09-26 | https://www.microsoft.com/en-us/licensing/news/2026-m365-packaging-pricing-updates |
| Teams unbundling (no-Teams SKUs), 1 Jul 2026 | Microsoft Licensing | Business Basic without Teams 4.40→5.40 (+23%). Business Standard without Teams 9.29→10.79 (+16%). O365 E3 without Teams 14.45→17.45 (+21%) | The "without Teams" SKUs rise faster in % than the bundles | 2026-09-26 | same |
| Microsoft cumulative 2022→2026 | derived | M365 E3 USD 32→39 = **+21.9%, about 4.7%/yr**. O365 E3 20→26 = +30%, about 6.2%/yr. Business Basic 5→7 = **+40%, about 8.1%/yr**. Business Standard 12.50→14 = +12%, about 2.7%/yr. Business Premium 20→22, about 2.2%/yr | ESTIMATE: CAGR over the 4.33 years between the 2022-03-01 and 2026-07-01 list-price changes. Excludes the +5% monthly-billing uplift | 2026-09-26 | derived from the two Microsoft rows |
| Google Workspace, 2023 (flexible) | 9to5Google | **+20%** on flexible plans. Starter 6→7.20. Standard 12→14.40. Plus 18→21.60. Annual plans unchanged | Effective 2023 (phased; ≤10 licences deferred to Jan 2024) | 2026-09-26 | https://9to5google.com/2023/03/13/google-workspace-price-increase/ |
| Google Workspace, 2025 (Gemini bundled) | Incentro | Flexible: Starter 7.20→8.40 (+16.7%), Standard 14.40→16.80 (+16.7%), Plus 21.60→26.40 (+22.2%). Annual: Starter 6→7, Standard 12→14, Plus 18→22 | New customers from 2025-01-16. Existing customers from 2025-03-17 or at renewal | 2026-09-26 | https://www.incentro.com/en-EAF/news/google-workspace-price-increase-2025 ; https://www.getmailbird.com/google-workspace-pricing-small-business-guide/ |
| Google Workspace cumulative | derived | Business Standard flexible 12→16.80 = **+40%, about 10%/yr**. Business Standard annual 12→14, about 4.5%/yr. Business Plus flexible 18→26.40 = +47%, about 11.6%/yr | ESTIMATE: CAGR over about 3.5 years (Mar 2023 to Sep 2026) | 2026-09-26 | derived |
| Salesforce, 1 Aug 2025 | Salesforce newsroom | **+6% average** on Enterprise and Unlimited editions (Sales, Service, Field Service, some Industries). Foundations, Starter and Pro unchanged | The 2023 +9% increase was not confirmed on this page | 2026-09-26 | https://www.salesforce.com/news/stories/pricing-update-2025/ |
| Atlassian Cloud, 15 Oct 2025 | Adaptavist | Standard +5%. Premium +7.5%. Enterprise +7.5–10%. Bitbucket +10% | Jira, Confluence, JSM, Bitbucket, Guard | 2026-09-26 | https://www.adaptavist.com/blog/atlassian-price-updates-effective-october-2025 |
| Slack Business+, June 2025 | Slack blog | USD 12.50→**15** (+20%) annual billing. USD 18 monthly billing | Advanced AI bundled in | 2026-09-26 | https://slack.com/blog/news/june-2025-pricing-and-packaging-announcement |
| VMware / Broadcom | CISPE complaint to DG COMP, 2026-03-19 | Cumulative cost increases of **more than 1,000%** (price hikes, bundling, up-front payments, minimum commitments). VCSP programme in Europe terminated Jan 2026. Beltug CEO: "In 2024, within just a few weeks, VMware changed its prices, licensing model, ordering…" | Trade-body complaint (advocacy source) | 2026-09-26 | https://www.cispe.cloud/cispe-files-competition-complaint-against-broadcom |
| Zoom | — | Not verified | — | — | — |

#### 4c. Lock-in, egress and currency

| item | source / provider | value | basis | date checked | source URL |
|---|---|---|---|---|---|
| Microsoft licensing surcharge on non-Azure clouds | CISPE / Prof. F. Jenny (2023-06-22) | **EUR 1.01bn** (2022, SQL Server). Office 365 BYOL change about **EUR 560M** first-year repurchase. **28%** premium for O365 on non-Microsoft clouds | Economic study used in the EC complaint (later settled) | 2026-09-26 | https://www.cispe.cloud/the-billion-euro-unfair-software-licence-tax-on-eu-customers/ |
| Azure internet egress (Europe) | Microsoft | First 100 GB/month free, then **USD 0.087/GB** (next 10 TB), 0.083 (40 TB), 0.07 (100 TB), 0.05 (350 TB). ISP routing 0.08→0.04 | About EUR 0.076/GB for the first tier (ESTIMATE, FX) | 2026-09-26 | https://azure.microsoft.com/en-us/pricing/details/bandwidth/ |
| AWS internet egress | AWS | 100 GB/month free (aggregated). The page notes EU customers "may qualify for reduced rates under the European Data Act" | Per-GB tiers not rendered in the fetch | 2026-09-26 | https://aws.amazon.com/ec2/pricing/on-demand/ |
| EUR/USD, current | ECB via Frankfurter | **1.1403** (2026-09-25) | ECB reference | 2026-09-26 | https://api.frankfurter.dev/v1/latest?base=EUR&symbols=USD |
| EUR/USD range 2021→2026 | ECB via Frankfurter | High **1.2338** (2021-01-06). Low **0.9565** (2022-09-28). A **29% swing** (ESTIMATE, ratio). Yearly ranges: 2022 0.957–1.146. 2024 1.039–1.120. 2025 1.020–1.184. 2026 YTD 1.134–1.197 | ECB daily series, 1,470 observations | 2026-09-26 | https://api.frankfurter.dev/v1/2021-01-01..2026-09-25?base=EUR&symbols=USD |

Currency notes. Microsoft and Google publish EUR price lists but set them from USD and re-align them periodically. I did not verify the dates of those FX re-alignments today. For USD-invoiced SaaS (Slack, Atlassian, many US tools), a EUR buyer carries the full exchange-rate risk: the observed 2021–2026 range implies about ±12–15% around the midpoint (ESTIMATE). Present currency risk as a separate sensitivity toggle, not inside the escalation rate.

---

### 5. Recommended calculator defaults (EUR HT)

**Migration, one-off, EUR per user**
- Low **EUR 50**: tool plus light self-service. Tool alone is about EUR 15 (MigrationWiz user bundle about EUR 15.35, Movebot EUR 15 per mailbox), plus a few hours of in-house IT.
- Central **EUR 150**: sits inside the USD 50–200 (about EUR 44–175) all-in band from GMWARE and MedhaCloud's USD 75–200/user at 1,000 users. SMEs under 50 users trend higher per head because of project minimums.
- High **EUR 300**: the Schleswig-Holstein benchmark (EUR 9M / 30,000 workplaces). It includes custom development, so it is the upper case for complex or regulated estates, or where there are many macros and templates (see Munich's 18,000 templates).
- Add EUR 0.75/GB for bulk file data above the per-user allowance (Movebot) where file volume is large.

**Training, one-off, EUR per user (external cost only)**
- Low **EUR 60**: 1–2 h orientation, e-learning and champions, delivered in-house. ESTIMATE: about 1 h at the EUR 64/h Cegos inter rate.
- Central **EUR 150**: about half a day of group training. ESTIMATE: an intra-company session shared by a group costs less per head than the Cegos inter rate of EUR 445/day.
- High **EUR 445**: one full inter-company day (Cegos EUR 890 for 2 days).
- Also count **staff time**: 2–4 h per user multiplied by the loaded hourly salary, as a separate line. Productivity dip: no published source, so leave it as an optional user input with a default of 0 and a tooltip.

**Dual-running, months of overlapping licences**
- Low **0.5**: 2 weeks, cutover in small organisations (EPC).
- Central **2**: covers 2–4 weeks of coexistence plus 30–90 days keeping the old system (MedhaCloud).
- High **3**: 90 days, or up to the next annual renewal if the contract cannot be ended early. Ask for the renewal month.

**US SaaS annual price escalation**
- Low **5%/yr**: the observed Microsoft E3 CAGR 2022–26 was 4.7%. Atlassian Standard +5%, Salesforce +6%.
- Central **8%/yr**: sits in the observed range for SME suites (Microsoft Business Basic 8.1%/yr, O365 E3 6.2%/yr, Google Business Standard annual 4.5%/yr and flexible about 10%/yr), just under Vertice's all-SaaS 2023 figure of 8.7%. It is conservative against Vertice's 11.4–13.2% for 2025–26, which is right for a credibility-first calculator.
- High **12%/yr**: Vertice 11.4% (Jan 2025) to 13.2% (2026 report), Gartner's "10–20%" for large vendors, and the 2025 Google (+17–22%) and Slack (+20%) one-off jumps. Show 16.4% (Vertice June 2026 peak) as the stress case in copy, not as a default.
- Reasoning: increases come in steps, not every year, so a CAGR over several years is fairer than any single-year jump. Price the +5% Microsoft monthly-billing uplift and the no-Teams SKU increases as one-off steps where they apply. Keep FX (±12–15%) as a separate toggle.

---

# 5. Calculator formulas

Conventions: all amounts are EUR HT. `y` is the year index (1..H) and H is the horizon (3 or 5 years). One month is 730 h. Every default is taken from the tables in §1–§4, carries its source, and can be overridden by the user. Defaults marked ESTIMATE come with their reasoning.

## 5.1 Productivity suite

### Inputs

| Input | Symbol | Default (low / central / high) | Source |
|---|---|---|---|
| Users | N | user-entered | |
| Current suite price per user/month | P_us | chosen SKU in §1a (annual-commitment price) | §1a |
| Billing uplift if monthly commitment | b_us | ×1.20 (Microsoft Business), ×1.19 (Google Flexible) | §1a |
| Target suite price per user/month | P_eu | chosen SKU in §1b | §1b |
| Year-1 promo on target | promo_eu | e.g. kSuite Business/Enterprise −50 % in year 1 (off by default) | §1b |
| US annual price escalation | g_us | 5 % / **8 %** / 12 % | §4 (Microsoft CAGR 2022–26 4.7–8.1 %/yr, Google 4.5–10 %/yr, Vertice 11.4–13.2 %) |
| EU annual price escalation | g_eu | **3 %** ESTIMATE | No analyst index exists for EU SaaS. 3 % ≈ French CPI plus a margin. User-adjustable |
| FX stress on USD-priced items | fx | 0 % (toggle ±12–15 %) | §4c EUR/USD range 2021–26 |
| Migration per user (one-off) | M_u | 50 / **150** / 300 € | §4 §1 |
| Fixed project cost (one-off) | M_f | 0 € (optional: pilot, SSO, DNS) | user |
| Training per user (one-off, external) | T_u | 60 / **150** / 445 € | §4 §2 (Cegos €445/day) |
| Staff time for training | t_train × w | 3 h × loaded hourly cost (optional) | §4 §2 |
| Dual-running months | m_dual | 0.5 / **2** / 3, or months left to renewal | §4 §3 |
| Extra run cost per year (self-hosted) | A_delta | 0 for SaaS; hosting + admin time when self-hosted | §2 + user |
| Discount rate | r | 0 % (optional NPV) | user |

### Formulas

    One-off switching cost:
    S = N × (M_u + T_u + t_train × w) + M_f + N × P_us × m_dual

    Recurring cost in year y:
    C_us(y) = N × P_us × b_us × 12 × (1 + g_us)^(y−1) × (1 + fx)
    C_eu(y) = N × P_eu × 12 × (1 + g_eu)^(y−1) − [y = 1] × N × P_eu × 12 × promo_eu + A_delta

    TCO over horizon H:
    TCO_stay(H)   = Σ_{y=1..H} C_us(y) / (1 + r)^(y−1)
    TCO_switch(H) = S + Σ_{y=1..H} C_eu(y) / (1 + r)^(y−1)
    Savings(H)    = TCO_stay(H) − TCO_switch(H)

    Payback month = first month m where Σ_{k=1..m} (monthly C_us − monthly C_eu) ≥ S

**Like-for-like warning (UI).** Microsoft 365 E3/E5 also include Windows Enterprise, Intune and Defender. A mail + files + office suite replaces Office 365 E1/E3 or Microsoft 365 Business Basic/Standard, not Microsoft 365 E3/E5. The calculator should warn when the user maps Microsoft 365 E3/E5 to a collaboration suite alone.

## 5.2 Infrastructure

    Monthly bill for provider p:
    C_infra(p) = Σ_VM n_vm × P_vm(p) + TB_block × P_block(p) + TB_object × P_obj(p)
                 + max(0, TB_egress − free_TB(p)) × P_egress(p) + n_IPv4 × P_ip(p)

    Annual cost in year y:
    C_infra(p, y) = 12 × C_infra(p) × (1 + g_p)^(y−1) × (1 + fx if USD-priced)

    Switching cost:
    S_infra = migration days × day rate + m_dual × C_infra(current)

TCO and savings then follow the formulas in §5.1. Offer a filter for **"SecNumCloud-qualified only"**, which keeps only the qualified rows in §2 (OVHcloud SNC offers, Outscale, Cloud Temple, S3NS and others). Most of those prices are "sur devis", so the calculator must show a "quote required" state rather than a number.

## 5.3 AI inference: API vs rented GPU vs owned GPU

### Inputs

| Input | Symbol | Default | Source / reasoning |
|---|---|---|---|
| Tokens per month (input + output) | Q | user-entered | |
| Input share | α | **0.75** ESTIMATE | Typical chat and RAG traffic has about 3 input tokens per output token. User-adjustable (0.5 for generation-heavy work, 0.9 for summarisation) |
| Tokenizer factor | τ | 1.0 (1.3 for Claude 4.7+) | §3a A2: the new tokenizer produces about 30 % more tokens for the same text |
| API prices per 1M tokens | p_in, p_out | §3a | |
| Cached-input share and price factor | κ, c | 0 and 0.1 | §3a: cached input costs about 0.1× input at all four US providers |
| Batch share | β | 0 (batch is −50 %) | §3a |
| EU residency uplift | ρ | 0 %, or +10 % (OpenAI and Mistral regional, Anthropic via Bedrock/Vertex) | §3a |
| API price trend per year | g_api | **0 %** (range −30 % to +10 %) ESTIMATE | Recent moves go both ways: Sonnet 5 is −33 % against Sonnet 4.6 and Opus 5.5 is −20 % against Opus 5, but Gemini 3.8 Flash doubles on 1 Jan 2027. A neutral default avoids bias |
| GPU rental per hour, or provider monthly price | h / R_m | §3a B | Use the provider's own monthly price for 24/7 use (OVH is below 730 × hourly) |
| Hours rented per month | H_m | 730 (24/7), or 220 (business hours, stop/start) | |
| Server purchase price | CAPEX | 1× L40S €20k, 1× RTX PRO 6000 €28k, 2× H100 NVL €80k | §3b, all ESTIMATE ±20 % |
| Depreciation period (accounting) | L | 3 years | §3b |
| Server service life | L_life | 5 years ESTIMATE | Inference servers commonly run 5 years; set 3 to force a refresh within a 5-year horizon |
| Server power at load / idle (kW) | W_load, W_idle | 0.60 / 0.85 / 1.35 at load; 0.15 idle | §3b (1,382 W measured for 2× H100 NVL; about 120 W idle) |
| Load share of hours | u | 0.5 ESTIMATE | |
| PUE | PUE | **1.8** (on-prem room), 1.5 (colocation) | §3b |
| Electricity price | e | **0.18 €/kWh HT** (range 0.13–0.23) | §3b (TRV Bleu Pro 0.1624, Eurostat FR 0.1946) |
| Hardware support | maint | 10 %/yr of CAPEX ESTIMATE | Typical 3–5-year on-site warranty extension priced as a share of hardware |
| Ops time (patching, model updates, monitoring) | ops | **€600/month** ESTIMATE | 0.1 FTE × €6,000/month loaded cost for an ops engineer in France. The largest single assumption; show it clearly |
| Colocation | colo | 0 on-prem, or a quote | |
| Output throughput at target concurrency | TPS_out | §3b table for the chosen model and GPU | |
| Maximum sustainable utilisation | u_max | 0.6 ESTIMATE | Traffic is peaky, so capacity must cover peaks at roughly 60 % average load |

### Formulas

    Blended API price per 1M tokens (EUR):
    p_api = (1 + ρ) × (1 − β/2) × [ α × ( (1 − κ) × p_in + κ × c × p_in ) + (1 − α) × p_out ]

    Monthly cost by route:
    API_m  = τ × Q / 1e6 × p_api
    Rent_m = n_gpu × (h × H_m or R_m) + ops
    Own_m  = n_srv × [ CAPEX / (12 × L)                                      (depreciation)
                     + (W_load × u + W_idle × (1 − u)) × 730 × PUE × e      (energy)
                     + maint × CAPEX / 12 ]
             + ops + colo

    Capacity check (output tokens are the binding constraint; prefill is much faster):
    Cap_out = TPS_out × 3600 × H_m × u_max          (output tokens per month per server or GPU)
    n_srv   = ceil( (1 − α) × τ × Q / Cap_out )

    Break-even volume (tokens per month) at which self-hosting costs the same as the API:
    Q*_rent = Rent_m / p_api × 1e6
    Q*_own  = Own_m  / p_api × 1e6

    Self-hosting beats the API only if Q > Q* AND Q* ≤ Cap_out / (1 − α)
    (otherwise more servers are needed, Own_m rises, and Q* must be recomputed).

    TCO over horizon H (G = API volume growth per year):
    TCO_api(H)  = Σ_y 12 × API_m × (1 + g_api)^(y−1) × (1 + G)^(y−1)
    TCO_rent(H) = Σ_y 12 × Rent_m
    TCO_own(H)  = n_srv × CAPEX × ceil(H / L_life) + H × 12 × (Own_m − n_srv × CAPEX / (12 × L))

**Quality guard (UI).** Break-even figures are meaningful only between models of comparable quality, for example Mistral Small via API against Mistral Small self-hosted. The calculator should compare by default against the **same open-weight model on an EU API** (§3a A5), and show the frontier-API comparison (GPT-6 Sol, Claude Sonnet 5) as a separate line labelled "different model class".

## 5.4 Price-escalation control

- A slider for g_us with three presets: **Prudent 5 % / Central 8 % / Stress 12 %**. Link to the §4 sources, and show the Vertice June 2026 peak of 16.4 % in the explanatory copy, not as a preset.
- Show the compounding factor next to it: (1 + g)^(H−1). At 8 %, year 3 is ×1.17 and year 5 is ×1.36.
- Add known one-off steps separately: Microsoft EUR revision on 1 Jan 2027, the +5 % Microsoft monthly-billing uplift on annual commitments, and Gemini 3.8 Flash doubling on 1 Jan 2027.
- Keep FX as a separate toggle, not folded into g_us.

---

# 6. Worked examples

The central defaults from §5 apply unless stated otherwise. Figures are rounded, EUR HT, and discount rate r = 0.

## 6.1 SME, 50 users: Microsoft 365 Business Standard to Infomaniak kSuite Business

Inputs: N = 50, P_us = €12.13 (annual), P_eu = €6.58, g_us = 8 %, g_eu = 3 %.

| Scenario | One-off S | TCO stay 3 y | TCO switch 3 y | Savings 3 y | TCO stay 5 y | TCO switch 5 y | Savings 5 y | Payback |
|---|---|---|---|---|---|---|---|---|
| Central switching (M_u 150, T_u 150, 2 months dual) | 16,213 | 23,627 | 28,416 | **−4,789** | 42,697 | 37,173 | **+5,524** | month 48 |
| Lean switching (M_u 50, T_u 60, 1 month dual). ESTIMATE, realistic for a mail + files SME | 6,106 | 23,627 | 18,309 | **+5,318** | 42,697 | 27,067 | **+15,630** | month 21 |
| Lean switching + kSuite year-1 −50 % promo | 6,106 | 23,627 | 16,335 | **+7,292** | 42,697 | 25,093 | **+17,604** | month 15 |
| Central switching, g_us = 12 % (stress) | 16,213 | 24,559 | 28,416 | −3,857 | 46,236 | 37,173 | +9,063 | month 44 |
| From Google Workspace Business Standard (€13.60), central switching | 16,360 | 26,491 | 28,563 | −2,072 | 47,871 | 37,320 | +10,551 | month 41 |

Infrastructure add-on for the same SME: 2 VMs of 4 vCPU/16 GB, 1 TB block, 1 TB object and 1 TB egress per month.

| | Monthly | 3 years | 5 years |
|---|---|---|---|
| AWS Paris (2 × m7i.xlarge 150.57 + gp3 81 + S3 21 + 0.9 TB egress × 79) | 474 | 17,073 | 28,454 |
| OVHcloud (2 × b3-16 74.68 + block 87 + object 7.10 + egress 0) | 243 | 8,765 | 14,608 |

OVH needs public IPv4 added from 1 Oct 2026 (price not collected). Neither line includes price escalation, and there is no public infrastructure escalation data.

**Reading.** For a small organisation, switching costs, not licence prices, decide the result. The per-user licence gap is only about €5.55/month. A heavy consultancy-led migration takes about 4 years to pay back. A lean, tool-based migration (MigrationWiz or Movebot at about €15/user plus a short training) pays back in under 2 years. On infrastructure, the gap is large and immediate: OVH costs about half as much as AWS, mainly because egress is free and the VM is cheaper.

## 6.2 Organisation, 250 users, 50 M tokens/month

### Suite: Office 365 E3 (€26.27) to kSuite Enterprise (€12.41), central defaults

| Scenario | One-off S | Savings 3 y | Savings 5 y | Payback |
|---|---|---|---|---|
| kSuite Enterprise (SaaS, hosted in Switzerland) | 88,135 | **+52,640** | **+176,553** | month 24 |
| Nextcloud Enterprise Premium (€6.83/user/month at 200+) + OVH Zimbra Pro mail (€1.82), self-hosted on 3 × OVH b3-16 + 1 TB block + 1 TB object, plus 0.25 FTE admin (€18k/yr, ESTIMATE) | 88,135 | +22,052 | +127,351 | month 30 |

TCO stay (Office 365 E3): €255,849 over 3 years and €462,347 over 5 years.

### AI: 50 M tokens/month (37.5 M input, 12.5 M output, α = 0.75)

| Route | Blended €/1M tokens | Monthly | 3 years | 5 years |
|---|---|---|---|---|
| gpt-oss-120b, OVHcloud AI Endpoints (EU) | 0.160 | 8 | 288 | 480 |
| Mistral Small 3.2, Scaleway Generative APIs (EU) | 0.200 | 10 | 360 | 600 |
| Llama 3.3 70B, OVHcloud AI Endpoints (EU) | 0.670 | 34 | 1,206 | 2,010 |
| Mistral Medium 3.5, Scaleway (EU) | 3.000 | 150 | 5,400 | 9,000 |
| GPT-6 Sol, OpenAI (USD, ESTIMATE FX) | 3.505 | 175 | 6,309 | 10,515 |
| Claude Sonnet 5, Anthropic (USD, ESTIMATE FX) | 3.505 | 175 | 6,309 | 10,515 |
| Gemini 3.1 Pro Preview (USD, ESTIMATE FX) | 3.942 | 197 | 7,096 | 11,828 |
| Claude Opus 5.5 (USD, ESTIMATE FX) | 7.018 | 351 | 12,632 | 21,052 |
| Rent Scaleway L40S, business hours (220 h) + ops | – | 923 | 33,242 | 55,403 |
| Rent OVH L40S, monthly 24/7 + ops | – | 1,608 | 57,888 | 96,480 |
| Rent OVH H100, monthly 24/7 + ops | – | 2,540 | 91,440 | 152,400 |
| Own 1× L40S server (€20k) | – | 1,411 | 50,793 | 71,322 |
| Own 1× RTX PRO 6000 server (€28k) | – | 1,729 | 62,257 | 85,096 |
| Own 2× H100 NVL server (€80k) | – | 3,666 | 131,986 | 166,643 |

"Own" is monthly depreciation over 3 years plus energy (u = 0.5, PUE 1.8, €0.18/kWh), 10 % maintenance and €600/month ops. The 3- and 5-year TCOs count one purchase, with a 5-year service life.

Break-even volumes (tokens per month):

| Self-hosted option | vs frontier API (GPT-6 Sol / Sonnet 5, €3.5/M) | vs same-class EU API | Capacity of one unit (total tokens/month at u_max 0.6) |
|---|---|---|---|
| Own 1× L40S (Mistral Small 24B FP8, about 400 tok/s aggregate) | **~400 M** | ~7,000 M vs Mistral Small on Scaleway: **never reached** (above capacity) | ~2,500 M |
| Own 1× RTX PRO 6000 (gpt-oss-120b, about 1,525 tok/s at c50) | **~490 M** | ~10,800 M vs gpt-oss-120b on OVH: **never reached** | ~9,600 M |
| Own 2× H100 NVL (Llama 3.3 70B FP8, about 2,000 tok/s) | ~1,050 M | ~5,500 M vs Llama 70B on OVH | ~12,600 M |
| Rent OVH H100 24/7 | ~725 M | ~15,900 M vs gpt-oss-120b on OVH: never reached | – |
| Rent Scaleway L40S, 220 h | ~263 M | ~4,600 M vs Mistral Small: never reached | ~760 M (220 h) |

**Reading.** At 50 M tokens a month, every API route is far cheaper than owning or renting a GPU. The EU-hosted open-model APIs cost €8–34/month, and even frontier US APIs stay under €360/month, against €900–3,700/month for dedicated hardware. Against a frontier API, owning a server starts to pay only from about 0.4–1 billion tokens a month, 8 to 20 times this organisation's volume. Against the same open model served by an EU API (OVH, Scaleway), self-hosting at list prices practically never pays: the break-even sits at or above one server's capacity. The case for local inference at this scale is confidentiality, air-gapping, latency or customisation (fine-tuning), not cost. The calculator should say so plainly. Sensitivity: ops time is the dominant self-hosted cost. With ops = 0 (already-staffed team), the RTX PRO 6000 break-even against a frontier API falls to about 320 M tokens/month.

Combined 250-user picture, central case, 5 years: switching the suite to kSuite Enterprise saves about €177k. Using an EU open-model API instead of a frontier US API saves a further €10k over 5 years; buying a GPU server would cost about €60k–165k more than the API route over 5 years.

---

# 7. Before publishing: gaps and items to recheck

- **Microsoft:**
  - The "annual commitment, paid monthly" price is not shown on the French pages. The ×1.05 in §1a is an ESTIMATE, matching the +5 % that Directions on Microsoft reports (§4b).
  - EUR prices are revised on **1 Jan 2027**.
- **Google Workspace Enterprise, BlueMind, Oodrive Work, Tixeo, ONLYOFFICE Workspace, OVH SecNumCloud offers, Outscale reservations:** sur devis.
- **Monthly-billing prices not captured:** kSuite, Proton Mail Essentials. **VAT basis not stated:** Wimi, Jamespot, Nextcloud, Clever Cloud.
- **Hetzner Storage Share:** third-party figure, unverified.
- **OVH:** from **1 Oct 2026**, b3 instances and GPUs no longer include IPv4 (and b3 no longer includes local storage). Add those lines once priced.
- **SecNumCloud expiry dates to recheck:** Outscale qualification valid until 30/11/2026, OVH Hosted Private Cloud VMware until 29/12/2026.
- **Mistral:** API prices captured in USD only (EUR toggle not scrapable). Scaleway's EUR price for Mistral Medium 3.5 (€1.50 / €7.50) can stand in.
- **GPU hardware:** prices are volatile. The RTX PRO 6000 is about 2× its 2025 launch price, and DDR5 costs about €2k per 64 GB. Server totals are bottom-up ESTIMATES ±20 %, so get 2–3 dated integrator quotes (Thomas-Krenn, Sysgen, Bechtle) before publishing.
- **Throughput:** no measured figures for Mistral Small 24B on L4, L40S or RTX PRO 6000, and none for L4 generally. Those cells are bandwidth ESTIMATES (§3b 4c).
- **Analyst coverage:** IDC, Forrester, Tropic, Sastrify and Vendr SaaS-inflation figures were not verified (search quota exhausted). Vertice and Gartner (via CIO.com) are the cited analyst sources.
- **Migration productivity dip:** no published figure; leave it as a user input with a default of 0.
