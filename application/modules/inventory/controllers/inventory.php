<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends MX_Controller {

    /**************************************************
    * Default Customer Information Module Initialization
    **************************************************/

    public function index()
    {
        $module = "inventory";
        $action = "_index";
        echo modules::run('base/base/index', $module, $action);
    }

    public function _index(){
        $this->load->library('InventoryEntity');
        $inventory = $this->inventoryentity;
        $data = $inventory->loadData();

        $this->load->library('Service', array());
        $service = $this->service;
        $categories = $service->fetchCategories();

        $retval = array(
            'categories' => $categories,
            'data'=> $data
        );
        $this->load->view('index', $retval);
    }


    /****************************************************
    * Ajax function call
    ****************************************************/
    public function initializeServices(){
        $data = array();
        $msg_info = "";
        $err_msg = "";

        try{
            $id = $this->input->get('id');
            $this->load->library('InventoryEntity');
            $inventory = $this->inventoryentity;
            $inventory->setId($id);
            $data = $inventory->loadServices();
            $msg_info = "Successfully Fetched";
        } catch(Exception $e){
            $err_msg = $e->getMessage();
        }
        $r = array(
            'data' => $data,
            'status' => ($msg_info) ? "Success" : "Failure",
            'msg' => ($msg_info) ? $msg_info : $err_msg
        );
        echo json_encode($r);
        return;
    }

    public function saveServices(){
        $err_msg = "";
        $msg_info = "";
        try{
            $id = $this->input->post('id');
            $services = $this->input->post('services');
            if(!$id)
                throw new Exception("Invalid Inventory Item Selected", 1);
            if(!$services)
                throw new Exception("No services selected", 1);
                
            $inventory = $this->load->library('InventoryEntity');
            $inventory->setId($id);
            $inventory->setServiceIdArray($services);
            $inventory->clearServices();
            $inventory->addBatchReference();
            $msg_info = "Successfully Saved";
        } catch (Exception $e){
            $err_msg = $e->getMessage();
        }

        $r = array(
            'success' => true,
            'status' => ($msg_info) ? "success" : "failure",
            'msg' => ($msg_info) ? $msg_info : $err_msg
        );
        echo json_encode($r);
        return;
    }

    public function addData(){
        $err_msg = "";
        $msg_info = "";
        $field = "";
        try{
            $item = $this->input->post('item-name');
            $qty = $this->input->post('item-qty');

            if(!$item){
                $field = "item-name";
                throw new Exception("Item name is required", 1);
            }
            $session_data = $this->session->all_userdata();
            $username = $session_data['username'];
            $opt = array(
                'description' => $item,
                'count' => $qty,
                'last_modified_by' => $username,
                'recent_status' => "Manually Added"
            );
            $this->db->insert('inventory', $opt);
            
            $msg_info = "Successfully Saved";
        } catch (Exception $e){
            $err_msg = $e->getMessage();
        }
        $r = array(
                'status' => ($msg_info) ? "success" : "failure",
                'msg' => ($msg_info) ? $msg_info : $err_msg
            );
        echo json_encode($r);
        return;
    }

    public function saveData(){
        $err_msg = "";
        $msg_info = "";
        try{
            $post = $this->input->post(NULL, true);
            if(!$post)
                throw new Exception("Nothing to add.", 1);

            $this->load->library('InventoryEntity');
            $inventory = $this->inventoryentity;
            $session_data = $this->session->all_userdata();
            $username = $session_data['username'];
            $blank_count = 0;
            foreach ($post as $key => $value){
                if(!$value){
                    $blank_count++;
                    continue;
                }
                $id = str_replace('item_', '', $key);
                $inventory->setId($id);
                $inventory->setCount($value);
                $inventory->setModifiedBy($username);
                $inventory->setStatus("Added via Maintenance");
                $inventory->setType("INCREMENT");
                $inventory->save();
            }

            if(count($post) == $blank_count)
                throw new Exception("Nothing to add", 1);
            
            $msg_info = "Successfully Saved";
        } catch (Exception $e){
            $err_msg = $e->getMessage();
        }
        $r = array(
                'status' => ($msg_info) ? "success" : "failure",
                'msg' => ($msg_info) ? $msg_info : $err_msg
            );
        echo json_encode($r);
        return;
    }

    public function fetchData(){
        $data = array();
        try{
            $this->load->library('InventoryEntity');
            $inventory = $this->inventoryentity;
            $data = $inventory->loadData();
            
        } catch(Exception $e){

        }

        $retval = array('data' => $data);
        echo json_encode($retval);
        return;
    }
}