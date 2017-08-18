<?php
    require_once __DIR__ . '/../../lib/Helpers/include-linkbuilder.php';
require_once __DIR__ . '/title.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
     <title> <?= "$title | E-library"; ?></title>
    <link href="<?= LINK_PREFIX; ?>assets/css/main.css" rel="stylesheet">
    <link href="<?= LINK_PREFIX; ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= LINK_PREFIX; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= LINK_PREFIX; ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= LINK_PREFIX; ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= LINK_PREFIX; ?>assets/css/owl.theme.default.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400|Open+Sans:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cedarville+Cursive" rel="stylesheet">
      <? require_once __DIR__ .'/../lib/Helpers/db_transact.php';?>
    <? require_once __DIR__ . '/favicons.php'?>
</head>

<body>
    <div class="outer_wrapper">

