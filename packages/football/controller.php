<?php
namespace Concrete\Package\Football;
use Package;
use BlockType;
use SinglePage;
use Loader;
use Concrete\Controller\Dialog;
use Concrete\Core\Support\Facade\Route;
defined('C5_EXECUTE') or die(_("Access Denied."));
class Controller extends Package {

	protected $pkgHandle = 'football';
	protected $appVersionRequired = '5.3.0';
	protected $pkgVersion = '1.0.2';

	public function getPackageName() {
		return t("Football League");
	}

	public function getPackageDescription() {
		return t("Football League Package");
	}


	public function on_start(){
		Route::register('football/team_edit', '\Concrete\Package\Football\Controller\Dialog\TeamEdit::view');
		Route::register('football/team_edit/add', '\Concrete\Package\Football\Controller\Dialog\TeamEdit::add');
		Route::register('football/league/{favorite}','\Concrete\Package\Football\Controller\Ajax\League::setFavoriteTeam');
	}

	public function install() {

		$pkg = parent::install();

		// install block
		$bt = BlockType::installBlockTypeFromPackage('league_table', $pkg);
		$bt = BlockType::installBlockTypeFromPackage('match', $pkg);

		// install single page
		Loader::model('club');
		Loader::model('league');
		//$p = Dialog::add()

		$p = SinglePage::add('/dashboard/league', $pkg);
		if (is_object($p) && $p->isError() !== false) {
			$p->update(array('cName'=>'League', 'cDescription'=>'Football league plugin.'));
		}

        $p = SinglePage::add('/dashboard/league/teams', $pkg);
        if (is_object($p) && $p->isError() !== false) {
            $p->update(array('cName'=>'Teams', 'cDescription'=>'Displays all football teams from database.'));
        }
		$p = SinglePage::add('/dashboard/league/leagues', $pkg);
		if (is_object($p) && $p->isError() !== false) {
			$p->update(array('cName'=>'Leagues', 'cDescription'=>'Displays all football leagues from database.'));
		}
	}

	public function upgrade(){

//		$pkg = Package::getByHandle('football')->upgrade();

		$pkg = $this;
		parent::upgrade();
	//	$this->configurePackage($pkg);

		$this->set('message',t('Package has successfully been upgraded'));
	}

	public function uninstall() {
		parent::uninstall();
		$db = Loader::db();
	//	$db->Execute('DROP TABLE btEmailListSignup');
	}

}