<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Dashboard</title>

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
<h1>Contact details</h1>
<p><kbd>list of all the contacts</kbd></p>
<?php if (!empty($message)): ?> 
  
  <div id="infoMessage" class="alert alert-success" class="close" data-dismiss="alert" arial-label="close"> <?php echo $message;?></div>


<?php endif; ?>

	<div class="table-responsive" id="user-table">	
				<table class="table table-stripped table-hover table-bordered ">
					<thead>
						<tr class="info">
							<td>I.D</td>
							<td>Name</td>
							<td>Mobile</td>
							<td>Phone</td>
							<td>Email</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($contacts as $contact):
						?>
						<tr class="primary"><td><?php echo $contact->id; ?></td> <td> <?php echo $contact->Name;?></td> <td><?php echo  $contact->mobile_no; ?></td><td><?php echo  $contact->phone_no; ?></td><td><?php echo  $contact->email; ?></td>
							<td> <a href="<?php echo 'http://localhost/pro/Dashboard/update/'.$contact->id; ?>"class="label label-info">Edit</a>
								 <a href="<?php echo 'http://localhost/pro/Dashboard/view/'.$contact->id; ?>"class="label label-success">View</a>
								  <a href="<?php echo 'http://localhost/pro/Dashboard/delete/'.$contact->id; ?>"class="label label-danger">Delete</a></td>
								 
						</tr>
						<?php
							endforeach;
						 ?>
					</tbody>
				</table>
	</div>
					<p><h4> <span class="label label-info"><a href="<?php echo base_url(); ?>dashboard/add"> add new contact ?</a></span></h4></p>
					<p><h4><span class="label label-info"> <a href="<?php echo base_url(); ?>auth/logout"> logout?</a></span></h4></p>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>