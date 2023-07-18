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
        Schema::create('card_generates', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('position');
            $table->string('committee');
            $table->string('id_number');
            $table->string('blood_group');
            $table->string('membershipno');
            $table->string('approval_name');
            $table->string('approval_position');
            $table->string('card_issue_date');
            $table->string('expiry_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_generates');
    }
};
