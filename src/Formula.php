<?php
namespace tp;

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
     * @param double|float $commonProb
     * @param array        $probs
     *
     * @return float|int
     */
    public function totalProbability($commonProb, array $probs)
    {
        $result = 0;
        foreach($probs as $val)
        {
            $result += $commonProb * $val;
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