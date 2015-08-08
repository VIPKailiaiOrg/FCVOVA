<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 04/03/2015
 * Time: 12:29
 */

namespace Concrete\Package\Football\Src\Entity;

use Concrete\Package\Football\Src\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Database;

/**
 * @Entity
 * @Table(name="btFootballClub")
 */
class Club extends Entity{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     *
     */
    private $sID;

    /**
     * @OneToMany(targetEntity="Team", mappedBy="club")
     */
    private $teams;

    public function addTeam($name, $league, $penalty = 0)
    {
        $this->teams[$name] = new Team($this, $league, $penalty);
    }

    /**
     * @Column(type="string")
     */
    private $name;

    /**
     * @Column(type="string")
     */
    private $country;

    /**
     * @Column(type="string")
     */
    private $venue;

    /**
     * @Column(type="string")
     */
    private $coach;

    /**
     * @Column(type="string")
     */
    private $creation;

    /**
     * @Column(type="string")
     */
    private $website;

    /**
     * @Column(type="integer")
     */
    private $imageId;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
    }

    public function getsID()
    {
        return $this->sID;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getCountry()
    {
        return $this->country;
    }
    public function setCountry($country)
    {
        $this->country = $country;
    }
    public function getVenue()
    {
        return $this->venue;
    }
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }
    public function getCoach()
    {
        return $this->coach;
    }
    public function setCoach($coach)
    {
        $this->coach = $coach;
    }
    public function getImageId()
    {
        return $this->imageId;
    }
    public function setImageId($imageId)
    {
        $this->imageId = $imageId;
    }
    public function getCreation()
    {
        return $this->creation;
    }
    public function setCreation($creation)
    {
        $this->creation = $creation;
    }
    public function getWebsite()
    {
        return $this->website;
    }
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    public static function getByID($clubID)
    {
        $em = Database::get()->getEntityManager();
        return $em->getRepository('\Concrete\Package\Football\Src\Entity\Club')
        ->find($clubID);
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
