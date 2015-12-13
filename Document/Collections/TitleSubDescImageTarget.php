<?php

namespace SevenManagerBundle\Document\Collections;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use SevenManagerBundle\Document\Traits\Fields\HTML\Choices;
use SevenManagerBundle\Document\Traits\Fields\HTML\Images;
use SevenManagerBundle\Document\Traits\Fields\HTML\Links;
use SevenManagerBundle\Document\Traits\Fields\HTML\Texts;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

/**
 * Class TitleSubDescImageTarget
 *
 * @PHPCR\Document(referenceable=true, translator="attribute")
 *
 * @package SevenManagerBundle\Document\Collections
 */
class TitleSubDescImageTarget extends AbstractBlock implements TranslatableInterface
{
    use Links, Texts, Images, Choices;

    /**
     * @PHPCR\Locale()
     */
    protected $locale;

    /**
     * @return string
     */
    public function getType()
    {
        return 'seven_manager.admin.collections.title.sub.desc.image.target';
    }
}
