
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
    
    
          <div class="table-responsive" id="user-table">  
        <table class="table table-stripped table-hover table-bordered ">
          <thead>
            <tr class="info">
              <td>I.D</td>
              <td>Name</td>
              <td>Mobile</td>
              <td>Phone</td>
              <td>Email</td>
              <td>Relation type</td>
            </tr>
          </thead>
          <tbody>
            <tr class="primary"><td><?php echo $contact_details->id; ?></td>
             <td> <?php echo $contact_details->Name;?></td>
              <td><?php echo  $contact_details->mobile_no; ?></td>
              <td><?php echo  $contact_details->phone_no; ?></td>
              <td><?php echo  $contact_details->email; ?></td>
              <td><?php echo  $contact_details->relation_type; ?></td>
            </tr>
          </tbody>
        </table>
  </div>
      
      
 </div>       
</body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
