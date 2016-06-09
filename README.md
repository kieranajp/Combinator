# Combinator

**Generates combinations of a set**

A combination is a set of size _k_ from a number of values > _k_ that does not repeat.

For example, given the values `Jim, Jane, Bob, Susan, Ralph`, all the possible combinations of size `3` are as follows:

```
Jim, Jane, Bob
Jim, Jane, Susan
Jim, Jane, Ralph
Jim, Bob, Susan
Jim, Bob, Ralph
Jim, Susan, Ralph
Jane, Bob, Susan
Jane, Bob, Ralph
Jane, Susan, Ralph
Bob, Susan, Ralph
```

(credit to [this awesome calculator](http://www.statisticshowto.com/calculators/permutation-calculator-and-combination-calculator/) for the example).

## Installation

`composer require kieranajp/combinator`

## Usage

The provided `Combinator` class is an instance of [`Iterator`](http://php.net/manual/en/class.iterator.php), so combinations can be collected by looping over it.

For example:

```php
use Kieranajp\Combinator\Combinator;

$size = 3;
$combinator = new Combinator([1, 2, 3, 4, 5], $size);

$items = [];
foreach ($c as $item) {
    $items[] = $item;
}
```

The `$items` array will now contain all possible combinations of size `$size`.

## Contributing & Roadmap

Pull requests are welcome. Please adhere to PSR-2. I intend to add a Permutator to this package, as well.

## License

MIT License

Copyright (c) 2016 Kieran Patel

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
