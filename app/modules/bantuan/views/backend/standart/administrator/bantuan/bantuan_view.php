
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Detail Pertanyaan</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?= site_url('administrator/bantuan'); ?>">Bantuan</a></li>
    <li class="active">Detail</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <ul class="timeline">
        <!-- Label tanggal pertanyaan -->
        <li class="time-label">
          <span class="bg-red"><?= tanggal_indonesia($detail->waktu,false); ?></span>
        </li>

        <!-- Item pertanyaan -->
        <li>
          <i class="fa fa-user bg-aqua"></i>
          <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?= jam_indonesia($detail->waktu,false); ?></span>
            <h3 class="timeline-header">
              <a href="#"><?= _ent($detail->full_name); ?></a> mengatakan.....
            </h3>
            <div class="timeline-body">
              <h3 class="timeline-header"><?= _ent($detail->judul); ?></h3>
              <?= nl2br(_ent($detail->konten)); ?>
            </div>
            <div class="timeline-footer">
              <a href="<?= site_url('administrator/bantuan'); ?>" class="btn btn-default btn-xs">
                <i class="fa fa-arrow-left"></i> Kembali
              </a>
             
            </div>
          </div>
        </li>

        <!-- Komentar (timeline) -->
        <?php $last_date = null; foreach ($comments as $c): 
              $c_date = date('Y-m-d', strtotime($c->waktu));
              if ($c_date !== $last_date): ?>
          <li class="time-label">
            <span class="bg-green"><?= tanggal_indonesia($c->waktu,false); ?></span>
          </li>
        <?php $last_date = $c_date; endif; ?>

        <li>
          <i class="fa fa-comments bg-yellow"></i>
          <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?= jam_indonesia($c->waktu,false); ?></span>
            <h3 class="timeline-header">
              <a href="#"><?= _ent($c->full_name); ?></a> berkomentar
            </h3>
            <div class="timeline-body">
              <?= nl2br(_ent($c->komentar)); ?>
            </div>
            <div class="timeline-footer">
              <?php if ($c->id_user == get_user_data('id') || $this->aauth->is_admin()): ?>
                <a class="btn btn-danger btn-xs"
                   href="<?= site_url('administrator/bantuan/comment_delete/'.$detail->id.'/'.$c->id); ?>">
                   <i class="fa fa-trash"></i> Hapus
                </a>
              <?php endif; ?>
            </div>
          </div>
        </li>
        <?php endforeach; ?>

        <!-- Form tambah komentar -->
        <?php 
// cek apakah user pemilik pertanyaan atau punya izin 'bantuan_komentar'
$can_comment = ($detail->user == get_user_data('id')) || $this->aauth->is_allowed('bantuan_komentar'); 
?>

<?php if ($can_comment): ?>
<li>
  <i class="fa fa-pencil bg-purple"></i>
  <div class="timeline-item">
    <h3 class="timeline-header">Tulis Komentar</h3>
    <div class="timeline-body">
      <form action="<?= site_url('administrator/bantuan/comment_save/'.$detail->id); ?>" method="post">
        <input type="hidden" 
               name="<?= $this->security->get_csrf_token_name(); ?>" 
               value="<?= $this->security->get_csrf_hash(); ?>">

        <div class="form-group">
          <textarea name="komentar" rows="4" class="form-control" required></textarea>
        </div>
        <button class="btn btn-primary">
          <i class="fa fa-paper-plane"></i> Kirim
        </button>
      </form>
    </div>
  </div>
</li>
<?php endif; ?>
<!-- akkhir tambah komentar --> 

        <li><i class="fa fa-clock-o bg-gray"></i></li>
      </ul>
    </div>
  </div>
</section>

<script>
$(function(){
  $('.remove-data').click(function(){
    var url = $(this).data('href');
    swal({
      title: "<?= cclang('are_you_sure'); ?>",
      text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
      cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
      closeOnConfirm: true,
      closeOnCancel: true
    }, function(isConfirm){ if (isConfirm) document.location.href = url; });
  });
});
</script>
