<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['events'] = $this->Event_model->get_all_events();
        $this->load->view('events/index', $data);
    }

    public function create() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Configurar reglas de validación
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('start_date', 'Start Date', 'required');
            $this->form_validation->set_rules('end_date', 'End Date', 'required|callback_check_date_order');

            // Establecer mensajes de error personalizados
            $this->form_validation->set_message('check_date_order', 'La fecha de inicio debe ser anterior a la fecha de fin.');

            // Ejecutar la validación
            if ($this->form_validation->run() === TRUE) {
                // Recopilar datos del formulario
                $data = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date')
                );

                // Insertar evento en la base de datos
                $this->Event_model->insert_event($data);

                // Redirigir a la página de lista de eventos
                redirect('events');
            } else {
                // Si la validación falla, cargar nuevamente el formulario con errores
                $this->load->view('events/form');
            }
        } else {
            // Si no es una solicitud POST, cargar el formulario
            $this->load->view('events/form');
        }
    }

    public function edit($id) {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Configurar reglas de validación para la edición
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('start_date', 'Start Date', 'required');
            $this->form_validation->set_rules('end_date', 'End Date', 'required|callback_check_date_order');

            // Establecer mensajes de error personalizados
            $this->form_validation->set_message('check_date_order', 'La fecha de inicio debe ser anterior a la fecha de fin.');

            // Ejecutar la validación
            if ($this->form_validation->run() === TRUE) {
                // Procesar la actualización del evento en la base de datos
                $this->Event_model->update_event($id, array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date')
                ));

                // Redirigir a la página de lista de eventos
                redirect('events');
            } else {
                // Si la validación falla, cargar nuevamente el formulario de edición con errores
                $data['event'] = $this->Event_model->get_event($id);
                $this->load->view('events/edit', $data);
            }
        } else {
            // Si no es una solicitud POST, cargar el formulario de edición
            $data['event'] = $this->Event_model->get_event($id);
            $this->load->view('events/edit', $data);
        }
    }

    public function delete($id) {
        // Lógica para eliminar un evento
        $this->Event_model->delete_event($id);
        redirect('events');
    }

    // Callback para validar el orden de las fechas
    public function check_date_order($end_date) {
        $start_date = $this->input->post('start_date');
        if (strtotime($start_date) > strtotime($end_date)) {
            return FALSE;
        }
        return TRUE;
    }
}
?>
