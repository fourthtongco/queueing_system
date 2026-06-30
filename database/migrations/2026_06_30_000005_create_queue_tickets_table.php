<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('queue_tickets', function (Blueprint $table) {

            $table->id();

            $table->string('ticket_number',20);

            $table->foreignId('department_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('service_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('student_number')->nullable();
            $table->string('student_name')->nullable();

            $table->boolean('priority')->default(false);

            $table->enum('status',[
                'Waiting',
                'Called',
                'Serving',
                'Completed',
                'Cancelled',
                'Skipped'
            ])->default('Waiting');

            $table->date('queue_date');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('queue_tickets');
    }
};
