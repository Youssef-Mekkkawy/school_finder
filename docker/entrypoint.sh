#!/bin/bash
set -e

echo "🚀 Starting SchoolFinder Egypt..."

# ── Generate app key if not set ───────────────────────────────────────────────
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:your-key-here" ]; then
    echo "⚙️  Generating APP_KEY..."
    php artisan key:generate --force
fi

# ── Cache config/routes/views ─────────────────────────────────────────────────
echo "⚙️  Caching config, routes, views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# ── Storage link ──────────────────────────────────────────────────────────────
echo "⚙️  Creating storage link..."
php artisan storage:link || true

# ── Run migrations ────────────────────────────────────────────────────────────
echo "🗄️  Running migrations..."
php artisan migrate --force

# ── Seed database (only if empty) ─────────────────────────────────────────────
SCHOOL_COUNT=$(php artisan tinker --execute="echo App\Models\School::count();" 2>/dev/null | tail -1 || echo "0")
if [ "$SCHOOL_COUNT" = "0" ] || [ -z "$SCHOOL_COUNT" ]; then
    echo "🌱 Seeding database..."
    php artisan db:seed --force || true
else
    echo "✅ Database already seeded ($SCHOOL_COUNT schools) — skipping"
fi

# ── Start PHP-FPM in background ───────────────────────────────────────────────
echo "⚡ Starting PHP-FPM..."
php-fpm -D

# ── Start nginx in foreground ─────────────────────────────────────────────────
echo "🌐 Starting nginx on port 8080..."
exec nginx -g 'daemon off;'
