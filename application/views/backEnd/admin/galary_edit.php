
<section class="content">

    <div class="row">

        <div class="col-md-12">

            <!-- Horizontal Form -->

            <div class="box box-success box-solid">

                <div class="box-header with-border">

                    <h3 class="box-title"> <?php echo $this->lang->line('gallery_update'); ?> </h3>

                    <div class="box-tools pull-right">

                        <a href="<?php echo base_url() ?>admin/gallary/list" type="submit" class="btn bg-red btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('gallery_list'); ?> </a>

                    </div>

                </div>

                <div class="box-body">

                    <div class="row">

                        <form action="<?php echo base_url('admin/gallary/edit/'.$gallery_info->id) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="col-md-8">

                                <div class="form-group">

                                    <label for="title_one" class="col-sm-3 control-label"><?php echo $this->lang->line('type'); ?> *</label>

                                    <div class="col-sm-9">

                                        <select name="type" required="" id="type" class="form-control select2">

                                            <option value=""><?php echo $this->lang->line('select_type'); ?></option>

                                            <option value="Photo"

                                                <?php if ($gallery_info->type == 'Photo') { ?>

                                                selected

                                                <?php } ?>

                                                ><?php echo $this->lang->line('photo'); ?>

                                            </option>

                                            <option value="Video"

                                                <?php if ($gallery_info->type == 'Video') {?>

                                                selected

                                                <?php } ?>

                                                ><?php echo $this->lang->line('video'); ?>

                                            </option>

                                        </select>

                                    </div>

                                </div>

                                <div class="form-group ">

                                    <label for="title_two" class="col-sm-3 control-label"><?php echo $this->lang->line('album'); ?> *</label>

                                    <div class="col-sm-9">

                                        <select name="gallery_category_id" id="" required="" class="form-control select2">

                                            <option value=""><?php echo $this->lang->line('select_album'); ?></option>

                                            <?php foreach ($galary_category as $key => $value): ?>

                                            <option value="<?php echo $value->id; ?>"

                                                <?php if ($gallery_info->gallery_category_id == $value->id) {?>

                                                selected

                                                <?php } ?>

                                                ><?php echo $value->name; ?>

                                            </option>

                                            <?php endforeach ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="body" class="col-sm-3 control-label"><?php echo $this->lang->line('caption'); ?></label>

                                    <div class="col-sm-9">

                                        <input id="title_two" type="text" name="title" class="form-control" value="<?php echo $gallery_info->title; ?>">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="body" class="col-sm-3 control-label"><?php echo $this->lang->line('gallery_priority'); ?></label>

                                    <div class="col-sm-9">

                                        <input id="title_two" type="text" name="priority" class="form-control" value="<?php echo $gallery_info->priority; ?>">

                                    </div>

                                </div>

                                <div class="form-group <?php if($gallery_info->type == 'Photo'){ ?>hidden <?php } ?>">

                                    <label for="body" class="col-sm-3 control-label"><?php echo $this->lang->line('gallery_video'); ?></label>

                                    <div class="col-sm-9">

                                        <input type="text" class="form-control" value="<?php echo $gallery_info->path; ?>" onkeyup="youtube_parser(this.value);">

                                        

                                        <input type="text" readonly="readonly" id="video_link" name="path1" style="border: none;">

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3 <?php if($gallery_info->type == 'Video'){ ?>hidden <?php } ?>">

                                <div class="form-group">

                                    <label class="col-sm-12 control-label">

                                        <center> <?php echo $this->lang->line('gallery_photo'); ?></center>

                                    </label>

                                    <div class="col-sm-12">

                                        <img id="profile_picture_change" src="<?php echo base_url().$gallery_info->path; ?>" class="img img-responsive"><small style="color: gray">(Width:800px; Height:600px;)</small><br>

                                        <input id="photo" type="file" name="path" onchange="readpicture(this);">

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12">

                                <?php if($gallery_info->type == 'Video'){ ?>

                                <div class="col-sm-9">

                                    <center>

                                        <button type="reset" class="btn bg-aqua"><?php echo $this->lang->line('reset'); ?></button>

                                        <button type="submit" class="btn btn-danger"><?php echo $this->lang->line('update'); ?></button>

                                    </center>

                                </div>

                                <?php }elseif ($gallery_info->type == 'Photo') {?>

                                <center>

                                    <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('reset'); ?></button>

                                    <button type="submit" class="btn btn-sm bg-green"><?php echo $this->lang->line('update'); ?></button>

                                </center>

                                <?php } ?>

                            </div>

                        </form>

                    </div>

                </div>

                <!-- /.box-body -->

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

    			$('#profile_picture_change')

    			.attr('src', e.target.result)

    			.width(250)

    			.height(250);

    		};

    

    		reader.readAsDataURL(input.files[0]);

    	}

    }

    

</script>

<script type="text/javascript">

    function youtube_parser(url) {



        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;

        var match = url.match(regExp);



        if ((match && match[7].length == 11))

            $("#video_link").val(match[7]);

    }

</script>



