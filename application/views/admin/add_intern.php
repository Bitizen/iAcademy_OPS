
		<div id="container">
			<form action = "<?php echo base_url();?>index.php/administrator_controller/addIntern" accept-charset="utf-8" method = "POST" onSubmit="return confirm('Are you sure?')">
			<table>
    			<tr>
    				<th width="50%"><h3>Personal Information</h3></th>
    				<th width="50%"></th>
    			</tr>
    			<tr> 
            <td><label for="studentID">Student Id</label></td>
            <td><input type="text" name="studentID" required/></td>
          <tr/>
          <tr>
            <td><label for="firstName">Firstname</label></td>
            <td><input type="text" name="firstName" required /></td> 
          <tr/>
          <tr>
            <td><label for="middleName">Middlename</label></td>
            <td><input type="text" name="middleName" required /></td>
          <tr/>
          <tr>
            <td><label for="lastName">Lastname</label></td>
            <td><input type="text" name="lastName" required /></td>
          <tr/>
          <tr>
            <td><label for="address">Address</label></td>
            <td><input type="text" name="address" tabindex="3" required /></td>
          <tr/>  
          <tr>
            <td><label for="courseID">COURSE</label></td>
            <td>
              <select name="courseID" required>
                <option value = "" selected="selected">-- Select Course --</option>
                <option value = 1> BSBA Financial Management </option>
                <option value = 2> BA Multimedia Arts and Design </option>
                <option value = 3> BSBA Marketing and Advertising </option>
                <option value = 4> BS Animation </option>
                <option value = 5> BSCS Software Engineering </option>
                <option value = 6> BS Game Development </option>
                <option value = 7> BSIT Web Development </option>
                <option value = 8> Bachelor of Fashion Design and Technology </option>
              </select>
            </td>
          <tr/>
          <tr>
            <td>
              <h3>Graduation</h3>
            </td>
            <td>
            </td>
          <tr/>   
         <tr>
          <td>
            <label for="yearGraduated">YEAR</label>
          </td>
          <td>
            <select name="yearGraduated" id="yearpicker">
              <option value = "" selected="selected">-- Select Year --</option>
            </select>
          </td>
        <tr/>                
        <tr>
          <td>
            <label for="monthGraduated">MONTH</label>
          </td>
          <td>
            <select name="monthGraduated" required>
              <option value = "" selected="selected">-- Select Month --</option>
              <option value = 1> Jan </option>
              <option value = 2> Feb </option>
              <option value = 3> Mar </option>
              <option value = 4> Apr </option>
              <option value = 5> May </option>
              <option value = 6> Jun </option>
              <option value = 7> Jul </option>
              <option value = 8> Aug </option>
              <option value = 9> Sep </option>
              <option value = 10> Oct </option>
              <option value = 11> Nov </option>
              <option value = 12> Dec </option>
            </select>
          </td>
        <tr/>
        <tr>
          <td>
            <label for="termGraduated">TERM</label>
          </td>
          <td>
            <select name="termGraduated" required>
              <option value = "" selected="selected">-- Select Term --</option>
              <option value = 1> 1 </option>
              <option value = 2> 2 </option>
              <option value = 3> 3 </option>
            </select>
          </td>
        <tr/>
			</table>

			<table>
				<tr>
					<th width="50%"><h3>Contact Information</h3></th>
					<th width="50%"></th>
				</tr>
				<tr> 
          <td><label for="landline">Landline</label></td>
          <td><input type="text" name="landline" tabindex="3" /></td>
        <tr/>
        <tr>
          <td><label for="mobile">Mobile</label></td>
          <td><input type="text" name="mobile" /></td> 
        <tr/>
        <tr>
          <td><label for="emailAddress">Email</label></td>
          <td><input type="text" name="emailAddress" required /></td>
        <tr/>
        <tr>
          <td><label for="contactDetailsLastUpdated"></label></td>
          <td><input type="hidden" id="DATE_TODAY" name="contactDetailsLastUpdated"  /></td>
        <tr/>                
			</table>

			<table>
				<tr>
					<th width="50%"><h3>Internship Information</h3></th>
					<th width="50%"></th>
				</tr>
				<tr> 
          <td><label for="statusID">Status</label></td>
          <td><select name="statusID" required>
                <option value = "" selected="selected">-- Select Status --</option>
                <option value = 1> Available </option>
                <option value = 2> Currently On-The-Job </option>
                <option value = 3> Completed Internship 1 </option>
                <option value = 4> Completed Internship 2 </option>
                <option value = 5> Employed </option>
              </select></td>
        <tr/>
        <tr>
          <td><label for="FIRSTNAME">Company</label></td>
          <td><input type="text" name="FIRSTNAME" /></td> 
        <tr/>
        <tr>
          <td></td>
          <td><input type="submit" value="Submit"/></td>
        <tr/>
			</table>

			</form>
		</div>
	</body>
</html>

