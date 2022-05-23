<?php
	session_start();
?>
<html>
	<head>
		<title>Add Train Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Submit']))
			{
				$data_missing=array();
				if(empty($_POST['train_id']))
				{
					$data_missing[]='Train ID';
				}
				else
				{
					$train_id=trim($_POST['train_id']);
				}

				if(empty($_POST['train_type']))
				{
					$data_missing[]='Train Type';
				}
				else
				{
					$train_type=$_POST['train_type'];
				}

				if(empty($_POST['train_capacity']))
				{
					$data_missing[]='Train Capacity';
				}
				else
				{
					$train_capacity=$_POST['train_capacity'];
				}

				if(empty($data_missing))
				{
					require_once('Database Connection file/mysqli_connect.php');
					$query="INSERT INTO Train_Details (train_id,train_type,total_capacity,active) VALUES (?,?,?,'Yes')";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"ssi",$train_id,$train_type,$train_capacity);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					//echo $affected_rows."<br>";
					// mysqli_stmt_bind_result($stmt,$cnt);
					// mysqli_stmt_fetch($stmt);
					// echo $cnt;
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					/*
					$response=@mysqli_query($dbc,$query);
					*/
					if($affected_rows==1)
					{
						echo "Successfully Submitted";
						header("location: add_train_details.php?msg=success");
					}
					else
					{
						echo "Submit Error";
						echo mysqli_error();
						header("location: add_jtrain_details.php?msg=failed");
					}
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>