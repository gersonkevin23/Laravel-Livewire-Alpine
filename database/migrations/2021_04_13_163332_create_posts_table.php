<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id');
            $table->foreignId('pair_id');
            $table->text('description');
            $table->text('image_link')->nullable();
            $table->text('chart_link')->nullable();
            $table->enum('status', [
                'Active',
                'Closed Manually',
                'Closed Target Reached',
                'Cancelled',
            ]);
            $table->enum('strategy', ['Short', 'Long', 'Neutral']);
            $table->enum('timeframe', ['Short Term', 'Mid Term', 'Long Term']);
            $table->enum('type', ['Pro', 'Basic']);
            $table->text('disclaimer');
            $table->dateTime('published_at');
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
        Schema::dropIfExists('posts');
    }
}
