<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // Titre affiché
            $table->string('slug')->unique(); // URL : /docs/{slug}
            $table->text('content');          // Texte ou markdown
            $table->unsignedInteger('position')->default(0); // Ordre d’affichage
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('docs');
    }
};
