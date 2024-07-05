<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

// راه‌اندازی لاراول
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

// گرفتن اتصال به دیتابیس
$pdo = DB::connection()->getPdo();

// گرفتن لیست جداول
$tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

foreach ($tables as $tableName) {
  echo "Generating seed for table: $tableName\n";
  Artisan::call('iseed', ['tables' => $tableName, '--force' => true]);
}

echo "All seeds generated successfully.";
