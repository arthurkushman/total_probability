<?php
namespace tp;

use tp\exception\InvalidArgumentsException;

class Formula
{
    /**
     * Thomas Bayes probability
     *
     * @param float $hypothesisProb
     * @param float $condProb
     * @param float $totalProb
     *
     * @return float
     */
    public function bayesProbability($hypothesisProb, $condProb, $totalProb)
    {
        return $hypothesisProb * $condProb / $totalProb;
    }

    /**
     * Calculates total probability multiplying every discrete probability on common probability
     *
     * @param array $factors
     * @param array $probs
     * @return float|int
     * @throws InvalidArgumentsException
     */
    public function totalProbability(array $factors, array $probs)
    {
        $result = 0;
        if(count($factors) !== count($probs))
        {
            throw new InvalidArgumentsException('Arrays $factors and $probs should match.');
        }
        foreach($probs as $key => $probability)
        {
            $result += (double) $factors[$key] * (double) $probability;
        }

        return $result;
    }

    /**
     * Bernulli's Formula - probability of x-times in n experiments
     * Pmn = Cmn * p^m * q^n-m
     *
     * @param $experimentsNum
     * @param $successExpectations
     * @param $successForEach
     *
     * @return float
     */
    public function independentProbability($experimentsNum, $successExpectations, $successForEach)
    {
        return $this->combinations($experimentsNum, $successExpectations)
        * ($successForEach ** $successExpectations) *
        ((1 - $successForEach) ** ($experimentsNum - $successExpectations));
    }

    /**
     * Calculate Combinatorial combinations
     * Cmn = m! / (m-n)! * n!
     *
     * @param int $m
     * @param int $n
     *
     * @return float
     */
    private function combinations(int $m, int $n)
    {
        return $this->fact($m) / ($this->fact($m - $n) * $this->fact($n));
    }

    /**
     * @param int $n
     *
     * @return int
     */
    private function fact(int $n)
    {
        if($n > 1)
        {
            return $n * $this->fact($n - 1);
        }
        else
        {
            return 1;
        }
    }
}