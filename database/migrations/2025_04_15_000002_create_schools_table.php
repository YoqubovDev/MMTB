<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->integer('maktab_raqami')->nullable();
            $table->string('mfy')->nullable();
            $table->year('qurilgan_yili')->nullable();
            $table->year('songi_tamir_yili')->nullable();
            $table->float('yer_maydoni')->nullable();
            $table->boolean('xudud_oralganligi')->nullable();
            $table->integer('binolar_soni')->nullable();
            $table->integer('binolar_qavatligi')->nullable();
            $table->float('binolar_maydoni')->nullable();
            $table->float('istilidigan_maydon')->nullable();
            $table->integer('quvvati')->nullable();
            $table->integer('oquvchi_soni')->nullable();
            $table->float('koffsiyent')->nullable();
            $table->integer('oshxona_yoki_bufet_quvvati')->nullable();
            $table->string('sport_zal_soni_va_maydoni')->nullable();
            $table->string('faollar_zali_va_quvvati')->nullable();
            $table->string('xolati')->nullable();
            $table->float('tom_xolati_yuzda')->nullable();
            $table->float('deraza_rom_xolati_yuzda')->nullable();
            $table->string('istish_turi')->nullable();
            $table->integer('qozonlar_soni')->nullable();
            $table->float('qozonlar_xolati_yuzda')->nullable();
            $table->float('apoklar_xolati_yuzda')->nullable();
            $table->float('gaz_istemoli')->nullable();
            $table->float('elektr_istemoli')->nullable();
            $table->float('issiqlik_istemoli')->nullable();
            $table->boolean('quyosh_paneli')->nullable();
            $table->string('maktab_rasmlari')->nullable();
            $table->boolean('geokollektor')->nullable();
            $table->string('lokatsiya')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
}


