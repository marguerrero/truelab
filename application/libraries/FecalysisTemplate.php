<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FecalysisTemplate extends ServiceTemplate
{
    private $_color;
    private $_consistency;
    private $_while_blood_cells;
    private $_red_blood_cells;
    private $_occult_blood;
    private $_amoeba_result;

    public function set_color($v)
    {
        $this->_color = $v;

        return $this;
    }

    public function set_consistency($v)
    {
        $this->_consistency = $v;

        return $this;
    }

    public function set_while_blood_cells($v)
    {
        $this->_while_blood_cells = $v;

        return $this;
    }

    public function set_red_blood_cells($v)
    {
        $this->_red_blood_cells = $v;

        return $this;
    }

    public function set_occult_blood($v)
    {
        $this->_occult_blood = $v;

        return $this;
    }

    public function set_amoeba_result($v)
    {
        $this->_amoeba_result = $v;

        return $this;
    }

    protected function build_transaction_details()
    {
        $this->Ln(5);

        $this->SetFont('helvetica', 'B', 9);
        
        $this->build_template_header('FECALYSIS');

        $this->Ln(6);

        $style1 = array(
            'width' => 60,
            'height' => 2,
            'border' => '',
            'text_align' => 'R'
        );
        $style2 = array(
            'width' => 126,
            'height' => 2,
            'border' => ''
        );
        $column_styles = array(
            0 => $style1,
            1 => $style2
        );

        $rows = array(
            array(
                array('text' => '', 'style' => array('border' => 'LT')),
                array(
                    'text' => 'MACROSOPIC EXAMINATION',
                    'style' => array(
                        'font_style' => 'B',
                        'text_align' => 'L',
                        'border' => 'TR'
                    )
                ),
            ),
            array(
                array('text' => 'Color   :', 'style' => array('border' => 'L')),
                array('text' => '    ' . $this->_color, 'style' => array('border' => 'R', 'font_style' => 'B'))
            ),
            array(
                array('text' => 'Consistency   :', 'style' => array('border' => 'L')),
                array('text' => '    ' . $this->_consistency, 'style' => array('border' => 'R', 'font_style' => 'B'))
            ),
            array(
                array('text' => '', 'style' => array('border' => 'L')),
                array(
                    'text' => 'MICROSCOPIC EXAMINATION',
                    'style' => array(
                        'font_style' => 'B',
                        'text_align' => 'L',
                        'border' => 'R'
                    )
                ),
            ),
            array(
                array('text' => 'White blood cells   :', 'style' => array('border' => 'L')),
                array('text' => '    ' . $this->_while_blood_cells, 'style' => array('border' => 'R', 'font_style' => 'B'))
            ),
            array(
                array('text' => 'Red blood cells   :', 'style' => array('border' => 'L')),
                array('text' => '    ' . $this->_red_blood_cells, 'style' => array('border' => 'R', 'font_style' => 'B'))
            ),
            array(
                array('text' => 'Occult blood   :', 'style' => array('border' => 'L')),
                array('text' => '    ' . $this->_occult_blood, 'style' => array('border' => 'R', 'font_style' => 'B'))
            ),
            array(
                array('text' => '', 'style' => array('border' => 'LB')),
                array('text' => '    ' . $this->_amoeba_result, 'style' => array('border' => 'BR', 'font_style' => 'B'))
            ),
        );

        $this->set_font_size(9);
        $this->create_table($rows, $column_styles);

        $this->build_template_note();
    }
}