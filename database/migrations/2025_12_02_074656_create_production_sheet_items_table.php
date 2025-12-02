<?php

use App\Models\Item;
use App\Models\ProductionSheet;
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
        Schema::create('production_sheet_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProductionSheet::class);
            $table->foreignIdFor(Item::class);
            $table->integer('quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_sheet_items');
    }
};
