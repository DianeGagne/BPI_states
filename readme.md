# Take home assignment - Finite State Automata

This program creates a finite state automata as defined in requrements.txt.  It will accept an entry, and if the entry is valid traverse the finite state automata to find the eventual output.

This program was completed using PHP7.3.4.
Because strict typing is being used, it is only compatible with php 7.0 and above.

## How to run:
This application can be run in two ways: command line, or through a web browser.  It requires php 7.0 or greater installed.

### Command line:
1. Clone the repository
2. Navigate to the BPI_states directory
3. Use `php run_command_line.php` to run the program
4. You will be prompted to enter a string to test - enter a string with all 1's and 0's
5. If the string was valid you will see the output, otherwise you will see 'Invalid Input' and be prompted to enter another string

### Web browser:
1. Clone the repository
2. Navigate your browser to index.php
3. Enter a string in the input box and submit
4. If the string was valid you will see the string below with the output, otherwise you will see the string below with 'Invalid Input' displayed

### How to test:
1. Clone the project
2. Run `composer install` to install phpunit
3. Navigate to the BPI_states directory and run `vendor/bin/phpunit`

