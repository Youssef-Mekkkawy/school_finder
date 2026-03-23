# ═══════════════════════════════════════════════════════════════
# SchoolFinder Egypt — Complete Claude Code Task List
# Laravel Backend + Frontend Integration
# ═══════════════════════════════════════════════════════════════
#
# ┌─────────────────────────────────────────────────────────────┐
# │              READ THIS BEFORE EVERY SINGLE TASK             │
# │                  THESE RULES NEVER CHANGE                   │
# └─────────────────────────────────────────────────────────────┘
#
# ─────────────────────────────────────────────────────────────
# 📁 STATIC PAGES — DESIGN REFERENCE ONLY
# ─────────────────────────────────────────────────────────────
#
#   The /pages/ folder in the project ROOT contains the
#   pre-built static HTML files. These are the DESIGN SOURCE
#   OF TRUTH and nothing else.
#
#   /pages/
#     ├── homepage.html
#     ├── login.html
#     ├── admin-dashboard.html
#     └── user-dashboard.html
#
#   ❌ DO NOT serve these HTML files directly to users.
#   ❌ DO NOT edit or modify these files.
#   ❌ DO NOT use raw HTML pages as Laravel routes.
#   ✅ Use them ONLY as a reference to copy HTML structure,
#      CSS classes, and JavaScript logic into Blade files.
#
# ─────────────────────────────────────────────────────────────
# 🔄 HOW TO CONVERT STATIC HTML → LARAVEL BLADE
# ─────────────────────────────────────────────────────────────
#
#   Every HTML page must be converted into proper Blade files
#   following this exact pattern:
#
#   STEP 1 — Layout (resources/views/layouts/app.blade.php)
#     Copy the <html>, <head>, <nav>, <footer> from the
#     static HTML into the layout file.
#     Add @yield('content') where the page body goes.
#     Add @yield('scripts') before </body> for page JS.
#     Add @stack('styles') inside <head> for page CSS.
#
#   STEP 2 — Sections (resources/views/home/sections/*.blade.php)
#     Split each visual section of the page into its own
#     Blade file exactly as agreed in the project structure.
#     Example for homepage:
#       sections/hero.blade.php        ← hero section HTML
#       sections/stats.blade.php       ← stats bar HTML
#       sections/types.blade.php       ← type cards HTML
#       sections/schools-grid.blade.php ← schools grid HTML
#       sections/how-it-works.blade.php ← steps section HTML
#       sections/cta.blade.php         ← call to action HTML
#       sections/school-modal.blade.php ← school detail modal
#       sections/compare-modal.blade.php ← compare modal
#
#   STEP 3 — Main page file (resources/views/home/index.blade.php)
#     Use @extends('layouts.app') at the top.
#     Use @section('content') and @endsection.
#     Inside @section('content'), use @include() to pull in
#     each section file. Keep the page file clean and short:
#
#       @extends('layouts.app')
#       @section('content')
#           @include('home.sections.hero')
#           @include('home.sections.stats')
#           @include('home.sections.types')
#           @include('home.sections.schools-grid')
#           @include('home.sections.how-it-works')
#           @include('home.sections.cta')
#           @include('home.sections.school-modal')
#           @include('home.sections.compare-modal')
#       @endsection
#       @section('scripts')
#           <script> ... page JS here ... </script>
#       @endsection
#
#   STEP 4 — Components (resources/views/components/*.blade.php)
#     Any HTML that repeats across pages (school card, badge,
#     pagination, modal wrapper, empty state) must be extracted
#     into a component using <x-component-name /> syntax.
#
#   STEP 5 — Partials (resources/views/partials/*.blade.php)
#     nav.blade.php   → copy <nav> HTML from static pages
#     footer.blade.php → copy <footer> HTML from static pages
#     toast.blade.php  → copy toast HTML from static pages
#     These are shared and @include'd into the layout.
#
# ─────────────────────────────────────────────────────────────
# 🎨 DESIGN IS FINAL — MUST STAY IDENTICAL
# ─────────────────────────────────────────────────────────────
#
#   ⚠️  The final rendered page in the browser must look
#       100% identical to the static HTML in /pages/.
#   ⚠️  Copy all CSS classes, inline styles, Tailwind classes,
#       colors, fonts, spacing exactly as they are.
#   ⚠️  Do NOT redesign, simplify, or change any visual element.
#   ⚠️  Do NOT remove any HTML element, class, or style.
#   ⚠️  The only things that change during conversion are:
#         - Dummy JS data arrays → replaced with Blade variables
#           passed from the controller (e.g. $schools)
#         - Hardcoded text → replaced with {{ $variable }}
#         - fetch() dummy calls → real API calls or Blade data
#         - HTML split into @include() sections
#
# ─────────────────────────────────────────────────────────────
# 📐 PROJECT STRUCTURE (from setup_structure.ps1)
# ─────────────────────────────────────────────────────────────
#
#   Controllers → app/Http/Controllers/Auth | Admin | Api
#   Models      → app/Models/
#   Requests    → app/Http/Requests/Auth | Admin | Api
#   Resources   → app/Http/Resources/
#   Traits      → app/Http/Traits/
#   Views       → resources/views/
#                   layouts/ | partials/ | components/
#                   home/sections/ | user/sections/
#                   admin/sections/ | admin/modals/
#   Routes      → routes/api.php | routes/api_auth.php | routes/api_admin.php
#   Static ref  → /pages/ (READ ONLY — never serve directly)
#
# ═══════════════════════════════════════════════════════════════


