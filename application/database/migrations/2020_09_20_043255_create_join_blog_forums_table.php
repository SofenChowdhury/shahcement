<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinBlogForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_blog_forums', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('forum_id');
            $table->string('status')->default('1')->comment('(1 = Approved), (0 = Pending), (2 = Reject)');
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
        Schema::dropIfExists('join_blog_forums');
    }
}
