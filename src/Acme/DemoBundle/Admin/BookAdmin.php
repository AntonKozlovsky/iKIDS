<?php
// src/Acme/DemoBundle/Admin/BookAdmin.php

namespace Acme\DemoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BookAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        // get the current Image instance
        $image = $this->getSubject();

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false);
        if ($image && ($webPath = $image->getThumbWebPath())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
        	$fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
			$fileFieldOptions['label'] = 'Иконка';
		}
				
		
		$videoFieldOptions = array('required' => false);
        if ($image && ($webPath = $image->getVideoWebPath())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
        	$videoFieldOptions['help'] = '<video id="sampleMovie" width="640" height="360" preload controls><source src="'.$fullPath.'" /></video>';
			$videoFieldOptions['label'] = 'Видео';
		}		
		
				
        $formMapper
            ->add('name_rus', 'text', array('label' => 'Имя книги (RU)'))
            ->add('name_eng', 'text', array('label' => 'Имя книги (ENG)'))				
            ->add('description_rus', 'textarea', array('label' => 'Описание книги (RU)'))
            ->add('description_eng', 'textarea', array('label' => 'Описание книги (ENG)'))				
			->add('education', 'choice', array(
		            'choices' => array(
		                '0' => 'Нет',
		                '1' => 'Да',
		            ),
		            'empty_value' => false,// unset this and empty would work also
		            'required' => false,
					'label' => 'Обучающая'					
		        ))				
            ->add('itunesurl_rus', 'text', array('label' => 'Ссылка в AppStore (RU)'))				
            ->add('itunesurl_eng', 'text', array('label' => 'Ссылка в AppStore (ENG)'))										
            ->add('scheme')
			->add('thumb', 'file', $fileFieldOptions)
			->add('video', 'file', $videoFieldOptions)
				
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name_rus')
            ->add('scheme')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
			->add('name_rus')
			->add('education')				
        ;
    }
	
    public function prePersist($product) {
      $this->saveThumb($product);
      $this->saveVideo($product);	  
    }

    public function preUpdate($product) {
      $this->saveThumb($product);
      $this->saveVideo($product);	  	  
    }

    public function saveThumb($product) {
      $basepath = $this->getRequest()->getBasePath();
      $product->uploadThumb($basepath);
    }	
	
    public function saveVideo($product) {
      $basepath = $this->getRequest()->getBasePath();
      $product->uploadVideo($basepath);
    }		
}