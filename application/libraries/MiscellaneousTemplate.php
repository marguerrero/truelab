<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MiscellaneousTemplate extends ServiceTemplate
{
    private $_miscellaneous_type;
    private $_test_result;

    public function __construct($miscellaneous_type, $test_result = null)
    {
        parent::__construct();

        $this->_miscellaneous_type = $miscellaneous_type;
        $this->_test_result = $test_result;
    }

    protected function build_transaction_details()
    {
        $this->Ln(5);

        $this->SetFont('helvetica', 'B', 9);

        $this->SetFillColor(205, 200, 192);
        
        $this->MultiCell(55, 0, '', '', 'C', false, 0, $this->GetX(), '', false, 0);
        $this->MultiCell(80, 0, 'MISCELLANEOUS', 'TLBR', 'C', true, 0, $this->GetX(), '', true, 0);
        $this->MultiCell(50, 0, '', '', 'C', false, 1, $this->GetX(), '', false, 0);
        
        $this->SetFillColor(224, 235, 255);

        $style_border = array(
            'width' => 55,
            'height' => 2
        );
        $style2 = array(
            'width' => 40,
            'height' => 2,
            'border' => 'LBRB',
            'text_align' => 'C'
        );
        $column_styles = array(
            0 => $style_border,
            1 => $style2,
            2 => $style2,
            3 => $style_border,
        );

        $data_style = array(
            'height' => 12,
            'font_style' => 'B'
        );

        $rows = array(
            array(
                array('text' => ''),
                array('text' => 'TEST'),
                array('text' => 'RESULT'),
                array('text' => ''),
            ),
            array(
                array('text' => ''),
                array(
                    'text' => "\n" . $this->_miscellaneous_type,
                    'style' => $data_style,
                ),
                array(
                    'text' => "\n" . $this->_test_result,
                    'style' => $data_style,
                ),
                array('text' => '')
            )
        );

        $this->set_font_size(9);
        $this->create_table($rows, $column_styles);

        $this->Ln(10);

    }
}