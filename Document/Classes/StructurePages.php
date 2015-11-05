<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 02/11/15
 * Time: 18:45
 */

namespace SevenManagerBundle\Document\Classes;

use SevenManagerBundle\Document\Traits\CustomChilds;
use SevenManagerBundle\Document\Traits\Seo;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;

/**
 * Class StructurePages
 *
 * @package SevenManagerBundle\Document\Classes
 */
class StructurePages extends StructureParent implements SeoAwareInterface
{
    use Seo;
}
