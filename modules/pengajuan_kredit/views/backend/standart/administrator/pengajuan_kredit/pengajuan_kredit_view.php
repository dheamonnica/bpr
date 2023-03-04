<script type="text/javascript">
function domo(){
   $('*').bind('keydown', 'Ctrl+e', function() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function() {
      $('#btn_back').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<section class="content-header">
   <h1>
      Pengajuan Kredit      <small><?= cclang('detail', ['Pengajuan Kredit']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/pengajuan_kredit'); ?>">Pengajuan Kredit</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <h3 class="widget-user-username">Pengajuan Kredit</h3>
                     <h5 class="widget-user-desc">Detail Pengajuan Kredit</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_pengajuan_kredit" id="form_pengajuan_kredit" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id"><?= _ent($pengajuan_kredit->id); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Nama Lengkap </label>

                        <div class="col-sm-8">
                        <span class="detail_group-nama_lengkap"><?= _ent($pengajuan_kredit->nama_lengkap); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> File Ktp </label>
                        <div class="col-sm-8">
                             <?php if (is_image($pengajuan_kredit->file_ktp)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp; ?>">
                                <img src="<?= BASE_URL . 'uploads/pengajuan_kredit/' . $pengajuan_kredit->file_ktp; ?>" class="image-responsive" alt="image pengajuan_kredit" title="file_ktp pengajuan_kredit" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/pengajuan_kredit/' . $pengajuan_kredit->file_ktp; ?>">
                                 <img src="<?= get_icon_file($pengajuan_kredit->file_ktp); ?>" class="image-responsive" alt="image pengajuan_kredit" title="file_ktp <?= $pengajuan_kredit->file_ktp; ?>" width="40px"> 
                               <?= $pengajuan_kredit->file_ktp ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">No Hp </label>

                        <div class="col-sm-8">
                        <span class="detail_group-no_hp"><?= _ent($pengajuan_kredit->no_hp); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Jumlah Pinjaman </label>

                        <div class="col-sm-8">
                        <span class="detail_group-jumlah_pinjaman"><?= _ent($pengajuan_kredit->jumlah_pinjaman); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Jangka Waktu </label>

                        <div class="col-sm-8">
                        <span class="detail_group-jangka_waktu"><?= _ent($pengajuan_kredit->jangka_waktu); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Jenis Pinjaman </label>

                        <div class="col-sm-8">
                        <span class="detail_group-jenis_pinjaman"><?= _ent($pengajuan_kredit->jenis_pinjaman); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Jaminan </label>

                        <div class="col-sm-8">
                        <span class="detail_group-jaminan"><?= _ent($pengajuan_kredit->jaminan); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Created At </label>

                        <div class="col-sm-8">
                        <span class="detail_group-created_at"><?= _ent($pengajuan_kredit->created_at); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Updated At </label>

                        <div class="col-sm-8">
                        <span class="detail_group-updated_at"><?= _ent($pengajuan_kredit->updated_at); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Updated By </label>

                        <div class="col-sm-8">
                        <span class="detail_group-updated_by"><?= _ent($pengajuan_kredit->updated_by); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                        <span class="detail_group-status"><?= _ent($pengajuan_kredit->status); ?></span>
                        </div>
                    </div>
                                        
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('pengajuan_kredit_update', function() use ($pengajuan_kredit){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit pengajuan_kredit (Ctrl+e)" href="<?= site_url('administrator/pengajuan_kredit/edit/'.$pengajuan_kredit->id); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Pengajuan Kredit']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/pengajuan_kredit/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Pengajuan Kredit']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
$(document).ready(function(){

    "use strict";
    
   
   });
</script>