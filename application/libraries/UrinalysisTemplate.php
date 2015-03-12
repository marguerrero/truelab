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
    private $_mucous_threads;
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

    public function set_mucous_threads($v)
    {
        $this->_mucous_threads = $v;

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

        $this->SetFillColor(205, 200, 192);
        
        $this->MultiCell(180, 0, 'URINALYSIS', 'TLBR', 'C', true, 1, $this->GetX(), '', true, 0);
        $this->SetFillColor(224, 235, 255);

        $this->MultiCell(50, 0, 'Macroscopic', 'LB', 'C', false, 0, $this->GetX(), '', true, 0);
        $this->MultiCell(130, 0, 'Microscopic', 'LBR', 'C', false, 1, $this->GetX(), '', true, 0);

        $style = array(
            'width' => 25,
            'font_style' => 'I',
            'height' => 2,
            'border' => 'LB'
        );
        $style2 = array(
            'width' => 25,
            'font_style' => 'I',
            'height' => 2,
            'border' => 'LB',
            'text_align' => 'C'
        );
        $style3_1 = array(
            'width' => 40,
            'font_style' => 'I',
            'height' => 2,
            'border' => 'LB'
        );
        $style3_2 = array(
            'width' => 25,
            'font_style' => 'I',
            'height' => 2,
            'border' => 'LB',
            'text_align' => 'C'
        );
        $style3_3 = array(
            'width' => 35,
            'font_style' => 'I',
            'height' => 2,
            'border' => 'LB'
        );
        $style3_4 = array(
            'width' => 30,
            'font_style' => 'I',
            'height' => 2,
            'border' => 'LBR',
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
                array('text' => 'COLOR:'),
                array('text' => $this->_color),
                array('text' => 'WBC:'),
                array('text' => $this->_wbc),
                array('text' => 'CASTS:'),
                array('text' => $this->_casts),
            ),
            array(
                array('text' => 'CLARITY:'),
                array('text' => $this->_clarity),
                array('text' => 'RBC:'),
                array('text' => $this->_rbc),
                array('text' => 'FINE:'),
                array('text' => $this->_fine),
            ),
            array(
                array('text' => 'PROTEIN:'),
                array('text' => $this->_protein),
                array('text' => 'EPITH CELLS:'),
                array('text' => $this->_epith_cells),
                array('text' => 'COARSE:'),
                array('text' => $this->_coarse),
            ),
            array(
                array('text' => 'GLUCOSE:'),
                array('text' => $this->_glucose),
                array('text' => 'MUCOUS THREADS:'),
                array('text' => $this->_mucous_threads),
                array('text' => 'HYALINE:'),
                array('text' => $this->_hyaline),
            ),
            array(
                array('text' => 'pH:'),
                array('text' => $this->_ph),
                array('text' => 'BACTERIA:'),
                array('text' => $this->_bacteria),
                array('text' => 'OTHERS:'),
                array('text' => $this->_others),
            ),
            array(
                array('text' => 'Sp GRAVITY:'),
                array('text' => $this->_sp_gravity),
                array('text' => 'A. URATES:'),
                array('text' => $this->_a_urates),
                array('text' => ''),
                array('text' => ''),
            )
        );

        $this->set_font_size(9);
        $this->create_table($rows, $column_styles);
    }
}