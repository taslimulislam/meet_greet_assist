<section class="content">

    <div class="row">

        <div class="col-md-12">

            <!-- Horizontal Form -->

            <div class="box box-danger box-solid">

                <div class="box-header with-border">

                    <h3 class="box-title"> <?php echo $this->lang->line('slider'); ?> </h3>

                    <div class="box-tools pull-right">

                    </div>

                </div>

                <div class="box-body">

                    <?php if(isset($slider_info)){ ?>

                    <div class="row" style="box-shadow: 0px 0px 10px 0px #dd4b39;margin: 10px 30px 40px 25px;padding: 30px 0px 30px 0px;">

                        <form action="<?php echo base_url('admin/slider/edit/'.$slider_info_id) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="col-md-7">

                                <div class="form-group">

                                    <div class="col-sm-12">

                                        <label> <?php echo $this->lang->line('title'); ?> *</label>

                                        <input name="title" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('title'); ?>" required="" type="text" value="<?php echo $slider_info->title; ?>">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-sm-12">

                                        <label> <?php echo $this->lang->line('subtitle'); ?> *</label>

                                        <input name="subtitle" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('subtitle'); ?>" required="" type="text" value="<?php echo $slider_info->subtitle; ?>">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-sm-12">

                                        <label> <?php echo $this->lang->line('priority'); ?></label> <small style="color: gray"><?php echo $this->lang->line('sorting_will_be_max_to_min'); ?></small>

                                        <input name="priority" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('priority'); ?>" type="number" value="<?php echo $slider_info->priority; ?>" >

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-5">

                                <div class="form-group">

                                    <div class="col-sm-12">

                                        <center>    

                                            <label><?php echo $this->lang->line('slider_photo'); ?></label>

                                            <img style="height: 200px" id="slider_photo_change" class="img-responsive" src="<?php echo base_url($slider_info->photo); ?>" alt="Slider Picture"><small style="color: gray">(Width:1920px; Height:810px;)</small><br>

                                            <input name="photo" type="file" onchange="readpicture(this)">

                                        </center>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12">

                                <center>

                                    <button type="reset" class="btn-sm btn btn-danger"> <?php echo $this->lang->line('cancel'); ?> </button>

                                    <button type="submit" class="btn-sm btn bg-green"> <?php echo $this->lang->line('update'); ?> </button>

                                </center>

                            </div>

                        </form>

                    </div>

                    <?php }else {?>

                    <div class="row" style="box-shadow: 0px 0px 10px 0px #dd4b39;margin: 10px 30px 40px 25px;padding: 30px 0px 30px 0px;">

                        <form action="<?php echo base_url('admin/slider/add/') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="col-md-7">

                                <div class="form-group">

                                    <div class="col-sm-12">

                                        <label> <?php echo $this->lang->line('title'); ?> *</label>

                                        <input name="title" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('title'); ?>" required="" type="text">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-sm-12">

                                        <label> <?php echo $this->lang->line('subtitle'); ?> *</label>

                                        <input name="subtitle" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('subtitle'); ?>" required="" type="text">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-sm-12">

                                        <label> <?php echo $this->lang->line('priority'); ?></label> <small style="color: gray"><?php echo $this->lang->line('sorting_will_be_max_to_min'); ?></small>

                                        <input name="priority" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('priority'); ?>" type="number" min="1" max="1000">

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-5">

                                <div class="form-group">

                                    <div class="col-sm-12">

                                        <center>    

                                            <label><?php echo $this->lang->line('slider_photo'); ?></label>

                                            <img id="slider_photo_change" class="img-responsive" src="//placehold.it/1920x810" alt="Slider Picture"><small style="color: gray">(Width:1920px; Height:810px;)</small>

                                            <br>

                                            <input name="photo" required="" type="file" onchange="readpicture(this)">

                                        </center>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12">

                                <center>

                                    <button type="reset" class="btn-sm btn btn-danger"> <?php echo $this->lang->line('reset'); ?> </button>

                                    <button type="submit" class="btn-sm btn bg-green"> <?php echo $this->lang->line('save'); ?> </button>

                                </center>

                            </div>

                        </form>

                    </div>

                    <?php } ?>

                    <div class="row">

                        <div class="col-sm-12">

                            <table id="userListTable" class="table table-bordered table-striped table_th_maroon">

                                <thead>

                                    <tr>

                                        <th style="width: 10%;"><?php echo $this->lang->line('sl'); ?></th>

                                        <th style="width: 20%;"><?php echo $this->lang->line('title'); ?></th>

                                        <th style="width: 25%;"><?php echo $this->lang->line('subtitle'); ?></th>

                                        <th style="width: 10%;"><?php echo $this->lang->line('priority'); ?></th>

                                        <th style="width: 10%;"><?php echo $this->lang->line('slider_photo'); ?></th>

                                        <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                        foreach ($all_slider as $key => $slider_value) {

                                            ?>

                                    <tr>

                                        <td> <?= $key+1; ?> </td>

                                        <td> <?= $slider_value->title; ?> </td>

                                        <td> <?php echo character_limiter(strip_tags($slider_value->subtitle), 100); ?> </td>

                                        <td> <?= $slider_value->priority; ?> </td>

                                        <td> <img src="<?= base_url($slider_value->photo); ?>" class="img img-responsive" style="width: 50px; height: 50px;"> </td>

                                        <td>

                                            <a href="<?= base_url('admin/slider/edit/'.$slider_value->id); ?>" class="btn btn-sm bg-green"> <i class="fa fa-edit"></i> </a>

                                            <a href="<?= base_url('admin/slider/delete/'.$slider_value->id); ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm bg-red"> <i class="fa fa-trash"></i> </a>

                                        </td>

                                    </tr>

                                    <?php

                                        }

                                        ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <!-- /.box-body -->

                <div class=" box-footer">

                </div>

                <!-- /.box-footer --> 

            </div>

            <!-- /.box -->

        </div>

        <!--/.col (right) -->

    </div>

</section>

<script type="text/javascript">

    $(function () {

        $("#userListTable").DataTable();

    });

    

    //function for photo

    function readpicture(input) {

      if (input.files && input.files[0]) {

          var reader = new FileReader();

    

          reader.onload = function (e) {

            $('#slider_photo_change')

            .attr('src', e.target.result)

            .width(500)

            .height(200);

        };

    

        reader.readAsDataURL(input.files[0]);

    }

    };

    

</script>



