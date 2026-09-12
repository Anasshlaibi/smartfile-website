<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartFilms Prod - En cours de création</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        /* خلفية سينمائية راقية */
        .bg-cinematic {
            background: linear-gradient(to bottom right, #0f172a, #1e293b);
            position: relative;
        }
        /* لمسة ديال صورة فوتوغرافية خفيفة فالخلفية */
        .bg-cinematic::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('https://images.unsplash.com/photo-1601506521937-0121a7fc2a6b?q=80&w=2071&auto=format&fit=crop') center/cover;
            opacity: 0.15;
            z-index: 0;
        }
        .content-wrapper {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="bg-cinematic text-white min-h-screen flex flex-col items-center justify-center p-6 text-center">

    <div class="content-wrapper max-w-3xl w-full">
        <h1 class="text-5xl md:text-6xl font-bold tracking-wider mb-8 drop-shadow-lg">
            SmartFilms<span class="text-blue-500">Prod</span>
        </h1>

        <div class="bg-gray-900/60 backdrop-blur-md p-8 md:p-12 rounded-2xl border border-gray-700 shadow-2xl mb-8">
            <h2 class="text-2xl md:text-3xl font-light text-gray-200 mb-6">
                L'art de l'image, la passion de la création.
            </h2>
            <p class="text-gray-400 text-lg leading-relaxed mb-8">
                Nous travaillons actuellement sur notre nouvelle plateforme pour vous offrir une expérience visuelle à la hauteur de vos attentes. Notre site officiel sera bientôt disponible !<br><br>
                <span class="text-sm font-medium text-gray-300">En attendant, n'hésitez pas à nous contacter pour vos projets :</span>
            </p>

            <div class="w-24 h-1 bg-blue-500 mx-auto mb-8 rounded-full"></div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-6">
                
                <a href="https://wa.me/212617202345" target="_blank" 
                   class="flex items-center gap-3 bg-[#25D366] hover:bg-[#1ebd5c] text-white px-6 py-3.5 rounded-xl font-medium transition-all duration-300 w-full md:w-auto justify-center shadow-lg hover:shadow-xl hover:-translate-y-1">
                    <i class="fab fa-whatsapp text-2xl"></i>
                    <span class="tracking-wide">+212 617-202345</span>
                </a>

                <a href="mailto:contact@smartfilmsprod.com" 
                   class="flex items-center gap-3 bg-gray-800 hover:bg-gray-700 border border-gray-600 text-white px-6 py-3.5 rounded-xl font-medium transition-all duration-300 w-full md:w-auto justify-center shadow-lg hover:shadow-xl hover:-translate-y-1">
                    <i class="fas fa-envelope text-xl text-blue-400"></i>
                    <span class="tracking-wide">contact@smartfilmsprod.com</span>
                </a>

            </div>
        </div>

        <p class="text-gray-500 text-sm tracking-wide">
            &copy; {{ date('Y') }} SmartFilms Prod. Tous droits réservés.
        </p>
    </div>

</body>
</html>