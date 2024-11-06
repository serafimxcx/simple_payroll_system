<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employee</title>
    <?php
        include("../navbar.php");
        include("../connect.php");
    ?>
   <link rel="stylesheet" href="styleemployee.css">
</head>
<body>
    
    <?php
        
        session_start();

        if (!isset($_SESSION['username'])) {
            // Redirect to the login page
            header('Location: ../index.php');
            exit();
          }

        $eid = "";
        $lname = "";
        $fname = "";
        $mname = "";
        $addr = "";
        $num = "";
        $email = "";
        $status = "";
        $savebtn = "";
        $schedstart = "";
        $schedend = "";
    ?>
    
    <div class="container" >
        <br>
    <div class="employee_container">
    <br>
    <h3><b>Manage Employee's Basic Information</b></h3>
    <hr>
        
            <?php

            if(isset($_GET['duplicate_eid'])){
                echo "<i>Employee ID is already existing in the records.</i> <br> <br>";

                header("refresh: 2; url=employee.php");
                }

            // when edit is clicked
                if(isset($_GET['txt_eid'])){
                    $result = $conn -> query("select * from employeetb where fld_eid like '$_GET[txt_eid]'");
                    while($row = $result->fetch_assoc()){
                        $eid = $row["fld_eid"];
                        $lname = $row["fld_lname"];
                        $fname = $row["fld_fname"];
                        $mname = $row["fld_mname"];
                        $addr = $row["fld_addr"];
                        $num = $row["fld_num"];
                        $email = $row["fld_email"];
                        $status = $row["fld_status"];
                        $schedstart = $row["fld_schedstart"];
                        $schedend = $row["fld_schedend"];
                    }
                }
            
            // if the input for eid have value then it will update the records according to what is set on the other fields, otherwise it is consider as a new record
            if(isset($_GET['txt_eid'])){
                echo "<form action=updateemployee.php method=post>";
                $savebtn = "Update&nbsp;Employee";
            }
            else{
                echo "<form action=saveemployee.php method=post>";
                $savebtn = "Add&nbsp;New&nbsp;Employee";
            }

            ?>   
            
            <table width="80%">
                    <tr>
                        <td>Employee ID: <br><br></td>
                        <td><input type="text" name="txt_eid" value='<?php echo $eid;?>' placeholder="..." pattern="[0-9]+" title="The format for employee ID should only consist numbers." required><br><br></td>
                        <td>Address: <br><br></td>
                        <td><input type="text" name="txt_addr" value='<?php echo $addr;?>' placeholder="..." required><br><br></td>
                    </tr>

                    <tr>
                        <td>Last Name: <br><br></td>
                        <td><input type="text" name="txt_lname" value='<?php echo $lname;?>' placeholder="..." required><br><br></td>
                        <td>Mobile Number: <br><br></td>
                        <td><input type="text" name="txt_num" value='<?php echo $num;?>' placeholder="..." pattern="[0-9]{11}" title="The format for mobile number should only consist 11 digit numbers for example 09112345677." required><br><br></td>
                    </tr>

                    <tr>
                        <td>First Name: <br><br></td>
                        <td><input type="text" name="txt_fname" value='<?php echo $fname;?>' placeholder="..." required><br><br></td>
                        <td>Email: <br><br></td>
                        <td><input type="text" name="txt_email" value='<?php echo $email;?>' placeholder="..."  pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="The format for email should be any character followed by @ then domain name dot a top level domain for example gale@gmail.com." required><br><br></td>
                    </tr>

                    <tr>
                        <td>Middle Name: <br><br></td>
                        <td><input type="text" name="txt_mname" value='<?php echo $mname;?>' placeholder="..." ><br><br></td>
                        <td>Status: <br><br></td>
                        <td>
                            <input type="radio" name="txt_status" value="Full Time" <?php if($status == 'Full Time'){ echo 'checked'; }  ?> > Full Time 
                            <input type="radio" name="txt_status" value="Part Time" <?php if($status == 'Part Time'){ echo 'checked'; } ?> > Part Time<br><br>
                        </td>
                    </tr>
                    </table>
                    <hr>
                    <br>
                    <table width="100%">
                        <tr>
                            <td>
                            Schedule: <input type="time" name="txt_schedstart" step="1" value='<?php echo $schedstart;?>' placeholder="start" required>&nbsp; to &nbsp; <input type="time" name="txt_schedend" step="1" value='<?php echo $schedend;?>' placeholder="end" required>
                            </td>
                            
                        </tr>
                    </table>
                    <br>
            
            
                    <hr>
                    <br>
                    <!--buttons-->
                    <table>
                    <tr>
                        <td><input type="submit" value=<?php echo $savebtn; ?> style="margin-right: 5px;" class="addbtn"></td> 
                </form>
                    <td><input type="button" value="Batch Modification" onclick="displayBatch()" class="resetbtn"></td>
                    <form action=employee.php>
                     <td><input type="submit" value="Reset" class="resetbtn"></td>
                     </form>
                    </tr>
                    </table>
                    <br><br>

                    
                    
                    </div>
                    <br><br>
                <hr style="border:1px solid black;">
                <br><br>

                <div class="etable_container">
                    <br>
                <table class="table table-striped">
                <tr>
                <th></th><th></th> <th>Employee ID</th> <th>Last Name</th> <th>First Name</th> <th>Middle Name</th> <th>Address</th> <th>Mobile No.</th> <th>Email</th> <th>Status</th> <th>Start of Schedule</th> <th>End of Schedule</th>
                </tr>

                <?php

                    $result = $conn->query("select * from employeetb");
                    while($row=$result->fetch_assoc()){
                    echo "<tr>
                        <td><a id=delete onclick=ask($row[fld_eid])><input type=submit class=delbtn value=Delete></a></td>
                        <td><a href=employee.php?txt_eid=$row[fld_eid]><input type=submit class=edtbtn value=Edit></a></td>
                        <td>$row[fld_eid]</td> 
                        <td> $row[fld_lname] </td>
                        <td> $row[fld_fname] </td>
                        <td> $row[fld_mname] </td>
                        <td> $row[fld_addr] </td>
                        <td> $row[fld_num] </td>
                        <td> $row[fld_email] </td>
                        <td> $row[fld_status] </td>
                        <td> $row[fld_schedstart] </td>
                        <td> $row[fld_schedend] </td>
                    </tr>";
                }
                ?>
                </table>
                <br>
                </div>
                <br><br>

                <!--modal for batch update-->
                <div id="modal" style="position: fixed; top: 0; right: 0; width: 100%; height: 100%; background: rgb(128, 128, 128, 0.5);z-index: 2; display:none;">
                    <div style="margin: 0 auto; width: 50%; height: 80%; margin-top: 90px; background-color: white; padding: 2.5rem; overflow: auto; border-radius: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <table width="100%">
                        <tr>
                            <td width="50%">
                            <h3><b>Batch Modification</b></h3>
                            </td >
                            <td width="50%" style="text-align: right;">
                            <a href=# onclick="closes()"><input type="button" value="X" style="padding: 5px 15px; border: 1px solid black; background-color: black; color: white;"></a> 
                            </td>
                        </tr>
                    </table>
                        
                        <hr><br>
                        <table>
                        
                        <form id="batchForm" method="post">
                            <?php
                            $batchresult = $conn->query("select * from employeetb");
                            while($row = $batchresult->fetch_assoc()){
                                echo "<tr><td><input type=checkbox name=records[] value=$row[fld_eid]><br><br></td><td>&nbsp;&nbsp; $row[fld_name] <br><br></td><td style=padding-left:50px;>- $row[fld_status] <br><br></td></tr>";
                            }
                            ?>
                            </table>
                            <hr>
                            <table>
                                <tr>
                                <td>Change Employees' Status: &nbsp;&nbsp;<br></td>
                                <td>
                                    <input type="radio" name="txt_batchstatus" value="Full Time"> Full Time  &nbsp;&nbsp;
                                    <input type="radio" name="txt_batchstatus" value="Part Time"> Part Time<br>
                                </td>
                                </tr>
                            </table>
                            <hr><br>
                            <table>
                            <tr>
                                <td><input type="button" value="Batch Update" onclick="UpdateorDelete('update')" class="addbtn"></td>
                                <td><input type="button" value="Batch Delete" onclick="UpdateorDelete('delete')" class="batchdeletebtn"></td>
                            </tr>
                            </table>
                            
                        </form>
                        
                    </div>
                </div>

                <script>
                    function ask(eid){
                        if(confirm("Are you sure you want to delete this record? ")){
                            window.location.href = "deleteemployee.php?txt_eid=" + eid;
                        }
                    }

                    function displayBatch(){
                        document.getElementById("modal").style.display="block";
                    }

                    function closes(){
                        document.getElementById("modal").style.display="none";
                    }

                    function UpdateorDelete(operation){
                        var form = document.getElementById("batchForm");
                        
                        if (operation === 'update') {
                            if(confirm("Are you sure you want to UPDATE the records? ")){
                                form.action = "batchupdate.php";
                            }
                             
                        } else if (operation === 'delete') {
                            if(confirm("Are you sure you want to DELETE the records? ")){
                                form.action = "batchdelete.php";
                            }
                             
                        }

                        form.submit();
                    }
                </script>
    </div>
</body>
</html>