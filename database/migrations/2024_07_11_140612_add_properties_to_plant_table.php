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
            $table->integer("api_id")->nullable();
            $table->longText("scientific_name")->nullable();
            $table->string("type")->nullable();
            $table->string("watering")->nullable();
            $table->longText("sunlight")->nullable();
            $table->string("growth_rate")->nullable();
            $table->boolean("edible_fruit")->default(false);
            $table->integer("poisonous_to_humans")->nullable();
            $table->integer("poisonous_to_pets")->nullable();
            $table->text("description")->nullable();
            $table->text("image_url")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->dropColumn("api_id");
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
