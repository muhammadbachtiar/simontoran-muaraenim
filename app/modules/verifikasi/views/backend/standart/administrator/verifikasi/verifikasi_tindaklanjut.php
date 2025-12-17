

<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Verifikasi SPJ        <small>Edit Verifikasi SPJ</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/verifikasi'); ?>">Verifikasi SPJ</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Verifikasi SPJ</h3>
                            <h5 class="widget-user-desc">Edit Verifikasi SPJ</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/verifikasi/edit_tindaklanjut/'.$this->uri->segment(4)), [
                            'name'    => 'form_verifikasi', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_verifikasi', 
                            'method'  => 'POST'
                            ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                         
                        
                        
                        <div class="form-group ">
                            <label for="spj" class="col-sm-2 control-label">Spj 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" readonly name="spj" id="spj" data-placeholder="Select Spj" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('register_spj') as $row): ?>
                                    <option <?=  $row->id ==  $verifikasi->spj ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->no_spj; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                        <div class="form-group ">
                            <label for="verifikator" class="col-sm-2 control-label">Tanggal 
                            </label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="tanggal" id="tanggal" readonly placeholder="Tanggal" value="<?= set_value('', $verifikasi->tanggal); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="uraian" class="col-sm-2 control-label">Uraian 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="uraian" name="uraian" rows="5" class="textarea form-control" readonly><?= set_value('uraian', $verifikasi->uraian); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                         
                        
                        
                        
                        
                        
                        <div class="form-group ">
                            <label for="dicukupi" class="col-sm-2 control-label">Tindak Lanjut 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="tindak_lanjut" id="tindak_lanjut" data-placeholder="Select Tindak Lanjut" >
                                    <option value=""></option>
                                    <option <?= $verifikasi->tindak_lanjut == "Ya" ? 'selected' :''; ?> value="Ya">Ya</option>
                                    <option <?= $verifikasi->tindak_lanjut == "Belum" ? 'selected' :''; ?> value="Belum">Belum</option>
                                    <option <?= $verifikasi->tindak_lanjut == "Diperhatikan" ? 'selected' :''; ?> value="Diperhatikan">Diperhatikan</option>
                                    </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                        <div class="form-group ">
                            <label for="keterangan" class="col-sm-2 control-label">Keterangan 
                            <i class="required"></i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="keterangan" name="keterangan" rows="5" class="textarea form-control" ><?= set_value('keterangan', $verifikasi->keterangan); ?></textarea>
                                <small class="info help-block"> Bisa diisi atau dikosongi sesuai kebutuhan
                                </small>
                            </div>
                        </div>
                        
                        
                         
                        
                        
                       
                        
                        
                        
                                                 <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <!--<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">-->
                            <!--<i class="fa fa-save" ></i> <?= cclang('save_button'); ?>-->
                            <!--</button>-->
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                                                 <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
       
      
             
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/verifikasi/index?bulk=&q=<?= $verifikasi->spj ?>&f=spj&sbtn=Apply';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_verifikasi = $('#form_verifikasi');
        var data_post = form_verifikasi.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_verifikasi.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#verifikasi_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            if (res.errors) {
               parseErrorField(res.errors);
            }
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
       
       

      async function chain(){
      }
       
      chain();


    
    
    }); /*end doc ready*/
</script>