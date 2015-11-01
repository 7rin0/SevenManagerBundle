<?php
    /**
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManagerBundle\Document\Pages;

    use SevenManagerBundle\Document\Traits\CustomCollections;
    use SevenManagerBundle\Document\Traits\CustomModels;
    use SevenManagerBundle\Document\Traits\ParentProperties;
    use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;
    use Symfony\Cmf\Bundle\MediaBundle\Doctrine\Phpcr\Image;
    use Symfony\Cmf\Bundle\MediaBundle\ImageInterface;
    use Symfony\Component\HttpFoundation\File\UploadedFile;
    use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;


    /**
     * @PHPCR\Document(referenceable=true, translator="attribute")
     */
    class Homepage implements RouteReferrersReadInterface, TranslatableInterface
    {
        /**
         * Traits
         */
        use ParentProperties;
        use CustomModels;
        use CustomCollections;


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