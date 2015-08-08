<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 04/08/2015
 * Time: 19:58
 */
defined('C5_EXECUTE') or die('Access Denied.');
$th = Loader::helper('text');
$animal = $th->sanitize($_REQUEST['league_id']);
echo 'You told us your favorite animal is a "' . $animal .
    '", so we updated this page with that information using AJAX. Boom!';