



<section class="content">

    <div class="row">

        <div class="col-md-12">

            <!-- Horizontal Form -->

            <div class="box box-success box-solid">

                <div class="box-header with-border">

                    <h3 class="box-title"> <?php echo $this->lang->line('add_gallery'); ?> </h3>

                    <div class="box-tools pull-right">

                        <a href="#" type="submit" class="btn bg-navy btn-sm" data-toggle="modal" data-target="#modal-album"> <i class="fa fa-file-image-o"></i> <?php echo $this->lang->line('new_album'); ?> </a>

                        <a href="<?php echo base_url() ?>admin/gallary/list" type="submit" class="btn bg-red btn-sm" > <i class="fa fa-list"></i> <?php echo $this->lang->line('gallery_list'); ?> </a>

                    </div>

                </div>

                <div class="box-body">

                    <div class="row">

                        <form action="<?php echo base_url('admin/gallary/add') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <br>

                            <div class="col-md-8">

                                <div class="form-group">

                                    <label for="title_one" class="col-sm-3 control-label"><?php echo $this->lang->line('type'); ?> *</label>

                                    <div class="col-sm-9">

                                        <select name="type" id="type" required="" class="form-control select2">

                                            <option value=""><?php echo $this->lang->line('select_type'); ?></option>

                                            <option value="Photo"><?php echo $this->lang->line('photo'); ?></option>

                                            <option value="Video"><?php echo $this->lang->line('video'); ?></option>

                                        </select>

                                    </div>

                                </div>

                                <div class="form-group ">

                                    <label for="title_two" class="col-sm-3 control-label"><?php echo $this->lang->line('album'); ?> *</label>

                                    <div class="col-sm-9">

                                        <select name="gallery_category_id" class="form-control select2" style="width: 100%" required="">

                                            <option value=""><?php echo $this->lang->line('select_album'); ?></option>

                                            <?php foreach ($galary_category as $key => $value): ?>

                                            <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>

                                            <?php endforeach ?>

                                        </select>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="body" class="col-sm-3 control-label"><?php echo $this->lang->line('caption'); ?></label>

                                    <div class="col-sm-9">

                                        <input id="title_two" type="text" name="title" class="form-control" placeholder="<?php echo $this->lang->line('caption_detail'); ?>">

                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="body" class="col-sm-3 control-label"><?php echo $this->lang->line('gallery_priority'); ?></label>

                                    <div class="col-sm-9">

                                        <input id="title_two" type="number" name="priority" class="form-control" placeholder="<?php echo $this->lang->line('gallery_priority'); ?>">

                                    </div>

                                </div>

                                <div class="form-group" id="videoPath">

                                    <label for="body" class="col-sm-3 control-label"><?php echo $this->lang->line('gallery_video'); ?></label>

                                    <div class="col-sm-9">

                                        <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('gallery_video'); ?>" onkeyup="youtube_parser(this.value);">

                                        

                                        <input type="text" readonly="readonly" id="video_link" name="path1" style="border: none;">

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3" id="photoPath">

                                <div class="form-group">

                                    <label class="col-sm-12 control-label">

                                        <center> <?php echo $this->lang->line('gallery_photo'); ?> *</center>

                                    </label>

                                    <div class="col-sm-12">

                                        <img id="profile_picture_change" src="//placehold.it/400x400" class="img img-responsive"><small style="color: gray">(Width:800px; Height:600px;)</small><br>

                                        <input id="photo" type="file" required="" name="path" onchange="readpicture(this);">

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12">

                                <center>

                                    <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('reset'); ?></button>

                                    <button type="submit" class="btn btn-sm bg-green"><?php echo $this->lang->line('save'); ?></button>

                                </center>

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

    <div class="row">

        <div class="modal fade" id="modal-album" style="display: none;">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span></button>

                        <h4 class="modal-title"><?php echo $this->lang->line('album'); ?></h4>

                    </div>

                    <div class="modal-body" style ="height:400px;  overflow:auto;">

                        <div class="row">

                            <form action="<?php echo base_url('admin/gallary-category/add') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <input type="hidden" name="redirect_action" value="admin/gallary/add/">

                                <div class="col-md-12">

                                    <div class="col-md-10">
                                        <div class="col-md-8">

                                            <div class="form-group">

                                                <div class="col-sm-12">

                                                    <label> <?php echo $this->lang->line('album_name'); ?> *</label>

                                                    <input name="name" class="form-control" placeholder="<?php echo $this->lang->line('album_name'); ?>" required="" type="text">

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">

                                                <div class="col-sm-12">

                                                    <label> <?php echo $this->lang->line('gallery_priority'); ?></label>

                                                    <input name="priority" class="form-control" placeholder="<?php echo $this->lang->line('gallery_priority'); ?>" type="number">

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2">

                                        <div class="form-group">

                                            <div class="col-sm-12">

                                                <label> <br> </label>

                                                <button type="submit" class="form-control btn bg-green"> <?php echo $this->lang->line('save'); ?> </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                        <div class="col-lg-12">

                            <table class="table table-bordered table_th_success">

                                <tbody>

                                    <tr>

                                        <th style="width: 5%;">#</th>

                                        <th style="width: 20%;"><?php echo $this->lang->line('name'); ?></th>

                                        <th style="width: 10%;"><?php echo $this->lang->line('gallery_priority'); ?></th>

                                        <th style="width: 10%;"><?php echo $this->lang->line('total_photo'); ?></th>

                                        <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>

                                    </tr>

                                    <?php 

                                        foreach ($albums as $key => $album_value) { ?>

                                    <tr>

                                        <td> <?= $key+1; ?> </td>

                                        <td> <?= $album_value->name; ?> </td>

                                        <td> <?= $album_value->priority; ?> </td>

                                        <td> <span class="badge bg-green"> <?= $this->db->where('gallery_category_id', $album_value->id)->get('tbl_gallery')->num_rows(); ?> </span> </td>

                                        <td> 

                                            <a href="" class="btn btn-sm bg-green" data-toggle="modal" data-target="#modal-edit" data-aid ="<?php echo $album_value->id; ?>" data-aname = "<?php echo $album_value->name; ?>" data-apriority = "<?php echo $album_value->priority; ?>"> <i class="fa fa-edit"></i> </a> 

                                            <a href="<?php echo base_url('admin/gallary-category/delete/'.$album_value->id.'?page=gallary_page&modal=view') ?>" class="btn btn-sm bg-red" onclick="return confirm('Are You Sure?');"> <i class="fa fa-trash"></i> </a>

                                        </td>

                                    </tr>

                                    <?php } ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> 

                    </div>

                </div>

                <!-- /.modal-content -->

            </div>

            <!-- /.modal-dialog -->

        </div>

    </div>

    <div class="row">

        <div class="modal fade" id="modal-edit" style="display: none;">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span></button>

                        <h4 class="modal-title"><?php echo $this->lang->line('update'); ?></h4>

                    </div>

                    <div class="modal-body">

                        <div class="row">

                            <form action="<?php echo base_url('admin/gallary-category/edit') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <input type="hidden" name="redirect_action" value="admin/gallary/add/">

                                <div class="col-md-12">

                                    <div class="col-md-10">

                                        <div class="col-md-8">

                                            <div class="form-group">

                                                <div class="col-sm-12">

                                                    <label> <?php echo $this->lang->line('album_name'); ?> *</label>

                                                    <input name="name" class="form-control" placeholder="<?php echo $this->lang->line('album_name'); ?>" required="" type="text">

                                                    <input name="id" type="hidden">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-4">

                                            <div class="form-group">

                                                <div class="col-sm-12">

                                                    <label> <?php echo $this->lang->line('gallery_priority'); ?></label>

                                                    <input name="priority" class="form-control" placeholder="<?php echo $this->lang->line('gallery_priority'); ?>" type="number">

                                                    <input name="id" type="hidden">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-2">

                                        <div class="form-group">

                                            <div class="col-sm-12">

                                                <label> <br> </label>

                                                <button type="submit" class="form-control btn btn-success"> <?php echo $this->lang->line('save'); ?> </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                    <div class="modal-footer"> 

                    </div>

                </div>

                <!-- /.modal-content -->

            </div>

            <!-- /.modal-dialog -->

        </div>

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

