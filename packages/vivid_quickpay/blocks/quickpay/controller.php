<?php 
namespace Concrete\Package\VividQuickpay\Block\Quickpay;
use \Concrete\Core\Block\BlockController;
use Loader;

defined('C5_EXECUTE') or die(_("Access Denied.")); 
class Controller extends BlockController
{
    protected $btTable = 'btQuickpay';
    protected $btInterfaceWidth = "400";
    protected $btWrapperClass = 'ccm-ui';
    protected $btInterfaceHeight = "365";

    public function getBlockTypeDescription()
    {
        return t("Add PayPal form to the Page");
    }

    public function getBlockTypeName()
    {
        return t("Quick Pay");
    }
}