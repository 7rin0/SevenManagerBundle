<?php

namespace SevenManagerBundle\Document\Traits;

use Symfony\Cmf\Bundle\SeoBundle\Doctrine\Phpcr\SeoMetadata;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class Seo
 *
 * @package SevenManagerBundle\Document\Traits
 */
trait Seo
{
    public function __construct()
    {
        $this->__constructSeoMetaData();
    }

    /**
     * @var SeoMetadata
     *
     * @PHPCR\Child
     */
    protected $seoMetadata;

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
