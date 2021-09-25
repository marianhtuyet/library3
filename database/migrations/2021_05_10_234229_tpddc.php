<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tpddc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpddcs', function (Blueprint $table) {
            $table->string('name');
            $table->string('original')->nullable();
            $table->string('temporary_content')->nullable();
            $table->integer('type_book_id')->nullable();
            $table->integer('language_id')->nullable();
            $table->integer('ddc_id')->nullable();
            $table->integer('author_id')->nullable();
            $table->string('chapter')->nullable();
            $table->string('summary')->nullable();
            $table->string('series')->nullable();
            $table->integer('publishing_company_id')->nullable();
            $table->integer('republishing')->nullable();
            $table->year('year_publishing')->nullable();
            $table->integer('page_number')->nullable();
            $table->integer('site_id')->nullable();
            $table->date('input_date')->nullable();
            $table->float('cost')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('img_src')->nullable();
            $table->string('format_book')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tpddcs');
    }
}
