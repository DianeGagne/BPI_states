<?php

declare(strict_types=1);
include_once( "src/State.php");

/**
 * Class StateMachine
 * @package StateMachine\State
 */
class StateMachine
{
    /** @var State $currentState */
    private $currentState;

    public function __construct(){
        $this->initializeStateMachine();
    }

    /**
     * Create subsequent states and initialize their transitions according to the graph:
     * Current state | Input | Result state
       S0            | 0     | S0
       S0            | 1     | S1
       S1            | 0     | S2
       S1            | 1     | S0
       S2            | 0     | S1
       S2            | 1     | S2
     *
     * Set the outputs according to the graph:
     * S0: Starting and final state (output value of 0)
       S1: Final state (output value of 1)
       S2: Final state (output value of 2)
     */
    private function initializeStateMachine(){
        $state0 = new State();
        $state1 = new State();
        $state2 = new State();

        $state0->setTransition(0, $state0);
        $state0->setTransition(1, $state1);
        $state1->setTransition(0, $state2);
        $state1->setTransition(1, $state0);
        $state2->setTransition(0, $state1);
        $state2->setTransition(1, $state2);

        $state0->setFinalState(0);
        $state1->setFinalState(1);
        $state2->setFinalState(2);

        //set the current state
        $this->currentState = $state0;
    }

    /**
     * Once the state machine is set up get the initial state which is linked to all other states
     */
    public function getStates(){
        return $this->currentState;
    }

    /**
     * Run through an input string to get the final state output
     *
     * @param String $transitions
     * @return String
     */
    public function runStateMachine(String $transitions){
        if($this->validateInput($transitions)){

            $length = strlen($transitions);
            for ($i=0; $i<$length; $i++) {
                $this->currentState = $this->currentState->getNextState((int)$transitions[$i]);
            }
            return $this->currentState->getFinalState();
        }

        return 'Invalid Input';
    }

    /**
     * Validate the input string is only 1s and 0s
     * -break it out so we can have separate tests & early validation with errors
     * @param String $transitions
     * @return bool
     */
    public function validateInput(String $transitions){
        if (preg_match('/^[0|1]+$/', $transitions)) {
            return true;
        }
        return false;
    }
}