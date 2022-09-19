# Laravel/React/Redux demo

This is an ultra-simple demo app using Laravel 9, React & Redux

* Note that I have not had the opportunity to do TDD (test-driven development) before; This is my first attempt
* The project took around 10 hours to throw together, this included learning TDD and Redux
* I haven't used the standard auth flow for Laravel as everything is taken care of via ajax calls from the react app
* I would never normally store bank account details. As this was specifically mentioned in the project scope I have:
  * Seeded bank account details
  * Ensured no full bank details are leaked to the outside
  * Used redacted bank account details for display
* I have used Laravel sail for the first time during development; This is instead of using homestead as I have previously
* My focus here was on logic and security, so forgive the somewhat basic styling using Bootstrap via a CDN!

# Default Users

* You will need to run `artisan migrate:fresh --seed` in order to seed users and bank accounts
* 100 users will be seeded in total
* The password for all users defaults to `password` for simplicity
* You can log in using either `admin@example.com` or `user@example.com` to see the two types of users across four roles