══════════════════════════════════════════════════════════════
PHASE 1 — PROJECT SETUP
══════════════════════════════════════════════════════════════

TASK 1.1 — Laravel Initial Setup
─────────────────────────────────
Set up the Laravel project for SchoolFinder Egypt.

Do the following:
1. Install Laravel Sanctum: composer require laravel/sanctum
2. Publish Sanctum config: php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
3. In config/cors.php set allowed_origins to ['*'] for development
4. In config/sanctum.php make sure stateful domains are configured
5. In app/Http/Kernel.php add Sanctum middleware to the api group
6. In .env set APP_NAME=SchoolFinder, set DB_DATABASE=schoolfinder, DB_USERNAME, DB_PASSWORD
7. Create the MySQL database named "schoolfinder"

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 1.2 — Create All Migrations
──────────────────────────────────
Create the database migrations for SchoolFinder in this exact order.

Run these commands then fill in the migration files:

php artisan make:migration create_school_types_table
php artisan make:migration create_locations_table
php artisan make:migration create_schools_table
php artisan make:migration create_curricula_table
php artisan make:migration create_school_curricula_table
php artisan make:migration create_fees_table
php artisan make:migration create_admins_table
php artisan make:migration create_reviews_table
php artisan make:migration create_favorites_table
php artisan make:migration create_appointments_table
php artisan make:migration create_notifications_table

Schema for each table:

school_types: id, name (varchar), timestamps
locations: id, area (varchar), city (varchar), compound (varchar nullable), address (text), latitude (decimal 10,8 nullable), longitude (decimal 11,8 nullable), timestamps
schools: id, name (varchar), type_id (FK school_types), location_id (FK locations), email, phone, website, facebook, instagram, age_min (tinyint), age_max (tinyint), class_size_avg (tinyint nullable), num_students (varchar nullable), foreign_ratio (decimal nullable), transport (varchar), is_active (boolean default true), timestamps
curricula: id, name (varchar), abbreviation (varchar), timestamps
school_curricula: school_id (FK), curriculum_id (FK) — pivot table, no timestamps
fees: id, school_id (FK), academic_year (varchar), tuition_min (decimal), tuition_max (decimal), transport_fees (decimal nullable), currency (varchar default EGP), is_public (boolean default true), timestamps
admins: id, name, email (unique), password, timestamps
reviews: id, school_id (FK), user_id (FK), rating (tinyint 1-5), comment (text), is_approved (boolean default false), timestamps
favorites: id, user_id (FK), school_id (FK), timestamps — unique(user_id, school_id)
appointments: id, school_id (FK), user_id (FK), preferred_date (date), message (text nullable), status (enum: pending,confirmed,cancelled — default pending), timestamps
notifications: id, user_id (FK), title (varchar), message (text), is_read (boolean default false), timestamps

