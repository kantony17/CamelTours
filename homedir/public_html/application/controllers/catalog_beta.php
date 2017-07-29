<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Catalog_Beta extends CI_Controller
  {
    public function index() {
      // Get the name of the page from the class.
      $data['title'] = get_class($this);
      $page = strtolower($data['title']);
      // Make sure that the view for this page exists!
      if (!file_exists(APPPATH.'/views/'.$page.'.php'))
        show_404();

        $data['tours']=[];
        
        $this->db->where('tour_public', 1);
        $query = $this->db->get('tours');
        
        foreach ($query->result() as $row){
            $link = 'ct/u'.$row->user_id.'/t'.$row->tour_id.'/'; 
            $data['tours'][] = array($link, $row->tour_name, $row->tour_location, $row->tour_lat, $row->tour_long, $row->tour_id);
        }
      
      //<!--Load our templates and the view for this page.-->
      $this->load->view('templates/header_beta', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view($page, $data);
      $this->load->view('templates/footer', $data);
    }
  }

?>