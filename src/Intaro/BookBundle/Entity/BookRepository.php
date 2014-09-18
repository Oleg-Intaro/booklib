<?php

namespace Intaro\BookBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Book Repository
 */
class BookRepository extends EntityRepository
{
    /**
     * Возвращает книги, упорядоченные по дате прочтения использует кеш
     * 
     * @return type
     */
    public function findAllOrderedByDateCached()
    {
        $em = $this->getEntityManager();
        $cacheDriver = $this->get('memcache_driver');
        $query = $em->createQuery('SELECT b FROM IntaroBookBundle:Book b ORDER BY b.lastRead DESC');
        $query->setResultCacheDriver($cacheDriver);
        if (!$cacheDriver->contains('book_entities')) {
            $query->useResultCache(true, 24*60*60, 'book_entities');
        }

        return $query->getResult();
    }

}
