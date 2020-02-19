<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            



            $table->bigIncrements('id');
            $table->unsignedbiginteger('user_id');
            $table->string('title');
            $table->text("description");
            $table->integer('election_id');
            $table->string('election_token')->uniqid();
        
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            
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
        Schema::dropIfExists('results');
    }
}
