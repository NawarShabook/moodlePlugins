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

//This code defines an array of capabilities, explain it is bellow it
$capabilities = array(
    'local/greetings:postmessages' => array(
        'riskbitmask' => RISK_SPAM,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW,
        )
    ),
    'local/greetings:viewmessages' => array(
        'riskbitmask' => RISK_SPAM,
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW,
        )
    ),
    'local/greetings:deleteanymessage' => array(
        'riskbitmask' => RISK_SPAM,
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW,
        )
    ),
);

/** 
 * explain for above code
 * riskbitmask: This property is used to indicate the level of risk associated with the capability. It is a numeric value, and in this case, it is set to RISK_SPAM, which indicates that the capability has the potential to be used to send spam messages.
*captype: This property indicates the type of capability. It can be either 'write' or 'read'. in the first capability 'local/greetings:postmessages' the captype is 'write' and in the second one 'local/greetings:viewmessages' the captype is 'read' .
*contextlevel: This property indicates the context level at which the capability applies. In this case, it is set to CONTEXT_SYSTEM, which means that the capability applies at the system level, across the entire site.
*archetypes: This property defines the roles that are allowed to perform the capability. The example has only one archetype 'user' and it has a value of CAP_ALLOW which means that any user role is allowed to perform this capability.
 */