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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin strings are defined here.
 *
 * @package     local_greetings
 * @category    string
 * @copyright   2023 Nawar Shabook <nawarshabook@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Greetings';

$string['greetinguser'] = 'Greetings, user.';
$string['greetingloggedinuser'] = 'Greetings, {$a}.';
$string['greetinguserau'] = 'Hello, {$a}.';
$string['greetinguseres'] = 'Hola, {$a}.';
$string['greetinguserfj'] = 'Bula, {$a}.';
$string['greetingusernz'] = 'Kia Ora, {$a}.';
$string['greetingusertr'] = 'Merhaba, {$a}.';

//for message
$string['yourmessage'] = 'Your message';
//for know who submit the message
$string['postedby'] = 'Posted by {$a}.';
//language strings for Control access using capabilities
$string['greetings:viewmessages'] = 'View messages on the Greetings wall';
$string['greetings:postmessages'] = 'Post a new message on the Greetings wall';
$string['greetings:deleteanymessage'] = 'Delete a message on the Greetings wall';

//set config for plugins in UI
$string['showinnavigation'] = 'Show in navigation';
$string['showinnavigationdesc'] = 'When enabled will show link in navigation';
