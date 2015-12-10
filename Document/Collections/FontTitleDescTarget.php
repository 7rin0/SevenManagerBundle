<?php

namespace SevenManagerBundle\Document\Collections;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use SevenManagerBundle\Document\Traits\Fields\HTML\Links;
use SevenManagerBundle\Document\Traits\Fields\HTML\Texts;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

/**
 * Class FontTitleDescTarget
 *
 * @PHPCR\Document(referenceable=true, translator="attribute")
 *
 * @package SevenManagerBundle\Document\Collections
 */
class FontTitleDescTarget extends AbstractBlock implements TranslatableInterface
{
    use Links, Texts;

    /**
     * @PHPCR\Locale()
     */
    protected $locale;

    /**
     * @return string
     */
    public function getType()
    {
        return 'seven_manager.admin.collections.font.title.desc.target';
    }
}
