<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ServiceTemplate extends PDF
{
    protected $_name;
    protected $_age_sex;
    protected $_date;
    protected $_physician;
    protected $_barangay;
    protected $_case_no;
    protected $_source;
    protected $_dob;
    protected $_date_received;
    protected $_date_released;

    protected $_left_signature_name;
    protected $_left_signature_title;

    public $_user_pic;

    public function __construct($custom = array())
    {
        $default_layout = array(
            'orietation' => 'L',
            'unit' => 'mm',
            'size' => array(216, 197) 
        );

        $layout = $default_layout;

        if(!empty($custom))
        {
            $layout = $custom;
        }

        $this->_header_location = 'http://localhost/truelab/web/images/logo_gray.png';
        $this->_user_pic = 'default_user_image.png';

        $this->_left_signature_name = 'RABIA ROSE MANUBAY, RMT';
        $this->_left_signature_title = 'Medical technologist';

        parent::__construct($layout);
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

    public function set_case_no($v)
    {
        $this->_case_no = $v;

        return $this;
    }

    public function set_source($v)
    {
        $this->_source = $v;

        return $this;
    }

    public function set_dob($v)
    {
        $this->_dob = $v;

        return $this;
    }

    public function set_date_received($v)
    {
        $this->_date_received = $v;

        return $this;
    }

    public function set_date_released($v)
    {
        $this->_date_released = $v;

        return $this;
    }

    public function set_left_signature($name, $title)
    {
        $this->_left_signature_name = $name;
        $this->_left_signature_title = $title;

        return $this;
    }

    // path relative to web/uploads
    public function set_user_pic($path)
    {
        $this->_user_pic = $path;

        return $this;
    }

    public function Header()
    {
        $this->Image($this->_header_location, 10, 10, 60, '', 'PNG', '', 'T', true, 300, 'C', false, false, 0, false, false, false);
        $this->ln(12);

        $this->SetFont('helvetica', '', 8);
        $this->Write(3, '2nd - 3rd St. Nazareth, Barangay 40, Cagayan de Oro City', '', false, 'C', true);
        $this->Write(3, '(infront of City Health Office)', '', false, 'C', true);
        $this->Write(3, 'Tel# 3231521 / 09177188942', '', false, 'C', true);
        $this->MultiCell(73, 0, 'Email: ', '', 'R', false, 0, $this->GetX(), '', true, 0); 
        $this->SetTextColor(141, 179, 226);
        $this->MultiCell(90, 0, 'truelab.clinicdiagnostic@gmail.com', '', 'L', false, 0, $this->GetX(), '', true, 0); 
        $this->SetTextColor(0, 0, 0);
    }

    public function build()
    {
        $this->build_user_pic();
        $this->build_transaction_info();
        $this->build_transaction_details();
        $this->build_signatures();
    }

    protected function build_user_pic()
    {
        $period_index = strrpos($this->_user_pic, '.');
        $extension = substr($this->_user_pic, ($period_index + 1));

        $this->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(215, 230, 246)));
        $this->Image(base_url() . 'web/uploads/' . $this->_user_pic, 10, 10, 30, 30, strtoupper($extension), '', 'T', true, 300, 'R', false, false, 'TLBR', false, false, false);
        $this->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

        $this->Ln(15);
    }    

    protected function build_transaction_info()
    {
        $this->Ln(12);

        $this->SetFont('helvetica', '', 9);

        $first_third_column_style = array(
            'width' => 25,
            'font_style' => '',
            'text_align' => 'R',
            'height' => 2
        );
        $second_fourth_column_style = array(
            'width' => 65,
            'font_style' => '',
            'height' => 2
        );
        $separator_style = array(
            'width' => 10,
            'font_style' => '',
            'height' => 2
        );
        $column_styles = array(
            0 => $first_third_column_style,
            1 => $separator_style,
            2 => $second_fourth_column_style,
            3 => $first_third_column_style,
            4 => $separator_style,
            5 => $second_fourth_column_style
        );

        $this->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(47, 99, 161)));
        $this->MultiCell(0, 5, '', 'B', 'C', false, 0, $this->GetX(), '', true, 1);
        $this->SetLineStyle(array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
        $this->Ln(8);

        $rows = array(
            array(
                array('text' => 'Name'),
                array('text' => ':'),
                array(
                    'text' => $this->_name,
                    'style' => array(
                        'font_style' => 'B',
                        'text_align' => 'C'
                    )
                ),
                array('text' => 'Case no.'),
                array('text' => ':'),
                array('text' => $this->_case_no)
            ),
            array(
                array('text' => ''),
                array('text' => ''),
                array(
                    'text' => 'Surname / First name / Middle name',
                    'style' => array(
                        'text_align' => 'C'
                    )
                ),
                array('text' => 'Source'),
                array('text' => ':'),
                array('text' => $this->_source)
            )
        );

        $this->set_font_size(9);
        $this->create_table($rows, $column_styles);

        $first_first_third_column_style = array(
            'width' => 25,
            'font_style' => '',
            'text_align' => 'R',
            'height' => 2
        );
        $first_second_fourth_column_style = array(
            'width' => 25,
            'font_style' => '',
            'height' => 2
        );
        $first_separator_style = array(
            'width' => 10,
            'font_style' => '',
            'height' => 2
        );

        $dob_first_third_column_style = array(
            'width' => 10,
            'font_style' => '',
            'text_align' => 'R',
            'height' => 2
        );
        $dob_second_fourth_column_style = array(
            'width' => 25,
            'font_style' => '',
            'height' => 2
        );
        $dob_separator_style = array(
            'width' => 5,
            'font_style' => '',
            'text_align' => 'R',
            'height' => 2
        );

        $third_col_first_third_column_style = array(
            'width' => 25,
            'font_style' => '',
            'text_align' => 'R',
            'height' => 2
        );
        $third_col_second_fourth_column_style = array(
            'width' => 45,
            'font_style' => '',
            'height' => 2
        );
        $third_col_separator_style = array(
            'width' => 10,
            'font_style' => '',
            'height' => 2
        );

        $special_column_styles = array(
            0 => $first_first_third_column_style,
            1 => $first_separator_style,
            2 => $first_second_fourth_column_style,

            3 => $dob_first_third_column_style,
            4 => $dob_separator_style,
            5 => $dob_second_fourth_column_style,

            6 => $third_col_first_third_column_style,
            7 => $third_col_separator_style,
            8 => $third_col_second_fourth_column_style
        );

        $rows = array(
            array(
                array('text' => 'Age/sex'),
                array('text' => ':'),
                array('text' => $this->_age_sex),
                array('text' => 'DOB'),
                array('text' => ':'),
                array('text' => $this->_dob),
                array('text' => 'Date received'),
                array('text' => ':'),
                array('text' => $this->_date_received)
            ),
        );

        $this->create_table($rows, $special_column_styles);

        $rows = array(
            array(
                array('text' => 'Physician'),
                array('text' => ':'),
                array('text' => $this->_physician),
                array('text' => 'Date released'),
                array('text' => ':'),
                array('text' => $this->_date_released)
            )
        );

        $this->create_table($rows, $column_styles);
    }

    // override in child templates
    protected function build_transaction_details()
    {

    }

    public function build_signatures()
    {
        $this->ln(18);

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
                array('text' => $this->_left_signature_name),
                array('text' => 'GERARD L. LAMAYRA, MD,. FPSP')
            ),
            array(
                array('text' => $this->_left_signature_title),
                array('text' => 'Pathologist')
            )
        );

        $this->set_font_size(9);
        $this->create_table($signatures_rows, $column_styles);
        
        $this->writeHTMLCell(32, 32, 137, ($this->GetY() - 14), '<img src="http://localhost/truelab/web/images/pathologist_signature.png" />');
    }

    protected function build_template_header($template_type)
    {
        $this->SetFillColor(47, 99, 161);
        $this->SetTextColor(255, 255, 255);
        $this->SetFont('helvetica', 'B', 9);
        $this->MultiCell(0, 4, $template_type, '', 'C', true, 0, $this->GetX(), '', true, 0);
        $this->SetFont('helvetica', 'B', 9);
        $this->SetTextColor(0, 0, 0);
        $this->SetFillColor(224, 235, 255);
    }

    protected function build_template_note($msg = "Note: this result is electronically transmitted.")
    {
        $this->Ln(5);
        $this->SetFont('helvetica', '', 9);
        $this->Write(3, $msg, '', false, 'L', true);
    }
}