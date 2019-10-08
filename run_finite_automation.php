<?php
/**
 * Run this from the command line - setup the state machine & input the string to get the output
 */

include_once( "src/StateMachine.php");

$stateMachine = new StateMachine();
$input = readline('Enter a series of 1s & 0s for the state automation to interpret ');
while(!$stateMachine->validateInput()) {
    $input = readline("I'm sorry that input is not valid.  Please enter a string containing only 0s and 1s ");
}
$output = $stateMachine->runStateMachine($input);