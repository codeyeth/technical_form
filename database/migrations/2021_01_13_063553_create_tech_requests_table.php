<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechRequestsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('tech_requests', function (Blueprint $table) {
            $table->id();
            
            //REQUEST
            $table->string('ts_no');
            $table->string('date'); 
            $table->string('req_div');
            $table->string('req_emp');
            $table->string('prob_cat');
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->timestamp('requested_at')->nullable();
            
            //REPLY TO REQUEST
            $table->string('attended_by')->nullable();
            $table->string('attended_at')->nullable();
            $table->text('status_report')->nullable();
            $table->text('status')->nullable();
            
            $table->boolean('is_replied')->default(false);
            $table->timestamp('is_replied_at')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamp('completed_at')->nullable();
            
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
        Schema::dropIfExists('tech_requests');
    }
}
