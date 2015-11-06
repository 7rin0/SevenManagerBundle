<?php
/**
 * User: lseverino
 * Date: 22/10/15
 * Time: 00:50
 */

namespace SevenManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ArticleController
 *
 * @package SevenManagerBundle\Controller
 */
class DefaultController extends Controller implements ContainerAwareInterface
{
    protected $container;

    /**
     * @param Request $request
     * @param null    $contentDocument
     * @param null    $contentTemplate
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, $contentDocument = null, $contentTemplate = null)
    {
        return $this->render(
            $contentTemplate,
            array(
                'document' => $contentDocument,
                'cmfMainContent' => $contentDocument,
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
