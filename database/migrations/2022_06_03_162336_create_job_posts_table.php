<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->unsignedInteger('client_id')->nullable();
            $table->unsignedInteger('provider_id')->nullable();
            $table->string('description')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->integer('number_of_employee')->default('1');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
};
