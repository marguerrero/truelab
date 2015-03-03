<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HematologyTemplate extends ServiceTemplate
{
    private $_wbc;
    private $_hemoglobin;
    private $_hematocrit;
    private $_rbc;
    private $_platelet_count;
    private $_neutrophils;
    private $_lymphocytes;
    private $_monocytes;
    private $_eosinophils;
    private $_stabs;
    private $_remarks;

    public function set_wbc($v)
    {
        $this->_wbc = $v;

        return $this;
    }

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

    public function set_rbc($v)
    {
        $this->_rbc = $v;

        return $this;
    }

    public function set_platelet_count($v)
    {
        $this->_platelet_count = $v;

        return $this;
    }

    public function set_neutrophils($v)
    {
        $this->_neutrophils = $v;

        return $this;
    }

    public function set_lymphocytes($v)
    {
        $this->_lymphocytes = $v;

        return $this;
    }

    public function set_monocytes($v)
    {
        $this->_monocytes = $v;

        return $this;
    }

    public function set_eosinophils($v)
    {
        $this->_eosinophils = $v;

        return $this;
    }

    public function set_stabs($v)
    {
        $this->_stabs = $v;

        return $this;
    }

    public function set_remarks($v)
    {
        $this->_remarks = $v;

        return $this;
    }

    protected function build_transaction_details()
    {
        $this->Ln(5);

        $this->SetFont('helvetica', 'B', 9);

        $this->SetFillColor(205, 200, 192);
        
        $this->MultiCell(180, 0, 'HEMATOLOGY', 'TLBR', 'C', true, 1, $this->GetX(), '', true, 0);
        $this->SetFillColor(224, 235, 255);

        $style1 = array(
            'width' => 45,
            'height' => 2,
            'border' => 'LB',
            'text_align' => 'R'
        );
        $style2 = array(
            'width' => 35,
            'font_style' => 'B',
            'height' => 2,
            'border' => 'LB',
            'text_align' => 'C'
        );
        $style3 = array(
            'width' => 100,
            'height' => 2,
            'border' => 'LBR',
            'text_align' => 'C'
        );
        $column_styles = array(
            0 => $style1,
            1 => $style2,
            2 => $style3
        );

        $rows = array(
            array(
                array('text' => ''),
                array(
                    'text' => 'RESULT',
                    'style' => array(
                        'font_style' => 'B'
                    )
                ),
                array(
                    'text' => 'NORMAL VALUES',
                    'style' => array(
                        'font_style' => 'B'
                    )
                )
            ),
            array(
                array('text' => 'WBC'),
                array('text' => $this->_wbc),
                array('text' => '5,000-10,000/cumm')
            ),
            array(
                array('text' => 'Hemoglobin'),
                array('text' => $this->_hemoglobin),
                array('text' => 'Female: 11.7-14.5g/dl; Male: 13.7-16.7g/dl')  
            ),
            array(
                array('text' => 'Hematocrit'),
                array('text' => $this->_hematocrit),
                array('text' => 'Female: 34.1-44.3vol%; Male: 40.5-49.7.vo%')
            ),
            array(
                array(
                    'text' => 'RBC',
                    'style' => array(
                        'height' => 8
                    )
                ),
                array(
                    'text' => $this->_rbc,
                    'style' => array(
                        'height' => 8
                    )
                ),
                array('text' => "Male: 4.2-5.6 10^6/µL; Female: 3.8-5.1 10^6/µL\nChild: 3.5 - 5.0 10^6/µL")
            ),
            array(
                array('text' => 'Platelet Count'),
                array('text' => $this->_platelet_count),
                array('text' => 'Female: 150000-390000; Male: 144000-372000')
            ),
            array(
                array('text' => 'Neutrophils'),
                array('text' => $this->_neutrophils),
                array('text' => '45-70%')
            ),
            array(
                array('text' => 'Lymphocytes'),
                array('text' => $this->_lymphocytes),
                array('text' => '18-45%')
            ),
            array(
                array('text' => 'Monocytes'),
                array('text' => $this->_monocytes),
                array('text' => '4-8%')
            ),
            array(
                array('text' => 'Eosinophils'),
                array('text' => $this->_eosinophils),
                array('text' => '2-3%')
            ),
            array(
                array('text' => 'Stabs'),
                array('text' => $this->_stabs),
                array('text' => '1-2%')
            ),
        );

        $this->set_font_size(9);
        $this->create_table($rows, $column_styles);

        $this->MultiCell(45, 0, 'Remarks', 'LB', 'C', false, 0, $this->GetX(), '', true, 0);
        $this->MultiCell(135, 0, '    ' . $this->_remarks, 'LBR', 'L', false, 1, $this->GetX(), '', true, 0);
    }
}