<?php

namespace SevenManagerBundle\Document\Traits;

use Sonata\BlockBundle\Model\BlockInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\PHPCR\ChildrenCollection;

/**
 * Class CustomChilds
 *
 * @package SevenManagerBundle\Document\Traits
 */
trait CustomChilds
{
    /**
     * @PHPCR\Child(cascade="persist")
     */
    protected $routeChild;

    /**
     * @PHPCR\Child(cascade="persist")
     */
    protected $blockChild;

    /**
     * @return mixed
     */
    public function getRouteChild()
    {
        return $this->routeChild;
    }

    /**
     * @param $routeChild
     *
     * @return $this
     */
    public function setRouteChild($routeChild)
    {
        $this->routeChild = $routeChild;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBlockChild()
    {
        return $this->blockChild;
    }

    /**.
     * @param $blockChild
     * @return $this
     */
    public function setBlockChild($blockChild)
    {
        $this->blockChild = $blockChild;
        return $this;
    }
}
