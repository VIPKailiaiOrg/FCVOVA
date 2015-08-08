<?php
defined('C5_EXECUTE') or die("Access Denied.");
//$valt = Loader::helper('validation/token');
//$th = Loader::helper('text');
//$ip = Loader::helper('validation/ip');
$form = Loader::helper('form');
?>
<script type="text/javascript">
	$(document).ready(function () {
		$('button#btnAddClub').on('click',
			function () {
			$.fn.dialog.open({
				href: "<?= URL::to('/football/team_edit'); ?>",
				title: 'Add Club',
				width: '400',
				height: '400',
				modal: true,
				resizable: false
			});
			return false;
		});
	});

	function editClub(clubId) {
		$.fn.dialog.open({
			href: "<?= URL::to('/football/team_edit?clubId='); ?>"+clubId,
			title: 'Add Club',
			width: '310',
			height: '350',
			modal: true,
			resizable: false
		});

	};

	function deleteClub(clubId, name) {
			$.fn.dialog.open({
				element: "#ccm-dialog-delete-entity",
				title: 'Add Club',
				width: '310',
				height: '350',
				modal: true,
				resizable: false
			});
		document.getElementById("sID").value = clubId;
		document.getElementById("name").value = name;
		};

</script>
<div class="ccm-dashboard-content-full">


	<div data-search-element="wrapper">
		<form role="form" data-search-form="logs" action="<?php echo $controller->action('view')?>" class="form-inline ccm-search-fields">
			<div class="ccm-search-fields-row">
				<div class="form-group">
					<?php echo $form->label('strTeam', t('Search team'))?>
					<div class="ccm-search-field-content">
						<div class="ccm-search-main-lookup-field">
							<i class="fa fa-search"></i>
							<?php echo $form->search('keywords', array('placeholder' => t('Keywords')))?>

								<button type="submit" class="btn btn-primary pull-right"><?php echo t('Search')?></button>
						</div>

					</div>
				</div>

			</div>
		</form>
		<form role="form" data-modifying-form="league" class="form-inline">
			<div class="btn-group" style="float:right; padding: 0px 10px 10px 0px; ">
				<button type="button"  id="btnAddClub" class="btn btn-default btn-success primary pull-left"><?php echo t('Add Club')?></button>

			</div>
		</form>

	</div>

	<div data-search-element="results">
		<div class="table-responsive">
			<table class="ccm-search-results-table">
				<thead>
				<tr>
<!--					<th></th>-->
					<th><span><?php echo t('Logo')?></span></th>
					<th><span><?php echo t('Name')?></span></th>
					<th><span><?php echo t('Country')?></span></th>
					<th><span><?php echo t('Venue')?></span></th>
					<th><span><?php echo t('Coach')?></span></th>
					<th></th>

				</tr>
				</thead>
				<tbody>
<!--				--><?php if (count($entries) > 0) {
					foreach($entries as $club) {?>
						<tr>
							<td class="message-cell">
								<div class="ccm-conversation-message-summary">
									<div class="message-output">
										<img src="<?php
										if($club->getImageId() != null)
										{
										$file = File::getRelativePathFromID($club->getImageId());

										echo $file;
										}?>" width="22"/>
									</div>
								</div>
							</td>
							<td class="message-cell">
								<div class="ccm-conversation-mgessage-summary">
									<div class="message-output">
										<?php echo $club->getName()?>
									</div>
								</div>
							</td>
							<td class="message-cell">
								<div class="ccm-conversation-message-summary">
									<div class="message-output">
										<?php echo $club->getCountry();?>
									</div>
								</div>
							</td>
							<td class="message-cell">
								<div class="ccm-conversation-message-summary">
									<div class="message-output">
										<?php echo $club->getVenue();?>
									</div>
								</div>
							</td>
							<td class="message-cell">
								<div class="ccm-conversation-message-summary">
									<div class="message-output">
										<?php echo $club->getCoach();?>
									</div>
								</div>
							</td>
							<td class="message-cell">
								<div class="btn-group">
									<button class="btn btn-primary" onclick="editClub('<?php echo $club->getsID();?>')"><?php echo t('Edit')?></button>
									<button data-dialog="delete-entity" class="btn btn-danger" onclick="deleteClub('<?php echo $club->getsID();?>', '<?php echo $club->getName();?>')"><?php  echo t("Delete")?></button>
								</div>
							</td>

						</tr>
					<?php }
				}?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="ccm-search-results-pagination">
		<?php print $pagination->renderDefaultView();?>
	</div>
</div>
<div style="display: none">
	<div id="ccm-dialog-delete-entity" class="ccm-ui">
		<form method="post" class="form-stacked" action="<?=$view->action('delete')?>">
			<?php print $form->hidden("sID"); ?>
			<?php print $form->hidden("name"); ?>
			<script type="text/javascript">
			</script>
			<p><?=t('Are you sure? This action cannot be undone. Id:')?></p>
		</form>
		<div class="dialog-buttons">
			<button class="btn btn-default pull-left" onclick="jQuery.fn.dialog.closeTop()"><?=t('Cancel')?></button>
			<button class="btn btn-danger pull-right" onclick="$('#ccm-dialog-delete-entity form').submit()"><?=t('Delete')?></button>
		</div>
	</div>
</div>