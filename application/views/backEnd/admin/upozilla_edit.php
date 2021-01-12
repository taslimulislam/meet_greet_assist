

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('upozilla_edit'); ?>  </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>admin/upozilla/list" class="btn bg-red btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('upozilla_list'); ?>  </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form action="<?php echo base_url("admin/upozilla/edit/".$edit_info->id);?>" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('division_name'); ?> *</label>
                                            <select class="form-control select2" name="division_id" id="division" required="" >
                                                <?php foreach ($division_list as $value): ?>
                                                <option value="<?php echo $value->id; ?>"
                                                    <?php if ($value->id == $edit_info->division_id): ?>
                                                    selected
                                                    <?php endif ?>
                                                    ><?php echo $value->name ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('zilla_name'); ?> *</label>
                                            <select class="form-control select2" required="" name="zilla_id" id="zilla">
                                                <?php foreach ($zilla_list as $value): ?>
                                                <option value="<?php echo $value->id; ?>"
                                                    <?php if ($value->id == $edit_info->zilla_id): ?>
                                                    selected
                                                    <?php endif ?>
                                                    ><?php echo $value->name ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('upozilla_name'); ?> *</label>
                                            <input name="name" placeholder="<?php echo $this->lang->line('upozilla_name'); ?> " class="form-control inner_shadow_primary" required="" type="text" value="<?php echo $edit_info->name; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('cancel'); ?></button>
                                    <button type="submit" class="btn btn-sm btn-primary"><?php echo $this->lang->line('update'); ?></button>
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
<script>
    // profile picture change
    function readpicture(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
    
          reader.onload = function (e) {
            $('#testimonials_picture_change')
            .attr('src', e.target.result)
            .width(100)
            .height(100);
        };
    
        reader.readAsDataURL(input.files[0]);
    }
    }
    
</script>
<script>
    $(document).ready(function () {
    
        // this is for presend address change only
        $('#division').change(function () {
            $('#zilla').find('option').remove().end().append("<option value=''>জেলা নির্বাচন করুন</option>");
            $('#upozilla').find('option').remove().end().append("<option value=''>আগে জেলা নির্বাচন করুন</option>");
            loadZilla($(this).find(':selected').val() );
        });
    
        $('#zilla').change(function () {
            $('#upozilla').find('option').remove().end().append("<option value=''>উপজেলা নির্বাচন করুন</option>");
            loadUpozilla($(this).find(':selected').val() );
        });
    
        // init the divisions
        loadDivision();
    
    });
    
    
    function loadDivision() {
    
        $.post("<?php echo base_url() . "admin/get_division"; ?>",
                {'asd': 'asd'},
                function (data2) {
    
                    var data = JSON.parse(data2);
                    $.each(data, function () {
    
                        $("#division").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
    
                });
    }
    
    function loadZilla(divisionId) {
        $.post("<?php echo base_url() . "admin/get_zilla_from_division/"; ?>" + divisionId,
                {'nothing': 'nothing'},
                function (data2) {
                    var data = JSON.parse(data2);
                    $.each(data, function (i, item) {
    
                        $("#zilla").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
                });
    
    }
    function loadUpozilla(zillaId) {
        $.post("<?php echo base_url() . "admin/get_upozilla_from_division_zilla/"; ?>" + zillaId,
                {'nothing': 'nothing'},
                function (data2) {
                    var data = JSON.parse(data2);
                    $.each(data, function (i, item) {
    
                        $("#upozilla").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
                });
    }
    
    
</script>