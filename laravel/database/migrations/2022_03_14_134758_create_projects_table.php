<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable;
            $table->string('description')->nullable;
            $table->string('image')->nullable;
            $table->string('slug')->unique();
            $table->unsignedBigInteger('user_id')->nullable(); //se abbiamo già dati bisogna mettere nullable per evitare errori
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('set null');
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
        Schema::dropIfExists('projects');
    }
}
