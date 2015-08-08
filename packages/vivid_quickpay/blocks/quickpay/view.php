<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="<?php echo $paypalEmail?>">
    <input type="hidden" name="lc" value="US">
    <input type="hidden" name="item_name" value="<?php echo $productDesc?>">
    <?php  if($mode=="fixed"){?>
    <input type="hidden" name="amount" value="<?php echo $productPrice?>">
    <?php  } else{ ?>

<!--        <label>--><?php //echo t('Enter Amount:')?><!--</label>-->
        <table>
            <tr>
                <td>
                    <div class="input-group">
                            <span class="input-group-addon tttt">€</span>
                            <input type="text" class="form-control ttttt" name="amount" value="10">
                            <span class="input-group-addon tttt">.00</span>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <?php  if($mode=="fixed"){?>
                            <button class="btn btn-primary tttt"><?php echo $fixedLabel?> ($<?php echo $productPrice?>)</button>
                        <?php  } else{ ?>
                            <button class="btn btn-primary tttt"><?php echo $donateLabel?></button>
                        <?php  } ?>
                    </div>
                </td>
            </tr>
        </table>
    <?php  } ?>
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="button_subtype" value="services">
    <input type="hidden" name="no_note" value="0">
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest"><img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

</form>

