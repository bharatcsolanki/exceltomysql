<?php

	//This is the name of your server where the MySQL database is running
	$dbserver="localhost";
	
	//username of the MySQL server
	$dbusername="root";
	//$dbusername="root";
	
	//password
	$dbpassword="";
	//$dbpassword="";
	
	//database name of the online Examination system
	$dbname="exceltomysql";
	
	$conn = mysql_connect($dbserver,$dbusername,$dbpassword);
	mysql_select_db ($dbname, $conn);
	
	// PHP code For Excle To MySQL Using PHP

if (isset($_REQUEST['imgfile'])) 
{


			// excel file verification code 
			
			$flage=0;
			
			if (($_FILES["file"]["type"] == "application/vnd.ms-excel"))
			{
					if ($_FILES["file"]["error"] > 0)
					{
							   echo"<script language='javascript' type='text/javascript'>";
									echo"alert('Return Code: ".$_FILES["file"]["error"]."')";
								echo"</script>";
								$flage=1;
					}
					else
					{
					  echo"<script language='javascript' type='text/javascript'>";
		echo"alert('File Name: ".$_FILES["file"]["name"]." Size: ". ($_FILES["file"]["size"] / 1024) ." Kb')";		
					  echo"</script>";
		
								if(file_exists($_FILES["file"]["name"]))
								{
										 echo"<script language='javascript' type='text/javascript'>";
											echo"alert('".$_FILES["file"]["name"]." is already exists. ')";
										 echo"</script>";
										 $flage=1;	              				
								}
								else
								{
										move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
								}
					}
			}
			else
			{
									 echo"<script language='javascript' type='text/javascript'>";
													echo"alert('Invalid file')";
									 echo"</script>";
									  $flage=1;		
			}
			
			
			if($flage==0)
			{

						// Reading From Excel File
						
						$excelfile=$_FILES["file"]["name"];
						
						require_once('excel_reader.php');
						$xls = new Spreadsheet_Excel_Reader();
						$xls->read($excelfile);	// replace with your excel file			
						$no_of_columns = $xls->sheets[0]['numCols']; 
						$no_of_rows = $xls->sheets[0]['numRows'];	
						
						
						
						
						
						for($r=1; $r<= $no_of_rows; $r++) 
						{																
							$cell1=$xls->sheets[0]['cells'][$r][1];																
							$cell2=$xls->sheets[0]['cells'][$r][2];
							$cell3=$xls->sheets[0]['cells'][$r][3];										
							$cell4=$xls->sheets[0]['cells'][$r][4];										
							$cell5=$xls->sheets[0]['cells'][$r][5];																																									
							$cell6=$xls->sheets[0]['cells'][$r][6];																		
							$cell7=$xls->sheets[0]['cells'][$r][7];	
							
$query = "insert into tab values('".$cell1."','".$cell2."','".$cell3."','".$cell4."','".$cell5."','".$cell6."','".$cell7."')";

			
							mysql_query($query);
		

						}	
						
						

			}
			
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Excel To MySQL Using PHP</title>
</head>

<body>
		<br />
          <hr />
		  	<center><span style="font-size:30px">Excel To MySQL Using PHP</span></center>
            <hr />
		  <br />  <br />
			     <form name="main" action="index.php" method='post' enctype="multipart/form-data">
					 <center><span style="font-size:20px">Browse From Excel File </span>&nbsp;&nbsp;:&nbsp;&nbsp;	<input type="file" name="file" id="file"  /></center>

		    		 <br />
                     					<hr />
					 <center><input  type="submit" name="imgfile" id="imgfile" value="Import File" /></center>
                     					<hr />
			  	     <br />
			     </form>

		    		 <br />
                     					<hr />
					 <center><h2>MySQL Table Data</h2></center>
                     					<hr />
			  	     <br />

                 
                              
                 <?php
				 	
				 	 $query = "select * from tab";				 
					 $res=mysql_query($query);
				 
					if(mysql_fetch_array($res))
					{
				?>
                	
                    
                   <table border="1" cellpadding="0" cellspacing="0">
                         <tr>
                            <td>col1</td>
                            <td>col2</td>
                            <td>col3</td>
                            <td>col4</td>                 
                            <td>col5</td>
                            <td>col6</td>                                        
                            <td>col7</td>                    
                        </tr>  
                
                <?php	
					}
					else
					{
						echo "<center>No Data Found</center>";
					}				 
				 
				 
				 
				 while($row=mysql_fetch_array($res))
				 {
				 	echo "<tr>";
					
					echo "<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$row[3]</td>                 
						<td>$row[4]</td>
						<td>$row[5]</td>                                        
						<td>$row[6]</td>";
						
					echo "</tr>";	
				 }			 		
				 ?>
                 
                 </table>

</body>
</html>
