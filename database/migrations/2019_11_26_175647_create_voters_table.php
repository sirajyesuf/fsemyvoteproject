<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('voters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('vid');
            $table->string('key');
            $table->string('password');
            $table->boolean('vote')->default(false);
            $table->string('email');
            $table->rememberToken();

            $table->unsignedbiginteger('election_id');
            
            $table->foreign('election_id')->references('id')->on('elections')->onDelete('cascade');

            $table->unsignedbiginteger('user_id');

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
        Schema::dropIfExists('voters');
    }
}
