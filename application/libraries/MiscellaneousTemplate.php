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
        
        $this->build_template_header('MISCELLANEOUS');

        $this->Ln(10);

        $column_styles = array(
            array(
                'width' => 90,
                'height' => 2,
                'border' => 'LBRB',
                'text_align' => 'C'
            ), 
            array(
                'width' => 5,
                'height' => 2,
                'border' => 'LBRB',
            ), 
            array(
                'width' => 91,
                'height' => 2,
                'border' => 'LBRB',
                'text_align' => 'C'
            )
        );

        $data_style = array(
            'height' => 12,
            'font_style' => 'B'
        );

        $rows = array(
            array(
                array('text' => 'TEST'),
                array('text' => ' '),
                array('text' => 'RESULT'),
            ),
            array(
                array(
                    'text' => $this->_miscellaneous_type,
                    'style' => $data_style,
                ),
                array(
                    'text' => ':',
                    'style' => array(
                        'height' => 12,
                        'text_align' => 'C'
                    )
                ),
                array(
                    'text' => $this->_test_result,
                    'style' => $data_style,
                )
            )
        );

        $this->set_font_size(12);
        $this->create_table($rows, $column_styles);
        $this->set_font_size(9);

        $this->build_template_note();
    }
}