<?php
/**
 * Created by PhpStorm.
 * User: Vilius
 * Date: 2/22/2015
 * Time: 10:01 PM
 */
namespace Application\Block\HelloWorld;
use Concrete\Core\Block\BlockController;
class Controller extends BlockController
{

    protected $btTable = 'btHelloWorld';
    public function getBlockTypeName()
    {
        return t('Hello World');
    }

    public function getBlockTypeDescription()
    {
        return t('This is my sample block.');
    }
}