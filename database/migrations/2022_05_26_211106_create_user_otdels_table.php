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
        Schema::create('user_otdels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('otdel_id');

            $table->index('user_id', 'user_otdel_user_idx');
            $table->index('otdel_id', 'user_otdel_otdel_idx');

            $table->foreign('user_id', 'user_otdel_user_fk')->on('users')->references('id');
            $table->foreign('otdel_id', 'user_otdel_otdel_fk')->on('otdels')->references('id');;

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
        Schema::dropIfExists('user_otdels');
    }
};
