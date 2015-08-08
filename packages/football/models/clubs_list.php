<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 2/24/2015
 * Time: 2:03 PM
 */

namespace Concrete\Package\Football\Models;

use Concrete\Core\Search\ItemList\Database\ItemList;
use Concrete\Core\Search\Pagination\Pagination;
use Pagerfanta\Adapter\DoctrineDbalAdapter;
use Concrete\Package\Football\Src\Entity\Club;

class ClubsList extends ItemList {

	/**
	 * Create base query
	 */
	public function createQuery()
	{
		$this->query->select('btfc.sID')
			->from('btFootballClub', 'btfc');
	}

	/**
	 * Filter by keywords
	 *
	 * @param $keywords
	 */
	public function filterByKeywords($keywords) {
		$this->query->andWhere(
			$this->query->expr()->andX(
				$this->query->expr()->like('btfc.name', ':keywords')
			)
		);
		$this->query->setParameter('keywords', '%' . $keywords . '%');
	}

	/**
	 * Object mapping
	 *
	 * @param $queryRow
	 * @return \Concrete\Package\Football\Src\Entity\Club
	 */
	public function getResult($queryRow)
	{
		$ai = Club::getByID($queryRow['sID']);
		return $ai;
	}

	/**
	 * Gets the pagination object for the query.
	 * @return \Concrete\Core\Search\Pagination\Pagination
	 */
	protected function createPaginationObject()
	{
		$adapter = new DoctrineDbalAdapter($this->deliverQueryObject(), function ($query) {
			$query->select('count(btfc.sID)')->setMaxResults(1);
		});
		$pagination = new Pagination($this, $adapter);
		return $pagination;
	}

	public function getTotalResults()
	{
		$query = $this->deliverQueryObject();
		return $query->select('count(btfc.sID)')
			->setMaxResults(1)
			->execute()
			->fetchColumn();
	}
}