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
        Schema::create('departaments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('code', 10)->nullable();
            $table->string('abbrev', 10)->nullable();
            $table->boolean('status')->default(true);

            // Llave foránea a countries
            $table->foreignId('country_id')
                  ->constrained('countries')
                  ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes(); // crea automáticamente deleted_at nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departaments');
    }
};
