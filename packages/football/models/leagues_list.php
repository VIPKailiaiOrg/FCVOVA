<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 31/03/2015
 * Time: 13:23
 */

namespace Concrete\Package\Football\Models;

use Concrete\Core\Search\ItemList\Database\ItemList;
use Concrete\Core\Search\Pagination\Pagination;
use Concrete\Package\Football\Src\Entity\League;
use Pagerfanta\Adapter\DoctrineDbalAdapter;

class LeaguesList extends ItemList{

    /**
     * Create base query
     */
    public function createQuery()
    {
        $this->query->select('btfl.id')
            ->from('btFootballLeague', 'btfl');
    }


    /**
     * Filter by keywords
     *
     * @param $keywords
     */
    public function filterByKeywords($keywords) {
        $this->query->andWhere(
            $this->query->expr()->andX(
                $this->query->expr()->like('btfl.name', ':keywords')
            )
        );
        $this->query->setParameter('keywords', '%' . $keywords . '%');
    }

    /**
     * Object mapping
     *
     * @param $queryRow
     * @return \Concrete\Package\Football\Src\Entity\League
     */
    public function getResult($queryRow)
    {
        $ai = League::getByID($queryRow['id']);
        return $ai;
    }

    /**
     * Gets the pagination object for the query.
     * @return \Concrete\Core\Search\Pagination\Pagination
     */
    protected function createPaginationObject()
    {
        $adapter = new DoctrineDbalAdapter($this->deliverQueryObject(), function ($query) {
            $query->select('count(btfl.id)')->setMaxResults(1);
        });
        $pagination = new Pagination($this, $adapter);
        return $pagination;
    }

    public function getTotalResults()
    {
        $query = $this->deliverQueryObject();
        return $query->select('count(btfl.id)')
            ->setMaxResults(1)
            ->execute()
            ->fetchColumn();
    }
}