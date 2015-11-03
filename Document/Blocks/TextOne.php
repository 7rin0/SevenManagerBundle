<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 01/11/15
 * Time: 23:07
 */

namespace SevenManagerBundle\Document\Blocks;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use SevenManagerBundle\Document\Traits\CustomFields;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;

/**
 * Class TextOne
 *
 * @package SevenManagerBundle\Document\Blocks
 */
class TextOne extends AbstractBlock
{
    use CustomFields;

    /**
     * @return string
     */
    public function getType()
    {
        return 'restructure.block.text.one';
    }
}
