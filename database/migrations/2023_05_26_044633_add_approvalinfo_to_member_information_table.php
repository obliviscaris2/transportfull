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
        Schema::table('member_information', function (Blueprint $table) {
            $table->string('approval_name')->required();
            $table->string('approval_position')->required();
            $table->string('card_issue_date')->required();
            $table->string('expiry_date')->required();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_information', function (Blueprint $table) {
            $table->dropColumn('approval_name');
            $table->dropColumn('approval_position');
            $table->dropColumn('card_issue_date');
            $table->dropColumn('expiry_date');
        });
    }
};
