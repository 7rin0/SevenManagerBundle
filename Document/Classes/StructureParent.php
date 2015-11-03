<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 02/11/15
 * Time: 18:45
 */

namespace SevenManagerBundle\Document\Classes;

use SevenManagerBundle\Document\Traits\ParentProperties;
use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

/**
 * Class StructureParent
 *
 * @package SevenManagerBundle\Document\Classes
 */
class StructureParent implements RouteReferrersReadInterface, TranslatableInterface
{
    use ParentProperties;
}
