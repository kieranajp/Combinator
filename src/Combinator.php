<?php

namespace Kieranajp\Combinator;

/**
 * Class Combinator
 * Finds all possible combinations of a specific size within an array.
 *
 * @package Kieranajp\Combinator
 */
class Combinator implements \Iterator
{
    /** @var array */
    protected $counter = [];

    /** @var array */
    protected $choices;

    /** @var int */
    protected $size = 0;

    /** @var int */
    protected $position = 0;

    /**
     * Set up an instance of Combinator to return sets of `$size` from an array of `$choices`.
     *
     * @param array $choices
     * @param int $size
     */
    public function __construct(array $choices, int $size = 0)
    {
        $this->choices = array_values($choices);
        $this->size = $size > 0 ? $size : count($choices);
        $this->rewind();
    }

    /**
     * {@inheritdoc}
     */
    public function key() : int
    {
        return $this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function current() : array
    {
        $current = [];
        for ($i = 0; $i < $this->size; $i++) {
            $current[] = $this->choices[$this->counter[$i]];
        }
        return $current;
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        if ($this->hasNext()) {
            $this->position++;
        } else {
            $this->position = -1;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->counter = range(0, $this->size);
        $this->position = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function valid() : bool
    {
        return $this->position >= 0;
    }

    /**
     * Check that a valid set of three still exists in the provided array.
     *
     * @return bool
     */
    protected function hasNext() : bool
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
