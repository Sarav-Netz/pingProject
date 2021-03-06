<?php

use App\Models\taskCategories;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->increments('task_id');
            $table->text('task_title');
            $table->longText('task_detail');
            $table->foreignId('user_id')->constrained('users','user_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('task_category_id')->constrained('task_categories','task_category_id')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('user_tasks');
    }
}
