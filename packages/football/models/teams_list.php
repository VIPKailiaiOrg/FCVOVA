<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 03/05/2015
 * Time: 22:17
 */

namespace Concrete\Package\Football\Models;

use Concrete\Core\Search\ItemList\Database\ItemList;
use Concrete\Package\Football\Src\Entity\Team;


class TeamsList extends ItemList{


    public function createQuery()
    {
        $this->query->select('btft.id')
            ->from('btFootballTeam', 'btft');
    }
    /**
     * Filter by keywords
     *
     * @param $keywords
     */
    public function filterByKeywords($keywords) {
        $this->query->andWhere(
            $this->query->expr()->andX(
                $this->query->expr()->like('btft.name', ':keywords')
            )
        );
        $this->query->setParameter('keywords', '%' . $keywords . '%');
    }

    /**
     * Object mapping
     *
     * @param $queryRow
     * @return \Concrete\Package\Football\Src\Entity\Team
     */
    public function getResult($queryRow)
    {
        $ai = Team::getByID($queryRow['id']);
        return $ai;
    }

    /**
     * Gets the pagination object for the query.
     * @return \Concrete\Core\Search\Pagination\Pagination
     */
    protected function createPaginationObject()
    {
        $adapter = new DoctrineDbalAdapter($this->deliverQueryObject(), function ($query) {
            $query->select('count(btft.id)')->setMaxResults(1);
        });
        $pagination = new Pagination($this, $adapter);
        return $pagination;
    }

    public function getTotalResults()
    {
        $query = $this->deliverQueryObject();
        return $query->select('count(btft.id)')
            ->setMaxResults(1)
            ->execute()
            ->fetchColumn();
    }

}