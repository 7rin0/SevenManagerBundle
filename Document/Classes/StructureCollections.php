<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 02/11/15
 * Time: 18:45
 */

namespace SevenManagerBundle\Document\Classes;

use SevenManagerBundle\Document\Traits\Fields\PHPCR\Child;
use SevenManagerBundle\Document\Traits\Structure\ParentDocument;
use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class StructureCollections
 *
 * @package SevenManagerBundle\Document\Classes
 */
class StructureCollections implements RouteReferrersReadInterface
{
    use ParentDocument, Child;
}
