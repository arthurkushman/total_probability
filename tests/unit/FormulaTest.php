<?php
namespace tptests;

use PHPUnit\Framework\TestCase;
use tp\Formula;

/**
 * Class FormulaTest
 */
class FormulaTest extends TestCase
{

    /** @var Formula */
    private $formula = null;

    public function setUp()
    {
        parent::setUp();
        $this->formula = new Formula();
    }

    /**
     * @dataProvider totalProbabilityProvider
     *
     * @param double|float $commonProb
     * @param array        $probs
     */
    public function testTotalProbability($commonProb, array $probs, $expected)
    {
        $result = $this->formula->totalProbability($commonProb, $probs);
        $this->assertEquals($expected, $result);
    }

    public function bayesProbability()
    {
    }

    public function totalProbabilityProvider()
    {
        return [
            [
                0.33, [
                0, 1, 0.45
            ], 0.4785
            ]
        ];
    }
}