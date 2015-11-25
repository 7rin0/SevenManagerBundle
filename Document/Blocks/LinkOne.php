<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:02
 */

namespace SevenManagerBundle\Document\Blocks;

use SevenManagerBundle\Document\Traits\Fields\HTML\Images;
use SevenManagerBundle\Document\Traits\Fields\HTML\Texts;
use SevenManagerBundle\Document\Traits\Fields\PHPCR\Children;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class LinkOne
 * @PHPCR\Document(referenceable=true, translator="attribute")
 *
 * @package SevenManagerBundle\Document\Blocks
 */
class LinkOne extends AbstractBlock implements TranslatableInterface
{
    use Texts, Images, Children;

    /**
     * @PHPCR\Locale()
     */
    protected $locale;

    /**
     * @return string
     */
    public function getType()
    {
        return 'seven_manager.admin.blocks.linkone';
    }
}
