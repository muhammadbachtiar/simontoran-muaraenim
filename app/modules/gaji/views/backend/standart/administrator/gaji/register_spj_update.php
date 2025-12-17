

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
        Register Gaji      <small>Edit Register Gaji</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/gaji'); ?>">Register Gaji <?= $jenis_gaji ?></a></li>
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
                            <h3 class="widget-user-username">Register Gaji <?= cclang($jenis_gaji) ?></h3>
                            <!--<h5 class="widget-user-desc">Edit Register SPJ</h5>-->
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/gaji/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_register_spj', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_register_spj', 
                            'method'  => 'POST'
                            ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                         
                        
                        
                        <div class="form-group " style="display:none">
                            <label for="bagian" class="col-sm-2 control-label">Bagian 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="bagian" id="bagian" data-placeholder="Select Bagian" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('masterbagian') as $row): ?>
                                    <option <?=  $row->id ==  $register_spj->bagian ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->nama_bagian; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        
                        
                         <input type="hidden" id="jenis_gaji" name="jenis_gaji" value="<?= $jenis_gaji ?>" >
                        
                        
                        <div class="form-group ">
                            <label for="sub_kegiatan" class="col-sm-2 control-label">Sub Kegiatan 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="sub_kegiatan" id="sub_kegiatan" data-placeholder="Select Sub Kegiatan" >
                                    <option value=""></option>
                                    <?php foreach ($sub as $row): ?>
                                    <option <?=  $row->id ==  $register_spj->sub_kegiatan ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->sub_kegiatan; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="no_spj" class="col-sm-2 control-label">No Ajuan SPJ
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_spj" id="no_spj" placeholder="No Spj" value="<?= set_value('no_spj', $register_spj->no_spj); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="tanggal_pengajuan" class="col-sm-2 control-label">Tanggal Pengajuan 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_pengajuan"  placeholder="Tanggal Pengajuan" id="tanggal_pengajuan" value="<?= set_value('register_spj_tanggal_pengajuan_name', $register_spj->tanggal_pengajuan); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="jenis_pengajuan" class="col-sm-2 control-label">Jenis Pengajuan 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="jenis_pengajuan" id="jenis_pengajuan" data-placeholder="Select Jenis Pengajuan" >
                                    <option value=""></option>
                                    <?php foreach ($jenis_ajuan_gaji as $row): ?>
                                    <option <?=  $row->jenis_ajuan_gaji ==  $register_spj->jenis_pengajuan ? 'selected' : ''; ?> value="<?= $row->jenis_ajuan_gaji ?>"><?= $row->jenis_ajuan_gaji; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="nominal" class="col-sm-2 control-label">Nominal 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?= set_value('nominal', $register_spj->nominal); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="no_pengantar" class="col-sm-2 control-label">No Pengantar 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_pengantar" id="no_pengantar" placeholder="No Pengantar" value="<?= set_value('no_pengantar', $register_spj->no_pengantar); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="tanggal_bku" class="col-sm-2 control-label">Tanggal BKU 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_bku"  placeholder="Tanggal Bku" id="tanggal_bku" value="<?= set_value('register_spj_tanggal_bku_name', $register_spj->tanggal_bku); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="no_spp" class="col-sm-2 control-label">No SPP 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_spp" id="no_spp" placeholder="No Spp" value="<?= set_value('no_spp', $register_spj->no_spp); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="tanggal_spp" class="col-sm-2 control-label">Tanggal SPP
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_spp"  placeholder="Tanggal Spp" id="tanggal_spp" value="<?= set_value('register_spj_tanggal_spp_name', $register_spj->tanggal_spp); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="no_spm" class="col-sm-2 control-label">No SPM
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_spm" id="no_spm" placeholder="No Spm" value="<?= set_value('no_spm', $register_spj->no_spm); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="tanggal_spm" class="col-sm-2 control-label">Tanggal SPM
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_spm"  placeholder="Tanggal Spm" id="tanggal_spm" value="<?= set_value('register_spj_tanggal_spm_name', $register_spj->tanggal_spm); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                        
                        
                        <div class="form-group ">
                            <label for="no_spm" class="col-sm-2 control-label">No SP2D
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_sp2d" id="no_sp2d" placeholder="No SP2D" value="<?= set_value('no_spm', $register_spj->no_sp2d); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label for="tanggal_spm" class="col-sm-2 control-label">Tanggal SP2D
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_sp2d"  placeholder="Tanggal SP2D" id="tanggal_sp2d" value="<?= set_value('register_spj_tanggal_sp2d_name', $register_spj->tanggal_sp2d); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                        
                        
                        <div class="form-group ">
                            <label for="no_spm" class="col-sm-2 control-label">No BKU
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_bku" id="no_bku" placeholder="No BKU" value="<?= set_value('no_bku', $register_spj->no_bku); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                       
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="tanggal_pengembalian" class="col-sm-2 control-label">Tanggal Pengembalian 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_pengembalian"  placeholder="Tanggal Pengembalian" id="tanggal_pengembalian" value="<?= set_value('register_spj_tanggal_pengembalian_name', $register_spj->tanggal_pengembalian); ?>">
                            </div>
                            <small class="info help-block">
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
              window.location.href = BASE_URL + 'administrator/gaji/<?= $jenis_gaji?>';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_register_spj = $('#form_register_spj');
        var data_post = form_register_spj.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_register_spj.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#register_spj_image_galery').find('li').attr('qq-file-id');
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