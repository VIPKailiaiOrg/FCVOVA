<?php       

namespace Concrete\Package\VividQuickpay;
use Package;
use BlockType;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

	protected $pkgHandle = 'vivid_quickpay';
	protected $appVersionRequired = '5.7.1';
	protected $pkgVersion = '1.0.1';
	
	
	
	public function getPackageDescription()
	{
		return t("Add PayPal Form to your site");
	}

	public function getPackageName()
	{
		return t("Quick Pay");
	}
	
	public function install()
	{
		$pkg = parent::install();
        BlockType::installBlockTypeFromPackage('quickpay', $pkg); 
        
	}
}
?>