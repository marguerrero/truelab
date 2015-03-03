<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ClinicalChemistryTemplate extends ServiceTemplate
{
    private $_fbs;
    private $_hbalc;
    private $_creatinine;
    private $_bun;
    private $_bua;
    private $_cholesterol;
    private $_triglyceride;
    private $_hdl;
    private $_ldl;
    private $_sgot;
    private $_sgpt;
    private $_alk_phosphatase;
    private $_total_bilirubin;
    private $_indirect_bil;
    private $_direct_bil;
    private $_total_protein;
    private $_albumin;
    private $_globulin;
    private $_ag_ratio;
    private $_potassium;
    private $_sodium;
    private $_total_calcium;
    private $_chloride;
    private $_others;

    public function set_fbs($v)
    {
        $this->_fbs = $v;

        return $this;
    }

    public function set_hbalc($v)
    {
        $this->_hbalc = $v;

        return $this;
    }

    public function set_creatinine($v)
    {
        $this->_creatinine = $v;

        return $this;
    }

    public function set_bun($v)
    {
        $this->_bun = $v;

        return $this;
    }

    public function set_bua($v)
    {
        $this->_bua = $v;

        return $this;
    }

    public function set_cholesterol($v)
    {
        $this->_cholesterol = $v;

        return $this;
    }

    public function set_triglyceride($v)
    {
        $this->_triglyceride = $v;

        return $this;
    }

    public function set_hdl($v)
    {
        $this->_hdl = $v;

        return $this;
    }

    public function set_ldl($v)
    {
        $this->_ldl = $v;

        return $this;
    }

    public function set_sgot($v)
    {
        $this->_sgot = $v;

        return $this;
    }

    public function set_sgpt($v)
    {
        $this->_sgpt = $v;

        return $this;
    }

    public function set_alk_phosphatase($v)
    {
        $this->_alk_phosphatase = $v;

        return $this;
    }

    public function set_total_bilirubin($v)
    {
        $this->_total_bilirubin = $v;

        return $this;
    }

    public function set_indirect_bil($v)
    {
        $this->_indirect_bil = $v;

        return $this;
    }

    public function set_direct_bil($v)
    {
        $this->_direct_bil = $v;

        return $this;
    }

    public function set_total_protein($v)
    {
        $this->_total_protein = $v;

        return $this;
    }

    public function set_albumin($v)
    {
        $this->_albumin = $v;

        return $this;
    }

    public function set_globulin($v)
    {
        $this->_globulin = $v;

        return $this;
    }

    public function set_ag_ratio($v)
    {
        $this->_ag_ratio = $v;

        return $this;
    }

    public function set_potassium($v)
    {
        $this->_potassium = $v;

        return $this;
    }

    public function set_sodium($v)
    {
        $this->_sodium = $v;

        return $this;
    }

    public function set_total_calcium($v)
    {
        $this->_total_calcium = $v;

        return $this;
    }

    public function set_chloride($v)
    {
        $this->_chloride = $v;

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
        
        $this->MultiCell(180, 0, 'CLINICAL CHEMISTRY', 'TLBR', 'C', true, 1, $this->GetX(), '', true, 0);
        $this->SetFillColor(224, 235, 255);

        $style1 = array(
            'width' => 30,
            'height' => 2,
            'border' => 'LB',
            'text_align' => 'L'
        );
        $style2 = array(
            'width' => 25,
            'height' => 2,
            'border' => 'LB',
            'text_align' => 'C'
        );
        $style3 = array(
            'width' => 35,
            'height' => 2,
            'border' => 'LBR',
            'text_align' => 'C'
        );
        $column_styles = array(
            0 => $style1,
            1 => $style2,
            2 => $style3,
            3 => $style1,
            4 => $style2,
            5 => $style3
        );

        $rows = array(
            array(
                array(
                    'text' => 'TEST',
                    'style' => array(
                        'text_align' => 'C'
                    )
                ),
                array(
                    'text' => 'RESULT',
                    'style' => array(
                        'text_align' => 'C'
                    )
                ),
                array(
                    'text' => 'NORMAL VALUES',
                    'style' => array(
                        'text_align' => 'C'
                    )
                ),
                array(
                    'text' => 'TEST',
                    'style' => array(
                        'text_align' => 'C'
                    )
                ),
                array(
                    'text' => 'RESULT',
                    'style' => array(
                        'text_align' => 'C'
                    )
                ),
                array(
                    'text' => 'NORMAL VALUES',
                    'style' => array(
                        'text_align' => 'C'
                    )
                )
            ),
            array(
                array('text' => 'FBS'),
                array('text' => $this->_fbs),
                array('text' => '70-105 mg/dl'),
                array('text' => 'Total Bilirubin'),
                array('text' => $this->_total_bilirubin),
                array('text' => '0.1-1.2 mg/dl')
            ),
            array(
                array('text' => 'HbA1c'),
                array('text' => $this->_hbalc),
                array('text' => 'Up to 7.0 %'),
                array('text' => 'Indirect Bil'),
                array('text' => $this->_indirect_bil),
                array('text' => '0.2-0.8 mg/dl')
            ),
            array(
                array('text' => 'Creatinine'),
                array('text' => $this->_creatinine),
                array('text' => '0.6-1.3 mg/dl'),
                array('text' => 'Direct Bil'),
                array('text' => $this->_direct_bil),
                array('text' => '0.1-0.4 mg/dl')
            ),
            array(
                array('text' => 'BUN'),
                array('text' => $this->_bun),
                array('text' => '13-43 mg/dl'),
                array('text' => 'Total Protein'),
                array('text' => $this->_total_protein),
                array('text' => '6.6-8.7 g/dl')
            ),
            array(
                array(
                    'text' => 'BUA',
                    'style' => array(
                        'height' => 8
                    )
                ),
                array(
                    'text' => $this->_bua,
                    'style' => array(
                        'height' => 8
                    )
                ),
                array('text' => "F: 2.4-5.7;\nM: 3.4-7.0 mg/dl"),
                array(
                    'text' => 'Albumin',
                    'style' => array(
                        'height' => 8
                    )
                ),
                array(
                    'text' => $this->_albumin,
                    'style' => array(
                        'height' => 8
                    )
                ),
                array(
                    'text' => '3.8-5.1 g/dl',
                    'style' => array(
                        'height' => 8
                    )
                )
            ),
            array(
                array('text' => 'Cholesterol'),
                array('text' => $this->_cholesterol),
                array('text' => '< 200 mg/dl'),
                array('text' => 'Globulin'),
                array('text' => $this->_globulin),
                array('text' => '2.3-3.5 g/dl')
            ),
            array(
                array('text' => 'Triglyceride'),
                array('text' => $this->_triglyceride),
                array('text' => '< 150 mg/dl'),
                array('text' => 'A/G ratio'),
                array('text' => $this->_ag_ratio),
                array('text' => '')
            ),
            array(
                array('text' => 'HDL'),
                array('text' => $this->_hdl),
                array('text' => '< 100 mg/dl'),
                array('text' => 'Potassium'),
                array('text' => $this->_potassium),
                array('text' => '3.3-5.5 mmol/L')
            ),
            array(
                array('text' => 'LDL'),
                array('text' => $this->_ldl),
                array('text' => '< 200 mg/dl'),
                array('text' => 'Sodium'),
                array('text' => $this->_sodium),
                array('text' => '135-145 mmol/L')
            ),
            array(
                array('text' => 'SGOT'),
                array('text' => $this->_sgot),
                array('text' => 'Up to 45 U/L'),
                array('text' => 'Total Calcium'),
                array('text' => $this->_total_calcium),
                array('text' => '8.1-10.4 mg/dl')
            ),
            array(
                array('text' => 'SGPT'),
                array('text' => $this->_sgpt),
                array('text' => 'Up to 41 U/L'),
                array('text' => 'Chloride'),
                array('text' => $this->_chloride),
                array('text' => '')
            ),
            array(
                array(
                    'text' => 'Alk. Phosphatase',
                    'style' => array(
                        'height' => 8
                    )
                ),
                array(
                    'text' => $this->_alk_phosphatase,
                    'style' => array(
                        'height' => 8
                    )
                ),
                array('text' => "Adult: < 258;\nChildren: < 727"),
                array(
                    'text' => 'Others',
                    'style' => array(
                        'height' => 8
                    )
                ),
                array(
                    'text' => $this->_others,
                    'style' => array(
                        'height' => 8
                    )
                ),
                array(
                    'text' => '',
                    'style' => array(
                        'height' => 8
                    )
                )
            ),
        );

        $this->set_font_size(9);
        $this->create_table($rows, $column_styles);
    }

    public function build_signatures()
    {
        $this->ln(7);

        $style = array(
            'width' => 90,
            'height' => 2,
            'text_align' => 'C'
        );
        $style2 = array(
            'width' => 90,
            'height' => 2,
            'text_align' => 'C'
        );
        $column_styles = array(
            0 => $style,
            1 => $style2
        );

        $signatures_rows = array(
            array(
                array('text' => 'RABIA ROSE H. MANUBAY, RMT'),
                array('text' => 'GERARD L. LAMAYRA, MD,. FPSP')
            ),
            array(
                array('text' => 'MEDICAL TECHNOLOGIST'),
                array('text' => 'PATHOLOGIST')
            )
        );

        $this->set_font_size(9);
        $this->create_table($signatures_rows, $column_styles);
    }
}