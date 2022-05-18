<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

    protected $tabla = 'reservas';
    protected $campos = array();
    protected $id;

    function __construct($datos = array())
    {
        parent::__construct();
        $this->id = 0;
        $this->campos = $datos;
    }

    public function guardarReservas()
    {
        $dato = array('success' => 0, 'message' => 'Error inesperado!');

        try {
            $this->db->insert($this->tabla, $this->campos);

            $dato['message'] = "Reserva guardada correctamente";
            $dato['success'] = true;
        } catch (\Throwable $th) {
            $dato['message'] = $th;
        }

        return $dato;
    }

    public function consultarReservas($fecha)
    {
        try {
            $this->db->where('estado', 'activo');
            $this->db->where('fecha', $fecha);
            $query = $this->db->get($this->tabla);
            return (array) $query->result();
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getReservas()
    {
        try {
            $this->db->select('hora_inicial, hora_final, fecha, motivo');
            $query = $this->db->get($this->tabla);
            return (array) $query->result();
        } catch (\Throwable $th) {
            return false;
        }
    }
}
