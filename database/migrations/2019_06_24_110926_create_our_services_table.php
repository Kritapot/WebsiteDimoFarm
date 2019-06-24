<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title1')->nullable();
            $table->text('description1')->nullable();
            $table->string('title2')->nullable();
            $table->text('description2')->nullable();
            $table->string('title3')->nullable();
            $table->text('description3')->nullable();
            $table->string('title4')->nullable();
            $table->text('description4')->nullable();
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
        Schema::dropIfExists('our_services');
    }
}
