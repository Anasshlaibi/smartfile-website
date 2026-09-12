@extends('admin.layouts.app')

@section('title', 'Tableau de bord - SmartFilms Prod')

@section('content')
<div class="mb-8">
    <h2 class="text-3xl font-bold text-gray-800">Bienvenue sur votre espace !</h2>
    <p class="text-gray-600 mt-2">Prêt à gérer vos projets de photographie immobilière, vos vidéos par drone et le contenu de votre site.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Visites Aujourd'hui</p>
                <h3 class="text-3xl font-bold text-gray-800">0</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center text-xl">
                <i class="fas fa-eye"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Projets Portfolio</p>
                <h3 class="text-3xl font-bold text-gray-800">0</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-xl">
                <i class="fas fa-camera"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Articles de Blog</p>
                <h3 class="text-3xl font-bold text-gray-800">0</h3>
            </div>
            <div class="w-12 h-12 bg-purple-50 text-purple-500 rounded-full flex items-center justify-center text-xl">
                <i class="fas fa-pen-nib"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Pages Actives</p>
                <h3 class="text-3xl font-bold text-gray-800">0</h3>
            </div>
            <div class="w-12 h-12 bg-yellow-50 text-yellow-500 rounded-full flex items-center justify-center text-xl">
                <i class="fas fa-file"></i>
            </div>
        </div>
    </div>

</div>
@endsection