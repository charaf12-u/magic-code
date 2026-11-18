<?php

namespace App\Repositories;

class ProjectRepository
{
    /**
     * Get all projects localized for current language.
     *
     * @return array<string, array<string, mixed>>
     */
    public static function all(): array
    {
        $locale = app()->getLocale();

        return match ($locale) {
            'en' => static::dataEn(),
            'ar' => static::dataAr(),
            'tamazight', 'zgh' => static::dataTamazight(),
            default => static::dataFr(),
        };
    }

    /**
     * Find a project by its slug.
     *
     * @param string $slug
     * @return array<string, mixed>|null
     */
    public static function find(string $slug): ?array
    {
        $projects = static::all();
        return $projects[$slug] ?? null;
    }

    /**
     * Find a project by its slug or abort 404.
     *
     * @param string $slug
     * @return array<string, mixed>
     */
    public static function findOrFail(string $slug): array
    {
        $project = static::find($slug);
        if (!$project) {
            abort(404);
        }
        return $project;
    }

    /**
     * Get featured projects for the home page.
     *
     * @param int $limit
     * @return array<string, array<string, mixed>>
     */
    public static function featured(int $limit = 3): array
    {
        return array_slice(static::all(), 0, $limit, true);
    }

    /**
     * French projects data
     */
    protected static function dataFr(): array
    {
        return [
            'lotti' => [
                'slug' => 'lotti',
                'title' => 'Lotti.ma',
                'badge' => 'LOT',
                'category' => 'Laravel · Immobilier & Cartographie',
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
                'category' => 'Kotlin · Application Mobile Mobilité',
                'short_description' => 'Application Android de covoiturage et mobilité urbaine avec géolocalisation en temps réel et notifications.',
                'summary' => 'Une application mobile intuitive pensée pour faciliter les trajets partagés quotidiens entre professionnels et étudiants.',
                'challenge' => 'Proposer une expérience fluide même avec une connectivité réseau instable, tout en garantissant la synchronisation instantanée des réservations.',
                'solution' => 'Développement natif Kotlin respectant les principes Clean Architecture et MVVM, couplé à Firebase Cloud Messaging, base de données Firestore synchronisée offline et CDN Cloudinary pour les photos.',
                'tags' => ['Kotlin', 'Android SDK', 'Firebase', 'Clean Architecture', 'Cloudinary', 'Google Maps API'],
                'features' => [
                    'Recherche d\'itinéraires et correspondance automatique conducteur/passager',
                    'Messagerie instantanée chiffrée intégrée à l\'application',
                    'Paiement intégré sécurisé et système d\'avis vérifiés',
                    'Suivi GPS en temps réel du trajet et bouton de sécurité',
                    'Mode hors-ligne permettant d\'accéder aux billets de trajet sans réseau',
                ],
                'results' => [
                    '4.8 ★' => 'Note moyenne sur le Google Play Store',
                    '20 000+' => 'Trajets partagés réalisés en 6 mois',
                    '< 200ms' => 'Temps de réponse de la synchronisation en direct',
                ],
                'image' => 'images/projects/ridemate-preview.jpg',
                'color_theme' => 'project-green',
            ],
        ];
    }

