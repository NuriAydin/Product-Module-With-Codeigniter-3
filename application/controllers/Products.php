<?php
class Products extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library(array('session', 'form_validation'));
        $this->check_session();
    }

    public function index()
    {
        $data['products'] = $this->Product_model->get_products();
        $this->load_view('products/index', $data);
    }

    public function createWithModal()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('discount', 'Discount', 'required');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(["status" => false]);
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture')) {
                echo json_encode(["status" => false, "message" => $this->upload->display_errors()]);
            } else {
                $data = array(
                    'picture' => $this->upload->data('file_name'),
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    'price' => $this->input->post('price'),
                    'discount' => $this->input->post('discount')
                );
                $this->Product_model->insert_product($data);
                echo json_encode(["status" => true]);
            }
        }
    }

    public function updateWithModal()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('discount', 'Discount', 'required');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(["status" => false]);
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2000;

            $this->load->library('upload', $config);

            if (!empty($_FILES["picture"])) {
                if (!$this->upload->do_upload('picture')) {
                    echo json_encode(["status" => false, "message" => $this->upload->display_errors()]);
                } else {
                    $data = array(
                        'picture' => $this->upload->data('file_name'),
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('description'),
                        'price' => $this->input->post('price'),
                        'discount' => $this->input->post('discount')
                    );
                    $this->Product_model->update_product($this->input->post('id'), $data);
                    echo json_encode(["status" => true]);
                }
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    'price' => $this->input->post('price'),
                    'discount' => $this->input->post('discount')
                );
                $this->Product_model->update_product($this->input->post('id'), $data);
                echo json_encode(["status" => true]);
            }
        }
    }

    public function deleteProduct()
    {
        $id = $this->input->post('id');
        $delete = ($this->Product_model->delete_product($id)) ? true : false;
        echo json_encode(["status" => $delete]);
    }

    public function getInfoWithModal()
    {
        echo json_encode($this->Product_model->get_products_with_id($this->input->post('id'))[0]);
    }

    private function check_session()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function get_data()
    {

        $draw = intval($this->input->post('draw'));
        $start = intval($this->input->post('start'));
        $length = intval($this->input->post('length'));
        $search_value = $this->input->post('search', true)['value'];
        $orderColumnIndex = $this->input->post('order')[0]['column'];
        $orderDir = $this->input->post('order')[0]['dir'];

        $datas = $this->Product_model->get_products();
        $datasCount = count($datas);

        $recordFilted = $this->Product_model->get_products($search_value, array("start" => $start, "length" => $length), array("orderColumnIndex" => $orderColumnIndex, "orderDir" => $orderDir));
        $recordFiltedCount = count($datas);

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $datasCount,
            "recordsFiltered" => $recordFiltedCount,
            "data" => $recordFilted,
        );

        echo json_encode($output);
    }
}
