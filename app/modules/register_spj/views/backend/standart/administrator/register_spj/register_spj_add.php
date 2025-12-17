
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
        Register SPJ        <small><?= cclang('new', ['Register SPJ']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/register_spj'); ?>">Register SPJ</a></li>
        <li class="active"><?= cclang('new'); ?></li>
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
                            <h3 class="widget-user-username">Register SPJ</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Register SPJ']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_register_spj', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_register_spj', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>
                         
                                                                        <div class="form-group ">
                            <label for="bagian" class="col-sm-2 control-label">Bagian 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="bagian" id="bagian" data-placeholder="Select Bagian" >
                                    <option value=""></option>
                                    
                                    <?php
                                    if($this->aauth->is_member('bpp bagian')){
                                    
                                     $this->db->where('id',$this->session->id_bagian);
                                    }
                                   
                                    $data = $this->db->get('masterbagian')->result();
                                    
                                    ?>
                                    
                                    <?php foreach ($data as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->nama_bagian; ?></option>
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
                                <select  class="form-control chosen chosen-select-deselect" name="sub_kegiatan" id="sub_kegiatan" data-placeholder="Select Sub Kegiatan" >
                                    <option value=""></option>
                                     <?php
                                    if($this->aauth->is_member('bpp bagian')){
                                    
                                     $this->db->where('bagian',$this->session->id_bagian);
                                    }
                                   
                                    $data2 = $this->db->get('sub_kegiatan')->result();
                                    
                                    ?>
                                    
                                    <?php foreach ($data2 as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->sub_kegiatan; ?></option>
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
                                <input type="text" class="form-control" name="no_spj" id="no_spj" placeholder="No Spj" value="<?= set_value('no_spj'); ?>">
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
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_pengajuan"  placeholder="Tanggal Pengajuan" id="tanggal_pengajuan">
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
                                    <?php foreach (db_get_all_data('jenis_pengajuan') as $row): ?>
                                    <option value="<?= $row->jenis_pengajuan ?>"><?= $row->jenis_pengajuan; ?></option>
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
                                <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?= set_value('nominal'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        

                                                 
                                                                        <div class="form-group " style="display:none">
                            <label for="no_pengantar" class="col-sm-2 control-label">No Pengantar 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_pengantar" id="no_pengantar" placeholder="No Pengantar" value="<?= set_value('no_pengantar'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        

                                                 
                                                                        <div class="form-group " style="display:none">
                            <label for="tanggal_bku" class="col-sm-2 control-label">Tanggal BKU 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_bku"  placeholder="Tanggal Bku" id="tanggal_bku">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                        

                                                 
                                                                        <div class="form-group " style="display:none">
                            <label for="no_spp" class="col-sm-2 control-label">No SPP 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_spp" id="no_spp" placeholder="No Spp" value="<?= set_value('no_spp'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        

                                                 
                                                                        <div class="form-group " style="display:none">
                            <label for="tanggal_spp" class="col-sm-2 control-label">Tanggal SPP 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_spp"  placeholder="Tanggal Spp" id="tanggal_spp">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                        

                                                 
                                                                        <div class="form-group " style="display:none">
                            <label for="no_spm" class="col-sm-2 control-label">No Spm 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_spm" id="no_spm" placeholder="No Spm" value="<?= set_value('no_spm'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        

                                                 
                                                                        <div class="form-group " style="display:none">
                            <label for="tanggal_spm" class="col-sm-2 control-label">Tanggal Spm 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_spm"  placeholder="Tanggal Spm" id="tanggal_spm">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                        

                                                 
                                                                        <div class="form-group " style="display:none">
                            <label for="tanggal_pengembalian" class="col-sm-2 control-label">Tanggal Pengembalian 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="tanggal_pengembalian"  placeholder="Tanggal Pengembalian" id="tanggal_pengembalian">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                        

                                                
                        
                                                <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                           <!--<button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">-->
                           <!-- <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>-->
                           <!-- </button>-->
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
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
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
              window.location.href = BASE_URL + 'administrator/register_spj';
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
          url: BASE_URL + '/administrator/register_spj/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('.steps li').removeClass('error');
          $('form').find('.error-input').remove();
          if(res.success) {
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
          } else {
            if (res.errors) {
                
                $.each(res.errors, function(index, val) {
                    $('form #'+index).parents('.form-group').addClass('has-error');
                    $('form #'+index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">`+val+`</div>
                      `);
                });
                $('.steps li').removeClass('error');
                $('.content section').each(function(index, el) {
                    if ($(this).find('.has-error').length) {
                        $('.steps li:eq('+index+')').addClass('error').find('a').trigger('click');
                    }
                });
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
      
       
 
       

      
    
    
    }); /*end doc ready*/
</script>