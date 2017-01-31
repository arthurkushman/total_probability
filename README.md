## Total probability + Thomas Bayes, Bernoulli distribution formulas

This project was created for those folks who love PHP and either want to have 
a great library to work with Total probability and Bayes, Bernoulli formulas to calculate any real-world tasks on demand.
  
### Examples

#### Total probability 
We have 3 baskets:

- 1-st basket contains 7 black and 4 white balls

- 2-nd basket contains only white balls

- 3-d basket contains only black balls

What's the probability of taking a black ball?

The basket choice is 1/3.

- In the 1st basket we've got 7/11(7+4) probability of taking black ball.

- In 2nd basket there are only white balls - probability is 0.

- In 3d basket there are only black balls - probability is 1.

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
At the warehouse came 2 party products:
- 1st - 4000 items
- 2nd - 6000 items

The percent of a non-standard items in 1st party is 20%

The percent of a non-standard items in 1st party is 10%

Randomly taken item of two parties turned out to be standard - what's the probability 
relation of this item to 1st and 2nd party.  

Part 1:

Overall items at the warehouse: 4000 + 6000 = 10000 -> 4000/10000 = 0.4, 6000/10000 = 0.8

- 1st party has standard items -> 100% - 20% = 80% standard items -> 80/100 = 0.8

- 2nd party has standard items -> 100% - 10% = 90% standard items -> 90/100 = 0.9

Using total probability formula:
```php
$this->formula = new Formula();
$result = $this->formula->totalProbability(1/3, [
    7/11,
    0,
    1
]);
echo $result; 6/11=0.(54)
```

#### Bernoulli distribution