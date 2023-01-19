<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        
        DB::table('categories')->insert([
            [
                'id'               => '1',
                'name'              => 'administrador',
            ],

            [
                'id'               => '2',
                'name'              => 'usuario',
            ],

            [
                'id'               => '3',
                'name'              => 'usuarioPrioritario',
            ],

            [
                'id'               => '4',
                'name'              => 'superusuario',
            ],
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
