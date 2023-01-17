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

defined('MOODLE_INTERNAL') || die();

function local_greetings_get_greeting($user) {
    if ($user == null) {
        return get_string('greetinguser', 'local_greetings');
    }

    $country = $user->country;

    switch ($country) {
        case 'ES':
            $langstr = 'greetinguseres';
            break;
        case 'TR':
            $langstr = 'greetingusertr';
            break;
        default:
            $langstr = 'greetingloggedinuser';
            break;
    }

    return get_string($langstr, 'local_greetings', fullname($user));
}

/**
* Insert a link to index.php on the site front page navigation menu.
 *
 * @param navigation_node $frontpage Node representing the front page in the navigation tree.
 */
function local_greetings_extend_navigation_frontpage(navigation_node $frontpage) {
    if (get_config('local_greetings', 'showinnavigation')) {
        if (isloggedin() && !isguestuser()) {
            $frontpage->add(
                get_string('pluginname', 'local_greetings'),
                new moodle_url('/local/greetings/index.php'),
                navigation_node::TYPE_CUSTOM,
                null,
                null,
                new pix_icon('t/message', '')
            );
        }
    }
}

// funciton for Add a link to the navigation drawer
function local_greetings_extend_navigation(global_navigation $root)
{
    if (isguestuser()) {
        // throw new moodle_exception('noguest');
        return;
    }
    $node = navigation_node::create(
        get_string('pluginname', 'local_greetings'),
        new moodle_url('/local/greetings/index.php')
    );

    // $node->showinflatnavigation = true;
    $node->showinflatnavigation = get_config('local_greetings', 'showinnavigation');
    $root->add_node($node);
}