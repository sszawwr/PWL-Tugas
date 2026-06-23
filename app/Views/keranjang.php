<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?= form_open('keranjang/edit') ?>

<table class="table datatable">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Foto</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;

        if (!empty($items)) :
            foreach ($items as $item) :
        ?>
                <tr>
                    <td><?= $item['name'] ?></td>

                    <td>
                        <img src="<?= base_url('img/' . $item['options']['foto']) ?>"
                             width="100">
                    </td>

                    <td>
                        <?= number_to_currency($item['price'], 'IDR') ?>
                    </td>

                    <td>
                        <input type="number"
                               min="1"
                               name="qty<?= $i++ ?>"
                               value="<?= $item['qty'] ?>"
                               class="form-control">
                    </td>

                    <td>
                        <?= number_to_currency($item['subtotal'], 'IDR') ?>
                    </td>

                    <td>
                        <a href="<?= base_url('keranjang/delete/' . $item['rowid']) ?>"
                           class="btn btn-danger"
                           onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
        <?php
            endforeach;
        else :
        ?>
            <tr>
                <td colspan="6" class="text-center">
                    Keranjang masih kosong
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="alert alert-info">
    Total = <?= number_to_currency($total, 'IDR') ?>
</div>

<button type="submit" class="btn btn-primary">
    Perbarui Keranjang
</button>

<a href="<?= base_url('keranjang/clear') ?>"
   class="btn btn-warning">
    Kosongkan Keranjang
</a>
<?php if (!empty($items)) : ?>
    <a class="btn btn-success" href="<?php echo base_url() ?>checkout">Selesai Belanja</a>
<?php endif; ?>

<?= form_close() ?>

<?= $this->endSection() ?>