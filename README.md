# This is a campaign app.
## We are going to use Laravel, React.

## Server Requirements
- PHP >= 8.0
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Redis PHP Extension


## Installation Instructions

### Clone the repo

- Run `composer install`
- Run `cp .env.example .env`
- Run `php artisan key:generate`
- Set your database configration to .env
- Run `php artisan migrate`
- If you need demo data run `php artisan db:seed`
- Set your mail server configuration
- Set QUEUE_CONNECTION= redis or database
- Make sure all configuration correct


## Run Application
- Run `php artisan serve`
- Run `php artisan queue:work`
- Run `php artisan schedule:work`


