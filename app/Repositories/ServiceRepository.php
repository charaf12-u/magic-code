<?php

namespace App\Repositories;

class ServiceRepository
{
    /**
     * Get all services localized for the current language.
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
     * Find a service by slug.
     *
     * @param string $slug
     * @return array<string, mixed>|null
     */
    public static function find(string $slug): ?array
    {
        $services = static::all();
        return $services[$slug] ?? null;
    }

    /**
     * Find a service by slug or abort 404.
     *
     * @param string $slug
     * @return array<string, mixed>
     */
    public static function findOrFail(string $slug): array
    {
        $service = static::find($slug);
        if (!$service) {
            abort(404);
        }
        return $service;
    }

    /**
     * Get featured services for the home page preview.
     *
     * @param int $limit
     * @return array<string, array<string, mixed>>
     */
    public static function featured(int $limit = 4): array
    {
        return array_slice(static::all(), 0, $limit, true);
    }

    /**
     * French data
     */
    protected static function dataFr(): array
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
                'title' => 'Data Engineering & BI',
                'short_description' => 'Pipelines ETL/ELT, modélisation de données, dashboards décisionnels et gouvernance de la donnée.',
                'lead' => 'Transformez vos données brutes en informations actionnables grâce à des architectures de données modernes et résilientes.',
                'deliverables' => [
                    'Pipelines d\'ingestion et de transformation avec Airflow & dbt',
                    'Modélisation en couches Bronze / Silver / Gold',
                    'Entrepôts de données modernes (Snowflake, BigQuery, PostgreSQL)',
                    'Dashboards interactifs et métriques temps réel',
                    'Contrôles de qualité automatisés et alertes d\'anomalies',
                ],
                'tech_stack' => ['Python', 'Apache Airflow', 'dbt', 'Snowflake', 'BigQuery', 'PostgreSQL', 'Pandas', 'Metabase'],
                'benefits' => [
                    'Une source de vérité unique et fiable pour vos prises de décision',
                    'Pipelines automatisés réduisant drastiquement les erreurs manuelles',
                    'Scalabilité pour traiter des millions d\'événements sans surcharge',
                ],
            ],
            'ai' => [
                'slug' => 'ai',
                'number' => '04',
                'icon' => '✦',
                'title' => 'IA & Automatisation',
                'short_description' => 'Intégration de modèles LLM, agents intelligents, automatisation de workflows et traitement de documents.',
                'lead' => 'Appliquez l\'intelligence artificielle générative et l\'automatisation de processus là où elles créent une valeur métier concrète et mesurable.',
                'deliverables' => [
                    'Intégration d\'APIs de modèles de pointe (OpenAI, Claude, Gemini)',
                    'Agents IA connectés à vos bases documentaires internes (RAG)',
                    'Automatisation de processus métier répétitifs (n8n, Make, scripts Python)',
                    'Extraction et structuration automatique de données textuelles et PDF',
                ],
                'tech_stack' => ['OpenAI API', 'Anthropic Claude', 'Gemini API', 'LangChain', 'LlamaIndex', 'FastAPI', 'n8n', 'Python'],
                'benefits' => [
                    'Gain de temps spectaculaire sur les tâches à faible valeur ajoutée',
                    'Amélioration de la réactivité de votre support et service client',
                    'Solutions déployées en toute confidentialité sans fuite de données',
                ],
            ],
            'seo' => [
                'slug' => 'seo',
                'number' => '05',
                'icon' => '◎',
                'title' => 'SEO & Performance Web',
                'short_description' => 'Audits techniques, optimisation Core Web Vitals, balisage Schema.org et visibilité organique.',
                'lead' => 'Optimisez la vitesse et la structure de vos sites pour dominer les résultats de recherche et maximiser vos taux de conversion.',
                'deliverables' => [
                    'Audit technique complet (Core Web Vitals, indexabilité, crawl budget)',
                    'Optimisation du temps de chargement (< 1,5s)',
                    'Mise en place de données structurées JSON-LD (Schema.org)',
                    'Stratégie de référencement naturel local et international',
                ],
                'tech_stack' => ['Google Search Console', 'Lighthouse', 'PageSpeed Insights', 'Schema.org', 'Sitemap XML', 'HTTP/3', 'CDN'],
                'benefits' => [
                    'Augmentation durable du trafic organique qualifié',
                    'Taux de rebond réduit grâce à une vitesse instantanée',
                    'Meilleur taux de conversion sur mobile et desktop',
                ],
            ],
            'design' => [
                'slug' => 'design',
                'number' => '06',
                'icon' => '◬',
                'title' => 'UI / UX Design & Prototypage',
                'short_description' => 'Conception d\'interfaces modernes, wireframes, design systems et maquettes interactives.',
                'lead' => 'Des expériences visuelles mémorables, pensées pour susciter l\'adhésion de vos utilisateurs et refléter l\'excellence de votre marque.',
                'deliverables' => [
                    'Ateliers de cadrage UX et parcours utilisateurs',
                    'Design systems complets (typographie, couleurs, composants)',
                    'Maquettes Figma interactives haute fidélité pour desktop et mobile',
                    'Prototypes testables auprès de vos utilisateurs finaux',
                ],
                'tech_stack' => ['Figma', 'FigJam', 'Design Systems', 'Micro-interactions', 'Responsive Design', 'Accessibilité WCAG'],
                'benefits' => [
                    'Clarté absolue des parcours pour une conversion maximisée',
                    'Design distinctif qui renforce la crédibilité de votre entreprise',
                    'Gain de temps considérable pour les équipes de développement',
                ],
            ],
        ];
    }

    /**
     * English data
     */
    protected static function dataEn(): array
    {
        return [
            'web' => [
                'slug' => 'web',
                'number' => '01',
                'icon' => '⌘',
                'title' => 'Web & Laravel',
                'short_description' => 'Showcase sites, business platforms, SaaS apps, e-commerce, and robust RESTful APIs.',
                'lead' => 'We engineer fast, scalable, and business-focused web platforms using Laravel and modern web standards.',
                'deliverables' => [
                    'Tailor-made web applications built with Laravel 11/12',
                    'Custom & secure administration panels',
                    'Fully documented RESTful APIs (OpenAPI / Swagger)',
                    'Payment gateway integrations (Stripe, PayPal, CMI)',
                    'Performance optimization with Lighthouse scores of 90+',
                ],
                'tech_stack' => ['Laravel', 'PHP 8+', 'PostgreSQL', 'MySQL', 'Tailwind CSS', 'Alpine.js / Vue', 'REST APIs', 'Docker'],
                'benefits' => [
                    'Clean modular architecture enabling painless future scaling',
                    'Enterprise-grade security (protection against CSRF, XSS, SQL injections)',
                    'Ultra-fast user experience across all screen sizes',
                ],
            ],
            'mobile' => [
                'slug' => 'mobile',
                'number' => '02',
                'icon' => '◈',
                'title' => 'Mobile Applications',
                'short_description' => 'Android and cross-platform apps built for native, fluid, and frictionless ergonomics.',
                'lead' => 'Mobile applications prioritizing ease of use, offline responsiveness, and seamless cloud synchronization.',
                'deliverables' => [
                    'Native Android applications engineered in Kotlin',
                    'Cross-platform iOS & Android applications using Flutter',
                    'Push notifications and real-time geolocation integration',
                    'Offline-first data caching and sync architecture',
                    'Store publishing and guidance on Google Play Store & Apple App Store',
                ],
                'tech_stack' => ['Kotlin', 'Flutter', 'Android SDK', 'Firebase', 'Cloudinary', 'REST APIs', 'Clean Architecture'],
                'benefits' => [
                    'Buttery-smooth 60/120 fps animations and transitions',
                    'Minimized battery consumption and lightweight network payload',
                    'Strict compliance with Material Design and iOS Human Interface Guidelines',
                ],
            ],
            'data' => [
                'slug' => 'data',
                'number' => '03',
                'icon' => '◫',
                'title' => 'Data Engineering & BI',
                'short_description' => 'ETL/ELT pipelines, data modeling, executive decision dashboards, and data governance.',
                'lead' => 'Turn raw operational data into actionable insights through modern, resilient data architectures.',
                'deliverables' => [
                    'Ingestion and transformation pipelines with Airflow & dbt',
                    'Bronze / Silver / Gold medallion layer modeling',
                    'Modern cloud data warehouses (Snowflake, BigQuery, PostgreSQL)',
                    'Interactive executive dashboards and real-time business metrics',
                    'Automated data quality checks and proactive anomaly alerts',
                ],
                'tech_stack' => ['Python', 'Apache Airflow', 'dbt', 'Snowflake', 'BigQuery', 'PostgreSQL', 'Pandas', 'Metabase'],
                'benefits' => [
                    'A single, reliable source of truth for all business decisions',
                    'Automated pipelines that drastically reduce human error',
                    'High scalability to process millions of transactions without bottlenecks',
                ],
            ],
            'ai' => [
                'slug' => 'ai',
                'number' => '04',
                'icon' => '✦',
                'title' => 'AI & Process Automation',
                'short_description' => 'LLM integrations, autonomous AI agents, workflow automation, and intelligent document processing.',
                'lead' => 'Apply generative AI and process automation where they deliver tangible, measurable business ROI.',
                'deliverables' => [
                    'Integration of premier model APIs (OpenAI GPT-4, Claude, Gemini)',
                    'Context-aware AI agents connected to your internal documents (RAG)',
                    'End-to-end automation of repetitive workflows (n8n, Make, Python scripts)',
                    'Automated extraction and structuring of invoices, PDFs, and unstructured text',
                ],
                'tech_stack' => ['OpenAI API', 'Anthropic Claude', 'Gemini API', 'LangChain', 'LlamaIndex', 'FastAPI', 'n8n', 'Python'],
                'benefits' => [
                    'Massive time savings on repetitive, low-value manual tasks',
                    'Faster support resolution and 24/7 intelligent customer assistance',
                    'Enterprise deployments with strict data privacy and zero vendor leakage',
                ],
            ],
            'seo' => [
                'slug' => 'seo',
                'number' => '05',
                'icon' => '◎',
                'title' => 'SEO & Web Performance',
                'short_description' => 'Technical audits, Core Web Vitals optimization, Schema.org markup, and organic search dominance.',
                'lead' => 'Supercharge the speed and structure of your digital products to dominate search results and maximize conversions.',
                'deliverables' => [
                    'Full technical audit (Core Web Vitals, indexability, crawl budget)',
                    'Sub-1.5s page load speed optimization',
                    'Schema.org structured data (JSON-LD) implementation',
                    'Comprehensive local and international technical SEO strategies',
                ],
                'tech_stack' => ['Google Search Console', 'Lighthouse', 'PageSpeed Insights', 'Schema.org', 'Sitemap XML', 'HTTP/3', 'CDN'],
                'benefits' => [
                    'Long-term sustainable growth in high-intent organic traffic',
                    'Reduced bounce rates thanks to instantaneous page rendering',
                    'Higher conversion rates across both mobile and desktop visitors',
                ],
            ],
            'design' => [
                'slug' => 'design',
                'number' => '06',
                'icon' => '◬',
                'title' => 'UI / UX Design & Prototyping',
                'short_description' => 'Modern interface craft, user wireframing, design systems, and clickable interactive prototypes.',
                'lead' => 'Memorable visual experiences designed to captivate your users and embody the excellence of your brand.',
                'deliverables' => [
                    'UX discovery workshops and optimized user journeys',
                    'Comprehensive design systems (typography, color theory, components)',
                    'High-fidelity interactive Figma prototypes for mobile and desktop',
                    'Testable click-through flows ready for user validation',
                ],
                'tech_stack' => ['Figma', 'FigJam', 'Design Systems', 'Micro-interactions', 'Responsive Design', 'WCAG Accessibility'],
                'benefits' => [
                    'Frictionless user journeys crafted to maximize conversion rates',
                    'Distinctive, bespoke aesthetics that elevate your brand reputation',
                    'Substantial development time saved through pre-built modular UI components',
                ],
            ],
        ];
    }

    /**
     * Arabic data
     */
    protected static function dataAr(): array
    {
        return [
            'web' => [
                'slug' => 'web',
                'number' => '01',
                'icon' => '⌘',
                'title' => 'تطوير الويب ولارافيل',
                'short_description' => 'مواقع تعريفية، منصات أعمال سحابية، تطبيقات SaaS ومتاجر إلكترونية مع واجهات برمجة RESTful متينة.',
                'lead' => 'نبني منصات ويب فائقة السرعة، قابلة للتوسع ومصممة لتحقيق أهدافكم التجارية باستخدام Laravel وأحدث معايير الويب.',
                'deliverables' => [
                    'تطبيقات ويب مخصصة مبنية بأحدث إصدارات Laravel 11/12',
                    'لوحات تحكم إدارية مخصصة وعالية الأمان',
                    'واجهات برمجة تطبيقات موثقة بدقة (OpenAPI / Swagger)',
                    'ربط بوابات الدفع الإلكتروني (CMI، Stripe، PayPal)',
                    'تحسين الأداء والحصول على درجات تفوق 90+ على Google Lighthouse',
                ],
                'tech_stack' => ['Laravel', 'PHP 8+', 'PostgreSQL', 'MySQL', 'Tailwind CSS', 'Alpine.js / Vue', 'REST APIs', 'Docker'],
                'benefits' => [
                    'معمارية برمجية نقية تسهل التطوير والتوسع المستقبلي',
                    'أقصى درجات الأمان وحماية البيانات (CSRF، XSS، SQL Injections)',
                    'تجربة مستخدم فائقة السرعة والانسجام على كافة الشاشات',
                ],
            ],
            'mobile' => [
                'slug' => 'mobile',
                'number' => '02',
                'icon' => '◈',
                'title' => 'تطبيقات الجوال',
                'short_description' => 'تطبيقات أندرويد وتطبيقات متعددة المنصات مصممة بأعلى معايير الانسيابية وسهولة الاستخدام.',
                'lead' => 'تطبيقات هواتف تركز على البساطة، التجاوب الفوري دون اتصال بالإنترنت والمزامنة السحابية السلسة.',
                'deliverables' => [
                    'تطبيقات أندرويد أصلية (Native) مكتوبة بلغة Kotlin',
                    'تطبيقات مشتركة لنظامي iOS وأندرويد باستخدام Flutter',
                    'تكامل الإشعارات الفورية وتتبع الموقع الجغرافي اللحظي',
                    'دعم التصفح والمزامنة في وضع عدم الاتصال (Offline-First)',
                    'النشر والمتابعة على متجري Google Play وApple App Store',
                ],
                'tech_stack' => ['Kotlin', 'Flutter', 'Android SDK', 'Firebase', 'Cloudinary', 'REST APIs', 'Clean Architecture'],
                'benefits' => [
                    'حركات ورسوم سلسة بمعدل 60/120 إطاراً في الثانية',
                    'استهلاك منخفض للغاية للبطارية وبيانات الإنترنت',
                    'التزام صارم بإرشادات Material Design وiOS Human Interface',
                ],
            ],
            'data' => [
                'slug' => 'data',
                'number' => '03',
                'icon' => '◫',
                'title' => 'هندسة البيانات وذكاء الأعمال',
                'short_description' => 'مسارات معالجة البيانات ETL/ELT، نمذجة البيانات، لوحات القيادة التفاعلية وحوكمة البيانات.',
                'lead' => 'حوّل بياناتك الأولية إلى قرارات استراتيجية مدروسة عبر بنى بيانات حديثة ومستقرة.',
                'deliverables' => [
                    'خطوط معالجة وتحويل البيانات باستخدام Airflow وdbt',
                    'نمذجة البيانات بالطبقات المعتمدة (Bronze / Silver / Gold)',
                    'مستودعات بيانات سحابية متطورة (Snowflake، BigQuery، PostgreSQL)',
                    'لوحات مؤشرات أداء تفاعلية ومقاييس حية للأعمال',
                    'فحوصات جودة بيانات آلية وتنبيهات فورية للأخطاء',
                ],
                'tech_stack' => ['Python', 'Apache Airflow', 'dbt', 'Snowflake', 'BigQuery', 'PostgreSQL', 'Pandas', 'Metabase'],
                'benefits' => [
                    'مرجع موحد وموثوق لكافة قرارات أعمالك الاستراتيجية',
                    'أتمتة كاملة تقلل الأخطاء البشرية بنسبة جذرية',
                    'قدرة استيعابية لمعالجة ملايين الأحداث والعمليات دون تباطؤ',
                ],
            ],
            'ai' => [
                'slug' => 'ai',
                'number' => '04',
                'icon' => '✦',
                'title' => 'الذكاء الاصطناعي والأتمتة',
                'short_description' => 'دمج النماذج اللغوية الكبيرة LLM، الوكلاء الأذكياء، أتمتة الإجراءات ومعالجة الوثائق الذكية.',
                'lead' => 'وظّف الذكاء الاصطناعي التوليدي وأتمتة العمليات حيث تصنع قيمة تجارية ملموسة وعائداً حقيقياً.',
                'deliverables' => [
                    'دمج واجهات النماذج اللغوية الرائدة (OpenAI، Claude، Gemini)',
                    'بناء وكلاء أذكياء متصلين بمستندات وقواعد بيانات شركتكم (RAG)',
                    'أتمتة الإجراءات والمهام الروتينية (n8n، Make، نصوص Python)',
                    'استخراج ومعالجة الفواتير والملفات غير المنظمة آلياً',
                ],
                'tech_stack' => ['OpenAI API', 'Anthropic Claude', 'Gemini API', 'LangChain', 'LlamaIndex', 'FastAPI', 'n8n', 'Python'],
                'benefits' => [
                    'توفير هائل في الوقت والجهد المبذول في المهام المكررة',
                    'استجابة فورية لخدمة العملاء على مدار الساعة',
                    'بيئات عمل آمنة مع ضمان عدم تسريب أي بيانات حساسة',
                ],
            ],
            'seo' => [
                'slug' => 'seo',
                'number' => '05',
                'icon' => '◎',
                'title' => 'تحسين محركات البحث وسرعة الويب',
                'short_description' => 'تدقيق تقني شامل، تحسين مؤشرات الأداء الحيوية Core Web Vitals وبيانات Schema.org.',
                'lead' => 'عزز سرعة وبنية موقعك لتتصدر نتائج البحث الأولى وترفع معدلات التحويل للعملاء المحتملين.',
                'deliverables' => [
                    'تدقيق تقني مفصل (سرعة التحميل، الفهرسة، وميزانية الزحف)',
                    'تحسين أوقات التحميل لتنخفض دون 1.5 ثانية',
                    'تطبيق البيانات المنظمة والمعيارية Schema.org (JSON-LD)',
                    'استراتيجيات متكاملة للظهور المحلي والدولي لمحركات البحث',
                ],
                'tech_stack' => ['Google Search Console', 'Lighthouse', 'PageSpeed Insights', 'Schema.org', 'Sitemap XML', 'HTTP/3', 'CDN'],
                'benefits' => [
                    'نمو تدريجي ومستدام في حركة الزوار المستهدفين مجاناً',
                    'انخفاض معدل الارتداد بفضل التصفح الفوري دون انتظار',
                    'ارتفاع مباشر في معدلات التحويل والمبيعات',
                ],
            ],
            'design' => [
                'slug' => 'design',
                'number' => '06',
                'icon' => '◬',
                'title' => 'تصميم الواجهات وتجربة المستخدم (UI/UX)',
                'short_description' => 'ابتكار واجهات استخدام عصرية، أنظمة تصميم متكاملة ونماذج أولية تفاعلية وقابلة للاختبار.',
                'lead' => 'تجارب بصرية جذابة وسلسة، صُممت لتنال إعجاب عملائكم وتعكس الرقي والجودة العالية لعلامتكم.',
                'deliverables' => [
                    'ورش عمل لتحديد مسارات المستخدم واحتياجاته بدقة',
                    'أنظمة تصميم موحدة تشمل الألوان والخطوط والمكونات',
                    'نماذج Figma تفاعلية عالية الدقة للهواتف والشاشات الكبيرة',
                    'مخططات قابلة للاختبار السريع مع المستخدمين النهائيين',
                ],
                'tech_stack' => ['Figma', 'FigJam', 'Design Systems', 'Micro-interactions', 'Responsive Design', 'معايير WCAG'],
                'benefits' => [
                    'مسارات مستخدم واضحة ترفع من نسب إتمام الطلبات والتحويل',
                    'هوية بصرية استثنائية تعزز ثقة ومكانة علامتك التجارية',
                    'اختصار كبير لوقت وجهد فرق التطوير البرمجي',
                ],
            ],
        ];
    }

    /**
     * Tamazight data
     */
    protected static function dataTamazight(): array
    {
        return [
            'web' => [
                'slug' => 'web',
                'number' => '01',
                'icon' => '⌘',
                'title' => 'ⴰⵡⵉⴱ ⴷ Laravel',
                'short_description' => 'ⵉⵙⵉⵜⵏ ⵏ ⵓⵡⵉⴱ, ⵜⵉⵙⵏⵙⵉⵜⵉⵏ ⵏ SaaS, ⵜⴰⵙⴱⴱⴰⴱⵜ ⵜⴰⵎⵓⵟⵟⵓⵏⵜ ⴷ API RESTful.',
                'lead' => 'ⵏⵙⴽⴰⵔ ⵜⵉⵙⵏⵙⵉⵜⵉⵏ ⵏ ⵓⵡⵉⴱ ⵉⵣⵔⴱⵏ, ⵢⵓⵎⴰⵏ ⵉ ⴽⵓⵍⵍⵓ ⵉⵡⵜⵜⴰⵙⵏ ⵏⵏⵓⵏ ⵙ Laravel ⴷ ⵉⵍⵓⴳⴰⵏ ⵏ ⵓⵡⵉⴱ.',
                'deliverables' => [
                    'ⵜⵉⵙⵏⵙⵉⵜⵉⵏ ⵏ ⵓⵡⵉⴱ ⵙ Laravel 11/12',
                    'ⵜⵉⴼⵉⵍⵉⵏ ⵏ ⵓⵎⵙⵙⵓⴳⵓⵔ ⵉⵥⵉⵍⵏ ⴷ ⵢⵓⵎⴰⵏ',
                    'APIs RESTful ⵉⵜⵜⵓⵙⵏⵎⴰⵍⴰⵏ (OpenAPI / Swagger)',
                    'ⴰⵙⵉⴷⴼ ⵏ ⵜⵖⴰⵔⴰⵙⵉⵏ ⵏ ⵓⵙⵍⵍⴼ (CMI, Stripe, PayPal)',
                    'ⴰⵙⴱⵓⵖⵍⵓ ⵏ ⵜⵉⵣⵉ ⴷ ⵓⵙⴰⵍⴰⵢ Lighthouse 90+',
                ],
                'tech_stack' => ['Laravel', 'PHP 8+', 'PostgreSQL', 'MySQL', 'Tailwind CSS', 'Alpine.js / Vue', 'REST APIs', 'Docker'],
                'benefits' => [
                    'ⵜⴰⵎⵚⴽⵉⵡⵜ ⵜⴰⴼⴰⵡⵜ ⵉ ⵓⵙⵏⴼⵍ ⴳ ⵉⵎⴰⵍ',
                    'ⵜⴰⵏⴼⵔⵓⵜ ⵢⴰⵜⵜⵓⵢⵏ ⵎⴳⴰⵍ CSRF, XSS ⴷ SQL Injections',
                    'ⵜⵉⵣⵉ ⵜⵓⴷⴷⵉⵔⵜ ⴳ ⴽⵓⵍⵍⵓ ⵉⵎⵙⵙⵓⵔⴰ',
                ],
            ],
            'mobile' => [
                'slug' => 'mobile',
                'number' => '02',
                'icon' => '◈',
                'title' => 'ⵜⴰⵙⵏⵙⵉⵜⵉⵏ ⵏ ⵓⵎⵓⴱⴰⵢⵍ',
                'short_description' => 'ⵜⴰⵙⵏⵙⵉⵜⵉⵏ Android ⴷ ⵉⵎⵓⴱⴰⵢⵍⵏ ⵉⵥⵉⵍⵏ ⵙ ⵜⵉⵣⵉ ⴷ ⵓⴼⵙⵙⴰⵢ.',
                'lead' => 'ⵜⴰⵙⵏⵙⵉⵜⵉⵏ ⵏ ⵓⵎⵓⴱⴰⵢⵍ ⵉⵙⵡⵓⵔⵉⵏ ⵙ ⵓⵔⵎⴰⵙ, ⴱⵍⴰ ⴰⵥⵟⵟⴰ ⴷ ⵓⵙⵉⴷⴼ ⵙ ⵓⵙⵉⵍⵍⵡ.',
                'deliverables' => [
                    'ⵜⴰⵙⵏⵙⵉⵜⵉⵏ Android Native ⵙ Kotlin',
                    'ⵜⴰⵙⵏⵙⵉⵜⵉⵏ iOS ⴷ Android ⵙ Flutter',
                    'ⵉⵏⵖⵎⵉⵙⵏ ⵓⵙⵔⵉⴷⵏ (Push Notifications) ⴷ GPS',
                    'ⵜⴰⵡⵓⵔⵉ ⴱⵍⴰ ⴰⵥⵟⵟⴰ (Offline-First)',
                    'ⴰⵙⵙⵓⴼⵖ ⵖⵔ Google Play ⴷ App Store',
                ],
                'tech_stack' => ['Kotlin', 'Flutter', 'Android SDK', 'Firebase', 'Cloudinary', 'REST APIs', 'Clean Architecture'],
                'benefits' => [
                    'ⴰⵙⵎⵓⵙⵙⵓ ⵉⵥⵉⵍⵏ ⵙ 60/120 ⵉⴼⵔⴰⵡⵏ ⴳ ⵜⵙⵉⵏⵜ',
                    'ⵜⵉⴷⴷⵉ ⵜⴰⵎⵥⵢⴰⵏⵜ ⵏ ⵜⵔⵉⴽⵜ ⴷ ⵓⵥⵟⵟⴰ',
                    'ⴰⴹⴼⵓⵕ ⵏ ⵉⵍⵓⴳⴰⵏ Material Design ⴷ iOS Guidelines',
                ],
            ],
            'data' => [
                'slug' => 'data',
                'number' => '03',
                'icon' => '◫',
                'title' => 'ⵜⴰⵙⵏⵓⵔⴰⵢⵜ ⵏ ⵉⵙⴼⴽⴰ & BI',
                'short_description' => 'ⵉⴱⵔⴷⴰⵏ ETL/ELT, ⴰⵙⵏⵎⴰⵍⴰ ⵏ ⵉⵙⴼⴽⴰ, ⵜⵉⴼⵉⵍⵉⵏ ⵏ ⵓⵙⴼⵙⵉ ⴷ ⵜⵏⴼⵔⵓⵜ.',
                'lead' => 'ⵙⵏⴼⵍ ⵉⵙⴼⴽⴰ ⵏⵏⵓⵏ ⵖⵔ ⵜⵖⵜⴰⵙⵉⵏ ⵜⵉⵎⴰⴷⴷⵓⴷⵉⵏ ⵙ ⵜⵎⵚⴽⵉⵡⵜ ⵜⴰⵜⵔⴰⵔⵜ.',
                'deliverables' => [
                    'ⵉⴱⵔⴷⴰⵏ ⵏ ⵓⵙⵉⴷⴼ ⴷ ⵓⵙⵏⴼⵍ ⵙ Airflow ⴷ dbt',
                    'ⴰⵙⵏⵎⴰⵍⴰ ⵏ Bronze / Silver / Gold',
                    'ⵉⵎⵃⴹⴰⵏ ⵏ ⵉⵙⴼⴽⴰ (Snowflake, BigQuery, PostgreSQL)',
                    'ⵜⵉⴼⵉⵍⵉⵏ ⵏ ⵓⵙⴼⵙⵉ ⴷ ⵜⵙⵏⵎⴽⵜ ⵜⴰⴷⴷⵉⵔⵜ',
                    'ⵉⵔⵉⵎⵏ ⵏ ⵜⵖⴰⵔⴰ ⵏ ⵉⵙⴼⴽⴰ ⵙ ⵜⵖⴰⵔⴰⵙⵜ ⵜⴰⵡⵔⵎⴰⵏⵜ',
                ],
                'tech_stack' => ['Python', 'Apache Airflow', 'dbt', 'Snowflake', 'BigQuery', 'PostgreSQL', 'Pandas', 'Metabase'],
                'benefits' => [
                    'ⴰⵙⴰⴳⵎ ⵉⵎⴷⵏ ⵉ ⴽⵓⵍⵍⵓ ⵜⵉⵖⵜⴰⵙⵉⵏ ⵏⵏⵓⵏ',
                    'ⵜⴰⵡⵓⵔⵉ ⵜⴰⵡⵔⵎⴰⵏⵜ ⵉⵙⵙⵏⵇⵙⵏ ⵉⵣⴳⴰⵍⵏ',
                    'ⵜⵉⵣⵎⵎⴰⵔ ⵏ ⵓⵙⴼⵙⵉ ⵏ ⵎⵍⵢⵓⵏ ⵏ ⵉⵙⴼⴽⴰ ⴱⵍⴰ ⵜⴰⵥⵉⵜ',
                ],
            ],
            'ai' => [
                'slug' => 'ai',
                'number' => '04',
                'icon' => '✦',
                'title' => 'ⵜⵉⵎⵙⴽⵔⵜ ⵜⴰⵏⵎⵍⴰⵏⵜ & AI',
                'short_description' => 'ⴰⵙⵉⴷⴼ ⵏ LLM, ⵉⵙⵎⴷⵢⴰⵜⵏ ⵉⵏⵎⵍⴰⵏⵏ, ⴰⵙⵡⵓⵔⵉ ⴰⵡⵔⵎⴰⵏ ⴷ ⵓⵙⴼⵙⵉ ⵏ ⵡⴰⵔⵔⴰⵜⵏ.',
                'lead' => 'ⵙⵎⵔⵙ AI ⵜⴰⵎⵙⵏⵓⵍⴼⵓⵜ ⴷ ⵜⵡⵓⵔⵉ ⵜⴰⵡⵔⵎⴰⵏⵜ ⴳ ⵎⴰⵏⵉ ⵜⵍⵍⴰ ⵜⵎⵓⵔⵙⵜ ⵜⴰⴷⴰⵎⵙⴰⵏⵜ.',
                'deliverables' => [
                    'ⴰⵙⵉⴷⴼ ⵏ APIs ⵏ OpenAI, Claude ⴷ Gemini',
                    'ⵉⵙⵎⴷⵢⴰⵜⵏ ⵉⵏⵎⵍⴰⵏⵏ ⵉⵇⵇⵏⵏ ⵖⵔ ⵡⴰⵔⵔⴰⵜⵏ ⵏⵏⵓⵏ (RAG)',
                    'ⴰⵙⵡⵓⵔⵉ ⴰⵡⵔⵎⴰⵏ ⵏ ⵜⵎⵙⴽⵔⵉⵏ (n8n, Make, Python)',
                    'ⴰⵙⵙⵓⴼⵖ ⵏ ⵉⵙⴼⴽⴰ ⵙⴳ PDF ⴷ ⵡⴰⵔⵔⴰⵜⵏ ⵙ ⵜⵉⵇⵏⵉⵜ',
                ],
                'tech_stack' => ['OpenAI API', 'Anthropic Claude', 'Gemini API', 'LangChain', 'LlamaIndex', 'FastAPI', 'n8n', 'Python'],
                'benefits' => [
                    'ⴰⴽⵓⴷ ⵉⵎⵇⵇⵕⴰⵏ ⵉⵜⵜⵓⴼⴽⴰⵏ ⴳ ⵜⵡⵓⵔⵉⵡⵉⵏ ⵜⵉⵡⵔⵎⴰⵏⵉⵏ',
                    'ⴰⵔⴰⵔ ⵉⵣⵔⴱⵏ ⵉ ⵉⵎⵙⴰⵖⵏ 24/7',
                    'ⵜⴰⵏⴼⵔⵓⵜ ⵜⴰⵎⴰⴷⴷⵓⴷⵜ ⵏ ⵉⵙⴼⴽⴰ ⴱⵍⴰ ⴰⴼⵓⵖ',
                ],
            ],
            'seo' => [
                'slug' => 'seo',
                'number' => '05',
                'icon' => '◎',
                'title' => 'SEO ⴷ ⵜⵉⵣⵉ ⵏ ⵓⵡⵉⴱ',
                'short_description' => 'ⴰⵙⴼⵙⵉ ⴰⵜⵉⵇⵏⵉ, Core Web Vitals, Schema.org ⴷ ⵓⵙⴰⵍⴰⵢ ⴳ Google.',
                'lead' => 'ⵙⴱⵓⵖⵍⵓ ⵜⵉⵣⵉ ⴷ ⵜⵎⵚⴽⵉⵡⵜ ⵏ ⵓⵙⵉⵜ ⵏⵏⵓⵏ ⴰⴷ ⵜⴳⵉⵎ ⵉⵎⵣⵡⵓⵔⴰ ⴳ ⵓⵙⵉⴳⴳⵍ.',
                'deliverables' => [
                    'ⴰⵙⴼⵙⵉ ⴰⵜⵉⵇⵏⵉ ⵉⵎⴷⵏ (Core Web Vitals, indexability)',
                    'ⵜⵉⵣⵉ ⵏ ⵓⵙⵉⴷⴼ ⴷⴷⴰⵡ 1.5 ⵜⵙⵉⵏⵜ',
                    'ⴰⵙⵉⴷⴼ ⵏ Schema.org (JSON-LD)',
                    'ⵜⴰⵙⵔⵜⵉⵜ ⵏ SEO ⴳ ⵍⵎⵖⵔⵉⴱ ⴷ ⵓⵎⴰⴹⴰⵍ',
                ],
                'tech_stack' => ['Google Search Console', 'Lighthouse', 'PageSpeed Insights', 'Schema.org', 'Sitemap XML', 'HTTP/3', 'CDN'],
                'benefits' => [
                    'ⵜⵉⵎⵔⵏⵉⵡⵜ ⵜⴰⵎⵖⵍⴰⵍⵜ ⵏ ⵉⵎⵣⴰⵔⴰⵢⵏ ⴱⵍⴰ ⴰⵇⴰⵔⵉⴹ',
                    'ⴰⵙⵏⵇⵙ ⵏ ⵓⴼⵓⵖ ⵙ ⵜⵉⵣⵉ ⵜⵓⴷⴷⵉⵔⵜ',
                    'ⵜⴰⵎⵓⵔⵙⵜ ⵢⴰⵜⵜⵓⵢⵏ ⴳ ⵓⵎⵓⴱⴰⵢⵍ ⴷ ⵓⵙⵍⴽⵉⵎ',
                ],
            ],
            'design' => [
                'slug' => 'design',
                'number' => '06',
                'icon' => '◬',
                'title' => 'UI / UX Design ⴷ ⵜⵡⵏⴳⵉⵎⵉⵏ',
                'short_description' => 'ⴰⵙⵓⵏⵖ ⵏ ⵓⴷⵎ ⵏ ⵜⵙⵏⵙⵉⵜⵉⵏ, Design Systems ⴷ ⵉⵎⴷⵢⴰⵜⵏ ⵉⵜⵜⵓⵙⴽⴰⵔⵏ.',
                'lead' => 'ⵉⵎⵓⵙⵙⵓⵜⵏ ⵉⵥⵉⵍⵏ ⵉⵙⵙⴼⵔⴰⵃⵏ ⵉⵎⵙⵙⵎⵔⴰⵙ ⴷ ⵉⵙⵙⴽⴰⵏⵏ ⵜⵉⵥⵉⴹⵕⴰ ⵏ ⵜⵎⵙⵙⵓⵔⵜ ⵏⵏⵓⵏ.',
                'deliverables' => [
                    'ⵜⵉⵎⵍⵉⵍⵉⵜⵉⵏ ⵏ UX ⴷ ⵓⴱⵔⵉⴷ ⵏ ⵓⵎⵙⵙⵎⵔⵙ',
                    'Design Systems ⵉⵎⴷⵏ (ⵉⴽⵯⵍⴰⵏ, ⵜⵉⵔⵔⴰ, ⵉⴳⵣⵎⴰⵏ)',
                    'ⵉⵎⴷⵢⴰⵜⵏ Figma ⵉⵜⵜⵓⵙⴽⴰⵔⵏ ⵉ ⵓⵎⵓⴱⴰⵢⵍ ⴷ ⵓⵙⵍⴽⵉⵎ',
                    'ⵉⵔⵉⵎⵏ ⵉⵍⴰⵡⴰⵏ ⴷ ⵉⵎⵙⵙⵎⵔⴰⵙ',
                ],
                'tech_stack' => ['Figma', 'FigJam', 'Design Systems', 'Micro-interactions', 'Responsive Design', 'WCAG Accessibility'],
                'benefits' => [
                    'ⵜⴰⴼⴰⵡⵜ ⵜⴰⵎⴰⴷⴷⵓⴷⵜ ⵉ ⵓⵎⵓⵔⵙ ⵏ ⵜⵙⵏⵙⵉⵜ',
                    'ⴰⴷⵎ ⵉⵥⵉⵍⵏ ⵉⵙⵙⵉⵎⵖⵓⵔⵏ ⵜⴰⴼⵍⵙⵜ',
                    'ⴰⴽⵓⴷ ⵉⵎⵇⵇⵕⴰⵏ ⵉⵜⵜⵓⴼⵔⴰⵏ ⵉ ⵉⵎⵙⴽⴰⵔⵏ',
                ],
            ],
        ];
    }
}
