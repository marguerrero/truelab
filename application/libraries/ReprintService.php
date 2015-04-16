<?php 

class ReprintService Extends Service{
    protected $services;

    public function getServices(){
        return $this->services;
    }

    
    
    /**********************************
    * 
    * generateService - returns TRUE if customer have previous services
    *
    * @return boolean 
    *
    **********************************/
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

    /**********************************
    * 
    * cloneServices - based on the given Array of service IDs, c
    *
    * @return boolean 
    *
    **********************************/
    public function cloneServices(){
        $services = $this->config['services'];
        $cust_id = $this->config['cust_id'];
        $ci = $this->ci;
        $r = false;
        try{
            if(!$services)
                throw new Exception("No services found", 1);

            $receipt = $this->_fetchReceipt();
            $trans_id = $this->_fetchPK('customer_transaction');
            $transaction = array(
                'id' => $trans_id,
                'receipt_no' => $receipt,
                'cust_id' => $cust_id,
                'physician' => "NA"
            );
            $ci->db->insert('customer_transaction', $transaction);

            foreach ($services as $key => $id) {
                $orig = $ci->db->get_where('customer_service', array('id' => $id));
                $orig = $orig->result()[0];

                //-- Replicate service entry
                $ci->load->config('results');
                $amount = $ci->config->item('reprint_price');
                $customer_service = array(
                    'subcat_id' => $orig->subcat_id,
                    'amount' => $amount,
                    'trans_id' => $trans_id,
                    'disc_type' => 0,
                    'exported' => $orig->exported,
                    'disc_id' => 0,
                    'is_reprint' => TRUE
                );
                $test = $ci->db->insert('customer_service', $customer_service);

                //-- Replicate service results
                $metadata = $ci->db->get_where('service_metadata', array('service_id' => $id ));
                foreach($metadata->result() as $meta){
                    $service_metadata = array(
                        'service_id' => $id,
                        'field' => $meta->field,
                        'value' => $meta->value
                    );
                    $ci->db->insert('service_metadata', $service_metadata);

                }
            }
            $r = $receipt;
        }
        catch(Exception $e){

        }
        return $r;
    }
}