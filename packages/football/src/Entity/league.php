<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 31/03/2015
 * Time: 12:18
 */

namespace Concrete\Package\Football\Src\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Concrete\Package\Football\Src\Entity;
use Database;

/**
 * @Entity
 * @Table(name="btFootballLeague")
 */
class League extends Entity
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     *
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $name;
    /** @Column(type="datetime") */
    private $year;
    /**@Column(type="integer") */
    private $pt_victory;
    /**@Column(type="integer") */
    private $pt_draw;
    /**@Column(type="integer") */
    private $pt_defeat;
    /**@Column(type="integer") */
    private $promotion;
    /**@Column(type="integer") */
    private $qualifying;
    /**@Column(type="integer") */
    private $relegation;
    /**@Column(type="integer") */
//    private $nb_leg;
//    private $team_link;
    /** @Column(type="datetime") */
    private $default_time;
//    private $nb_teams;
//    private $player_mod;
//    private $sport_type;
    /**@Column(type="integer") */
    private $nb_starter;
    /**@Column(type="integer") */
    private $nb_bench;
//    private $prediction_mod;
//    private $point_right;
//    private $point_wrong;
//    private $point_part;
//    private $deadline;
    /**
     * @OneToMany(targetEntity="Team", mappedBy="league")
     */
    private $teams;

    public function __construct($name, $year, $pt_victory = 3, $pt_draw = 1, $pt_defeat = 0, $promotion, $qualifying, $relegation, $default_time, $nb_starter, $nb_bench)
    {
        $this->name = $name;
        $this->year = $year;
        $this->pt_victory = $pt_victory;
        $this->pt_draw = $pt_draw;
        $this->pt_defeat = $pt_defeat;
        $this->promotion = $promotion;
        $this->qualifying = $qualifying;
        $this->relegation = $relegation;
        $this->default_time = $default_time;
        $this->nb_bench = $nb_bench;
        $this->teams = new ArrayCollection();
        $this->fixtures = new ArrayCollection();
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getPtVictory()
    {
        return $this->pt_victory;
    }

    /**
     * @param mixed $pt_victory
     */
    public function setPtVictory($pt_victory)
    {
        $this->pt_victory = $pt_victory;
    }

    /**
     * @return mixed
     */
    public function getPtDraw()
    {
        return $this->pt_draw;
    }

    /**
     * @param mixed $pt_draw
     */
    public function setPtDraw($pt_draw)
    {
        $this->pt_draw = $pt_draw;
    }

    /**
     * @return mixed
     */
    public function getPtDefeat()
    {
        return $this->pt_defeat;
    }

    /**
     * @param mixed $pt_defeat
     */
    public function setPtDefeat($pt_defeat)
    {
        $this->pt_defeat = $pt_defeat;
    }

    /**
     * @return mixed
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param mixed $promotion
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * @return mixed
     */
    public function getQualifying()
    {
        return $this->qualifying;
    }

    /**
     * @param mixed $qualifying
     */
    public function setQualifying($qualifying)
    {
        $this->qualifying = $qualifying;
    }

    /**
     * @return mixed
     */
    public function getRelegation()
    {
        return $this->relegation;
    }

    /**
     * @param mixed $relegation
     */
    public function setRelegation($relegation)
    {
        $this->relegation = $relegation;
    }


//    /**
//     * @return mixed
//     */
//    public function getNbLeg()
//    {
//        return $this->nb_leg;
//    }
//
//    /**
//     * @param mixed $nb_leg
//     */
//    public function setNbLeg($nb_leg)
//    {
//        $this->nb_leg = $nb_leg;
//    }

//    /**
//     * @return mixed
//     */
//    public function getTeamLink()
//    {
//        return $this->team_link;
//    }
//
//    /**
//     * @param mixed $team_link
//     */
//    public function setTeamLink($team_link)
//    {
//        $this->team_link = $team_link;
//    }

    /**
     * @return mixed
     */
    public function getDefaultTime()
    {
        return $this->default_time;
    }

    /**
     * @param mixed $default_time
     */
    public function setDefaultTime($default_time)
    {
        $this->default_time = $default_time;
    }

//    /**
//     * @return mixed
//     */
//    public function getNbTeams()
//    {
//        return $this->nb_teams;
//    }
//
//    /**
//     * @param mixed $nb_teams
//     */
//    public function setNbTeams($nb_teams)
//    {
//        $this->nb_teams = $nb_teams;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPlayerMod()
//    {
//        return $this->player_mod;
//    }
//
//    /**
//     * @param mixed $player_mod
//     */
//    public function setPlayerMod($player_mod)
//    {
//        $this->player_mod = $player_mod;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getSportType()
//    {
//        return $this->sport_type;
//    }
//
//    /**
//     * @param mixed $sport_type
//     */
//    public function setSportType($sport_type)
//    {
//        $this->sport_type = $sport_type;
//    }

    /**
     * @return mixed
     */
    public function getNbStarter()
    {
        return $this->nb_starter;
    }

    /**
     * @param mixed $nb_starter
     */
    public function setNbStarter($nb_starter)
    {
        $this->nb_starter = $nb_starter;
    }

    /**
     * @return mixed
     */
    public function getNbBench()
    {
        return $this->nb_bench;
    }

    /**
     * @param mixed $nb_bench
     */
    public function setNbBench($nb_bench)
    {
        $this->nb_bench = $nb_bench;
    }

//
//    /**
//     * @return mixed
//     */
//    public function getPredictionMod()
//    {
//        return $this->prediction_mod;
//    }
//
//    /**
//     * @param mixed $prediction_mod
//     */
//    public function setPredictionMod($prediction_mod)
//    {
//        $this->prediction_mod = $prediction_mod;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPointRight()
//    {
//        return $this->point_right;
//    }
//
//    /**
//     * @param mixed $point_right
//     */
//    public function setPointRight($point_right)
//    {
//        $this->point_right = $point_right;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPointWrong()
//    {
//        return $this->point_wrong;
//    }
//
//    /**
//     * @param mixed $point_wrong
//     */
//    public function setPointWrong($point_wrong)
//    {
//        $this->point_wrong = $point_wrong;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPointPart()
//    {
//        return $this->point_part;
//    }
//
//    /**
//     * @param mixed $point_part
//     */
//    public function setPointPart($point_part)
//    {
//        $this->point_part = $point_part;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getDeadline()
//    {
//        return $this->deadline;
//    }

    /**
     * @param mixed $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    public static function getByID($leagueID)
    {
        $em = Database::get()->getEntityManager();
        return $em->getRepository('\Concrete\Package\Football\Src\Entity\League')
            ->find($leagueID);
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