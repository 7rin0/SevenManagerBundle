<?php
    /**
     * User: lseverino
     * Date: 20/10/15
     * Time: 10:33
     */

    namespace SevenManagerBundle\Document\Traits;

    use SevenManagerBundle\Document\Traits\CustomFields;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * Class ParentProperties
     *
     * @package SevenManagerBundle\Document\Traits
     */
    trait ParentProperties
    {
        use CustomFields;

        /**
         * @PHPCR\Referrers(referringDocument="Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route",referencedBy="content")
         */
        protected $routes;

        /**
         * @PHPCR\Id()
         */
        protected $id;

        /**
         * @PHPCR\ParentDocument()
         */
        protected $parentDocument;

        /**
         * @PHPCR\Nodename()
         */
        protected $name;

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
            $returnString = count($this->getTitle()) === 0 ?
                $this->getTitle() : $this->getName();

            return (string)$returnString;
        }

    }
