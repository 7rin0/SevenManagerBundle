<?php
    /**
     * User: lseverino
     * Date: 20/10/15
     * Time: 12:02
     */

    namespace SevenManagerBundle\Document\Containers;

    use SevenManagerBundle\Document\Traits\ChildMediaBlock;
    use SevenManagerBundle\Document\Traits\CustomFields;
    use SevenManagerBundle\Document\Traits\ParentProperties;
    use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;
    use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * Class Slideshow
     * @PHPCR\Document(referenceable=true, translator="attribute")
     *
     * @package SevenManagerBundle\Document\Containers
     */
    class Slideshow implements
        RouteReferrersReadInterface,
        TranslatableInterface
    {

        // Shared properties
        use ParentProperties;
        use ChildMediaBlock;

    }