<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration - SmartFilms Prod')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style> 
        body { font-family: 'Poppins', sans-serif; } 
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #1f2937; }
        ::-webkit-scrollbar-thumb { background: #4b5563; border-radius: 3px; }
    </style>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden text-gray-800">

    <aside class="w-64 bg-gray-900 text-white flex flex-col hidden md:flex transition-all duration-300 shadow-xl">
        <div class="h-16 flex items-center justify-center border-b border-gray-800">
            <h1 class="text-xl font-bold tracking-wider">SmartFilms<span class="text-blue-500">Prod</span></h1>
        </div>
        <nav class="flex-1 overflow-y-auto py-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white transition-colors' }}">
                <i class="fas fa-tachometer-alt w-6"></i> Tableau de bord
            </a>

            <a href="{{ route('admin.leads.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.leads.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white transition-colors' }}">
                <i class="fas fa-bullhorn w-6 text-amber-400"></i> Leads & Devis CRM
                @php $newCount = \App\Models\Lead::where('status', 'new')->count(); @endphp
                @if($newCount > 0)
                    <span class="ml-auto bg-rose-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $newCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.projects.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.projects.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white transition-colors' }}">
                <i class="fas fa-video w-6 text-indigo-400"></i> Portfolio & Films
            </a>
            
            <a href="{{ route('admin.expertises.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.expertises.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white transition-colors' }}">
                <i class="fas fa-layer-group w-6 text-rose-400"></i> Nos Expertises (Photos)
            </a>
            
            <a href="{{ route('pages.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('pages.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white transition-colors' }}">
                <i class="fas fa-file-alt w-6"></i> Pages & Builder
            </a>

            <a href="{{ route('menus.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('menus.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white transition-colors' }}">
                <i class="fas fa-list w-6"></i> Menu Builder
            </a>

            <a href="{{ route('admin.settings.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white transition-colors' }}">
                <i class="fas fa-cog w-6"></i> Paramètres & SEO
            </a>

            <div class="pt-6 px-6">
                <a href="/" target="_blank" class="block w-full py-2.5 text-center bg-gray-800 hover:bg-gray-700 text-white rounded-xl text-xs font-bold transition-all">
                    <i class="fas fa-external-link-alt mr-1.5"></i> Voir le site live
                </a>
            </div>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 z-10">
            <button class="text-gray-500 focus:outline-none md:hidden hover:text-blue-600 transition-colors">
                <i class="fas fa-bars text-xl"></i>
            </button>
            
            <div class="flex items-center ml-auto space-x-4">
                <div class="hidden md:block text-sm text-gray-600">
                    <i class="fas fa-user-circle text-lg align-middle mr-1"></i> Admin
                </div>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-white hover:bg-red-500 px-3 py-1.5 rounded-md transition-colors text-sm font-medium flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                    </button>
                </form>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>