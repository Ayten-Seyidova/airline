<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('fax');
            $table->string('mail');
            $table->string('address_az');
            $table->string('address_en');
            $table->string('address_ru');
            $table->string('title_az');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('keywords_az');
            $table->string('keywords_en');
            $table->string('keywords_ru');
            $table->text('description_az');
            $table->text('description_en');
            $table->text('description_ru');
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
        Schema::dropIfExists('settings');
    }
}
