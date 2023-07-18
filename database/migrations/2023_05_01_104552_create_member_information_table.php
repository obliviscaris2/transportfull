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
        Schema::create('member_information', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('name');
            $table->string('perma_address');
            $table->string('temp_address');
            $table->string('parent_name');
            $table->string('marital_status');
            $table->string('spouse_name');
            $table->string('position');
            $table->string('committee');
            $table->string('levi');
            $table->string('work_province');
            $table->string('district');
            $table->string('branch');
            $table->string('work_route');
            $table->string('old_membership');
            $table->string("blood_group");
            $table->string('home_phone');
            $table->string('mobile_phone');
            $table->string('email');
            $table->string('edu_level');
            $table->string('id_number');
            $table->string('some_number');
            $table->string('social_security');
            $table->string('min_labor');
            $table->string('issue_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_information');
    }
};
