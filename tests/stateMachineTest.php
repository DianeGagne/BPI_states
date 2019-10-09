<?php

declare(strict_types=1);
include_once( "src/StateMachine.php");

class stateMachineTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Assert the states are setup and real states on state machine construction
     */
    public function testSetupState(){
        $machine = new StateMachine();

        $states = $machine->getStates();
        $this->assertInstanceOf(State::class, $states);
    }

    /**
     * Test the given input example 1
     */
    public function testInputExample1(){
        $machine = new StateMachine();

        $testString = '110';
        $machineOutput = $machine->runStateMachine($testString);

        $this->assertEquals('0', $machineOutput);
    }

    /**
     * Test the given input example 2
     */
    public function testInputExample2(){
        $machine = new StateMachine();

        $testString = '1010';
        $machineOutput = $machine->runStateMachine($testString);

        $this->assertEquals('1', $machineOutput);
    }

    /**
     * Test we will receive an error message if we enter a transition string that does not include 1's and 0's
     */
    public function testInvalidString(){
        $machine = new StateMachine();

        $testString = '10102';
        $machineOutput = $machine->runStateMachine($testString);

        $this->assertEquals('Invalid Input', $machineOutput);
    }

    /**
     * Test the state machine input rejects anything unwanted
     */
    public function testValidateInputStringInvalid(){
        $machine = new StateMachine();

        $invalidString1 = '103';
        $invalidString2 = ' 11';
        $invalidString3 = 'ab';
        $invalidString4 = '';
        $invalidString5 = '#01';
//        $invalidString6 = 10; this does not need to be explicitly tested because we are using strict typing

        $this->assertFalse($machine->validateInput($invalidString1), 'Did not validate string '.$invalidString1);
        $this->assertFalse($machine->validateInput($invalidString2), 'Did not validate string '.$invalidString2);
        $this->assertFalse($machine->validateInput($invalidString3), 'Did not validate string '.$invalidString3);
        $this->assertFalse($machine->validateInput($invalidString4), 'Did not validate string '.$invalidString4);
        $this->assertFalse($machine->validateInput($invalidString5), 'Did not validate string '.$invalidString5);

    }

    /**
     * Test the state machine input accepts valid strings
     */
    public function testValidateInputStringValid(){
        $machine = new StateMachine();

        $validString = '11110';

        $this->assertTrue($machine->validateInput($validString));
    }

}