    /**
     * English projects data
     */
    protected static function dataEn(): array
    {
        return [
            'lotti' => [
                'slug' => 'lotti',
                'title' => 'Lotti.ma',
                'badge' => 'LOT',
                'category' => 'Laravel · Real Estate & Geospatial Mapping',
                'short_description' => 'Modern web platform for searching, mapping, and listing land subdivisions across Morocco.',
                'summary' => 'An end-to-end platform modernizing land acquisition with interactive geospatial maps, multi-criteria filtering, and a dedicated developer portal.',
                'challenge' => 'The Moroccan land market lacked digital tools to accurately visualize parcel zoning, infrastructure availability, and legal tenure details.',
                'solution' => 'Engineered a high-performance web platform on Laravel with Leaflet/Mapbox for geospatial rendering, PostgreSQL for spatial queries, and mobile-optimized responsiveness.',
                'tags' => ['Laravel', 'PostgreSQL', 'Blade', 'JavaScript', 'Leaflet Maps', 'Tailwind/CSS', 'Technical SEO'],
                'features' => [
                    'Interactive geospatial mapping of subdivisions and cadastral plots',
                    'Multi-criteria filters (area, urban zoning, price per m², legal status)',
                    'Developer & broker portal with real-time lead and listing management',
                    'Localized SEO targeting key Moroccan commercial hubs (Casablanca, Tangier, Marrakech...)',
                    'Blazing fast performance with page load times under 1.2s',
                ],
                'results' => [
                    '+15,000' => 'Monthly unique visitors within the first quarter',
                    '< 1.2s' => 'Average page load speed',
                    '100%' => 'Google Lighthouse SEO & Best Practices Score',
                ],
                'image' => 'images/projects/lotti-preview.jpg',
                'color_theme' => 'project-green',
            ],
            'mystiqo' => [
                'slug' => 'mystiqo',
                'title' => 'MYSTIQO',
                'badge' => 'DATA',
                'category' => 'Python · Data Quality & Automated Profiling',
                'short_description' => 'Desktop exploratory data analysis tool with automatic anomaly detection for data analysts.',
                'summary' => 'A desktop suite engineered to accelerate data cleaning and tabular validation before ingestion into modern data warehouses.',
                'challenge' => 'Data analysts spent hours writing ad-hoc scripts each week to detect missing entries, duplicates, format inconsistencies, and statistical outliers.',
                'solution' => 'Developed an intuitive Python application powered by Pandas and NumPy, featuring an ergonomic GUI and one-click compliance audit reporting.',
                'tags' => ['Python', 'Pandas', 'NumPy', 'Tkinter', 'Matplotlib', 'Data Profiling', 'PDF/Excel Exports'],
                'features' => [
                    'Automated column type inference and completeness profiling',
                    'Instant descriptive statistics and graphical distributions',
                    'Statistical outlier detection using Z-Score & Interquartile Range (IQR)',
                    'Customizable business validation rules engine',
                    'One-click comprehensive audit report generation (PDF & Excel)',
                ],
                'results' => [
                    '75%' => 'Time saved during data preparation & cleaning phases',
                    '10M+' => 'Rows analyzed in-memory within seconds',
                    '0' => 'Zero cloud dependency (100% secure offline processing)',
                ],
                'image' => 'images/projects/mystiqo-preview.jpg',
                'color_theme' => 'project-white',
            ],
            'cryptopulse' => [
                'slug' => 'cryptopulse',
                'title' => 'CryptoPulse',
                'badge' => '₿',
                'category' => 'Data Engineering · Real-Time Crypto Pipeline',
                'short_description' => 'Big Data pipeline for real-time ingestion, transformation, and modeling of live financial tick streams.',
                'summary' => 'Robust enterprise data architecture aggregating live market order books, computing algorithmic technical signals, and powering analytical dashboards.',
                'challenge' => 'Ingest tens of millions of market ticks per day with sub-second latency and zero packet loss while guaranteeing idempotent dbt data transformations.',
                'solution' => 'Deployed a modern data stack combining Apache Airflow orchestration, MinIO object storage for the Bronze tier, dbt for Silver/Gold modeling, and Snowflake for analytics.',
                'tags' => ['Python', 'Apache Airflow', 'dbt', 'Snowflake', 'MinIO', 'Docker', 'FastAPI'],
                'features' => [
                    'Continuous WebSocket and REST ingestion with fault-tolerant reconnects',
                    'Automated Airflow DAG orchestration with real-time alerting',
                    'Medallion architecture modeling (Bronze/Silver/Gold) with automated dbt tests',
                    'Real-time financial indicators (VWAP, RSI, aggregated depth charts)',
                    'High-performance REST API for serving aggregated analytics',
                ],
                'results' => [
                    '99.9%' => 'Pipeline uptime and operational availability',
                    '50M+' => 'Events processed daily without performance degradation',
                    'Automated' => 'Data quality assertions applied on every transformation run',
                ],
                'image' => 'images/projects/cryptopulse-preview.jpg',
                'color_theme' => 'project-dark',
            ],
            'ridemate' => [
                'slug' => 'ridemate',
                'title' => 'RideMate',
                'badge' => 'APP',
                'category' => 'Kotlin · Urban Mobility Android App',
                'short_description' => 'Android ridesharing application with real-time GPS tracking, in-app messaging, and push notifications.',
                'summary' => 'An intuitive mobility app designed to streamline daily carpooling commutes between professionals and university students.',
                'challenge' => 'Deliver an ultra-smooth user experience on spotty cellular connections while guaranteeing instantaneous seat reservation synchronization.',
                'solution' => 'Native Kotlin development following Clean Architecture and MVVM, coupled with Firebase Cloud Messaging, offline-cached Firestore, and Cloudinary media delivery.',
                'tags' => ['Kotlin', 'Android SDK', 'Firebase', 'Clean Architecture', 'Cloudinary', 'Google Maps API'],
                'features' => [
                    'Smart route matching between drivers and commuters',
                    'End-to-end encrypted in-app messaging',
                    'Secure integrated payments and verified community reviews',
                    'Real-time GPS ride tracking with built-in safety SOS triggers',
                    'Offline ticket storage accessible without cellular connection',
                ],
                'results' => [
                    '4.8 ★' => 'Average rating on Google Play Store',
                    '20,000+' => 'Completed shared rides within 6 months',
                    '< 200ms' => 'Live synchronization response latency',
                ],
                'image' => 'images/projects/ridemate-preview.jpg',
                'color_theme' => 'project-green',
            ],
        ];
    }

