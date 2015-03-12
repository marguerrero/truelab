<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UrinalysisExtendedTemplate extends UrinalysisTemplate
{
    private $_hemoglobin;
    private $_hematocrit;
    private $_hbsag;

    public function set_hemoglobin($v)
    {
        $this->_hemoglobin = $v;

        return $this;
    }

    public function set_hematocrit($v)
    {
        $this->_hematocrit = $v;

        return $this;
    }

    public function set_hbsag($v)
    {
        $this->_hbsag = $v;

        return $this;
    }

    public function build()
    {
        $this->build_transaction_info();

        // template specific table
        $this->build_extra_table();

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
                array('text' => 'Barangay'),
                array(
                    'text' => $this->_barangay,
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

    private function build_extra_table()
    {
        $this->Ln(5);

        $style = array(
            'width' => 60,
            'font_style' => 'B',
            'height' => 2,
            'border' => 'LTB',
            'text_align' => 'C'
        );
        $style2 = array(
            'width' => 40,
            'font_style' => 'I',
            'height' => 2,
            'border' => 'LTBR',
            'text_align' => 'C'
        );
        $style3 = array(
            'width' => 80,
            'font_style' => '',
            'height' => 2,
            'border' => 'TBR',
            'text_align' => 'C'
        );
        $column_styles = array(
            0 => $style,
            1 => $style2,
            2 => $style3
        );

        $rows = array(
            array(
                array('text' => 'HEMOGLOBIN'),
                array('text' => $this->_hemoglobin),
                array('text' => 'Normal Vales: 11.7-14.5 g/dl')
            ),
            array(
                array('text' => 'HEMATOCRIT'),
                array('text' => $this->_hematocrit),
                array('text' => 'Normal Values: 34.1-44.3 vol%')
            ),
            array(
                array('text' => 'HBsAg(screening)'),
                array('text' => $this->_hbsag),
                array('text' => '')
            ),
        );

        $this->set_font_size(9);
        $this->create_table($rows, $column_styles);
    }
}