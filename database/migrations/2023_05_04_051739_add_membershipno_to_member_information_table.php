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
            $table->string('membershipno', 80)
                        ->unique()
                        ->nullable()
                        ->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_information', function (Blueprint $table) {
            $table->dropColumn('membershipno');
        });
    }
};
