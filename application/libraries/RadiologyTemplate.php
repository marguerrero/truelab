<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RadiologyTemplate extends ServiceTemplate
{
    private $_type;
    private $_html;
    private $_last_y;
    public function __construct($type, $html)
    {
        $custom = array(
            'orietation' => 'P',
            'unit' => 'mm',
            'size' => array(216, 280) 
        );
        $this->_type = $type;
        $this->_html = $html;
        parent::__construct($custom);
    }
    protected function build_transaction_details()
    {
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 9);
        $this->SetFillColor(205, 200, 192);
        
        $this->MultiCell(180, 0, $this->_type, 'TLBR', 'C', true, 1, $this->GetX(), '', true, 0);
        $this->SetFillColor(224, 235, 255);
        $this->SetFont('helvetica', '', 9);
        $this->writeHTML($this->_html, true, false, true, false, '');
        
        $this->_last_y = ($this->GetY() - 74); // 74 for offset height of header, transaction info and template type
    }
    public function build_signatures()
    {
        $html_lines = explode("\n", $this->_html);
        // $this->ln(170 - (8 * count($html_lines)));
        $this->ln(170 - ($this->_last_y));
        // die($this->GetY() . '<');
        $column_styles = array(
            0 => array(
                'width' => 180,
                'height' => 2,
                'text_align' => 'C'
            )
        );
        $signatures_rows = array(
            array(
                array('text' => 'ERIC NORMAN BRUA, MD')
            ),
            array(
                array('text' => 'RADIOLOGIST')
            )
        );
        $this->set_font_size(9);
        $this->create_table($signatures_rows, $column_styles);
    }
}