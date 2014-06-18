<?php

namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Entity\Book;
use Acme\DemoBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class WelcomeController extends FOSRestController
{
    public function indexAction() {
        return $this->render('AcmeDemoBundle:Welcome:index.html.twig');
    }

	public function booksAction() {
	    $em = $this->getDoctrine()->getManager();		
		$rep = $em->getRepository('AcmeDemoBundle:Book');
		$arr = array('books' => $rep->findAll());
		return $arr;
	}
	
	public function getImageAction($id) {
	    $em = $this->getDoctrine()->getManager();		
		$rep = $em->getRepository('AcmeDemoBundle:Image');
		$arr = array('images' => $rep->findByBook($id));
		return $arr;
	}
}
