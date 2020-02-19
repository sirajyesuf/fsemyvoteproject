<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllcandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allcandidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');

            $table->text('description');
        
            $table->string('logo');
        
            $table->integer('vote')->default(0);
            
            $table->unsignedbiginteger('batch');
            $table->foreign('batch')->references('id')->on('results');
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
        Schema::dropIfExists('allcandidates');
    }
}
