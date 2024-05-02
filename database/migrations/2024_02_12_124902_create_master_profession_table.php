<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_profession', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_id');
            $table->unsignedBigInteger('profession_id');
            $table->timestamps();

            $table->foreign('master_id')->references('id')->on('masters')->onDelete('cascade');
            $table->foreign('profession_id')->references('id')->on('occupations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_profession');
    }
}
