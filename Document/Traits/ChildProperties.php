<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 01/11/15
 * Time: 23:44
 */

namespace SevenManagerBundle\Document\Traits;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

trait ChildProperties
{

    /**
     * @var string
     * @PHPCR\Locale()
     */
    protected $locale;

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }


    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

}