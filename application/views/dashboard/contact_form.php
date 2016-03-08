<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Contact</title>

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

      <?php echo empty($error)?'':$error; ?>
                     <form class="form-horizontal" role="form" id="user-table" action="<?php echo base_url('dashboard/add'); ?>" method="post">
                      <h3> <p><kbd>Add New Contact</kbd></p></h3>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="Name">Name:</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo empty($Name)?'':$Name; ?>"required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="mobile">Mobile No:</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" placeholder="Enter mobile no" name="mobile" value="<?php echo empty($mobile_no)?'':$mobile_no; ?>"required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="phone">Phone No:</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" placeholder="Enter Phone no" name="phone" value="<?php echo empty($phone_no)?'':$phone_no; ?>"required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-4">
                          <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php echo empty($email)?'':$email; ?>"required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="relations">Relations:</label>
                        <div class="col-sm-4">
                        <select name="group" id="">
                        <?php foreach ($relations as $relation): ?> 
                                            <option value="<?php echo $relation->id; ?>"><?php echo $relation->type; ?></option>
                                          <?php endforeach ?>
                                      </select>
                          
                        </div>
                      </div>
                     
                      <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="submit" name="submit"class="btn btn-default" value="save">
                        </div>
                      </div>
                    
              
              </form>
        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
