<?php
// database/migrations/xxxx_xx_xx_add_session_link_to_reservations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSessionLinkToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('session_link')->nullable()->after('status'); // جایگزین 'some_existing_column' با ستونی که می‌خواهید بعد از آن اضافه کنید
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('session_link');
        });
    }
}
