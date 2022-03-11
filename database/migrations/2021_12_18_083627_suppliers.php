<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function(Blueprint $table){
            $table->id();
            $table->string('supplier_name');
            $table->string('phone_number');
            $table->mediumText('supplier_employers');
            $table->string('address');
            $table->string('website_uri');
            $table->string('supplier_email');
            $table->mediumText('supplier_note');
            $table->foreignId('supplier_rating_id')->constrained('supplier_ratings')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->mediumText('supplier_users');
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
        Schema::dropIfExists('suppliers');
    }
}
