# Magic Code — Laravel Website

Site vitrine premium pour **Magic Code — We Code The Magic**, studio freelance spécialisé en :

- Web & Laravel
- Applications mobiles
- Data Analytics & BI
- AI & Automation
- SEO & Performance
- UI/UX

## Stack

- Laravel 13
- PHP 8.3+
- Blade
- CSS/JS vanilla (aucun framework frontend obligatoire)
- SQLite par défaut pour le formulaire/logs

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Puis ouvrir `http://127.0.0.1:8000`.

## SEO déjà intégré

- title + meta description
- canonical URL
- Open Graph / Twitter Card
- robots.txt
- sitemap.xml dynamique
- JSON-LD ProfessionalService
- URLs propres et pages services/projets
- responsive mobile/tablette/desktop
- images avec attributs alt

## Personnalisation avant mise en ligne

1. Remplacer `hello@magic-code.ma` par l'adresse réelle.
2. Remplacer le lien WhatsApp dans `resources/views/partials/footer.blade.php` et `pages/contact.blade.php`.
3. Remplacer `https://magic-code.ma` dans `public/robots.txt` par le vrai domaine.
4. Mettre à jour le canonical/OG après changement de domaine.
5. Configurer SMTP dans `.env` si les demandes de contact doivent être envoyées par email.
6. Ajouter les vrais projets et captures dans `public/images/`.

## Design

Palette inspirée du logo fourni : noir profond, blanc cassé et vert électrique. Les assets fournis sont placés dans `public/images/`.
