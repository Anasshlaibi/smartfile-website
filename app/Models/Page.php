<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    // هادو هما الحقول لي مسموح لينا نعمروهم
    protected $fillable = [
        'title', 
        'slug', 
        'content', 
        'meta_title', 
        'meta_description', 
        'is_active'
    ];

    // هاد الجزء كيعلم Laravel بلي محتوى الصفحة عبارة عن JSON/Array باش يقراه ويحفظو مزيان
    protected $casts = [
        'content' => 'array',
        'is_active' => 'boolean',
    ];
}