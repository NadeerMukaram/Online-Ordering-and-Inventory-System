
       	<?php
                 
                 	if(isset($_SESSION['products'])) {
                    include 'actionproduct.php';
                 		unset($_SESSION['products']);
                 	}

       
       			 else if (isset($_SESSION['Category'])) {

        				include 'actioncategory.php';
                 		unset($_SESSION['Category']);
        		} else if(isset($_SESSION['accounts'])) {


        			include 'actionaccounts.php';
                 		unset($_SESSION['accounts']);
       			 }else if (isset($_SESSION['pcode'])) {
       			     include 'actionpromo.php';
       			     unset($_SESSION['pcode']);
       			 }
                 	?>	





