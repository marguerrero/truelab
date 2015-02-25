<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class PDF extends TCPDF
{
    function __construct()
    {
        parent::__construct();

        // defaults
        $this->SetFont('helvetica', '', 10);
        $this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        // initial page
        $this->AddPage();
    }

    public function Header()
    {
        $this->Image('http://localhost/truelab/web/images/logo.png', 10, 10, 60, '', 'PNG', '', 'T', true, 300, '', false, false, 0, false, false, false);
    }

    public function create_table($rows, $column_styles = array())
    {
        foreach($rows as $row_index => $row_data) 
        {
            foreach($row_data as $column_index => $column_data) 
            {  
                // column level style
                $column_width = (isset($column_styles[$column_index]['width'])) ? $column_styles[$column_index]['width'] : 30;

                $this->SetFont('helvetica', (isset($column_styles[$column_index]['font_style'])) ? $column_styles[$column_index]['font_style'] : '', 10);

                $text_align = (isset($column_styles[$column_index]['text_align'])) ? $column_styles[$column_index]['text_align'] : 'L';

                $border = (isset($column_styles[$column_index]['border'])) ? $column_styles[$column_index]['border'] : '';

                $height = (isset($column_styles[$column_index]['height'])) ? $column_styles[$column_index]['height'] : 10;

                // cell specific style
                if(isset($column_data['style']))
                {
                    $style = $column_data['style'];
                    // $column_width = (isset($style['width'])) ? $style['width'] : $column_width;

                    $this->SetFont('helvetica', (isset($style['font_style'])) ? $style['font_style'] : '', 10);

                    $text_align = (isset($style['text_align'])) ? $style['text_align'] : $text_align;

                    $border = (isset($style['border'])) ? $style['border'] : $border;

                    $height = (isset($style['height'])) ? $style['height'] : $height;
                }

                $this->MultiCell($column_width, $height, $column_data['text'], $border, $text_align, false, 0, $this->GetX(), '', true, 0); 
            }

            $this->Ln();

            if(ceil($this->GetY()) >= 260)
            {
                $this->AddPage();
            }
        }
    }

    public function to_file($filename = 'TRUELAB_EXPORT.pdf')
    {
        $this->Output($filename, 'I');
    }
}