<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 01/04/2015
 * Time: 10:50
 */

namespace Concrete\Package\Football\Models;
use Concrete\Core\Foundation\Object;
use Loader;

class LeagueTableRow extends Object{
    public static function getByID($rowID)
    {
        $db = Loader::db();
        $r = $db->GetRow('select btftc.*, btfc.imageID from btFootballTableCache btftc INNER JOIN btFootballClub btfc ON btfc.sID = btftc.id_team where id = ?', array($rowID));
        if (is_array($r) && $r['id'] == $rowID) {
            $cnv = new static();
            $cnv->setPropertiesFromArray($r);
            return $cnv;
        }
    }
}