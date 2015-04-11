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
    private $_a_g_ratio;
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

    public function set_a_g_ratio($v)
    {
        $this->_a_g_ratio = $v;

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
        $this->Ln();

        $this->SetFont('helvetica', 'B', 9);
        
        $this->build_template_header('CLINICAL CHEMISTRY');
        
        $this->Ln(5);

        $top_left_style = array(
            'width' => 30,
            'height' => 2,
            'border' => 'TL',
            'text_align' => 'L'
        );

        $style1 = array(
            'width' => 30,
            'height' => 2,
            'border' => '',
            'text_align' => 'R'
        );
        $style2 = array(
            'width' => 25,
            'height' => 2,
            'border' => '',
            'text_align' => 'C',
            'font_style' => 'B'
        );
        $style3 = array(
            'width' => 39,
            'height' => 2,
            'border' => '',
            'text_align' => 'C'
        );
        $style3_2 = array(
            'width' => 37,
            'height' => 2,
            'border' => '',
            'text_align' => 'C'
        );
        $column_styles = array(
            0 => $style1,
            1 => $style2,
            2 => $style3,
            3 => $style1,
            4 => $style2,
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
                array('text' => 'FBS/RBS  :', 'style' => array('border' => 'L')),
                array('text' => $this->_fbs),
                array('text' => '75-115 mg/dl'),
                array('text' => 'Total Bilirubin  :'),
                array('text' => $this->_total_bilirubin),
                array('text' => '', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'HbA1c  :', 'style' => array('border' => 'L')),
                array('text' => $this->_hbalc),
                array('text' => 'Up to 7.0 %'),
                array('text' => 'Indirect Bil  :'),
                array('text' => $this->_indirect_bil),
                array('text' => '', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'Creatinine  :', 'style' => array('border' => 'L')),
                array('text' => $this->_creatinine),
                array('text' => '0.6-1.3 mg/dl'),
                array('text' => 'Direct Bil  :'),
                array('text' => $this->_direct_bil),
                array('text' => '', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'BUN  :', 'style' => array('border' => 'L')),
                array('text' => $this->_bun),
                array('text' => '13-43 mg/dl'),
                array('text' => 'Total Protein  :'),
                array('text' => $this->_total_protein),
                array('text' => '', 'style' => array('border' => 'R'))
            ),
            array(
                array(
                    'text' => 'BUA  :',
                    'style' => array(
                        'height' => 8,
                        'border' => 'L'
                    )
                ),
                array(
                    'text' => $this->_bua,
                    'style' => array(
                        'height' => 8,
                        'font_style' => 'B'
                    )
                ),
                array('text' => "F: 2.4-5.7;\nM: 3.4-7.0 mg/dl"),
                array(
                    'text' => 'A: G ratio  :', 'style' => array('border' => 'L'),
                    'style' => array(
                        'height' => 8
                    )
                ),
                array(
                    'text' => $this->_a_g_ratio,
                    'style' => array(
                        'height' => 8,
                        'font_style' => 'B'
                    )
                ),
                array(
                    'text' => '',
                    'style' => array(
                        'height' => 8,
                        'border' => 'R'
                    )
                )
            ),
            array(
                array('text' => 'Cholesterol  :', 'style' => array('border' => 'L')),
                array('text' => $this->_cholesterol),
                array('text' => '< 200 mg/dl'),
                array('text' => 'Potassium  :'),
                array('text' => $this->_potassium),
                array('text' => '3.3-5.5 mmol/L', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'Triglyceride  :', 'style' => array('border' => 'L')),
                array('text' => $this->_triglyceride),
                array('text' => '< 150 mg/dl'),
                array('text' => 'Sodium  :'),
                array('text' => $this->_sodium),
                array('text' => '135-145 mmol/L', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'HDL  :', 'style' => array('border' => 'L')),
                array('text' => $this->_hdl),
                array('text' => '< 100 mg/dl'),
                array('text' => 'Total Calcium  :'),
                array('text' => $this->_total_calcium),
                array('text' => '8.1-10.4 mg/dl', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'LDL  :', 'style' => array('border' => 'L')),
                array('text' => $this->_ldl),
                array('text' => '< 200 mg/dl'),
                array('text' => 'Chloride  :'),
                array('text' => $this->_chloride),
                array('text' => '', 'style' => array('border' => 'R'))
            ),
            array(
                array('text' => 'SGOT  :', 'style' => array('height' => 8, 'border' => 'L')),
                array('text' => $this->_sgot),
                array('text' => 'F: <31u/l; M: <42u/l'),
                array(
                    'text' => 'Others  :',
                    'style' => array(
                        'height' => 8,
                        'border' => ''
                    )
                ),
                array(
                    'text' => $this->_others,
                    'style' => array(
                        'height' => 8,
                        'border' => '',
                        'font_style' => 'B'
                    )
                ),
                array(
                    'text' => '',
                    'style' => array(
                        'height' => 8,
                        'border' => 'R'
                    )
                )

            ),
            array(
                array('text' => 'SGPT  :', 'style' => array('border' => 'L')),
                array('text' => $this->_sgpt),
                array('text' => 'F; <34u/l; M: <45u/l'),
                array('text' => ''),
                array('text' => ''),
                array('text' => '', 'style' => array('border' => 'R'))
            ),
            array(
                array(
                    'text' => 'Alk. Phosphatase  :',
                    'style' => array(
                        'height' => 8,
                        'border' => 'LB'
                    )
                ),
                array(
                    'text' => $this->_alk_phosphatase,
                    'style' => array(
                        'height' => 8,
                        'border' => 'B',
                        'font_style' => 'B'
                    )
                ),
                array('text' => "Adult: < 258;\nChildren: < 727", 'style' => array('border' => 'B', 'height' => 8)),
                array('text' => '', 'style' => array('height' => 8, 'border' => 'B')),
                array('text' => '', 'style' => array('height' => 8, 'border' => 'B')),
                array('text' => '', 'style' => array('height' => 8, 'border' => 'BR'))
            ),
        );

        $this->set_font_size(8);
        $this->create_table($rows, $column_styles);

        // $this->build_template_note();
    }
}