# Streamsowers & Köhn — website redesign

A design proposal for [Streamsowers & Köhn](https://sskohn.com), a full-service Nigerian law firm with offices in Lagos, Abuja and Port Harcourt.

All copy, representative matters, partners and practice areas are taken from the firm's current website.

## Stack

- **Laravel 13** with **Livewire 4** (class-based components for the contact form and the mailing-list signup)
- **Tailwind CSS 4** and Vite
- **GSAP** (ScrollTrigger, SplitText) with **Lenis** smooth scrolling
- **Phosphor** icons
- Fonts: Boska (display) and Switzer (text) from Fontshare

## Running locally

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
php artisan serve
```

Then open http://localhost:8000. Use `npm run dev` instead of `npm run build` while editing styles or scripts.

## Where things live

| What | Where |
| --- | --- |
| Site content (practices, partners, matters, values, offices) | `config/ssk.php` |
| Page sections | `resources/views/sections/` |
| Layout, nav, footer | `resources/views/layouts/app.blade.php`, `resources/views/partials/` |
| Contact form and newsletter | `app/Livewire/`, `resources/views/livewire/` |
| Styles | `resources/css/app.css` |
| Motion | `resources/js/app.js` |
| Images | `public/images/` |

Contact-form submissions are stored in the `inquiries` table and newsletter sign-ups in `subscribers`. Both forms are rate-limited, and the contact form has a honeypot field.

## Notes

- Partner portraits load from sskohn.com.
- The other imagery (statue, courtroom, aviation, energy and similar) was AI-generated for this proposal.
- Animations are skipped for visitors who have reduced motion enabled.
