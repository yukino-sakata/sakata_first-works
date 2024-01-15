<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table -> id();
            $table -> foreignId('user_id')->constrained()->cascadeOnDelete();
            $table -> date('date');
            $table -> time('work_start_time');
            $table -> time('work_finish_time')->nullable();
            $table -> timestamp('created_at')->useCurrent()->nullable();
            $table -> timestamp('updated_at')->useCurrent()->nullable();
            $table -> time('total_work_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
