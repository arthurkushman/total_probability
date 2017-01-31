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
     * @param array $factors
     * @param array $probs
     * @param $expected
     * @throws \tp\exception\InvalidArgumentsException
     */
    public function testTotalProbability(array $factors, array $probs, $expected)
    {
        $result = $this->formula->totalProbability($factors, $probs);
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

    /**
     * @dataProvider bernullisProvider
     *
     * @param $experimentsNum
     * @param $successExpectations
     * @param $successForEach
     * @param $expected
     */
    public function testBernullisProbability($experimentsNum, $successExpectations, $successForEach, $expected)
    {
        $result = $this->formula->independentProbability($experimentsNum, $successExpectations, $successForEach);
        $this->assertEquals($expected, $result);
    }

    public function totalProbabilityProvider()
    {
        return [
            [
                [0.33, 0.33, 0.33],
                [0, 1, 0.45],
                0.4785,
            ],
        ];
    }

    public function bayesProbabilityProvider()
    {
        return [
            [
                0.4, 0.8, 0.4785, 0.66875653082549646,
            ],
        ];
    }

    public function bernullisProvider()
    {
        return [
            [
                10, // overall amount of experiments ex.: 10 times flip a coin
                3, // amount of successive expectations
                0.5, // each time probability 1/2 heads or tails
                0.1171875,
            ],
        ];
    }
}