<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 02/11/15
 * Time: 18:45
 */

namespace SevenManagerBundle\Document\Classes;

use SevenManagerBundle\Document\Traits\ParentProperties;
use SevenManagerBundle\Document\Traits\Seo;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;
use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

class StructurePages implements
    RouteReferrersReadInterface,
    TranslatableInterface,
    SeoAwareInterface
{
    use ParentProperties;
    use Seo;
}