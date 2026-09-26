/*
 * Calculateur Souvara : suite bureautique (rester ou changer) et IA (API ou GPU).
 *
 * Prix relevés sur les pages officielles le 26 septembre 2026, en euros HT.
 * Prix en dollars convertis au taux BCE du 25/09/2026 (1 € = 1,1403 $).
 * Sources et hypothèses : docs/research/2026-09-26/calculator-data.md.
 * Serveurs, débits et temps d'exploitation sont des estimations (± 20 %).
 */
(function () {
	'use strict';

	var root = document.getElementById('sd-calc');
	if (!root) return;

	var eur = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR', maximumFractionDigits: 0 });
	var num = new Intl.NumberFormat('fr-FR', { maximumFractionDigits: 0 });
	var dec = new Intl.NumberFormat('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

	function $(id) { return document.getElementById(id); }
	function el(tag, cls, text) {
		var e = document.createElement(tag);
		if (cls) e.className = cls;
		if (text != null) e.textContent = text;
		return e;
	}
	function option(select, label, value, selected) {
		var o = el('option', null, label);
		o.value = value;
		if (selected) o.selected = true;
		select.appendChild(o);
	}

	/* ---------- onglets ---------- */
	var tabs = root.querySelectorAll('[data-calc-tab]');
	var panels = root.querySelectorAll('[data-calc-panel]');
	function showTab(name) {
		tabs.forEach(function (t) {
			var on = t.getAttribute('data-calc-tab') === name;
			t.setAttribute('aria-selected', on ? 'true' : 'false');
			t.tabIndex = on ? 0 : -1;
		});
		panels.forEach(function (p) { p.hidden = p.getAttribute('data-calc-panel') !== name; });
	}
	tabs.forEach(function (t) {
		t.addEventListener('click', function () { showTab(t.getAttribute('data-calc-tab')); });
	});
	showTab(location.hash === '#ia' ? 'ia' : 'suite');

	/* ---------- suite bureautique ---------- */
	var US = [
		{ name: 'Microsoft 365 Business Basic', annual: 6.07, monthly: 7.28 },
		{ name: 'Microsoft 365 Business Standard', annual: 12.13, monthly: 14.56, def: true },
		{ name: 'Microsoft 365 Business Premium', annual: 19.06, monthly: 22.87, broad: true },
		{ name: 'Office 365 E1', annual: 8.66 },
		{ name: 'Office 365 E3', annual: 26.27, broad: true },
		{ name: 'Google Workspace Business Starter', annual: 6.80, monthly: 8.10 },
		{ name: 'Google Workspace Business Standard', annual: 13.60, monthly: 16.20 },
		{ name: 'Google Workspace Business Plus', annual: 21.10, monthly: 25.30 }
	];
	var EU = [
		{ name: 'Infomaniak kSuite Business', price: 6.58, promo: 0.5, def: true },
		{ name: 'Infomaniak kSuite Enterprise', price: 12.41, promo: 0.5 },
		{ name: 'Proton Workspace Standard', price: 12.99, promo: 0 },
		{ name: 'Proton Workspace Premium', price: 19.99, promo: 0 },
		{ name: 'Wimi Suite', price: 15.00, promo: 0, vatUnknown: true }
	];
	var SCEN = {
		leger: { mig: 50, train: 60, dual: 1, hint: '50 € de migration et 60 € de formation par utilisateur, 1 mois de double abonnement' },
		standard: { mig: 150, train: 150, dual: 2, hint: '150 € de migration et 150 € de formation par utilisateur, 2 mois de double abonnement' },
		lourd: { mig: 300, train: 445, dual: 3, hint: '300 € de migration et 445 € de formation par utilisateur, 3 mois de double abonnement' }
	};
	var G_EU = 0.03;

	US.forEach(function (s, i) { option($('calc-s-current'), s.name, i, s.def); });
	EU.forEach(function (s, i) { option($('calc-s-target'), s.name + ' (' + dec.format(s.price) + ' €)', i, s.def); });

	function suite() {
		var n = Math.max(1, Math.min(100000, parseInt($('calc-s-users').value, 10) || 1));
		var us = US[$('calc-s-current').value];
		var eu = EU[$('calc-s-target').value];
		var monthly = $('calc-s-billing').value === 'mensuel' && us.monthly;
		var pUs = monthly ? us.monthly : us.annual;
		var sc = SCEN[$('calc-s-scenario').value];
		var g = parseFloat($('calc-s-growth').value);
		var H = parseInt($('calc-s-horizon').value, 10);
		var promo = $('calc-s-promo').checked ? eu.promo : 0;
		$('calc-s-scenario-hint').textContent = sc.hint;

		var oneOff = n * (sc.mig + sc.train) + n * pUs * sc.dual;
		var stay = 0;
		var sw = oneOff;
		for (var y = 1; y <= H; y++) {
			stay += n * pUs * 12 * Math.pow(1 + g, y - 1);
			sw += n * eu.price * 12 * Math.pow(1 + G_EU, y - 1) * (y === 1 ? 1 - promo : 1);
		}
		var cum = 0;
		var payback = null;
		for (var m = 1; m <= 120; m++) {
			var yy = Math.ceil(m / 12);
			cum += n * (pUs * Math.pow(1 + g, yy - 1) - eu.price * Math.pow(1 + G_EU, yy - 1) * (yy === 1 ? 1 - promo : 1));
			if (cum >= oneOff) { payback = m; break; }
		}
		var saving = stay - sw;

		var out = $('calc-s-results');
		out.textContent = '';
		function res(title, big, sub, cls) {
			var d = el('div', 'sd-calc-result' + (cls ? ' ' + cls : ''));
			d.appendChild(el('p', 'sd-calc-result-label', title));
			d.appendChild(el('p', 'sd-calc-result-value', big));
			if (sub) d.appendChild(el('p', 'sd-calc-result-sub', sub));
			out.appendChild(d);
		}
		res('Rester sur ' + us.name, eur.format(stay), 'sur ' + H + ' ans, hausse de ' + Math.round(g * 100) + ' % par an');
		res('Passer à ' + eu.name, eur.format(sw), 'dont ' + eur.format(oneOff) + ' de changement');
		res(saving >= 0 ? 'Économie' : 'Surcoût', eur.format(Math.abs(saving)), 'sur ' + H + ' ans', saving >= 0 ? 'is-good' : 'is-bad');
		res('Retour sur investissement', payback ? (payback < 24 ? payback + ' mois' : dec.format(payback / 12).replace(',00', '') + ' ans') : 'Au-delà de 10 ans', payback ? 'le changement est remboursé au mois ' + payback : 'le changement ne se rembourse pas');

		var bars = $('calc-s-bars');
		bars.textContent = '';
		var max = Math.max(stay, sw);
		[['Rester', stay, 'is-us'], ['Changer', sw, 'is-eu']].forEach(function (row) {
			var d = el('div', 'sd-calc-bar');
			d.appendChild(el('span', 'sd-calc-bar-label', row[0]));
			var track = el('span', 'sd-calc-bar-track');
			var fill = el('span', 'sd-calc-bar-fill ' + row[2]);
			fill.style.width = (row[1] / max * 100).toFixed(1) + '%';
			track.appendChild(fill);
			d.appendChild(track);
			d.appendChild(el('span', 'sd-calc-bar-value', eur.format(row[1])));
			bars.appendChild(d);
		});

		var notes = ['Prix relevés sur les pages officielles françaises le 26 septembre 2026, hors TVA. Hausse annuelle de la solution européenne supposée à 3 %.'];
		if (us.broad) notes.push(us.name + ' inclut aussi des fonctions de sécurité et de gestion des postes qu’une suite collaborative ne remplace pas : comparez à périmètre égal.');
		if ($('calc-s-billing').value === 'mensuel' && !us.monthly) notes.push('Cette offre n’a pas de prix public sans engagement : le prix annuel est utilisé.');
		if (eu.vatUnknown) notes.push('Wimi ne précise pas si son prix est hors taxes.');
		$('calc-s-note').textContent = notes.join(' ');
	}
	['calc-s-users', 'calc-s-current', 'calc-s-billing', 'calc-s-target', 'calc-s-scenario', 'calc-s-growth', 'calc-s-horizon', 'calc-s-promo'].forEach(function (id) {
		$(id).addEventListener('input', suite);
		$(id).addEventListener('change', suite);
	});
	suite();

	/* ---------- IA : API ou GPU ---------- */
	var API = [
		{ name: 'gpt-oss-120b, OVHcloud AI Endpoints (UE)', pin: 0.08, pout: 0.40 },
		{ name: 'Mistral Small 3.2, Scaleway (UE)', pin: 0.15, pout: 0.35 },
		{ name: 'Llama 3.3 70B, OVHcloud (UE)', pin: 0.67, pout: 0.67 },
		{ name: 'Mistral Medium 3.5, Scaleway (UE)', pin: 1.50, pout: 7.50 },
		{ name: 'GPT-6 Sol, OpenAI (US)', pin: 1.75, pout: 8.77, def: true },
		{ name: 'Claude Sonnet 5, Anthropic (US)', pin: 1.75, pout: 8.77 },
		{ name: 'Gemini 3.1 Pro, Google (US)', pin: 1.75, pout: 10.52 },
		{ name: 'Claude Opus 5.5, Anthropic (US)', pin: 3.51, pout: 17.54 }
	];
	/* tps : débit de sortie agrégé (tokens/s) du modèle que l'unité ferait tourner. */
	var SELF = [
		{ name: 'Louer 1 GPU L40S, Scaleway, heures ouvrées (220 h/mois)', kind: 'rent', month: 1.4699 * 220, hours: 220, tps: 400, model: 'Mistral Small 24B' },
		{ name: 'Louer 1 GPU L40S, OVHcloud, 24 h/24', kind: 'rent', month: 1008, hours: 730, tps: 400, model: 'Mistral Small 24B' },
		{ name: 'Louer 1 GPU H100, OVHcloud, 24 h/24', kind: 'rent', month: 1940, hours: 730, tps: 2558, model: 'gpt-oss-120b' },
		{ name: 'Acheter un serveur 1 × L40S (≈ 20 000 €)', kind: 'own', capex: 20000, kw: 0.60, hours: 730, tps: 400, model: 'Mistral Small 24B' },
		{ name: 'Acheter un serveur 1 × RTX PRO 6000 (≈ 28 000 €)', kind: 'own', capex: 28000, kw: 0.85, hours: 730, tps: 1525, model: 'gpt-oss-120b' },
		{ name: 'Acheter un serveur 2 × H100 NVL (≈ 80 000 €)', kind: 'own', capex: 80000, kw: 1.35, hours: 730, tps: 2000, model: 'Llama 3.3 70B' }
	];
	API.forEach(function (a, i) { option($('calc-a-api'), a.name, i, a.def); });

	function ai() {
		var Q = Math.max(1, parseFloat($('calc-a-tokens').value) || 1) * 1e6;
		var alpha = parseFloat($('calc-a-share').value);
		var H = parseInt($('calc-a-horizon').value, 10);
		var ops = Math.max(0, parseFloat($('calc-a-ops').value) || 0);
		var kwh = Math.max(0, parseFloat($('calc-a-kwh').value) || 0);
		var sel = API[$('calc-a-api').value];
		function blended(a) { return alpha * a.pin + (1 - alpha) * a.pout; }
		var pSel = blended(sel);
		var rows = [];
		API.forEach(function (a) {
			var m = Q / 1e6 * blended(a);
			rows.push({ name: a.name, units: 'API', month: m, total: m * 12 * H, be: '', sel: a === sel });
		});
		SELF.forEach(function (s) {
			var capOut = s.tps * 3600 * s.hours * 0.6;
			var n = Math.max(1, Math.ceil((1 - alpha) * Q / capOut));
			var perUnit;
			var total;
			if (s.kind === 'rent') {
				perUnit = s.month;
				total = (n * perUnit + ops) * 12 * H;
			} else {
				var energy = (s.kw * 0.5 + 0.15 * 0.5) * 730 * 1.8 * kwh;
				perUnit = s.capex / 36 + energy + 0.10 * s.capex / 12;
				total = n * s.capex * Math.ceil(H / 5) + H * 12 * (n * (perUnit - s.capex / 36) + ops);
			}
			var beTokens = (perUnit + ops) / pSel * 1e6;
			var capTotal = capOut / (1 - alpha);
			rows.push({
				name: s.name,
				units: n + (n > 1 ? ' unités' : ' unité') + ' · ' + s.model,
				month: n * perUnit + ops,
				total: total,
				be: beTokens > capTotal ? 'hors de portée d’une seule unité' : 'à partir de ' + num.format(beTokens / 1e6) + ' M de tokens/mois'
			});
		});
		var cheapest = rows.reduce(function (a, b) { return b.total < a.total ? b : a; });
		var tbody = $('calc-a-rows');
		tbody.textContent = '';
		rows.forEach(function (r) {
			var tr = el('tr');
			var name = el('td', null, r.name);
			if (r === cheapest) { name.appendChild(document.createTextNode(' ')); name.appendChild(el('span', 'sd-calc-flag', 'le moins cher')); }
			if (r.sel) { name.appendChild(document.createTextNode(' ')); name.appendChild(el('span', 'sd-calc-flag is-ref', 'référence')); }
			tr.appendChild(name);
			tr.appendChild(el('td', null, r.units));
			tr.appendChild(el('td', 'is-num', eur.format(r.month)));
			tr.appendChild(el('td', 'is-num', eur.format(r.total)));
			tr.appendChild(el('td', null, r.be));
			tbody.appendChild(tr);
		});
		$('calc-a-note').textContent = 'Prix moyen de l’API de référence : ' + dec.format(pSel) + ' € par million de tokens. Serveurs achetés : amortissement sur 3 ans, durée de vie 5 ans, charge 50 %, PUE 1,8, maintenance 10 % par an. Prix des serveurs et débits estimés (± 20 %). À comparer à modèle égal : les lignes auto-hébergées font tourner des modèles ouverts, dont la version API européenne est la vraie référence.';
	}
	['calc-a-tokens', 'calc-a-share', 'calc-a-api', 'calc-a-horizon', 'calc-a-ops', 'calc-a-kwh'].forEach(function (id) {
		$(id).addEventListener('input', ai);
		$(id).addEventListener('change', ai);
	});
	ai();
})();
