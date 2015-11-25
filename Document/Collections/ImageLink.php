<?php

namespace SevenManagerBundle\Document\Collections;

use SevenManagerBundle\Document\Classes\StructureCollections;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class ImageLink
 * @PHPCR\Document(referenceable=true)
 * @package AppBundle\Document\Blocks
 */
class ImageLink extends StructureCollections
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'seven_manager.collections.image.link';
    }
}
