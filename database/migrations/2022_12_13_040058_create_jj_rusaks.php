<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJjRusaks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jj_rusaks', function (Blueprint $table) {
             $table->id();
            $table->string("name")->nullable();
            $table->string("lokasi")->nullable();
            $table->string("tanggal")->nullable();
            $table->text("tugas_untuk")->nullable();
            $table->string("image")->nullable();
            $table->string("atasan")->nullable();

            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->integer("deleted_by")->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('jj_rusaks');
    }
}
