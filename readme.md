## About Project

Chat application using VueJS and Pusher

## Note

When deploying to heroku, make sure to change the '**default**' in _config/database.php_ from '**mysql**' to '**pgsql**' if using Heroku Postgres.
Then after pushing to heroku, run command:
```sh
heroku run php artisan migrate
```

## Todo

Deploy app in Heroku
