<div class="grantschool">
    <div class="name_site">
        <?php echo html_escape($school->school_name); ?>
        <?php echo html_escape($site->site_number); ?>
    </div>
    <div class="date">
        <?php echo html_escape($site->site_date_school); ?>
    </div>
    <?php if ($site->site_logo) { ?>
        <div class="logo">
            <?php echo img('upload/' . $site->site_logo); ?>
        </div>
    <?php } ?>
</div>