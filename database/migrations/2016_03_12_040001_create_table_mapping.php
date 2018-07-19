    <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMapping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapping', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('province_id')->unsigned();;
            $table->integer('category_id')->unsigned();;
            $table->integer('special_interest_id')->unsigned();;
            $table->integer('seasonality_id')->unsigned();;
            $table->integer('budget_id')->unsigned();;
            $table->integer('parties_id')->unsigned();;
            $table->integer('food_interest_id')->unsigned();;
            $table->integer('video_id')->unsigned();;
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('province_id')
                ->references('id')
                ->on('province')
                ->onDelete('cascade');
            
            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');

            $table->foreign('special_interest_id')
                ->references('id')
                ->on('special_interest')
                ->onDelete('cascade');

            $table->foreign('seasonality_id')
                ->references('id')
                ->on('seasonality')
                ->onDelete('cascade');          

            $table->foreign('budget_id')
                ->references('id')
                ->on('budget')
                ->onDelete('cascade');

            $table->foreign('parties_id')
                ->references('id')
                ->on('parties')
                ->onDelete('cascade');

            $table->foreign('food_interest_id')
                ->references('id')
                ->on('food_interest')
                ->onDelete('cascade');

            $table->foreign('video_id')
                ->references('id')
                ->on('video')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mapping');
    }
}
