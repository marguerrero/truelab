<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RadiologyTemplate extends ServiceTemplate
{
    private $_type;
    private $_html;
    private $_last_y;
    private $_signature_name;
    private $_signature_title;

    public function __construct($type, $html)
    {
        $custom = array(
            'orietation' => 'P',
            'unit' => 'mm',
            'size' => array(216, 280) 
        );
        $this->_type = $type;
        $this->_html = $html;

        $this->_signature_name = "ERIC NORMAN BRUA, MD";
        $this->_signature_title = "RADIOLOGIST";

        parent::__construct($custom);
    }

    public function set_signature($name, $title) 
    {
        $this->_signature_name = $name;
        $this->_signature_title = $title;
    }

    protected function build_transaction_details()
    {
        $this->Ln(1);
        
        $this->SetFont('helvetica', 'B', 9);
        
        $this->build_template_header($this->_type);

        $this->Ln(0);
        $this->writeHTML($this->_html, true, false, true, false, '');
        
        $this->_last_y = ($this->GetY() - 74); // 74 for offset height of header, transaction info and template type
        
    }

    public function build_signatures()
    {
        $html_lines = explode("\n", $this->_html);
        $this->ln(75 - ($this->_last_y));
        $this->writeHTMLCell(27, 27, 88, ($this->GetY() - 14), '<img width="100" height="50" src="http://localhost/truelab/web/images/rad_signature.jpg" />');
        $this->ln(10);
        $column_styles = array(
            0 => array(
                'width' => 180,
                'height' => 2,
                'text_align' => 'C',
                'z-index' => 9999
            )
        );
        $signatures_rows = array(
            array(
                array('text' => $this->_signature_name)
            ),
            array(
                array('text' => $this->_signature_title)
            )
        );
        $this->set_font_size(9);
        $this->create_table($signatures_rows, $column_styles);

        $this->ln(2);
        if($this->_type == "Radiology")
        	$this->build_template_note("*** This is an electronically signed result");
        else
        	$this->build_template_note();
    }
}