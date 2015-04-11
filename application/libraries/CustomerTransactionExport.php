<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerTransactionExport extends PDF
{
    private $_reference_number;
    private $_first_name;
    private $_middlename_name;
    private $_last_name;
    private $_age;
    private $_gender;
    private $_birthday;
    private $_reference_no;
    private $_date;
    private $_data;

    private $_source;

    public function __construct()
    {
        // $default_layout = array(
        //     'orietation' => 'L',
        //     'unit' => 'mm',
        //     'size' => array(108, 330) 
        // );
        $default_layout = array(
            'orietation' => '',
            'unit' => 'mm',
            'size' => array(216, 330) 
        );

        $layout = $default_layout;

        if(!empty($custom))
        {
            $layout = $custom;
        }
        $this->_header_location = 'http://localhost/truelab/web/images/truelab-logo.png';
        parent::__construct($layout);
    }

    public function set_first_name($v)
    {
        $this->_first_name = $v;

        return $this;
    }

    public function set_middle_name($v)
    {
        $this->_middle_name = $v;

        return $this;
    }

    public function set_last_name($v)
    {
        $this->_last_name = $v;

        return $this;
    }

    public function set_age($v)
    {
        $this->_age = $v;

        return $this;
    }

    public function set_gender($v)
    {
        $this->_gender = $v;

        return $this;
    }

    public function set_birthday($v)
    {
        $this->_birthday = $v;

        return $this;
    }

    public function set_reference_no($v)
    {
        $this->_reference_no = $v;

        return $this;
    }

    public function set_date($v)
    {
        $this->_date = $v;

        return $this;
    }

    public function set_data($v)
    {
        $this->_data = $v;
    }  

    public function set_source($v)
    {
        $this->_source = $v;
    }

    public function build()
    {
        $this->build_customer_panel();
        $this->build_services_panel();
        $this->build_disclaimer_footer();
    }

    public function Header()
    {
        $this->Image($this->_header_location, 20, 10, 60, '', 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);
    }

    private function build_customer_panel()
    {
        $this->Ln(1);
        $this->SetFont('helvetica', 'B', 9);
        $this->Write(0, 'Customer Information', '', false, 'L', true);
        $this->Ln(2);
        $this->SetFont('helvetica', '', 9);

        $first_third_column_style = array(
            'width' => 30,
            'font_style' => 'B',
            'text_align' => 'R',
            'height' => 1
        );

        $second_fourth_column_style = array(
            'width' => 40,
            'text_align' => 'L',
            'height' => 1
        );
        
        $column_styles = array(
            0 => $first_third_column_style,
            1 => $second_fourth_column_style
        );

        $this->set_font_size(8);

        // replace this with dynamic data, maybe use reference no?
        $rows = array(
            array(
                array('text' => 'Reference No.: '),
                array('text' => $this->_reference_no)
            ),
            array(
                array('text' => 'Date: '),
                array('text' => $this->_date)
            ),
            array(
                array('text' => 'Source: '),
                array('text' => $this->_source)
            ),
            array(
                array('text' => 'First Name: '),
                array('text' => $this->_first_name)
            ),
            array(
                array('text' => 'Middle Name: '),
                array('text' => $this->_middle_name)
            ),
            array(
                array('text' => 'Last Name: '),
                array('text' => $this->_last_name)
            ),
            array(
                array('text' => 'Age: '),
                array('text' => $this->_age)
            ),
            array(
                array('text' => 'Gender: '),
                array('text' => $this->_gender)
            ),
            array(
                array('text' => 'Birthday: '),
                array('text' => $this->_birthday)
            )
        );

        $this->create_table($rows, $column_styles);
    }

    private function build_services_panel()
    {
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 9);
        $this->Write(0, 'Services', '', false, 'L', true);
        $this->Ln(5);
        $this->SetFont('helvetica', '', 9);

        $column_styles = array(
            0 => array(
                'width' => 5,
                'text_align' => 'R',
                'border' => ''
            ),
            1 => array(
                'width' => 50,
                'text_align' => 'L',
                'border' => ''
            ),
            2 => array(
                'width' => 20,
                'text_align' => 'L',
                'border' => ''
            )
        );

        $header_row_height = 7;
        $data_row_height = 5;
        $data_row_style = array(
            'height' => $data_row_height,
            'border' => 'T'
        );
        $data_index_row_style = array(
            'height' => 8,
            'border' => 'T'
        );

        $rows = array(
            array(
                array(
                    'text' => '',
                    'style' => array(
                        'font_style' => 'B',
                        'height' => $header_row_height,
                        'width' => 5
                    )
                ),
                array(
                    'text' => "Service",
                    'style' => array(
                        'font_style' => 'B',
                        'height' => $header_row_height 
                    )
                ),
                array(
                    'text' => 'Amount',
                    'style' => array(
                        'font_style' => 'B',
                        'height' => $header_row_height
                    )
                )
            )
        );

        $total = 0;

        foreach ($this->_data as $key => $value) 
        {
            $rows[] = array(
                array('text' => ($key + 1) . '  ', 'style' => $data_index_row_style),
                array('text' => $value['category'] . "\n" . $value['sub_category'], 'style' => $data_row_style),
                array('text' => 'P ' . number_format($value['amount'], 2), 'style' => $data_row_style)
            );

            $total += $value['amount'];
        }
            
        $rows[] = array(
            array(
                'text' => '', 
                'style' => array(
                    'border' => ''
                )
            ),
            array(
                'text' => 'Total:',
                'style' => array(
                    'font_style' => 'B',
                    'text_align' => 'R',
                    'border' => ''
                )
            ),
            array(
                'text' => 'P ' . number_format($total, 2), 
                'style' => array(
                    'border' => ''
                )
            )
        );
        
        $this->create_table($rows, $column_styles);
        
    }


    public function build_disclaimer_footer(){
        $this->Ln(1);
        $this->SetFont('helvetica', 'I', 9);
        $this->Write(0, '***DISCLAIMER: This is not an official receipt', '', false, 'L', true);
        $this->Ln(2);
        $this->SetFont('helvetica', '', 9);
        $this->Write(0, 'Kindly ask for receipt from the cashier', '', false, 'L', true);
    }
    public function set_reference_number($reference_number)
    {
        $this->_reference_number = $reference_number;
    }
}