<script>

    $(function() {

    	$('#photoPath').hide(); 

    	$('#videoPath').hide();

    	

    	$('#type').change(function(){

    		if($('#type').val() == 'Photo') {

    			$('#photoPath').show(); 

    		} else {

    			$('#photoPath').hide(); 

    		} 

    	});

    	

    	$('#type').change(function(){

    		if($('#type').val() == 'Video') {

    			$('#videoPath').show(); 

    		} else {

    			$('#videoPath').hide(); 

    		} 

    	});

    });

</script>

<script type="text/javascript"> 

    <?php if(isset($_GET['modal']) && $_GET['modal'] == 'show'){  echo "$('#modal-album').modal('show')"; } ?>

</script>



<script>

    $('#modal-edit').on('show.bs.modal', function (event) {

      var editid    = $(event.relatedTarget).data('aid');

      var edit_name = $(event.relatedTarget).data('aname');

      var edit_priority = $(event.relatedTarget).data('apriority');

      

      $(this).find('[name="name"]').val(edit_name);

      $(this).find('[name="priority"]').val(edit_priority);

      $(this).find('[name="id"]').val(editid);

    });

</script>

<script type="text/javascript">

    function youtube_parser(url) {



        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;

        var match = url.match(regExp);



        if ((match && match[7].length == 11))

            $("#video_link").val(match[7]);

    }

</script>



