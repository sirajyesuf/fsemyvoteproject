<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
        
            $table->string('logo');
            $table->unsignedbiginteger('election_id');
            $table->integer('vote')->default(0);
            $table->unsignedbiginteger('user_id');
            $table->foreign('election_id')->references('id')->on('elections')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            

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
        Schema::dropIfExists('candidates');
    }
}
