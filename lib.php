<?php
defined('MOODLE_INTERNAL') || die();

function doom_supports($feature) {
    switch($feature) {
        case FEATURE_MOD_ARCHETYPE:
            return MOD_ARCHETYPE_RESOURCE;
        case FEATURE_MOD_INTRO:
            return true;
        default:
            return null;
    }
}

function doom_add_instance($doom) {
    global $DB;
    $doom->timecreated = time();
    $doom->timemodified = $doom->timecreated;

    return $DB->insert_record('doom', $doom);
}

function doom_update_instance($doom) {
    global $DB;
    $doom->timemodified = time();
    $doom->id = $doom->instance;

    return $DB->update_record('doom', $doom);
}

function doom_delete_instance($id) {
    global $DB;
    if (!$doom = $DB->get_record('doom', array('id' => $id))) {
        return false;
    }
    $DB->delete_records('doom', array('id' => $doom->id));
    return true;
}
