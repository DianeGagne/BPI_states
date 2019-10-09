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
    private $transitionState = [];
    private $finalState = null;

    /**
     * @param int $transition
     * @param State $nextState
     */
    public function setTransition(int $transition, State $nextState){
        $this->transitionState[$transition] = $nextState;
    }

    public function setFinalState(int $finalState){
        $this->finalState = $finalState;
    }

    /**
     * Get the next state with the given input
     * @param int $input
     * @return State
     */
    public function getNextState(int $input){
        if(isset($this->transitionState[$input])){
            return $this->transitionState[$input];
        }
        return $this;
    }

    /**
     * Get the output if this is the final state
     */
    public function getFinalState(){
        if(isset($this->finalState)){
            return (String) $this->finalState;
        }
        return 'Invalid Input';
    }
}