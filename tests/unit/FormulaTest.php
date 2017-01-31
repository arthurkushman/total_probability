<?php
namespace tptests;

use PHPUnit\Framework\TestCase;
use tp\Formula;

/**
 * Class FormulaTest
 */
class FormulaTest extends TestCase
{

    /** @var Formula formula */
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
     *
     */
    public function testTotalProbability($commonProb, array $probs, $expected)
    {
        $result = $this->formula->totalProbability($commonProb, $probs);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider bayesProbabilityProvider
     *
     * @param $hypothesisProb
     * @param $condProb
     * @param $totalProb
     * @param $expected
     */
    public function testBayesProbability($hypothesisProb, $condProb, $totalProb, $expected)
    {
        $result = $this->formula->bayesProbability($hypothesisProb, $condProb, $totalProb);
        $this->assertEquals($expected, $result);
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

    public function bayesProbabilityProvider()
    {
        return [
            [
                0.4, 0.8, 0.4785, 0.66875653082549646
            ]
        ];
    }
}