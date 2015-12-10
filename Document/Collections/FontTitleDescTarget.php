<?php

namespace SevenManagerBundle\Document\Collections;

use SevenManagerBundle\Document\Classes\StructureCollections;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use SevenManagerBundle\Document\Traits\Fields\HTML\Links;

/**
 * Class FontTitleDescTarget
 *
 * @PHPCR\Document(referenceable=true, translator="attribute")
 *
 * @package SevenManagerBundle\Document\Collections
 */
class FontTitleDescTarget extends StructureCollections
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'seven_manager.collections.font.title.desc.target';
    }
}
