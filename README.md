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
$result = $this->formula->totalProbability(
    [0.33, 0.33, 0.33],
    [0, 1, 0.45],
]);
echo $result; // 6/11=0.(54)
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

Overall items at the warehouse: 4000 + 6000 = 10000 -> 4000/10000 = 0.4, 6000/10000 = 0.6

Check: 0.4+0.6=1

- 1st party has standard items -> 100% - 20% = 80% standard items -> 80/100 = 0.8

- 2nd party has standard items -> 100% - 10% = 90% standard items -> 90/100 = 0.9

Using total probability formula:
```php
$this->formula = new Formula();
$result = $this->formula->totalProbability([0.4, 0.8], [
    0.8,
    0.9
]);
echo $result; // 0.86
```
We've got the probability, that the any picked item will be standard. 

Then using Bayes formula:
```php
$result = $this->formula->bayesProbability(0.4, 0.8, 0.86);
echo $result; // 0.37
```
We've got a probability, that the selected standard item will be related to 1st party.

```php
$result = $this->formula->bayesProbability(0.6, 0.9, 0.86);
echo $result; // 0.63
```
We've got a probability, that the selected standard item will be related to 2nd party.

Check: 0.37+0.63=1

#### Bernoulli distribution

Find the probability, that within 10 flips of a coin tails will result in 3 times.
 
Using combinatorial combinations function 10! / 7! * 3! = 120 and combining it with Bernoulli distribution formula - getting the result:

```php
$result = $this->formula->independentProbability(10, 3, 0.5);
echo $result; // 0.1171875
```
We've got a probability, that withing 10 flips of a coin tails will result in 3 times.
