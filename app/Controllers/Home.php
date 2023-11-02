<?php

namespace App\Controllers;
use App\Libraries\MenuLibrary;

class Home extends BaseController
{
    protected $layout = 'templates/header';
    protected $stylesheets = array('headerstyle','font-awesome');
    protected $javascripts = array('responsive');

    protected function get_stylesheets() {
        return $this->stylesheets;
    }

    protected function get_javascripts() {
        return $this->javascripts;
    }

    public function index()
    {
        if (session('logged_in')) {
            $session_array = session('logged_in');
            $data['module'] = '';
            $data['metakeys'] = "";
            $data['metadesc'] = "";
            $data['stylesheet'] = $this->get_stylesheets();
            $data['stylesheet'] = array();
            $data['javascripts'] = $this->get_javascripts();
            $data['title'] = "Dashboard";
            $data['menulibrary'] = new MenuLibrary();
            $data['user_role'] = $session_array['user_role'];
            $data['emp'] = $this->getEmployeeList();
            echo view($this->layout, $data);
            echo view('Dashboard');
            echo view('templates/footer');
        } else {
            return redirect('login');
        }
    }
    protected function getInvoice() {

    }
    protected function getOutstanding(){

    }
    protected function getExpense(){

    }
    protected function getEmployeeList(){
        $emp = model('Employee_model');
        $emplist = $emp->getempdata();
        $table = new \CodeIgniter\View\Table();
		
		$template = array(
			'table_open' => '<table class="table table-hover" border="1" cellpadding="2" cellspacing="1">',
            
                'thead_open'  => '<thead class="text-warning">',
                'thead_close' => '</thead>',
            
                'heading_row_start'  => '<tr>',
                'heading_row_end'    => '</tr>',
                'heading_cell_start' => '<th>',
                'heading_cell_end'   => '</th>',
            
                'tfoot_open'  => '<tfoot>',
                'tfoot_close' => '</tfoot>',
            
                'footing_row_start'  => '<tr>',
                'footing_row_end'    => '</tr>',
                'footing_cell_start' => '<td>',
                'footing_cell_end'   => '</td>',
            
                'tbody_open'  => '<tbody>',
                'tbody_close' => '</tbody>',
            
                'row_start'  => '<tr>',
                'row_end'    => '</tr>',
                'cell_start' => '<td>',
                'cell_end'   => '</td>',
            
                'row_alt_start'  => '<tr>',
                'row_alt_end'    => '</tr>',
                'cell_alt_start' => '<td>',
                'cell_alt_end'   => '</td>',
            
                'table_close' => '</table>',
        
		);

		$table->setTemplate($template);
//<thead class="text-warning"><th>ID</th><th>Name</th><th>Salary</th><th>Country</th></thead>
		$table->setHeading('Id', '  `Name', 'Unit Deployed', 'Salary', 'Remarks');
		
			
		foreach ($emplist as $sf):
			$table->addRow($sf->id, $sf->price, $sf->sale_price, $sf->sales_count, $sf->sale_date);
		endforeach;
		
		$html = count($emplist)==0?'<p>No records found</p>':$table->generate();
		
		$data['table'] = $html;
        return $html;
    }
}
