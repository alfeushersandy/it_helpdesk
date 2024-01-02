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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('no_ticket')->unique();
            $table->date('tanggal');
            $table->string('client_name');
            $table->unsignedBigInteger('id_lokasi');
            $table->unsignedBigInteger('id_departemen');
            $table->text('problem');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->time('t_exection')->nullable();
            $table->time('t_finish')->nullable();
            $table->date('tgl_finish')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_lokasi')->references('id')->on('lokasis')->onDelete('cascade');
            $table->foreign('id_departemen')->references('id')->on('departemens')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
