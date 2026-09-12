<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;

    protected $table = 'expertises';

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'h1',
        'hero_desc',
        'image',
        'deliverables',
        'equipment',
        'faq',
        'category_filter',
        'seo_title',
        'seo_description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'deliverables' => 'array',
        'equipment' => 'array',
        'faq' => 'array',
        'is_active' => 'boolean',
    ];
}
