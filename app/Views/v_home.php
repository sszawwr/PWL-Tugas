<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="row">
    <?php foreach ($products as $item) : ?>
        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body text-center">

                    <img src="<?= base_url('img/' . $item['foto']) ?>" 
                         alt="<?= $item['nama'] ?>" 
                         width="50%">

                    <h5 class="card-title">
                        <?= $item['nama'] ?>
                    </h5>

                    <p>
                        Rp <?= number_format($item['harga'],0,',','.') ?>
                    </p>

                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>