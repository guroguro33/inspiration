<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idea_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('idea_review')->nullable();
            $table->unsignedInteger('five_rank');
            $table->timestamps();
            // FK設定
            $table->foreign('idea_id')->references('id')->on('ideas')->onDelete('cascade');
            // ユーザーが削除されても、評価は残すべきのため、set null
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
