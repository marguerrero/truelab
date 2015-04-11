<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tests extends MX_Controller {
    //-- Radiology PDF Template
    public function radiology(){
        $fullname = "Guerrero, Reymar Clabesillas";
        $age_sex = "23/M"; 
        $date_released = date('Y-m-d');
        $physician = "Sample DR";
        $bday = "01/01/2015";
        $case_no = "TEST0982134";
        $source = "RG";
        $date_recv = date('Y-m-d');
        $prof_pic = "1427731819-87868-agent.png";
        $result_1 = "There is no evidence of active parenchymal Inflitrates";
        $result_2 = "Heart is not enlarged";
        $result_3 = "Aorta is not enlarged";
        $result_4 = "Trachea, diaphragm and sulci are intact.";

        $html = "<br />
            <h1>CHEST PA VIEW</h1>
            <p>$result_1</p>
            <p>$result_2</p>
            <p>$result_3</p>
            <p>$result_4</p>
            <h2>Impression</h2>
            <h2>$result_5</h2>
        ";
        $template = new RadiologyTemplate("Radiology", $html);
        $template->set_name($fullname);
        $template->set_age_sex($age_sex);
        $template->set_date($date_released);
        $template->set_physician($physician);
        $template->set_dob($bday);
        $template->set_case_no($case_no);
        $template->set_source($source);
        $template->set_date_received($date_recv);
        $template->set_date_released(date('m-d-Y h:i A'));
        $template->set_user_pic($prof_pic);
        $template->build();
        ob_end_clean();
        $template->to_file($filename);
    }

    //-- Ultrasound PDF Template
    public function ultrasound(){
        $html = "<br />";
        $fullname = "Guerrero, Reymar Clabesillas";
        $age_sex = "23/M"; 
        $date_released = date('Y-m-d');
        $physician = "Sample DR";
        $bday = "01/01/2015";
        $case_no = "TEST0982134";
        $source = "RG";
        $date_recv = date('Y-m-d');
        $prof_pic = "1427731819-87868-agent.png";

        $template = new RadiologyTemplate("Ultrasound", $html);
        $template->set_name($fullname);
        $template->set_age_sex($age_sex);
        $template->set_date($date_released);
        $template->set_physician($physician);
        $template->set_case_no($case_no);
        $template->set_dob($bday);
        $template->set_source($source);
        $template->set_date_received($date_recv);
        $template->set_date_released(date('m-d-Y h:i A'));
        $template->build();
        ob_end_clean();
        $template->to_file($filename);
    }

    //-- Hematology PDF Template
    public function hematology(){
        $fullname = "Guerrero, Reymar Clabesillas";
        $age_sex = "23/M"; 
        $date_released = date('Y-m-d');
        $physician = "Sample DR";
        $bday = "01/01/2015";
        $case_no = "TEST0982134";
        $source = "RG";
        $date_recv = date('Y-m-d');
        $prof_pic = "1427731819-87868-agent.png";
        $medtech = "TEST";

        $result_1 = "result";
        $result_2 = "result";
        $result_3 = "result";
        $result_4 = "result";
        $result_5 = "result";
        $result_6 = "result";
        $result_7 = "result";
        $result_8 = "result";
        $result_9 = "result";
        $result_10 = "result";
        $result_11 = "result";
        $result_12 = "result";
        $result_13 = "result";
        $result_14 = "result";
        $result_15 = "result";
        $result_16 = "result";

        $template = new HematologyTemplate();
        $template->set_name($fullname);
        $template->set_age_sex($age_sex);
        $template->set_date($date_released);
        $template->set_physician($physician);
        $template->set_dob($bday);
        $template->set_case_no($case_no);
        $template->set_source($source);
        $template->set_date_received($date_recv);
        $template->set_date_released(date('m-d-Y h:i A'));
        $template->set_wbc($result_1);
        $template->set_neutrophils($result_11);
        $template->set_hemoglobin($result_2);
        $template->set_lymphocytes($result_12);
        $template->set_hematocrit($result_3);
        $template->set_monocytes($result_13);
        $template->set_rbc($result_4);
        $template->set_eosinophils($result_14);
        $template->set_mcv($result_5);
        $template->set_stabs($result_15);
        $template->set_mch($result_6);
        $template->set_mchc($result_7);
        $template->set_rdws($result_8);
        $template->set_mpv($result_9);
        $template->set_platelet_count($result_10);
        $template->set_remarks($result_16);
        $template->set_left_signature($medtech, 'Medical technologist');
        $template->build();
        ob_end_clean();
        $template->to_file($filename);
    }

    //-- Miscellaneous PDF Template
    public function miscellaneous(){
        $fullname = "Guerrero, Reymar Clabesillas";
        $age_sex = "23/M"; 
        $date_released = date('Y-m-d');
        $physician = "Sample DR";
        $bday = "01/01/2015";
        $case_no = "TEST0982134";
        $source = "RG";
        $date_recv = date('Y-m-d');
        $prof_pic = "1427731819-87868-agent.png";
        $medtech = "TEST";
        $test = "TEST";
        $result = "RESULT";
        $template = new MiscellaneousTemplate($test, $result);
        $template->set_name($fullname);
        $template->set_age_sex($age_sex);
        $template->set_date($date_released);
        $template->set_dob($bday);
        $template->set_physician($physician);
        $template->set_case_no($case_no);
        $template->set_source($source);
        $template->set_date_received($date_recv);
        $template->set_date_released(date('m-d-Y h:i A'));
        if(strtolower($service) == "hbsag"){
            $template->set_user_pic($prof_pic);
        }
        $template->set_left_signature($medtech, 'Medical technologist');
        $template->build();
        ob_end_clean();
        $template->to_file($filename);
    }

    //-- Urinalysis PDF Template
    public function urinalysis(){
        $fullname = "Guerrero, Reymar Clabesillas";
        $age_sex = "23/M"; 
        $date_released = date('Y-m-d');
        $physician = "Sample DR";
        $bday = "01/01/2015";
        $case_no = "TEST0982134";
        $source = "RG";
        $date_recv = date('Y-m-d');
        $prof_pic = "1427731819-87868-agent.png";
        $medtech = "TEST";

        $result_1 = "result";
        $result_2 = "result";
        $result_3 = "result";
        $result_4 = "result";
        $result_5 = "result";
        $result_6 = "result";
        $result_7 = "result";
        $result_8 = "result";
        $result_9 = "result";
        $result_10 = "result";
        $result_11 = "result";
        $result_12 = "result";
        $result_13 = "result";
        $result_14 = "result";
        $result_15 = "result";
        $result_16 = "result";
        $result_17 = "result";
        $result_18 = "result";
        $result_19 = "result";
        $result_20 = "result";
        $result_21 = "result";
        $result_22 = "result";

        $template = new UrinalysisTemplate();
        $template->set_name($fullname);
        $template->set_age_sex($age_sex);
        $template->set_date($date_released);
        $template->set_dob($bday);
        $template->set_physician($physician);
        $template->set_case_no($case_no);
        $template->set_source($source);
        $template->set_date_received($date_recv);
        $template->set_date_released(date('m-d-Y h:i A'));
        $template->set_color($result_1);
        $template->set_clarity($result_2);
        $template->set_protein($result_3);
        $template->set_glucose($result_4);
        $template->set_ph($result_5);
        $template->set_sp_gravity($result_6);
        $template->set_wbc($result_7);
        $template->set_rbc($result_8);
        $template->set_epith_cells($result_9);
        $template->set_mucus_threads($result_10);
        $template->set_bacteria($result_11);
        $template->set_a_urates($result_12);
        $template->set_fine($result_13);
        $template->set_coarse($result_14);
        $template->set_hyaline($result_15);
        $template->set_others($result_16);
        $template->set_left_signature($medtech, 'Medical Technologist');
        $template->build();
        ob_end_clean();
        $template->to_file($filename);
    }

    //--Clinical Chemistry PDF Template
    public function clinicalChemistry(){
        $fullname = "Guerrero, Reymar Clabesillas";
        $age_sex = "23/M"; 
        $date_released = date('Y-m-d');
        $physician = "Sample DR";
        $bday = "01/01/2015";
        $case_no = "TEST0982134";
        $source = "RG";
        $date_recv = date('Y-m-d');
        $prof_pic = "1427731819-87868-agent.png";
        $medtech = "TEST";

        $result_1 = "result";
        $result_2 = "result";
        $result_3 = "result";
        $result_4 = "result";
        $result_5 = "result";
        $result_6 = "result";
        $result_7 = "result";
        $result_8 = "result";
        $result_9 = "result";
        $result_10 = "result";
        $result_11 = "result";
        $result_12 = "result";
        $result_13 = "result";
        $result_14 = "result";
        $result_15 = "result";
        $result_16 = "result";
        $result_17 = "result";
        $result_18 = "result";
        $result_19 = "result";
        $result_20 = "result";
        $result_21 = "result";
        $result_22 = "result";

        $template = new ClinicalChemistryTemplate();
        $template->set_name($fullname);
        $template->set_age_sex($age_sex);
        $template->set_date($date_released);
        $template->set_dob($bday);
        $template->set_physician($physician);
        $template->set_case_no($case_no);
        $template->set_source($source);
        $template->set_date_received($date_recv);
        $template->set_date_released(date('m-d-Y h:i A'));
        $template->set_fbs($result_1);
        $template->set_hbalc($result_2);
        $template->set_creatinine($result_3);
        $template->set_bun($result_4);
        $template->set_bua($result_5);
        $template->set_cholesterol($result_6);
        $template->set_triglyceride($result_7);
        $template->set_hdl($result_8);
        $template->set_ldl($result_9);
        $template->set_sgot($result_10);
        $template->set_sgpt($result_11);
        $template->set_alk_phosphatase($result_12);
        $template->set_total_bilirubin($result_13);
        $template->set_indirect_bil($result_14);
        $template->set_direct_bil($result_15);
        $template->set_total_protein($result_16);
        $template->set_a_g_ratio($result_17);
        $template->set_potassium($result_18);
        $template->set_sodium($result_19);
        $template->set_total_calcium($result_20);
        $template->set_chloride($result_21);
        $template->set_others($result_22);
        $template->set_left_signature($medtech, 'Medical technologist');
        $template->build();
        ob_end_clean();
        $template->to_file($filename);
    }

    //-- Fecalysis PDF Template
    public function fecalysis(){
        $fullname = "Guerrero, Reymar Clabesillas";
        $age_sex = "23/M"; 
        $date_released = date('Y-m-d');
        $physician = "Sample DR";
        $bday = "01/01/2015";
        $case_no = "TEST0982134";
        $source = "RG";
        $date_recv = date('Y-m-d');
        $prof_pic = "1427731819-87868-agent.png";
        $medtech = "TEST";

        $result_1 = "result";
        $result_2 = "result";
        $result_3 = "result";
        $result_4 = "result";
        $result_5 = "result";
        $result_6 = "result";
        
        $template = new FecalysisTemplate();
        $template->set_name($fullname);
        $template->set_age_sex($age_sex);
        $template->set_date($date_released);
        $template->set_dob($bday);
        $template->set_physician($physician);
        $template->set_case_no($case_no);
        $template->set_source($source);
        $template->set_date_received($date_recv);
        $template->set_date_released(date('m-d-Y h:i A'));
        $template->set_color($result_1);
        $template->set_consistency($result_2);
        $template->set_while_blood_cells($result_3);
        $template->set_red_blood_cells($result_4);
        $template->set_occult_blood($result_5);
        $template->set_amoeba_result($result_6);
        $template->set_left_signature($medtech, 'Medical technologist');
        $template->build();
        ob_end_clean();
        $template->to_file($filename);
    }
}