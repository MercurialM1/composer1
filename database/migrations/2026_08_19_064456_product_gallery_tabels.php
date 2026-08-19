<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Таблица категорий галереи
        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // Например: Print, Web Design
            $table->string('slug')->unique();          // Например: print, web-design
            $table->integer('order')->default(0);      // Порядок отображения
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Таблица работ галереи
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->constrained('gallery_categories')
                ->onDelete('cascade');
            $table->string('title');                   // Название работы
            $table->text('description')->nullable();   // Описание
            $table->string('image');                   // Путь к изображению
            $table->string('client')->nullable();      // Клиент
            $table->date('project_date')->nullable();  // Дата проекта
            $table->string('link')->nullable();        // Ссылка на проект
            $table->string('tags')->nullable();        // Теги через запятую
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Заполняем начальными категориями
        DB::table('gallery_categories')->insert([
            ['name' => 'All', 'slug' => 'all', 'order' => 0, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Print', 'slug' => 'print', 'order' => 1, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Web Design', 'slug' => 'web-design', 'order' => 2, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Logo', 'slug' => 'logo', 'order' => 3, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Motion', 'slug' => 'motion', 'order' => 4, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Удаляем в обратном порядке (сначала дочернюю таблицу)
        Schema::dropIfExists('gallery_items');
        Schema::dropIfExists('gallery_categories');
    }
};
