<?php

namespace SevenManagerBundle\Document\Traits\Features;

use Symfony\Cmf\Bundle\SeoBundle\Doctrine\Phpcr\SeoMetadata;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class Seo
 *
 * @package SevenManagerBundle\Document\Traits\Features
 */
trait Seo
{
    /**
     * @var SeoMetadata
     *
     * @PHPCR\ReferenceMany()
     */
    protected $seoMetadata;

    public function __construct()
    {
        $this->__constructSeoMetaData();
    }

    public function __constructSeoMetaData()
    {
        $this->seoMetadata = new SeoMetadata();
    }

    /**
     * @return SeoMetadata
     */
    public function getSeoMetadata()
    {
        return $this->seoMetadata;
    }

    /**
     * @param $seoMetadata
     */
    public function setSeoMetadata($seoMetadata)
    {
        $this->seoMetadata = $seoMetadata;
    }
}
