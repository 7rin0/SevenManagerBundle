<?php

namespace SevenManagerBundle\Document\Traits\Fields\HTML;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class Texts
 *
 * @package SevenManagerBundle\Document\Traits\Fields\HTML
 */
trait Texts
{
    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $title;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $subtitle;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $label;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $labelTwo;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $labelThree;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $labelFour;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $labelFive;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $resume;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $body;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $description;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $content;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $rawContent;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $richText1;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $contentFormatter;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param $subtitle
     *
     * @return $this
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param $resume
     *
     * @return $this
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param $label
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabelFive()
    {
        return $this->labelFive;
    }

    /**
     * @param $labelFive
     *
     * @return $this
     */
    public function setLabelFive($labelFive)
    {
        $this->labelFive = $labelFive;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabelFour()
    {
        return $this->labelFour;
    }

    /**
     * @param $labelFour
     *
     * @return $this
     */
    public function setLabelFour($labelFour)
    {
        $this->labelFour = $labelFour;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabelThree()
    {
        return $this->labelThree;
    }

    /**
     * @param $labelThree
     *
     * @return $this
     */
    public function setLabelThree($labelThree)
    {
        $this->labelThree = $labelThree;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabelTwo()
    {
        return $this->labelTwo;
    }

    /**
     * @param $labelTwo
     *
     * @return $this
     */
    public function setLabelTwo($labelTwo)
    {
        $this->labelTwo = $labelTwo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRawContent()
    {
        return $this->rawContent;
    }

    /**
     * @param $rawContent
     *
     * @return $this
     */
    public function setRawContent($rawContent)
    {
        $this->rawContent = $rawContent;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContentFormatter()
    {
        return $this->contentFormatter;
    }

    /**
     * @param $contentFormatter
     *
     * @return $this
     */
    public function setContentFormatter($contentFormatter)
    {
        $this->contentFormatter = $contentFormatter;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRichText1()
    {
        return $this->richText1;
    }

    /**
     * @param $richText1
     *
     * @return $this
     */
    public function setRichText1($richText1)
    {
        $this->richText1 = $richText1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
