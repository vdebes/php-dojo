# PHP Dojo

This is an attempt to create fast and fun coding dojos. The goal is to find very straightforward illustrations for coding concepts like SOLID, design patterns, hexagonal architecture, DDD, within a fake project.

## How to play
Each subdirectory of [/src](./src) is a dojo by itself. It __MUST__ be performed using TDD.

### Rules of TDD
1. You can’t write any production code until you have first written a failing unit test.
2. You can’t write more of a unit test than is sufficient to fail, and not compiling is failing.
3. You can’t write more production code than is sufficient to pass the currently failing unit test.

They constrain us to change only one thing at a time.

## Tooling

* PHPUnit for unit tests
* PHPStan for static analysis
* PHPCodeSniffer for code style

All commands are described using ```make help```
