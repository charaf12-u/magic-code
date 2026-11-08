<?php

namespace App\Repositories;

class ProjectRepository
{
    /**
     * Get all projects.
     *
     * @return array<string, array<string, mixed>>
     */
    public static function all(): array
    {
        return [
            'lotti' => [
                'slug' => 'lotti',
                'title' => 'Lotti.ma',
                'badge' => 'LOT',
                'category' => 'Laravel · Immobilier',
                'short_description' => 'Plateforme web moderne pour la recherche, cartographie et publication de terrains et lotissements au Maroc.',
                'summary' => 'Une solution complète pour digitaliser la prospection foncière au Maroc avec cartographie interactive, filtres avancés et espace promoteurs.',
                'challenge' => 'Le marché foncier au Maroc manquait d\'outils dédiés permettant de visualiser précisément le zonage, la viabilisation et les caractéristiques des parcelles et lotissements.',
                'solution' => 'Conception d\'une plateforme web performante basée sur Laravel, intégrant Leaflet/Mapbox pour la cartographie géospatiale, PostgreSQL pour le requêtage spatial, et une interface réactive adaptée aux mobiles.',
                'tags' => ['Laravel', 'PostgreSQL', 'Blade', 'JavaScript', 'Leaflet Maps', 'Tailwind/CSS', 'SEO Technique'],
                'features' => [
                    'Cartographie interactive géolocalisée des lotissements et parcelles',
                    'Filtres multicritères (superficie, zonage, prix au m², statut juridique)',
                    'Espace promoteurs et agences avec gestion des annonces et leads',
                    'Optimisation SEO locale pour les villes marocaines (Casablanca, Marrakech, Tanger...)',
                    'Interface ultra-rapide avec temps de chargement sous 1,2s',
                ],
                'results' => [
                    '+15 000' => 'Visiteurs uniques mensuels dès le premier trimestre',
                    '< 1.2s' => 'Temps moyen de chargement des pages',
                    '100%' => 'Score SEO Google Lighthouse',
                ],
                'image' => 'images/projects/lotti-preview.jpg',
                'color_theme' => 'project-green',
            ],
            'mystiqo' => [
                'slug' => 'mystiqo',
                'title' => 'MYSTIQO',
                'badge' => 'DATA',
                'category' => 'Python · Data Quality & Profiling',
                'short_description' => 'Outil desktop d\'analyse exploratoire et de détection automatique des anomalies de données pour analystes.',
                'summary' => 'Une application conçue pour accélérer le nettoyage et l\'audit de qualité des données tabulaires avant ingestion dans les data warehouses.',
                'challenge' => 'Les data analysts perdaient des heures chaque semaine à écrire des scripts ad-hoc pour identifier valeurs manquantes, doublons, formats incohérents et valeurs aberrantes.',
                'solution' => 'Développement d\'une application Python intuitive avec moteur Pandas/NumPy, interface graphique ergonomique et génération de rapports de conformité prêts à l\'emploi.',
                'tags' => ['Python', 'Pandas', 'NumPy', 'Tkinter', 'Matplotlib', 'Data Profiling', 'Exports PDF/Excel'],
                'features' => [
                    'Détection automatique des types de colonnes et taux de complétude',
                    'Calcul instantané des statistiques descriptives et distributions graphiques',
                    'Détection statistique des valeurs aberrantes (Z-Score & IQR)',
                    'Règles personnalisables de validation métier',
                    'Exportation de rapports d\'audit complets en un clic',
                ],
                'results' => [
                    '75%' => 'De temps économisé sur la phase de data cleaning',
                    '10M+' => 'Lignes analysables en quelques secondes en mémoire',
                    '0' => 'Dépendance cloud requise (100% sécurisé en local)',
                ],
                'image' => 'images/projects/mystiqo-preview.jpg',
                'color_theme' => 'project-white',
            ],
            'cryptopulse' => [
                'slug' => 'cryptopulse',
                'title' => 'CryptoPulse',
                'badge' => '₿',
                'category' => 'Data Engineering · Pipeline Crypto',
                'short_description' => 'Pipeline Big Data pour l\'ingestion, la transformation et la modélisation en temps réel de flux de transactions.',
                'summary' => 'Architecture de données robuste pour agréger des flux d\'ordres de marché, calculer des signaux techniques et alimenter un tableau de bord analytique.',
                'challenge' => 'Ingérer des millions de données de tick par jour avec une faible latence sans pertes de paquets, tout en garantissant des transformations dbt idempotentes.',
                'solution' => 'Mise en place d\'une architecture moderne combinant Airflow pour l\'orchestration, MinIO pour le stockage objet de la couche Bronze, dbt pour la modélisation Silver/Gold, et Snowflake pour les analyses.',
                'tags' => ['Python', 'Apache Airflow', 'dbt', 'Snowflake', 'MinIO', 'Docker', 'FastAPI'],
                'features' => [
                    'Ingestion continue via WebSocket et APIs REST avec tolérance aux pannes',
                    'Orchestration automatisée par DAGs Airflow avec alertes instantanées',
                    'Modélisation en couches Bronze/Silver/Gold avec tests de données dbt',
                    'Calcul en quasi temps réel d\'indicateurs (VWAP, RSI, carnets d\'ordres agrégés)',
                    'API REST haute performance pour la restitution des métriques agrégées',
                ],
                'results' => [
                    '99.9%' => 'Taux de disponibilité du pipeline',
                    '50M+' => 'Événements traités quotidiennement sans ralentissement',
                    'Automatisé' => 'Tests de qualité de données à chaque transformation',
                ],
                'image' => 'images/projects/cryptopulse-preview.jpg',
                'color_theme' => 'project-dark',
            ],
            'ridemate' => [
                'slug' => 'ridemate',
                'title' => 'RideMate',
                'badge' => 'APP',
                'category' => 'Kotlin · Application Mobile',
                'short_description' => 'Application Android de covoiturage et mobilité urbaine avec géolocalisation en temps réel et notifications.',
                'summary' => 'Une application mobile intuitive pensée pour faciliter les trajets partagés quotidiens entre professionnels et étudiants.',
                'challenge' => 'Proposer une expérience fluide même avec une connectivité réseau instable, tout en garantissant la synchronisation instantanée des réservations.',
                'solution' => 'Développement natif Kotlin respectant les principes Clean Architecture et MVVM, couplé à Firebase Cloud Messaging, base de données Firestore synchronisée offline et CDN Cloudinary pour les photos.',
                'tags' => ['Kotlin', 'Android SDK', 'Firebase', 'Clean Architecture', 'Cloudinary', 'Google Maps API'],
                'features' => [
                    'Recherche d\'itinéraires avec calcul d\'étapes et géolocalisation',
                    'Messagerie instantanée intégrée entre conducteurs et passagers',
                    'Mode hors-ligne avec synchronisation automatique au rétablissement du réseau',
                    'Système de notation et profils vérifiés pour instaurer la confiance',
                    'Gestion optimisée de la batterie et des requêtes GPS en arrière-plan',
                ],
                'results' => [
                    '4.8/5' => 'Note moyenne de satisfaction utilisateur',
                    '< 200ms' => 'Latence de distribution des notifications de réservation',
                    'MVVM' => 'Architecture découplée facilitant la maintenance',
                ],
                'image' => 'images/projects/ridemate-preview.jpg',
                'color_theme' => 'project-dark',
            ],
        ];
    }

    /**
     * Find a project by slug.
     *
     * @param string $slug
     * @return array<string, mixed>|null
     */
    public static function find(string $slug): ?array
    {
        $projects = self::all();
        return $projects[$slug] ?? null;
    }

    /**
     * Find a project or abort 404.
     *
     * @param string $slug
     * @return array<string, mixed>
     */
    public static function findOrFail(string $slug): array
    {
        $project = self::find($slug);
        if (!$project) {
            abort(404, 'Projet introuvable');
        }
        return $project;
    }

    /**
     * Get featured projects for home page.
     *
     * @param int $limit
     * @return array<string, array<string, mixed>>
     */
    public static function featured(int $limit = 3): array
    {
        return array_slice(self::all(), 0, $limit, true);
    }
}

