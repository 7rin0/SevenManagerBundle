<?php

namespace SevenManagerBundle\Document\Traits\Fields\HTML;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class Links
 *
 * @package SevenManagerBundle\Document\Traits\Fields\HTML
 */
trait Links
{
    /**
     * @PHPCR\ReferenceMany(cascade="persist")
     */
    protected $internalLink;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $externalLink;
    /**
     * @PHPCR\ReferenceMany(cascade="persist")
     */
    protected $internalLinkTwo;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $externalLinkTwo;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $target;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $link;

    /**
     * @return mixed
     */
    public function getExternalLink()
    {
        return $this->externalLink;
    }

    /**
     * @param $externalLink
     *
     * @return $this
     */
    public function setExternalLink($externalLink)
    {
        $this->externalLink = $externalLink;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInternalLink()
    {
        return $this->internalLink;
    }

    /**
     * @param $internalLink
     *
     * @return $this
     */
    public function setInternalLink($internalLink)
    {
        $this->internalLink = $internalLink;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExternalLinkTwo()
    {
        return $this->externalLinkTwo;
    }

    /**
     * @param $externalLinkTwo
     *
     * @return $this
     */
    public function setExternalLinkTwo($externalLinkTwo)
    {
        $this->externalLinkTwo = $externalLinkTwo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInternalLinkTwo()
    {
        return $this->internalLinkTwo;
    }

    /**
     * @param $internalLinkTwo
     *
     * @return $this
     */
    public function setInternalLinkTwo($internalLinkTwo)
    {
        $this->internalLinkTwo = $internalLinkTwo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param $target
     *
     * @return $this
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     *
     * @return $this
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }
}
