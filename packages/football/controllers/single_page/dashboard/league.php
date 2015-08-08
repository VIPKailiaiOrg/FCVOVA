<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 23/07/2015
 * Time: 18:11
 */
namespace Concrete\Package\Football\Controller\SinglePage\Dashboard;
use \Concrete\Core\Page\Controller\DashboardPageController;
class League extends DashboardPageController{

    public function view(){
        $this->redirect('/dashboard/league/teams');
    }

}