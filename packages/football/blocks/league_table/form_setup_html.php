<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 31/03/2015
 * Time: 14:49
 */
defined('C5_EXECUTE') or die('Access Denied.');
$form = Loader::helper('form');

echo '<div class="ccm-block-field-group">';


echo '<h2>' . t('League') . '</h2>';
$leagues = $controller->getLeagues();
$league_id = 1;
echo $form->Select('league_id', $leagues , $league_id, "");

echo '<h2>' . t('Favorite Team') . '</h2>';
$teams = $controller->getTeams($league_id);
echo $form->Select('favorite_team_id', $teams , $favorite_team_id, "");

echo '<h2>' . t('Type') . '</h2>';
$options = [0 => "FULL", 1=> "SMALL"];
echo $form->Select('type', $options , $type, "");


echo '<h2>' . t('Size') . '</h2>';
echo $form->number('size', $size, "");


echo '</div>';
?>

<div id="ajax-content"></div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#league_id').on('change', function(e){
            var league_id = $(this).val();
            $.ajax({
                url: "<?php echo $controller->getUrlToAjax();?>/" + escape(league_id),
                dataType: 'json',
                success: getResponse
            });
        });
    });

    function getResponse(r)
    {
        $('#favorite_team_id').empty();
        if(r == null) return;
        for (var i = 0; i < _.keys(r).length; i++) {

            $('#favorite_team_id').append($("<option></option>")
                    .attr("value", _.keys(r)[i])
                    .text(_.values(r)[i])
            );
        }

        $('#ajax-response').text(JSON.stringify(r));
    }
</script>
<div id="ajax-response"></div>