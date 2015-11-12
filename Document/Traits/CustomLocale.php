<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 12/11/15
 * Time: 02:22
 */

namespace SevenManagerBundle\Document\Traits;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

trait CustomLocale
{
    /**
     * @var string
     * @PHPCR\Locale()
     */
    protected $locale;

    /**
     * {@inheritDoc}
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * {@inheritDoc}
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }
}
