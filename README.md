# Simple Quiz

This is some code I wrote as part of a job interview.

We're using:

* Laravel 6 => https://laravel.com/docs/6.x along with it's associated [requirements](https://laravel.com/docs/6.x#server-requirements) 
* Laravel Breadcrumbs => https://github.com/davejamesmiller/laravel-breadcrumbs
* Not included here but recommended for development is [laravel-debugbar](https://github.com/barryvdh/laravel-debugbar) or [laravel-telescope](https://laravel.com/docs/6.x/telescope)

#### Install Instructions:

1) clone repo
2) composer install (or update - recommended) - install the rest of the required code
3) create your database (mysql)
4) copy .env.example to .env
5) php artisan key:generate - set the application key 
6) edit .env to set your db name and credentials
7) php artisan migrate (or migrate:refresh to clear tables) - run migrations to create tables

### Demo:

[BID-Quiz](http://unclerico82.com) - check it out - this will probably be temporary

#### Notes:

Not here:

- Any type of Auth / Security - beyond the scope of this exercise.
- Cascading deletes - was going to add them but don't have time at the moment - may come back and add them just because it bugs me that they're not there.

You can create a quiz using the dashboard link at the top right.
The workflow is simple:
Create a Quiz, then add questions, then add options / answers.
There can olny be one correct answer per question.

Once you have created a quiz click the Home link at the top left and your quiz should show up in the list.

Your answers are stored in the session so there is a chance that it could get out of whack (this is not a real app of course).  If you run into any problems you can just clear your cookies for the site and you should be fine.  When you complete the quiz your session is cleared so you can re-take the quiz or take another.  It's not smart enough to pick up where you left off if you quit before you complete the quiz or anything like that.

#### Tests:

No tests for this app at the moment.

#### License:

[MIT license](http://opensource.org/licenses/MIT)
