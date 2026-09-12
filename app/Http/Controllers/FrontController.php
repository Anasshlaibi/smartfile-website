<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    private function getCommonData()
    {
        return [
            'menus' => Menu::whereNull('parent_id')->orderBy('order')->with('children.children')->get(),
            'settings' => [
                'phone' => Setting::get('phone', '+212 6 17 20 23 45'),
                'email' => Setting::get('email', 'contact@smartfilmsprod.com'),
                'address' => Setting::get('address', '130 Bv d\'Anfa, 20300 Casablanca, Maroc'),
                'whatsapp' => Setting::get('whatsapp', '212617202345'),
            ]
        ];
    }

    /**
     * Homepage - Cinematic Production Studio Experience
     */
    public function index()
    {
        $page = Page::where('slug', 'accueil')->where('is_active', true)->first();
        if (!$page) {
            $page = new Page([
                'title' => 'Accueil',
                'slug' => 'accueil',
                'meta_title' => 'SmartFilms Prod | Production Audiovisuelle à Casablanca & Maroc',
                'meta_description' => 'SmartFilms Prod est une maison de production audiovisuelle à Casablanca spécialisée en films corporate, publicité, événementiel, contenus de marque et prises de vues aériennes au Maroc.',
                'content' => []
            ]);
        }

        $projects = Project::where('is_published', true)->orderBy('order')->get();
        if ($projects->isEmpty()) {
            $projects = Project::orderBy('order')->get();
        }
        
        $featuredProject = $projects->where('is_featured', true)->first() ?? $projects->first();
        $teamMembers = TeamMember::orderBy('order')->get();
        $categories = $projects->pluck('category')->unique()->filter()->values();

        $common = $this->getCommonData();
        $menus = $common['menus'];
        $settings = $common['settings'];

        return view('front.page', compact('page', 'menus', 'projects', 'featuredProject', 'teamMembers', 'categories', 'settings'));
    }

    /**
     * Dedicated Portfolio / Réalisations Gallery
     */
    public function portfolio()
    {
        $projects = Project::where('is_published', true)->orderBy('order')->get();
        if ($projects->isEmpty()) {
            $projects = Project::orderBy('order')->get();
        }
        $categories = $projects->pluck('category')->unique()->filter()->values();
        $common = $this->getCommonData();

        return view('front.portfolio', [
            'projects' => $projects,
            'categories' => $categories,
            'menus' => $common['menus'],
            'settings' => $common['settings']
        ]);
    }

    /**
     * Individual Film Case Study
     */
    public function projectShow($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $nextProject = Project::where('id', '>', $project->id)->orderBy('id', 'asc')->first()
            ?? Project::orderBy('id', 'asc')->first();

        $common = $this->getCommonData();

        return view('front.project-show', [
            'project' => $project,
            'nextProject' => $nextProject,
            'menus' => $common['menus'],
            'settings' => $common['settings']
        ]);
    }

    /**
     * Expertises Overview Hub (/expertises)
     */
    public function expertises()
    {
        $common = $this->getCommonData();
        $projects = Project::where('is_published', true)->orderBy('order')->take(6)->get();

        return view('front.expertises.index', [
            'menus' => $common['menus'],
            'settings' => $common['settings'],
            'projects' => $projects
        ]);
    }

    /**
     * Dedicated Expertise Landing Page (/expertises/{slug})
     */
    public function expertiseDetail($slug)
    {
        $expertisesList = [
            'film-corporate' => [
                'title' => 'Film Corporate & Institutionnel',
                'subtitle' => 'Maison de Production Audiovisuelle Casablanca',
                'meta_title' => 'Film Corporate & Institutionnel Casablanca | SmartFilms Prod Maroc',
                'meta_description' => 'Production de films corporate haut de gamme à Casablanca et au Maroc. Valorisez vos infrastructures, vos équipes et votre vision stratégique avec une esthétique cinématographique.',
                'h1' => 'FILM CORPORATE & INSTITUTIONNEL',
                'hero_desc' => 'Racontez l\'ambition de votre entreprise à travers un storytelling cinématographique puissant et des prises de vues d\'infrastructures d\'exception.',
                'image' => '/uploads/cinema_corporate_film.png',
                'deliverables' => [
                    'Film institutionnel master 4K (2 à 5 minutes)',
                    'Teasers réseaux sociaux 9:16 pour LinkedIn et Instagram',
                    'Interviews des dirigeants & collaborateurs clés',
                    'Banque de plans B-Roll haute fidélité'
                ],
                'equipment' => ['RED V-Raptor 8K & Arri Alexa', 'Optiques Cinéma Anamorphiques', 'Drone 8K certifié DGAC', 'Éclairage Studio Aputure / Nanlite'],
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
                        'q' => 'Fournissez-vous les autorisations de tournage au Maroc ?',
                        'a' => 'Absolument. Nous prenons en charge l\'ensemble des démarches administratives auprès du Centre Cinématographique Marocain (CCM) et des autorités locales pour sécuriser le tournage.'
                    ]
                ]
            ],
            'spot-publicitaire' => [
                'title' => 'Spot Publicitaire & Commercial',
                'subtitle' => 'Campagnes TV, Cinéma & Formats Digitaux',
                'meta_title' => 'Spot Publicitaire & Publicité TV/Digitale Casablanca | SmartFilms Maroc',
                'meta_description' => 'Création et réalisation de spots publicitaires percutants à Casablanca. Diffusion TV, cinéma et réseaux sociaux calibrée pour maximiser l\'impact et la mémorisation.',
                'h1' => 'SPOTS PUBLICITAIRES & BRAND FILMS',
                'hero_desc' => 'Des concepts publicitaires audacieux, des castings rigoureux et une réalisation millimétrée pour imposer votre marque dans l\'esprit du public.',
                'image' => '/uploads/studio_commercial_spot.png',
                'deliverables' => [
                    'Spots TV & Cinéma broadcast masters 4K (15s, 30s, 60s)',
                    'Déclinaisons digitales dynamiques (Story, Reel, YouTube Ads)',
                    'Sound design immersif et composition musicale originale',
                    'Voice-over multilingue (Arabe Darija, Français, Anglais)'
                ],
                'equipment' => ['Caméras High-Speed 240fps', 'Machinerie travelling & Gimbal Ronin 2', 'Studio son & mixage Dolby Atmos', 'Étalonnage DaVinci Studio HDR'],
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
                ]
            ],
            'production-evenementielle' => [
                'title' => 'Production & Captation Événementielle',
                'subtitle' => 'Congrès, Sommets Internationaux & Galas',
                'meta_title' => 'Captation Événementielle & Aftermovie Casablanca | SmartFilms Maroc',
                'meta_description' => 'Couverture audiovisuelle haut de gamme pour sommets internationaux, lancements de produits et galas au Maroc. Régie multi-caméras 4K et aftermovies percutants.',
                'h1' => 'CAPTATION & PRODUCTION ÉVÉNEMENTIELLE',
                'hero_desc' => 'Immortalisez vos grands rendez-vous professionnels avec une régie multi-caméras 4K fluide et des aftermovies rythmés livrés en un temps record.',
                'image' => '/uploads/cinema_corporate_film.png',
                'deliverables' => [
                    'Aftermovie officiel dynamique (2 à 3 minutes)',
                    'Teaser Same-Day Edit (livré pendant l\'événement)',
                    'Captation intégrale des keynotes & tables rondes',
                    'Diffusion en direct live streaming multi-plateformes'
                ],
                'equipment' => ['Régie vidéo Blackmagic 4K', 'Systèmes HF sans fil longue portée', 'Caméras PTZ robotisées', 'Microphones HF broadcast Sennheiser'],
                'category_filter' => 'Événementiel',
                'faq' => [
                    [
                        'q' => 'Pouvez-vous livrer une vidéo le jour même de l\'événement ?',
                        'a' => 'Oui. Grâce à notre régie de montage nomade sur site, nous produisons des teasers "Same-Day" en quelques heures pour alimenter vos réseaux sociaux en temps réel.'
                    ],
                    [
                        'q' => 'Combien de cadreurs mobilisez-vous sur un événement ?',
                        'a' => 'Selon l\'envergure du projet, nos équipes événementielles comptent de 2 à 8 techniciens (cadreurs, télépilote drone, ingénieur du son, réalisateur régie et monteur sur place).'
                    ]
                ]
            ],
            'drone-aerien' => [
                'title' => 'Prise de Vue Drone 4K/8K & FPV',
                'subtitle' => 'Captations Aériennes & Télépilotes Agréés',
                'meta_title' => 'Prise de Vue par Drone 4K/8K & FPV Maroc | SmartFilms Prod',
                'meta_description' => 'Images aériennes spectaculaires par drone et FPV à Casablanca et au Maroc. Télépilotes certifiés, autorisations de vol et qualité cinéma 8K.',
                'h1' => 'PRISES DE VUES AÉRIENNES & DRONE FPV',
                'hero_desc' => 'Prenez de la hauteur avec des perspectives aériennes spectaculaires. Drones cinéma 8K et drones FPV de précision pour survoler vos sites industriels et projets d\'envergure.',
                'image' => '/uploads/studio_commercial_spot.png',
                'deliverables' => [
                    'Plans aériens cinématiques 4K/8K Prores & RAW',
                    'Plans séquences FPV immersifs intérieur/extérieur',
                    'Orthophotographies et survols d\'infrastructures',
                    'Intégration directe dans vos films de marque'
                ],
                'equipment' => ['DJI Inspire 3 (Zenmuse X9-8K Air)', 'Drones FPV Cinelifter sur-mesure', 'DJI Mavic 3 Pro Cine', 'Systèmes de double commande pilote/cadreur'],
                'category_filter' => 'Drone',
                'faq' => [
                    [
                        'q' => 'Disposez-vous des autorisations légales pour faire voler un drone au Maroc ?',
                        'a' => 'Oui. Nos télépilotes sont déclarés et nous obtenons systématiquement les autorisations requises auprès de la DGAC, du Ministère de l\'Intérieur et des autorités locales pour chaque mission.'
                    ],
                    [
                        'q' => 'Quelle est la différence entre un drone classique et un drone FPV ?',
                        'a' => 'Le drone classique offre des plans larges et stables à haute altitude. Le drone FPV (First Person View) permet des trajectoires dynamiques, des passages étroits en intérieur et des sensations de vitesse uniques.'
                    ]
                ]
            ]
        ];

        if (!isset($expertisesList[$slug])) {
            abort(404);
        }

        $expertise = $expertisesList[$slug];
        $common = $this->getCommonData();
        $relatedProjects = Project::where('is_published', true)->orderBy('order')->take(4)->get();

        return view('front.expertises.show', [
            'slug' => $slug,
            'expertise' => $expertise,
            'menus' => $common['menus'],
            'settings' => $common['settings'],
            'relatedProjects' => $relatedProjects
        ]);
    }

    /**
     * About Page (/a-propos)
     */
    public function about()
    {
        $common = $this->getCommonData();
        $teamMembers = TeamMember::orderBy('order')->get();

        return view('front.about', [
            'menus' => $common['menus'],
            'settings' => $common['settings'],
            'teamMembers' => $teamMembers
        ]);
    }

    /**
     * Team Page (/equipe)
     */
    public function team()
    {
        $common = $this->getCommonData();
        $teamMembers = TeamMember::orderBy('order')->get();

        return view('front.team', [
            'menus' => $common['menus'],
            'settings' => $common['settings'],
            'teamMembers' => $teamMembers
        ]);
    }

    /**
     * Contact Page (/contact)
     */
    public function contact()
    {
        $common = $this->getCommonData();

        return view('front.contact', [
            'menus' => $common['menus'],
            'settings' => $common['settings']
        ]);
    }
}
