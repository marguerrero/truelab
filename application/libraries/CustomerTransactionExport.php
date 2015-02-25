<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerTransactionExport extends PDF
{
    private $_reference_number;

    public function __construct()
    {
        parent::__construct();
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
                array('text' => 'Reymar'),
                array('text' => 'Reference No.'),
                array('text' => 'TLCADC72R12RMABC')
            ),
            array(
                array('text' => 'Last Name'),
                array('text' => 'Guerrero'),
                array('text' => 'Date'),
                array('text' => 'February 21, 2015')
            ),
            array(
                array('text' => 'Age'),
                array('text' => '23'),
                array('text' => ''),
                array('text' => '')
            ),
            array(
                array('text' => 'Gender'),
                array('text' => 'Male'),
                array('text' => ''),
                array('text' => '')
            ),
            array(
                array('text' => 'Birthday'),
                array('text' => 'January 11, 1992'),
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
            ),
            array(
                array(
                    'text' => '1  ',
                    'style' => $data_row_style
                ),
                array(
                    'text' => 'Clinical Mocroscopy',
                    'style' => $data_row_style
                ),
                array(
                    'text' => 'Urinalysis',
                    'style' => $data_row_style
                ),
                array(
                    'text' => 'P 50.00',
                    'style' => $data_row_style
                )
            ),
            array(
                array('text' => '2  ', 'style' => $data_row_style),
                array('text' => 'Clinical Microscopy', 'style' => $data_row_style),
                array('text' => 'Fecalysis', 'style' => $data_row_style),
                array('text' => 'P 50.00', 'style' => $data_row_style)
            ),
            array(
                array('text' => '3  ', 'style' => $data_row_style),
                array('text' => 'Clinical Chemistry', 'style' => $data_row_style),
                array('text' => 'Foobar', 'style' => $data_row_style),
                array('text' => 'P 110.00', 'style' => $data_row_style)
            ),
            array(
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
                    'text' => 'P 210.00', 
                    'style' => array(
                        'border' => ''
                    )
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