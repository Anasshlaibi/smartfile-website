<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url', 'parent_id', 'order'];

    // هاد الفانكشن باش نجيبو القوائم الفرعية (Sub-menus)
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order');
    }

    // هاد الفانكشن باش نجيبو غير القوائم الرئيسية
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id')->orderBy('order');
    }
}