<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 28/11/15
 * Time: 20:12
 */

namespace SevenManagerBundle\Twig;

/**
 * Class PathCheckerExtension
 *
 * @package SevenManagerBundle\Twig
 */
class PathCheckerExtension extends \Twig_Extension
{
    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('path_checker', array($this, 'pathCheckerFilter')),
        );
    }

    /**
     * @param $value
     */
    public function pathCheckerFilter($value)
    {
        //dump($value);die();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sm_path_checker';
    }
}
