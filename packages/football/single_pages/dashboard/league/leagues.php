<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 31/03/2015
 * Time: 13:11
 */

defined('C5_EXECUTE') or die("Access Denied.");
//$valt = Loader::helper('validation/token');
//$th = Loader::helper('text');
//$ip = Loader::helper('validation/ip');
$leagues = $entries;
?>
<style>
    td.hidden-actions {
        display: none;
    }
</style>
<div class="ccm-dashboard-content-full">

    <div data-search-element="wrapper">
        <form role="form" data-search-form="logs" action="<?php echo $controller->action('view')?>" class="form-inline ccm-search-fields">
            <div class="ccm-search-fields-row">
                <div class="form-group">
                    <?php echo $form->label('strLeague', t('Search league'))?>
                    <div class="ccm-search-field-content">
                        <div class="ccm-search-main-lookup-field">
                            <i class="fa fa-search"></i>
                            <?php echo $form->search('cmpKeywords', array('placeholder' => t('Keywords')))?>
                            <button type="submit" class="ccm-search-field-hidden-submit" tabindex="-1"><?php echo t('Search')?></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--			<div class="ccm-search-fields-row">-->
            <!--				<div class="form-group form-group-full">-->
            <!--					--><?php //echo $form->label('cmpMessageSort', t('Sort By'))?>
            <!--					<div class="ccm-search-field-content">-->
            <!--						--><?php //echo $form->select('cmpMessageSort', $cmpSortTypes)?>
            <!--					</div>-->
            <!--				</div>-->
            <!--			</div>-->

            <div class="ccm-search-fields-submit">
                <button type="submit" class="btn btn-primary pull-right"><?php echo t('Search')?></button>
            </div>

        </form>

    </div>

    <div data-search-element="results">
        <div class="table-responsive">
            <table class="ccm-search-results-table">
                <thead>
                <tr>
                    <!--					<th><span>--><?php //echo t('Logo')?><!--</span></th>-->
                    <th><span><?php echo t('Name')?></span></th>
                    <th><span><?php echo t('Year')?></span></th>
                </tr>
                </thead>
                <tbody>
                <!--				--><?php if (count($leagues) > 0) {
                    foreach($leagues as $league) {?>
                        <tr>
                            <td class="message-cell">
                                <div class="ccm-conversation-message-summary">
                                    <div class="message-output">
                                        <?php echo $league->getName()?>
                                    </div>
                                </div>
                            </td>
                            <td class="message-cell">
                                <div class="ccm-conversation-message-summary">
                                    <div class="message-output">
                                        <?php echo $league->getYear()->format('Y');?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php }
                }?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- END Body Pane -->
    <!--	--><?php //echo $list->displayPagingV2()?>

</div>


