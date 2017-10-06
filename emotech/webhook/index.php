<?php
$rawData = file_get_contents("php://input");
$rawData=json_decode($rawData);
if($rawData->result->parameters->Diseases!='')
{
    $Diseases=$rawData->result->parameters->Diseases;

    if($Diseases=='Diarrhoea')
    {
        $text = '<li><input type="checkbox" name="diarrhoea[]" value="Stomach Ache"> Stomach Ache</li>';
        $text .= '<li><input type="checkbox" name="diarrhoea[]" value="Nausea"> Nausea</li>';
        $text .= '<li><input type="checkbox" name="diarrhoea[]" value="Vomiting"> Vomiting</li>';
        $text .= '<li><input type="checkbox" name="diarrhoea[]" value="Fever"> Fever</li>';
        $text .= '<li><input type="checkbox" name="diarrhoea[]" value="Cramping/Bloating"> Cramping/Bloating</li>';
        $text .= '<li><input type="checkbox" name="diarrhoea[]" value="Thin or Loose Stool(Bowler Movement)"> Thin or Loose Stool(Bowler Movement)</li>';
        $text .= '<li><input type="checkbox" name="diarrhoea[]" value="Sudden Weight Loss"> Sudden Weight Loss</li>';
    }
    else if($Diseases=='Malaria')
    {
    	$text = '<li><input type="checkbox" name="malaria[]" value="Fever Up-to 100.4 F Or Above"> Fever Up-to 100.4 F Or Above</li>';
        $text .= '<li><input type="checkbox" name="malaria[]" value="Vomiting"> Vomiting</li>';
        $text .= '<li><input type="checkbox" name="malaria[]" value="Sweating"> Sweating</li>';
        $text .= '<li><input type="checkbox" name="malaria[]" value="Muscle And Body Pain"> Muscle And Body Pain</li>';
        $text .= '<li><input type="checkbox" name="malaria[]" value="Severe Headache"> Severe Headache</li>';
    }
    else if($Diseases=='Typhoid')
    {
    	$text = '<li><input type="checkbox" name="typhoid[]" value="Fever Slowly Starting And Then Speeds Up As High As 104.9 F"> Fever Slowly Starting And Then Speeds Up As High As 104.9 F</li>';
        $text .= '<li><input type="checkbox" name="typhoid[]" value="Headaches"> Headaches</li>';
        $text .= '<li><input type="checkbox" name="typhoid[]" value="Weakness/Fatigue"> Weakness/Fatigue</li>';
        $text .= '<li><input type="checkbox" name="typhoid[]" value="Abdominal Pain"> Abdominal Pain</li>';
        $text .= '<li><input type="checkbox" name="typhoid[]" value="Rash"> Rash</li>';
        $text .= '<li><input type="checkbox" name="typhoid[]" value="Muscle Pain"> Muscle Pain</li>';
        $text .= '<li><input type="checkbox" name="typhoid[]" value="Dry Cough"> Dry Cough</li>';
        $text .= '<li><input type="checkbox" name="typhoid[]" value="Diarrhoea/Constipation"> Diarrhoea/Constipation</li>';
    }
    else if($Diseases=='Diabetes')
    {
    	$text = '<li><input type="checkbox" name="diabetes[]" value="Frequent Urination"> Frequent Urination</li>';
        $text .= '<li><input type="checkbox" name="diabetes[]" value="Hunger"> Hunger</li>';
        $text .= '<li><input type="checkbox" name="diabetes[]" value="Thirsty Than Usual"> Thirsty Than Usual</li>';
        $text .= '<li><input type="checkbox" name="diabetes[]" value="Sudden Weight Loss/Weight Gain"> Sudden Weight Loss/Weight Gain</li>';
        $text .= '<li><input type="checkbox" name="diabetes[]" value="Blurred Vision"> Blurred Vision</li>';
        $text .= '<li><input type="checkbox" name="diabetes[]" value="Skin Itching"> Skin Itching</li>';
        $text .= '<li><input type="checkbox" name="diabetes[]" value="Oral Problems"> Oral Problems</li>';
    }
    else if($Diseases=='Blood Pressure')
    {
    	$text = '<li><input type="checkbox" name="blood_pressure[]" value="Severe Headache"> Severe Headache</li>';
        $text .= '<li><input type="checkbox" name="blood_pressure[]" value="Blurred Vision"> Blurred Vision</li>';
        $text .= '<li><input type="checkbox" name="blood_pressure[]" value="Chest Pain"> Chest Pain</li>';
        $text .= '<li><input type="checkbox" name="blood_pressure[]" value="Shortness in Breath"> Shortness in Breath</li>';
        $text .= '<li><input type="checkbox" name="blood_pressure[]" value="Dizziness"> Dizziness</li>';
        $text .= '<li><input type="checkbox" name="blood_pressure[]" value="Nausea"> Nausea</li>';
        $text .= '<li><input type="checkbox" name="blood_pressure[]" value="Vomiting"> Vomiting</li>';
    }
    else if($Diseases=='Heart Disease')
    {
    	$text = '<li><input type="checkbox" name="heart_disease[]" value="Shortness Of Breath"> Shortness Of Breath</li>';
        $text .= '<li><input type="checkbox" name="heart_disease[]" value="Fast Heartbeat"> Fast Heartbeat</li>';
        $text .= '<li><input type="checkbox" name="heart_disease[]" value="Heartburn"> Heartburn</li>';
        $text .= '<li><input type="checkbox" name="heart_disease[]" value="Indigestion"> Indigestion</li>';
        $text .= '<li><input type="checkbox" name="heart_disease[]" value="Pressure Or Heaviness In Chest And Arm"> Pressure Or Heaviness In Chest And Arm</li>';
        $text .= '<li><input type="checkbox" name="heart_disease[]" value="Extreme Weakness Or Anxiety"> Extreme Weakness Or Anxiety</li>';
    }
    else if($Diseases=='Swine Flu')
    {
    	$text = '<li><input type="checkbox" name="swine_flu[]" value="chills"> chills</li>';
        $text .= '<li><input type="checkbox" name="swine_flu[]" value="Fever"> Fever</li>';
        $text .= '<li><input type="checkbox" name="swine_flu[]" value="Coughing"> Coughing</li>';
        $text .= '<li><input type="checkbox" name="swine_flu[]" value="Sore throat"> Sore throat</li>';
        $text .= '<li><input type="checkbox" name="swine_flu[]" value="Runny or stuffy nose"> Runny or stuffy nose</li>';
        $text .= '<li><input type="checkbox" name="swine_flu[]" value="Body aches"> Body aches</li>';
        $text .= '<li><input type="checkbox" name="swine_flu[]" value="Fatigue"> Fatigue</li>';
        $text .= '<li><input type="checkbox" name="swine_flu[]" value="Diarrhoea"> Diarrhoea</li>';
        $text .= '<li><input type="checkbox" name="swine_flu[]" value="Nausea and Vomiting"> Nausea and Vomiting</li>';
    }
    else if($Diseases=='Jaundice')
    {
    	$text = '<li><input type="checkbox" name="jaundice[]" value="Yellow tinge to the skin and the whites of the eyes, normally starting at the head and spreading down the body"> Yellow tinge to the skin and the whites of the eyes, normally starting at the head and spreading down the body</li>';
        $text .= '<li><input type="checkbox" name="jaundice[]" value="Pruritis (itchiness)"> Pruritis (itchiness)</li>';
        $text .= '<li><input type="checkbox" name="jaundice[]" value="Fatigue"> Fatigue</li>';
        $text .= '<li><input type="checkbox" name="jaundice[]" value="Abdominal pain - typically indicates a blockage of the bile duct"> Abdominal pain - typically indicates a blockage of the bile duct</li>';
        $text .= '<li><input type="checkbox" name="jaundice[]" value="Weight loss"> Weight loss</li>';
        $text .= '<li><input type="checkbox" name="jaundice[]" value="Vomiting"> Vomiting</li>';
        $text .= '<li><input type="checkbox" name="jaundice[]" value="Fever"> Fever</li>';
        $text .= '<li><input type="checkbox" name="jaundice[]" value="Paler than usual stools"> Paler than usual stools</li>';
        $text .= '<li><input type="checkbox" name="jaundice[]" value="Dark urine"> Dark urine</li>';
    }
    else if($Diseases=='Dengue')
    {
    	$text = '<li><input type="checkbox" name="dengue[]" value="Severe joint and muscle pain"> Severe joint and muscle pain</li>';
        $text .= '<li><input type="checkbox" name="dengue[]" value="Swollen lymph nodes"> Swollen lymph nodes</li>';
        $text .= '<li><input type="checkbox" name="dengue[]" value="Headache"> Headache</li>';
        $text .= '<li><input type="checkbox" name="dengue[]" value="Fever"> Fever</li>';
        $text .= '<li><input type="checkbox" name="dengue[]" value="Exhaustion"> Exhaustion</li>';
        $text .= '<li><input type="checkbox" name="dengue[]" value="Rash"> Rash</li>';
    }
    else if($Diseases=='Breast Cancer')
    {
    	$text = '<li><input type="checkbox" name="breast_cancer[]" value="Breast discomfort"> Breast discomfort</li>';
        $text .= '<li><input type="checkbox" name="breast_cancer[]" value="Inverted nipple"> Inverted nipple</li>';
        $text .= '<li><input type="checkbox" name="breast_cancer[]" value="Lumps, or Nipple discharge"> Lumps, or Nipple discharge</li>';
        $text .= '<li><input type="checkbox" name="breast_cancer[]" value="Redness"> Redness</li>';
        $text .= '<li><input type="checkbox" name="breast_cancer[]" value="Swollen lymph nodes"> Swollen lymph nodes</li>';
    }
    $text1 ='<p>You might have '.$Diseases.', please confirm bellow symptoms for further reference.</p>'.$text;
    $result=["speech"=> $text1, "displayText"=> $text1];
    echo json_encode($result);
}
?>