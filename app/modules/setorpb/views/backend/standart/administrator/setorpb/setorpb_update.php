
<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>



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
        Pemindahbukuan (PB)        <small>Edit Pemindahbukuan (PB)</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/setorpb'); ?>">Pemindahbukuan (PB)</a></li>
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
                            <h3 class="widget-user-username">Pemindahbukuan (PB)</h3>
                            <h5 class="widget-user-desc">Edit Pemindahbukuan (PB)</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/setorpb/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_setorpb', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_setorpb', 
                            'method'  => 'POST'
                            ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                         
                        
                        
                        <div class="form-group ">
                            <label for="tanggal_pb" class="col-sm-2 control-label">Tanggal Pb 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_pb"  placeholder="Tanggal Pb" id="tanggal_pb" value="<?= set_value('setorpb_tanggal_pb_name', $setorpb->tanggal_pb); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="nominal" class="col-sm-2 control-label">Nominal 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?= set_value('nominal', $setorpb->nominal); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        
                         
                        
                        
                        <div class="form-group ">
                            <label for="sub_kegiatan" class="col-sm-2 control-label">Sub Kegiatan 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="sub_kegiatan" id="sub_kegiatan" data-placeholder="Select Sub Kegiatan" >
                                    <option value=""></option>
                                    <?php
                                    if($this->aauth->is_member('bpp bagian')){
                                    $this->db->where('sub_kegiatan.bagian',$this->session->id_bagian);
                                    }
                                    $data = $this->db->get('sub_kegiatan')->result();
                                    
                                    ?>
                                    <?php foreach ($data as $row): ?>
                                    <option <?=  $row->id ==  $setorpb->sub_kegiatan ? 'selected' : ''; ?> value="<?= $row->id ?>"><?= $row->sub_kegiatan; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label for="lampiran" class="col-sm-2 control-label">Lampiran 
                            </label>
                            <div class="col-sm-8">
                                <div id="tes_upload_lampiran_galery"></div>
                                <div id="tes_upload_lampiran_galery_listed">
                                <?php foreach ((array) explode(',', $setorpb->lampiran) as $idx => $filename): ?>
                                    <input type="hidden" class="listed_file_uuid" name="tes_upload_lampiran_uuid[<?= $idx ?>]" value="" /><input type="hidden" class="listed_file_name" name="tes_upload_lampiran_name[<?= $idx ?>]" value="<?= $filename; ?>" />
                                <?php endforeach; ?>
                                </div>
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
              window.location.href = BASE_URL + 'administrator/setorpb';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_setorpb = $('#form_setorpb');
        var data_post = form_setorpb.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_setorpb.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#setorpb_image_galery').find('li').attr('qq-file-id');
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
      
       
              var params = {};
       params[csrf] = token;

       $('#tes_upload_lampiran_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/setorpb/upload_lampiran_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/setorpb/delete_lampiran_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
           session : {
             endpoint: BASE_URL + 'administrator/setorpb/get_lampiran_file/<?= $setorpb->id; ?>',
             refreshOnRequest:true
           },
          validation: {
              allowedExtensions: ["*"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#tes_upload_lampiran_galery').fineUploader('getUuid', id);
                   $('#tes_upload_lampiran_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="tes_upload_lampiran_uuid['+id+']" value="'+uuid+'" /><input type="hidden" class="listed_file_name" name="tes_upload_lampiran_name['+id+']" value="'+xhr.uploadName+'" />');
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#tes_upload_lampiran_galery_listed').find('.listed_file_uuid[name="tes_upload_lampiran_uuid['+id+']"]').remove();
                  $('#tes_upload_lampiran_galery_listed').find('.listed_file_name[name="tes_upload_lampiran_name['+id+']"]').remove();
                }
              }
          }
      }); /*end lampiran galery*/       
       
       

      async function chain(){
      }
       
      chain();


    
    
    }); /*end doc ready*/
</script>