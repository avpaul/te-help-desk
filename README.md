### TECHENFOLD HELPDESK

### Description

TECHENFOLD Helpdesk is a system that helps users of all TechEnfold apps to raise tickets(issues) in a single place. Engineers can reply to user's tickets, if the user is satisfied he/she closes the ticket.

### Built With

-   PHP 7.30.10
-   Laravel 6.2.0
-   PostgreSQL >= 10
-   Mailtrap (SMTP development server)
-   Sendgrid (SMTP production server)

### Installation

-   clone this repo `git clone url`
-   `composer install`
-   run database migration `php artisan migrate`
-   start the server `php artisan serve`
-   start Laravel queue worker to send email in background `php artisan queue:work`

### Deployment

Hosted on Heroku, refer on Heroku [docs](https://devcenter.heroku.com/articles/getting-started-with-laravel)

### Authors

-   [AV Paul](https://github.com/avpaul) - **_initial work_**

### License

**Proprietary** || &copy; **TechEnfold** 2019
