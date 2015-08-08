<?php
namespace Concrete\Package\Football\Controller\SinglePage\Dashboard\League;
use \Concrete\Core\Page\Controller\DashboardPageController;
use Request;
use Concrete\Package\Football\Models\LeaguesList;

use Loader;
use \Concrete\Package\Football\Models\Football;

class Leagues extends DashboardPageController {

    function view() {
        $list = new LeaguesList();
        $r = Request::getInstance();

        if ($r->query->has('keywords') && $r->query->get('keywords') != '') {
            $list->filterByKeywords($r->query->get('keywords'));
        }

        $pagination = $list->getPagination();
        $entries = $pagination->getCurrentPageResults();
        $this->set('list', $list);
        $this->set('pagination', $pagination);
        $this->set('entries', $entries);
    }

    /**
     * @return array
     */
    private function getLeagues() {
        Loader::model('leagues_list', 'leagues_list');
        $leagues = new LeaguesList();
        if ($_REQUEST['cmpKeywords']) {
            $leagues->filterByLeague($_REQUEST['cmpKeywords']);
        }
        return $leagues->get();
    }

}
