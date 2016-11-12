<?php
/**
 * Pxe menu items manager class.
 *
 * PHP version 5
 *
 * @category PXEMenuOptionsManager
 * @package  FOGProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://fogproject.org
 */
/**
 * Pxe menu items manager class.
 *
 * @category PXEMenuOptionsManager
 * @package  FOGProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://fogproject.org
 */
class PXEMenuOptionsManager extends FOGManagerController
{
    /**
     * The Storage point for the registration items.
     *
     * @var array
     */
    private static $_regVals = array();
    /**
     * Builds the array.
     *
     * @return array
     */
    private static function _regText()
    {
        return self::$_regVals = array(
            0 => self::$foglang['NotRegHost'],
            1 => self::$foglang['RegHost'],
            2 => self::$foglang['AllHosts'],
            3 => self::$foglang['DebugOpts'],
            4 => self::$foglang['AdvancedOpts'],
            5 => self::$foglang['AdvancedLogOpts'],
            6 => self::$foglang['PendRegHost'],
            7 => self::$foglang['DoNotList'],
        );
    }
    /**
     * The menu select list item.
     *
     * @param string $request Which item is currently selected.
     *
     * @return string
     */
    public function regSelect($request = '')
    {
        self::$selected = $request;
        ob_start();
        $sender = self::_regText();
        array_walk(
            $sender,
            self::$buildSelectBox
        );
        return sprintf(
            '<select name="menu_regmenu">%s</select>',
            ob_get_clean()
        );
    }
}
