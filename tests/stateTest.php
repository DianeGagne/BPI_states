<?php

declare(strict_types=1);
include_once( "src/State.php");


class stateTest extends \PHPUnit\Framework\TestCase
{

    /**
     * When a state has not been set up, give a default value of returning itself and invalid final state
     */
    public function testNonSetUpState()
    {
        $state = new State();

        //getting the next state of 0 or 1 gives back itself
        $nextState = $state->getNextState(0);
        $this->assertEquals($state, $nextState);

        $nextState = $state->getNextState(0);
        $this->assertEquals($state, $nextState);

        //getting the final state if it is not setup returns 'invalid input'
        $finalState = $state->getFinalState();
        $this->assertEquals('Invalid Input', $finalState);
    }

    /**
     * When transitions are set up the zero transition is found
     */
    public function testZeroStateTransition()
    {
        $state = new State();
        $transitionState = new State();

        //Initialize a transition on the zero state
        $state->setTransition(0, $transitionState);

        //test the zero transition gives the new state & the 1 transition does not
        $nextState = $state->getNextState(0);
        $this->assertEquals($transitionState, $nextState);

        $nextState = $state->getNextState(1);
        $this->assertEquals($state, $nextState);
    }

    /**
     * When transitions are set up the one transition is found
     */
    public function testOneStateTransition()
    {
        $state = new State();
        $transitionState = new State();

        $state->setTransition(1, $transitionState);

        //test the zero transition gives the same state and the 1 transition gives the new state
        $nextState = $state->getNextState(0);
        $this->assertEquals($state, $nextState);

        $nextState = $state->getNextState(1);
        $this->assertEquals($transitionState, $nextState);
    }

    /**
     * When transitions are set up test the final state output is found
     */
    public function testFinalStateOutput()
    {
        $state = new State();

        $state->setFinalState(2);
        $finalState = $state->getFinalState();

        $this->assertEquals('2', $finalState);
    }

}