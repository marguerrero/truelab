<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HematologyTemplate extends ServiceTemplate
{
    private $_wbc;
    private $_neutrophils;
    private $_hemoglobin;
    private $_lymphocytes;
    private $_hematocrit;
    private $_monocytes;
    private $_rbc;
    private $_eosinophils;
    private $_mcv;
    private $_stabs;
    private $_mch;
    private $_mchc;
    private $_rdws;
    private $_mpv;
    private $_platelet_count;
    private $_remarks;

    public function set_wbc($v)
    {
        $this->_wbc = $v;

        return $this;
    }

    public function set_neutrophils($v)
    {
        $this->_neutrophils = $v;

        return $this;
    }

    public function set_hemoglobin($v)
    {
        $this->_hemoglobin = $v;

        return $this;
    }

    public function set_lymphocytes($v)
    {
        $this->_lymphocytes = $v;

        return $this;
    }

    public function set_hematocrit($v)
    {
        $this->_hematocrit = $v;

        return $this;
    }

    public function set_monocytes($v)
    {
        $this->_monocytes = $v;

        return $this;
    }

    public function set_rbc($v)
    {
        $this->_rbc = $v;

        return $this;
    }

    public function set_eosinophils($v)
    {
        $this->_eosinophils = $v;

        return $this;
    }

    public function set_mcv($v)
    {
        $this->_mcv = $v;

        return $this;
    }

    public function set_stabs($v)
    {
        $this->_stabs = $v;

        return $this;
    }

    public function set_mch($v)
    {
        $this->_mch = $v;

        return $this;
    }

    public function set_mchc($v)
    {
        $this->_mchc = $v;

        return $this;
    }

    public function set_rdws($v)
    {
        $this->_rdws = $v;

        return $this;
    }

    public function set_mpv($v)
    {
        $this->_mpv = $v;

        return $this;
    }

    public function set_platelet_count($v)
    {
        $this->_platelet_count = $v;

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
        
        $this->build_template_header('HEMATOLOGY');

        $this->Ln(6);

        $style1 = array(
            'width' => 23,
            'height' => 2,
            'border' => '',
            'text_align' => 'R'
        );
        $style1_2 = array(
            'width' => 22,
            'height' => 2,
            'border' => '',
            'text_align' => 'R'
        );
        $style2 = array(
            'width' => 23,
            'height' => 2,
            'border' => '',
            'text_align' => 'C',
            'font_style' => 'B'
        );
        $style2_2 = array(
            'width' => 20,
            'height' => 2,
            'border' => '',
            'text_align' => 'C',
            'font_style' => 'B'
        );
        $style3 = array(
            'width' => 65,
            'height' => 2,
            'border' => '',
            'text_align' => 'L'
        );
        $style3_2 = array(
            'width' => 33,
            'height' => 2,
            'border' => '',
            'text_align' => 'C'
        );
        $column_styles = array(
            0 => $style1,
            1 => $style2,
            2 => $style3,
            3 => $style1_2,
            4 => $style2_2,
            5 => $style3_2
        );

        $rows = array(
            array(
                array(
                    'text' => 'TEST',
                    'style' => array(
                        'text_align' => 'C',
                        'border' => 'TL',
                        'font_style' => 'B'
                    )
                ),
                array(
                    'text' => 'RESULT',
                    'style' => array(
                        'text_align' => 'C',
                        'border' => 'T',
                        'font_style' => 'B'
                    )
                ),
                array(
                    'text' => 'NORMAL VALUES',
                    'style' => array(
                        'text_align' => 'C',
                        'border' => 'T',
                        'font_style' => 'B'
                    )
                ),
                array(
                    'text' => 'TEST',
                    'style' => array(
                        'text_align' => 'C',
                        'border' => 'T',
                        'font_style' => 'B'
                    )
                ),
                array(
                    'text' => 'RESULT',
                    'style' => array(
                        'text_align' => 'C',
                        'border' => 'T',
                        'font_style' => 'B'
                    )
                ),
                array(
                    'text' => 'NORMAL VALUES',
                    'style' => array(
                        'text_align' => 'C',
                        'border' => 'TR',
                        'font_style' => 'B'
                    )
                )
            ),
            array(
                array('text' => 'WBC  :', 'style' => array('border' => 'L')),
                array('text' => $this->_wbc),
                array('text' => '5.0-10.0 10^3/cumm'),
                array('text' => 'Neutrophils  :'),
                array('text' => $this->_neutrophils),
                array('text' => '45-70%', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'Hemoglobin  :', 'style' => array('border' => 'L')),
                array('text' => $this->_hemoglobin),
                array('text' => "Female: 11.7-14.5g/dl Male13.7-16.7g/dl"),
                array('text' => 'Lymphocytes  :'),
                array('text' => $this->_lymphocytes),
                array('text' => '18-45%', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'Hematocrit  :', 'style' => array('border' => 'L')),
                array('text' => $this->_hematocrit),
                array('text' => 'Female: 34.1-44.3vol% Male: 40.5-49.7vol%'),
                array('text' => 'Monocytes  :'),
                array('text' => $this->_monocytes),
                array('text' => '4-8%', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'RBC  :', 'style' => array('border' => 'L')),
                array('text' => $this->_rbc),
                array('text' => 'Male: 4.2–5.6 10^6/µL Female: 3.8–5.1 10^6/µL'),
                array('text' => 'Eosinophils  :'),
                array('text' => $this->_eosinophils),
                array('text' => '2-3%', 'style' => array('border' => 'R'))
            ),
            array(
                array(
                    'text' => 'MCV  :',
                    'style' => array(
                        // 'height' => 8,
                        'border' => 'L'
                    )
                ),
                array(
                    'text' => $this->_mcv
                ),
                array('text' => "76-96fl"),
                array(
                    'text' => 'Stabs  :',
                ),
                array(
                    'text' => $this->_stabs
                ),
                array(
                    'text' => '1-2%',
                    'style' => array(
                        // 'height' => 8,
                        'border' => 'R'
                    )
                )
            ),
            array(
                array('text' => 'MCH  :', 'style' => array('border' => 'L')),
                array('text' => $this->_mch),
                array('text' => '27.0-32.0Pg'),
                array('text' => ''),
                array('text' => ''),
                array('text' => '', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'MCHC  :', 'style' => array('border' => 'L')),
                array('text' => $this->_mchc),
                array('text' => '300-350g/l'),
                array('text' => ''),
                array('text' => ''),
                array('text' => '', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'RDWs  :', 'style' => array('border' => 'L')),
                array('text' => $this->_rdws),
                array('text' => '20-42fl'),
                array('text' => ''),
                array('text' => ''),
                array('text' => '', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'MPV  :', 'style' => array('border' => 'L')),
                array('text' => $this->_mpv),
                array('text' => '8-15fl'),
                array('text' => ''),
                array('text' => ''),
                array('text' => '', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'Platelet Count  :', 'style' => array('border' => 'L')),
                array('text' => $this->_platelet_count),
                array('text' => 'Female: 150-390 10^3/l   Male: 144-372 10^3/l', 'style' => array('border' => '')),
                array('text' => '', 'style' => array('border' => '')),
                array('text' => '', 'style' => array('border' => '')),
                array('text' => '', 'style' => array('border' => 'R'))
            )
        );

        $this->set_font_size(8);
        $this->create_table($rows, $column_styles);

        $this->MultiCell(23, 10, "\nRemarks  :", 'LB', 'R', false, 0, $this->GetX(), '', true, 0);
        $this->MultiCell(163, 10, "\n    " . $this->_remarks, 'BR', 'L', false, 1, $this->GetX(), '', true, 0);

        $this->build_template_note();
    }
}