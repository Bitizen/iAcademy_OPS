<div class='col-lg-10 col-lg-offset-1'>

<legend>Add Alumnus</legend>
      <form action = "<?php echo base_url();?>index.php/administrator_controller/addAlumnus" accept-charset="utf-8" 
      method = "POST" onSubmit="return confirm('Are you sure?')">
      <table class="tg">
          <tr>
            <th><h4>Personal Information</h4></th>
            <th></th>
          </tr>
          <tr> 
            <td class="td-fields"><label for="studentID">Student Id</label></td>
            <td class="td-values"><input type="text" name="studentID" required/></td>
          <tr/>
          <tr>
            <td class="td-fields"><label for="first_name">First Name</label></td>
            <td class="td-values"><input type="text" name="first_name" required /></td> 
          <tr/>
          <tr>
            <td class="td-fields"><label for="middle_name">Middle Name</label></td>
            <td class="td-values"><input type="text" name="middle_name" required /></td>
          <tr/>
          <tr>
            <td class="td-fields"><label for="last_name">Last Name</label></td>
            <td class="td-values"><input type="text" name="last_name" required /></td>
          <tr/>
          <tr>
            <td class="td-fields"><label for="address">Address</label></td>
            <td  class="td-values"><input type="text" name="address" tabindex="3" required /></td>
          <tr/>  
      <tr>
        <td class="td-fields">
              <label for="courseID" class="">Course</label></td>
              <?php $courses = unserialize (COURSE_LIST); ?>
              <td class="td-values">
              <select id="courses" name="courseID" class="" required>
              <?php foreach ($courses as $course => $value): ?>
                 <option value="<?php echo $value; ?>"> <?php echo $courses[$course] ?></option>
              <?php endforeach?>
              </select>              
              </td>
        </td>
      </tr>
          <tr>
            <td><br>
              <h4>Graduation</h4>
            </td>
            <td>
            </td>
          <tr/>   
         <tr>
          <td class="td-fields">
            <label for="yearGraduated">Year</label>
          </td>
          <td class="td-values">
            <select name="yearGraduated" id="yearpicker">
              <option value = "" selected="selected">-- Select Year --</option>
            </select>
          </td>
        <tr/>                
        <tr>
          <td class="td-fields">
            <label for="monthGraduated">Month</label>
          </td>
          <td class="td-values">
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
          <td class="td-fields">
            <label for="termGraduated">Term</label>
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


        <tr>
          <th><h4><br>Contact Information</h4></th>
          <th></th>
        </tr>
        <tr> 
          <td class="td-fields"><label for="landline">Landline</label></td>
          <td class="td-values"><input type="text" name="landline" /></td>
        <tr/>
        <tr>
          <td class="td-fields"><label for="mobile">Mobile</label></td>
          <td class="td-values"><input type="text" name="mobile" /></td> 
        <tr/>

        <tr>
          <td class="td-fields"><label for="contactDetailsLastUpdated"></label></td>
          <td class="td-values"><input type="hidden" id="DATE_TODAY" name="contactDetailsLastUpdated"  /></td>
        <tr/>                


        <tr>
          <th><h4>Employment Status</th>
          <th></th>
        </tr>
        <td class="td-fields">
              <label for="statusID" class="">Status</label></td>
              <?php $status = unserialize (ALUMNUS_EMPLOYMENT_STATUS); ?>
              <td class="td-values">
              <select id="statusID" name="statusID" class="" required>
              <?php foreach ($status as $key => $value): ?>
                 <option value="<?php echo $value; ?>"> <?php echo $status[$key] ?></option>
              <?php endforeach?>
              </select>              
              </td>
        </td>
        <tr>
          <td class="td-fields"><label for="company">Company</label></td>
              <td class="td-values">
              <select name='company'>
                <option value="0">NA</option>
              <?php foreach ($companyList as $c): ?>
                 <option value="<?php echo $c['employerID'] ?>"> <?php echo $c['companyName'] ?> </option>
              <?php endforeach?>
              </select></td>
        <tr/>


      <tr>
        <th><h4>Account Information</th>
        <th></th>
      </tr>
      <tr>
            <td class="td-fields"><label for="username">Username:</label>  </td> 
            <td class="td-values"><input type="text" name="username" value="" id="username"  required/>   </td>    
      </tr>
      <tr>
            <td class="td-fields"><label for="email">Email:</label>  </td> 
            <td class="td-values"><input type="text" name="email" value="" id="email"  required/>   </td>    
      </tr>
      <tr>
            <td class="td-fields"><label for="password">Password:</label>  </td> 
            <td class="td-values"><input type="text" name="password" value="" id="password"  required/>   </td>    
      </tr>

      <tr>
            <td class="td-fields"><label for="password_confirm">Confirm Password:</label>  </td> 
            <td class="td-values"><input type="text" name="password_confirm" value="" id="password_confirm"  required/>  </td>     
      </tr>

        <tr><td></td>
        <td><input type="submit" name="submit"  class="btn btn-primary" value="Add Intern"  />
        <input type="button" name="submit"  class="btn btn-default" value="Cancel" /></td></tr> 

      </table>

      </form>
    </div>
  </body>
</html>

