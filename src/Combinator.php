<?php

namespace Kieranajp\Combinator;

class Combinator implements \Iterator
{
    protected $counter;
    protected $choices;
    protected $size = 0;
    protected $position = 0;

    public function __construct(array $choices, int $size = 0)
    {
        $this->choices = array_values($choices);
        $this->size = $size > 0 ? $size : count($choices);
        $this->rewind();
    }

    public function key()
    {
        return $this->position;
    }

    public function current()
    {
        $r = [];
        for ($i = 0; $i < $this->size; $i++) {
            $r[] = $this->choices[$this->counter[$i]];
        }
        return is_array($this->choices) ? $r : implode('', $r);
    }

    public function next()
    {
        if ($this->hasNext()) {
            $this->position++;
        } else {
            $this->position = -1;
        }
    }

    public function rewind()
    {
        $this->counter = range(0, $this->size);
        $this->position = 0;
    }

    public function valid()
    {
        return $this->position >= 0;
    }

    protected function hasNext()
    {
        $i = $this->size - 1;
        while ($i >= 0 && $this->counter[$i] == count($this->choices) - $this->size + $i) {
            $i--;
        }

        if ($i < 0) {
            return false;
        }

        $this->counter[$i]++;
        while ($i++ < $this->size - 1) {
            $this->counter[$i] = $this->counter[$i - 1] + 1;
        }

        return true;
    }
}
