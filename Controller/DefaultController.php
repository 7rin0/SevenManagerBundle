<?php
/**
 * User: lseverino
 * Date: 22/10/15
 * Time: 00:50
 */

namespace SevenManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class DefaultController
 *
 * @package SevenManagerBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("{lang}/seven-manager", name="seven_manager_homepage")
     * @Route("{lang}/seven-manager/")
     *
     * @Template("SevenManagerBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        // Get Station manager
        $renderArray = array();
        $stationManager = $this->get('seven_manager.station_manager');

        // Get Homepage
        $homepage = $stationManager->getHomepage();

        // Get associated slideshow and them childrens
        $slideshow = $stationManager->getSlideshowByEntity($homepage);

        //cmf_media_display_url
        return array(
            'homepage' => $homepage,
            'slideshow' => $slideshow,
        );
    }
}