Then run: php artisan migrate

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 1.3 — Create All Models
──────────────────────────────
Create and fill all Eloquent models with relationships and fillable fields.

Files to fill:
- app/Models/SchoolType.php — hasMany schools
- app/Models/Location.php — hasOne school
- app/Models/School.php — belongsTo type, belongsTo location, hasMany fees, hasMany reviews, hasMany favorites, hasMany appointments, belongsToMany curricula via school_curricula
- app/Models/Curriculum.php — belongsToMany schools via school_curricula
- app/Models/Fee.php — belongsTo school
- app/Models/Review.php — belongsTo school, belongsTo user
- app/Models/Favorite.php — belongsTo school, belongsTo user
- app/Models/Appointment.php — belongsTo school, belongsTo user
- app/Models/Notification.php — belongsTo user
- app/Models/Admin.php — use HasFactory, use Authenticatable — fillable: name, email, password — hidden: password
- app/Models/User.php — add: hasMany reviews, hasMany favorites, hasMany appointments, hasMany notifications

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 1.4 — Create Seeders
───────────────────────────
Fill the 5 dummy schools into the database via seeders.

Fill database/seeders/SchoolSeeder.php with the following 5 schools (exact same data used in the frontend):

School 1: The British International School Cairo
- Type: British, Location: Beverly Hills Sheikh Zayed
- Curricula: IGCSE, IB Diploma
- Fee: EGP 420,000 – 1,097,000, Currency: EGP
- Email: admissions@bisc.edu.eg, Phone: +202 3857 0000
- Website: https://www.bisc.edu.eg
- Age: 3–18, Class size: 18, Transport: Available on request

School 2: Cairo American College
- Type: American, Location: Maadi Cairo
- Curricula: American Diploma, IB Diploma
- Fee: 27,000 – 35,000, Currency: USD
- Email: info@cacegypt.org, Phone: +202 2755 0000
- Website: https://www.cacegypt.org
- Age: 4–18, Class size: 15, Transport: Not available

School 3: Rahn Schulen Kairo
- Type: German, Location: El-Shorouk City
- Curricula: IB Diploma, Abitur
- Fee: EGP 137,000 – 217,000, Currency: EGP
- Email: info@rsk-kairo.de, Phone: +202 2630 0000
- Website: https://rsk-kairo.de
- Age: 3–18, Transport: Available

School 4: El Alsson British & American School
- Type: British, Location: NewGiza 6th of October
- Curricula: IGCSE, IB Diploma, American Diploma
- Fee: EGP 218,000 – 352,000, Currency: EGP
- Email: info@alsson.com, Phone: +2 16127
- Website: https://www.alsson.com
- Age: 3–18, Class size: 22, Transport: Available

School 5: Lycée Français Simone de Beauvoir
- Type: French, Location: Maadi Cairo
- Curricula: French Baccalaureate
- Fee: EGP 94,000 – 207,000, Currency: EGP
- Email: info@lycee-beauvoir.edu.eg, Phone: +202 2537 0000
- Website: https://lycee-beauvoir.edu.eg
- Age: 3–18, Transport: Available

Also fill UserSeeder.php with 3 dummy users for testing:
- Omar Ahmed / omar@test.com / password123
- Sara Mohamed / sara@test.com / password123
- Admin User / admin@schoolfinder.com / admin123 (goes into admins table)

