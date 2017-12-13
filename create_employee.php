<?php
/**
 * 2017 PrestaChamps
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file LICENSE.
 *
 * @author     Zoltan <zoli@prestachamps.com>
 * @copyright  PrestaChamps
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html
 */

/**
 * Create an employee without back-office access. Copy anywhere,
 * but change the config.inc.php path accordingly
 */
require(dirname(__FILE__) . '/config/config.inc.php');
try {
    $employee = new Employee();
    $employee->firstname = "Bruce";
    $employee->lastname = "Wayne";
    $employee->id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
    $employee->id_profile = _PS_ADMIN_PROFILE_;
    $employee->default_tab = Tab::getIdFromClassName('AdminDashboard');
    $employee->email = "batman@bruce-wayne.com";
    $employee->passwd = Tools::encrypt("BatmanWasHere");
    $employee->save();
    echo "<br><code>Employee added</code>";
} catch (Exception $exception) {
    echo "<code>{$exception->getMessage()}</code>";
}
