<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ServiceTemplate extends PDF
{
    protected $_name;
    protected $_age_sex;
    protected $_date;
    protected $_physician;
    protected $_barangay;

    public function __construct($template)
    {
        $custom = array(
            'orietation' => 'L',
            'unit' => 'mm',
            'size' => array(216, 160) 
        );

        parent::__construct($custom);
    }

    public function set_name($v)
    {
        $this->_name = $v;

        return $this;
    }

    public function set_age_sex($v)
    {
        $this->_age_sex = $v;

        return $this;
    }

    public function set_date($v)
    {
        $this->_date = $v;

        return $this;
    }

    public function set_physician($v)
    {
        $this->_physician = $v;

        return $this;
    }

    public function set_barangay($v)
    {
        $this->_barangay = $v;

        return $this;
    }

    public function Header()
    {
        $this->Image('http://localhost/truelab/web/images/logo.png', 10, 10, 60, '', 'PNG', '', 'T', true, 300, 'C', false, false, 0, false, false, false);
        // $this->Image('/var/www/html/truelab/web/images/logo.png', 10, 10, 60, '', 'PNG', '', 'T', true, 300, 'C', false, false, 0, false, false, false);
        $this->ln(15);

        $this->SetFont('helvetica', 'I', 9);
        $this->Write(3, '2nd - 3rd St. Nazareth, Barangay 40, Cagayan de Oro City', '', false, 'C', true);
        $this->Write(3, '(infront of City Health Office)', '', false, 'C', true);
        $this->Write(3, 'Tel# 3231521 / 09177188942', '', false, 'C', true);
        $this->Write(3, 'Email: truelab.clinicdiagnostic@gmail.com', '', false, 'C', true);
    }

    public function build()
    {
        $this->build_transaction_info();
        $this->build_transaction_details();
        $this->build_signatures();
    }

    protected function build_transaction_info()
    {
        $this->Ln(18);

        $this->SetFont('helvetica', '', 9);

        $first_third_column_style = array(
            'width' => 30,
            'font_style' => 'B',
            'text_align' => 'R',
            'height' => 2
        );
        $second_fourth_column_style = array(
            'width' => 60,
            'font_style' => '',
            'height' => 2
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
                array(
                    'text' => '',
                    'style' => array(
                        'border' => 'TL'
                    )
                ),
                array(
                    'text' => '',
                    'style' => array(
                        'border' => 'T'
                    )
                ),
                array(
                    'text' => '',
                    'style' => array(
                        'border' => 'T'
                    )
                ),
                array(
                    'text' => '',
                    'style' => array(
                        'border' => 'TR'
                    )
                )
            ),
            array(
                array(
                    'text' => 'Name:',
                    'style' => array(
                        'border' => 'L',
                        'font_style' => 'B',
                    )
                ),
                array('text' => $this->_name),
                array('text' => 'Date:'),
                array(
                    'text' => $this->_date,
                    'style' => array(
                        'border' => 'R'
                    )
                )
            ),
            array(
                array(
                    'text' => 'Age / Sex:',
                    'style' => array(
                        'border' => 'L',
                        'font_style' => 'B',
                    )
                ),
                array('text' => $this->_age_sex),
                array('text' => ''),
                array(
                    'text' => '',
                    'style' => array(
                        'border' => 'R'
                    )
                )
            ),
            array(
                array(
                    'text' => 'Physician:',
                    'style' => array(
                        'border' => 'L',
                        'font_style' => 'B',
                    )
                ),
                array('text' => $this->_physician),
                array('text' => ''),
                array(
                    'text' => ' ',
                    'style' => array(
                        'border' => 'R'
                    )
                )
            ),
            array(
                array(
                    'text' => '',
                    'style' => array(
                        'border' => 'BL'
                    )
                ),
                array(
                    'text' => '',
                    'style' => array(
                        'border' => 'B'
                    )
                ),
                array(
                    'text' => '',
                    'style' => array(
                        'border' => 'B'
                    )
                ),
                array(
                    'text' => '',
                    'style' => array(
                        'border' => 'BR'
                    )
                )
            )
        );

        $this->set_font_size(9);
        $this->create_table($rows, $column_styles);
    }

    // override in child templates
    protected function build_transaction_details()
    {

    }

    public function build_signatures()
    {
        $this->ln(10);

        $style = array(
            'width' => 90,
            'height' => 2,
            'text_align' => 'C'
        );
        $style2 = array(
            'width' => 90,
            'height' => 2,
            'text_align' => 'C'
        );
        $column_styles = array(
            0 => $style,
            1 => $style2
        );

        $signatures_rows = array(
            array(
                array('text' => 'RABIA ROSE H. MANUBAY, RMT'),
                array('text' => 'GERARD L. LAMAYRA, MD,. FPSP')
            ),
            array(
                array('text' => 'MEDICAL TECHNOLOGIST'),
                array('text' => 'PATHOLOGIST')
            )
        );

        $this->set_font_size(9);
        $this->create_table($signatures_rows, $column_styles);
    }
}