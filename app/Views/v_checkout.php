<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-6">
        <?= form_open('buy', 'class="row g-3"') ?>

<?= form_hidden('username', session()->get('username')) ?>
<input type="hidden" name="total_harga" id="total_harga" value="">

<div class="col-12">
    <?= form_label('Nama', 'nama', ['class' => 'form-label']) ?>
    <?= form_input([
        'name'     => 'nama',
        'id'       => 'nama',
        'class'    => 'form-control',
        'value'    => session()->get('username'),
        'readonly' => true]) ?>
</div>
<div class="col-12">
    <?= form_label('Alamat', 'alamat', ['class' => 'form-label']) ?>
    <?= form_input([
        'name'  => 'alamat',
        'id'    => 'alamat',
        'class' => 'form-control']) ?>
</div> 
<div class="col-12"> 
    <?= form_label('Kelurahan', 'kelurahan', ['class' => 'form-label']) ?>
    
    <select id="kelurahan" name="kelurahan"></select>
</div>
<div class="col-12"> 
    <?= form_label('Layanan', 'layanan', ['class' => 'form-label']) ?> 
    <select id="layanan" name="layanan" class="form-control"></select>
</div>
<div class="col-12">
    <?= form_label('Ongkir', 'ongkir', ['class' => 'form-label']) ?>
    <?= form_input([
        'name'     => 'ongkir',
        'id'       => 'ongkir',
        'class'    => 'form-control',
        'readonly' => true]) ?>
</div>
<div class="col-12">
    <?= form_label('Kode Kupon', 'kupon_code', ['class' => 'form-label']) ?>
    <?= form_input([
        'name' => 'kupon_code',
        'id' => 'kupon_code',
        'class' => 'form-control',
        'placeholder' => 'Contoh: HEMAT20'
    ]) ?>
</div>
<div class="col-12">
    <?= form_submit(
        'submit',
        'Buat Pesanan',
        ['class' => 'btn btn-primary']) ?>
</div>

<?= form_close() ?> 
    </div>
    <div class="col-lg-6">
        <table class="table">
  <thead>
      <tr>
          <th scope="col">Nama</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Sub Total</th>
      </tr>
  </thead>
  <tbody>
      <?php 
      if (!empty($items)) :
          foreach ($items as $index => $item) :
      ?>
              <tr>
                  <td><?= $item['name'] ?></td>
                  <td><?= number_to_currency($item['price'], 'IDR') ?></td>
                  <td><?= $item['qty'] ?></td>
                  <td><?= number_to_currency($item['price'] * $item['qty'], 'IDR') ?></td>
              </tr>
      <?php
          endforeach;
      endif;
      ?>
      <tr>
    <td colspan="2"></td>
    <td>Subtotal</td>
    <td><?= number_to_currency($total, 'IDR') ?></td>
</tr>

<tr>
    <td colspan="2"></td>
    <td>PPN (12%)</td>
    <td id="ppn">Rp 0</td>
</tr>

<tr>
    <td colspan="2"></td>
    <td>Biaya Admin</td>
    <td id="biaya_admin">Rp 0</td>
</tr>

<tr>
    <td colspan="2"></td>
    <td>Diskon Kupon</td>
    <td id="diskon_kupon">- Rp 0</td>
</tr>

<tr>
    <td colspan="2"></td>
    <td><strong>Grand Total</strong></td>
    <td><strong><span id="total"><?= number_to_currency($total, 'IDR') ?></span></strong></td>
</tr>
  </tbody>
</table>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
$(document).ready(function() {
let ongkir = 0;
let subtotal = <?= $total ?>;
hitungTotal();

function hitungTotal() {

    let kupon = $("#kupon_code").val().toUpperCase();

    let diskon = 0;

    if (kupon == "HEMAT20")
        diskon = subtotal * 0.20;
    else if (kupon == "HEMAT30")
        diskon = subtotal * 0.30;
    else if (kupon == "MEMBER25")
        diskon = subtotal * 0.25;

    let ppn = subtotal * 0.12;

    let admin = 0;

    if (subtotal <= 15000000)
        admin = subtotal * 0.005;
    else if (subtotal <= 35000000)
        admin = subtotal * 0.007;
    else
        admin = subtotal * 0.009;

    let total = subtotal - diskon + ppn + admin + ongkir;

    $("#ongkir").val(ongkir);

    $("#ppn").text("Rp " + ppn.toLocaleString('id-ID'));
    $("#biaya_admin").text("Rp " + admin.toLocaleString('id-ID'));
    $("#diskon_kupon").text("- Rp " + diskon.toLocaleString('id-ID'));

    $("#total").text("IDR " + total.toLocaleString('id-ID'));
    $("#total_harga").val(total);
}
	$('#kelurahan').select2({
	    placeholder: 'Cari daerah tujuan',
	    minimumInputLength: 3, 
        ajax: {
    url: '<?= site_url('ajax/destinations') ?>',
    dataType: 'json',
    delay: 300,
    data: function(params) {
        return {
            q: params.term
        };
    },
    processResults: function(data) {
        return data;
    },
    cache: true
}
	});
   $('#kelurahan').on('select2:select', function (e) {

    let id_kelurahan = e.params.data.id;

    $("#layanan").empty();

    ongkir = 0;
    hitungTotal();

    $.ajax({
        url: "<?= site_url('ajax/costs') ?>",
        dataType: "json",
        data: {
            destination: id_kelurahan
        },
        success: function(data) {

            console.log(data);

            $("#layanan").append(
                $('<option>', {
                    value: '',
                    text: 'Pilih Layanan'
                })
            );

            data.forEach(function(item) {

                $("#layanan").append(
                    $('<option>', {
                        value: item.cost,
                        text: item.service + ' - Rp ' +
                              item.cost.toLocaleString('id-ID')
                    })
                );

            });

        }
    });

});
$("#layanan").on('change', function() {
    ongkir = parseInt($(this).val());
    hitungTotal();
}); 

$("#kupon_code").on("keyup change", function () {
    hitungTotal();
});
});
</script>
<?= $this->endSection() ?>