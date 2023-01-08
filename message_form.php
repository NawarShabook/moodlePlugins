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

// moodleform is defined in formslib.php
require_once($CFG->libdir . '/formslib.php');


/*Our form class will need to extend moodleform.
Add the following block of code for our form class.
Note the frankenstyle class name of the new class. */
class local_greetings_message_form extends moodleform {
    /**
     * Define the form.
     */
    public function definition() {
        $mform = $this->_form; // Don't forget the underscore! 

        //The bellow code adds a textarea element in the form. 
        $mform->addElement('textarea', 'message', get_string('yourmessage', 'local_greetings'));
        $mform->setType('message', PARAM_TEXT);
        
        //add a submit button to the form with the following code:
        $submitlabel = get_string('submit');
        $mform->addElement('submit', 'submitmessage', $submitlabel);
    }
    /*Notice that for the submit button label we are reusing one of
    Moodle's core language strings "submit". However, for the textarea input,
    we will be defining our own language string.*/

}