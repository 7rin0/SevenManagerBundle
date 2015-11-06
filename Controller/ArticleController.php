<?php

namespace SevenManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ArticleController
 *
 * @package SevenManagerBundle\Controller
 */
class ArticleController extends Controller implements ContainerAwareInterface
{
    protected $container;

    /**
     * @param Request $request
     * @param object $contentDocument
     * @param null $contentTemplate
     * @return array
     */
    public function indexAction(Request $request, $contentDocument = null, $contentTemplate = null)
    {
        return $this->render(
            $contentTemplate,
            array(
                'document' => $contentDocument
            )
        );
    }

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
