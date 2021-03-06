<?php

namespace SevenManagerBundle\Document\Traits\Fields\PHPCR;

use Sonata\BlockBundle\Model\BlockInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\PHPCR\ChildrenCollection;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class Children
 *
 * @package SevenManagerBundle\Document\Traits
 */
trait Children
{
    /**
     * @PHPCR\Children(cascade="all")
     */
    protected $children;

    /**
     * @param null $name
     */
    public function __construct($name = null)
    {
        $this->setName($name);
        $this->children = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getChildrenMany()
    {
        return $this->childrenMany;
    }

    /**
     * @param $childrenMany
     * @return $this
     */
    public function setChildrenMany($childrenMany)
    {
        $this->childrenMany = $childrenMany;
        return $this;
    }

    /**
     * @param $childrenMany
     *
     * @return $this
     */
    public function addChildrenMany($childrenMany)
    {
        $this->childrenMany->add($childrenMany);
        return $this;
    }

    /**
     * @param $childrenMany
     *
     * @return $this
     */
    public function removeChildrenMany($childrenMany)
    {
        $this->childrenMany->remove($childrenMany);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildrenManyTwo()
    {
        return $this->childrenManyTwo;
    }

    /**
     * @param $childrenManyTwo
     * @return $this
     */
    public function setChildrenManyTwo($childrenManyTwo)
    {
        $this->childrenManyTwo = $childrenManyTwo;
        return $this;
    }

    /**
     * @param $childrenManyTwo
     *
     * @return $this
     */
    public function addChildrenManyTwo($childrenManyTwo)
    {
        $this->childrenManyTwo->add($childrenManyTwo);
        return $this;
    }

    /**
     * @param $childrenManyTwo
     *
     * @return $this
     */
    public function removeChildrenManyTwo($childrenManyTwo)
    {
        $this->childrenManyTwo->remove($childrenManyTwo);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildrenManyThree()
    {
        return $this->childrenManyThree;
    }

    /**
     * @param $childrenManyThree
     *
     * @return $this
     */
    public function setChildrenManyThree($childrenManyThree)
    {
        $this->childrenManyThree = $childrenManyThree;
        return $this;
    }

    /**
     * @param $childrenManyThree
     *
     * @return $this
     */
    public function addChildrenManyThree($childrenManyThree)
    {
        $this->childrenManyThree->add($childrenManyThree);
        return $this;
    }

    /**
     * @param $childrenManyThree
     *
     * @return $this
     */
    public function removeChildrenManyThree($childrenManyThree)
    {
        $this->childrenManyThree->remove($childrenManyThree);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildrenManyFour()
    {
        return $this->childrenManyFour;
    }

    /**
     * @param $childrenManyFour
     *
     * @return $this
     */
    public function setChildrenManyFour($childrenManyFour)
    {
        $this->childrenManyFour = $childrenManyFour;
        return $this;
    }

    /**
     * @param $childrenManyFour
     *
     * @return $this
     */
    public function addChildrenManyFour($childrenManyFour)
    {
        $this->childrenManyFour->add($childrenManyFour);
        return $this;
    }

    /**
     * @param $childrenManyFour
     *
     * @return $this
     */
    public function removeChildrenManyFour($childrenManyFour)
    {
        $this->childrenManyFour->remove($childrenManyFour);
        return $this;
    }

    /**
     * Get children
     *
     * @return ArrayCollection|ChildrenCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set children
     *
     * @param ChildrenCollection $children
     *
     * @return ChildrenCollection
     */
    public function setChildren(ChildrenCollection $children)
    {
        return $this->children = $children;
    }

    /**
     * Add a child to this container
     *
     * @param BlockInterface $child
     * @param string $key the collection index name to use in the
     *                              child collection. if not set, the child
     *                              will simply be appended at the end.
     *
     * @return boolean Always true
     */
    public function addChild(BlockInterface $child, $key = null)
    {
        if ($key != null) {
            $this->children->set($key, $child);
            return true;
        }

        return $this->children->add($child);
    }

    /**
     * Alias to addChild to make the form layer happy.
     *
     * @param BlockInterface $children
     *
     * @return boolean
     */
    public function addChildren(BlockInterface $children)
    {
        return $this->addChild($children);
    }

    /**
     * Remove a child from this container.
     *
     * @param  BlockInterface $child
     *
     * @return $this
     */
    public function removeChild($child)
    {
        $this->children->removeElement($child);
        return $this;
    }

    /**
     * @return bool
     */
    public function hasChildren()
    {
        return count($this->children) > 0;
    }
}
