<html>
<head>
    <title>Update Data In Database Using CodeIgniter</title>
    <link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(). "css/update.css" ?>">
</head>
<body>
<div id="container">
    <div id="wrapper">
        <h1>Update Data In Database Using CodeIgniter </h1><hr/>
        <div id="menu">
            <p>Click On Menu</p>
            <!-- Fetching Names Of All Students From Database -->
            <ol>
                <?php foreach ($school as $schoolinfo): ?>
                    <li><a href="<?php echo base_url() . "index.php/update_ctrl/show_student_id/" . $schoolinfo->site_id; ?>"><?php echo $schoolinfo->site_number; ?></a></li>
                <?php endforeach; ?>
            </ol>
        </div>
        <div id="detail">
            <!-- Fetching All Details of Selected Student From Database And Showing In a Form -->
            <?php foreach ($school as $schoolinfo): ?>
                <p>Edit Detail & Click Update Button</p>
                <form method="post" action="<?php echo base_url() . "index.php/update_ctrl/update_student_id1"?>">
                    <label id="hide">School:</label>
                    <input type="text" id="hide" name="did" value="<?php echo $schoolinfo->site_number; ?>">
                    <label>Date Granted:</label>
                    <input type="text" name="dname" value="<?php echo $schoolinfo->site_date_school; ?>">
                    <label>First Name:</label>
                    <input type="text" name="demail" value="<?php echo $schoolinfo->fname; ?>">
                    <label>Last Name:</label>
                    <input type="text" name="dmobile" value="<?php echo $schoolinfo->lname; ?>">
                    <label>Email :</label>
                    <input type="text" name="daddress" value="<?php echo $schoolinfo->email; ?>">
                    <label>EID :</label>
                    <input type="text" name="daddress" value="<?php echo $schoolinfo->eid; ?>">
                    <label>Phone :</label>
                    <input type="text" name="daddress" value="<?php echo $schoolinfo->phone; ?>">
                    <input type="submit" id="submit" name="dsubmit" value="Update">
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>