Register both seeders in DatabaseSeeder.php then run:
php artisan db:seed

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
PHASE 2 — AUTHENTICATION API
══════════════════════════════════════════════════════════════

TASK 2.1 — Auth Controller + Routes
─────────────────────────────────────
Build the full authentication API in app/Http/Controllers/Auth/AuthController.php

Methods to implement:
- register(Request $request) — validate name, email, password — create user — return token + user
- login(Request $request) — validate email, password — check credentials — return token + user
- logout(Request $request) — revoke current token — return success message
- me(Request $request) — return authenticated user data
- updateProfile(Request $request) — update name, phone, language — return updated user

Add these routes in routes/api.php:
POST   /api/auth/register
POST   /api/auth/login
POST   /api/auth/logout        (auth:sanctum)
GET    /api/auth/me            (auth:sanctum)
PUT    /api/auth/profile       (auth:sanctum)

Also create AdminMiddleware in app/Http/Middleware/AdminMiddleware.php that checks if the authenticated user is an admin (check admins table).

Register AdminMiddleware in app/Http/Kernel.php as 'admin'.

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 2.2 — Connect Login Page to API
──────────────────────────────────────
Connect resources/views/auth/login.blade.php (or the static login.html) to the Laravel auth API.

In the login.html file, find the submitLogin() JavaScript function.
Replace the dummy setTimeout simulation with a real fetch() call:

fetch('/api/auth/login', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
  body: JSON.stringify({ email, password, role: selectedRole })
})

On success: save token to localStorage as 'sf_token', save user object as 'sf_user', then redirect.
On failure: show the error message from the API response.

Also connect the register form submitRegister() the same way to POST /api/auth/register.
Also connect the forgot password form to POST /api/auth/forgot-password (create a basic route that returns success for now).

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
PHASE 3 — SCHOOLS API
══════════════════════════════════════════════════════════════

TASK 3.1 — Schools Controller (Public)
────────────────────────────────────────
Build app/Http/Controllers/SchoolController.php

Methods:
- index(Request $request)
  Accept query params: search, type, curriculum, location, fee_min, fee_max, sort (name/fee_low/fee_high/rating), per_page (default 12)
  Return paginated schools with: id, name, type, area, location, curricula[], feeMin, feeMax, currency, feeDisplay, rating (avg from reviews), reviewCount

- show($id)
  Return single school with all details: info, fees, curricula, reviews (approved only), contact info

- compare(Request $request)
  Accept: ids[] (array of 2-3 school IDs)
  Return those schools with all comparison fields

Add routes in routes/api.php:
GET /api/schools          (public)
GET /api/schools/{id}     (public)
GET /api/schools/compare  (public)

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 3.2 — Connect Homepage to Schools API
────────────────────────────────────────────
In homepage.html, replace the const DATA = [...] dummy array with a real API call.

On page load call: GET /api/schools
Replace the doFilter() function to send filters as query params to the API instead of filtering locally.
Replace the compare fetch to call: GET /api/schools/compare?ids[]=1&ids[]=2

Add the Authorization header to all protected requests:
headers: { 'Authorization': 'Bearer ' + localStorage.getItem('sf_token') }

Keep all existing filter chips, sort, pagination, compare bar, and favorites UI exactly as they are — only replace the data source.

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
PHASE 4 — REVIEWS API
══════════════════════════════════════════════════════════════

TASK 4.1 — Reviews Controller
───────────────────────────────
Build app/Http/Controllers/ReviewController.php

Methods:
- index($schoolId) — return approved reviews for a school, with user name, rating, comment, date
- store(Request $request, $schoolId) — auth required — validate rating (1-5), comment (min 10 chars) — create review with is_approved=false — return created review
- destroy($id) — auth required — only allow user to delete their own review

