<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('order_timelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('status'); // placed, processing, shipped, delivered, cancelled, refund_initiated, refunded
            $table->timestamp('changed_at')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('order_timelines');
    }
};
