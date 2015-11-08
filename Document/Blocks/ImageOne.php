<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:02
 */

namespace SevenManagerBundle\Document\Blocks;

use SevenManagerBundle\Document\Traits\ChildProperties;
use SevenManagerBundle\Document\Traits\CustomFields;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

/**
 * Class ImageOne
 * @PHPCR\Document(referenceable=true, translator="attribute")
 *
 * @package SevenManagerBundle\Document\Blocks
 */
class ImageOne extends AbstractBlock implements TranslatableInterface
{
    use CustomFields;

    /**
     * @PHPCR\Locale()
     */
    protected $locale;

    /**
     * @return string
     */
    public function getType()
    {
        return 'restructure.block.image.one';
    }
}
