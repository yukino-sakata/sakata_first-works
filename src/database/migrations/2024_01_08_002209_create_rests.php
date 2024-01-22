<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rests', function (Blueprint $table) {
            $table -> id();
            $table -> foreignId('work_id')->constrained()->cascadeOnDelete();
            $table -> time('rest_start_time');
            $table -> time('rest_end_time')->nullable();
            $table -> time('rest_time')->nullable();
            $table -> timestamp('created_at')->useCurrent()->nullable();
            $table -> timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rests');
    }
}
