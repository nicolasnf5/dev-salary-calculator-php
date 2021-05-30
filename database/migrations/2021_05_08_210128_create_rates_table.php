<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies');

            $table->enum('seniority', \Domain\Enums\SeniorityEnum::toArray());
            $table->enum('language', \Domain\Enums\LanguageEnum::toArray());
            $table->string('average_salary');
            $table->string('gross_margin');
            $table->string('currency');

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
        Schema::dropIfExists('rates');
    }
}
