<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Welcome to admin's dash board</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<div class="container">
<h1><?php echo lang('index_heading');?></h1>

   
   
<p><kbd><?php echo lang('index_subheading')?></kbd></p>
<?php if (!empty($message)): ?>
<div id="infoMessage" class="alert alert-success"class="close" data-dismiss="alert" aria-label="close"><?php echo $message;?></div>
<?php endif; ?>
<div class="row" style="background-color:red;">
              <div class=" col-md-9">
                          <button type="button" class="btn btn-info">
                                <span class="glyphicon glyphicon-search"></span> Search
                          </button>
                
              </div>
</div>
<div class="table-responsive">

            <table class="table table-stripped table-hover table-bordered" cellpadding=0 cellspacing=10>
                  <tr class="info">
                    <th><?php echo lang('index_fname_th');?></th>
                    <th><?php echo lang('index_lname_th');?></th>
                    <th><?php echo lang('index_email_th');?></th>
                    <th><?php echo lang('index_groups_th');?></th>
                    <th><?php echo lang('index_status_th');?></th>
                    <th><?php echo lang('index_action_th');?></th>
                  </tr>
                  <?php foreach ($users as $user):?>
                    <tr class="success">
                            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                      <td>
                        <?php foreach ($user->groups as $group):?>
                          <?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?> <br />
                                <?php endforeach?>
                      </td>
                      <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                      <td> <?php echo anchor("auth/edit_user/".$user->id, 'Edit','class="label label-info"') ;?> <?php echo anchor("auth/delete_user/".$user->id,'Delete','class="label label-danger"'); ?></td>
                    </tr>
              <?php endforeach;?>
            </table>
</div>


<p> <button type="button" class="btn btn-info-outline "><?php echo anchor('auth/create_user', lang('index_create_user_link'))?></button> | <button type="button" class="btn btn-primary-outline "> <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></button> | <button type="button" class="btn btn-success-outline "> <a href="<?php echo base_url(); ?>auth/logout"> logout?</a></button></p>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
