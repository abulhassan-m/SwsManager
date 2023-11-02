<div class="container">
    <!-- Registration Form Started -->
    <?php
    helper('form');
    $attributes = array('id' => 'form', 'enctype' => 'multipart/form-data');
    echo form_open('Clients/add', $attributes);
    ?>

    <div class="card card-signup">
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon"><i class="material-icons">diversity_3</i></div>
            <h3 class="card-title">New Project Registration<small></small></h3>
        </div>
        <div class="card-body">
            <!-- field sets 1 Basic Information -->
            <fieldset>
                <div class="form-card">
                    <div class="col-lg-12 pt-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'name' => 'cname',
                                        'id' => 'cname',
                                        'required' => '',
                                        'class' => 'form-control',
                                        'pattern' => '(?=.*[a-z])(?=.*[A-Z]).{2,}',
                                        'value' => set_value('cname')
                                    ));
                                    ?>
                                    <label for="cname">Company Name</label>
                                    <span class="signup-error"><?php echo validation_show_error('cname'); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'name' => 'cname',
                                        'id' => 'cname',
                                        'required' => '',
                                        'class' => 'form-control',
                                        'pattern' => '(?=.*[a-z])(?=.*[A-Z]).{2,}',
                                        'value' => set_value('cname')
                                    ));
                                    ?>
                                    <label for="cname">Unit Name</label>
                                    <span class="signup-error"><?php echo validation_show_error('cname'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="card-footer">
            <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'btn btn-primary submit action-button', 'value' => 'Finish')); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>