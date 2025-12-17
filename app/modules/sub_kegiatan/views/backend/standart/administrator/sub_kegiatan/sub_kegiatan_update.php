

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
        Sub Kegiatan        <small>Edit Sub Kegiatan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/sub_kegiatan'); ?>">Sub Kegiatan</a></li>
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
                            <h3 class="widget-user-username">Sub Kegiatan</h3>
                            <h5 class="widget-user-desc">Edit Sub Kegiatan</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/sub_kegiatan/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_sub_kegiatan', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_sub_kegiatan', 
                            'method'  => 'POST'
                            ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                         
                        
                        
                        <div class="form-group ">
                            <label for="kegiatan" class="col-sm-2 control-label">Kegiatan 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="kegiatan" id="kegiatan" data-placeholder="Select Kegiatan" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('kegiatan') as $row): ?>
                                    <option <?=  $row->id ==  $sub_kegiatan->kegiatan ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->nama_kegiatan; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="sub_kegiatan" class="col-sm-2 control-label">Sub Kegiatan 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sub_kegiatan" id="sub_kegiatan" placeholder="Sub Kegiatan" value="<?= set_value('sub_kegiatan', $sub_kegiatan->sub_kegiatan); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="bagian" class="col-sm-2 control-label">Bagian 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="bagian" id="bagian" data-placeholder="Select Bagian" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('masterbagian') as $row): ?>
                                    <option <?=  $row->id ==  $sub_kegiatan->bagian ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->nama_bagian; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="pagu_anggaran" class="col-sm-2 control-label">Pagu Anggaran 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="pagu_anggaran" id="pagu_anggaran" placeholder="Pagu Anggaran" value="<?= set_value('pagu_anggaran', $sub_kegiatan->pagu_anggaran); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                        
                                                 <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
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
              window.location.href = BASE_URL + 'administrator/sub_kegiatan';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_sub_kegiatan = $('#form_sub_kegiatan');
        var data_post = form_sub_kegiatan.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_sub_kegiatan.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#sub_kegiatan_image_galery').find('li').attr('qq-file-id');
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