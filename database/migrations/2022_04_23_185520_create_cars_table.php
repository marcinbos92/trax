<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /** @return void */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table
                ->string('make', 150)
                ->nullable(false);
            $table
                ->string('model', 150)
                ->nullable(false);
            $table
                ->unsignedSmallInteger('year')
                ->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /** @return void */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
