<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_events() {
        $query = $this->db->get('events');
        return $query->result_array();
    }

    public function insert_event($data) {
        return $this->db->insert('events', $data);
    }

    public function get_event($id) {
        $query = $this->db->get_where('events', array('id' => $id));
        return $query->row_array();
    }

    public function update_event($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('events', $data);
    }

    public function delete_event($id) {
        $this->db->where('id', $id);
        return $this->db->delete('events');
    }

    public function count_all_events() {
        return $this->db->count_all('events');
    }

    public function get_events_page($limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('events');
        return $query->result_array();
    }
}
