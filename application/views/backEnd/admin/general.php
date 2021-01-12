
<section class="content">

<div class="row">

    <div class="col-xs-12">

        <div class="box box-info box-solid">

            <div class="box-header with-border">

                <h3 class="box-title"><?php echo $this->lang->line('general_list'); ?></h3>

                <div class="box-tools pull-right">

                    <a data-toggle="modal" data-target="#add-modal" class="btn bg-red btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add_general'); ?> </a>

                </div>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

                <table id="userListTable" class="table table-bordered table-striped table_th_info" style="width: 100%;">

                    <thead>

                        <tr style="width: 100%;">

                            <th style="width: 10%"><?php echo $this->lang->line('sl'); ?></th>

                            <th style="width: 20%"><?php echo $this->lang->line('name'); ?></th>

                            <th style="width: 60%"><?php echo $this->lang->line('value'); ?></th>

                            <th style="width: 10%"><?php echo $this->lang->line('action'); ?></th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php 

                            foreach ($generals as $key => $value) {

                                ?>

                        <tr style="width: 100%">

                            <td style="width: 10%" > <?php echo ++$key ; ?> </td>

                            <td style="width: 20%" > <?php echo $value->name; ?> </td>

                            <td style="width: 60%" > <?php echo $value->value; ?> </td>

                            <td style="width: 10%" > 

                                <a href="#" data-toggle="modal" data-target="#edit-modal" data-generalid="<?= $value->id; ?>" data-generalname="<?= $value->name; ?>" data-generalvalue="<?= $value->value; ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                                <a href="<?php echo base_url('admin/general/delete/'.$value->id); ?>" class="btn btn-sm btn-danger" onclick = 'return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>

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

<div class="modal fade" id="add-modal">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title"><b><i class=" fa fa-plus-square"></i></b> <?php echo $this->lang->line('add_general'); ?> </h4>

            </div>

            <div class="modal-body">

                <form action="<?php echo base_url("admin/general/add");?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                    <div class="col-md-12">

                        <div class="form-group">

                            <label class="col-sm-2 control-label"><?php echo $this->lang->line('name'); ?></label>

                            <div class="col-sm-10">

                                <input name="name" placeholder="<?php echo $this->lang->line('name'); ?>" class="form-control inner_shadow_info" required="" type="text" >

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-2 control-label"><?php echo $this->lang->line('value'); ?></label>

                            <div class="col-sm-10">

                                <input name="value" placeholder="<?php echo $this->lang->line('value'); ?>" class="form-control inner_shadow_info" required="" type="text">

                            </div>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <center>

                            <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('reset') ?></button>

                            <button type="submit" class="btn btn-sm btn-info"><?php echo $this->lang->line('save') ?></button>

                        </center>

                    </div>

                </form>

            </div>

            <div class="modal-footer">

            </div>

        </div>

        <!-- /.modal-content -->

    </div>

    <!-- /.modal-dialog -->

</div>



<div class="modal fade" id="edit-modal">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title"><b><i class=" fa fa-refresh"></i></b> <?php echo $this->lang->line('update_general'); ?> </h4>

            </div>

            <div class="modal-body">

                <form action="<?php echo base_url("admin/general/edit");?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                    <div class="col-md-12">

                        <div class="form-group">

                            <label class="col-sm-2 control-label"><?php echo $this->lang->line('name'); ?></label>

                            <div class="col-sm-10">

                                <input name="name" placeholder="<?php echo $this->lang->line('name'); ?>" class="form-control inner_shadow_info" required="" type="text" id="gname" readonly>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-2 control-label"><?php echo $this->lang->line('value'); ?></label>

                            <div class="col-sm-10">

                                <input name="value" placeholder="Value" class="form-control inner_shadow_info" required="" type="text" id="gvalue">

                                <input type="hidden" name="general_id" id="gid">

                            </div>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <center>

                            <button data-dismiss="modal" aria-label="Close" class="btn btn-sm btn-danger"><?php echo $this->lang->line('cancel') ?></button>

                            <button type="submit" class="btn btn-sm btn-info"><?php echo $this->lang->line('update') ?></button>

                        </center>

                    </div>

                </form>

            </div>

            <div class="modal-footer">

            </div>

        </div>

        <!-- /.modal-content -->

    </div>

    <!-- /.modal-dialog -->

</div>



</section>

<script type="text/javascript">

$(function () {

  $("#userListTable").DataTable();

});



</script>



<script type="text/javascript">

$('#edit-modal').on("show.bs.modal", function(event){



    var e             = $(event.relatedTarget);

    var generalid     = e.data('generalid');

    var generalname   = e.data('generalname');

    var generalvalue = e.data('generalvalue');



    $("#gid").val(generalid);

    $("#gname").val(generalname);

    $("#gvalue").val(generalvalue); 



});

</script>







