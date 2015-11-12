<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 10:33
 */

namespace SevenManagerBundle\Document\Traits;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class ParentProperties
 *
 * @package SevenManagerBundle\Document\Traits
 */
trait ParentProperties
{
    use CustomFields;
    use CustomImage;
    use CustomLocale;

    /**
     * @PHPCR\Referrers(referringDocument="Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route", referencedBy="content")
     */
    protected $routes;

    /**
     * @PHPCR\Id(strategy="PARENT")
     */
    protected $id;

    /**
     * @PHPCR\ParentDocument()
     */
    protected $parentDocument;


    /**
     * @PHPCR\ReferenceOne(property="routeContent")
     */
    protected $routeChild;

    /**
     * @PHPCR\Nodename()
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getRouteChild()
    {
        return $this->routeChild;
    }

    /**
     * @param $routeChild
     *
     * @return $this
     */
    public function setRouteChild($routeChild)
    {
        $this->routeChild = $routeChild;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param $routes
     *
     * @return $this
     */
    public function setRoutes($routes)
    {
        $this->routes = $routes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParentDocument()
    {
        return $this->parentDocument;
    }

    /**
     * @param mixed $parentDocument
     *
     * @return ParentProperties
     */
    public function setParentDocument($parentDocument)
    {
        $this->parentDocument = $parentDocument;

        return $this;
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        $returnString = $this->getTitle() ? $this->getTitle() : $this->getName();

        return (string)$returnString;
    }
}
