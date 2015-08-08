<?php
namespace Concrete\Package\Football\Controller\SinglePage\Dashboard\League;

use \Concrete\Core\Page\Controller\DashboardPageController;
use \Concrete\Package\Football\Models\ClubsList;
use Request;
use \Concrete\Package\Football\Models\Club;


class Teams extends DashboardPageController {

    function view() {
        $list = new ClubsList();
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
	function delete() {
        if (isset($_POST['sID'])) {
            $club = Club::getByID($_POST['sID']);
            $club->delete();
        }

        $this->redirect('/dashboard/league/teams', 'deleted');

    }

    public function deleted()
    {
        $this->set('message', t('Club %s has been deleted successfully.', $_POST['sID']));
        $this->view();
    }


}
