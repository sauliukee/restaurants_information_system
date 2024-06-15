<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddRestaurantIdToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Disable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            // Add restaurant_id column
            $table->unsignedBigInteger('restaurant_id')->nullable()->after('id');

            // Update existing records with a default restaurant_id
            DB::table('reservations')->update(['restaurant_id' => 1]); // Replace 1 with a valid restaurant ID

            // Modify the column to be non-nullable and add foreign key constraint
            $table->unsignedBigInteger('restaurant_id')->nullable(false)->change();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Disable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            // Drop foreign key constraint and column
            $table->dropForeign(['restaurant_id']);
            $table->dropColumn('restaurant_id');

            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });
    }
}
