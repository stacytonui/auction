<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBiddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biddings', function (Blueprint $table) {
            $table->bigInteger('auction_id')->nullable()->unsigned();
            $table->foreign('auction_id')
                ->references('id')->on('auctions')
                ->onDelete('cascade');
            $table->bigInteger('bidder_id')->nullable()->unsigned();
            $table->foreign('bidder_id')
                ->references('id')->on('bidders')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biddings', function (Blueprint $table) {
            //
        });
    }
}
