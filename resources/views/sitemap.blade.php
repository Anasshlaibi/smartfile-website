{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    <!-- 1. Primary Landing Pages -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/realisations') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ url('/expertises') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>

    <!-- 2. Dedicated Expertise Pages -->
    @php
        $expertiseSlugs = ['film-corporate', 'spot-publicitaire', 'production-evenementielle', 'drone-aerien'];
    @endphp
    @foreach($expertiseSlugs as $slug)
    <url>
        <loc>{{ url('/expertises/' . $slug) }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.85</priority>
    </url>
    @endforeach

    <!-- 3. Studio Pages -->
    <url>
        <loc>{{ url('/a-propos') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/equipe') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/contact') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.85</priority>
    </url>

    <!-- 4. Dynamic Project Case Studies -->
    @foreach($projects as $proj)
    <url>
        <loc>{{ url('/realisations/' . ($proj->slug ?? Str::slug($proj->title))) }}</loc>
        <lastmod>{{ $proj->updated_at ? $proj->updated_at->toAtomString() : now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>
