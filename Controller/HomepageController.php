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
class HomepageController extends Controller implements ContainerAwareInterface
{
    protected $container;

    /**
     * @param Request $request
     * @param null    $contentDocument
     * @param string  $contentTemplate
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, $contentDocument = null, $contentTemplate = "SevenManagerBundle:Default:index.html.twig")
    {
        // Get Station manager
        $stationManager = $this->get('seven_manager.station_manager');

        // Get Homepage
        if (!$contentDocument) {
            $contentDocument = $stationManager->getHomepage();
        }

        // Get associated slideshow and them childrens
        $slideshow = $stationManager->getSlideshowByEntity($contentDocument);

        return $this->render(
            $contentTemplate,
            array(
                'document' => $contentDocument,
                'cmfMainContent' => $contentDocument,
                'slideshow' => $slideshow,
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
