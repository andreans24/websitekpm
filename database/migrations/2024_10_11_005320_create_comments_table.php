<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id'); // Menghubungkan dengan tabel berita
            $table->unsignedBigInteger('parent_id')->nullable(); // Untuk komentar balasan (reply)
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->timestamps();

            // Foreign key untuk relasi dengan tabel news
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            // Foreign key untuk parent comment (jika ada)
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
