<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 31/03/2015
 * Time: 14:49
 */



defined('C5_EXECUTE') or die('Access Denied.');
$al = Loader::helper('concrete/asset_library');

echo '<div class="ccm-block-field-group">';


echo '<h2>' . t('League') . '</h2>';
$leagues = $controller->getLeagues();
echo $form->Select('league_id', $leagues , $league_id, "");

echo '<h2>' . t('Team') . '</h2>';
$teams = $controller->getTeams();
echo $form->Select('team_id', $teams , $team_id, "");

echo '<h2>' . t('Type') . '</h2>';
$options = [0 => "Next Match", 1=> "Last Match"];
echo $form->Select('type', $options , $type, "");


echo '</div>';
