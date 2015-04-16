<?php 

class CustomerService{
    protected $ci;
    protected $config;
    protected $services;

    public function getServices(){
        return $this->services;
    }

    public function __construct(Array $config){
        $this->ci =& get_instance();
        $this->config = $config;
    }
    
    public function generateServices(){
        $cust_id = $this->config['cust_id'];
        
        $sql = " SELECT *,aa.id as service_id FROM customer_service aa 
                LEFT JOIN customer_transaction bb on bb.id=aa.trans_id 
                LEFT JOIN subcat cc ON cc.sub_test_id=aa.subcat_id
                WHERE bb.cust_id=$cust_id;
                ";
        $query = $this->ci->db->query($sql);
        $customer_services = array();
        if($query->num_rows() == 0)
            return false;
        foreach ($query->result() as $key => $value) {
            $customer_service[] = $value;
        }
        $this->services = $customer_service;
        return true;
    }
}