<?php

namespace SevenManagerBundle\Document\Traits\Fields\PHPCR;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class Child
 *
 * @package SevenManagerBundle\Document\Traits
 */
trait Child
{
    /**
     * @PHPCR\Child(cascade="persist")
     */
    protected $child;

    /**
     * @PHPCR\Child(cascade="persist")
     */
    protected $childOne;

    /**
     * @PHPCR\Child(cascade="persist")
     */
    protected $childTwo;

    /**
     * @PHPCR\Child(cascade="persist")
     */
    protected $childThree;

    /**
     * @return mixed
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * @param $child
     *
     * @return $this
     */
    public function setChild($child)
    {
        $this->child = $child;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildThree()
    {
        return $this->childThree;
    }

    /**
     * @param $childThree
     *
     * @return $this
     */
    public function setChildThree($childThree)
    {
        $this->childThree = $childThree;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildTwo()
    {
        return $this->childTwo;
    }

    /**
     * @param $childTwo
     *
     * @return $this
     */
    public function setChildTwo($childTwo)
    {
        $this->childTwo = $childTwo;
        return $this;
    }
}
