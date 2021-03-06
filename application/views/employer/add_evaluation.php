<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.barrating.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/rating.js"></script>
<link href="<?php echo base_url();?>assets/css/ratingStyle.css" rel="stylesheet">

<div class='col-lg-10 col-lg-offset-1'>
<h2>Internship Evaluation</h2>
<br>
<form action="<?php echo base_url();?>index.php/administrator_controller/addEvaluation" 
	method="post" accept-charset="utf-8" onSubmit="return confirm('Are you sure?')">

	<table id="infoDiv" class="tg">
		<!--<tr>
			<td><label for="evaluationID" class="">Evaluation ID:</label></td>
			<td><input type="text" name="evaluationID" class="form-control input-sm" id="" value"" /></td>
		</tr>-->
		<tr>
			<td><label for="studentName" class="">Name of Student:</label></td>
			<td><input type="text" name="studentName" class="form-control input-sm" id="" value""/></td>
		</tr>
		<tr>
			<td><label for="department" class="">Department:</label></td>
			<td><input type="text" name="department" id="" class="form-control input-sm" value""/></td>
		</tr>
		<tr>
			<td><label for="dateFrom" class="">Date from:</label></td>
			<td><input type="text" name="dateFrom" id="" class="form-control input-sm" value""/></td>
			<td><label for="dateTo" class=""> to:</label></td>
			<td><input type="text" name="dateTo" id="" class="form-control input-sm" value""/></td>
		</tr>
		<tr>
			<td><label for="evaluatorName" class="">Name of Evaluator</label></td>
			<td><input type="text" name="evaluatorName" id="" class="form-control input-sm"  value""/></td>
		</tr>
		<tr>
			<td><label for="evaluatorPosition" class="">Position</label></td>
			<td><input type="text" name="evaluatorPosition" class="form-control input-sm" id="" value""/></td>
		</tr>
	</table>

<br/>

<div id='instructionsDiv' class="jumbotron">

		iACADEMY through the Office of External Affairs would like to obtain your assessment 
		and feedback regarding the performance of our students through this Internship Program Appraisal form.
	<br>However, you may use your own instrument for evaluation as well. The ratings that you will provide will constitute 80% of the student’s grade in this course.
	<br>
	
	<br>Kindly indicate your assessment by choosing the appropriate radio button coded as follows:
	<br>
	<br>5 = 	Excellent
	<br>4 =	Exceeds Requirements
	<br>3 =	Meets Requirements Most of the Time
	<br>2 =	Meets Minimum Requirements Sometimes
	<br>1 =	Does Not Meet Requirements
	<br>N/A =	Not Applicable

</div>



 <?php 
		$arr = array(
		    'knowledge' => 'The intern is able to work with minimum supervision'
		    ,'quantity' => 'The amount of work accomplished and the ability to finish assigned tasks within the given time frame.'
			,'quality' => 'The degree of excellence in the performance of any assigned task. The ability to meet job expectations, accuracy  diligence'
			, 'attendance' => 'The intern reports for work regularly, on time or ahead of time.'
			, 'interpersonal' => 'The ability to establish a smooth and pleasant relationship with colleagues.'
			, 'dependability' => 'The intern can be relied on for emergency tasks when the need arises.'
			, 'willingness' => 'The intern listens attentively to instruction and 
														is able to accept criticisms gracefully'
			, 'initiative' => 'The intern’s ability to do tasks without being asked.'
		);
 ?>
  <?php foreach ($arr as $key => $value): ?>

		 <table class="">
		 	<tr>
		 		<td>
		 			<br><strong><?php echo ucfirst($key); ?></strong>
		 		</td>
		 	</tr>
		 	<tr>
		 		<td>
		 			<?php echo $value; ?>
		 		</td>
		 	</tr>
		 	<tr>
		 		<td>
		        <div class="input select rating-c">
		            <label for="example-c"></label>
		            <select id="example-c" name="<?php echo $key; ?>">
		                <option value="0">NA</option>
		                <option value="1">1</option>
		                <option value="2">2</option>
		                <option value="3">3</option>
		                <option value="4">4</option>
		                <option value="5">5</option>
		            </select>
		        </div>
		 		</td>
		 	</tr>
		 	<tr><td>

		 	</td></tr>
		 </table>
  <?php endforeach?>

	<div id="remarksDiv" class="">
		<br>Remarks/Comments:
		<br><textarea class="" rows="10" cols="80" id="remarks" name="remarks" class="col-lg-2 control-label"></textarea>
	</div>
 	<input type="submit" name="submit" value="Submit"  class="btn btn-primary"  />
</form>
</div>