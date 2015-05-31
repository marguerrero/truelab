<?php 

class InventoryEntity {
    private $ci;
    private $id;
    private $count;
    private $modifiedBy;
    private $status;
    private $type;
    private $serviceId;
    private $serviceIdArray = array();

    public function __construct(){
        $this->ci =& get_instance();
        $this->id = null;
        $this->count = null;
        $this->modifiedBy = null;
        $this->status = null;
        $this->type = "INCREMENT";
        $this->serviceId = null;
        return $this;
    }

    /****************************
    * Getters and setters
    ****************************/
    public function getid(){
        return $this->id;
    }
    public function setId($r){
        $this->id = $r;
        return $this->id;
    }

    public function setServiceId($r){
        $this->serviceId = $r;
        return $this->serviceId;
    }

    public function getCount(){
        return $this->count;
    }
    public function setCount($r){
        $this->count = $r;
        return $this->count;
    }

    public function setModifiedBy($r){
        $this->modifiedBy = $r;
        return $this->modifiedBy;
    }

    public function setServiceIdArray(Array $r){
        $this->serviceIdArray = $r;
        return $this;
    }

    public function setStatus($r){
        $this->status = $r;
        return $this->status;
    }

    public function setType($r){
        switch ($r) {
            case 'INCREMENT':
                $this->type = 'INCREMENT';
                break;
            case 'DECREMENT':
                $this->type = 'DECREMENT';
                break;
            default:
                $this->type = 'INCREMENT';
                break;
        }
        return $this->type;
    }

    /****************************
    * Methods 
    ****************************/
    public function clearServices(){
        $r = false;
        try{
            if(!$this->id)
                throw new Exception("No Inventory ID injected", 1);
                
            $db = $this->ci->db;
            $db->where('i_id', $this->id);
            $db->delete();
            $r = true; 
        } catch(Exception $e) {

        }
        return $r;
    }

    public function addBatchReference(){
        $r = false;
        try {
            if(!$this->serviceIdArray)
                throw new Exception("No service ID array injected", 1);
            $db = $this->ci->db;
            foreach($this->serviceIdArray as $val){
                $opt = array(
                    'i_id' => $this->id,
                    's_id' => $val,
                    'count' => 1
                );
                $db->insert('inventory_services_ref', $opt);
            }
            $r = true;
        } catch(Exception $e){

        }
        return $r;
    }

    public function loadServices(){
        $data = array();
        $available_services = array();
        $selected_services = array();

        try {
            if(!$this->id)
                throw new Exception("No Inventory ID injected", 1);
                
            $db = $this->ci->db;
            $service_ids = " SELECT s_id FROM inventory_services_ref WHERE i_id={$this->id}";


            $sql_available = " SELECT * FROM subcat WHERE sub_test_id NOT IN ( $service_ids ) ORDER BY subcateg ASC; ";
            $r_available = $db->query($sql_available);
            
            foreach ($r_available->result() as $key => $value) 
                $available_services[] = array(
                    'id' => $value->sub_test_id,
                    'cat_id' => $value->main_test_id,
                    'description' => $value->subcateg
                );
            
            $sql_selected = " SELECT * FROM subcat WHERE sub_test_id IN ( $service_ids ) ORDER BY subcateg ASC; ";
            $r_selected = $db->query($sql_selected);
            foreach ($r_selected->result() as $key => $value) 
                $selected_services[] = array(
                    'id' => $value->sub_test_id,
                    'cat_id' => $value->main_test_id,
                    'description' => $value->subcateg
                );
            
        } catch (Exception $e){
            return $e->getMessage();
        }
        $r = array(
            'available' => $available_services,
            'selected' => $selected_services
        );
        return $r;
    }

    public function loadData(){
        $db = $this->ci->db;
        $query = $db->get('inventory');
        $data = array();
        $i = 1;
        foreach ($query->result() as $row) {
            $data[] = array(
                    'num' => $i,
                    'id' => $row->id,
                    'description' => $row->description,
                    'last_modified' => $row->last_modified,
                    'last_modified_by' => $row->last_modified_by,
                    'recent_status' => $row->recent_status,
                    'url' => "<a href='#' data-id='{$row->id}' class='item-services'><span data-id='{$row->id}' data-name='{$row->description}' class='glyphicon glyphicon-pencil'> </span></a>",
                    'count' => $row->count
                );
            $i++;
        }
        return $data;
    }


    public function save(){
        $r = false;
        try{
            $db = $this->ci->db;
            $current_data = $this->loadSingleData();
            $count = $current_data['count'];
            $count = ($this->type == 'INCREMENT') ? $count + $this->count : $count - $this->count;
            if(!$this->id)
                throw new Exception("Invetory ID not set", 1);
            if(!$this->count)
                throw new Exception("Count not set", 1);
            $data = array(
                'count' => $count,
                'last_modified' => date('Y-m-d h:i:s'),
                'last_modified_by' => $this->modifiedBy,
                'recent_status' => $this->status
            );
            
            $db->where('id', $this->id);
            $db->update('inventory', $data);
            $r = true;
        } catch(Exception $e){
            $r = false;
        }

        return $r;
    }

    public function loadInventory(){
         $r = false;
        try{
            if(!$this->serviceId)
                    throw new Exception("Service ID not set", 1);
            $db = $this->ci->db;
            $opt = array('s_id' => $this->serviceId);
            $t = 'inventory_services_ref';
            $query = $db->get_where($t, $opt);
            if(!$query)
                throw new Exception("Invalid service ID", 1);
                
            
            foreach ($query->result() as $row) {
                $r[] = array(
                        'id' => $row->id,
                        'i_id' => $row->i_id,
                        's_id' => $row->s_id,
                        'count' => $row->count
                    );
            }

        } catch (Exception $e){
        }
        return $r;
    }

    public function loadSingleData(){
        $r = false;
        try{
            if(!$this->id)
                    throw new Exception("Inventory ID not set", 1);
            $db = $this->ci->db;
            $opt = array('id' => $this->id);
            $t = 'inventory';
            $query = $db->get_where($t, $opt);
            if(!$query)
                throw new Exception("Invalid inventory ID", 1);
                
            
            foreach ($query->result() as $row) {
                $r = array(
                        'id' => $row->id,
                        'description' => $row->description,
                        'last_modified' => $row->last_modified,
                        'last_modified_by' => $row->last_modified_by,
                        'recent_status' => $row->recent_status,
                        'count' => $row->count
                    );
            }

        } catch (Exception $e){
        }
        return $r;
    }

}