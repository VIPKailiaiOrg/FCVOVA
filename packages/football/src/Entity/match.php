<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 22/04/2015
 * Time: 16:37
 */

namespace Concrete\Package\Football\Src\Entity;

use Concrete\Package\Football\Src\Entity;

class Match extends Entity {

























    public static function getNextMatch($teamID){
        $db = Loader::db();

        $r = $db->GetRow('SELECT
                            fm.*
                            ,ff.id_league
                            ,fch.name home_team_name
                            ,fch.logo_big home_team_logo
                            ,fca.name away_team_name
                            ,fca.logo_big away_team_logo
                            ,fch.venue
                          FROM btFootballFixture ff
                          INNER JOIN btFootballMatch fm ON ff.id = fm.id_fixture
                          INNER JOIN btFootballTeam ft ON (fm.id_team_home = ft.id OR fm.id_team_away = ft.id)
                          INNER JOIN (SELECT fc.name name, fc.logo_big logo_big, fc.venue venue, ft.id id_club FROM btFootballTeam ft INNER JOIN btFootballClub fc ON ft.id_club = fc.sID) fch ON fm.id_team_home = fch.id_club
                          INNER JOIN (SELECT fc.name name, fc.logo_big logo_big, ft.id id_club FROM btFootballTeam ft INNER JOIN btFootballClub fc ON ft.id_club = fc.sID) fca ON fm.id_team_away = fca.id_club
                          WHERE ft.id = ? AND fm.goal_home IS NULL ORDER BY fm.played ASC LIMIT 1', $teamID);

        if (is_array($r)) {
            $cnv = new static();
            $cnv->setPropertiesFromArray($r);
            return $cnv;
        }
    }

    public static function getLastMatch($teamID){
        $db = Loader::db();
        $r = $db->GetRow('SELECT
                            fm.*
                            ,ff.id_league
                            ,fch.name home_team_name
                            ,fch.logo_big home_team_logo
                            ,fca.name away_team_name
                            ,fca.logo_big away_team_logo
                          FROM btFootballFixture ff
                          INNER JOIN btFootballMatch fm ON ff.id = fm.id_fixture
                          INNER JOIN btFootballTeam ft ON (fm.id_team_home = ft.id OR fm.id_team_away = ft.id)
                          INNER JOIN (SELECT fc.name name, fc.logo_big logo_big, ft.id id_club FROM btFootballTeam ft INNER JOIN btFootballClub fc ON ft.id_club = fc.sID) fch ON fm.id_team_home = fch.id_club
                          INNER JOIN (SELECT fc.name name, fc.logo_big logo_big, ft.id id_club FROM btFootballTeam ft INNER JOIN btFootballClub fc ON ft.id_club = fc.sID) fca ON fm.id_team_away = fca.id_club
                          WHERE ft.id = ? AND fm.goal_home IS NOT NULL ORDER BY fm.played DESC LIMIT 1', $teamID);
        if (is_array($r)) {
            $cnv = new static();
            $cnv->setPropertiesFromArray($r);
            return $cnv;
        }
    }
}