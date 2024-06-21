<?php
require_once('../../config.php');
global $PAGE, $OUTPUT;

$courseid = required_param('id', PARAM_INT);
$course = get_course($courseid);

require_login($course);

$PAGE->set_url('/mod/doom/index.php', array('id' => $courseid));
$PAGE->set_title($course->fullname);
$PAGE->set_heading($course->fullname);

echo $OUTPUT->header();
echo $OUTPUT->heading('Doom Module');
echo html_writer::link(new moodle_url('/mod/doom/view.php', array('id' => $courseid)), 'Open Doom in Popup', array('target' => '_blank'));
echo $OUTPUT->footer();
