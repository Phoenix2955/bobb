<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->charset('utf8mb4');
            $table->string('postcode', 255)->charset('utf8mb4');
            $table->string('city', 255)->charset('utf8mb4');
            $table->string('adress', 255)->charset('utf8mb4');
            $table->foreignId('generalContractor')->constrained('organization');
            $table->foreignId('contractor')->constrained('organization');
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
        Schema::dropIfExists('contract');
    }
}