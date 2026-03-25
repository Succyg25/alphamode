<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('payment_transactions', function (Blueprint $table) {
            $table->string('receipt_path')->nullable()->change();
            $table->string('status')->default('pending')->change(); // Change to string to allow any status or update enum
        });
    }

    public function down(): void
    {
        Schema::table('payment_transactions', function (Blueprint $table) {
            $table->string('receipt_path')->nullable(false)->change();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->change();
        });
    }
};
