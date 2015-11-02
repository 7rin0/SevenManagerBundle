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
    use SevenManagerBundle\Document\Traits\Seo;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;


    /**
     * @PHPCR\Document(referenceable=true, translator="attribute")
     */
    class Homepage extends StructurePages
    {

        use CustomModels;
        use Seo {
            Seo::__construct as private __seoConstruct;
        }
        use CustomCollections {
            CustomCollections::__construct as private __collectionConstruct;
        }

        public function __construct()
        {
            $this->__seoConstruct();
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
         * @param mixed $blockChild
         * @return Homepage
         */
        public function setBlockChild($blockChild)
        {
            $this->blockChild = $blockChild;
            return $this;
        }

    }