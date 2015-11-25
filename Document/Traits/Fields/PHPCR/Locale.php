<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 12/11/15
 * Time: 02:22
 */

namespace SevenManagerBundle\Document\Traits\Fields\PHPCR;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class Locale
 *
 * @package SevenManagerBundle\Document\Traits\PHPCR
 */
trait Locale
{
    /**
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

    /**
     * @param $locale
     *
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }
}
