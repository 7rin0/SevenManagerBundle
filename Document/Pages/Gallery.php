<?php
    /**
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManagerBundle\Document\Pages;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
    use SevenManagerBundle\Document\Traits\SharedParentProperties;
    use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
    use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

    /**
     * @PHPCR\Document(referenceable=true, translator="attribute")
     */
    class Gallery implements
        RouteReferrersReadInterface,
        TranslatableInterface
    {
        use SharedParentProperties;
    }