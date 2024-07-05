<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

// راه‌اندازی لاراول
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

// گرفتن لیست جداول از دیتابیس
$tables = DB::select('SHOW TABLES');

// نام ستون که شامل نام جداول است بسته به نوع دیتابیس ممکن است متفاوت باشد
$columnName = 'Tables_in_your_database_name'; // نام صحیح ستون را جایگزین کنید

foreach ($tables as $table) {
  $tableName = $table->$columnName;
  echo "Generating seed for table: $tableName\n";
  Artisan::call('iseed', ['tables' => $tableName, '--force' => true]);
}

echo "All seeds generated successfully.";
