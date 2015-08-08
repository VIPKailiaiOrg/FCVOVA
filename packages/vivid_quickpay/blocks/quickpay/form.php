<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<div class="form-group">
    <?php  echo $form->label('paypalEmail', t('Paypal Email'));?>
    <?php  echo $form->text('paypalEmail', $paypalEmail);?>
</div>

<div class="form-group">
    <?php  echo $form->label('productDesc', t('Product Description'));?>
    <?php  echo $form->text('productDesc', $productDesc);?>
</div>

<div class="form-group">
    <?php  echo $form->label('mode', t('Payment Mode'));?>
    <?php  echo $form->select('mode', array("fixed"=>t("Fixed Price"),"open"=>t("Let Customer Decide")),$mode,array("onChange" => "updateType();"));?>
</div>

<div id="form-fixed-price">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <?php  echo $form->label('productPrice', t('Product Price'));?>
                <div class="input-group">        
                    <div class="input-group-addon">$</div>
                    <?php  echo $form->text('productPrice', $productPrice?$productPrice:"10");?>
                    <div class="input-group-addon">.00</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <?php  echo $form->label('fixedLabel', t('Fixed Price Label'));?>
                <?php  echo $form->text('fixedLabel', $fixedLabel?$fixedLabel:t("Purchase"));?>
            </div>
        </div>
    </div>  
</div>

<div id="form-donate">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <?php  echo $form->label('donateLabel', 'Donate Label');?>
                <?php  echo $form->text('donateLabel', $donateLabel?$donateLabel:"Donate");?>
            </div>
        </div>
    </div>  
</div>

<script type="text/javascript">

    function updateType(){
        $("#mode").each(function(){
            
            if ( $(this).find("option:selected").val() == "fixed" ) {
                $("#form-fixed-price").show();
                $("#form-donate").hide();
            }
            if ($(this).find("option:selected").val() == "open" ) {
                $("#form-fixed-price").hide();
                $("#form-donate").show();
            }
        });
    };
    updateType();

</script>