<?php
session_start();
include_once('config.php');
$todate=date('Y-m-d H:i:s');

function generateSeoURL($string, $wordLimit = 50){
    $separator = '-';
    
    if($wordLimit != 0){
        $wordArr = explode(' ', $string);
        $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
    }

    $quoteSeparator = preg_quote($separator, '#');

    $trans = array(
        '&.+?;'                    => '',
        '[^\w\d _-]'            => '',
        '\s+'                    => $separator,
        '('.$quoteSeparator.')+'=> $separator
    );

    $string = strip_tags($string);
    foreach ($trans as $key => $val){
        $string = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $string);
    }

    $string = strtolower($string);

	$san=trim(trim($string, $separator));
   
   return substr($san,0,80);

}

  function create_admin_session($admin_login, $admin_type)
	{
		session_register('admin_login');
		session_register('admin_type');
		
		$_SESSION['admin_login'] = $admin_login;
		$_SESSION['admin_type'] = $admin_type;
	}

function checkpass($username,$password)
	{
		$sql = mysql_query("SELECT * FROM admin WHERE username = '".$username."' AND password = '".$password."' AND status='1'");
		$res = mysql_fetch_array($sql);
		 $num = mysql_num_rows($sql);
	if($num>0)
	{
		
		 $_SESSION['uniq_user_id'] =  $res['id'];
		$_SESSION['admin_type'] = $res['usertype'];
	
		$_SESSION['timo']  = date("F d Y H:i:s");
		
		echo "<script>window.location='dashboard.php';</script>";
	}
	else
	{
		header("Location:index.php?msg=Wrong username or password");
	}
	}
function logout()
	{
		session_start();
		unset($_SESSION['uniq_user_id']); 
		unset($_SESSION['timo'] );
        unset($_SESSION['admin_type'] );		
 		session_unset();
		header("location:index.php?msg=You Log out successfully");
		 
		exit(0);
	}
		

	
////////////////////////////////////////////////////activate all
function actiall($colname,$tabl,$pgname) 
{ 
	$max_number =count($_POST[$colname]);
    for($i=0; $i < $max_number; $i++)
    {
        $prevl = $_POST[$colname][$i];
		$sqla = mysql_query("UPDATE ".$tabl." SET status='1' where id='".$prevl."'");
    }
	$salln = json_encode($_POST['salln']);
//	echo "<pre>";print_r($salln);echo "</pre>";die;

if($sqla!='')
{
echo "<script>location.href='".$pgname."msg=4&tbl=".$tabl."';</script>";
}
else
{
echo "<script>location.href='".$pgname."msg=555';</script>";
}
}
///////////////////////////////////////////////////deactivate all
function deactiall($colname,$tabl,$pgname) 
{
	$max_number =count($_POST[$colname]);
    for($i=0; $i < $max_number; $i++)
    {
        $prevl=$_POST[$colname][$i];
$sqla = mysql_query("UPDATE ".$tabl." SET status='0' where id='".$prevl."'");
    }
if($sqla!='')
{
echo "<script>location.href='".$pgname."msg=4';</script>";
}
else
{
echo "<script>location.href='".$pgname."msg=555';</script>";
}
}
	
/////////////////////////////////////////////////////////////		
/////////////delete all
function delall($colname,$tabl,$pgname,$delimju) 
{
	$max_number =count($_POST[$colname]);
    for($i=0; $i < $max_number; $i++)
    {
        $prevl=$_POST[$colname][$i];
		if($delimju!='')
		{
			$selects=mysql_query("SELECT * FROM ".$tabl." WHERE id='".$prevl."'");
			$getro=mysql_fetch_array($selects);
			$myArray = explode(',', $delimju);
			$maxxx =count($myArray);
			for($j=0; $j < $maxxx; $j++)
    		{
				$picfodel=$myArray[$j];
				if($getro[$picfodel]!='noimg.png')
				{
				 unlink('photos/'.$getro[$picfodel]);
				}
			}}
		
     $sqla =mysql_query("DELETE FROM ".$tabl." WHERE id='".$prevl."'");
    }
	
if($sqla!='')
{
echo "<script>location.href='".$pgname."msg=5';</script>";
}
else
{
echo "<script>location.href='".$pgname."msg=555';</script>";
}
}		
		
///////////////////////	///////////////////////////////////////////	
		



function insert_data($table,$data) {
		$sql = "INSERT INTO ".$table." SET ";
		foreach($data as $key=>$val) {
			if ($key != 'id' && $key != 'submit') {		
				$sql .= "".$key." = '".$val."',";	
			}
		}
		$sql = rtrim($sql, ',');
		$res = mysql_query($sql);
		if($res) {
			return array('flag' => 'success', 'msg' => ' added.');
		} else {
			return array('flag' => 'error', 'msg' => $sql);
		}

}

function update_data($table,$data)	{

		$sql = "UPDATE ".$table." SET ";
		foreach ($data as $key => $value) {		
			if ($key != 'id' && $key != 'upsubmit') {		
				$sql .= "".$key." = '".$value."',";	
			}		
		}
		$sql = rtrim($sql, ',');

		$sql .= " WHERE id = '".$data['id']."'";
		
		// echo $sql;exit();
		$res = mysql_query($sql);
		if($res) {
			return array('flag' => 'success', 'msg' => ' updated successfully.');
		} else {
			return array('flag' => 'error', 'msg' => 'Failed to update.');
		}
		
		
}
	
	


////////////////////////////////////////////////////////////////////////////////////

