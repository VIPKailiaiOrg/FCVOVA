<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 03/05/2015
 * Time: 22:19
 */

namespace Concrete\Package\Football\Src\Entity;

use Concrete\Package\Football\Src\Entity;
use Database;

/**
 * @Entity
 * @Table(name="btFootballTeam")
 */
class Team extends Entity{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="League", inversedBy="teams")
     * @JoinColumn(name="id_league", referencedColumnName="id")
     */
    private $league;

    /**
     * @ManyToOne(targetEntity="Club", inversedBy="teams")
     * @JoinColumn(name="id_club", referencedColumnName="sID")
     */
    private $club;

    /**

     * @Column(type="integer")
     */
    private $penalty;

    public function __construct($club, $league, $penalty = 0)
    {
        $this->club = $club;
        $this->league = $league;
        $this->penalty = $penalty;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * @param mixed $league
     */
    public function setLeague($league)
    {
        $this->league = $league;
    }

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($club)
    {
        $this->club = $club;
    }

    /**
     * @return mixed
     */
    public function getPenalty()
    {
        return $this->penalty;
    }

    /**
     * @param mixed $penalty
     */
    public function setPenalty($penalty)
    {
        $this->penalty = $penalty;
    }

    public static function getByID($teamID)
    {
        $em = Database::get()->getEntityManager();
        return $em->getRepository('\Concrete\Package\Football\Src\Entity\Team')
            ->find($teamID);
    }

    public function add()
    {
        $em = Database::get()->getEntityManager();
        $em->persist($this);
        $em->flush();
    }

    public function delete()
    {
        $em = Database::get()->getEntityManager();
        $em->remove($this);
        $em->flush();
    }

}