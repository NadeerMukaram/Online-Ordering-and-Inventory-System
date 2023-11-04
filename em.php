<?php
 $dateandtime = date("Y-m-d H:i:s");
                                                                                         $cenvertedTime = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($dateandtime)));
  echo 'time'.$dateandtime;
  
  echo '<br> Converted time'.$cenvertedTime;
?>