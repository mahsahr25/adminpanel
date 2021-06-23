<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100)->nullable();
            $table->string('image',100)->nullable();
            $table->string('description',200)->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('depth',100)->nullable();
            $table->string('path',100)->nullable();
            $table->timestamps();

            $table->bigInteger('createuser')->nullable();
            $table->bigInteger('updateuser')->nullable();
            $table->bigInteger('deleteuser')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
