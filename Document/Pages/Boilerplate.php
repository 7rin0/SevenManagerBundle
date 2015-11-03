<?php
    /**
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManagerBundle\Document\Pages;

    use SevenManagerBundle\Document\Classes\StructurePages;
    use SevenManagerBundle\Document\Traits\CustomCollections;
    use SevenManagerBundle\Document\Traits\CustomModels;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * @PHPCR\Document(referenceable=true, translator="attribute")
     */
    class Boilerplate extends StructurePages
    {

        use CustomModels;
        use CustomCollections {
            CustomCollections::__construct as private __collectionConstruct;
        }

        public function __construct()
        {
            $this->__collectionConstruct();
        }

        /**
         * @PHPCR\Child(cascade="persist")
         */
        protected $blockChild;

        /**
         * @return mixed
         */
        public function getBlockChild()
        {
            return $this->blockChild;
        }

        /**
         * @param $blockChild
         * @return $this
         */
        public function setBlockChild($blockChild)
        {
            $this->blockChild = $blockChild;
            return $this;
        }

    }