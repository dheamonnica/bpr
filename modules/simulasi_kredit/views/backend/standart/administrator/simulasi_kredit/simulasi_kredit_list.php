<script type="text/javascript">
function domo(){
 
   $('*').bind('keydown', 'Ctrl+a', function() {
       window.location.href = BASE_URL + '/administrator/Simulasi_kredit/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<section class="content-header">
   <h1>
      <?= cclang('simulasi_kredit') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('simulasi_kredit') ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('simulasi_kredit_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('simulasi_kredit')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/simulasi_kredit/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('simulasi_kredit')]); ?></a>
                        <?php }) ?>
                        <!-- <?php is_allowed('simulasi_kredit_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('simulasi_kredit') ?> " href="<?= site_url('administrator/simulasi_kredit/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?> -->
                                                <!-- <?php is_allowed('simulasi_kredit_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('simulasi_kredit') ?> " href="<?= site_url('administrator/simulasi_kredit/export_pdf?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?> -->
                                             </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('simulasi_kredit') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('simulasi_kredit')]); ?>  <i class="label bg-yellow"><?= $simulasi_kredit_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_simulasi_kredit" id="form_simulasi_kredit" action="<?= base_url('administrator/simulasi_kredit/index'); ?>">
                  


                     <!-- /.widget-user -->
                  <div class="row">
                     <div class="col-md-8">
                                                <div class="col-sm-2 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                                                         <option value="delete">Delete</option>
                                                      </select>
                        </div>
                        <div class="col-sm-2 padd-left-0 ">
                           <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                        </div>
                                                <div class="col-sm-3 padd-left-0  " >
                           <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                        </div>
                        <div class="col-sm-3 padd-left-0 " >
                           <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                              <option value=""><?= cclang('all'); ?></option>
                               <option <?= $this->input->get('f') == 'plafond' ? 'selected' :''; ?> value="plafond">Plafond</option>
                            <option <?= $this->input->get('f') == 'jangkawaktu_12' ? 'selected' :''; ?> value="jangkawaktu_12">Jangkawaktu 12</option>
                            <option <?= $this->input->get('f') == 'jangkawaktu_18' ? 'selected' :''; ?> value="jangkawaktu_18">Jangkawaktu 18</option>
                            <option <?= $this->input->get('f') == 'jangkawaktu_24' ? 'selected' :''; ?> value="jangkawaktu_24">Jangkawaktu 24</option>
                            <option <?= $this->input->get('f') == 'jangkawaktu_30' ? 'selected' :''; ?> value="jangkawaktu_30">Jangkawaktu 30</option>
                            <option <?= $this->input->get('f') == 'jangkawaktu_36' ? 'selected' :''; ?> value="jangkawaktu_36">Jangkawaktu 36</option>
                            <option <?= $this->input->get('f') == 'jangkawaktu_48' ? 'selected' :''; ?> value="jangkawaktu_48">Jangkawaktu 48</option>
                            <option <?= $this->input->get('f') == 'jangkawaktu_60' ? 'selected' :''; ?> value="jangkawaktu_60">Jangkawaktu 60</option>
                           </select>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                           Filter
                           </button>
                        </div>
                        <div class="col-sm-1 padd-left-0 ">
                           <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/simulasi_kredit');?>" title="<?= cclang('reset_filter'); ?>">
                           <i class="fa fa-undo"></i>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                           <?= $pagination; ?>
                        </div>
                     </div>
                  </div>
                  <div class="table-responsive"> 

                  <br>
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                                                     <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                                                    <th data-field="plafond"data-sort="1" data-primary-key="0"> <?= cclang('plafond') ?></th>
                           <th data-field="jangkawaktu_12"data-sort="1" data-primary-key="0"> <?= cclang('jangkawaktu_12') ?></th>
                           <th data-field="jangkawaktu_18"data-sort="1" data-primary-key="0"> <?= cclang('jangkawaktu_18') ?></th>
                           <th data-field="jangkawaktu_24"data-sort="1" data-primary-key="0"> <?= cclang('jangkawaktu_24') ?></th>
                           <th data-field="jangkawaktu_30"data-sort="1" data-primary-key="0"> <?= cclang('jangkawaktu_30') ?></th>
                           <th data-field="jangkawaktu_36"data-sort="1" data-primary-key="0"> <?= cclang('jangkawaktu_36') ?></th>
                           <th data-field="jangkawaktu_48"data-sort="1" data-primary-key="0"> <?= cclang('jangkawaktu_48') ?></th>
                           <th data-field="jangkawaktu_60"data-sort="1" data-primary-key="0"> <?= cclang('jangkawaktu_60') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_simulasi_kredit">
                     <?php foreach($simulasi_kredits as $simulasi_kredit): ?>
                        <tr>
                                                       <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $simulasi_kredit->id; ?>">
                           </td>
                                                       
                           <td><span class="list_group-plafond"><?= _ent($simulasi_kredit->plafond); ?></span></td> 
                           <td><span class="list_group-jangkawaktu_12"><?= _ent($simulasi_kredit->jangkawaktu_12); ?></span></td> 
                           <td><span class="list_group-jangkawaktu_18"><?= _ent($simulasi_kredit->jangkawaktu_18); ?></span></td> 
                           <td><span class="list_group-jangkawaktu_24"><?= _ent($simulasi_kredit->jangkawaktu_24); ?></span></td> 
                           <td><span class="list_group-jangkawaktu_30"><?= _ent($simulasi_kredit->jangkawaktu_30); ?></span></td> 
                           <td><span class="list_group-jangkawaktu_36"><?= _ent($simulasi_kredit->jangkawaktu_36); ?></span></td> 
                           <td><span class="list_group-jangkawaktu_48"><?= _ent($simulasi_kredit->jangkawaktu_48); ?></span></td> 
                           <td><span class="list_group-jangkawaktu_60"><?= _ent($simulasi_kredit->jangkawaktu_60); ?></span></td> 
                           <td width="200">
                            
                                                              <?php is_allowed('simulasi_kredit_view', function() use ($simulasi_kredit){?>
                                                              <a href="<?= site_url('administrator/simulasi_kredit/view/' . $simulasi_kredit->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('simulasi_kredit_update', function() use ($simulasi_kredit){?>
                              <a href="<?= site_url('administrator/simulasi_kredit/edit/' . $simulasi_kredit->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('simulasi_kredit_delete', function() use ($simulasi_kredit){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/simulasi_kredit/delete/' . $simulasi_kredit->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?>

                           </td>                        </tr>
                      <?php endforeach; ?>
                      <?php if ($simulasi_kredit_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Simulasi Kredit data is not available
                           </td>
                         </tr>
                      <?php endif; ?>

                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
             
            </div>
            </form>            
         </div>
      </div>
   </div>
</section>


<script>
  $(document).ready(function(){

    "use strict";
   
    
      
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

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
        },
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_simulasi_kredit').serialize();

      if (bulk.val() == 'delete') {
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
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/simulasi_kredit/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "<?= cclang('please_choose_bulk_action_first'); ?>",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
    initSortable('simulasi_kredit', $('table.dataTable'));
  }); /*end doc ready*/
</script>