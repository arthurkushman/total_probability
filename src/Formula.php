<?php

class Formula
{
    /**
     * Thomas Bayes probability
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

    /**
     * Calculates total probability multiplying every discrete probability on common probability
     * @param float $commonProb
     * @param array $probs
     *
     * @return float|int
     */
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