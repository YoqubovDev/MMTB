<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKindergartensTable extends Migration
{
    public function up()
    {
        Schema::create('kindergartens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->nullable()->constrained()->onDelete('set null');
            $table->string('mfy');
            $table->integer('qurilgan_yili');
            $table->integer('songi_tamir_yili')->nullable();
            $table->integer('boqcha_raqami')->nullable()->unique();
            $table->decimal('yer_maydoni', 10, 2)->nullable();
            $table->boolean('xudud_oralganligi')->nullable();
            $table->integer('binolar_soni')->nullable();
            $table->integer('binolar_qavatligi')->nullable();
            $table->decimal('binolar_maydoni', 10, 2)->nullable();
            $table->decimal('istilidigan_maydon', 10, 2)->nullable();
            $table->integer('quvvati')->nullable();
            $table->integer('bolalar_soni')->nullable();
            $table->decimal('koffsiyent', 8, 2)->nullable();
            $table->string('oshxona_yoki_bufet_quvvati')->nullable();
            $table->string('sport_zal_soni_va_maydoni')->nullable();
            $table->string('faollar_zali_va_quvvati')->nullable();
            $table->string('xolati')->nullable();
            $table->decimal('tom_xolati_yuzda', 5, 2)->nullable();
            $table->decimal('deraza_rom_xolati_yuzda', 5, 2)->nullable();
            $table->string('istish_turi')->nullable();
            $table->integer('qozonlar_soni')->nullable();
            $table->decimal('qozonlar_xolati_yuzda', 5, 2)->nullable();
            $table->decimal('apoklar_xolati_yuzda', 5, 2)->nullable();
            $table->decimal('gaz_istemoli', 10, 2)->nullable();
            $table->decimal('elektr_istemoli', 10, 2)->nullable();
            $table->decimal('issiqlik_istemoli', 10, 2)->nullable();
            $table->boolean('quyosh_paneli')->nullable();
            $table->boolean('geokollektor')->nullable();
            $table->string('lokatsiya')->nullable();
            $table->string('boqcha_rasmlari')->nullable(); // Store file path
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kindergartens');
    }
}
