<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cinicio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
        
        $data = array();
        // Nombre de la Página actual
		$data['modulo'] = 'inicio';
        $data['name'] = 'Inicio';
        // Datos de la empresa
		$data['empresa'] = 'CGRQ';
		$data['logo'] = 'assets/img/LogoCGR.ico';

        // Ruta de navegación actual - En caso de una ruta más larga se colocan mas objetos li, en el que estemos debe tener al clase active
		$data['ruta'] = '<li class="breadcrumb-item active"><a href="' . base_url() . '/Cinicio">Inicio</a></li>';

		$data['css'] = array(
            'js/alertifyjs/css/alertify.rtl.css',
            'chart.js/Chart.css',
			'chart.js/Chart.min.css',
            'fullcalendar/main.css',
            'css/style.css',
        );

        $data['js'] = array(
            'bootstrap/js/bootstrap.bundle.min.js',
            'overlayScrollbars/js/jquery.overlayScrollbars.min.js',
            'jquery-ui/jquery-ui.min.js',
            'js/adminlte.js',
            'js/alertifyjs/alertify.js',
            'chart.js/Chart.min.js',
            'moment/moment.min.js',
            'fullcalendar/main.js',
            'js/inicio.js'
        );

        $this->load->view('pages/head', $data);
        $this->load->view('pages/header');
        $this->load->view('pages/wrapper');
        $this->load->view('Inicio');
        $this->load->view('pages/footer');
        $this->load->view('pages/script');
    }

    public function calendario()
    {
        
        
        $data = array();
        // Nombre de la Página actual
		$data['modulo'] = 'inicio';
        $data['name'] = 'Calendario';
        // Datos de la empresa
		$data['empresa'] = 'CGRQ';
		$data['logo'] = 'assets/img/LogoCGR.ico';

        // Ruta de navegación actual - En caso de una ruta más larga se colocan mas objetos li, en el que estemos debe tener al clase active
		$data['ruta'] = '<li class="breadcrumb-item active"><a href="' . base_url() . '/Cinicio/calendario">Inicio</a></li>';

		$data['css'] = array(
            'js/alertifyjs/css/alertify.rtl.css',
            'chart.js/Chart.css',
			'chart.js/Chart.min.css',
            'fullcalendar/main.css',
            'css/style.css',
        );

        $data['js'] = array(
            'bootstrap/js/bootstrap.bundle.min.js',
            'overlayScrollbars/js/jquery.overlayScrollbars.min.js',
            'jquery-ui/jquery-ui.min.js',
            'js/adminlte.js',
            'js/alertifyjs/alertify.js',
            'chart.js/Chart.min.js',
            'moment/moment.min.js',
            'fullcalendar/main.js',
            'js/calendar.js'
        );

        $this->load->view('pages/head', $data);
        $this->load->view('pages/header');
        $this->load->view('pages/wrapper');
        $this->load->view('calendario');
        $this->load->view('pages/footer');
        $this->load->view('pages/script');
    }

    public function guardarReserva()
    {
        if ($this->input->is_ajax_request()) 
        {
            echo json_encode($reserva->guardarReservas());
            
        }
        
    }

    public function consultarReserva()
    {
        $fecha = $_POST['id'];
        if ($this->input->is_ajax_request()) {
            echo json_encode($this->Model->consultarReservas($fecha));
            
        }
        
    }

    public function getReservas()
    {
        if ($this->input->is_ajax_request()) {
            echo json_encode($this->Model->getReservas());
            
        }
    }

    
}
