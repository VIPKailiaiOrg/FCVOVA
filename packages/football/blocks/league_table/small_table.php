<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 07/04/2015
 * Time: 21:57
 */
?>
<div class="league-table">
    <table class="league-table">
        <thead>
        <tr>
            <th><span><?php echo t('#')?></span></th>
            <th><span><?php echo t('Team')?></span></th>
            <th><span><?php echo t('GP')?></span></th>
            <th><span><?php echo t('PTS')?></span></th>
        </tr>
        </thead>
        <tbody>
        <?php

        $i = 1;
        if (count($teams) > 0) {
            foreach($teams as $team) {
                if ($favorite_team_id == $team->id_team){
                    $favorite_class = "favorite";
                    $favorite_position = $i;
                }
                $i++;
            }
        }
        $half_size = intval($size/2);
        $half_total = intval(count($teams)/2);

        if($favorite_position <= $half_size)
        {
            if (count($teams) > 0) {
                for($i = 0; $i < $size; $i++) {?>
                    <tr>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
                                    <?php echo $i+1?>
                                </div>
                            </div>
                        </td>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class=""><?php
                                   //     echo "<img src='".$path."' width='20'/>";
                                        echo $teams[$i]->club_name; ?>
                                </div>
                            </div>
                        </td>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
                                    <?php echo $teams[$i]->played;?>
                                </div>
                            </div>
                        </td>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
                                    <?php echo $teams[$i]->points;?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php }
            }
        }
        elseif($favorite_position >= $half_size && $favorite_position+$half_size <= count($teams))
        {
            if (count($teams) > 0) {
                for($i = $favorite_position-$half_size-1; $i <= $favorite_position+$half_size-1; $i++) {?>
                    <tr>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
                                    <?php echo $i+1?>
                                </div>
                            </div>
                        </td>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
<!--                                    --><?php //$path = "http://".$_SERVER['HTTP_HOST']."/packages/football/team_logos/".$teams[$i]->logo_big;?>
<!--                                    --><?php //echo "<img src='".$path."' width='20'/>"; ?>
                                    <?php echo $teams[$i]->club_name; ?>
                                </div>
                            </div>
                        </td>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
                                    <?php echo $teams[$i]->played;?>
                                </div>
                            </div>
                        </td>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
                                    <?php echo $teams[$i]->points;?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php }
            }
        }

        elseif($favorite_position >= $half_size && $favorite_position+$half_size > count($teams))
        {
            if (count($teams) > 0) {
                for($i = count($teams)-$size; $i <= count($teams)-1; $i++) {?>
                    <tr>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
                                    <?php echo $i+1?>
                                </div>
                            </div>
                        </td>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
<!--                                    --><?php //$path = "http://".$_SERVER['HTTP_HOST']."/packages/football/team_logos/".$teams[$i]->logo_big;?>
<!--                                    --><?php //echo "<img src='".$path."' width='20'/>"; ?>
                                    <?php echo $teams[$i]->club_name; ?>
                                </div>
                            </div>
                        </td>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
                                    <?php echo $teams[$i]->played;?>
                                </div>
                            </div>
                        </td>
                        <td class="team-table-cell <?php if($favorite_position == $i+1) {echo $favorite_class;} ?>">
                            <div class="">
                                <div class="">
                                    <?php echo $teams[$i]->points;?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php }
            }
        }
        ?>
        </tbody>
    </table>
</div>