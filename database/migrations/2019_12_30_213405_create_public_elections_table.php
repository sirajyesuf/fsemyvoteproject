<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_elections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->boolean('vote')->default(false);
            $table->unsignedbiginteger('election_id');
            $table->foreign('election_id')->references('id')->on('elections');
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
        Schema::dropIfExists('public_elections');
    }
}
