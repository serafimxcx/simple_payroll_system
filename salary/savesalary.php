<?php
    include("../connect.php");
    
    if($_POST['txt_name'] == ""){
        header("location: salary.php");
    }else{
        
        if($_POST['txt_status'] == "Full Time")
    {
        $conn -> query("insert into payrolltb (fld_eid, fld_name, fld_status, fld_payrollstart, fld_payrollend, fld_noofpresent, fld_noofabsent, fld_nooflate, fld_noofundertime, fld_noofovertime, fld_basicsalary, fld_overtimepay, fld_bonuspay, fld_grosspay, fld_sss, fld_pagibig, fld_philhealth, fld_deductionabsent, fld_deductionlate, fld_deductionundertime, fld_totaldeductions, fld_netpay, fld_totalhoursworked, fld_holidaypay) values ('$_POST[txt_eid]', '$_POST[txt_name]', '$_POST[txt_status]', '$_POST[txt_hpayrollstart]', '$_POST[txt_hpayrollend]', '$_POST[txt_noofpresent]', '$_POST[txt_noofabsent]', '$_POST[txt_nooflate]', '$_POST[txt_noofundertime]', '$_POST[txt_noofovertime]', '$_POST[txt_basicsalary]', '$_POST[txt_overtimepay]', '$_POST[txt_bonuspay]', '$_POST[txt_grosspay]', '$_POST[txt_sss]', '$_POST[txt_pagibig]', '$_POST[txt_philhealth]', '$_POST[txt_deductionabsent]', '$_POST[txt_deductionlate]', '$_POST[txt_deductionundertime]', '$_POST[txt_totaldeductions]', '$_POST[txt_netpay]', '$_POST[txt_totalhoursworked]', '$_POST[txt_holidaypay]' )");

        
    }

    else if($_POST['txt_status'] == "Part Time")
    {
        $conn -> query("insert into payrolltb (fld_eid, fld_name, fld_status, fld_payrollstart, fld_payrollend, fld_noofpresent, fld_noofabsent, fld_totalhoursworked, fld_hourlyrate, fld_bonuspay, fld_totalsalaryPT, fld_holidaypay  ) values ('$_POST[txt_eid]', '$_POST[txt_name]', '$_POST[txt_status]', '$_POST[txt_hpayrollstart]', '$_POST[txt_hpayrollend]', '$_POST[txt_noofpresent]', '$_POST[txt_noofabsent]', '$_POST[txt_totalhoursworked]', '$_POST[txt_hourlyrate]', '$_POST[txt_bonuspay]', '$_POST[txt_ptotalsalary]', '$_POST[txt_holidaypay]' )");
    }
    header("location: salary.php");
    }

    
?>
