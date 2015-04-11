<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UrinalysisTemplate extends ServiceTemplate
{
    private $_color;
    private $_clarity;
    private $_protein;
    private $_glucose;
    private $_ph;
    private $_sp_gravity;
    private $_wbc;
    private $_rbc;
    private $_epith_cells;
    private $_mucus_threads;
    private $_bacteria;
    private $_a_urates;
    private $_casts;
    private $_fine;
    private $_coarse;
    private $_hyaline;
    private $_others;

    public function set_color($v)
    {
        $this->_color = $v;

        return $this;
    }

    public function set_clarity($v)
    {
        $this->_clarity = $v;

        return $this;
    }

    public function set_protein($v)
    {
        $this->_protein = $v;

        return $this;
    }

    public function set_glucose($v)
    {
        $this->_glucose = $v;

        return $this;
    }

    public function set_ph($v)
    {
        $this->_ph = $v;

        return $this;
    }

    public function set_sp_gravity($v)
    {
        $this->_sp_gravity = $v;

        return $this;
    }

    public function set_wbc($v)
    {
        $this->_wbc = $v;

        return $this;
    }

    public function set_rbc($v)
    {
        $this->_rbc = $v;

        return $this;
    }

    public function set_epith_cells($v)
    {
        $this->_epith_cells = $v;

        return $this;
    }

    public function set_mucus_threads($v)
    {
        $this->_mucus_threads = $v;

        return $this;
    }

    public function set_bacteria($v)
    {
        $this->_bacteria = $v;

        return $this;
    }

    public function set_a_urates($v)
    {
        $this->_a_urates = $v;

        return $this;
    }

    public function set_casts($v)
    {
        $this->_casts = $v;

        return $this;
    }

    public function set_fine($v)
    {
        $this->_fine = $v;

        return $this;
    }

    public function set_coarse($v)
    {
        $this->_coarse = $v;

        return $this;
    }

    public function set_hyaline($v)
    {
        $this->_hyaline = $v;

        return $this;
    }

    public function set_others($v)
    {
        $this->_others = $v;

        return $this;
    }

    protected function build_transaction_details()
    {
        $this->Ln(5);

        $this->SetFont('helvetica', 'B', 9);
        
        $this->build_template_header('URINALYSIS');

        $this->Ln(6);

        $this->MultiCell(56, 0, 'Macroscopic', 'LBT', 'C', false, 0, $this->GetX(), '', true, 0);
        $this->MultiCell(130, 0, 'Microscopic', 'LBRT', 'C', false, 1, $this->GetX(), '', true, 0);

        $style = array(
            'width' => 25,
            'font_style' => 'I',
            'height' => 2,
            'border' => '',
            'text_align' => 'R'
        );
        $style2 = array(
            'width' => 31,
            'font_style' => 'B',
            'height' => 2,
            'border' => '',
            'text_align' => 'C'
        );
        $style3_1 = array(
            'width' => 40,
            'height' => 2,
            'border' => '',
            'text_align' => 'R'
        );
        $style3_2 = array(
            'width' => 25,
            'font_style' => 'B',
            'height' => 2,
            'border' => '',
            'text_align' => 'C'
        );
        $style3_3 = array(
            'width' => 35,
            'font_style' => 'I',
            'height' => 2,
            'border' => '',
            'text_align' => 'R'
        );
        $style3_4 = array(
            'width' => 30,
            'font_style' => 'B',
            'height' => 2,
            'border' => '',
            'text_align' => 'C'
        );
        $column_styles = array(
            0 => $style,
            1 => $style2,
            2 => $style3_1,
            3 => $style3_2,
            4 => $style3_3,
            5 => $style3_4
        );

        $rows = array(
            array(
                array('text' => 'Color   :', 'style' => array('border' => 'L')),
                array('text' => $this->_color),
                array('text' => 'White blood cells   :', 'style' => array('border' => 'L')),
                array('text' => $this->_wbc),
                array('text' => 'CAST    ', 'style' => array('border' => 'L', 'font_style' => 'B')),
                array('text' => $this->_casts, 'style' => array('border' => 'R', 'font_style' => 'B')),
            ),
            array(
                array('text' => 'Clarity   :', 'style' => array('border' => 'L')),
                array('text' => $this->_clarity),
                array('text' => 'Red blood cells   :', 'style' => array('border' => 'L')),
                array('text' => $this->_rbc),
                array('text' => 'Hyaline   :', 'style' => array('border' => 'L')),
                array('text' => $this->_hyaline, 'style' => array('border' => 'R', 'font_style' => 'B')),
            ),
            array(
                array('text' => 'Protein   :', 'style' => array('border' => 'L')),
                array('text' => $this->_protein),
                array('text' => 'Epithelial cells   :', 'style' => array('border' => 'L')),
                array('text' => $this->_epith_cells),
                array('text' => 'Fine   :', 'style' => array('border' => 'L')),
                array('text' => $this->_fine, 'style' => array('border' => 'R', 'font_style' => 'B')),
            ),
            array(
                array('text' => 'Glucose   :', 'style' => array('border' => 'L')),
                array('text' => $this->_glucose),
                array('text' => 'Mucus Threads   :', 'style' => array('border' => 'L')),
                array('text' => $this->_mucus_threads),
                array('text' => 'Coarse   :', 'style' => array('border' => 'L')),
                array('text' => $this->_coarse, 'style' => array('border' => 'R', 'font_style' => 'B')),
            ),
            array(
                array('text' => 'pH   :', 'style' => array('border' => 'L')),
                array('text' => $this->_ph),
                array('text' => 'Bacteria   :', 'style' => array('border' => 'L')),
                array('text' => $this->_bacteria),
                array('text' => 'Others   :', 'style' => array('border' => 'L')),
                array('text' => $this->_others, 'style' => array('border' => 'R', 'font_style' => 'B')),
            ),
            array(
                array('text' => 'Sp Gravity   :', 'style' => array('border' => 'LB')),
                array('text' => $this->_sp_gravity, 'style' => array('border' => 'B', 'font_style' => 'B')),
                array('text' => 'A. Urates/phosphates   :', 'style' => array('border' => 'BL')),
                array('text' => $this->_a_urates, 'style' => array('border' => 'B', 'font_style' => 'B')),
                array('text' => '', 'style' => array('border' => 'BL')),
                array('text' => '', 'style' => array('border' => 'BR')),
            )
        );

        $this->set_font_size(9);
        $this->create_table($rows, $column_styles);

        // $this->build_template_note();
    }
}