<?php

declare(strict_types=1);

/**
 * Setup and control a single state in a state machine
 *
 * All transitions return to itself if a state is not set
 *
 * Class State
 * @package StateMachine\State
 */
class State
{
    private $zeroTransition;
    private $oneTransition;
    private $finalState;

    /**
     * @param State $zeroResult
     * @param State $oneResult
     * @param int $finalState - set to null if a final state is not allowed
     */
    public function setTransitions(State $zeroResult, State $oneResult, int $finalState = null){

    }

    /**
     * Get the next state with the given input
     * @param int $input
     */
    public function getNextState(int $input){

    }

    /**
     * Get the output if this is the final state
     */
    public function getFinalState(){

    }
}