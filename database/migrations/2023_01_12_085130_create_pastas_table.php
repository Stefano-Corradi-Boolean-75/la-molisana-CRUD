<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug', 110)->unique();
            $table->string('image')->default('http://www.asdalcione.it/wp-content/uploads/2016/08/jk-placeholder-image-1.jpg');
            $table->string('image_h')->nullable();
            $table->string('image_p')->nullable();
            $table->string('type', 20);
            $table->string('cooking_time', 20);
            $table->string('weight', 20);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastas');
    }
};
