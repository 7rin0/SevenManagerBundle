<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 02/11/15
 * Time: 18:45
 */

namespace SevenManagerBundle\Document\Classes;

use SevenManagerBundle\Document\Traits\Publishable;
use SevenManagerBundle\Document\Traits\Seo;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;
use Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishableInterface;
use Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishTimePeriodInterface;

/**
 * Class StructurePages
 *
 * @package SevenManagerBundle\Document\Classes
 */
class StructurePages extends StructureParent implements PublishableInterface, PublishTimePeriodInterface, SeoAwareInterface
{
    use Seo;
    use Publishable;
}
