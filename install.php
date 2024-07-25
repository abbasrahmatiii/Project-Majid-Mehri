<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db_host = $_POST['db_host'];
    $db_database = $_POST['db_database'];
    $db_username = $_POST['db_username'];
    $db_password = $_POST['db_password'];

    $env_content = file_get_contents('.env.example');
    $env_content = str_replace([
        'DB_HOST=127.0.0.1',
        'DB_DATABASE=laravel',
        'DB_USERNAME=root',
        'DB_PASSWORD=',
    ], [
        "DB_HOST=$db_host",
        "DB_DATABASE=$db_database",
        "DB_USERNAME=$db_username",
        "DB_PASSWORD=$db_password",
    ], $env_content);

    file_put_contents('.env', $env_content);

    shell_exec('php artisan key:generate');
    shell_exec('php artisan migrate');
    shell_exec('php artisan db:seed');
    shell_exec('php artisan config:cache');
    shell_exec('php artisan route:cache');

    echo "Installation completed successfully!";
}
?>

<form method="post">
    <label for="db_host">DB Host:</label>
    <input type="text" id="db_host" name="db_host"><br><br>
    <label for="db_database">DB Database:</label>
    <input type="text" id="db_database" name="db_database"><br><br>
    <label for="db_username">DB Username:</label>
    <input type="text" id="db_username" name="db_username"><br><br>
    <label for="db_password">DB Password:</label>
    <input type="password" id="db_password" name="db_password"><br><br>
    <input type="submit" value="Install">
</form>
