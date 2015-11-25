<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:02
 */

namespace SevenManagerBundle\Document\Blocks;

use SevenManagerBundle\Document\Traits\Fields\HTML\Images;
use SevenManagerBundle\Document\Traits\Fields\HTML\Texts;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class ImageOne
 * @PHPCR\Document(referenceable=true, translator="attribute")
 *
 * @package SevenManagerBundle\Document\Blocks
 */
class ImageOne extends AbstractBlock implements TranslatableInterface
{
    use Texts, Images;

    /**
     * @PHPCR\Locale()
     */
    protected $locale;

    /**
     * @PHPCR\ReferenceMany(cascade="all")
     */
    protected $children;

    /**
     * @return string
     */
    public function getType()
    {
        return 'seven_manager.admin.blocks.slideone';
    }
}
