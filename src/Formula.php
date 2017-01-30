<?php

class Formula
{
    /**
     * Thomas Bayes
     *
     * @param float $hypothesisProb
     * @param float $condProb
     * @param float $commonProb
     *
     * @return float
     */
    public function bayesProbability(double $hypothesisProb, double $condProb, double $commonProb)
    {
        return $hypothesisProb * $condProb / $commonProb;
    }

    public function totalProbability(double $commonProb, array $probs)
    {
        $result = 0;
        foreach($probs as $val)
        {
            $result += $commonProb * $val;
        }

        return $result;
    }
}