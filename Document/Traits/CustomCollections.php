<?php

    namespace SevenManagerBundle\Document\Traits;

    use Sonata\BlockBundle\Model\BlockInterface;
    use Doctrine\ODM\PHPCR\ChildrenCollection;
    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * Class CustomFields
     *
     * @package SevenManagerBundle\Document\Traits
     */
    trait CustomCollections
    {

        /**
         * @PHPCR\Children(cascade="all")
         */
        protected $textChildren;

        /**
         * @PHPCR\Children(cascade="all")
         */
        protected $children;

        /**
         * @param null $name
         */
        public function __construct($name = null)
        {
            $this->setName($name);
            $this->children = new ArrayCollection();
            $this->textChildren = new ArrayCollection();
        }

        /**
         * Get children
         *
         * @return ArrayCollection|ChildrenCollection
         */
        public function getChildren()
        {
            return $this->children;
        }

        /**
         * Set children
         *
         * @param ChildrenCollection $children
         *
         * @return ChildrenCollection
         */
        public function setChildren(ChildrenCollection $children)
        {
            return $this->children = $children;
        }

        /**
         * Add a child to this container
         *
         * @param BlockInterface $child
         * @param string         $key the collection index name to use in the
         *                              child collection. if not set, the child
         *                              will simply be appended at the end.
         *
         * @return boolean Always true
         */
        public function addChild(BlockInterface $child, $key = null)
        {
            if ($key != null) {

                $this->children->set($key, $child);

                return true;
            }

            return $this->children->add($child);
        }

        /**
         * Alias to addChild to make the form layer happy.
         *
         * @param BlockInterface $children
         *
         * @return boolean
         */
        public function addChildren(BlockInterface $children)
        {
            return $this->addChild($children);
        }

        /**
         * Remove a child from this container.
         *
         * @param  BlockInterface $child
         *
         * @return $this
         */
        public function removeChild($child)
        {
            $this->children->removeElement($child);

            return $this;
        }

        /**
         * {@inheritdoc}
         */
        public function hasChildren()
        {
            return count($this->children) > 0;
        }

        /**
         * Get children
         *
         * @return ArrayCollection|ChildrenCollection
         */
        public function getTextChildren()
        {
            return $this->textChildren;
        }

        /**
         * Set children
         *
         * @param ChildrenCollection $textChildren
         *
         * @return ChildrenCollection
         */
        public function setTextChildren(ChildrenCollection $textChildren)
        {
            return $this->textChildren = $textChildren;
        }

        /**
         * Add a child to this container
         *
         * @param BlockInterface $child
         * @param string         $key the collection index name to use in the
         *                              child collection. if not set, the child
         *                              will simply be appended at the end.
         *
         * @return boolean Always true
         */
        public function addChild(BlockInterface $child, $key = null)
        {
            if ($key != null) {

                $this->textChildren->set($key, $child);

                return true;
            }

            return $this->textChildren->add($child);
        }

        /**
         * Alias to addChild to make the form layer happy.
         *
         * @param BlockInterface $textChildren
         *
         * @return boolean
         */
        public function addTextChildren(BlockInterface $textChildren)
        {
            return $this->addChild($textChildren);
        }

        /**
         * Remove a child from this container.
         *
         * @param  BlockInterface $child
         *
         * @return $this
         */
        public function removeChild($child)
        {
            $this->textChildren->removeElement($child);

            return $this;
        }

        /**
         * {@inheritdoc}
         */
        public function hasTextChildren()
        {
            return count($this->textChildren) > 0;
        }

        /**
         * @return string
         */
        public function getType()
        {
            return 'seven_manager.content.colections';
        }

    }