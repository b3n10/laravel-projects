## About Project

....

## Note

When deploying to heroku, make sure to change the '**default**' in _config/database.php_ from '**mysql**' to '**pgsql**' if using Heroku Postgres.
Then after pushing to heroku, run command:
```sh
heroku run php artisan migrate
```

## _config/database.php_
```
$host = env('DB_HOST');
$port = env('DB_PORT');
$database = env('DB_DATABASE');
$username = env('DB_USERNAME');
$password = env('DB_PASSWORD');
$connection = env('DB_CONNECTION', 'pgsql');

if ($db_url = getenv('DATABASE_URL')) {
	$url = parse_url($db_url);
	$host = $url['host'];
	$port = $url['port'];
	$database = ltrim($url['path'], '/');
	$username = $url['user'];
	$password = $url['pass'];
}

...

'default' => $connection,

...

'pgsql' => [
	'driver' => 'pgsql',
	'host' => $host,
	'port' => $port,
	'database' => $database,
	'username' => $username,
	'password' => $password,
	'charset' => 'utf8',
	'prefix' => '',
	'schema' => 'public',
	'sslmode' => 'prefer',
```
