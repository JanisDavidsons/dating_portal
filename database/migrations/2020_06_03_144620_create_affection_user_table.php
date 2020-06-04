<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectionUserTable extends Migration
{

    public function up():void
    {
        Schema::create('affection_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('affection_id');
            $table->unsignedBigInteger('user_id');
            $table->string('match_type')->nullable();
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('affection_user');
    }
}
