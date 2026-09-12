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

        // 6. Navigation Menus
        $menus = [
            ['title' => 'Accueil', 'url' => '/', 'order' => 1],
            ['title' => 'Réalisations', 'url' => '#portfolio', 'order' => 2],
            ['title' => 'Nos Expertises', 'url' => '#offres', 'order' => 3],
            ['title' => 'Estimer un Projet', 'url' => '#estimateur', 'order' => 4],
            ['title' => 'L\'Équipe', 'url' => '#equipe', 'order' => 5],
            ['title' => 'FAQ', 'url' => '#faq', 'order' => 6],
            ['title' => 'Contact', 'url' => '#contact', 'order' => 7],
        ];

        Menu::truncate();
        foreach ($menus as $m) {
            Menu::create($m);
        }
    }
}


