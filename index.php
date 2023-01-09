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

//store message in database
// dont worry if you dont understand something, bellow of code there is an explain for it
if ($data = $messageform->get_data()) {
    $message = required_param('message', PARAM_TEXT);

    if (!empty($message)) {
        $record = new stdClass;
        $record->message = $message;
        $record->timecreated = time();

        $DB->insert_record('local_greetings_messages', $record);
    }
}
/**
    * Here is a breakdown of what the code above is doing:

    *The $data variable is assigned the result of calling the get_data() method on an object called $messageform. This method is likely to be part of a form class that is used to handle form submissions and extract the form data.

    *The required_param() function is called with the 'message' parameter and the PARAM_TEXT constant as arguments. This function is used to retrieve a required parameter from the current request. In this case, the 'message' parameter is likely to be a value that was submitted through the form. The PARAM_TEXT constant is used to specify that the 'message' parameter is expected to be a plain text value.

    *An if statement is used to check if the $message variable is empty. If the $message variable is not empty, the code inside the if statement will be executed.

    *A new instance of the stdClass class is created and stored in the $record variable. The stdClass class is a basic PHP class that can be used to create objects with arbitrary properties.

    *The message and timecreated properties of the $record object are set to the $message variable and the current time, respectively.

    *The insert_record() method of the $DB object is called with the 'local_greetings_messages' table name and the $record object as arguments. This method is likely to be part of a database class that is used to insert records into the Moodle database.

    *Overall, this code appears to be part of a form handler that is used to process a form submission, extract the 'message' parameter, and insert it into the local_greetings_messages table in the Moodle database.
*/

//header
echo $OUTPUT->header();
echo (isloggedin())?'<h2>Greetings, ' . fullname($USER) . '</h2>': '<h2>Greetings, user</h2>';

echo (isloggedin())? get_string('greetingloggedinuser', 'local_greetings', fullname($USER)):
get_string('greetinguser', 'local_greetings');

echo '<br>'. local_greetings_get_greeting($USER);

$messageform->display(); //for display form

//This line bellow fetches all the greeting messages from the table local_greetings_message.
$messages = $DB->get_records('local_greetings_messages');
echo $OUTPUT->box_start('card-columns');

//We will use Bootstrap Card columns
foreach ($messages as $m) {
    echo html_writer::start_tag('div', array('class' => 'card'));
    echo html_writer::start_tag('div', array('class' => 'card-body'));
    echo html_writer::tag('p', $m->message, array('class' => 'card-text'));
    echo html_writer::start_tag('p', array('class' => 'card-text'));
    //userdate() is core function, which is part of the Time API is used to convert the timestamp into a human readable value.
    echo html_writer::tag('small', userdate($m->timecreated), array('class' => 'text-muted'));
    echo html_writer::end_tag('p');
    echo html_writer::end_tag('div');
    echo html_writer::end_tag('div');
}

echo $OUTPUT->box_end();

/**
 * dsiplay the massege
 * this section bellow for dsiplay the massege on screen without store it in db
 * bellow for check what data has been submitted by the form.
 * if ($data = $messageform->get_data()) {
 *   //var_dump($data); //simple way for test what we are doing
 *   $message = required_param('message', PARAM_TEXT);
 *   echo $OUTPUT->heading($message, 4);
 *}
*/

//footer
echo $OUTPUT->footer();
