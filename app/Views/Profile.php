<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Profile Information</h5>

        <div class="row mb-2">
          <div class="col-lg-3 col-md-4 label">Username</div>
          <div class="col-lg-9 col-md-8"><?= $username ?></div>
        </div>

        <div class="row mb-2">
          <div class="col-lg-3 col-md-4 label">Role</div>
          <div class="col-lg-9 col-md-8">
            <span class="badge bg-danger"><?= $role ?></span>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-lg-3 col-md-4 label">Email</div>
          <div class="col-lg-9 col-md-8"><a href="mailto:<?= $email ?>" class="text-primary"><?= $email ?></a></div>
        </div>

        <div class="row mb-2">
          <div class="col-lg-3 col-md-4 label">Login Time</div>
          <div class="col-lg-9 col-md-8">
            <?= date('d M Y H:i', strtotime($login_time)) ?>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-lg-3 col-md-4 label">Status</div>
          <div class="col-lg-9 col-md-8">
            <span class="badge bg-success">Sudah Login</span>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>