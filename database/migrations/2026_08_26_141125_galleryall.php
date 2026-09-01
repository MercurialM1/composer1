<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('category_photo', function (Blueprint $table) {
           $table->id();
           $table->foreignId('category_id')->constrained()->onDelete('cascade'); // нельзя добавить к несуществующей категории и если удалить категорию удалятся все связи
           $table->foreignId('photo_id')->constrained()->onDelete('cascade');
           $table->unique(['category_id', 'photo_id']); //как стеш с униками в пое
       }); //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
