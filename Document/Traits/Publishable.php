<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 22/11/15
 * Time: 19:19
 */

namespace SevenManagerBundle\Document\Traits;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

trait Publishable
{
    /**
     * @PHPCR\Date()
     */
    protected $publishStartDate;

    /**
     * @PHPCR\Date()
     */
    protected $publishEndDate;

    /**
     * @PHPCR\Boolean()
     */
    protected $isPublishable = true;

    /**
     * @PHPCR\Boolean()
     */
    protected $publishable = true;

    /**
     * @param \DateTime $startDate
     *
     * @return $this
     */
    public function setPublishStartDate(\DateTime $startDate = null)
    {
        $this->publishStartDate = $startDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPublishStartDate()
    {
        return $this->publishStartDate;
    }

    /**
     * @param \DateTime $endDate
     *
     * @return $this
     */
    public function setPublishEndDate(\DateTime $endDate = null)
    {
        $this->publishEndDate = $endDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPublishEndDate()
    {
        return $this->publishEndDate;
    }

    /**
     * @return bool
     */
    public function isPublishable()
    {
        return $this->isPublishable;
    }

    /**
     * @param $boolean
     *
     * @return $this
     */
    public function setIsPublishable($boolean)
    {
        $this->isPublishable = $boolean;
        return $this;
    }

    /**
     * @param $boolean
     *
     * @return $this
     */
    public function setPublishable($boolean)
    {
        $this->publishable = $boolean;
        $this->isPublishable = $boolean;
        return $this;
    }
}
