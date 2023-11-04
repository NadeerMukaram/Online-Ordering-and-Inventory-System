
            <!-- Modal -->
            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                 <form method="post" action="addu.php">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adding New Account</h5>
                   
                  </div>
                  <div class="modal-body">

<div class="container">
<div class="row">
  <p></p>

			<div class="form-group">
			            <h6>Enter Given Name :</h6>
										<input type="text" name="givenname"  tabindex="1" class="form-control"  value="" required autofocus>
									</div>
								 <h6>Enter Last Name :</h6>
									<div class="form-group">
										<input type="text" name="lastname" tabindex="2" class="form-control"  value=""required>
									</div>
								<h6>Enter Address :</h6>
									<div class="form-group">
										<input type="text" name="address"  tabindex="3" class="form-control"  value=""required>
									</div>
									<h6>Enter Contact :</h6>
										
									<div class="form-group">
										<input type="text" name="contact"  tabindex="4" class="form-control"  max-length="11"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value=""required>
									</div>
									<h6>Enter Email :</h6>
									<div class="form-group">
										<input type="email" name="email"  id="emails" tabindex="5" onClick="this.select();"  class="form-control"  value=""required autofocus>
										
										
									</div>
									<p></p>
										<h6>Enter Password :</h6>
									<div class="form-group">
										<input type="password"  name="password" onclick="checkemail()" id="passworde" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  tabindex="6" class="form-control" placeholder="Password" required>
										
										<p id="passs">PASSWORD MUST CONTAIN  :</p>
								    <p id="letter" class="invalid s ">Lowercase</p>
                                  <p id="capital" class="invalid s ">Uppercase</p>
                                  <p id="number" class="invalid s ">Number</b></p>
                                  <p id="length" class="invalid s ">Minimum of 8 characters</b></p>
									</div>
								
										<br>
		    
		 <p></p>   	  
                  
                  
		 
		
</div>
</div>

</div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="font-size: 13px;" data-dismiss="modal">Close</button>
                    
                    <button type="submit" class="btn btn-primary"  name="saveaccount" style="font-size: 13px;" >Save changes</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
            	<style>
							
							.s {
							    font-size : 13px;
							    margin-left:50px;
							}
                							#message {
                                      display:none;
                                      background: #f1f1f1;
                                      color: #000;
                                      position: relative;
                                      padding: 20px;
                                      margin-top: 10px;
                                    }
                                    
                                    #message p {
                                      padding: 10px 35px;
                                      font-size: 18px;
                                    }
                                    
                                    /* Add a green text color and a checkmark when the requirements are right */
                                    .valid {
                                      color: green;
                                    }
                                    
                                    .valid:before {
                                      position: relative;
                                      left: -35px;
                                      content: "☑”";
                                    }
                                    
                                    /* Add a red text color and an "x" when the requirements are wrong */
                                    .invalid {
                                      color: red;
                                    }
                                    
                                    .invalid:before {
                                      position: relative;
                                      left: -35px;
                                      content: "☒";
                                    }
                                    .hide {
                                        display:none;
                                    }
                							</style>
                       
							<script>
							
                                    	var myInput = document.getElementById("passworde");
                                        var letter = document.getElementById("letter");
                                        var capital = document.getElementById("capital");
                                        var number = document.getElementById("number");
                                        var length = document.getElementById("length");
                                        var passhide = document.getElementById("passs");
                                       
                                        
                                        // When the user clicks on the password field, show the message box
                                        myInput.onfocus = function() {
                                          document.getElementById("message").style.display = "block";
                                        }
                                        
                                        // When the user clicks outside of the password field, hide the message box
                                        myInput.onblur = function() {
                                          document.getElementById("message").style.display = "none";
                                        }
                                        
                                        // When the user starts to type something inside the password field
                                        myInput.onkeyup = function() {
                                          // Validate lowercase letters
                                          var lowerCaseLetters = /[a-z]/g;
                                          if(myInput.value.match(lowerCaseLetters)) {  
                                            letter.classList.remove("invalid");
                                            letter.classList.add("hide");
                                            
                                          
                                          } else {
                                              
                                            letter.classList.remove("hide");
                                            letter.classList.add("invalid");
                                           
                                          }
                                          
                                          // Validate capital letters
                                          var upperCaseLetters = /[A-Z]/g;
                                          if(myInput.value.match(upperCaseLetters)) {  
                                            capital.classList.remove("invalid");
                                            capital.classList.add("hide");
                                          } else {
                                            capital.classList.remove("hide");
                                            capital.classList.add("invalid");
                                          }
                                        
                                          // Validate numbers
                                          var numbers = /[0-9]/g;
                                          if(myInput.value.match(numbers)) {  
                                            number.classList.remove("invalid");
                                            number.classList.add("hide");
                                          } else {
                                            number.classList.remove("hide");
                                            number.classList.add("invalid");
                                          }
                                          
                                          // Validate length
                                          if(myInput.value.length >= 8) {
                                            length.classList.remove("invalid");
                                            length.classList.add("hide");
                                            
                                               
                                            
                                          } else {
                                            length.classList.remove("hide");
                                            length.classList.add("invalid");
                                           passhide.classList.remove("hide");
                                           
                                          }
                                        }
                                        var reinput = document.getElementById("confirm-password");
                                        var error =  document.getElementById("error");
                                         var match =  document.getElementById("match");
                                        reinput.onkeyup = function() { 
                                             var password = document.getElementById("passworde");  
                                             
                                             if(reinput.value == password.value) {
                                                 match.classList.remove('hide');
                                                 match.classList.add('valid');
                                                 error.classList.add('hide');
                                                 setInterval(function(){  match.classList.add('hide'); }, 3000);
                                             }else {
                                                  match.classList.add('hide');
                                                  error.classList.remove('hide');
                                                  error.classList.add('invalid');
                                             }
                                             
                                             
                                         }
                                  
        						                
                                                                
							</script>	