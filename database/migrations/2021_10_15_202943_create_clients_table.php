<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->unsignedBigInteger('cod')->autoIncrement();
            $table->string('name');
            $table->string('city',20)->index();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('city')->references('cod')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
