<?php
/**
 * Created by PhpStorm.
 * User: Paulius
 * Date: 05/08/2015
 * Time: 15:35
 */

namespace Concrete\Package\Football\Src\Entity;


use Concrete\Package\Football\Src\Entity;

/**
 * @Entity
 * @Table(name="btFootballFixture")
 */
class Fixture extends Entity
{
    private $id;
    private $id_league;
    private $number;
}