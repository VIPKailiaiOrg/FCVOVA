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
        $this->inc('full_table.php');
        break;
    case 1:
        $this->inc('small_table.php');
        break;
}
