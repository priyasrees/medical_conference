<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('membership_no')->length(25);
            $table->tinyInteger('member_type')->default(0)->length(5);
            $table->string('profile');
            $table->integer('category_id');
            $table->string('name');
            $table->string('medical_reg_no')->length(25);
            $table->string('designation');
            $table->string('institute');
            $table->bigInteger('mobile')->default(0)->length(10);
            $table->string('email')->length(191);
            $table->string('address');
            $table->string('city')->length(100);
            $table->string('state')->length(50);
            $table->string('pincode')->length(10);
            $table->string('diet')->length(25);
            $table->string('accompanying_person')->length(150);
            $table->string('acc_person_name')->length(150);
            $table->integer('acc_age')->default(0)->length(10);
            $table->string('acc_gender')->length(25);
            $table->string('acc_diet')->length(150);
            $table->string('payment_screen_shot')->length(191);
            $table->tinyInteger('payment_status')->default(0)->length(2);
            $table->tinyInteger('status')->default(1)->length(1)->comment('0 - Inactive | 1- active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
