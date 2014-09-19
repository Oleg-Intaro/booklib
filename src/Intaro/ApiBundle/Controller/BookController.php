<?php 

namespace Intaro\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Routing;

class BookController extends FOSRestController
{
    /**
     * @Routing\Route("/books")
     * @Routing\Get
     */
    public function getBooksAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IntaroBookBundle:Book')->findAll();
        
        if (!$entities) {
            // 404
        }
        
        $view = $this->view($entities, 200);
        
//        $view = View::create();
//
//        ...
//
//        $view->setData($data);
//        return $view;
        
        //set temolate, set temlatevars
        
        return $this->handleView($view); 
        
    }
    
    public function redirectAction()
    {
        $view = $this->routeRedirectView('some_route', array(), 301);

        return $this->handleView($view);
    }
}