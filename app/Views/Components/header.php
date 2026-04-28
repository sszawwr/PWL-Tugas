<?php helper('url'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Toko</title>

  <!-- CSS -->
  <link href="<?= base_url('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('NiceAdmin/assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>

<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="<?= base_url('/') ?>" class="logo d-flex align-items-center">
      <img src="<?= base_url('NiceAdmin/assets/img/logo.png') ?>">
      <span class="d-none d-lg-block">Toko</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <!-- 🔔 NOTIF FULL -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number">4</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            You have 4 new notifications
            <a href="#"><span class="badge bg-primary ms-2">View all</span></a>
          </li>

          <li><hr class="dropdown-divider"></li>

          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
              <h4>Lorem Ipsum</h4>
              <p>Notif contoh</p>
              <p>30 min. ago</p>
            </div>
          </li>

          <li><hr class="dropdown-divider"></li>

          <li class="notification-item">
            <i class="bi bi-x-circle text-danger"></i>
            <div>
              <h4>Error</h4>
              <p>Notif kedua</p>
              <p>1 hr. ago</p>
            </div>
          </li>

          <li><hr class="dropdown-divider"></li>

          <li class="dropdown-footer">
            <a href="#">Show all notifications</a>
          </li>
        </ul>
      </li>

      <!-- 💬 MESSAGE FULL -->
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success badge-number">3</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">
            You have 3 new messages
            <a href="#"><span class="badge bg-primary ms-2">View all</span></a>
          </li>

          <li><hr class="dropdown-divider"></li>

          <li class="message-item">
            <a href="#">
              <img src="<?= base_url('NiceAdmin/assets/img/messages-1.jpg') ?>" class="rounded-circle">
              <div>
                <h4>User 1</h4>
                <p>Pesan contoh</p>
              </div>
            </a>
          </li>

          <li><hr class="dropdown-divider"></li>

          <li class="message-item">
            <a href="#">
              <img src="<?= base_url('NiceAdmin/assets/img/messages-2.jpg') ?>" class="rounded-circle">
              <div>
                <h4>User 2</h4>
                <p>Pesan kedua</p>
              </div>
            </a>
          </li>

          <li><hr class="dropdown-divider"></li>

          <li class="dropdown-footer">
            <a href="#">Show all messages</a>
          </li>
        </ul>
      </li>

      <!-- 👤 PROFILE -->
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="<?= base_url('NiceAdmin/assets/img/profile-img.jpg') ?>" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">
            <?= session()->get('username'); ?> (<?= session()->get('role'); ?>)
          </span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profile') ?>">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('logout') ?>">
              <i class="bi bi-box-arrow-right"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>

</header>