function single_delete($table,$id){
	
	$res=mysql_query("DELETE FROM ".$table." WHERE id='".$id."'");
	
		if($res) {
			return array('flag' => 'success', 'msg' => ' dELETE successfully.');
		} else {
			return array('flag' => 'error', 'msg' => 'Failed to update.');
		}

}

//////////////////////////////////////////////	///////////////////////////	

function san_category(){
	
	$str=mysql_query("select * from category where status='1'");
	
	return $str ;

}


////////////////////////////////////////////////////reply all all

function reply($colname,$tabl,$pgname,$msg) 
{ 
  include_once('mail.php');   

	$max_number =count($_POST[$colname]);
    for($i=0; $i < $max_number; $i++)
    {
        $prevl = $_POST[$colname][$i];
		$sqla = mysql_query("UPDATE ".$tabl." SET status='1' where id='".$prevl."'");
 
      $str=mysql_query("select * from ".$tabl." where id='".$prevl."'" );
      $row=mysql_fetch_array($str);
     /*
        $mail->AddAddress( $row['email'] );
        $mail->Subject = 'Reply | Tender';
        $mail->From  = 'sandeep.technohills@gmail.com';
        $mail->Body = '<tr>'.$msg.'</tr>'; 
        $mail->Send();
        $mail->ClearAddresses();
        */


   }
	$salln = json_encode($_POST['salln']);
//	echo "<pre>";print_r($salln);echo "</pre>";die;

if($sqla!='')
{
echo "<script>location.href='".$pgname."msg=1&tbl=".$tabl."';</script>";
}
else
{
echo "<script>location.href='".$pgname."msg=2';</script>";
}

}

///////////////////////////////////////////////////reply all

function san_select($table,$id,$idv){
	
	$str=mysql_query("select * from ".$table." where ".$id."='".$idv."'");
	
	return $str ;

}




function select_table_status($table,$status,$order){
	
	$str=mysql_query("select * from ".$table." where status='".$status."' ORDER BY ".$order." ASC");
	
	return $str ;

}



function select_table_status_DESC($table,$status,$order){
	
	$str=mysql_query("select * from ".$table." where status='".$status."' ORDER BY ".$order." DESC");
	
	return $str ;

}


function select_table($table,$order){
	
	$str=mysql_query("select * from ".$table." ORDER BY ".$order." ASC");
	
	return $str ;

}



function select_table_DESC($table,$order){
	
	$str=mysql_query("select * from ".$table." ORDER BY ".$order." DESC");
	
	return $str ;

}
////////////////tender select ////////////////


function select_table_Tender($table,$status,$order){
	
	$str=mysql_query("select * from ".$table." where status='".$status."' AND last_date>='".date('Y-m-d')."' ORDER BY ".$order." DESC");
	
	return $str ;

}

/////////////////////////////// money  convert 

 function no_to_words($no)
{
    if($no == 0) {
        return ' ';

    }else {
        $n =  strlen($no); // 7
        switch ($n) {
            case 3:
                $val = $no/100;
                $val = round($val, 2);
                $finalval =  $val ." hundred";
                break;
            case 4:
                $val = $no/1000;
                $val = round($val, 2);
                $finalval =  $val ." thousand";
                break;
            case 5:
                $val = $no/1000;
                $val = round($val, 2);
                $finalval =  $val ." thousand";
                break;
            case 6:
                $val = $no/100000;
                $val = round($val, 2);
                $finalval =  $val ." lakh";
                break;
            case 7:
                $val = $no/100000;
                $val = round($val, 2);
                $finalval =  $val ." lakh";
                break;
            case 8:
                $val = $no/10000000;
                $val = round($val, 2);
                $finalval =  $val ." crore";
                break;
            case 9:
                $val = $no/10000000;
                $val = round($val, 2);
                $finalval =  $val ." crore";
                break;

            default:
                echo "";
        }
        return $finalval;

    }
	
}



///////////////////////////////////////end money convert 


function convertCurrency($number)
{
    // Convert Price to Crores or Lakhs or Thousands
    $length = strlen($number);
    $currency = '';

    if($length == 4 || $length == 5)
    {
        // Thousand
        $number = $number / 1000;
        $number = round($number,2);
        $ext = "Thousand";
        $currency = $number." ".$ext;
    }
    elseif($length == 6 || $length == 7)
    {
        // Lakhs
        $number = $number / 100000;
        $number = round($number,2);
        $ext = "Lac";
        $currency = $number." ".$ext;

    }
    elseif($length == 8 || $length == 9)
    {
        // Crores
        $number = $number / 10000000;
        $number = round($number,2);
        $ext = "Cr";
        $currency = $number.' '.$ext;
    }
	
	elseif($length == 10 || $length == 11)
    {
        // Crores
        $number = $number / 10000000;
        $number = round($number,3);
        $ext = "Cr";
        $currency = $number.' '.$ext;
    }

	elseif($length == 12 || $length == 13)
    {
        // Crores
        $number = $number / 10000000;
        $number = round($number,4);
        $ext = "Cr";
        $currency = $number.' '.$ext;
    }
       
	   elseif($length == 14 || $length == 15)
    {
        // Crores
        $number = $number / 10000000;
        $number = round($number,5);
        $ext = "Cr";
        $currency = $number.' '.$ext;
    }
	   elseif($length == 16 || $length == 17)
    {
        // Crores
        $number = $number / 10000000;
        $number = round($number,6);
        $ext = "Cr";
        $currency = $number.' '.$ext;
    }
	
	
	
    return $currency;


}





?>