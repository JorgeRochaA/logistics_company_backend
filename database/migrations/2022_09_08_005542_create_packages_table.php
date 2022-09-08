<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('details');
            $table->string('weight');
            $table->string('delivery_from');
            $table->string('delivery_to');
            $table->foreignId("fk_id_customer")->references("id_customer")->on("customers")->onDelete("cascade");
            $table->foreignId("fk_id_status")->references("id")->on("status")->onDelete("cascade")->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
