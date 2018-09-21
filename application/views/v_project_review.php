<?php

/* data session */
$user_id = $s_all['user_id'];
$user_name = $s_all['user_name'];
$user_fullname = $s_all['user_fullname'];
$user_email = $s_all['user_email'];
$user_last_login = $s_all['user_last_login'];
$user_last_activity = $s_all['user_last_activity'];
$user_date_created = $s_all['user_date_created'];
$user_role = $s_all['user_role'];
$user_role_name = $this->vf->getFieldById('role_name', 'roles', 'id', $s_all['user_role']);

?>

<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Review
      <small>Create Project</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
<!-- 
      <li><a href="#">Layout</a></li>
      <li class="active">Top Navigation</li>
 -->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Project Fiche</h3>
      </div>
      <div class="box-body">

        <table class="table table-striped">
          <tr>
            <td colspan="2">Project Code</td>
          </tr>
          <tr>
            <td style="width: 10px"></td>
            <td><?=$project['project_code'];?></td>
          </tr>
          <tr>
            <td colspan="2">Project Title</td>
          </tr>
          <tr>
            <td></td>
            <td><?=$project['title'];?></td>
          </tr>
          <tr>
            <td colspan="2">Cooperation Area</td>
          </tr>
          <tr>
            <td></td>
            <td><?=$project['cooperation_area'];?></td>
          </tr>
          <tr>
            <td colspan="2">Relevance</td>
          </tr>
          <tr>
            <td></td>
            <td><?=$project['relevance'];?></td>
          </tr>
        </table>     
        <hr>
        <table class="table table-striped">
          <tr>
            <td colspan="4"><b>Responsibility Authority</b></td>
          </tr>
          <tr>
            <td style="width: 2%"></td>
            <td style="width: 10%">Name</td>
            <td style="width: 2%">:</td>
            <td><?=$project['ra_name'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Title</td>
            <td>:</td>
            <td><?=$project['ra_title'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Address</td>
            <td>:</td>
            <td><?=$project['ra_address'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Phone</td>
            <td>:</td>
            <td><?=$project['ra_phone'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Fax</td>
            <td>:</td>
            <td><?=$project['ra_fax'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Email</td>
            <td>:</td>
            <td><?=$project['ra_email'];?></td>
          </tr>
        </table>        
        <hr>
        <table class="table table-striped">
          <tr>
            <td colspan="4"><b>Contact Person</b></td>
          </tr>
          <tr>
            <td style="width: 2%"></td>
            <td style="width: 10%">Name</td>
            <td style="width: 2%">:</td>
            <td><?=$project['cp_name'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Title</td>
            <td>:</td>
            <td><?=$project['cp_title'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Address</td>
            <td>:</td>
            <td><?=$project['cp_address'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Phone</td>
            <td>:</td>
            <td><?=$project['cp_phone'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Fax</td>
            <td>:</td>
            <td><?=$project['cp_fax'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Email</td>
            <td>:</td>
            <td><?=$project['cp_email'];?></td>
          </tr>
        </table>        

        <hr>
        <table class="table table-striped">
          <tr>
            <td colspan="2">Duration</td>
          </tr>
          <tr>
            <td style="width: 10px"></td>
            <td><?=$project['duration'];?> Bulan</td>
          </tr>
        </table>     

        <hr>
        <table class="table table-striped">
          <tr>
            <td colspan="2">Project Partner</td>
          </tr>
          <tr>
            <td style="width: 10px"></td>
            <td>
              <table border="1" style="padding: 10px">
                <tr>
                  <td style="width: 50%; text-align: center;">Country</td>
                  <td style="width: 50%; text-align: center;">Please explain why these partners are chosen and their roles in the project for each partner</td>
                </tr>
                <?php foreach($partner as $list_partner) { ?>
                <tr>
                  <td style="text-align: center; padding: 5px"><?=$list_partner['country'];?></td>
                  <td style="padding: 5px;"><?=$list_partner['reason'];?></td>
                </tr>
                <?php } ?>
                
              </table>
            </td>
          </tr>
        </table>     

        <hr>
        <table class="table table-striped">
          <tr>
            <td colspan="4"><b>Project Essentials</b></td>
          </tr>
          <tr>
            <td style="width: 2%"></td>
            <td style="width: 25%">Overall Objectives</td>
            <td style="width: 2%">:</td>
            <td><?=$project['overall_objective'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Project Purpose</td>
            <td>:</td>
            <td><?=$project['project_purpose'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Target Group</td>
            <td>:</td>
            <td><?=$project['target_group'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Contribution to Multilateral Cooperation</td>
            <td>:</td>
            <td><?=$project['contribution'];?></td>
          </tr>
        </table>        

      </div><!-- /.box-body -->
    </div><!-- /.box -->

  </section><!-- /.content -->
</div><!-- /.container -->
