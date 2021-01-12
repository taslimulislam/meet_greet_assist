<section class="invoice">
   <!-- title row -->
   <div class="row">
      <div class="col-xs-12">
         <h2 class="page-header">
            <i class="fa fa-globe"></i> HRsoft BD
            <small class="pull-right">Date: 19/10/2020</small>
         </h2>
      </div>
      <!-- /.col -->
   </div>
   <!-- info row -->
   <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
         From
         <address>
            <strong>HRsoft BD</strong><br>
            12/6, Solimullah Road,<br>
            Mohammadpur, Dhaka 1207,<br> 
            Bangladesh.<br>
            Email: info@hrsoftbd.com
         </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
         To
         <address>
            <strong><?php echo $client_details->name; ?></strong><br>
            Phone: <?php echo $client_details->phone_number; ?><br>
            Email: <?php echo $client_details->email; ?><br>
            Passport Number: <?php echo $client_details->passport_number; ?><br>
            
         </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
         <b>Invoice #007612</b><br>
         <br>
         <b>Order ID:</b> 4F3S8J<br>
         <b>Payment Due:</b> 2/22/2014<br>
         <b>Account:</b> 968-34567
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
   <!-- Table row -->
   <div class="row">
      <div class="col-xs-12 table-responsive">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                  <th style="width: 15%;"><?php echo $this->lang->line('service_type'); ?></th>
                  <th style="width: 15%;"><?php echo $this->lang->line('service_station'); ?></th>
                  <th style="width: 15%;"><?php echo $this->lang->line('train_or_flight'); ?></th>
                  <th style="width: 15%;"><?php echo $this->lang->line('start_time'); ?></th>
                  <th style="width: 15%;"><?php echo $this->lang->line('landing_time'); ?></th>
                  <th style="width: 15%;"><?php echo $this->lang->line('journy_date'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  $sl = 1;
                  if ($invoice_list){

                  foreach ($invoice_list as $value){ 
               ?>
               <tr>
                  <td> <?php echo $sl++ ; ?> </td>
                  
                  <td> <?php echo $value->type_name; ?> </td>
                  <td> <?php echo $value->station_name; ?> </td>
                  <td> <?php echo $value->train_or_flight_no; ?> </td>
                  <td> <?php echo date("h:i a", strtotime($value->service_start_time)) ?> </td> 
                  <td> <?php echo date("h:i a", strtotime($value->landing_time)) ?> </td> 
                  <td> <?php echo date("d M, Y ", strtotime($value->journey_date)) ?> </td>
                  
               </tr>
               <?php
                  }
               }
                  ?>
            </tbody>
         </table>
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
   <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
         <p class="lead">Payment Methods:</p>
         <img src="../../dist/img/credit/visa.png" alt="Visa">
         <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
         <img src="../../dist/img/credit/american-express.png" alt="American Express">
         <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
         <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
         </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
         <p class="lead">Amount Due 2/22/2014</p>
         <div class="table-responsive">
            <table class="table">
               <tbody>
                  <tr>
                     <th style="width:50%">Subtotal:</th>
                     <td>$250.30</td>
                  </tr>
                  <tr>
                     <th>Tax (9.3%)</th>
                     <td>$10.34</td>
                  </tr>
                  <tr>
                     <th>Shipping:</th>
                     <td>$5.80</td>
                  </tr>
                  <tr>
                     <th>Total:</th>
                     <td>$265.24</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
   <!-- this row will not appear when printing -->
   <div class="row no-print">
      <div class="col-xs-12">
         <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
         <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
         </button>
         <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
         <i class="fa fa-download"></i> Generate PDF
         </button>
      </div>
   </div>
</section>