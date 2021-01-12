

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-teal box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('testimonial_list'); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('admin/testimonial/add') ?>" class="btn bg-purple btn-sm"><i class="fa fa-plus"></i><?php echo $this->lang->line('add_testimonial'); ?></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="userListTable" class="table table-bordered table-striped table_th_teal">
                        <thead>
                            <tr>
                                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('name'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('position'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('priority'); ?></th>
                                <th style="width: 25%;"><?php echo $this->lang->line('description'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('image'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sl = 1;
                                foreach ($testimonials as $value) {
                                	?>
                            <tr>
                                <td> <?php echo $sl++ ; ?> </td>
                                <td> <?php echo $value->name; ?> </td>
                                <td> <?php echo $value->position; ?> </td>
                                <td> <?php echo $value->priority; ?> </td>
                                <td> <?php echo character_limiter(strip_tags($value->description), 150); ?> </td>
                                <td>
                                    <img src="<?php echo base_url($value->photo) ?>" alt="" width="50px" height="50px">
                                </td>
                                <td> 
                                    <a href="<?php echo base_url('admin/testimonial/edit/'.$value->id); ?>" class="btn btn-sm bg-teal"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/testimonial/delete/'.$value->id); ?>" class="btn btn-sm btn-danger" onclick = 'return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>
<script type="text/javascript">
    $(function () {
      $("#userListTable").DataTable();
    });
    
</script>

