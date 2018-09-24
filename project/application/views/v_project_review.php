<?php

/* data session */
$user_id = $s_all['user_id'];
$user_name = $s_all['user_name'];
$user_fullname = $s_all['user_fullname'];
$user_email = $s_all['user_email'];
$instansi = $s_all['instansi'];
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
            <td><?=$this->vf->getFieldById('relevance', 'relevance', 'id', $project['relevance']);?></td>
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
              <table style="">
                <tr>
                  <td style="width: 50%; text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid">Country</td>
                  <td style="width: 50%; text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid">Please explain why these partners are chosen and their roles in the project for each partner</td>
                </tr>
                <?php foreach($partner as $list_partner) { ?>
                <tr>
                  <td style="text-align: center; border-left: 1px solid; border-bottom: 1px solid"><?=$list_partner['country'];?></td>
                  <td style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid"><?=$list_partner['reason'];?></td>
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

        <?php if ($project['type']==1) {?>

          <?php if ($project['ab_jumlah_training']!=0) {?>

            <?php foreach($training as $list_training) { ?>
              <hr>
              <table class="table table-striped">
                <tr>
                  <td colspan="4"><b>Training</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Activity Title</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_training['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Activity Description</td>
                  <td>:</td>
                  <td><?=$list_training['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Countries wich will be invited to the training</td>
                  <td>:</td>
                  <td><?=$list_training['countries'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of participants invited to the training per partner country</td>
                  <td>:</td>
                  <td><?=$list_training['participant'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of total participants invited to the training program</td>
                  <td>:</td>
                  <td><?=$list_training['participant_total'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of trainers needed</td>
                  <td>:</td>
                  <td><?=$list_training['trainer'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Duration of training (days)</td>
                  <td>:</td>
                  <td><?=$list_training['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Location of the training</td>
                  <td>:</td>
                  <td><?=$list_training['location'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of days of boarding and lodging needed</td>
                  <td>:</td>
                  <td><?=$list_training['days'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of flight tickets needed (roundtrip)</td>
                  <td>:</td>
                  <td><?=$list_training['ticket'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Please give details if interpretation nedded</td>
                  <td>:</td>
                  <td><?=$list_training['detail'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Indicate budget of the training</td>
                  <td>:</td>
                  <td><?=$list_training['budget'];?></td>
                </tr>
              </table>        
            <?php } ?>

          <?php } ?>

          <?php if ($project['ab_jumlah_workshop']!=0) {?>

            <?php foreach($workshop as $list_workshop) { ?>
              <hr>
              <table class="table table-striped">
                <tr>
                  <td colspan="4"><b>Workshop</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Activity Title</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_workshop['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Activity Description</td>
                  <td>:</td>
                  <td><?=$list_workshop['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Country wich will be invited to the workshop</td>
                  <td>:</td>
                  <td><?=$list_workshop['countries'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of participants invited to the workshop per partner country</td>
                  <td>:</td>
                  <td><?=$list_workshop['participant'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of total participants invited to the worksop program</td>
                  <td>:</td>
                  <td><?=$list_workshop['participant_total'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Duration of the workshop (days)</td>
                  <td>:</td>
                  <td><?=$list_workshop['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Location of the workshop</td>
                  <td>:</td>
                  <td><?=$list_workshop['location'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of days of boarding and lodging needed</td>
                  <td>:</td>
                  <td><?=$list_workshop['days'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of flight tickets needed (roundtrip)</td>
                  <td>:</td>
                  <td><?=$list_workshop['ticket'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Writen output of the workshop</td>
                  <td>:</td>
                  <td><?=$list_workshop['output'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Indicate budget of the training</td>
                  <td>:</td>
                  <td><?=$list_workshop['budget'];?></td>
                </tr>
              </table>        
            <?php } ?>

          <?php } ?>

          <?php if ($project['ab_jumlah_study_visit']!=0) {?>

            <?php foreach($study_visit as $list_study_visit) { ?>
              <hr>
              <table class="table table-striped">
                <tr>
                  <td colspan="4"><b>Study Visit</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Activity Title</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_study_visit['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Activity Description</td>
                  <td>:</td>
                  <td><?=$list_study_visit['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Related Training</td>
                  <td>:</td>
                  <td><?=$list_study_visit['related_training'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Contribution</td>
                  <td>:</td>
                  <td><?=$list_study_visit['contribution'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Destination</td>
                  <td>:</td>
                  <td><?=$list_study_visit['destination'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Personel</td>
                  <td>:</td>
                  <td><?=$list_study_visit['personel'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Duration</td>
                  <td>:</td>
                  <td><?=$list_study_visit['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of flight tickets needed (roundtrip)</td>
                  <td>:</td>
                  <td><?=$list_study_visit['ticket'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of days of boarding and lodging needed</td>
                  <td>:</td>
                  <td><?=$list_study_visit['days'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Indicate budget of the training</td>
                  <td>:</td>
                  <td><?=$list_study_visit['budget'];?></td>
                </tr>
              </table>        
            <?php } ?>

          <?php } ?>

          <?php if ($project['ab_jumlah_seminar']!=0) {?>

            <?php foreach($seminar as $list_seminar) { ?>
              <hr>
              <table class="table table-striped">
                <tr>
                  <td colspan="4"><b>Seminar</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Activity Title</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_seminar['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Activity Description</td>
                  <td>:</td>
                  <td><?=$list_seminar['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of Speakers</td>
                  <td>:</td>
                  <td><?=$list_seminar['speakers'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Countries wich will be invited to the Conference / Seminar</td>
                  <td>:</td>
                  <td><?=$list_seminar['countries'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of participants invited to the seminar per partner country</td>
                  <td>:</td>
                  <td><?=$list_seminar['participant'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of total participants invited to the seminar program</td>
                  <td>:</td>
                  <td><?=$list_seminar['participant_total'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Duration of the seminar (days)</td>
                  <td>:</td>
                  <td><?=$list_seminar['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Location of the seminar</td>
                  <td>:</td>
                  <td><?=$list_seminar['location'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of days of boarding and lodging needed</td>
                  <td>:</td>
                  <td><?=$list_seminar['days'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of flight tickets needed (roundtrip)</td>
                  <td>:</td>
                  <td><?=$list_seminar['ticket'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Please give details if interpretation is needed</td>
                  <td>:</td>
                  <td><?=$list_seminar['detail'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Indicate budget of the training</td>
                  <td>:</td>
                  <td><?=$list_seminar['budget'];?></td>
                </tr>
              </table>        
            <?php } ?>

          <?php } ?>

          <?php if ($project['ab_jumlah_meeting']!=0) {?>

            <?php foreach($meeting as $list_meeting) { ?>
              <hr>
              <table class="table table-striped">
                <tr>
                  <td colspan="4"><b>Meeting</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Activity Title</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_meeting['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Activity Description</td>
                  <td>:</td>
                  <td><?=$list_meeting['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Countries wich will be invited to the Publicity Meeting</td>
                  <td>:</td>
                  <td><?=$list_meeting['countries'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Profile of the invited participants</td>
                  <td>:</td>
                  <td><?=$list_meeting['participant_profile'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of participants invited to the publicity meeting per partner country</td>
                  <td>:</td>
                  <td><?=$list_meeting['participant'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Number of total participants invited to the publicity meeting program</td>
                  <td>:</td>
                  <td><?=$list_meeting['participant_total'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Tools and materials that will be utilized for the publicity meeting</td>
                  <td>:</td>
                  <td><?=$list_meeting['tools_material'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Duration of the publicity meeting (days)</td>
                  <td>:</td>
                  <td><?=$list_meeting['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Location of the publicity meeting/td>
                  <td>:</td>
                  <td><?=$list_meeting['location'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Indicate budget of the training</td>
                  <td>:</td>
                  <td><?=$list_meeting['budget'];?></td>
                </tr>
              </table>        
            <?php } ?>

          <?php } ?>

          <?php if ($project['ab_jumlah_media']!=0) {?>

            <?php foreach($media as $list_media) { ?>
              <hr>
              <table class="table table-striped">
                <tr>
                  <td colspan="4"><b>Preparation audio, visual, and written promotional materials</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Activity Title</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_media['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Activity Description</td>
                  <td>:</td>
                  <td><?=$list_media['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Promotional materials that will be produced</td>
                  <td>:</td>
                  <td><?=$list_media['promotional'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Potential Producers of Promotional Materials</td>
                  <td>:</td>
                  <td><?=$list_media['potential'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Target Group</td>
                  <td>:</td>
                  <td><?=$list_media['target_group'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Ways and means of disseminating Promotional Material</td>
                  <td>:</td>
                  <td><?=$list_media['ways_mean'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Duration of Dissemination</td>
                  <td>:</td>
                  <td><?=$list_media['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Indicate budget of the training</td>
                  <td>:</td>
                  <td><?=$list_media['budget'];?></td>
                </tr>
              </table>        
            <?php } ?>

          <?php } ?>

          <?php if ($project['ab_jumlah_other_activities']!=0) {?>

            <?php foreach($other as $list_other) { ?>
              <hr>
              <table class="table table-striped">
                <tr>
                  <td colspan="4"><b>Other Activities</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Activity Title</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_other['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Activity Description</td>
                  <td>:</td>
                  <td><?=$list_other['description'];?></td>
                </tr>
              </table>        
            <?php } ?>

          <?php } ?>


        <?php } else {?>

          <hr>
          <table class="table table-striped">
            <tr>
              <td colspan="4"><b>General Qualifications Required for Potential Lead Project Researcher</b></td>
            </tr>
            <tr>
              <td style="width: 2%"></td>
              <td style="width: 25%">Education Level</td>
              <td style="width: 2%">:</td>
              <td><?=$project['education_level'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Major/Concentration/Field</td>
              <td>:</td>
              <td><?=$project['major'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Publication</td>
              <td>:</td>
              <td><?=$project['publication'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Practical experience in related field</td>
              <td>:</td>
              <td><?=$project['experience'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Other Qualification</td>
              <td>:</td>
              <td><?=$project['other_qualification'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Engslish Skill</td>
              <td>:</td>
              <td><?=$project['english_skill'];?></td>
            </tr>
          </table>        

        <?php } ?>

        <?php foreach($hr_coordinator as $list_hr_coordinator) { ?>
          <hr>
          <table class="table table-striped">
            <tr>
              <td colspan="4"><b>Human Resource for Coordinator</b></td>
            </tr>
            <tr>
              <td style="width: 2%"></td>
              <td style="width: 25%">Education Level</td>
              <td style="width: 2%">:</td>
              <td><?=$list_hr_coordinator['education_level'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Major/Concentration/Field</td>
              <td>:</td>
              <td><?=$list_hr_coordinator['major'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Practical experience in related field</td>
              <td>:</td>
              <td><?=$list_hr_coordinator['experience'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Other Qualification</td>
              <td>:</td>
              <td><?=$list_hr_coordinator['other_qualification'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Engslish Skill</td>
              <td>:</td>
              <td><?=$list_hr_coordinator['english_skill'];?></td>
            </tr>
          </table>        
        <?php } ?>

        <?php foreach($hr_trainer as $list_hr_trainer) { ?>
          <hr>
          <table class="table table-striped">
            <tr>
              <td colspan="4"><b>Human Resource for Trainer</b></td>
            </tr>
            <tr>
              <td style="width: 2%"></td>
              <td style="width: 25%">Trainer</td>
              <td style="width: 2%">:</td>
              <td><?=$list_hr_trainer['trainer'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Education Level</td>
              <td>:</td>
              <td><?=$list_hr_trainer['education_level'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Major/Concentration/Field</td>
              <td>:</td>
              <td><?=$list_hr_trainer['major'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Publication</td>
              <td>:</td>
              <td><?=$list_hr_trainer['publication'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Practical experience in related field</td>
              <td>:</td>
              <td><?=$list_hr_trainer['experience'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Other Qualification</td>
              <td>:</td>
              <td><?=$list_hr_trainer['other_qualification'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Engslish Skill</td>
              <td>:</td>
              <td><?=$list_hr_trainer['english_skill'];?></td>
            </tr>
          </table>        
        <?php } ?>

        <hr>
        <table class="table table-striped">
          <tr>
            <td colspan="2">Summary</td>
          </tr>
          <tr>
            <td style="width: 10px"></td>
            <td><?=$project['summary'];?></td>
          </tr>
        </table>     

      </div><!-- /.box-body -->

    </div><!-- /.box -->

  </section><!-- /.content -->

      <div class="modal-footer">
        <button type="button" id="btn_save" onclick="$('.content').printMe();" class="btn btn-primary print">Print</button>
        <button type="button" onclick="window.history.back();" title="Cancle" class="btn btn-default">Cancel</button>
    </div>

</div><!-- /.container -->
