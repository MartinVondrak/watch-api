# Watch API

This is a brief summary for application that was created to demonstrate some skills
to get a PHP developer position at Spendee/Valatron. The description of the task can
be found in [docs/task.pdf](docs/task.pdf).

## Author's comment

Please note, that implementation of interfaces marked as required to use are not
subject to evaluate, therefore the implementation itself is just dummy to provide
some data.

This has some consequences:

- watch is not actually persistent resource,
- only watch with the identifier divisible by 3 is found,
- other identifiers are used to simulate processing errors
or missing resources (resulting in 404 Not found).

I believe, none of the consequences mentioned above will affect the evaluation
of the task as the main goal was to integrate provided interfaces with caching
support.

## Usage

### Prerequisites

- PHP 7.4
- Composer

### Running locally

In the folder with project, run following commands. 

```bash
$ composer install
$ vendor/bin/phpstan analyse -c phpstan.neon
$ php -S 0.0.0.0:8000 -t public/
```

Then open your browser and go to
[http://localhost:8000/watch/1](http://localhost:8000/watch/1) and
[http://localhost:8000/watch/3](http://localhost:8000/watch/3).
