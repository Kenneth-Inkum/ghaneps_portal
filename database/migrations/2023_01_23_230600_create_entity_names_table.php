<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_names', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->contrained();
            $table->foreignId('entity_category_id')->nullable()->constrained();
            $table->string('entity_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_names');
    }
};
