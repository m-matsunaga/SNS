<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->nullable(false)->default(null)->autoIncrement();
            $table->string('username',255)->nullable(false)->default(null);
            $table->string('mail',255)->nullable(false)->unique()->default(null);
            $table->string('password',255)->nullable(false)->default(null);
            $table->string('bio',400)->nullable()->default(null);
            $table->string('images',255)->nullable(false)->default('icon1.png');
            $table->timestamp('created_at')->nullable(false)->useCurrent();
            $table->timestamp('updated_at')->nullable(false)->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('users');
    }
}
