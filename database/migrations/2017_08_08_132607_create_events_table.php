<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('package_id');
            $table->integer('category_id');
            $table->string('title');
            $table->text('description');
            $table->integer('event_type');
            $table->string('event_date_time');
            $table->string('link')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('image_id');
            $table->integer('link_status')->default(0);
            $table->integer('event_status');
            $table->integer('payment_status');
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
        Schema::dropIfExists('events');
    }
}