    /**
     * Arabic projects data
     */
    protected static function dataAr(): array
    {
        return [
            'lotti' => [
                'slug' => 'lotti',
                'title' => 'Lotti.ma',
                'badge' => 'LOT',
                'category' => 'لارافيل · منصة عقارية وخرائط جغرافية',
                'short_description' => 'منصة ويب متطورة للبحث والاستكشاف الخرائطي للأراضي والتجزئات السكنية في المغرب.',
                'summary' => 'حل رقمي متكامل لرقمنة التنقيب العقاري بالمغرب مع خرائط جغرافية تفاعلية وفلاتر متقدمة ومساحة مخصصة للمنعشين العقاريين.',
                'challenge' => 'كان السوق العقاري المغربي يفتقر إلى أدوات رقمية متخصصة تتيح للمستثمرين معاينة المخططات التوجيهية وتفاصيل تجهيز الأراضي بدقة.',
                'solution' => 'تصميم وبناء منصة ويب فائقة الأداء بلارافيل، مع دمج Leaflet/Mapbox للخرائط التفاعلية، وقاعدة بيانات PostgreSQL للاستعلامات المكانية.',
                'tags' => ['Laravel', 'PostgreSQL', 'Blade', 'JavaScript', 'Leaflet Maps', 'Tailwind/CSS', 'SEO Technique'],
                'features' => [
                    'خرائط تفاعلية دقيقة لتحديد مواقع التجزئات والبقع الأرضية',
                    'فلاتر بحث متعددة (المساحة، التخصيص العمراني، السعر للمتر المربع، الوضعية القانونية)',
                    'فضاء مخصص للمنعشين والوكالات لإدارة الإعلانات وتلقي طلبات العملاء',
                    'تهيئة متقدمة لمحركات البحث المحلية في المدن الكبرى (الدار البيضاء، طنجة، مراكش...)',
                    'واجهة تصفح فائقة السرعة بزمن تحميل يقل عن 1.2 ثانية',
                ],
                'results' => [
                    '+15,000' => 'زائر فريد شهرياً منذ الربع الأول من الإطلاق',
                    '< 1.2s' => 'متوسط سرعة تحميل وتجاوب الصفحات',
                    '100%' => 'الدرجة الكاملة لمعايير SEO على Google Lighthouse',
                ],
                'image' => 'images/projects/lotti-preview.jpg',
                'color_theme' => 'project-green',
            ],
            'mystiqo' => [
                'slug' => 'mystiqo',
                'title' => 'MYSTIQO',
                'badge' => 'DATA',
                'category' => 'بايثون · تدقيق جودة البيانات واستكشافها آلياً',
                'short_description' => 'تطبيق مكتبي للتحليل الاستكشافي واكتشاف الأخطاء والعيوب الإحصائية في قواعد البيانات آلياً.',
                'summary' => 'تطبيق سطح مكتب مصمم لتسريع تنظيف وتدقيق جودة البيانات الجدولية قبل إدراجها في مستودعات البيانات الكبرى.',
                'challenge' => 'كان محللو البيانات يقضون ساعات طويلة أسبوعياً في كتابة نصوص برمجية يدوية لرصد القيم المفقودة والتكرارات والأنماط الشاذة.',
                'solution' => 'تطوير تطبيق مكتبي متكامل بلغة Python ومحرك Pandas/NumPy، بواجهة مستخدم سهلة وتوليد فوري لتقارير التدقيق.',
                'tags' => ['Python', 'Pandas', 'NumPy', 'Tkinter', 'Matplotlib', 'Data Profiling', 'Exports PDF/Excel'],
                'features' => [
                    'كشف آلي لأنماط الأعمدة ومعدلات اكتمال وصحة البيانات',
                    'حساب فوري للإحصاءات الوصفية ورسوم التوزيع البياني',
                    'رصد إحصائي دقيق للقيم الشاذة والمتطرفة (Z-Score وIQR)',
                    'قواعد تحقق مخصصة تتوافق مع منطق العمل المطلوب',
                    'تصدير تقارير تدقيق شاملة بضغطة زر واحدة (PDF وExcel)',
                ],
                'results' => [
                    '75%' => 'توفير في الوقت المستغرق في مراحل تنظيف البيانات',
                    '10M+' => 'سطر قابل للتحليل المباشر في الذاكرة خلال ثوانٍ',
                    '0' => 'عمل محلي آمن 100% دون أي اعتمادية على السحابة',
                ],
                'image' => 'images/projects/mystiqo-preview.jpg',
                'color_theme' => 'project-white',
            ],
            'cryptopulse' => [
                'slug' => 'cryptopulse',
                'title' => 'CryptoPulse',
                'badge' => '₿',
                'category' => 'هندسة البيانات · خط معالجة وتدفق البيانات الحية',
                'short_description' => 'خط معالجة بيانات ضخمة (Big Data) لجمع ومعالجة وتدفق معاملات التداول في الوقت الفعلي.',
                'summary' => 'بنية بيانات هندسية متطورة لجمع أوامر الأسواق، حساب الإشارات الفنية اللحظية وتغذية لوحات التحكم التحليلية.',
                'challenge' => 'معالجة عشرات الملايين من سجلات التداول اللحظية يومياً بأدنى تأخير ممكن وبدون أي فقد للبيانات مع ضمان التحويل المتكرر dbt.',
                'solution' => 'بناء بنية حديثة تجمع بين Apache Airflow لإدارة العمليات، MinIO للتخزين الكائني، dbt لنمذجة الطبقات، وSnowflake للتحليلات.',
                'tags' => ['Python', 'Apache Airflow', 'dbt', 'Snowflake', 'MinIO', 'Docker', 'FastAPI'],
                'features' => [
                    'استقبال متواصل للبيانات عبر WebSockets وREST APIs مع إدارة الانقطاع',
                    'جدولة ومراقبة آلية للمهام عبر Airflow مع إشعارات وتنبيهات فورية',
                    'نمذجة طبقية معتمدة (Bronze/Silver/Gold) مع اختبارات جودة dbt',
                    'حساب لحظي للمؤشرات المالية الفنية (VWAP، RSI، ودفاتر الأوامر)',
                    'واجهة برمجة تطبيقات REST فائقة السرعة لتغذية المنصات والمؤشرات',
                ],
                'results' => [
                    '99.9%' => 'نسبة استقرار وجاهزية خط معالجة البيانات',
                    '50M+' => 'حدث ومعاملة تتم معالجتها يومياً دون أي تباطؤ',
                    'آلي بالكامل' => 'اختبارات صارمة لجودة البيانات عند كل تحويل',
                ],
                'image' => 'images/projects/cryptopulse-preview.jpg',
                'color_theme' => 'project-dark',
            ],
            'ridemate' => [
                'slug' => 'ridemate',
                'title' => 'RideMate',
                'badge' => 'APP',
                'category' => 'كوتلن · تطبيق جوال للتنقل ومشاركة الرحلات',
                'short_description' => 'تطبيق أندرويد لمشاركة الرحلات والتنقل الحضري مع ميزة التتبع الجغرافي اللحظي والإشعارات.',
                'summary' => 'تطبيق جوال سلس ومبتكر يهدف إلى تسهيل مشاركة الرحلات اليومية بين المهنيين والطلاب بكفاءة وأمان.',
                'challenge' => 'تقديم تجربة استخدام سريعة حتى في ظروف الاتصال الضعيف بالإنترنت مع ضمان المزامنة الفورية لعمليات الحجز.',
                'solution' => 'تطوير أصلي بلغة Kotlin وفق معمارية Clean Architecture وMVVM، متصل مع Firebase ومزامنة قواعد البيانات دون اتصال.',
                'tags' => ['Kotlin', 'Android SDK', 'Firebase', 'Clean Architecture', 'Cloudinary', 'Google Maps API'],
                'features' => [
                    'مطابقة ذكية وسريعة بين مسارات السائقين والركاب',
                    'محادثات فورية مشفرة ومدمجة داخل التطبيق',
                    'دفع إلكتروني آمن ونظام تقييمات موثقة للثقة المجتمعية',
                    'تتبع مباشر للرحلة عبر خرائط GPS مع زر طوارئ وأمان',
                    'الوصول للتذاكر والحجوزات المؤكدة دون الحاجة للإنترنت',
                ],
                'results' => [
                    '4.8 ★' => 'تقييم متميز على متجر Google Play',
                    '20,000+' => 'رحلة مشتركة مكتملة في أول 6 أشهر',
                    '< 200ms' => 'زمن استجابة التزامن المباشر للبيانات',
                ],
                'image' => 'images/projects/ridemate-preview.jpg',
                'color_theme' => 'project-green',
            ],
        ];
    }

