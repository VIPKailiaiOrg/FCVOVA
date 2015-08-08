<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 31/03/2015
 * Time: 14:53
 */
defined('C5_EXECUTE') or die('Access Denied.');
switch ($type) {
    case 0:
        $this->inc('next_match.php');
        break;
    case 1:
        $this->inc('last_match.php');
        break;
}
