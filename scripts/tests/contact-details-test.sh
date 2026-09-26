#!/usr/bin/env bash
# Published contact details are Souvara's own: contact@souvara.fr, no demo
# placeholders, and no address on another domain.

set -euo pipefail

project_root="$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd -P)"
seed="$project_root/deploy/seed.sql"
theme="$project_root/public/themes/souverainete-digitale"

failures=0

fail() {
    echo "FAIL: $1" >&2
    failures=$((failures + 1))
}

# Demo placeholders inherited from the theme.
if grep -rqE 'sovereignty\.example|\+44 20 1234 5678|London &middot; Paris' "$theme" --include='*.html'; then
    fail 'theme templates still show the demo e-mail, phone or cities.'
fi

# Every mailto: in the seed and the theme points at souvara.fr.
if grep -rhoE 'mailto:[^"?]+' "$seed" "$theme" --include='*.html' --include='*.sql' | grep -vqE '^mailto:[^@]+@souvara\.fr$'; then
    fail 'a mailto: link points outside souvara.fr.'
fi

grep -q 'mailto:contact@souvara.fr' "$seed" || fail 'the seed never publishes contact@souvara.fr.'

# Site settings used by Vvveb's own mail (admin/contact) must not be demo values.
grep -q "'\$.\"contact-email\"', 'contact@souvara.fr'" "$seed" || fail 'the seed does not set site contact-email to contact@souvara.fr.'
grep -q "'\$.\"admin-email\"', 'contact@souvara.fr'" "$seed" || fail 'the seed does not set site admin-email to contact@souvara.fr.'

# System mail is sent as Souvara.
grep -q "'from_address'   => 'contact@souvara.fr'" "$project_root/config/mail.php" || fail 'config/mail.php still sends as another address.'

if [ "$failures" -gt 0 ]; then
    echo "contact-details tests: FAIL ($failures issue(s))" >&2
    exit 1
fi
echo "contact-details tests: PASS"
