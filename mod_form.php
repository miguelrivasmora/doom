<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

class mod_doom_mod_form extends moodleform_mod {
    function definition() {
        $mform = $this->_form;

        // Añadir campos comunes de Moodle
        $this->standard_coursemodule_elements();

        // Añadir campos personalizados del módulo
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // Añadir el campo de nombre
        $mform->addElement('text', 'name', get_string('doomname', 'doom'), array('size' => '64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        // Añadir campo de descripción
        $this->standard_intro_elements();

        // Añadir botones estándar de Moodle (guardar, cancelar)
        $this->add_action_buttons();
    }
}
