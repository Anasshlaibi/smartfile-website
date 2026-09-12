<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('expertises')) {
            Schema::create('expertises', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('subtitle')->nullable();
                $table->string('h1')->nullable();
                $table->text('hero_desc')->nullable();
                $table->string('image')->nullable();
                $table->json('deliverables')->nullable();
                $table->json('equipment')->nullable();
                $table->json('faq')->nullable();
                $table->string('category_filter')->nullable();
                $table->string('seo_title')->nullable();
                $table->text('seo_description')->nullable();
                $table->integer('order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('expertises');
    }
};
