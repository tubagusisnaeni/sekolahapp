<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wali_murid_id')->constrained('wali_murids')->onDelete('cascade');
            $table->string('nama');
            $table->string('nisn')->unique();
            $table->date('tanggal_lahir');
            $table->string('kelas')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
