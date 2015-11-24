<?php

namespace SevenManagerBundle\Document\Traits\Fields\HTML;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class Links
 *
 * @package SevenManagerBundle\Document\Traits\Fields\HTML
 */
trait Choices
{
    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $choice;

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $choiceTwo;

    /**
     * @return mixed
     */
    public function getChoice()
    {
        return $this->choice;
    }

    /**
     * @param $choice
     *
     * @return $this
     */
    public function setChoice($choice)
    {
        $this->choice = $choice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChoiceTwo()
    {
        return $this->choiceTwo;
    }

    /**
     * @param $choiceTwo
     *
     * @return $this
     */
    public function setChoiceTwo($choiceTwo)
    {
        $this->choiceTwo = $choiceTwo;
        return $this;
    }
}
