<?php
// Quick and dirty navigation.
$menu_item_default = 'index';
$menu_items = array(
  'index' => array(
    'label' => 'Home',
    'desc' => 'A list of all my grantschools',
  ),
  'add' => array(
    'label' => 'Add',
    'desc' => 'Add a grantschool to my collection',
  ),
);

// Determine the current menu item.
$menu_current = $menu_item_default;
// If there is a query for a specific menu item and that menu item exists...
if (@array_key_exists($this->uri->segment(2), $menu_items)) {
  $menu_current = $this->uri->segment(2);
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ESE Grant Schools | <?php html_escape($menu_items[$menu_current]['label']); ?></title>
        <meta name="description" content="<?php html_escape($menu_items[$menu_current]['desc']); ?>">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="/css/main.css">

        <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="http://localhost:8888/index.php/grantschool/index">ESE Networks Georgia Grant Schools</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">

                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">