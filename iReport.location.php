<?php


    if(isset($_GET['loc'])){
        $loc = $_GET['loc'];
        $reportid=$_GET['report'];
        ?>
  <script>
  
      window.location.href="https://ireport.hantechdesign.com/accesspersonel/administrator/incident_location.php?rep_id=<?php echo $loc?>&location=<?php echo $reportid?>";
  </script>
  <?php
        
    }

?>