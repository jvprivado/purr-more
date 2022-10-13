<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->longText('firstname');
            $table->longText('lastname');
            $table->string('email');
            $table->longText('phone');
            $table->longText('pur');
            $table->longText('thumbnail')->nullable();
            $table->longText('cat_names');
            $table->longText('agreementPromotion');
            $table->longText('agreementTC');
            $table->string('pur_status')->default('0');
            $table->longText('password')->nullable();
            $table->string('user_status')->default('0');
            $table->longText('winningTime')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
