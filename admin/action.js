 //Code for checkboxchecked or uncheck
         $(document).ready(function() {
             
                                
                              
                             
                                    
                              $('.grams').click(function() {
                                var value = $('#kg').val();
                                var totarvalue = value+' grams';
                             
                                document.getElementById('#kg').setAttribute('value',totarvalue);
                                  })
                                  
                                   $('.kilograms').click(function() {
                               var value = $('#kg').val();
                               var totarvalue = value+' Kilograms';
                              
                                document.getElementById('#kg').setAttribute('value',totarvalue);
                                  })
                                  
                                    $('#kg').keyup(function(){ 
                                        var value = $('#kg').val();
                                    document.getElementById('optg').classList.remove('d-none');
                                    document.getElementById('gr').setAttribute('required','true');
                                     document.getElementById('kgs').setAttribute('required','true');
                                            if (value == '') {
                                             document.getElementById('optg').classList.add('d-none');    
                                               document.getElementById('gr').removeAttribute('required');
                                                document.getElementById('kgs').removeAttribute('required');
                                            }
                                     })            
        
                              
     });
        