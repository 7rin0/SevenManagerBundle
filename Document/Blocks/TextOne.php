<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:02
 */

namespace SevenManagerBundle\Document\Blocks;

use SevenManagerBundle\Document\Traits\Fields\HTML\Links;
use SevenManagerBundle\Document\Traits\Fields\HTML\Texts;
use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\AbstractBlock;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class TextOne
 * @PHPCR\Document(referenceable=true, translator="attribute")
 *
 * @package SevenManagerBundle\Document\Blocks
 */
class TextOne extends AbstractBlock implements TranslatableInterface
{
    use Texts;
    use Links;

    /**
     * @PHPCR\Locale()
     */
    protected $locale;

    /**
     * @return string
     */
    public function getType()
    {
        return 'restructure.block.text.one';
    }
}
