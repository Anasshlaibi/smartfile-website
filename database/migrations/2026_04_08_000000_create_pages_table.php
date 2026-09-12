<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // الرابط ديال الصفحة باش يكون صديق للسيو
            $table->longText('content')->nullable(); // محتوى الصفحة
            $table->string('meta_title')->nullable(); // عنوان السيو
            $table->text('meta_description')->nullable(); // وصف السيو
            $table->boolean('is_active')->default(true); // واش الصفحة باينة أو مخفية
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
};