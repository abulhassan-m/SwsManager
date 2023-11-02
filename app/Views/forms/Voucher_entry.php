<div class="column-half padding-t-7 margin-t-b-15 ">
    <?php
    $attributes = array('id' => 'form', 'enctype' => 'multipart/form-data');
    echo form_open('transaction/voucheradd', $attributes);
    ?>
    <div class="form-card">
        <div class="column-full">
            <div class="column-half">
                <h2 class="subtitle1">Voucher </h2>
            </div>
        </div>
        <div class="column-full padding-t-5 margin-t-b-15 box_panel">
            <div class="column-full">
                <!-- First Column (Basic Information) -->
                <div class="column-33">
                    <div class="group">  
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'vno',
                            'id' => 'vno',
                        ));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="vno">Voucher No</label>
                        <span class="signup-error"><?php echo form_error('vno'); ?></span>
                    </div>                                                       
                </div>
                <!--Last Name--> 
                <div class="column-quad">
                    <div class="group">  
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'code',
                            'id' => 'code'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="code">Code</label>
                        <span class="signup-error"><?php echo form_error('payee'); ?></span>
                    </div>                                                       
                </div>
                <!--- Height Status Selection-->                     
                <div class="column-33">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'date',
                            'name' => 'date',
                            'id' => 'date'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Date</label>
                        <span class="signup-error"><?php echo form_error('date'); ?></span>
                    </div>                                                       
                </div>
                <!--- Height Status  Selection  Ended-->
            </div>
            <div class="column-66 margin-t-b-15">                
                <!--- Weight Status Selection-->                     
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'payee',
                            'id' => 'payee'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Payee</label>
                        <span class="signup-error"><?php echo form_error('payee'); ?></span>
                    </div>                                                       
                </div>
                <!--- Weight Status  Selection  Ended-->

                <!---  Place of Birth Selection-->                  
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'debit',
                            'id' => 'debit'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="debit">Debit Account</label>
                        <span class="signup-error"><?php echo form_error('debit'); ?></span>
                    </div>                                                       
                </div>
                <!--- Place of Birth  Selection  Ended-->
                <!--- Gender Selection-->               
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_dropdown(array('name' => 'towards', 'id' => 'towards'), array(' ' => '', '1' => 'Payment Receipt', '2' => 'Cash Receipt', '3' => 'Bill Receipt'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Towards</label>
                        <span class="signup-error"><?php echo form_error('towards'); ?></span>
                    </div>                                                       
                </div>
                <!--- Gender Selection  Ended--> 
                <!--- Gender Selection-->               
                <div class="column-half padding-r-0">
                    <div class="group">    
                        <?php
                        echo form_dropdown(array('name' => 'mop', 'id' => 'mop'), array(' ' => '', '1' => 'Cash', '2' => 'Cheque'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Mode of Payment</label>
                        <span class="signup-error"><?php echo form_error('mop'); ?></span>
                    </div>                                                       
                </div>
                <!--- Gender Selection  Ended-->                  
                <div class="column-half padding-r-0">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'date',
                            'name' => 'trdate',
                            'id' => 'trdate'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Transaction Date</label>
                        <span class="signup-error"><?php echo form_error('trdate'); ?></span>
                    </div>                                                       
                </div>
                <!--- Proof of Identification -->                  
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'transaid',
                            'id' => 'transaid'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Details</label>
                        <span class="signup-error"><?php echo form_error('transaid'); ?></span>
                    </div>                                                       
                </div>
                <!---  Proof of Identification Ended-->
            </div>
            <div class="column-33 ">
                <!--- DOB Selection-->                
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'amount',
                            'id' => 'amount'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Amount</label>
                        <span class="signup-error"><?php echo form_error('dobirth'); ?></span>
                    </div>                                                       
                </div>
                <!--- DOB Selection  Ended-->
            </div>
            <div class="column-33 ">

                <!--- Marital Status Selection-->              
                <div class="column-full">
                    <div class="group">    
                         <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'receiver',
                            'id' => 'receiver'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>receiver</label>
                        <span class="signup-error"><?php echo form_error('receiver'); ?></span>
                    </div>                                                       
                </div>
                <!--- Marital Status  Selection  Ended-->
                <!--- DOJ Selection-->          
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_dropdown(array('name' => 'authorize', 'id' => 'authorize', 'required' => ''), array(' ' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>authorize</label>
                        <span class="signup-error"><?php echo form_error('authorize'); ?></span>
                    </div>                                                       
                </div>
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_dropdown(array('name' => 'manage', 'id' => 'manage', 'required' => ''), array(' ' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>manage by</label>
                        <span class="signup-error"><?php echo form_error('manage'); ?></span>
                    </div>                                                       
                </div> <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_dropdown(array('name' => 'acc', 'id' => 'acc', 'required' => ''), array(' ' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>accountant</label>
                        <span class="signup-error"><?php echo form_error('acc'); ?></span>
                    </div>                                                       
                </div>
                <!--- DOJ Selection  Ended-->
            </div>                
        </div>
    </div>
    <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'submit action-button', 'value' => 'Finish')); ?>  
    <?php echo form_close(); ?>
</div>