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
      Kaji Ulang
      <small>Buat Proyek</small>
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
        <h3 class="box-title">File</h3>
      </div>
      <div class="box-body">

        <table class="table table-striped">
          <tr>
            <td colspan="2">Kode Proyek</td>
          </tr>
          <tr>
            <td style="width: 10px"></td>
            <td><?=$project['project_code'];?></td>
          </tr>
          <tr>
            <td colspan="2">Judul Proyek</td>
          </tr>
          <tr>
            <td></td>
            <td><?=$project['title'];?></td>
          </tr>
          <tr>
            <td colspan="2">Area Kerjasama</td>
          </tr>
          <tr>
            <td></td>
            <td><?=$project['cooperation_area'];?></td>
          </tr>
          <tr>
            <td colspan="2">Relevansi</td>
          </tr>
          <tr>
            <td></td>
            <td><?=$this->vf->getFieldById('relevance', 'relevance', 'id', $project['relevance']);?></td>
          </tr>
        </table>     
        <hr>
        <table class="table table-striped">
          <tr>
            <td colspan="4"><b>Penanggung Jawab</b></td>
          </tr>
          <tr>
            <td style="width: 2%"></td>
            <td style="width: 10%">Nama</td>
            <td style="width: 2%">:</td>
            <td><?=$project['ra_name'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Judul</td>
            <td>:</td>
            <td><?=$project['ra_title'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Alamat/td>
            <td>:</td>
            <td><?=$project['ra_address'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Telepon</td>
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
            <td colspan="4"><b>Personil Kontak</b></td>
          </tr>
          <tr>
            <td style="width: 2%"></td>
            <td style="width: 10%">Nama</td>
            <td style="width: 2%">:</td>
            <td><?=$project['cp_name'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Judul</td>
            <td>:</td>
            <td><?=$project['cp_title'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Alamat</td>
            <td>:</td>
            <td><?=$project['cp_address'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Telepon</td>
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
            <td colspan="2">Durasi</td>
          </tr>
          <tr>
            <td style="width: 10px"></td>
            <td><?=$project['duration'];?> Bulan</td>
          </tr>
        </table>     

        <hr>
        <table class="table table-striped">
          <tr>
            <td colspan="2">Mitra Proyek</td>
          </tr>
          <tr>
            <td style="width: 10px"></td>
            <td>
              <table style="">
                <tr>
                  <td style="width: 50%; text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid">Negara</td>
                  <td style="width: 50%; text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid">Jelaskan Dasar Pemilihan dan Peran Mitra Proyek</td>
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
            <td colspan="4"><b>Kepentingan Proyek</b></td>
          </tr>
          <tr>
            <td style="width: 2%"></td>
            <td style="width: 25%">Tujuan Keseluruhan</td>
            <td style="width: 2%">:</td>
            <td><?=$project['overall_objective'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Tujuan Proyek</td>
            <td>:</td>
            <td><?=$project['project_purpose'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Grup Target</td>
            <td>:</td>
            <td><?=$project['target_group'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>Kontribusi terhadap Kerjasama Multilateral</td>
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
                  <td colspan="4"><b>Pelatihan</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Judul Aktivitas</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_training['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Deskripsi Aktivitas</td>
                  <td>:</td>
                  <td><?=$list_training['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Negara yang Diundang</td>
                  <td>:</td>
                  <td><?=$list_training['countries'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Partisipan tiap Negara Mitra</td>
                  <td>:</td>
                  <td><?=$list_training['participant'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Total Partisipan yang Diundang</td>
                  <td>:</td>
                  <td><?=$list_training['participant_total'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Pelatih yang Diperlukan</td>
                  <td>:</td>
                  <td><?=$list_training['trainer'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Durasi Pelatihan (hari)</td>
                  <td>:</td>
                  <td><?=$list_training['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Lokasi Pelatihan</td>
                  <td>:</td>
                  <td><?=$list_training['location'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Hari Menginap</td>
                  <td>:</td>
                  <td><?=$list_training['days'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Tiket Pesawat (PP)</td>
                  <td>:</td>
                  <td><?=$list_training['ticket'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Keterangan Tambahan</td>
                  <td>:</td>
                  <td><?=$list_training['detail'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Budget Pelatihan</td>
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
                  <td style="width: 25%">Judul Aktivitas</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_workshop['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Deskripsi Aktivitas</td>
                  <td>:</td>
                  <td><?=$list_workshop['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Negara Peserta</td>
                  <td>:</td>
                  <td><?=$list_workshop['countries'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Partisipan tiap Negara Mitra</td>
                  <td>:</td>
                  <td><?=$list_workshop['participant'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Total Partisipan</td>
                  <td>:</td>
                  <td><?=$list_workshop['participant_total'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Durasi Workshop (hari)</td>
                  <td>:</td>
                  <td><?=$list_workshop['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Lokasi Workshop</td>
                  <td>:</td>
                  <td><?=$list_workshop['location'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Hari Menginap</td>
                  <td>:</td>
                  <td><?=$list_workshop['days'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Tiket Pesawat(PP)</td>
                  <td>:</td>
                  <td><?=$list_workshop['ticket'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Hasil Workshop</td>
                  <td>:</td>
                  <td><?=$list_workshop['output'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Budget Workshop</td>
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
                  <td colspan="4"><b>Studi Banding</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Judul Aktivitas</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_study_visit['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Deskripsi Aktivitas</td>
                  <td>:</td>
                  <td><?=$list_study_visit['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Pelatihan Terkait</td>
                  <td>:</td>
                  <td><?=$list_study_visit['related_training'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Kontribusi</td>
                  <td>:</td>
                  <td><?=$list_study_visit['contribution'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Tujuan</td>
                  <td>:</td>
                  <td><?=$list_study_visit['destination'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Personil</td>
                  <td>:</td>
                  <td><?=$list_study_visit['personel'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Durasi</td>
                  <td>:</td>
                  <td><?=$list_study_visit['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Tiket Pesawat (PP)</td>
                  <td>:</td>
                  <td><?=$list_study_visit['ticket'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Hari Menginap</td>
                  <td>:</td>
                  <td><?=$list_study_visit['days'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Budget Studi Banding</td>
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
                  <td style="width: 25%">Judul Aktivitas</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_seminar['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Deskripsi Aktivitas</td>
                  <td>:</td>
                  <td><?=$list_seminar['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Pembicara</td>
                  <td>:</td>
                  <td><?=$list_seminar['speakers'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Negara Partisipan</td>
                  <td>:</td>
                  <td><?=$list_seminar['countries'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Partisipan tiap Negara Mitra</td>
                  <td>:</td>
                  <td><?=$list_seminar['participant'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Total Partisipan</td>
                  <td>:</td>
                  <td><?=$list_seminar['participant_total'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Durasi Seminar (hari))</td>
                  <td>:</td>
                  <td><?=$list_seminar['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Lokasi Seminar</td>
                  <td>:</td>
                  <td><?=$list_seminar['location'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Hari Menginap</td>
                  <td>:</td>
                  <td><?=$list_seminar['days'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Tiket Pesawat (PP)</td>
                  <td>:</td>
                  <td><?=$list_seminar['ticket'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Keterangan Tambahan</td>
                  <td>:</td>
                  <td><?=$list_seminar['detail'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Budget Seminar</td>
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
                  <td colspan="4"><b>Rapat</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Judul Aktivitas</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_meeting['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Deskripsi Aktivitas</td>
                  <td>:</td>
                  <td><?=$list_meeting['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Negara Partisipan</td>
                  <td>:</td>
                  <td><?=$list_meeting['countries'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Profil Negara Partisipan</td>
                  <td>:</td>
                  <td><?=$list_meeting['participant_profile'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Partisipan tiap Negara Mitra</td>
                  <td>:</td>
                  <td><?=$list_meeting['participant'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Jumlah Total Partisipan</td>
                  <td>:</td>
                  <td><?=$list_meeting['participant_total'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Bahan dan Material yang digunakan pada Rapat Publik</td>
                  <td>:</td>
                  <td><?=$list_meeting['tools_material'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Durasi Rapat Publik (hari)</td>
                  <td>:</td>
                  <td><?=$list_meeting['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Lokasi Rapat Publik</td>
                  <td>:</td>
                  <td><?=$list_meeting['location'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Budget</td>
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
                  <td colspan="4"><b>Persiapan Material Promosi Audio, Visual dan Tulis</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Judul Aktivitas</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_media['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Deskripsi Aktivitas</td>
                  <td>:</td>
                  <td><?=$list_media['description'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Material Promosi yang Diproduksi</td>
                  <td>:</td>
                  <td><?=$list_media['promotional'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Potensial Produsen Material Promosi</td>
                  <td>:</td>
                  <td><?=$list_media['potential'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Grup Target</td>
                  <td>:</td>
                  <td><?=$list_media['target_group'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Cara Diseminasi Material Promosi</td>
                  <td>:</td>
                  <td><?=$list_media['ways_mean'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Durasi Diseminasi</td>
                  <td>:</td>
                  <td><?=$list_media['duration'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Budget</td>
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
                  <td colspan="4"><b>Aktivitas Lainnya</b></td>
                </tr>
                <tr>
                  <td style="width: 2%"></td>
                  <td style="width: 25%">Judul Aktivitas</td>
                  <td style="width: 2%">:</td>
                  <td><?=$list_other['title'];?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>Deskripsi Aktivitas</td>
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
              <td colspan="4"><b>Kualifikasi Umum Pemimpin Proyek Penelitian Potensial</b></td>
            </tr>
            <tr>
              <td style="width: 2%"></td>
              <td style="width: 25%">Pendidikan</td>
              <td style="width: 2%">:</td>
              <td><?=$project['education_level'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Bidangd</td>
              <td>:</td>
              <td><?=$project['major'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Publikasi/td>
              <td>:</td>
              <td><?=$project['publication'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Pengalaman</td>
              <td>:</td>
              <td><?=$project['experience'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Kualifikasi Lainnya</td>
              <td>:</td>
              <td><?=$project['other_qualification'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Kemampuan Bahasa Inggris</td>
              <td>:</td>
              <td><?=$project['english_skill'];?></td>
            </tr>
          </table>        

        <?php } ?>

        <?php foreach($hr_coordinator as $list_hr_coordinator) { ?>
          <hr>
          <table class="table table-striped">
            <tr>
              <td colspan="4"><b>Koordinator SDM</b></td>
            </tr>
            <tr>
              <td style="width: 2%"></td>
              <td style="width: 25%">Pendidikan</td>
              <td style="width: 2%">:</td>
              <td><?=$list_hr_coordinator['education_level'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Bidang</td>
              <td>:</td>
              <td><?=$list_hr_coordinator['major'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Pengalaman</td>
              <td>:</td>
              <td><?=$list_hr_coordinator['experience'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Kualifikasi Lainnya</td>
              <td>:</td>
              <td><?=$list_hr_coordinator['other_qualification'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Kemampuan Bahasa Inggris</td>
              <td>:</td>
              <td><?=$list_hr_coordinator['english_skill'];?></td>
            </tr>
          </table>        
        <?php } ?>

        <?php foreach($hr_trainer as $list_hr_trainer) { ?>
          <hr>
          <table class="table table-striped">
            <tr>
              <td colspan="4"><b>Pelatih SDM</b></td>
            </tr>
            <tr>
              <td style="width: 2%"></td>
              <td style="width: 25%">SDM</td>
              <td style="width: 2%">:</td>
              <td><?=$list_hr_trainer['trainer'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Pendidikan</td>
              <td>:</td>
              <td><?=$list_hr_trainer['education_level'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Bidang/td>
              <td>:</td>
              <td><?=$list_hr_trainer['major'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Publikasi</td>
              <td>:</td>
              <td><?=$list_hr_trainer['publication'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Pengalaman</td>
              <td>:</td>
              <td><?=$list_hr_trainer['experience'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Kualifikasi Lainnya</td>
              <td>:</td>
              <td><?=$list_hr_trainer['other_qualification'];?></td>
            </tr>
            <tr>
              <td></td>
              <td>Kemampuan Bahasa Inggris</td>
              <td>:</td>
              <td><?=$list_hr_trainer['english_skill'];?></td>
            </tr>
          </table>        
        <?php } ?>

        <hr>
        <table class="table table-striped">
          <tr>
            <td colspan="2">Intisari</td>
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
        <button type="button" id="btn_save" onclick="$('.content').printMe();" class="btn btn-primary print">Cetak</button>
        <button type="button" onclick="window.history.back();" title="Cancle" class="btn btn-default">Batal</button>
    </div>

</div><!-- /.container -->
