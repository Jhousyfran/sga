<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateProvidersTable extends Migration
{

    use SoftDeletes;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cnpj')->unique();
            $table->string('address_postal_code');
            $table->string('address_state');
            $table->string('address_city');
            $table->string('address_district');
            $table->string('address_street');
            $table->string('address_number');
            $table->string('password');
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
        Schema::dropIfExists('providers');
    }
}
