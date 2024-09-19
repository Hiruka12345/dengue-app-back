<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoordinatesToReportsTable extends Migration
{
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->decimal('longitude', 10, 7)->nullable()->after('area');
            $table->decimal('latitude', 10, 7)->nullable()->after('longitude');


            
        });
    }

    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn(['longitude', 'latitude']);
        });
    }
}