Add routes in routes/api.php:
GET    /api/schools/{id}/reviews    (public)
POST   /api/schools/{id}/reviews    (auth:sanctum)
DELETE /api/reviews/{id}            (auth:sanctum)

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 4.2 — Connect Reviews in Homepage Modal and User Dashboard
────────────────────────────────────────────────────────────────
In homepage.html, inside the openSch() function that renders the school detail modal:
- Replace dummy s.reviews array with fetch('/api/schools/{id}/reviews')
- Connect the submitReview() function to POST /api/schools/{id}/reviews with auth token

In user-dashboard.html:
- Replace MY_REVIEWS dummy array with fetch('/api/user/reviews') — create this route to return the current user's reviews
- Connect submitMyReview() modal to POST /api/schools/{schoolId}/reviews

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
PHASE 5 — FAVORITES API
══════════════════════════════════════════════════════════════

TASK 5.1 — Favorites Controller
─────────────────────────────────
Build app/Http/Controllers/FavoriteController.php

Methods:
- index(Request $request) — return all favorited schools for the authenticated user (with school details)
- store($schoolId) — add school to favorites — return success (ignore if already exists)
- destroy($schoolId) — remove school from favorites

Add routes in routes/api.php (all auth:sanctum):
GET    /api/favorites               (auth:sanctum)
POST   /api/favorites/{schoolId}    (auth:sanctum)
DELETE /api/favorites/{schoolId}    (auth:sanctum)

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 5.2 — Connect Favorites to Frontend
──────────────────────────────────────────
In homepage.html:
- On page load, if user is logged in: fetch('/api/favorites') and mark those school IDs as favorited (fill heart icon)
- Connect toggleFav() function: if adding call POST /api/favorites/{id}, if removing call DELETE /api/favorites/{id}
- If user is not logged in and clicks favorite, show toast "Please login to save favorites" — do not call API

In user-dashboard.html:
- Replace MY_FAVS dummy array with fetch('/api/favorites') on load
- Connect removeFav() to DELETE /api/favorites/{id}

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
PHASE 6 — APPOINTMENTS API
══════════════════════════════════════════════════════════════

TASK 6.1 — Appointments Controller
─────────────────────────────────────
Build app/Http/Controllers/AppointmentController.php

Methods:
- store(Request $request) — auth required — validate school_id, preferred_date, message — create appointment with status=pending — return created appointment
- userIndex(Request $request) — return all appointments for the authenticated user with school name and status
- cancel($id) — auth required — user can only cancel their own appointment — change status to cancelled

Add routes in routes/api.php:
POST   /api/appointments            (auth:sanctum)
GET    /api/appointments            (auth:sanctum)
PUT    /api/appointments/{id}/cancel (auth:sanctum)

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 6.2 — Connect Appointments to Frontend
─────────────────────────────────────────────
In homepage.html, inside the school detail modal, find the submitAppt() function.
Connect it to POST /api/appointments with the school_id, preferred_date from the date input, and message.
Require login — if not logged in show toast to login first.

In user-dashboard.html:
- Replace MY_APPTS dummy array with fetch('/api/appointments') on load
- Connect cancelAppt() to PUT /api/appointments/{id}/cancel

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
PHASE 7 — NOTIFICATIONS API
══════════════════════════════════════════════════════════════

TASK 7.1 — Notifications Controller (User)
────────────────────────────────────────────
Build app/Http/Controllers/NotificationController.php

Methods:
- index(Request $request) — return all notifications for authenticated user, newest first
- markRead($id) — mark a single notification as read
- markAllRead(Request $request) — mark all user notifications as read
- unreadCount(Request $request) — return count of unread notifications (for badge)

Add routes in routes/api.php:
GET  /api/notifications                  (auth:sanctum)
PUT  /api/notifications/{id}/read        (auth:sanctum)
PUT  /api/notifications/read-all         (auth:sanctum)
GET  /api/notifications/unread-count     (auth:sanctum)

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 7.2 — Connect Notifications to Frontend
──────────────────────────────────────────────
In user-dashboard.html:
- Replace MY_NOTIFS dummy array with fetch('/api/notifications') on load
- Connect markRead() to PUT /api/notifications/{id}/read
- Connect markAllRead() to PUT /api/notifications/read-all
- On load also fetch('/api/notifications/unread-count') and show badge count in sidebar

