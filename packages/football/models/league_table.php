<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 31/03/2015
 * Time: 17:38
 */

namespace Concrete\Package\Football\Models;
use Concrete\Core\Legacy\DatabaseItemList;
use Loader;

class LeagueTable extends DatabaseItemList{
    public function __construct($league_id) {
        $this->setQuery('select * from btFootballTableCache btftc');
        $this->filter('id_league', $league_id);
        $this->sortByMultiple('points desc', 'diff desc');
  //      $this->sortBy('diff', 'desc');
        echo $this->userQuery;


    }

    public function get($num = 0, $offset = 0) {
        $r = parent::get($num, $offset);
        $clubs = array();
        foreach($r as $row) {
            $clubs[] = LeagueTableRow::getByID($row['id']);
        }
        return $clubs;
    }
}

