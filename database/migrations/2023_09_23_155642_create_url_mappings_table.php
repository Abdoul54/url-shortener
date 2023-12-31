<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlMappingsTable extends Migration
{
    public function up()
    {
        Schema::create('url_mappings', function (Blueprint $table) {
            $table->id();
            $table->string('original_url');
            $table->string('short_url')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('url_mappings');
    }
}
