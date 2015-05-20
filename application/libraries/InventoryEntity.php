<?php 

class InventoryEntity {
    private $ci;
    private $id;
    private $count;
    private $modifiedBy;
    private $status;
    private $type;
    private $serviceId;

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