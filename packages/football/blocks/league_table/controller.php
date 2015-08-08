<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 31/03/2015
 * Time: 14:37
 */
namespace Concrete\Package\Football\Block\LeagueTable;
use \Concrete\Core\Block\BlockController;
use Concrete\Core\Routing\URL;
use \Concrete\Package\Football\Models\LeagueTable as LeagueTable;
use Concrete\Package\Football\Models\LeaguesList as LeaguesList;
use Concrete\Package\Football\Models\TeamsList;
use Loader;

class Controller extends BlockController{
    protected $btTable = 'btLeagueTable';
    protected $btInterfaceWidth = "590";
    protected $btInterfaceHeight = "450";
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
    public function getUrlToAjax()
    {
        return Url::to('/football/league');
    }

    public function getBlockTypeDescription() {
        return t("Displays Selected League Table");
    }
    public function getBlockTypeName() {
        return t("Football League Table");
    }
    public function view(){
        $this->set('bID', $this->bID);
        $this->set('league_id', $this->league_id);
        $this->set('type', $this->type);
        $this->set('size', $this->size);
        $this->set('favorite_team_id', $this->favorite_team_id);
        $teams = new LeagueTable($this->league_id);
        $a = $teams->get();
        $this->set('teams', $a);

    }

    public function save($data) {
        parent::save($data);
    }
    public function getData() {
        return $teams = new LeagueTable($this->league_id);
    }

    public function getLeagues(){
        Loader::model('leagues_list', 'leagues_list');
        $leaguesList  = new LeaguesList();
        $leagues = $leaguesList->get();
        foreach($leagues as $league ){
            $leaguesDropDownArray[$league->getId()] = ($league->getName());
        }
        return $leaguesDropDownArray;
    }

    public function getTeams($league_id){
        Loader::model('teams_list', 'teams_list');
        $teamsList  = new TeamsList();
        $teamListEntities = $teamsList->getResults();
        foreach($teamListEntities as $team ){
            if($team->getLeague()->getId() == $league_id)
            $teamsDropDownArray[$team->getId()] = ($team->getClub()->getName());
        }
        return $teamsDropDownArray;
    }
}
