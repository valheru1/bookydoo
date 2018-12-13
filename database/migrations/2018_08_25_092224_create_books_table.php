<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('author_id');
            $table->string('title');
            $table->text('description');
            $table->boolean('comedy')->default(0);
            $table->boolean('fantasy')->default(0);
            $table->boolean('for_kids')->default(0);
            $table->boolean('history')->default(0);
            $table->boolean('moral')->default(0);
            $table->boolean('philosophy')->default(0);
            $table->boolean('religious')->default(0);
            $table->boolean('report')->default(0);
            $table->boolean('romance')->default(0);
            $table->boolean('thriller')->default(0);
            $table->boolean('youth')->default(0);
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
        Schema::dropIfExists('books');
    }
}
