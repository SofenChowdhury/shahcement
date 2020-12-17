<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_forums', function (Blueprint $table) {
            $table->id();
            $table->string('cover')->nullable();
            $table->string('avatar')->nullable();
            $table->string('title')->nullable();
            $table->string('status')->default('1');
            $table->string('type')->default('1')->comment('(1 = Open), (0 = Closed)');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('blog_forums');
    }
}
