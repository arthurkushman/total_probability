<?php

use PHPUnit\Framework\TestCase;

/**
 * Class FormulaTest
 */
class FormulaTest extends TestCase
{

    /** @var Formula  */
    private $formula = null;

    public function setUp()
    {
        parent::setUp();
        $this->formula = new Formula();
    }

    /**
     * @dataProvider totalProbabilityProvider
     *
     * @param float $commonProb
     * @param array $probs
     */
    public function testTotalProbability(double $commonProb, array $probs)
    {
        $this->formula->totalProbability($commonProb, $probs);
    }

    public function bayesProbability()
    {

    }

    public function totalProbabilityProvider()
    {
        return [
          [0.33, [
              0, 1, 0.45
          ]]
        ];
    }
}