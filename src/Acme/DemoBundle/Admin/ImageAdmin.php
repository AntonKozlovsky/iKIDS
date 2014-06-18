<?php
// src/Acme/DemoBundle/Admin/ImageAdmin.php

namespace Acme\DemoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ImageAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        // get the current Image instance
        $image = $this->getSubject();

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false);
			        if ($image && ($webPath = $image->getImageWebPath())) {
			            // get the container so the full path to the image can be set
			            $container = $this->getConfigurationPool()->getContainer();
			            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;
			
			            // add a 'help' option containing the preview's img tag
			            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
			$fileFieldOptions['label'] = 'Картинка';
			        }
				
        $formMapper
			->add('image', 'file', $fileFieldOptions)
		    ->add('book', 'sonata_type_model', array())				
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
			->add('imageurl')
			->add('Book')
        ;
    }
	
    public function prePersist($product) {
      $this->saveImage($product);
    }

    public function preUpdate($product) {
      $this->saveImage($product);
    }

    public function saveImage($product) {
      $basepath = $this->getRequest()->getBasePath();
      $product->uploadImage($basepath);
    }	
}