<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 07/04/2015
 * Time: 21:51
 */
?>
<div class="match-table">
    <table class="match-table">
        <thead>
        <tr>
            <th><span><?php echo t('Paskutinės rungtynės')?></span></th>
        </tr>
        </thead>
        <tbody>
        <?php

        if (!is_null($match)) { ?>
            <tr>
                <td class="match-table-cell">
                    <div class="">
                        <span><?php $date = new DateTime($match->played); echo $date->format('Y-m-d H:i'); ?></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="home-team-image">
<!--                        --><?php //$path = DIR_REL."/packages/football/team_logos/".$match->home_team_logo;?>
<!--                        --><?php //echo "<img src='".$path."' alt='".$match->home_team_name."'/>"; ?>
                    </div>
                    <div class="team-separator">
                        <?php echo $match->goal_home.":".$match->goal_away; ?>
                    </div>
                    <div class="away-team-image">
<!--                        --><?php //$path = DIR_REL."/packages/football/team_logos/".$match->away_team_logo;?>
<!--                        --><?php //echo "<img src='".$path."' alt='". $match->away_team_name."' />"; ?>
                    </div>
                </td>
            </tr>
            <!--                <tr>-->
            <!--                    <td>--><?php //echo $match->venue; ?><!--</td>-->
            <!--                </tr>-->
        <?php
        }?>
        </tbody>
    </table>
</div>