In nav bell button: on click fetch unread count and update the red dot visibility.

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
PHASE 8 — ADMIN API
══════════════════════════════════════════════════════════════

TASK 8.1 — Admin Auth
───────────────────────
Add admin login to AuthController.php.

Create a separate adminLogin() method:
- Check credentials against the admins table (not users table)
- Return token with ability: ['admin']
- On the frontend admin login.html role selector, when admin is selected call POST /api/auth/admin/login

Add route: POST /api/auth/admin/login

Update AdminMiddleware to check if token has 'admin' ability using $request->user()->tokenCan('admin').

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 8.2 — Admin Schools Controller
──────────────────────────────────────
Build app/Http/Controllers/Admin/SchoolController.php
All routes protected by auth:sanctum + admin middleware.

Methods:
- index() — return all schools with type, location, fees, rating, review count
- store(Request $request) — validate all fields — create school with location, type, curricula, fees in one transaction
- update(Request $request, $id) — update school and related data
- destroy($id) — soft delete or hard delete school

Add routes in routes/api.php under admin middleware group:
GET    /api/admin/schools
POST   /api/admin/schools
PUT    /api/admin/schools/{id}
DELETE /api/admin/schools/{id}

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 8.3 — Admin Reviews Controller
──────────────────────────────────────
Build app/Http/Controllers/Admin/ReviewController.php

Methods:
- index(Request $request) — return all reviews with filter: all/pending/approved — include user name and school name
- approve($id) — set is_approved=true
- destroy($id) — delete review

Add routes under admin middleware:
GET    /api/admin/reviews
PUT    /api/admin/reviews/{id}/approve
DELETE /api/admin/reviews/{id}

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 8.4 — Admin Appointments Controller
──────────────────────────────────────────
Build app/Http/Controllers/Admin/AppointmentController.php

Methods:
- index(Request $request) — return all appointments with filter: all/pending/confirmed/cancelled — include user name, email, school name
- updateStatus(Request $request, $id) — update status to confirmed or cancelled

Add routes under admin middleware:
GET /api/admin/appointments
PUT /api/admin/appointments/{id}/status

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 8.5 — Admin Users Controller
────────────────────────────────────
Build app/Http/Controllers/Admin/UserController.php

Methods:
- index() — return all users with: name, email, joined date, favorites count, reviews count
- destroy($id) — delete user and cascade delete their reviews, favorites, appointments, notifications

Add routes under admin middleware:
GET    /api/admin/users
DELETE /api/admin/users/{id}

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 8.6 — Admin Notifications Controller
───────────────────────────────────────────
Build app/Http/Controllers/Admin/NotificationController.php

Methods:
- send(Request $request) — validate title, message, target (all or specific user_id) — if target=all create notification record for every user — if target=user create for specific user — return success with count sent

Add route under admin middleware:
POST /api/admin/notifications/send

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 8.7 — Admin Dashboard Stats Controller
─────────────────────────────────────────────
Build app/Http/Controllers/Admin/DashboardController.php

Methods:
- stats() — return:
  {
    total_schools: count,
    total_users: count,
    total_reviews: count,
    pending_reviews: count,
    total_appointments: count,
    pending_appointments: count,
    schools_by_type: [{ type, count }],
    top_rated: [{ name, rating }],
    recent_activity: [{ user, action, school, time, status }]
  }

Add route under admin middleware:
GET /api/admin/stats

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 8.8 — Admin Homepage Controller
──────────────────────────────────────
Build app/Http/Controllers/Admin/HomepageController.php

Create a homepage_settings table migration with columns:
- key (varchar unique)
- value (longText)
- timestamps

