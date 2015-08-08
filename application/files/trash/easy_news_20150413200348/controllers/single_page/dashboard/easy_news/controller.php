<?php
namespace Concrete\Package\EasyNews\Controller\SinglePage\Dashboard\Controller;
use \Concrete\Core\Page\Controller\DashboardPageController;
use View;
defined('C5_EXECUTE') or die(_("Access Denied."));
class DashboardEasyNewsController extends DashboardPageController {

	public $helpers = array('html','form');

	public function on_start() {
		header("Location: ".View::url('dashboard/easy_news/manage'));
		die();
	}
	
}