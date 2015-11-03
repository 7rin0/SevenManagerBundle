<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 01/11/15
 * Time: 23:44
 */

namespace SevenManagerBundle\Document\Traits;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class ChildProperties
 *
 * @package SevenManagerBundle\Document\Traits
 */
trait ChildProperties
{
    /**
     * @var string
     * @PHPCR\Locale()
     */
    protected $translatable;

    /**
     * @return string
     */
    public function getTranslatable()
    {
        return $this->translatable;
    }

    /**
     * @param string $translatable
     */
    public function setTranslatable($translatable)
    {
        $this->translatable = $translatable;
    }
}
