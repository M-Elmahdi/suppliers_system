<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SupplierActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_activities', function(Blueprint $table){
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreignId('activity_id')->constrained('activities')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_activities');
    }
}
