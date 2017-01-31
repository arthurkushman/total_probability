## Total probability + Thomas Bayes, Bernoulli distribution formulas

This project was created for those folks who love PHP and either want to have 
a great library to work with Total probability and Bayes, Bernoulli formulas to calculate any real-world tasks on demand.
  
### Examples

#### Total probability 
We have 3 baskets:

1-st basket contains 7 black and 4 white balls
2-nd basket contains only white balls
3-d basket contains only black balls

What's the probability of taking a black ball?

The basket choice is 1/3.

In the 1st basket we've got 7/11(7+4) probability of taking black ball.
In 2nd basket there are only white balls - probability is 0.
In 3d basket there are only black balls - probability is 1.

So we execute ```totalProbability``` method from ```Formula``` class:
```php
$this->formula = new Formula();
$result = $this->formula->totalProbability(1/3, [
    7/11,
    0,
    1
]);
echo $result; 6/11=0.(54)
```

#### Thomas Bayes


#### Bernoulli distribution