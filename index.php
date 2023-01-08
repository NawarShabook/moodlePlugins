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

// Most php files that can be directly accessed
// begin with requiring the config.php file,
// located in the root of the Moodle folder.
require_once('../../config.php'); 
require_once($CFG->dirroot. '/local/greetings/lib.php');
require_once($CFG->dirroot. '/local/greetings/message_form.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/greetings/index.php'));
$PAGE->set_pagelayout('standard');

// We are making use of global variable $SITE
// to access details about the Moodle site.
$PAGE->set_title($SITE->fullname);
$PAGE->set_heading(get_string('pluginname', 'local_greetings'));

$messageform = new local_greetings_message_form();

//header
echo $OUTPUT->header();
echo (isloggedin())?'<h2>Greetings, ' . fullname($USER) . '</h2>': '<h2>Greetings, user</h2>';
// if (isloggedin()) {
//     echo '<h2>Greetings, ' . fullname($USER) . '</h2>';
// } else {
//     echo '<h2>Greetings, user</h2>';
// }?
echo (isloggedin())? get_string('greetingloggedinuser', 'local_greetings', fullname($USER)):
get_string('greetinguser', 'local_greetings');

echo '<br>'. local_greetings_get_greeting($USER);

$messageform->display();
//bellow for check what data has been submitted by the form.
if ($data = $messageform->get_data()) {
    //var_dump($data); //simple way for test what we are doing
    
    $message = required_param('message', PARAM_TEXT);
    echo $OUTPUT->heading($message, 4);
}
//footer
echo $OUTPUT->footer();
