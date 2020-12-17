<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetupSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_sites', function (Blueprint $table) {
            $table->id();
            $table->string('bg_image')->nullable();
            $table->string('logo')->nullable();
            $table->string('pg_loder')->nullable();
            $table->string('site_name')->nullable();
            $table->string('address')->nullable();
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setup_sites');
    }
}
