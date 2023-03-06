<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('image');
            $table->enum('gender', ['male', 'female']);
            $table->text('description');
            $table->enum('highest_certificate', ['msc', 'md', 'diploma', 'mbbch']);
            $table->string('syndicate_number')->unique();
            $table->text('medical_syndicate_card');
            $table->foreignId('town_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['under_review', 'available']);
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
        Schema::dropIfExists('doctors');
    }
}
