<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name')->nullable();
            $table->string('category')->default('Film Corporate'); // Film Corporate, Spot Publicitaire, Documentaire, Drone 4K, Événementiel
            $table->string('video_url')->nullable(); // YouTube / Vimeo / MP4 path
            $table->string('video_type')->default('youtube'); // youtube, vimeo, mp4
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->string('duration')->nullable(); // e.g. "02:15"
            $table->string('year')->nullable(); // e.g. "2026"
            $table->string('metrics')->nullable(); // e.g. "+1.2M Vues", "TV & Digital"
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('project_type')->nullable(); // Film d'entreprise, Publicité, Drone, etc.
            $table->string('budget_tier')->nullable(); // Moins de 50 000 MAD, 50k-100k, 100k-250k, +250k MAD
            $table->string('timeline')->nullable(); // Urgent, Dans 1 mois, Dans 3 mois
            $table->text('message')->nullable();
            $table->string('status')->default('new'); // new, contacted, proposal_sent, won, lost
            $table->text('admin_notes')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });

        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('photo')->nullable();
            $table->text('bio')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('leads');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('settings');
    }
};
