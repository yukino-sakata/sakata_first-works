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
            $table -> timestamp('rest-start_at');
            $table -> timestamp('rest-end_at')->nullable();
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
