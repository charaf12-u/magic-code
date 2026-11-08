<?php

namespace App\Repositories;

class ServiceRepository
{
    /**
     * Get all services.
     *
     * @return array<string, array<string, mixed>>
     */
    public static function all(): array
    {
        return [
            'web' => [
                'slug' => 'web',
                'number' => '01',
                'icon' => '⌘',
                'title' => 'Web & Laravel',
                'short_description' => 'Sites vitrines, plateformes métiers, applications SaaS, e-commerce et APIs RESTful robustes.',
                'lead' => 'Nous construisons des plateformes web rapides, scalables et centrées sur vos objectifs commerciaux, avec Laravel et les standards modernes du web.',
                'deliverables' => [
                    'Applications web sur mesure avec Laravel 11/12',
                    'Panneaux d\'administration personnalisés & sécurisés',
                    'APIs RESTful documentées (OpenAPI / Swagger)',
                    'Intégration de passerelles de paiement (CMI, Stripe, PayPal)',
                    'Optimisation des performances et score Lighthouse 90+',
                ],
                'tech_stack' => ['Laravel', 'PHP 8+', 'PostgreSQL', 'MySQL', 'Tailwind CSS', 'Alpine.js / Vue', 'REST APIs', 'Docker'],
                'benefits' => [
                    'Architecture saine facilitant les évolutions futures',
                    'Sécurité maximale (protection CSRF, XSS, injections SQL)',
                    'Expérience utilisateur ultra-rapide sur tous les écrans',
                ],
            ],
            'mobile' => [
                'slug' => 'mobile',
                'number' => '02',
                'icon' => '◈',
                'title' => 'Applications Mobiles',
                'short_description' => 'Applications Android et multiplateformes pensées pour une ergonomie native, fluide et sans friction.',
                'lead' => 'Des applications mobiles qui privilégient la simplicité d\'utilisation, la réactivité hors-ligne et une intégration cloud fluide.',
                'deliverables' => [
                    'Applications Android natives en Kotlin',
                    'Applications multiplateformes iOS & Android en Flutter',
                    'Intégration des notifications push et géolocalisation',
                    'Synchronisation des données en mode hors-ligne',
                    'Publication et accompagnement sur Google Play Store & Apple App Store',
                ],
                'tech_stack' => ['Kotlin', 'Flutter', 'Android SDK', 'Firebase', 'Cloudinary', 'REST APIs', 'Clean Architecture'],
                'benefits' => [
                    'Animations fluides à 60/120 images par seconde',
                    'Consommation de batterie et données réseau minimales',
                    'Adhérence rigoureuse aux guidelines Material Design et iOS Human Interface',
                ],
            ],
            'data' => [
                'slug' => 'data',
                'number' => '03',
                'icon' => '◫',
                'title' => 'Data Analytics & BI',
                'short_description' => 'Pipelines ETL, entrepôts de données, tableaux de bord interactifs et modélisation pour transformer vos données en décisions.',
                'lead' => 'Nous convertissons vos silos de données brutes en indicateurs décisionnels fiables, automatisés et compréhensibles par votre équipe.',
                'deliverables' => [
                    'Pipelines d\'ingestion et d\'automatisation ETL / ELT',
                    'Nettoyage, audit et contrôle de qualité de la donnée',
                    'Modélisation dimensionnelle (Star Schema, dbt, Data Vault)',
                    'Dashboards interactifs Power BI, Tableau ou web sur mesure',
                    'Alertes automatiques sur anomalies et indicateurs clés',
                ],
                'tech_stack' => ['Python', 'Pandas', 'SQL', 'Apache Airflow', 'dbt', 'Snowflake', 'Power BI', 'PostgreSQL'],
                'benefits' => [
                    'Vision 360° en temps réel de votre activité opérationnelle',
                    'Fin des tâches manuelles de consolidation sous Excel',
                    'Données fiables et auditables à chaque étape du flux',
                ],
            ],
            'ai' => [
                'slug' => 'ai',
                'number' => '04',
                'icon' => '✦',
                'title' => 'IA & Automatisation',
                'short_description' => 'Workflows intelligents, agents autonomes, architectures RAG et assistants sur mesure pour automatiser vos tâches chronophages.',
                'lead' => 'Déployez l\'intelligence artificielle concrète au service de votre productivité : traitement de documents, agents support, et automatisation de processus.',
                'deliverables' => [
                    'Assistants IA connectés à votre base de connaissances interne (RAG)',
                    'Extraction et structuration automatique de données textuelles ou PDF',
                    'Workflows d\'automatisation inter-applications (n8n, APIs custom)',
                    'Intégration d\'APIs de modèles de pointe (OpenAI, Claude, Gemini)',
                    'Agents conversationnels omnicanaux (WhatsApp, Web, Slack)',
                ],
                'tech_stack' => ['Python', 'LangChain / LlamaIndex', 'RAG / Vector DBs', 'OpenAI / Claude / Gemini', 'n8n', 'FastAPI'],
                'benefits' => [
                    'Gain de temps massif sur les processus répétitifs',
                    'Disponibilité 24/7 pour les requêtes utilisateurs fréquentes',
                    'Respect de la confidentialité et sécurisation de vos données sensibles',
                ],
            ],
            'seo' => [
                'slug' => 'seo',
                'number' => '05',
                'icon' => '◎',
                'title' => 'SEO & Performance Web',
                'short_description' => 'Optimisation technique, audit de vitesse Core Web Vitals, sémantique Schema.org et stratégie de positionnement.',
                'lead' => 'Une présence digitale pensée pour être comprise et favorisée par les moteurs de recherche, tout en offrant une navigation instantanée.',
                'deliverables' => [
                    'Audit technique complet et correction des blocages d\'indexation',
                    'Optimisation drastique des Core Web Vitals (LCP, FID, CLS)',
                    'Implémentation du balisage Schema.org JSON-LD',
                    'Structure de maillage interne et sitemaps XML dynamiques',
                    'Configuration Google Search Console et Google Analytics 4',
                ],
                'tech_stack' => ['Technical SEO', 'Schema.org JSON-LD', 'Core Web Vitals', 'PageSpeed Optimization', 'Lighthouse', 'GA4'],
                'benefits' => [
                    'Meilleur classement organique sur vos mots-clés stratégiques',
                    'Taux de rebond réduit grâce à une vitesse d\'affichage éclair',
                    'Trafic qualifié durable sans dépendre uniquement de la publicité',
                ],
            ],
            'design' => [
                'slug' => 'design',
                'number' => '06',
                'icon' => '❖',
                'title' => 'UI / UX & Design Digital',
                'short_description' => 'Conception d\'interfaces modernes, wireframes, prototypes interactifs et design systems cohérents pour vos produits digitaux.',
                'lead' => 'Nous créons des interfaces épurées, accessibles et percutantes qui captivent vos utilisateurs et renforcent votre crédibilité de marque.',
                'deliverables' => [
                    'Recherche utilisateur et définition des personas',
                    'Wireframes basse et haute fidélité',
                    'Prototypes cliquables et tests d\'utilisabilité',
                    'Design System complet avec tokens réutilisables',
                    'Préparation des assets et spécifications pour les développeurs',
                ],
                'tech_stack' => ['Figma', 'Design Systems', 'Responsive UI', 'Micro-interactions', 'Accessibilité WCAG', 'Prototypage'],
                'benefits' => [
                    'Clarté immédiate de proposition de valeur pour vos visiteurs',
                    'Taux de conversion amélioré grâce à des parcours sans friction',
                    'Cohérence graphique totale sur l\'ensemble de vos supports digitaux',
                ],
            ],
        ];
    }

    /**
     * Find a service by slug.
     *
     * @param string $slug
     * @return array<string, mixed>|null
     */
    public static function find(string $slug): ?array
    {
        $services = self::all();
        return $services[$slug] ?? null;
    }

    /**
     * Find a service or abort 404.
     *
     * @param string $slug
     * @return array<string, mixed>
     */
    public static function findOrFail(string $slug): array
    {
        $service = self::find($slug);
        if (!$service) {
            abort(404, 'Service introuvable');
        }
        return $service;
    }

    /**
     * Get featured services for home page.
     *
     * @param int $limit
     * @return array<string, array<string, mixed>>
     */
    public static function featured(int $limit = 4): array
    {
        return array_slice(self::all(), 0, $limit, true);
    }
}

