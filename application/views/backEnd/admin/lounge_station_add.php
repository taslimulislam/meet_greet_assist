<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?php echo $this->lang->line('lounge_station_add'); ?> </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>admin/lounge-service-station/list" class="btn bg-green btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('lounge_station_list'); ?> </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form action="<?php echo base_url("admin/lounge-service-station/add");?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="col-md-12"> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('lounge_service_type'); ?> *</label>
                                            <br>
                                            <select name="lounge_srvice_type_id" required="" class="select2 form-control inner_shadow_success">
                                                <option value="" selected><?php echo $this->lang->line('select_lounge_service_type'); ?></option>
                                                <?php foreach ($lounge_type_list as $value) { ?>
                                                    <option  value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('name') ?> *</label>
                                            <input name="name" placeholder="<?php echo $this->lang->line('name'); ?> " class="form-control inner_shadow_red" required="" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('priority'); ?></label><small style="color: gray"> <?php echo $this->lang->line('sorting_will_be_min_to_max'); ?></small>
                                            <input name="priority" placeholder="<?php echo $this->lang->line('priority'); ?>" class="form-control inner_shadow_red" type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('unit_rate') ?> *</label>
                                            <input name="unit_rate" placeholder="<?php echo $this->lang->line('unit_rate'); ?> " class="form-control inner_shadow_red" required="" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red"><?php echo $this->lang->line('reset') ?></button>
                                    <button type="submit" class="btn btn-sm bg-green"><?php echo $this->lang->line('save') ?></button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
</section>
<script type="text/javascript" >
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
</script>



