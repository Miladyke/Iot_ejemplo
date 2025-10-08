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
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();

            // Llaves foráneas
            $table->foreignId('id_sensor')
                  ->constrained('sensors')
                  ->onDelete('cascade');

            $table->foreignId('id_station')
                  ->constrained('stations')
                  ->onDelete('cascade');

            // Datos del sensor
            $table->float('temp_value')->nullable();
            $table->float('humidity')->nullable();
            $table->boolean('status')->default(true);

            // Timestamps
            $table->timestamps();
            $table->softDeletes(); // crea deleted_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_datas');
    }
};