Methods:
- getSettings() — return all homepage settings as key-value object
- saveHero(Request $request) — save badge, title, subtitle, btn_text, cta_text
- saveStats(Request $request) — save 4 stat values and labels as JSON
- saveTypes(Request $request) — save type cards array as JSON
- saveFeatured(Request $request) — save array of featured school IDs

Add routes under admin middleware:
GET  /api/admin/homepage/settings
POST /api/admin/homepage/hero
POST /api/admin/homepage/stats
POST /api/admin/homepage/types
POST /api/admin/homepage/featured

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 8.9 — Connect Admin Dashboard to All APIs
────────────────────────────────────────────────
In admin-dashboard.html connect all sections to real APIs:

- On load: fetch('/api/admin/stats') and fill the 4 stat cards and charts
- Schools page: fetch('/api/admin/schools') on load — connect Add/Edit/Delete to their respective APIs
- Reviews page: fetch('/api/admin/reviews') on load — connect approve and delete buttons
- Appointments page: fetch('/api/admin/appointments') on load — connect confirm/cancel buttons
- Users page: fetch('/api/admin/users') on load — connect delete button
- Notifications: connect Send button to POST /api/admin/notifications/send
- Homepage management: on load fetch('/api/admin/homepage/settings') and prefill all fields — connect each Save button to its API

Add admin token to all requests:
headers: { 'Authorization': 'Bearer ' + localStorage.getItem('sf_token'), 'Content-Type': 'application/json' }

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
PHASE 9 — USER DASHBOARD PROFILE
══════════════════════════════════════════════════════════════

TASK 9.1 — Connect User Dashboard Profile to API
──────────────────────────────────────────────────
In user-dashboard.html connect the profile section:

- On load: fetch('/api/auth/me') and fill name, email fields and sidebar user card
- saveProfile() → PUT /api/auth/profile with name, phone, language
- savePassword() → PUT /api/auth/password with current_password, new_password, new_password_confirmation
  Create this route and add changePassword() method to AuthController

Add route:
PUT /api/auth/password (auth:sanctum)

In AuthController changePassword():
- Validate current_password matches user's real password using Hash::check()
- Validate new_password min 8 chars and confirmed
- Update user password with Hash::make()

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
PHASE 10 — ANDROID APP PREP
══════════════════════════════════════════════════════════════

TASK 10.1 — API Response Standardization
──────────────────────────────────────────
Create a consistent JSON response format for all API endpoints so the Android app can consume them easily.

Create app/Http/Traits/ApiResponse.php with helper methods:
- success($data, $message='', $code=200)
- error($message, $code=400, $errors=[])
- paginated($paginator, $message='')

Apply this trait to all controllers.

Standard response format:
{
  "success": true,
  "message": "...",
  "data": { ... }
}

Error format:
{
  "success": false,
  "message": "...",
  "errors": { ... }
}

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 10.2 — API Documentation Comments
────────────────────────────────────────
Add PHPDoc comments to all controller methods describing:
- HTTP method and URL
- Required headers
- Request body / query params
- Response format
- Auth requirement

This will make it easy to know which endpoints to call from the Android Java app later.

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
PHASE 11 — FINAL & POLISH
══════════════════════════════════════════════════════════════

TASK 11.1 — Form Request Validation
──────────────────────────────────────
Fill the 3 Form Request classes with proper validation rules:

StoreSchoolRequest.php:
- name: required, string, max 255, unique schools
- type_id: required, exists school_types
- email: required, email
- phone: required, string
- fee_min, fee_max: required, numeric, min 0
- age_min, age_max: required, integer, between 1 and 25
- curricula: required, array, min 1

StoreReviewRequest.php:
- rating: required, integer, between 1 and 5
- comment: required, string, min 10, max 1000

