<?php

namespace Acme\DemoBundle\Listener;
use Symfony\Component\HttpFoundation\RequestStack;

class SerializationListener
{
    private $request;
    private $em;

    public function __construct(RequestStack $requestStack) {
        $this->request = $requestStack->getCurrentRequest();
    }

    public function preSerialize(\JMS\Serializer\EventDispatcher\PreSerializeEvent $event)
    {
        $entity = $event->getObject();
        if (method_exists($entity, 'getThumbAbsolutePath')){
            $this->createAbsoluteThumbPath($entity);
        } 
		
		if(method_exists($entity, 'getImageAbsolutePath')) {
            $this->createAbsoluteImagePath($entity);        	
        } 
		
		if(method_exists($entity, 'getVideoAbsolutePath')) {
            $this->createAbsoluteVideoPath($entity);        	
        }
		
		
		// $entity->setVideoURL($entity->getAbsolutePath());
		// $entity->setVideoURL($entity->getSomeFeild().$this->request->getSchemeAndHttpHost());
    }	

    public function createAbsoluteThumbPath($entity)
    {
        $host = $this->request->getSchemeAndHttpHost();
    
        if($entity->getThumbWebPath())
        {
            $url = sprintf('%s/%s', $host, $entity->getThumbWebPath());
            $entity->setThumbAbsolutePath($url);
    
        }
    }

    public function createAbsoluteImagePath($entity)
    {
        $host = $this->request->getSchemeAndHttpHost();
    
        if($entity->getImageWebPath())
        {
            $url = sprintf('%s/%s', $host, $entity->getImageWebPath());
            $entity->setImageAbsolutePath($url);
    
        }
    }

    public function createAbsoluteVideoPath($entity)
    {
        $host = $this->request->getSchemeAndHttpHost();
    
        if($entity->getVideoWebPath())
        {
            $url = sprintf('%s/%s', $host, $entity->getVideoWebPath());
            $entity->setVideoAbsolutePath($url);
    
        }
    }


}