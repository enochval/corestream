<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booked_event_id');
            $table->integer('no_of_view');
            $table->integer('no_of_visit');
            $table->integer('no_of_like');
            $table->integer('no_of_comment');
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
        Schema::dropIfExists('event_reports');
    }
}
