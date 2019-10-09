<h1>Welcome to the Finite State Automata!</h1>
<p>Please enter a string including only 1's and 0's to determine the final state output</p>

<form action="index.php" method="post">
    State Input: <input type="text" name="states">
    <input type="submit">
</form>

<?php
/**
 * Use a simple html entry form to test the state machine.
 * It will display the final state output for any valid input, otherwise it will give an 'Invalid Input' as the final state output
 */

if (isset($_POST["states"])) {
    include_once("src/StateMachine.php");

    $state = $_POST["states"];

    echo 'You entered:';
    echo $state . '<br>';

    $stateMachine = new StateMachine();
    $output = $stateMachine->runStateMachine($state);
    echo('The final state output is: ' . $output . "\n");
}