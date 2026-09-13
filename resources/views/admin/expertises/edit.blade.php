@extends('admin.layouts.app')

@section('title', 'Modifier Expertise - ' . $expertise->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.expertises.index') }}" class="w-9 h-9 rounded-xl bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-gray-700 transition-colors">
                <i class="fas fa-arrow-left text-sm"></i>
            </a>
            <div>
                <h1 class="text-xl font-bold text-gray-900">Modifier l'expertise : {{ $expertise->title }}</h1>
                <p class="text-xs text-gray-500">Mettez à jour la photo, le titre, le sous-titre et le texte descriptif.</p>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.expertises.update', $expertise->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 space-y-6">
        @csrf
        @method('PUT')

        <!-- Image Upload & Preview Section -->
        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 space-y-4">
            <h3 class="text-sm font-bold text-gray-900 flex items-center gap-2">
                <i class="fas fa-image text-blue-600"></i> Photo de l'expertise
            </h3>

            <div class="flex flex-col sm:flex-row gap-6 items-start">
                <!-- Current Image Preview -->
                <div class="w-full sm:w-64 h-40 bg-gray-900 rounded-xl overflow-hidden border border-gray-200 shadow-inner relative group">
                    <img id="imagePreview" src="{{ $expertise->image }}" alt="{{ $expertise->title }}" class="w-full h-full object-cover">
                    <div class="absolute bottom-2 left-2 bg-black/70 backdrop-blur-sm text-white text-[10px] font-mono px-2 py-0.5 rounded">
                        Photo actuelle
                    </div>
                </div>

                <!-- Upload Input -->
                <div class="flex-1 space-y-3">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Télécharger une nouvelle photo :</label>
                        <input type="file" name="image_file" id="imageFileInput" accept="image/*" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer border border-gray-300 rounded-xl p-1 bg-white">
                        <p class="text-[11px] text-gray-400 mt-1">Formats acceptés : JPG, PNG, WEBP, AVIF (Max 5MB). Recommandé : ratio 16:9 ou paysage.</p>
                    </div>

                    <div class="pt-2">
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Ou chemin/URL direct de l'image :</label>
                        <input type="text" name="image_url" value="{{ $expertise->image }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl text-xs focus:ring-2 focus:ring-blue-500 focus:border-blue-500 font-mono bg-white">
                    </div>
                </div>
            </div>
        </div>

        <!-- Texts Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Titre principal</label>
                <input type="text" name="title" value="{{ old('title', $expertise->title) }}" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Sous-titre / Accroche</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $expertise->subtitle) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Description / Paragraphe de la carte</label>
            <textarea name="hero_desc" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 leading-relaxed">{{ old('hero_desc', $expertise->hero_desc) }}</textarea>
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ $expertise->is_active ? 'checked' : '' }} class="rounded text-blue-600 focus:ring-blue-500 h-4 w-4">
                <span class="text-sm font-medium text-gray-700">Afficher cette expertise sur le site</span>
            </label>

            <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-6 py-2.5 rounded-xl transition-all shadow-md">
                <i class="fas fa-save"></i> Enregistrer les modifications
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('imageFileInput').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                document.getElementById('imagePreview').src = evt.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });
</script>
@endsection