StoreAppointmentRequest.php:
- school_id: required, exists schools
- preferred_date: required, date, after today
- message: nullable, string, max 500

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 11.2 — Error Handling & 404 Pages
────────────────────────────────────────
In app/Exceptions/Handler.php customize the render() method to always return JSON for API routes.

Handle these cases:
- ModelNotFoundException → 404 with message "Resource not found"
- AuthenticationException → 401 with message "Unauthenticated"
- ValidationException → 422 with all validation errors
- TokenMismatchException → 419 with message "Session expired"

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 11.3 — School Rating Auto-calculation
────────────────────────────════════════════
Add an accessor to the School model that automatically calculates the average rating from approved reviews.

In School.php add:
- getRatingAttribute() — return average of approved reviews rounded to 1 decimal
- getReviewCountAttribute() — return count of approved reviews

Append these to the model's $appends array so they appear in all API responses automatically.

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


TASK 11.4 — Auth Guard for Frontend Pages
───────────────────────────────────────────
In the frontend HTML files, add a JavaScript auth guard at the top of each protected page.

In user-dashboard.html — add at the top of the script:
  const token = localStorage.getItem('sf_token');
  if (!token) window.location.href = 'login.html';

In admin-dashboard.html — add at the top of the script:
  const token = localStorage.getItem('sf_token');
  const user = JSON.parse(localStorage.getItem('sf_user') || '{}');
  if (!token || user.role !== 'admin') window.location.href = 'login.html';

📌 REMINDERS FOR THIS TASK:
📁 Static pages are in /pages/ at the project root — use them as READ-ONLY design reference.
🔄 Convert HTML into Blade files in resources/views/ following the project structure.
    Use @extends, @section, @include, @yield, and <x-component> properly.
    Split each page section into its own file inside the sections/ subfolder.
⚠️  The rendered page must look 100% identical to the static HTML in /pages/.
⚠️  DO NOT serve raw HTML files directly. DO NOT edit files inside /pages/.
⚠️  DO NOT change any design, colors, fonts, CSS classes, or layout during conversion.
⚠️  Only replace dummy JS data arrays with Blade variables passed from controllers,
    and replace dummy fetch() calls with real API calls.


══════════════════════════════════════════════════════════════
QUICK REFERENCE — ALL API ENDPOINTS
══════════════════════════════════════════════════════════════

PUBLIC:
  POST   /api/auth/register
  POST   /api/auth/login
  POST   /api/auth/admin/login
  GET    /api/schools
  GET    /api/schools/{id}
  GET    /api/schools/compare
  GET    /api/schools/{id}/reviews

AUTH REQUIRED (sanctum):
  POST   /api/auth/logout
  GET    /api/auth/me
  PUT    /api/auth/profile
  PUT    /api/auth/password
  POST   /api/schools/{id}/reviews
  DELETE /api/reviews/{id}
  GET    /api/favorites
  POST   /api/favorites/{schoolId}
  DELETE /api/favorites/{schoolId}
  POST   /api/appointments
  GET    /api/appointments
  PUT    /api/appointments/{id}/cancel
  GET    /api/notifications
  PUT    /api/notifications/{id}/read
  PUT    /api/notifications/read-all
  GET    /api/notifications/unread-count

ADMIN ONLY (sanctum + admin):
  GET    /api/admin/stats
  GET    /api/admin/schools
  POST   /api/admin/schools
  PUT    /api/admin/schools/{id}
  DELETE /api/admin/schools/{id}
  GET    /api/admin/reviews
  PUT    /api/admin/reviews/{id}/approve
  DELETE /api/admin/reviews/{id}
  GET    /api/admin/appointments
  PUT    /api/admin/appointments/{id}/status
  GET    /api/admin/users
  DELETE /api/admin/users/{id}
  POST   /api/admin/notifications/send
  GET    /api/admin/homepage/settings
  POST   /api/admin/homepage/hero
  POST   /api/admin/homepage/stats
  POST   /api/admin/homepage/types
  POST   /api/admin/homepage/featured
