<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'company',
        'project_type',
        'budget_tier',
        'timeline',
        'message',
        'status',
        'admin_notes',
        'ip_address',
    ];
}
