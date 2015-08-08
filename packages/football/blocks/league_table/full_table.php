<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 07/04/2015
 * Time: 21:51
 */
 ?>
<div class="league-table">
    <table class="league-table">
        <thead>
        <tr>
            <th><span><?php echo t('#')?></span></th>
            <th><span><?php echo t('Team')?></span></th>
            <th><span><?php echo t('GP')?></span></th>
            <th><span><?php echo t('W')?></span></th>
            <th><span><?php echo t('D')?></span></th>
            <th><span><?php echo t('L')?></span></th>
            <th><span><?php echo t('GF')?></span></th>
            <th><span><?php echo t('GA')?></span></th>
            <th><span><?php echo t('GD')?></span></th>
            <th><span><?php echo t('PTS')?></span></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        if (count($teams) > 0) {
            foreach($teams as $team) {?>
                <tr>
                    <td class="team-table-cell">
                        <div class="">
                            <div class="">
                                <?php echo $i++?>
                            </div>
                        </div>
                    </td>
                    <td class="team-table-cell <?php if ($favourite_team_id == $id_team) echo "favourite";?>">
                        <div class="">
                            <div class="">
                                <?php
//                                    $path = DIR_REL.'/packages/football/team_logos/'.$team->logo_big;
//                                    echo "<img src='".$path."' width='20'/>";
                                    echo '&nbsp;'.$team->club_name
                                ?>
                            </div>
                        </div>
                    </td>
                    <td class="team-table-cell">
                        <div class="">
                            <div class="">
                                <?php echo $team->played;?>
                            </div>
                        </div>
                    </td>
                    <td class="team-table-cell">
                        <div class="">
                            <div class="">
                                <?php echo $team->victory;?>
                            </div>
                        </div>
                    </td>
                    <td class="team-table-cell">
                        <div class="">
                            <div class="">
                                <?php echo $team->draw;?>
                            </div>
                        </div>
                    </td>
                    <td class="team-table-cell">
                        <div class="">
                            <div class="">
                                <?php echo $team->defeat;?>
                            </div>
                        </div>
                    </td>
                    <td class="team-table-cell">
                        <div class="">
                            <div class="">
                                <?php echo $team->goal_for;?>
                            </div>
                        </div>
                    </td>
                    <td class="team-table-cell">
                        <div class="">
                            <div class="">
                                <?php echo $team->goal_against;?>
                            </div>
                        </div>
                    </td>
                    <td class="team-table-cell">
                        <div class="">
                            <div class="">
                                <?php echo $team->diff;?>
                            </div>
                        </div>
                    </td>
                    <td class="team-table-cell">
                        <div class="">
                            <div class="">
                                <?php echo $team->points;?>
                            </div>
                        </div>
                    </td>

                </tr>
            <?php }
        }?>
        </tbody>
    </table>
</div>