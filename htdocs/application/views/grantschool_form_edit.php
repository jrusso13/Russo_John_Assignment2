<h2>Edit a Grant School</h2>
<?php echo form_open_multipart(); ?>
<div class="left">
        <?php
        foreach ($school as $schoolinfo){?>
    <p>Edit Detail & Click Update Button</p>
    <form method="post" action="<?php echo base_url() . "index.php/grantschool/edit/"?>">
    <div>
        <label  for="text">School</label>
        <input type="text" name="did" value="<?php echo $schoolinfo->site_number ?>"/>
    </div>
    <div>
        <label  for="text">Date Granted</label>
        <input type="text" name="ddate" value="<?php echo $schoolinfo->site_date_school ?>"/>
    </div>
    <div>
        <label  for="text">First Name</label>
        <input type="text" name="dfname" value="<?php echo $schoolinfo->fname ?>"/>
    </div>
</div>
<div class="right">
    <div>
        <label  for="text">Last Name</label>
        <input type="text" name="dlname" value="<?php echo $schoolinfo->lname ?>"/>
    </div>
    <div>
        <label  for="text">Email</label>
        <input type="text" name="demail" value="<?php echo $schoolinfo->email ?>"/>
    </div>
    <div>
        <label  for="text">EID</label>
        <input type="text" name="deid" value="<?php echo $schoolinfo->eid ?>"/>
    </div>
    <div>
        <label  for="text">Phone number</label>
        <input type="text" name="dphone" name="dphone" value="<?php echo $schoolinfo->phone ?>"/>
    </div>
<div class="center">
    <div>
<!--        --><?php //echo form_submit('save', 'Save'); ?>
        <input type="submit" id="submit" name="dsubmit" value="Update">
    </div>
</div>
         <?php } ?>
        <?php echo form_close(); ?>