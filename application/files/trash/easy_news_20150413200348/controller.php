<?php
namespace Concrete\Package\EasyNews;
use Package;
use BlockType;
use SinglePage;
use Loader;
use CollectionAttributeKey;
defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package {

	protected $pkgHandle = 'easy_news';
	protected $appVersionRequired = '5.4.0';
	protected $pkgVersion = '1.2.0';
	
	function __construct(){
		Loader::library('controller',$this->pkgHandle); //Used by controllers
		Loader::library('dashboardcontroller',$this->pkgHandle); //Used by controllers
	}
	
	public function getPackageDescription() {
		return t('Add multiple news area to your site.');
	}
	
	public function getPackageName() {
		return t('Easy News');
	}
	
	public function upgrade(){
		parent::upgrade();
        $pkg = Package::getByHandle($this->pkgHandle);
		
		Loader::model('single_page');
		
		$ls=SinglePage::getListByPackage($pkg);
		foreach($ls as $p){
			$p->delete();
		}
		
		$def = SinglePage::add('/dashboard/easy_news', $pkg);
		$def->update(array('cName'=>'Easy News', 'cDescription'=>t('Manage site news.')));
		$def = SinglePage::add('/dashboard/easy_news/manage', $pkg);
		$def->update(array('cName'=>'Manage', 'cDescription'=>t('Easy news manage.')));
		$def = SinglePage::add('/dashboard/easy_news/help', $pkg);
		$def->update(array('cName'=>'Help', 'cDescription'=>t('Easy News help.')));
	}
	
	public function install() {
		$pkg = parent::install();
		Loader::model('single_page');
		Loader::model('attribute/categories/collection');
		
		// install attributes
		$cab1 = CollectionAttributeKey::add('BOOLEAN',array('akHandle' => 'easynews_section', 'akName' => t('NEWS Section'), 'akIsSearchable' => true), $pkg);

		//install block
		BlockType::installBlockTypeFromPackage('easynews_list', $pkg);

		//install pages
		$def = SinglePage::add('/dashboard/easy_news', $pkg);
		$def->update(array('cName'=>'Easy News', 'cDescription'=>t('Manage site news.')));
		$def = SinglePage::add('/dashboard/easy_news/manage', $pkg);
		$def->update(array('cName'=>'Manage', 'cDescription'=>t('Easy news manage.')));
		$def = SinglePage::add('/dashboard/easy_news/help', $pkg);
		$def->update(array('cName'=>'Help', 'cDescription'=>t('Easy News help.')));
		


	}
}