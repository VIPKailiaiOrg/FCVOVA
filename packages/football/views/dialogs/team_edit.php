<?php
defined('C5_EXECUTE') or die("Access Denied.");
$form = Loader::helper('form');
?>
<html>
<head>
<link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
</head>
<body>
<form id="team" method="post" enctype="multipart/form-data" action="<?php echo $view->action('add') ?>">
    <table >
        <tr>
            <td>
                <label for="nameInput" class="control-label">Name </label>
            </td>

            <td>
                <?php echo $form->text('nameInput', $controller->name) ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="countryInput" class="control-label">Country </label>
            </td>
            <td>
                <?php echo $form->text('countryInput', $controller->country) ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="venueInput" class="control-label" >Venue </label>
            </td>
            <td>
                <?php echo $form->text('venueInput', $controller->venue) ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="coachInput" class="control-label" >Coach </label>
            </td>
            <td>
                <?php echo $form->text('coachInput', $controller->coach) ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="imageInput" class="control-label" >Image </label>
            </td>
            <td>
                <?php echo $form->file('logoInput') ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="creationInput" class="control-label" >Creation </label>
            </td>
            <td>
                <?php echo $form->text('creationInput', $controller->creation) ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="websiteInput" class="control-label" >Website </label>
            </td>
            <td>
                <?php echo $form->text('websiteInput', $controller->website) ?>
            </td>
            <td>

            </td>
            <td>
                <?php echo $form->hidden('sID', $controller->id) ?>
            </td>
        </tr>
    </table>
<div class="button-group" >
            <button type="submit" id="save" class="btn btn-success primary" ><?php echo t('Save')?></button>
            <button type="button" id="cancel" class="btn btn-default " ><?php echo t('Cancel')?></button>
</div>

</form>
</body>
</html>
<script>
    $(function() {
        $("button#save").click(function(){
            $.ajax({
                type: "POST",
                url: "",
                data: $('form#team').serialize(),
                           });
        });
    });

    $(function(){
        $("button#cancel").click(function()
        {
            $.fn.dialog.closeTop();
        });
    });

$(function(){
    $("button#save").click(function()
    {
        $.fn.dialog.closeTop();
    });
});

</script>
<script type="text/javascript">

</script>