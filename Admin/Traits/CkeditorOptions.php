<?php
/**
 * User: lseverino
 * Date: 21/10/15
 * Time: 15:40
 */

namespace SevenManagerBundle\Admin\Traits;

use Symfony\Component\Routing\RouterInterface;

/**
 * Class CkeditorOptions
 *
 * @package SevenManagerBundle\Admin\Traits
 */
trait CkeditorOptions
{
    /**
     * @param null $options
     *
     * @return array
     */
    public function getCkeditorOptions($options = null)
    {
        $optionsCkeditor =
            array(
                'required' => false,
                'config' => array(
                    'stylesSet' => 'seven_manager',
                    'filebrowserBrowseHandler' => function (RouterInterface $router) {
                        return $router->generate(
                            $this->getBaseRouteName() . '_create',
                            array(
                                'slug' => 'seven-manager',
                                true
                            )
                        );
                    },
                ),
                'styles' => array(
                    'seven_manager' => array(
                        array(
                            'name' => 'Rich Text 1',
                            'element' => 'div',
                            'attributes' => array('class' => 'rich-text-one')
                        ),
                        array(
                            'name' => 'Heading 1',
                            'element' => 'h1',
                            'attributes' => array('class' => 'heading-one')
                        ),
                        array(
                            'name' => 'Span 1',
                            'element' => 'span',
                            'attributes' => array('class' => 'span-one')
                        ),
                    ),
                )
            );

        // Merge options
        if (is_array($options)) {
            $optionsCkeditor = array_merge($optionsCkeditor, $options);
        }

        return $optionsCkeditor;
    }
}
