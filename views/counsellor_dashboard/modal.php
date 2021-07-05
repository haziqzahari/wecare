<?php 

  // include 'session.php';
include 'database.php'

 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WeCare</title>

        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="counsellor_dashboard.css">

    <link rel="stylesheet" href="calendar/calendar.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style type="text/css">

      html, body {
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
    }

    .description{
      border:1px solid #DDDDDD;
      border-radius: 5px;
      margin-top: 30px;
      margin-bottom:20px;
      font-size: 20px;
      box-shadow: 1px 1px 5px grey;
      padding: 10px
    }

    .content{
      max-height: 100vh
    }
    </style>

   


</head>
<body>

  <div class="sidebar text-center">
    <div class="col">
      <p style="padding-top: 20px; font-size: 28px">WeCare</p>
      <hr style="width: 90%">

      <a href="home_counsellor.php">Home</a>
      <a class="active" href="counsellor_calendar.php">Manage Appointment</a>
      <a href="counsellor_createform.php">Psychometric Test</a>
      

      <hr style="width: 80%">
      <a href="logout.php" style="position: fixed; bottom: 0px; width: 280px">Logout</a>
    </div>
    
</div>

<!-- Page content -->
<div class="content">

    <div class="row text-center">
      <div class="col-md-6 col-md-offset-3">
          <div class="description">
          <p>Manage Your Schedule</p>
          
      </div>  
      </div>
      
    </div>
   
    <div align="center">  
        <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Book Now</button>  
    </div>  
    <br /> 



    

</div>

</body>
</html>

<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">We Care Booking Appointment</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">We Care Booking Appointment</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">
                     	 <label>Enter Matric Number</label>  
                          <input type="text" name="matric_num" id="matric_num" class="form-control" />  
                          <br />  
                          <label>Enter Your Name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <label>Enter Your Faculty</label>  
                          <textarea name="address" id="address" class="form-control"></textarea>  
                          <br />  
                          <label>Select Date</label>  
                          <input type="date" name="date" class="form-control">

                           <br/>
                           <label>Select Time Slot</label><select name="time_slot" id="time_slot" class="form-control">  
                               <option value="slot1">09 : 00 AM - 10 : 00 AM</option>  
                               <option value="slot2">10 : 00 AM - 11 : 00 AM</option>
                               <option value="slot3">11 : 00 AM - 12 : 00 PM</option>
                               <option value="slot4">03 : 00 PM - 04 : 00 PM</option>
                               <option value="slot5">04 : 00 PM - 05 : 00 PM</option>
                           </select>   
                          <br />  
                          <label>Enter Appointment Details</label>  
                          <input type="text" name="appt_details" id="appt_details" class="form-control" />  
                          <br />    
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <!--<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.name);  
                     $('#address').val(data.address);  
                     $('#gender').val(data.gender);  
                     $('#designation').val(data.designation);  
                     $('#age').val(data.age);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Designation is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>-->