<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>;.

/**
 * @package     local_greetings
 * @copyright   2023 Nawar Shabook <nawarshabook@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

/*bellow This is to halt the execution of the script if the library
was not loaded by some other script. The constant MOODLE_INTERNAL
is defined during the execution environment setup. 
*/
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_greetings', get_string('pluginname', 'local_greetings'));
    $ADMIN->add('localplugins', $settings);

    if ($ADMIN->fulltree) {
        require_once($CFG->dirroot . '/local/greetings/lib.php');

        $settings->add(new admin_setting_configcheckbox(
            'local_greetings/showinnavigation',
            get_string('showinnavigation', 'local_greetings'),
            get_string('showinnavigationdesc', 'local_greetings'),
            '1',
        ));
    }
}