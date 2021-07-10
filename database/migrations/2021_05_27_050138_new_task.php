<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //if(Schema::hasTable('new_tasks')) return;
    Schema::create('new_tasks', function (Blueprint $table){
        $table->id();
        $table->string('course');
        $table->string('title');
        $table->time('time');
        $table->date('date');
        $table->string('notification_type');
        $table->string('content');
        $table->string('user_id');
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
        //
    }
}
