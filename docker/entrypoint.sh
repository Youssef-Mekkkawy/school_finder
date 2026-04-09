#!/bin/bash
set -e

echo "🚀 Starting SchoolFinder Egypt..."

# ── Create .env from Railway environment variables ────────────────────────────
echo "⚙️  Creating .env file..."
cat > /var/www/.env << EOF
APP_NAME="${APP_NAME:-SchoolFinder Egypt}"
APP_ENV="${APP_ENV:-production}"
APP_KEY="${APP_KEY}"
APP_DEBUG="${APP_DEBUG:-false}"
APP_URL="${APP_URL:-http://localhost}"
ASSET_URL="${ASSET_URL:-}"

LOG_CHANNEL="${LOG_CHANNEL:-stderr}"
LOG_LEVEL=error

DB_CONNECTION="${DB_CONNECTION:-mysql}"
DB_HOST="${DB_HOST}"
DB_PORT="${DB_PORT:-3306}"
DB_DATABASE="${DB_DATABASE}"
DB_USERNAME="${DB_USERNAME}"
DB_PASSWORD="${DB_PASSWORD}"

CACHE_DRIVER="${CACHE_DRIVER:-file}"
SESSION_DRIVER="${SESSION_DRIVER:-file}"
SESSION_LIFETIME=120
QUEUE_CONNECTION=sync

GOOGLE_MAPS_KEY="${GOOGLE_MAPS_KEY:-}"
EOF
echo "✅ .env file created"

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
