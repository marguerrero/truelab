<?php 

class Service{
    protected $ci;
    protected $config;

    public function __construct(Array $config){
        $this->ci =& get_instance();
        $this->config = $config;
        return $this;
    }


    protected function _fetchPK($tablename){
        $sql = "
            SELECT AUTO_INCREMENT
            FROM information_schema.tables
            WHERE table_name = '$tablename'
            AND table_schema = DATABASE( ) ;
        ";
        $query = $this->ci->db->query($sql);
        $value = $query->result()[0]->AUTO_INCREMENT;
        return $value;
    }

    protected function _fetchReceipt(){
        $unique = date('Ymd-His');
        $receipt_no = RECEIPT_INIT."-$unique";
        return $receipt_no;
    }

    public function checkServiceType($s_code = ""){
        
        $r = false;
        try{
            if(!$s_code)
                throw new Exception("Error Processing Request", 1);
            $ci = $this->ci;
            $ci->load->config('services');
            $service_type = $ci->config->item('service_hierarchy');
            foreach ($service_type as $key => $value) {
                $$key = $value;
            }
            
            // $rad_group = array('RD', 'UTZ');
            // $med_group = array('')
            if(in_array($s_code, $rad_group))
                $r = "radtech";
            if(in_array($s_code, $med_group))
                $r = "medtech";
        } catch (Exception $e){

        }
        return $r;
    }
}