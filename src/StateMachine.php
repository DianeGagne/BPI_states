<?php

declare(strict_types=1);
include_once( "src/State.php");

/**
 * Class StateMachine
 * @package StateMachine\State
 */
class StateMachine
{
    private $initialState;

    public function __construct(){
        $this->initializeStateMachine();
    }

    /**
     * Create subsequent states and initialize their transitions
     */
    public function initializeStateMachine(){

    }

    /**
     * Run through an input string to get the final state output
     *
     * @param String $transitions
     * @return String
     */
    public function runStateMachine(String $transitions){

    }

    /**
     * Validate the input string is only 1s and 0s
     * @param String $transitions
     * @return bool
     */
    public function validateInput(String $transitions){

        return true;
    }
}