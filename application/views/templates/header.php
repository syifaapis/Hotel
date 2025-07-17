<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Admin Hotel' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= site_url('assets/quixlab-master/images/favicon.png') ?>">

    <!-- CSS Plugin -->
    <link href="<?= site_url('assets/quixlab-master/plugins/pg-calendar/css/pignose.calendar.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/quixlab-master/plugins/chartist/css/chartist.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/quixlab-master/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/quixlab-master/css/style.css') ?>" rel="stylesheet">

</head>
<body>
<div id="main-wrapper">

    <!-- Nav Header -->
    <div class="nav-header">
        <div class="brand-logo">
            <a href="<?= site_url('dashboard') ?>">
                <b class="logo-abbr"><img src="<?= site_url('assets/quixlab-master/images/logo.png') ?>" alt=""> </b>
                <span class="logo-compact"><img src="<?= site_url('assets/quixlab-master/images/logo-compact.png') ?>" alt=""></span>
                <span class="brand-title">
                    <img src="<?= site_url('assets/quixlab-master/images/logo-text.png') ?>" alt="">
                </span>
            </a>
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <div class="header-content clearfix">
            <div class="header-right">
                <!-- Kamu bisa tambahkan profile atau notif di sini -->
            </div>
        </div>
    </div>
