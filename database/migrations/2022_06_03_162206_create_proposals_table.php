<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('provider_id')->nullable();
            $table->unsignedInteger('job_post_id')->nullable();
            $table->string('title')->unique();
            $table->string('description')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proposals');
    }
};
