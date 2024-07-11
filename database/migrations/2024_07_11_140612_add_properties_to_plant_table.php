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
        Schema::table('plants', function (Blueprint $table) {
            $table->string("scientific_name");
            $table->string("type");
            $table->string("watering");
            $table->string("sunlight");
            $table->string("growth_rate");
            $table->boolean("edible_fruit");
            $table->integer("poisonous_to_humans");
            $table->integer("poisonous_to_pets");
            $table->longText("description");
            $table->string("image_url");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->dropColumn("scientific_name");
            $table->dropColumn("type");
            $table->dropColumn("watering");
            $table->dropColumn("sunlight");
            $table->dropColumn("growth_rate");
            $table->dropColumn("edible_fruit");
            $table->dropColumn("poisonous_to_humans");
            $table->dropColumn("poisonous_to_pets");
            $table->dropColumn("description");
            $table->dropColumn("image_url");
        });
    }
};
