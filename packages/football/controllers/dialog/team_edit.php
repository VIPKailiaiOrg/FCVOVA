<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 24/07/2015
 * Time: 01:03
 */
namespace Concrete\Package\Football\Controller\Dialog;
use Concrete\Core\Controller\Controller;
use Concrete\Core\File\Importer;
use Concrete\Package\Football\Models\Club;
use Request;

class TeamEdit extends Controller {

    protected $viewPath = "dialogs/team_edit";
    public $id;
    public $name;
    public $country;
    public $venue;
    public $coach;
    public $imageId;
    public $creation;
    public $website;

    public function view()
    {
        $r = Request::getInstance();
        if ($r->query->has('clubId') && $r->query->get('clubId') != '') {
            $club = Club::getByID($r->query->get('clubId'));
            $this->id = $club->getsID();
            $this->name = $club->getName();
            $this->country = $club->getCountry();
            $this->venue = $club->getVenue();
            $this->coach = $club->getCoach();
            $this->imageId = $club->getImageId();
            $this->creation = $club->getCreation();
            $this->website = $club->getWebsite();
        }


    }


    public function add()
    {
        if (isset($_POST['sID']) && $_POST['sID'] != "0" && $_POST['sID'] != null && $_POST['sID'] != "") {
            $club = Club::getByID($_POST['sID']);
        }
        else{
            $club = new Club();
        }

        $fi = new Importer();
        $pathToFile = $_FILES['logoInput']['tmp_name'];
        $nameOfFile = $_FILES['logoInput']['name'];
        $result = $fi->import($pathToFile, $nameOfFile);

        if ($result instanceof \Concrete\Core\File\Version) {
            $club->setImageId($result->getFileID());
        }

        $club->setName($_POST['nameInput']);
        $club->setCountry($_POST['countryInput']);
        $club->setVenue($_POST['venueInput']);
        $club->setCoach($_POST['coachInput']);
        $club->setCreation($_POST['creationInput']);
        $club->setWebsite($_POST['websiteInput']);


        $club->add();
      $this->redirect('/dashboard/league/teams');

    }
}