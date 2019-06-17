<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Berexpress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('locations' , function( Blueprint $table ){
        $table->timestamps();
        $table->timestamp('deleted_at')->nullable();
      });
      Schema::table('services' , function( Blueprint $table ){
        $table->timestamps();
        $table->timestamp('deleted_at')->nullable();
      });
      Schema::table('orders' , function( Blueprint $table ){
        $table->timestamps();
        $table->timestamp('deleted_at')->nullable();
      });
      Schema::table('consignements' , function( Blueprint $table ){
        $table->timestamps();
        $table->timestamp('deleted_at')->nullable();
      });
      Schema::table('move_tasks' , function( Blueprint $table ){
        $table->timestamps();
        $table->timestamp('deleted_at')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
