<?php

/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 06/08/2015
 * Time: 15:56
 */
namespace Concrete\Package\Football\Controller\Ajax;
use Concrete\Core\Controller\Controller;
use \Concrete\Core\Http\Request;
use Concrete\Package\Football\Models\TeamsList;
use Concrete\Core\Http\Service\Ajax;
use Core;
use Doctrine\Common\Collections\ArrayCollection;

class League extends Controller
{
    public function setFavoriteTeam() {
        $leagueId = Request::getInstance()->get('favorite');
        $th = Core::make('helper/text');
        $leagueId = $th->sanitize($leagueId);
        $data = $this->getTeams($leagueId);
        $results = new Ajax();
        $results->sendResult($data);

    }

    private function getTeams($league_id){
        $teamsList  = new TeamsList();
        $teamListEntities = $teamsList->getResults();
        foreach($teamListEntities as $team ){
            if($team->getLeague()->getId() == $league_id)
                $teamsDropDownArray[$team->getId()] = ($team->getClub()->getName());
        }
        return $teamsDropDownArray;
    }
}