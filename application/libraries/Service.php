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
}