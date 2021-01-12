<section class="content">

    <div class="row">

        <div class="col-md-12">

            <!-- Horizontal Form -->

            <div class="box box-danger box-solid">

                <div class="box-header with-border">

                    <h3 class="box-title"> <?php echo $this->lang->line('seles_report'); ?> </h3>

                    <div class="box-tools pull-right">

                    </div>

                </div>

                <div class="box-body">

                    <div class="row" style="box-shadow: 0px 0px 10px 0px #dd4b39;margin: 10px 30px 40px 25px;padding: 30px 0px 30px 0px;">

                        <form action="<?php echo base_url('user/seles-report/list/') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="col-md-12">

                                <div class="form-group col-md-4">

                                    <div class="col-sm-12">

                                        <label> <?php echo $this->lang->line('start_date'); ?> </label>

                                        <input name="start_date"  class="form-control inner_shadow_red date" value="<?php if($start_date != '') echo date("d M, Y", strtotime($start_date)); ?>" autocomplete="off" placeholder="<?php echo $this->lang->line('start_date'); ?>" type="text">

                                    </div>

                                </div>

                                <div class="form-group col-md-4">

                                    <div class="col-sm-12">

                                        <label> <?php echo $this->lang->line('end_date'); ?> </label> 

                                        <input name="end_date" class="form-control inner_shadow_red date" autocomplete="off" value="<?php if($end_date != '') echo date("d M, Y", strtotime($end_date)); ?>" placeholder="<?php echo $this->lang->line('end_date'); ?>" type="text">

                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <center>
                                    
                                    <button type="submit" style="margin-top:26px;" class="btn-sm btn bg-green"> Search </button>

                                    </center>

                                </div>

                            </div>

                            

                        </form>

                    </div>

                    

                    <div class="row">

                        <div class="col-sm-12">

                            <table id="userListTable" class="table table-bordered table-striped table_th_maroon">

                                <thead>

                                    <tr>

                                    <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>

                                    <th style="width: 10%;"><?php echo $this->lang->line('invoice_number'); ?></th>

                                    <th style="width: 10%;"><?php echo $this->lang->line('remarks'); ?></th>

                                    <th style="width: 10%;"><?php echo $this->lang->line('total_bill'); ?></th>

                                    <th style="width: 10%;"><?php echo $this->lang->line('discount'); ?></th>

                                    <th style="width: 10%;"><?php echo $this->lang->line('payable_amount'); ?></th>


                                   
                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                        foreach ($seles_list as $key => $value) {

                                    ?>

                                    <tr>

                                        <td> <?= $key+1; ?> </td>

                                        <td> <?php echo $value->invoice_number;?>  </td>

                                        <td> <?php echo $value->remarks;?>  </td>

                                        <td> <?php echo $value->total_bill;?>  </td>

                                        <td> <?php echo $value->discount;?>  </td>

                                        <td> <?php echo $value->payable_amount;?>  </td>


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

</script>

<script>
    $(function(){
    
     $('.date').datepicker({
            autoclose: true,
            changeYear:true,
            changeMonth:true,
            dateFormat: "dd-mm-yy",
            yearRange: "-10:+10"
        });
     
    });
    
    CKEDITOR.replace( 'body' );
                
</script>



