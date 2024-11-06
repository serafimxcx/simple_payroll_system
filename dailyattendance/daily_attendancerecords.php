<?php 
    
    //if only payroll period is used for search
    if(empty($_GET['slct_eidr']) && isset($_GET['slct_payrollend'])){

        $result = $conn->query("select * from dailyattendancetb where fld_date BETWEEN '$_GET[slct_payrollstart]' AND '$_GET[slct_payrollend]' ORDER BY fld_date DESC");

        while($row = $result -> fetch_assoc()){
            echo "
                <tr>
                    <td>$row[fld_date]</td>
                    <td>$row[fld_eid]</td>
                    <td>$row[fld_name]</td>
                    <td>$row[fld_timein]</td>
                    <td>$row[fld_timeout]</td>
                </tr>";
        }  

    }
    
    // if only eid is used for search
    else if(isset($_GET['slct_eidr']) && empty($_GET['slct_payrollend'])){    

        $result = $conn->query("select * from dailyattendancetb where fld_eid = '$_GET[slct_eidr]' OR fld_name like '%$_GET[slct_eidr]%' ORDER BY fld_date DESC");
        while($row = $result -> fetch_assoc()){
                echo "
                <tr>
                <td>$row[fld_date]</td>
                <td>$row[fld_eid]</td>
                <td>$row[fld_name]</td>
                <td>$row[fld_timein]</td>
                <td>$row[fld_timeout]</td>
                </tr>";
            
        }



    }
    
    //if both eid and payroll period are search
    else if(isset($_GET['slct_eidr']) && isset($_GET['slct_payrollend'])){

        $result = $conn->query("select * from dailyattendancetb where (fld_eid = '$_GET[slct_eidr]' OR fld_name like '%$_GET[slct_eidr]%') AND (fld_date BETWEEN '$_GET[slct_payrollstart]' AND '$_GET[slct_payrollend]') ORDER BY fld_date DESC");
        while($row = $result -> fetch_assoc()){
                echo "
                <tr>
                <td>$row[fld_date]</td>
                <td>$row[fld_eid]</td>
                <td>$row[fld_name]</td>
                <td>$row[fld_timein]</td>
                <td>$row[fld_timeout]</td>
                </tr>";
            
        }

    }

?>