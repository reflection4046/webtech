<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
        <div class="container" style="width:500px;">              
                <div class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Name</th> 
                               <th>email</th>
                               <th>Gender</th>
                               <th>PhoneNo</th>
                               <th>Age</th> 
                               <th>Appointment Date</th>
                               <th> Medical History</th>
                                
                          </tr>  
                          <?php   
                          $data = file_get_contents("patient.json");  
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {  
                               echo '<tr>
                               <td>'.$row["name"].'</td>
                               <td>'.$row["email"].'</td>
                               <td>'.$row["gender"].'</td>
                               <td>'.$row["phoneNo"].'</td>
                               <td>'.$row["Age"].'</td>
                               <td>'.$row["Date"].'</td>
                               <td>'.$row["Medical"].'</td>
                    
                               </tr>';  
                          }  
                          ?>  
                     </table>  
                   </div>
                 </div>
      </body>  
 </html>  