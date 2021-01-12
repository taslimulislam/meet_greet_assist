<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?php echo $this->lang->line('client_add'); ?> </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>agent/client/list" class="btn bg-red btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('client_list'); ?> </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form action="<?php echo base_url("agent/client/add");?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="col-md-12"> 
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label><?php echo $this->lang->line('name') ?> *</label>
                                                <input name="name" placeholder="<?php echo $this->lang->line('name'); ?> " class="form-control inner_shadow_primary" required="" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label><?php echo $this->lang->line('phone') ?> *</label>
                                                <input name="phone" placeholder="<?php echo $this->lang->line('phone'); ?> " class="form-control inner_shadow_primary" required="" pattern="[0]{1}[1]{1}[3|4|5|6|7|8|9]{1}[0-9]{8}" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label><?php echo $this->lang->line('email') ?> *</label>
                                                <input name="email" placeholder="<?php echo $this->lang->line('email'); ?> " class="form-control inner_shadow_primary" required="" type="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label><?php echo $this->lang->line('pasport') ?> *</label>
                                                <input name="passport_number" placeholder="<?php echo $this->lang->line('name'); ?> " class="form-control inner_shadow_primary" required="" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red"><?php echo $this->lang->line('reset') ?></button>
                                    <button type="submit" class="btn btn-sm btn-primary"><?php echo $this->lang->line('save') ?></button>
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



