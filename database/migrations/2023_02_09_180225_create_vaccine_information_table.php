<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_information', function (Blueprint $table) {
            $table->id();
            $table->tinyText('description');
            $table->unsignedBigInteger('vaccine_id')->unique();
            $table->foreign('vaccine_id')->references('id')->on('vaccines')->cascadeOnDelete();
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
        Schema::dropIfExists('vaccine_information');
    }
}
