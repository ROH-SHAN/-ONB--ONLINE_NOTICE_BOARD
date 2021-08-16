<?php 
extract($_POST);
if(isset($add))
{

	if($details=="" || $sub=="" || $user=="")
	{
	$err="<font color='red'>FILL ALL THE FIELDS FIRST :(</font>";	
	}
	else
	{
		foreach($user as $v)
		{
mysqli_query($conn,"insert into notice values('','$v','$sub','$details',now())");
		}
		
		$err="<font color='green'>Message Sent Successfully :)</font>";	
	}
}

?>
<h2><font face='Cascadia Code'>NEW NOTICE<br></br></font></h2>
<form method="post">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row">
		<div class="col-sm-4"><font size='4'>_Enter Subject_</font></div>
		<div class="col-sm-3">
		<input type="text" name="sub" class="form-control"/></div>
	</div>
	<br></br>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
	</div>	
	
	<div class="row">
		<div class="col-sm-4"><font size='4'>___Enter Message___</font></div>
		<div class="col-sm-5">
		<textarea name="details" class="form-control"></textarea></div>
	</div>
	<br></br>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
	</div>	
	
	<div class="row">
		<div class="col-sm-4"><font size='4'>_____Choose User_____</font></div>
		<div class="col-sm-3">
		<select name="user[]" multiple="multiple" class="form-control">
			<?php 
	$sql=mysqli_query($conn,"select name,email from user");
	while($r=mysqli_fetch_array($sql))
	{
		echo "<option value='".$r['email']."'>".$r['name']."</option>";
	}
			?>
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
	</div>	
		
		<div class="row" style="margin-top:10px">
		<div class="col-sm-4"></div>
		<div class="col-sm-3">
		<br></br>
		<input type="submit" value="SEND" name="add" class="btn btn-success"/>
		<input type="reset" value="NEW" class="btn btn-success"/>
		</div>
	</div>
</form>