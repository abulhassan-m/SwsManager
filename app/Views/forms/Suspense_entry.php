
<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.min.css" rel="stylesheet">  

<div class="column-half padding-t-7 margin-t-b-15 box_panel">
    <?php
    $attributes = array('id' => 'form', 'enctype' => 'multipart/form-data');
    echo form_open('transaction/suspenseadd', $attributes);
    ?>
    <div class="column-full form-card">
        <div class="column-full">
            <div class="column-full">
                <h2 class="subtitle1">Suspense </h2>
            </div>
        </div>
        <div class="column-full padding-t-5">
            <div class="column-full">
                <!-- First Column (Basic Information) -->
                <div class="column-half">
                    <div class="group" id="prefetch">  
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'search_box',
                            'id' => 'search_box',
                            'class' => 'form-control input-lg typeahead',
                            'required' => ''
                        ));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="emp">Employee Name</label>
                        <span class="signup-error"><?php echo form_error('emp'); ?></span>
                    </div>                                                       
                </div>
                <div id="autocomplete"></div>

                <!--- Amount-->                     
                <div class="column-half">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'amount',
                            'required' => '',
                            'id' => 'amount'));
                        ?>

                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Amount</label>
                        <span class="signup-error"><?php echo form_error('date'); ?></span>
                    </div>                                                       
                </div>
                <!--- Amount Ended-->                    
            </div>           
        </div>
    </div>
    <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'submit action-button', 'value' => 'Finish')); ?>  
    <?php echo form_close(); ?>
</div><!-- Script --> <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function () {
//         Initialize 
     $( "#search_box" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          var auto_url="http://localhost/manage-app/transaction/fetch/";
                  auto_url+=document.getElementById("search_box").value;
          $.ajax({
            url: auto_url,
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
        beforeSend: function () {
        },
        success: function(data){
                    var resp = $.map(data,function(obj){
                        return obj.name;
                   });
                   response(resp);
//              response( json );
            },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
          });
        },
      });
});
</script>
<!--<script