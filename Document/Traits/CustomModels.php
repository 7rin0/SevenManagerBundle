<?php
    /**
     * User: lseverino
     * Date: 14/10/15
     * Time: 22:16
     */

    namespace SevenManagerBundle\Document\Traits;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    trait CustomModels
    {

        /**
         * @PHPCR\ReferenceOne(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\SimpleBlock", strategy="hard")
         */
        protected $mapSimple;

        /**
         * @PHPCR\ReferenceOne(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ContainerBlock", strategy="hard")
         */
        protected $mapContainer;

        /**
         * @PHPCR\ReferenceOne(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ReferenceBlock", strategy="hard")
         */
        protected $mapReference;

        /**
         * @PHPCR\ReferenceOne(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ActionBlock", strategy="hard")
         */
        protected $mapAction;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Containers\Slideshow", strategy="hard")
         */
        protected $mapSlideshow;

        /**
         * @PHPCR\ReferenceOne(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ImagineBlock", strategy="hard")
         */
        protected $mapImage;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Node", strategy="hard")
         */
        protected $mapNode;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Page", strategy="hard")
         */
        protected $mapPage;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Post", strategy="hard")
         */
        protected $mapPost;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Article", strategy="hard")
         */
        protected $mapArticle;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Gallery", strategy="hard")
         */
        protected $mapGallery;

        /**
         * @PHPCR\ReferenceOne(targetDocument="SevenManagerBundle\Document\Pages\Form", strategy="hard")
         */
        protected $mapForm;

        /**
         * @return mixed
         */
        public function getMapNode()
        {
            return $this->mapNode;
        }

        /**
         * @param $mapNode
         *
         * @return $this
         */
        public function setMapNode($mapNode)
        {
            $this->mapNode = $mapNode;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapPage()
        {
            return $this->mapPage;
        }

        /**
         * @param $mapPage
         *
         * @return $this
         */
        public function setMapPage($mapPage)
        {
            $this->mapPage = $mapPage;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapPost()
        {
            return $this->mapPost;
        }

        /**
         * @param $mapPost
         *
         * @return $this
         */
        public function setMapPost($mapPost)
        {
            $this->mapPost = $mapPost;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapArticle()
        {
            return $this->mapArticle;
        }

        /**
         * @param $mapArticle
         *
         * @return $this
         */
        public function setMapArticle($mapArticle)
        {
            $this->mapArticle = $mapArticle;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapGallery()
        {
            return $this->mapGallery;
        }

        /**
         * @param $mapGallery
         *
         * @return $this
         */
        public function setMapGallery($mapGallery)
        {
            $this->mapGallery = $mapGallery;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapForm()
        {
            return $this->mapForm;
        }

        /**
         * @param $mapForm
         *
         * @return $this
         */
        public function setMapForm($mapForm)
        {
            $this->mapForm = $mapForm;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapImage()
        {
            return $this->mapImage;
        }

        /**
         * @param $mapImage
         *
         * @return $this
         */
        public function setMapImage($mapImage)
        {
            $this->mapImage = $mapImage;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapSimple()
        {
            return $this->mapSimple;
        }

        /**
         * @param $mapSimple
         *
         * @return $this
         */
        public function setMapSimple($mapSimple)
        {
            $this->mapSimple = $mapSimple;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapContainer()
        {
            return $this->mapContainer;
        }

        /**
         * @param $mapContainer
         *
         * @return $this
         */
        public function setMapContainer($mapContainer)
        {
            $this->mapContainer = $mapContainer;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapReference()
        {
            return $this->mapReference;
        }

        /**
         * @param $mapReference
         *
         * @return $this
         */
        public function setMapReference($mapReference)
        {
            $this->mapReference = $mapReference;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapAction()
        {
            return $this->mapAction;
        }

        /**
         * @param $mapAction
         *
         * @return $this
         */
        public function setMapAction($mapAction)
        {
            $this->mapAction = $mapAction;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getMapSlideshow()
        {
            return $this->mapSlideshow;
        }

        /**
         * @param $mapSlideshow
         *
         * @return $this
         */
        public function setMapSlideshow($mapSlideshow)
        {
            $this->mapSlideshow = $mapSlideshow;

            return $this;
        }

    }