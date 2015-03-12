<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FecalysisTemplate extends ServiceTemplate
{
    private $_color;
    private $_consistency;
    private $_while_blood_cells;
    private $_red_blood_cells;
    private $_occult_blood;

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

    protected function build_transaction_details()
    {
        $this->Ln(5);

        $this->SetFont('helvetica', 'B', 9);

        $this->SetFillColor(205, 200, 192);
        
        $this->MultiCell(180, 0, 'FECALYSIS', 'TLBR', 'C', true, 1, $this->GetX(), '', true, 0);
        $this->SetFillColor(224, 235, 255);

        $style1 = array(
            'width' => 60,
            'height' => 2,
            'border' => 'LB',
            'text_align' => 'R'
        );
        $style2 = array(
            'width' => 120,
            'height' => 2,
            'border' => 'LBR'
        );
        $column_styles = array(
            0 => $style1,
            1 => $style2
        );

        $rows = array(
            array(
                array(
                    'text' => 'MACROSOPIC EXAMINATION',
                    'style' => array(
                        'font_style' => 'BI',
                        'text_align' => 'R'
                    )
                ),
                array(
                    'text' => ''
                ),
            ),
            array(
                array('text' => 'Color:'),
                array('text' => '    ' . $this->_color)
            ),
            array(
                array('text' => 'Consistency:'),
                array('text' => '    ' . $this->_consistency)
            ),
            array(
                array(
                    'text' => 'MICROSCOPIC EXAMINATION',
                    'style' => array(
                        'font_style' => 'BI',
                        'text_align' => 'R'
                    )
                ),
                array(
                    'text' => ''
                ),
            ),
            array(
                array('text' => 'White blood cells:',),
                array('text' => '    ' . $this->_while_blood_cells)
            ),
            array(
                array('text' => 'Red blood cells:'),
                array('text' => '    ' . $this->_red_blood_cells)
            ),
            array(
                array('text' => 'Occult blood:'),
                array('text' => '    ' . $this->_occult_blood)
            ),
        );

        $this->set_font_size(9);
        $this->create_table($rows, $column_styles);
    }
}