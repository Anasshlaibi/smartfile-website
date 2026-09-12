<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // سمية الرابط
            $table->string('url'); // الرابط ديال الصفحة
            $table->unsignedBigInteger('parent_id')->nullable(); // لمعرفة واش هادا رابط فرعي
            $table->integer('order')->default(0); // ترتيب الرابط
            $table->timestamps();

            // يلا تمسح الرابط الأب، يتمسحو حتى الروابط المتفرعة منو
            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
};