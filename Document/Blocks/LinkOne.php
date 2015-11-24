<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:02
 */

namespace SevenManagerBundle\Document\Blocks;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use SevenManagerBundle\Document\Traits\CustomChildren;
use SevenManagerBundle\Document\Traits\CustomFields;
use SevenManagerBundle\Document\Traits\CustomImage;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

/**
 * Class LinkOne
 * @PHPCR\Document(referenceable=true, translator="attribute")
 *
 * @package SevenManagerBundle\Document\Blocks
 */
class LinkOne extends AbstractBlock
{
    use CustomFields;
    use CustomChildren;
    protected $isPublishable = false;
    protected $publishable = false;

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
