<h2>Add a Grant School</h2>
<?php echo validation_errors(); ?>
 <?php echo $this->upload->display_errors('<div class="alert alert-error">', '</div>'); ?>
 <?php echo form_open_multipart(); ?>
    <div>
        <?php echo form_label('School type', 'school_id'); ?>
        <?php echo form_dropdown('school_id', $school_form_options, set_value('school_id')); ?>
    </div>
    <div>
        <?php echo form_label('Site Name', 'site_number'); ?>
        <?php echo form_input('site_number', set_value('site_number')); ?>
    </div>
    <div>
        <?php echo form_label('Date Granted', 'site_date_school'); ?>
        <?php echo form_input('site_date_school', set_value('site_date_school')); ?>
    </div>
    <div>
        <?php echo form_label('Site Image', 'site_logo'); ?>
        <?php echo form_upload('site_logo'); ?>
    </div>
    <div>
        <?php echo form_submit('save', 'Save'); ?>
    </div>
<?php echo form_close(); ?>