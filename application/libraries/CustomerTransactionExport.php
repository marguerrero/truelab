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

    public function __construct()
    {
        parent::__construct();
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

    public function build()
    {
        $this->build_customer_panel();
        $this->build_services_panel();
    }

    private function build_customer_panel()
    {
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 15);
        $this->Write(0, 'Customer Information', '', false, 'L', true);
        $this->Ln(5);
        $this->SetFont('helvetica', '', 10);

        $first_third_column_style = array(
            'width' => 30,
            'font_style' => 'B',
            'text_align' => 'R'
        );
        $second_fourth_column_style = array(
            'width' => 60,
            'font_style' => 'I'
        );
        $column_styles = array(
            0 => $first_third_column_style,
            1 => $second_fourth_column_style,
            2 => $first_third_column_style,
            3 => $second_fourth_column_style
        );

        // replace this with dynamic data, maybe use reference no?
        $rows = array(
            array(
                array('text' => 'First Name'),
                array('text' => $this->_first_name),
                array('text' => 'Reference No.'),
                array('text' => $this->_reference_no)
            ),
            array(
                array('text' => 'Middle Name'),
                array('text' => $this->_middle_name),
                array('text' => 'Date'),
                array('text' => $this->_date)
            ),
            array(
                array('text' => 'Last Name'),
                array('text' => $this->_last_name),
                array('text' => ''),
                array('text' => '')
            ),
            array(
                array('text' => 'Age'),
                array('text' => $this->_age),
                array('text' => ''),
                array('text' => '')
            ),
            array(
                array('text' => 'Gender'),
                array('text' => $this->_gender),
                array('text' => ''),
                array('text' => '')
            ),
            array(
                array('text' => 'Birthday'),
                array('text' => $this->_birthday),
                array('text' => ''),
                array('text' => '')
            )
        );

        $this->create_table($rows, $column_styles);
    }

    private function build_services_panel()
    {
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 15);
        $this->Write(0, 'Services', '', false, 'L', true);
        $this->Ln(5);
        $this->SetFont('helvetica', '', 10);

        $column_styles = array(
            0 => array(
                'width' => 10,
                'text_align' => 'R',
                'border' => 'B'
            ),
            1 => array(
                'width' => 80,
                'text_align' => 'L',
                'border' => 'B'
            ),
            2 => array(
                'width' => 50,
                'text_align' => 'L',
                'border' => 'B'
            ),
            3 => array(
                'width' => 40,
                'text_align' => 'L',
                'border' => 'B'
            )
        );

        $header_row_height = 7;
        $data_row_height = 5;
        $data_row_style = array(
            'height' => $data_row_height
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
                    'text' => 'Category',
                    'style' => array(
                        'font_style' => 'B',
                        'height' => $header_row_height 
                    )
                ),
                array(
                    'text' => 'Sub Category',
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
                array('text' => ($key + 1) . '  ', 'style' => $data_row_style),
                array('text' => $value['category'], 'style' => $data_row_style),
                array('text' => $value['sub_category'], 'style' => $data_row_style),
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

    public function set_reference_number($reference_number)
    {
        $this->_reference_number = $reference_number;
    }
}