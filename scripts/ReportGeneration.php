<?php
/**
* ReportGeneration - class used to exporting of data to excel file
* Date Added : 2014-05-07
*
* @package 
* @subpackage class
* @author reymar.guerrero@concentrix.com
*/
// include '../phpexcel/PHPExcel.php';

class ReportGeneration
{
    protected $PHPExcel;
    protected $PHPExcelObj;
    protected $reports;
    protected $config;

    /**
     * __construct : magic method, construct dependency injejction for ReportGeneration class
     *
     * @param Array
     * @param Array
     * @param PHPExcelObject
     */

    public function __construct(Array $reports, Array $config)
    {
        $this->PHPExcel = new PHPExcel();
        $this->PHPExcelObj = new PHPExcel();
        $this->reports  = $reports;
        $this->config = $config;
    }

    /**
     * download:
     *          -exports data to excel file based on the referenced data (reports, config, and phpexcel object), 
     *          -you may retrieve the excel file on the referenced directory and filename
     * @return null
     */
    public function generate()
    {
        
        $top_row = 1;
        $top_col = 0;
        $footer_row = 0;

        //-- Checks if the referenced config has values for upper area
        //-- Generate the upper area for excel file
        if(array_key_exists('upper_area', $this->config))
        {
            foreach($this->config['upper_area'] as $val)
            {
                $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($top_col, $top_row, $val['label']);
                $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($top_col + 1, $top_row, $val['value']);
                $top_row++;
            }
            $top_row++;
        }

        //-- Generates the header for the grid 
        foreach($this->config['header'] as $val)
        {
            $this->PHPExcelObj->getActiveSheet()
                ->getStyleByColumnAndRow($top_col, $top_row)
                ->getFont()
                ->getColor()
                ->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);
            $this->PHPExcelObj->getActiveSheet()
                ->getStyleByColumnAndRow($top_col, $top_row)
                ->getFill()
                ->applyFromArray(array(
                        'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '0066CC')
                    )
                );
            

            $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($top_col, $top_row, $val);
            $top_col++;
        }
        $top_row++;

        
        //-- Generate cell values based on the referenced report data
        foreach($this->reports as $row => $val_array)
        {
            $col = 0;
            foreach($val_array as $colname => $val)
            {
                $this->PHPExcelObj->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
                $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($col, $row + $top_row, $this->reports[$row][$colname]);
                $col++;
            }
        }
        
        //-- Generate lower area of the generated excel file
        if(array_key_exists('lower_area', $this->config))
        {
            $footer_col = 0;
            $footer_row += $row + $top_row + 2;
            foreach($this->config['lower_area'] as $val)
            {
                $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($footer_col, $footer_row, $val['label']);
                $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($footer_col + 1, $footer_row, $val['value']);
                $top_row++;
            }
            $footer_row++;
        }
        $this->PHPExcelObj->getDefaultStyle()
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        // $writer = $this->PHPExcel->createWriter($this->PHPExcelObj, 'Excel5');
        $writer = new PHPExcel_Writer_Excel5($this->PHPExcelObj);
        $writer->save($this->config['directory']."/".$this->config['filename']);
        return true;
    }

    public function generateMultipleTab(){
        foreach ($this->reports as $report_key => $report_value) {
            if($report_key)
                $this->PHPExcelObj->createSheet($report_key);
            $this->PHPExcelObj->setActiveSheetIndex($report_key);
            $this->PHPExcelObj->getActiveSheet()->setTitle($this->config['title'][$report_key]);
            $top_row = 1;
            $top_col = 0;
            $footer_row = 0;

            //-- Checks if the referenced config has values for upper area
            //-- Generate the upper area for excel file
            if(array_key_exists('upper_area', $this->config))
            {
                foreach($this->config['upper_area'] as $val)
                {
                    $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($top_col, $top_row, $val['label']);
                    $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($top_col + 1, $top_row, $val['value']);
                    $top_row++;
                }
                $top_row++;
            }

            //-- Generates the header for the grid 
            foreach($this->config['header'][$report_key] as $val)
            {
                $this->PHPExcelObj->getActiveSheet()
                    ->getStyleByColumnAndRow($top_col, $top_row)
                    ->getFont()
                    ->getColor()
                    ->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);
                $this->PHPExcelObj->getActiveSheet()
                    ->getStyleByColumnAndRow($top_col, $top_row)
                    ->getFill()
                    ->applyFromArray(array(
                            'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                            'color' => array('rgb' => '0066CC')
                        )
                    );
                

                $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($top_col, $top_row, $val);
                $top_col++;
            }
            $top_row++;

            
            //-- Generate cell values based on the referenced report data
            foreach($report_value as $row => $val_array)
            {
                
                $col = 0;
                foreach($val_array as $colname => $val)
                {
                    $this->PHPExcelObj->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
                    $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($col, $row + $top_row, $this->reports[$report_key][$row][$colname]);
                    $col++;
                }
            }
            
            //-- Generate lower area of the generated excel file
            if(array_key_exists('lower_area', $this->config))
            {
                $footer_col = 0;
                $footer_row += $row + $top_row + 2;
                foreach($this->config['lower_area'][$report_key] as $val)
                {
                    $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($footer_col, $footer_row, $val['label']);
                    $this->PHPExcelObj->getActiveSheet()->setCellValueByColumnAndRow($footer_col + 1, $footer_row, $val['value']);
                    $top_row++;
                }
                $footer_row++;
            }
        }

        
        $this->PHPExcelObj->getDefaultStyle()
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        // $writer = $this->PHPExcel->createWriter($this->PHPExcelObj, 'Excel5');
        $writer = new PHPExcel_Writer_Excel5($this->PHPExcelObj);
        $writer->save($this->config['directory']."/".$this->config['filename']);
        return true;
    
    }
}