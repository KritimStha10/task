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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('Child_First_Name');
            $table->string('Child_Middle_Name');
            $table->string('Child_Last_Name');
            $table->integer('Child_Age');
            $table->enum('Gender',['male','female','other'])->default('male');
            $table->string('Child_Address')->nullable();
            $table->string('Child_City')->nullable();
            $table->string('Child_State')->nullable();
            $table->enum('Country',['usa','nepal','japan','canada','australia','other'])->nullable();
            $table->integer('Child_Zip_Code')->nullable();
            $table->enum('status',[0,1,2])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
