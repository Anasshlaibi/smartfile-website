<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Page;
use App\Models\Menu;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::firstOrCreate(
            ['email' => 'admin@smartfilms.com'],
            [
                'name' => 'Directeur SmartFilms',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Settings
        $settings = [
            'site_name' => 'SmartFilms Prod',
            'phone' => '+212 6 17 20 23 45',
            'email' => 'contact@smartfilmsprod.com',
            'address' => '130 Bv d\'Anfa, 20300 Casablanca, Maroc',
            'whatsapp' => '+212617202345',
            'instagram' => 'https://instagram.com/smartfilmsprod',
            'linkedin' => 'https://linkedin.com/company/smartfilmsprod',
            'showreel_video' => '/uploads/hero_youtube.mp4',
            'ga4_id' => 'G-SF2026CASABLANCA',
        ];

        foreach ($settings as $k => $v) {
            Setting::set($k, $v);
        }

        // 3. Projects (Case Studies)
        $projects = [
            [
                'title' => 'Empowering Digital Leaders',
                'slug' => 'dell-technologies-empowering-digital',
                'client_name' => 'DELL Technologies',
                'category' => 'Film Corporate',
                'video_url' => 'https://www.youtube.com/embed/_yWLYCiW1Z8',
                'video_type' => 'youtube',
                'thumbnail' => '/uploads/cinema_corporate_film.png',
                'description' => 'Film institutionnel de haute volée mettant en valeur les infrastructures cloud et l\'innovation technologique au Maroc et en Afrique.',
                'duration' => '02:45',
                'year' => '2026',
                'metrics' => 'Diffusion C-Level & Salons Tech',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'De la Terre à la Table',
                'slug' => 'danone-de-la-terre-a-la-table',
                'client_name' => 'DANONE Maroc',
                'category' => 'Spot Publicitaire',
                'video_url' => 'https://www.youtube.com/embed/_yWLYCiW1Z8',
                'video_type' => 'youtube',
                'thumbnail' => '/uploads/studio_commercial_spot.png',
                'description' => 'Spot publicitaire cinématographique célébrant les éleveurs partenaires et la fraîcheur des produits à travers tout le Royaume.',
                'duration' => '00:45',
                'year' => '2026',
                'metrics' => '+3.8M Vues Digitales & TV',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Hub Maritime Mondial',
                'slug' => 'tanger-alliance-hub-maritime',
                'client_name' => 'Tanger Alliance',
                'category' => 'Drone 4K',
                'video_url' => 'https://www.youtube.com/embed/_yWLYCiW1Z8',
                'video_type' => 'youtube',
                'thumbnail' => '/uploads/cinema_corporate_film.png',
                'description' => 'Captation aérienne FPV et cinéma 8K du terminal à conteneurs du détroit de Gibraltar. Une immersion spectaculaire dans la logistique mondiale.',
                'duration' => '01:30',
                'year' => '2025',
                'metrics' => 'Captation FPV & 8K Cinema',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'title' => 'L\'Audace d\'Entreprendre',
                'slug' => 'bcp-l-audace-d-entreprendre',
                'client_name' => 'BCP International',
                'category' => 'Film Corporate',
                'video_url' => 'https://www.youtube.com/embed/_yWLYCiW1Z8',
                'video_type' => 'youtube',
                'thumbnail' => '/uploads/studio_commercial_spot.png',
                'description' => 'Récit humain et dynamique valorisant les entrepreneurs marocains accompagnés par la Banque Centrale Populaire.',
                'duration' => '03:10',
                'year' => '2025',
                'metrics' => 'Campagne Marque Employeur',
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'title' => 'L\'Énergie en Mouvement',
                'slug' => 'ingelec-l-energie-en-mouvement',
                'client_name' => 'Ingelec',
                'category' => 'Spot Publicitaire',
                'video_url' => 'https://www.youtube.com/embed/_yWLYCiW1Z8',
                'video_type' => 'youtube',
                'thumbnail' => '/uploads/cinema_corporate_film.png',
                'description' => 'Spot de marque rythmé mettant en avant l\'excellence industrielle et la qualité de l\'appareillage électrique marocain.',
                'duration' => '01:00',
                'year' => '2025',
                'metrics' => 'Campagne 360 & TV',
                'is_featured' => true,
                'order' => 5,
            ],
            [
                'title' => 'L\'Ingénierie de Précision',
                'slug' => 'flowpipe-ingenierie-de-precision',
                'client_name' => 'FlowPipe Plastima',
                'category' => 'Documentaire & RSE',
                'video_url' => 'https://www.youtube.com/embed/_yWLYCiW1Z8',
                'video_type' => 'youtube',
                'thumbnail' => '/uploads/studio_commercial_spot.png',
                'description' => 'Documentaire technique immersif sur les procédés d\'extrusion industrielle et l\'engagement pour le développement durable.',
                'duration' => '04:15',
                'year' => '2025',
                'metrics' => 'Reportage Industriel & Salons',
                'is_featured' => true,
                'order' => 6,
            ],
        ];

        foreach ($projects as $p) {
            Project::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // 4. Team Members
        $team = [
            [
                'name' => 'Yassine Benkirane',
                'role' => 'Fondateur & Producteur Exécutif',
                'photo' => '/uploads/cinema_corporate_film.png',
                'bio' => '+12 ans d\'expérience dans la production cinématographique et publicitaire à Casablanca et Paris.',
                'linkedin' => 'https://linkedin.com',
                'order' => 1,
            ],
            [
                'name' => 'Mehdi Alami',
                'role' => 'Directeur de la Photographie & Télépilote Drone FPV',
                'photo' => '/uploads/studio_commercial_spot.png',
                'bio' => 'Spécialiste des caméras RED/ARRI et des prises de vues aériennes spectaculaires certifiées.',
                'linkedin' => 'https://linkedin.com',
                'order' => 2,
            ],
            [
                'name' => 'Sofia Tazi',
                'role' => 'Directrice Artistique & Scénariste',
                'photo' => '/uploads/cinema_corporate_film.png',
                'bio' => 'Créatrice d\'univers visuels forts et de récits de marque qui captivent et convertissent.',
                'linkedin' => 'https://linkedin.com',
                'order' => 3,
            ],
            [
                'name' => 'Amine Chraibi',
                'role' => 'Chef Monteur & Coloriste Étalonneur',
                'photo' => '/uploads/studio_commercial_spot.png',
                'bio' => 'Expert DaVinci Resolve, il façonne le look cinématographique propre à chaque film SmartFilms.',
                'linkedin' => 'https://linkedin.com',
                'order' => 4,
            ],
        ];

        foreach ($team as $t) {
            TeamMember::updateOrCreate(['name' => $t['name']], $t);
        }

        // 5. Default Accueil Page with Full Modern Blocks
        Page::updateOrCreate(
            ['slug' => 'accueil'],
            [
                'title' => 'Accueil - SmartFilms Prod',
                'meta_title' => 'SmartFilms Prod | Agence de Production Audiovisuelle & Films d\'Entreprise Casablanca',
                'meta_description' => 'SmartFilms Prod est l\'agence de production audiovisuelle de référence à Casablanca : films d\'entreprise 4K, spots publicitaires, prises de vues par drone et storytelling cinématographique pour les grandes marques au Maroc.',
                'is_active' => true,
                'content' => [
                    [
                        'type' => 'rembrand_hero',
                        'props' => [
                            'subtitle' => 'AGENCE DE PRODUCTION AUDIOVISUELLE & FILMS DE MARQUE',
                            'prefixText' => 'agence de production',
                            'title' => 'SMART FILMS PROD',
                            'description' => 'Nous façonnons des récits cinématographiques à fort impact pour sublimer la réputation de votre entreprise et captiver vos audiences à Casablanca, au Maroc et à l\'international.',
                            'btnText' => 'Démarrer votre projet',
                            'btnLink' => '#estimateur',
                            'showreelText' => 'Voir le Showreel 2026',
                            'bgColor' => '#F8F9FC',
                            'paddingTop' => '30',
                            'paddingBottom' => '30',
                        ],
                    ],
                    [
                        'type' => 'rembrand_client_logos',
                        'props' => [
                            'title' => 'ILS NOUS FONT CONFIANCE',
                            'bgColor' => '#F8F9FC',
                            'paddingTop' => '50',
                            'paddingBottom' => '50',
                        ],
                    ],
                    [
                        'type' => 'video_portfolio_showcase',
                        'props' => [
                            'title' => 'RÉALISATIONS',
                            'subtitle' => 'Explorez notre sélection de films d\'entreprise, spots publicitaires et captations 4K livrés pour les plus grandes marques.',
                            'bgColor' => '#0F1123',
                            'paddingTop' => '90',
                            'paddingBottom' => '90',
                        ],
                    ],
                    [
                        'type' => 'rembrand_offres',
                        'props' => [
                            'title' => 'NOS',
                            'titleItalic' => 'expertises',
                            'subtitle' => 'Quatre savoir-faire d\'exception pour donner à votre marque une longueur d\'avance.',
                            'bgColor' => '#141632',
                            'paddingTop' => '90',
                            'paddingBottom' => '90',
                        ],
                    ],
                    [
                        'type' => 'interactive_estimator',
                        'props' => [
                            'title' => 'ESTIMEZ VOTRE',
                            'titleItalic' => 'projet audiovisuel',
                            'subtitle' => 'Configurez votre besoin en 4 étapes simples et recevez une estimation personnalisée sous 24h ouvrées.',
                            'bgColor' => '#F8F9FC',
                            'paddingTop' => '90',
                            'paddingBottom' => '90',
                        ],
                    ],
                    [
                        'type' => 'rembrand_mission',
                        'props' => [
                            'text' => 'Les organisations qui marquent les esprits ont besoin d\'histoires cinématographiques fortes. Chez SmartFilms Prod, nous conjuguons la précision technique du cinéma avec une vision stratégique des enjeux de votre entreprise.',
                            'bgColor' => '#F8F9FC',
                            'paddingTop' => '90',
                            'paddingBottom' => '90',
                        ],
                    ],
                    [
                        'type' => 'team_showcase',
                        'props' => [
                            'title' => 'CEUX QUI FONT',
                            'titleItalic' => 'smartfilms',
                            'subtitle' => 'Une équipe de passionnés du 7ème art, directeurs de la photographie, cadreurs et étalonneurs dévoués à l\'excellence de votre image.',
                            'bgColor' => '#0F1123',
                            'paddingTop' => '90',
                            'paddingBottom' => '90',
                        ],
                    ],
                    [
                        'type' => 'rembrand_faq',
                        'props' => [
                            'bgColor' => '#141632',
                            'paddingTop' => '90',
                            'paddingBottom' => '90',
                        ],
                    ],
                    [
                        'type' => 'rembrand_contact',
                        'props' => [
                            'bgColor' => '#F8F9FC',
                            'paddingTop' => '90',
                            'paddingBottom' => '90',
                        ],
                    ],
                ],
            ]
        );

        // 7. Expertises (CMS Database Model)
        $expertises = [
            [
                'title' => 'Film Corporate & Institutionnel',
                'slug' => 'film-corporate',
                'subtitle' => 'Maison de Production Audiovisuelle Casablanca',
                'seo_title' => 'Film Corporate & Institutionnel Casablanca | SmartFilms Prod Maroc',
                'seo_description' => 'Production de films corporate haut de gamme à Casablanca et au Maroc. Valorisez vos infrastructures, vos équipes et votre vision stratégique avec une esthétique cinématographique.',
                'h1' => 'FILM CORPORATE & INSTITUTIONNEL',
                'hero_desc' => 'Racontez l\'ambition de votre entreprise à travers un storytelling cinématographique puissant et des prises de vues d\'infrastructures d\'exception.',
                'image' => '/uploads/cinema_corporate_film.png',
                'deliverables' => [
                    'Film institutionnel master 4K (2 à 5 minutes)',
                    'Teasers réseaux sociaux 9:16 pour LinkedIn et Instagram',
                    'Interviews des dirigeants & collaborateurs clés',
                    'Banque de plans B-Roll haute fidélité'
                ],
                'equipment' => [
                    'Configurations caméras cinéma calibrées selon les besoins',
                    'Optiques Cinéma Anamorphiques & Sphériques',
                    'Prises de vues aériennes drone 4K/6K',
                    'Éclairage Studio & Gestion lumière continue'
                ],
                'category_filter' => 'Film de Marque',
                'faq' => [
                    [
                        'q' => 'Combien de temps faut-il pour produire un film corporate ?',
                        'a' => 'En moyenne, une production corporate complète nécessite entre 2 à 4 semaines, incluant l\'écriture du scénario, le tournage (1 à 3 jours) et la post-production (montage, étalonnage, sound design).'
                    ],
                    [
                        'q' => 'SmartFilms intervient-il partout au Maroc ?',
                        'a' => 'Oui. Bien que notre studio soit basé à Casablanca (Bd d\'Anfa), nos équipes régie et caméras tournent régulièrement à Rabat, Tanger, Marrakech, Agadir et sur des sites industriels dans tout le Royaume.'
                    ],
                    [
                        'q' => 'Accompagnez-vous les démarches d\'autorisations de tournage au Maroc ?',
                        'a' => 'Absolument. Nous accompagnons nos clients dans l\'obtention et la coordination des autorisations administratives nécessaires auprès des autorités compétentes pour sécuriser chaque tournage.'
                    ]
                ],
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Spot Publicitaire & Commercial',
                'slug' => 'spot-publicitaire',
                'subtitle' => 'Campagnes TV, Cinéma & Formats Digitaux',
                'seo_title' => 'Spot Publicitaire & Publicité TV/Digitale Casablanca | SmartFilms Maroc',
                'seo_description' => 'Création et réalisation de spots publicitaires percutants à Casablanca. Diffusion TV, cinéma et réseaux sociaux calibrée pour maximiser l\'impact et la mémorisation.',
                'h1' => 'SPOTS PUBLICITAIRES & BRAND FILMS',
                'hero_desc' => 'Des concepts publicitaires audacieux, des castings rigoureux et une réalisation millimétrée pour imposer votre marque dans l\'esprit du public.',
                'image' => '/uploads/studio_commercial_spot.png',
                'deliverables' => [
                    'Spots TV & Cinéma broadcast masters 4K (15s, 30s, 60s)',
                    'Déclinaisons digitales dynamiques (Story, Reel, YouTube Ads)',
                    'Sound design immersif et composition musicale originale',
                    'Voice-over multilingue (Arabe Darija, Français, Anglais)'
                ],
                'equipment' => [
                    'Caméras Haute Vitesse & Slow-Motion',
                    'Machinerie travelling & Stabilisation 3 axes',
                    'Production sonore & Mixage multicanal broadcast',
                    'Étalonnage couleur DaVinci Resolve Studio HDR'
                ],
                'category_filter' => 'Publicité TV',
                'faq' => [
                    [
                        'q' => 'Comment se déroule la conception d\'un spot publicitaire ?',
                        'a' => 'Nous commençons par l\'élaboration du concept créatif et du storyboard, suivi du casting, du stylisme et du repérage des décors. Après validation, nous orchestrons le tournage et la post-production complète.'
                    ],
                    [
                        'q' => 'Pouvez-vous adapter le spot pour TikTok et Instagram Reels ?',
                        'a' => 'Oui. Dès la phase de cadrage, nous anticipons les cadrages 9:16 et 1:1 pour livrer des déclinaisons natives parfaitement adaptées aux algorithmes des réseaux sociaux.'
                    ]
                ],
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Production & Captation Événementielle',
                'slug' => 'production-evenementielle',
                'subtitle' => 'Congrès, Sommets Internationaux & Galas',
                'seo_title' => 'Captation Événementielle & Aftermovie Casablanca | SmartFilms Maroc',
                'seo_description' => 'Couverture audiovisuelle haut de gamme pour sommets internationaux, lancements de produits et galas au Maroc. Régie multi-caméras 4K et aftermovies percutants.',
                'h1' => 'CAPTATION & PRODUCTION ÉVÉNEMENTIELLE',
                'hero_desc' => 'Immortalisez vos grands rendez-vous professionnels avec une régie multi-caméras 4K fluide et des aftermovies rythmés livrés en un temps record.',
                'image' => '/uploads/cinema_corporate_film.png',
                'deliverables' => [
                    'Aftermovie officiel dynamique (2 à 3 minutes)',
                    'Teaser Same-Day Edit (livré pendant l\'événement)',
                    'Captation intégrale des keynotes & tables rondes',
                    'Diffusion en direct live streaming multi-plateformes'
                ],
                'equipment' => [
                    'Régie vidéo broadcast 4K',
                    'Systèmes de transmission HF sans fil longue portée',
                    'Caméras PTZ robotisées & tourelles',
                    'Prise de son HF professionnelle Sennheiser'
                ],
                'category_filter' => 'Événementiel',
                'faq' => [
                    [
                        'q' => 'Pouvez-vous livrer une vidéo le jour même de l\'événement ?',
                        'a' => 'Oui. Grâce à notre régie de montage nomade sur site, nous produisons des teasers "Same-Day" en quelques heures pour alimenter vos réseaux sociaux en temps réel.'
                    ],
                    [
                        'q' => 'Comment est dimensionnée l\'équipe technique sur un événement ?',
                        'a' => 'Selon l\'envergure du projet, nos équipes événementielles sont calibrées sur-mesure (cadreurs, télépilote, ingénieur son, réalisation régie et monteur sur site).'
                    ]
                ],
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Prise de Vue Drone 4K/6K & FPV',
                'slug' => 'drone-aerien',
                'subtitle' => 'Captations Aériennes & Télépilotes Agréés',
                'seo_title' => 'Prise de Vue par Drone 4K/6K & FPV Maroc | SmartFilms Prod',
                'seo_description' => 'Images aériennes spectaculaires par drone et FPV à Casablanca et au Maroc. Télépilotes certifiés, conformité réglementaire et qualité cinéma.',
                'h1' => 'PRISES DE VUES AÉRIENNES & DRONE FPV',
                'hero_desc' => 'Prenez de la hauteur avec des perspectives aériennes spectaculaires. Drones cinéma stabilisés et drones FPV de précision pour valoriser vos sites industriels et projets d\'envergure.',
                'image' => '/uploads/studio_commercial_spot.png',
                'deliverables' => [
                    'Plans aériens cinématiques 4K/6K Prores & RAW',
                    'Plans séquences FPV immersifs intérieur/extérieur',
                    'Survols d\'infrastructures et d\'aménagements',
                    'Intégration directe dans vos films de marque'
                ],
                'equipment' => [
                    'Drones cinéma professionnels haute définition',
                    'Drones FPV agiles pour plans dynamiques',
                    'Systèmes de double commande pilote / cadreur',
                    'Capteurs stabilisés sur 3 axes'
                ],
                'category_filter' => 'Drone',
                'faq' => [
                    [
                        'q' => 'Les vols par drone sont-ils conformes à la réglementation au Maroc ?',
                        'a' => 'Oui. Nos vols sont encadrés par des télépilotes qualifiés avec l\'ensemble des autorisations administratives et protocoles de sécurité requis pour chaque mission.'
                    ],
                    [
                        'q' => 'Quelle est la différence entre un drone classique et un drone FPV ?',
                        'a' => 'Le drone classique offre des plans larges et stables à haute altitude. Le drone FPV (First Person View) permet des trajectoires dynamiques, des passages étroits en intérieur et des sensations de vitesse uniques.'
                    ]
                ],
                'order' => 4,
                'is_active' => true,
            ]
        ];

        \App\Models\Expertise::truncate();
        foreach ($expertises as $exp) {
            \App\Models\Expertise::create($exp);
        }
    }
}


