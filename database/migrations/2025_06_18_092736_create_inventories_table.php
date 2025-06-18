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
        Schema::create('inventories', function (Blueprint $table) {

                $table->id();
                $table->unsignedBigInteger('category_id')->index();
                $table->string('name');
                $table->integer('quantity');
                $table->text('notes')->nullable();
                $table->unsignedBigInteger('organization_id')->index();
                $table->unsignedBigInteger('user_id')->index();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
