#!/usr/bin/env bash
# The site is French-only: every /en URL redirects permanently to its French
# counterpart or to the home page, before the page cache can serve an old
# English render. Both .htaccess copies (repo root and public/) carry the rules.

set -euo pipefail

project_root="$(cd "$(dirname "${BASH_SOURCE[0]}")/../.." && pwd -P)"
failures=0

fail() {
    echo "FAIL: $1" >&2
    failures=$((failures + 1))
}

# path=expected target (bash 3.2 on macOS has no associative arrays)
expected="en/=/
en/about=/a-propos
en/contact=/contact
en/method=/methode-evaluation
en/privacy-policy=/confidentialite
en/sovereignty-assessment=/diagnostic-souverainete
en/secnumcloud-certification=/secnumcloud-qualification-anssi
en/careers=/"

for htaccess in "$project_root/.htaccess" "$project_root/public/.htaccess"; do
    name="${htaccess#"$project_root"/}"
    rules="$(grep -E '^RewriteRule \^en' "$htaccess" || true)"
    if [ -z "$rules" ]; then
        fail "$name has no /en redirects."
        continue
    fi

    # Resolve each sample path against the rules in file order, like mod_rewrite.
    while IFS='=' read -r path want; do
        target=""
        while read -r _ pattern to flags; do
            if [[ "$path" =~ $pattern ]]; then
                target="$to"
                [[ "$flags" == *R=301* ]] || fail "$name: rule for $path is not a 301."
                break
            fi
        done <<< "$rules"
        [ "$target" = "$want" ] || fail "$name: /$path redirects to '${target:-nothing}', expected $want."
    done <<< "$expected"

    # The redirects must run before the page cache rewrite.
    en_line=$(grep -n '^RewriteRule \^en/ ' "$htaccess" | head -1 | cut -d: -f1)
    cache_line=$(grep -n '^#page cache' "$htaccess" | head -1 | cut -d: -f1)
    if [ -z "$en_line" ] || [ -z "$cache_line" ] || [ "$en_line" -gt "$cache_line" ]; then
        fail "$name: the /en catch-all must come before the page cache rules."
    fi
done

if [ "$failures" -gt 0 ]; then
    echo "english-retired tests: FAIL ($failures issue(s))" >&2
    exit 1
fi
echo "english-retired tests: PASS"
