<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 01/11/15
 * Time: 23:07
 */

namespace SevenManagerBundle\Document\Blocks;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use SevenManagerBundle\Document\Traits\ChildProperties;
use SevenManagerBundle\Document\Traits\CustomFields;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

/**
 * Class TextOne
 * @PHPCR\Document(referenceable=true, translator="child")
 *
 * @package SevenManagerBundle\Document\Blocks
 */
class TextOne extends AbstractBlock implements TranslatableInterface
{
    use CustomFields;
    use ChildProperties;

    /**
     * @return string
     */
    public function getType()
    {
        return 'restructure.block.text.one';
    }
}
