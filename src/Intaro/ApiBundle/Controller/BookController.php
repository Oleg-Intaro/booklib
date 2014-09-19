<?php 

namespace Intaro\ApiBundle\Controller;

use JMS\Serializer\SerializerBuilder;
use Intaro\BookBundle\Entity\Book;
use FOS\RestBundle\View\View;

class BookController extends ApiController
{
    
    public function getAllAction()
    {
        $em = $this->getEntityManager();

        $entities = $em->getRepository('IntaroBookBundle:Book')->findAll();
        
        if (!$entities) {
             throw new NotFoundHttpException('No books');
        }
        
        $serializer = SerializerBuilder::create()->build();
        
        return $serializer->serialize($entities, 'json');
    }
    
    
    public function addAction(Request $request)
    {
        $entity = $this->deserialize(
            'Intaro\BookBundle\Entity\Book',
             $request
        );
        
        if ($entity instanceof Book === false) {
            return View::create(array('errors' => $entity), 400);
        }
        
        $em = $this->getEntityManager();
        $em->persist($entity);
        $em->flush();
        
        $url = $this->generateUrl(
            'intaro_api_book_get_single',
            array('id' => $entity->getId()),
            true
        );
        
        $responce = new \FOS\RestBundle\Response();
        $responce->setStatusCode(201);
        $responce->headers->set('Location', $url);
        
        return $responce;
    }
    
    public function editAction(Reuest $request, $id)
    {
        /*
        $em = $this->getEntityManager();
        $entity = $em->getRepository('IntaroBookBundle:Book')->find($id);
        
        if (!$entity) {
             throw new NotFoundHttpException('No book');
        }
        
        $validator = $this->get('validator');
        
        $raw = json_decode($request->getContent(), true);
        // to implement
        $entity->patch($raw);
        
        if (count($errors = $validator->validate($entity))) {
            return $errors;
        }
          
        $em->flush();
         * 
         */
    }
    
    public function getSingleAction($id)
    {
        $em = $this->getEntityManager();

        $entity = $em->getRepository('IntaroBookBundle:Book')->find($id);
        
        if (!$entity) {
             throw new NotFoundHttpException('No book');
        }
        
        $serializer = SerializerBuilder::create()->build();
        
        return $serializer->serialize($entity, 'json');
    }
    
    
}