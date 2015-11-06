<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Document\Pages;

use SevenManagerBundle\Document\Classes\StructurePages;
use SevenManagerBundle\Document\Traits\CustomChildren;
use SevenManagerBundle\Document\Traits\CustomModels;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * @PHPCR\Document(referenceable=true, translator="attribute")
 */
class Homepage extends StructurePages
{
    use CustomModels;
    use CustomChildren {
        CustomChildren::__construct as private __childrenConstruct;
    }

    public function __construct()
    {
        $this->__childrenConstruct();
    }
}
