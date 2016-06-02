<?php

namespace Example;

class BlackBox
{
    private $isHappy = true;

    public function multiply(float $input, float $factor){
        return $input * $factor;
    }

    public function untested()
    {
        // This function does nothing, but highlights that code that is un-run is code that is counted as such.
        return false;
    }

    public function makeADecision()
    {
        if($this->isHappy){
            return "I am happy.";
        }else{
            return "I am sad.";
        }
    }

    public function makeADoohicker()
    {
        return new Doohicker();
    }
}