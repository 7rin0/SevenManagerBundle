<?php

namespace SevenManagerBundle\Document\Traits;

use Sonata\BlockBundle\Model\BlockInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\PHPCR\ChildrenCollection;

/**
 * Class CustomChild
 *
 * @package SevenManagerBundle\Document\Traits
 */
trait CustomChild
{
    /**
     * @PHPCR\Child(cascade="persist")
     */
    protected $blockChild;

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