    /**
     * Tamazight projects data
     */
    protected static function dataTamazight(): array
    {
        return [
            'lotti' => [
                'slug' => 'lotti',
                'title' => 'Lotti.ma',
                'badge' => 'LOT',
                'category' => 'Laravel · ⴰⴽⴰⵍ ⴷ ⵜⴰⴽⴰⵕⴹⴰ',
                'short_description' => 'ⵜⴰⵙⵏⵙⵉⵜ ⵜⴰⵜⵔⴰⵔⵜ ⵉ ⵓⵙⵉⴳⴳⵍ, ⵜⴰⴽⴰⵕⴹⴰ ⴷ ⵓⴼⵙⴰⵢ ⵏ ⵡⴰⴽⴰⵍ ⴳ ⵍⵎⵖⵔⵉⴱ.',
                'summary' => 'ⵜⵉⴼⵔⴰⵜ ⵜⴰⵎⴰⴷⴷⵓⴷⵜ ⵉ ⵓⵙⵏⵓⴼⵛ ⵏ ⵡⴰⴽⴰⵍ ⴳ ⵍⵎⵖⵔⵉⴱ ⵙ ⵜⴽⴰⵕⴹⵉⵡⵉⵏ ⵜⵉⴼⴰⵡⵉⵏ ⴷ ⵉⵎⵙⴽⴰⵔⵏ.',
                'challenge' => 'ⴰⴳⴰⴷⴰⵣ ⵏ ⵡⴰⴽⴰⵍ ⴳ ⵍⵎⵖⵔⵉⴱ ⵓⵔ ⵢⵓⴼⵉ ⵉⵎⴰⵙⵙⵏ ⵉⵎⵓⵟⵟⵓⵏⵏ ⵉ ⵓⵥⵕⵉ ⵏ ⵜⵎⵏⴰⴹⵉⵏ ⵏ ⵡⴰⴽⴰⵍ.',
                'solution' => 'ⴰⵙⴱⵓⵖⵍⵓ ⵏ ⵜⵙⵏⵙⵉⵜ ⵏ ⵓⵡⵉⴱ ⵙ Laravel, ⵜⵉⴽⴰⵕⴹⵉⵡⵉⵏ Leaflet/Mapbox ⴷ PostgreSQL ⵉ ⵉⵙⴼⴽⴰ ⵏ ⵜⵊⵓⵎⵎⴰ.',
                'tags' => ['Laravel', 'PostgreSQL', 'Blade', 'JavaScript', 'Leaflet Maps', 'Tailwind/CSS', 'Technical SEO'],
                'features' => [
                    'ⵜⴰⴽⴰⵕⴹⴰ ⵜⴰⵎⴰⴷⴷⵓⴷⵜ ⵏ ⵉⴳⵣⵎⴰⵏ ⵏ ⵡⴰⴽⴰⵍ',
                    'ⵉⵙⴼⵙⵉⵜⵏ ⵉⵎⵏⵏⴰⵡⵏ (ⵜⴰⵊⵓⵎⵎⴰ, ⴰⵜⵉⴳ ⵙ m², ⴰⴷⴷⴰⴷ ⴰⵙⵍⴳⴰⵏ)',
                    'ⴰⴷⵖⴰⵔ ⵏ ⵉⵎⵙⴽⴰⵔⵏ ⴷ ⵜⵙⵏⵓⵔⴰⵢ ⵉ ⵓⵙⵡⵓⴷⴷⵓ ⵏ ⵜⵙⵓⵎⴰⵔ',
                    'ⴰⵙⵉⴷⴼ ⴳ Google ⵉ ⵜⵉⵎⴷⵉⵏⵉⵏ ⵏ ⵍⵎⵖⵔⵉⴱ (ⴰⵏⴼⴰ, ⵎⵕⵕⴰⴽⵛ, ⵟⴰⵏⵊⴰ...)',
                    'ⵜⵉⵣⵉ ⵜⵓⴷⴷⵉⵔⵜ ⴷⴷⴰⵡ 1.2 ⵜⵙⵉⵏⵜ',
                ],
                'results' => [
                    '+15,000' => 'ⵉⵎⵣⴰⵔⴰⵢⵏ ⴽⵓ ⴰⵢⵢⵓⵔ ⴳ ⵓⵎⵣⵡⴰⵔⵓ',
                    '< 1.2s' => 'ⴰⴽⵓⴷ ⴰⵏⴰⵎⵎⴰⵙ ⵏ ⵓⵙⵉⴷⴼ ⵏ ⵜⵙⵏⵉⵡⵉⵏ',
                    '100%' => 'ⴰⵙⴰⵍⴰⵢ ⵉⵎⴷⵏ ⴳ Google Lighthouse',
                ],
                'image' => 'images/projects/lotti-preview.jpg',
                'color_theme' => 'project-green',
            ],
            'mystiqo' => [
                'slug' => 'mystiqo',
                'title' => 'MYSTIQO',
                'badge' => 'DATA',
                'category' => 'Python · ⵜⴰⵖⴰⵔⴰ ⵏ ⵉⵙⴼⴽⴰ',
                'short_description' => 'ⵜⴰⵙⵏⵙⵉⵜ ⵏ ⵓⵙⵍⴽⵉⵎ ⵉ ⵓⵙⴼⵙⵉ ⴷ ⵓⴼⵙⴰⵢ ⵏ ⵉⵣⴳⴰⵍⵏ ⵏ ⵉⵙⴼⴽⴰ ⵙ ⵜⵖⴰⵔⴰⵙⵜ ⵜⴰⵡⵔⵎⴰⵏⵜ.',
                'summary' => 'ⵜⴰⵙⵏⵙⵉⵜ ⵉⵜⵜⵓⵙⴽⴰⵔⵏ ⵉ ⵓⵙⵉⵣⴷⴳ ⴷ ⵓⴹⴼⵓⵕ ⵏ ⵉⵙⴼⴽⴰ ⴷⴰⵜ ⵓⵙⵉⴷⴼ ⵖⵔ ⵉⵎⵃⴹⴰⵏ.',
                'challenge' => 'ⵉⵎⵙⴼⵙⴰⵢⵏ ⵏ ⵉⵙⴼⴽⴰ ⵜⵜⴰⴽⴽⴰⵏ ⴰⴽⵓⴷ ⵉⵎⵇⵇⵕⴰⵏ ⴳ ⵜⵉⵔⵔⴰ ⵏ ⵉⵙⴽⵔⵉⴱⵜⵏ ⵉ ⵓⵙⵉⵣⴷⴳ ⵏ ⵉⵙⴼⴽⴰ.',
                'solution' => 'ⴰⵙⴱⵓⵖⵍⵓ ⵏ ⵜⵙⵏⵙⵉⵜ Python ⵙ Pandas/NumPy, ⴰⴷⵎ ⵉⴼⴰⵡⵏ ⴷ ⵉⵏⵖⵎⵉⵙⵏ ⵉⵎⴰⴷⴷⵓⴷⵏ ⵙ ⵢⴰⵜ ⵜⵉⴽⴽⵍⵜ.',
                'tags' => ['Python', 'Pandas', 'NumPy', 'Tkinter', 'Matplotlib', 'Data Profiling', 'Exports PDF/Excel'],
                'features' => [
                    'ⴰⵙⴼⵙⵉ ⴰⵡⵔⵎⴰⵏ ⵏ ⵡⴰⵏⴰⵡⵏ ⵏ ⵉⵙⴼⴽⴰ ⴷ ⵜⵖⴰⵔⴰ ⵏⵙⵏ',
                    'ⴰⵙⵉⴹⵏ ⵉⵣⵔⴱⵏ ⵏ ⵜⵙⵏⵎⴽⵜ ⴷ ⵉⵏⵎⵎⴰⵍⵏ ⵉⵥⵕⴰⵏⵏ',
                    'ⵜⴰⵡⵓⵔⵉ ⵖⴼ ⵉⵣⴳⴰⵍⵏ ⵙ Z-Score ⴷ IQR',
                    'ⵉⵍⵓⴳⴰⵏ ⵉⵜⵜⵓⵙⵏⵎⴰⵍⴰⵏ ⵙ ⵜⵖⴰⵔⴰⵙⵜ ⵏ ⵜⵎⵙⵙⵓⵔⵜ',
                    'ⴰⵙⵙⵓⴼⵖ ⵏ ⵉⵏⵖⵎⵉⵙⵏ PDF ⴷ Excel ⵙ ⵢⴰⵜ ⵜⵉⴽⴽⵍⵜ',
                ],
                'results' => [
                    '75%' => 'ⴰⴽⵓⴷ ⵉⵜⵜⵓⴼⵔⴰⵏ ⴳ ⵓⵙⵉⵣⴷⴳ ⵏ ⵉⵙⴼⴽⴰ',
                    '10M+' => 'ⵉⴳⵣⵎⴰⵏ ⵉⵜⵜⵓⵙⴼⵙⴰⵏ ⴳ ⵎⵏⵏⴰⵡⵜ ⵜⵙⵉⵏⵉⵏ',
                    '0' => 'ⵜⴰⵡⵓⵔⵉ ⵜⴰⴷⵖⵢⴰⵏⵜ ⴱⵍⴰ ⴰⵙⵉⵍⵍⵡ (100% ⵜⴰⵏⴼⵔⵓⵜ)',
                ],
                'image' => 'images/projects/mystiqo-preview.jpg',
                'color_theme' => 'project-white',
            ],
            'cryptopulse' => [
                'slug' => 'cryptopulse',
                'title' => 'CryptoPulse',
                'badge' => '₿',
                'category' => 'ⵜⴰⵙⵏⵓⵔⴰⵢⵜ ⵏ ⵉⵙⴼⴽⴰ · Big Data Crypto',
                'short_description' => 'ⴰⴱⵔⵉⴷ Big Data ⵉ ⵓⵙⵉⴷⴼ ⴷ ⵓⵙⵏⴼⵍ ⵏ ⵉⵙⴼⴽⴰ ⵏ ⵓⵙⵉⵡⵍ ⴳ ⵜⵉⵣⵉ ⵜⵓⴷⴷⵉⵔⵜ.',
                'summary' => 'ⵜⴰⵎⵚⴽⵉⵡⵜ ⵜⴰⵜⵔⴰⵔⵜ ⵉ ⵓⵙⵎⵓⵏ ⵏ ⵉⵙⴼⴽⴰ ⵏ ⵓⴳⴰⴷⴰⵣ ⴷ ⵓⵙⴼⵙⵉ ⵏ ⵉⵎⵓⵙⵙⵓⵜⵏ ⵉⵜⵉⵇⵏⵉⵢⵏ.',
                'challenge' => 'ⴰⵙⵉⴷⴼ ⵏ ⵎⵍⵢⵓⵏ ⵏ ⵉⵙⴼⴽⴰ ⴽⵓ ⴰⵙⵙ ⴱⵍⴰ ⴰⴱⴷⴷⵉ ⴷ ⵓⵙⴷⴷⵉⴷ ⵏ ⵜⵖⴰⵔⴰ ⵙ dbt.',
                'solution' => 'ⵜⴰⵎⵚⴽⵉⵡⵜ ⵉⵙⵎⵓⵏⵏ Airflow ⵉ ⵓⵙⵡⵓⴷⴷⵓ, MinIO ⵉ ⵓⵃⵟⵟⵓ, dbt ⵉ ⵓⵙⵏⵎⴰⵍⴰ, ⴷ Snowflake ⵉ ⵓⵙⴼⵙⵉ.',
                'tags' => ['Python', 'Apache Airflow', 'dbt', 'Snowflake', 'MinIO', 'Docker', 'FastAPI'],
                'features' => [
                    'ⴰⵙⵉⴷⴼ ⵉⵎⵖⵍⴰⵍⵏ ⵙ WebSocket ⴷ REST APIs',
                    'ⴰⵙⵡⵓⴷⴷⵓ ⴰⵡⵔⵎⴰⵏ ⵙ DAGs Airflow ⴷ ⵜⵉⵖⵔⵉⵡⵉⵏ',
                    'ⴰⵙⵏⵎⴰⵍⴰ ⵙ ⵜⴼⵉⵍⵉⵏ Bronze/Silver/Gold ⴷ ⵉⵔⵉⵎⵏ dbt',
                    'ⴰⵙⵉⴹⵏ ⴳ ⵜⵉⵣⵉ ⵜⵓⴷⴷⵉⵔⵜ ⵏ VWAP, RSI ⴷ ⵉⵏⵎⵎⴰⵍⵏ',
                    'API REST ⵉⵣⵔⴱⵏ ⵉ ⵓⵙⵙⵓⴼⵖ ⵏ ⵜⵙⵏⵎⴽⵜ',
                ],
                'results' => [
                    '99.9%' => 'ⵜⴰⵙⵏⵎⴽⵜ ⵏ ⵜⵎⵓⵔⵙⵜ ⵏ ⵓⴱⵔⵉⴷ',
                    '50M+' => 'ⵉⵎⵓⵙⵙⵓⵜⵏ ⵉⵜⵜⵓⵙⴼⵙⴰⵏ ⴽⵓ ⴰⵙⵙ ⴱⵍⴰ ⵜⴰⵥⵉⵜ',
                    'ⴰⵡⵔⵎⴰⵏ' => 'ⵉⵔⵉⵎⵏ ⵏ ⵜⵖⴰⵔⴰ ⴳ ⴽⵓ ⴰⵙⵏⴼⵍ',
                ],
                'image' => 'images/projects/cryptopulse-preview.jpg',
                'color_theme' => 'project-dark',
            ],
            'ridemate' => [
                'slug' => 'ridemate',
                'title' => 'RideMate',
                'badge' => 'APP',
                'category' => 'Kotlin · ⵜⴰⵙⵏⵙⵉⵜ ⵏ ⵓⵎⵓⴱⴰⵢⵍ ⵏ ⵓⵙⵉⴽⵍ',
                'short_description' => 'ⵜⴰⵙⵏⵙⵉⵜ Android ⵉ ⵓⴱⴹⵓ ⵏ ⵓⵙⵉⴽⵍ ⵙ ⵓⴹⴼⵓⵕ GPS ⴷ ⵉⵏⵖⵎⵉⵙⵏ ⵓⵙⵔⵉⴷⵏ.',
                'summary' => 'ⵜⴰⵙⵏⵙⵉⵜ ⵏ ⵓⵎⵓⴱⴰⵢⵍ ⵉⴼⴰⵡⵏ ⵉ ⵓⵙⵙⵔⵅⵓ ⵏ ⵓⵙⵉⴽⵍ ⴽⵓ ⴰⵙⵙ ⴳⵔ ⵉⵎⵙⵡⵓⵔⵉⵢⵏ ⴷ ⵉⵎⵃⴹⴰⵕⵏ.',
                'challenge' => 'ⴰⵙⵙⵓⴼⵖ ⵏ ⵜⵡⵓⵔⵉ ⵉⵣⵔⴱⵏ ⵎⵇⵇⴰⵔ ⵉⴷⵔⵓⵙ ⵓⵥⵟⵟⴰ ⴷ ⵓⵙⴷⴷⵉⴷ ⵏ ⵜⵏⵙⵉⵡⵉⵏ ⴳ ⵜⵉⵣⵉ.',
                'solution' => 'ⴰⵙⴱⵓⵖⵍⵓ ⵙ Kotlin Native (Clean Architecture), Firebase Cloud Messaging ⴷ Firestore ⴱⵍⴰ ⴰⵥⵟⵟⴰ.',
                'tags' => ['Kotlin', 'Android SDK', 'Firebase', 'Clean Architecture', 'Cloudinary', 'Google Maps API'],
                'features' => [
                    'ⴰⵎⵙⴰⵙⴰ ⴰⵡⵔⵎⴰⵏ ⴳⵔ ⵉⵎⵏⴷⴰⵀⵏ ⴷ ⵉⵎⵙⵉⴽⵍⵏ',
                    'ⵉⵏⵖⵎⵉⵙⵏ ⵉⵎⴰⴷⴷⵓⴷⵏ ⵉⵜⵜⵓⵃⴹⴰⵏ ⴳ ⵜⵙⵏⵙⵉⵜ',
                    'ⴰⵙⵍⵍⴼ ⵢⵓⵎⴰⵏ ⴷ ⵓⵙⵓⵜⵜⴳ ⵏ ⵉⵎⵙⵙⵎⵔⴰⵙ',
                    'ⴰⴹⴼⵓⵕ GPS ⴳ ⵜⵉⵣⵉ ⵜⵓⴷⴷⵉⵔⵜ ⴷ ⵜⴱⵣⵉⵎⵜ ⵏ ⵜⵏⴼⵔⵓⵜ SOS',
                    'ⵜⴰⵡⵓⵔⵉ ⴱⵍⴰ ⴰⵥⵟⵟⴰ ⵉ ⵓⵥⵕⵉ ⵏ ⵜⵏⴼⵓⵍⵉⵏ',
                ],
                'results' => [
                    '4.8 ★' => 'ⴰⵙⵓⵜⵜⴳ ⵉⵥⵉⵍⵏ ⴳ Google Play Store',
                    '20,000+' => 'ⵉⵙⵉⴽⵍⵏ ⵉⵜⵜⵓⵙⴽⴰⵔⵏ ⴳ 6 ⵡⴰⵢⵢⵓⵔⵏ',
                    '< 200ms' => 'ⵜⵉⵣⵉ ⵏ ⵓⵔⴰⵔ ⵏ ⵓⵙⵏⵎⴰⵍⴰ',
                ],
                'image' => 'images/projects/ridemate-preview.jpg',
                'color_theme' => 'project-green',
            ],
        ];
    }
}
