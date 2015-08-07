# TDD Coding Kata Skeleton

The purpose of this project is to provide a simple setup with the tools needed to start writing code using 
[TDD](https://en.wikipedia.org/wiki/Test-driven_development) (Test Driven Development). With practice, the 
aim is to be able to write good tests and end up with clean, working code. Remember

## Instructions

### Creating a project

Simply install the project from composer. If you don't have it, you should download it from [here](https://getcomposer.org/download/).

The directory that you install the project into should be based on the exercise that you wish to complete. e.g. "string-calculator".

```
composer create-project robmasters/coding-kata-skeleton [name-of-exercise] dev-master
```

### Running tests

It is up to you which library you wish to use to write your tests. This project comes set up with PHPUnit and PhpSpec and 
an example test for each. To execute the tests, run either of the following from the root directory of your project:

```
$ ./vendor/bin/phpspec run
$ ./vendor/bin/phpunit
```

## Exercises

* [String Calculator](exercises/string_calculator.md)
