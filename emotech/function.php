<?php
ob_start();
include("connection.php");
//admin login
class Controller extends Connection
{
	function addResister($patient_name, $patient_mobile, $patient_age)
	{
		$visitor_ip = $_SERVER['REMOTE_ADDR'];
		$qry="SELECT * from patient_register where patient_mobile=$patient_mobile";
		$this->ExecQuery($qry);
		$row=$this->FetchResult();
		$num_rows = $this->numRows();
		if($num_rows>0 && $row['patient_mobile']==$patient_mobile)
		{

		}
		else
		{
			$qry="INSERT INTO patient_register set patient_name='$patient_name', patient_mobile='$patient_mobile', ip='$visitor_ip', patient_age='$patient_age', created_date=NOW()";
			$sql=$this->ExecQuery($qry);// Execute query or die if error is occured
			if(!$sql)
			{
				$result = array('error' => 'Query Failed');
			}
			if($sql>0)
			{
				return true;
			}
		}
	}
}
?>
