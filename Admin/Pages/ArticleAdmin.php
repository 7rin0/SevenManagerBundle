<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Admin\Pages;

use SevenManagerBundle\Admin\Traits\DefaultAdmin;
use SevenManagerBundle\Document\Pages\Article;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class ArticleAdmin
 *
 * @package SevenManagerBundle\Admin\Pages
 */
class ArticleAdmin extends Admin
{
    use DefaultAdmin;
    protected $parentPath = '/seven-manager/article';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        // Define Admin fields
        $formMapper
            ->with('seven_manager.admin.pages.article.title')
            ->add('title', 'text')
            ->add('subtitle', 'text', array('required' => false))
            ->add('name', 'text', array('required' => true))
            ->add('content', 'textarea')
            ->setHelps(array(
                'title'    => 'seven_manager.admin.fields.title.helper',
                'subtitle' => 'seven_manager.admin.fields.subtitle.helper',
                'name'     => 'seven_manager.admin.fields.name.helper',
                'content'  => 'seven_manager.admin.fields.content.helper',
            ))
            ->end();
    }

    /**
     * @param mixed $object
     * Add Title Label to breadcrumb
     *
     * @return mixed|string
     */
    public function toString($object)
    {
        return $object instanceof Article && $object->getTitle()
            ? $object->getTitle()
            : $this->trans('link_add', array(), 'SonataAdminBundle');
    }
}
