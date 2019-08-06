<?php

namespace jianyan\migration\components;

use Yii;
use yii\base\BaseObject;


/**
 * Class OutputString
 *
 */
class OutputString extends BaseObject
{

    /**
     *
     * @var string
     */
    public $nw = "\n";

    /**
     *
     * @var string
     */
    public $tab = "    ";

    /**
     *
     * @var string
     */
    public $outputStringArray = array();

    /**
     *
     * @var int
     */
    public $tabLevel = 0;

    /**
     * Adds string to output string array with "tab" prefix
     *
     * @var string $str
     */
    public function addStr($str)
    {
        $str = str_replace($this->tab, '', $str);
        $this->outputStringArray[] = str_repeat($this->tab, $this->tabLevel) . $str;
    }

    /**
     * Returns string output
     */
    public function output()
    {
        return implode($this->nw, $this->outputStringArray);
    }
}
