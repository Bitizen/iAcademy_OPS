<div class='col-lg-10 col-lg-offset-1'>

<legend>Add Encoder</legend>

<form action="<?php echo base_url();?>index.php/administrator_controller/addEncoder" 
      method="post" accept-charset="utf-8" onSubmit="return confirm('Are you sure?')">
      <table class="tg">

      <tr>
            <td class="td-fields"><label for="first_name">First Name:</label> </td>
            <td class="td-values"><input type="text" name="first_name" value="" id="first_name" required /></td>
      </tr>

      <tr>
            <td class="td-fields"><label for="last_name">Last Name:</label> </td>
            <td class="td-values"><input type="text" name="last_name" value="" id="last_name" required /> </td>     
      </tr>
      <tr>
            <td class="td-fields"><label for="middle_name">Middle Name:</label></td>
            <td class="td-values"><input type="text" name="middle_name" value="" id="middle_name" required /></td>      
      <tr>
      <tr>
            <td class="td-fields"><label for="position">Position:</label></td>
            <td class="td-values"><input type="text" name="position" value="" id="position"  required/> </td>     
      <tr>

      <tr><td><br/></td></tr>

      <tr>
            <td class="td-fields"><label for="landline">Phone:</label>  </td> 
            <td class="td-values"><input type="text" name="landline" value="" id="landline"  required/>    </td>   
      </tr>      
      
      <tr>
            <td class="td-fields"><label for="mobile">Mobile:</label> </td>  
            <td class="td-values"><input type="text" name="mobile" value="" id="mobile"  />   </td>    
      </tr>      
      

      <tr><td><br/></td></tr>
      <tr>
            <td class="td-fields"><label for="email">Email:</label>  </td> 
            <td class="td-values"><input type="text" name="email" value="" id="email"  required/>   </td>    
      </tr>
      <tr>
            <td class="td-fields"><label for="username">Username:</label>  </td> 
            <td class="td-values"><input type="text" name="username" value="" id="username"  required/>   </td>    
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
      <td><input type="submit" name="submit"  class="btn btn-primary" value="Add Encoder"  />
      <input type="button" name="submit"  class="btn btn-default" value="Cancel" /></td></tr> 
      </table>

</form>

</div>
