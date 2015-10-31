<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 31/10/15
 * Time: 22:54
 */

    namespace SevenManagerBundle\Document\Traits;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class OptionalLabels
 *
 * @package SevenManagerBundle\Document\Traits
 */
trait OptionalLabels
{

    /**
     * @PHPCR\String(nullable=true, translated=true)
     */
    protected $labelOne;

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
    public function getLabelOne()
    {
        return $this->labelOne;
    }

    /**
     * @param $labelOne
     *
     * @return $this
     */
    public function setLabelOne($labelOne)
    {
        $this->labelOne = $labelOne;

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



}