<?php

    include_once('../config/routeros_api.class.php');
    include_once('conn.php');

        $ARRAY3 = $API->comm("/ip/hotspot/user/print");
        $ARRAY2 = $API->comm("/system/scheduler/print");
        $ARRAY = $API->comm("/ip/hotspot/active/print");                                                                                    
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

        <section class="content">
          
            <div class="row">
                <div class= "col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            แสดงรายละเอียดผู้ใช้งานที่กำลังใช้งานขณะนี้
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>เครือข่ายที่ใช้</th>
                                            <th>ชื่อผู้ใช้</th>
                                            <th>Address</th>
                                            <th>MAC Address</th>
                                            <th>เริ่มใช้งาน</th>
                                            <th>แพคเกจที่ใช้</th>
                                            <th>เวลาใช้งาน</th>
                                            <th>ข้อมูลที่ใช้</th>
                                            <th>เชื่อมต่อ</th>                                                                                        
                                            <th>เชิญออก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
                                                <?php

                                                //print_r($ARRAY);
                                                //print_r($ARRAY2);
                                                //print_r($ARRAY3);
                                                //exit();

                                                    $num =count($ARRAY);
                                                    $num2 =count($ARRAY2);
                                                    $num3 =count($ARRAY3);

                                                    for($i=0; $i<$num; $i++){   
                                                    $no=$i+1;
                                                    $bytes =  $ARRAY[$i]['bytes-out']/1048576;

                                                        echo "<tr>";
                                                            echo "<td>".$no."</td>";
                                                            echo "<td>".$ARRAY[$i]['server']."</td>";                                                                                                                                                 
                                                            echo "<td>".$ARRAY[$i]['user']."</td>";                                                     
                                                            echo "<td>".$ARRAY[$i]['address']."</td>";
                                                            echo "<td>".$ARRAY[$i]['mac-address']."</td>"; 
                                                            echo "<td>";
                                                        for($ii=0; $ii<$num2; $ii++){
                                                                if($ARRAY2[$ii]['name']==$ARRAY[$i]['user']){
                                                                    echo $ARRAY2[$ii]['start-date'].' '.$ARRAY2[$ii]['start-time'];

                                                                }else{
                                                                    
                                                                    //echo "N/A";
                                                                    
                                                                }
                                                                
                                                        }       echo "</td>";

                                                            echo "<td>";
                                                        for($ii=0; $ii<$num3; $ii++){
                                                                if($ARRAY3[$ii]['name']==$ARRAY[$i]['user']){
                                                                    echo $ARRAY3[$ii]['profile'];

                                                                }else{
                                                                    
                                                                    //echo "N/A";
                                                                    
                                                                }
                                                                
                                                        }       echo "</td>";
                                                                echo "<td>".$ARRAY[$i]['uptime']."</td>";
                                                                echo "<td>".round($bytes,1)." MB</td>";
                                                                echo "<td>".$ARRAY[$i]['login-by']."</td>";                                                     
                                                            //  echo "<td><a href='useronline_del.php?user=".$i."'><img src='../img/kik.png' width=20px title=Freekick></a></td>";
                                                                echo "<td><a href='useronline_del.php?user=".$i."'><button type=\"button\" class=\"btn btn-danger\"><i class=\"fa fa-power-off\"></i></button></a>";
                                                        echo "</tr>";
                                                    
                                                    }
                                                ?>
                                                                                                                                                                              
                                    </tbody>
                                </table>
                            </div>
                           
        </div>
        <!-- /#page-wrapper -->

    </div>
    
</body>
</html>
