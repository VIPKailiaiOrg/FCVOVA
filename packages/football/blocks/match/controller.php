<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 31/03/2015
 * Time: 14:37
 */
namespace Concrete\Package\Football\Block\Match;
use \Concrete\Core\Block\BlockController;
use \Concrete\Package\Football\Models\Match as Match;
use \Concrete\Package\Football\Models\LeaguesList as LeaguesList;
use \Concrete\Package\Football\Models\TeamsList as ClubsList;
use Loader;


class Controller extends BlockController{
    protected $btTable = 'btLeagueMatch';
    protected $btInterfaceWidth = "590";
    protected $btInterfaceHeight = "450";
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
    public function getBlockTypeDescription() {
        return t("Displays Fixture/Match of Selected Team from Selected League");
    }
    public function getBlockTypeName() {
        return t("Match");
    }
    public function view(){
        $this->set('bID', $this->bID);
        $this->set('league_id', $this->league_id);
        $this->set('team_id', $this->team_id);
        $this->set('type', $this->type);

        Loader::model('match', 'match');

        if($this->type == 0){
            $match = Match::getNextMatch($this->team_id);
        }
        else{
            $match = Match::getLastMatch($this->team_id);
        }

        $this->set('match', $match);
    }

    public function save($data) {
        parent::save($data);
    }
    public function getData() {
        return $teams = new LeagueTable($this->$league_id);
    }

    public function getLeagues(){

        $leaguesList  = new LeaguesList();
        $leagues = $leaguesList->get();
        foreach($leagues as $league ){
            $leaguesDropDownArray[$league->id] = ($league->name);
        }
        return $leaguesDropDownArray;
    }

    public function getTeams(){

        $teamsList  = new ClubsList();
        $teams = $teamsList->get();
        foreach($teams as $team ){
            $teamsDropDownArray[$team->ftid] = ($team->name);
        }
        return $teamsDropDownArray;
    }
}
