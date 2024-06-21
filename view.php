<?php
require_once('../../config.php');
require_once($CFG->libdir . '/completionlib.php');

$id = required_param('id', PARAM_INT); // Course module ID.
$cm = get_coursemodule_from_id('doom', $id, 0, false, MUST_EXIST);
$course = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);

require_course_login($course, true, $cm);

$PAGE->set_url('/mod/doom/view.php', array('id' => $cm->id));
$PAGE->set_title($course->shortname . ': ' . format_string($cm->name));
$PAGE->set_heading($course->fullname);

$context = context_module::instance($cm->id);
$PAGE->set_context($context);

// Trigger module viewed event.
$completion = new completion_info($course);
$completion->set_module_viewed($cm);

echo $OUTPUT->header();
echo $OUTPUT->heading(format_string($cm->name));

// Output module content.
echo format_module_intro('doom', $cm, $cm->id);

// Embedding iframe to display external content
$iframe_url = '../../local/doom/index.php';
$iframe_attributes = array(
    'src' => $iframe_url,
    'width' => '100%',
    'height' => '450px', // Adjust height as needed
    'frameborder' => '0', // No border
);
echo html_writer::start_tag('iframe', $iframe_attributes);
echo html_writer::end_tag('iframe');

echo $OUTPUT->footer();
