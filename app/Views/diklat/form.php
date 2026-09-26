<form method="post" action="<?= site_url('diklat/simpanProses/'.$row['id']) ?>">

<table class="table table-bordered" id="tabelPeserta">
    <thead class="table-light">
        <tr>
            <th>Peserta</th>
            <th width="150">Biaya</th>
            <th width="150">Subtotal</th>
            <th width="80">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <input type="text" name="peserta[]" class="form-control" required>
            </td>
            <td>
                <input type="number" name="biaya[]" class="form-control biaya" value="0">
            </td>
            <td>
                <input type="number" name="subtotal[]" class="form-control subtotal" value="0" readonly>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm hapus">✖</button>
            </td>
        </tr>
    </tbody>
</table>

<div class="mb-3">
    <button type="button" id="tambahBaris" class="btn btn-primary btn-sm">
        + Tambah Baris
    </button>
</div>

<div class="mb-3">
    <label><strong>Total Biaya</strong></label>
    <input type="number" id="total" class="form-control" value="0" readonly>
</div>

<div class="text-end">
    <button type="submit" class="btn btn-success">
        Simpan
    </button>
</div>

</form>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const tabel = document.querySelector('#tabelPeserta tbody');
    const totalInput = document.getElementById('total');

    // TAMBAH BARIS
    document.getElementById('tambahBaris').addEventListener('click', function () {
        const row = `
        <tr>
            <td>
                <input type="text" name="peserta[]" class="form-control" required>
            </td>
            <td>
                <input type="number" name="biaya[]" class="form-control biaya" value="0">
            </td>
            <td>
                <input type="number" name="subtotal[]" class="form-control subtotal" value="0" readonly>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm hapus">✖</button>
            </td>
        </tr>`;
        tabel.insertAdjacentHTML('beforeend', row);
    });

    // HITUNG SUBTOTAL & TOTAL
    document.addEventListener('input', function (e) {
        if (e.target.classList.contains('biaya')) {
            const tr = e.target.closest('tr');
            const biaya = parseInt(e.target.value) || 0;
            tr.querySelector('.subtotal').value = biaya;
            hitungTotal();
        }
    });

    // HAPUS BARIS
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('hapus')) {
            e.target.closest('tr').remove();
            hitungTotal();
        }
    });

    function hitungTotal() {
        let total = 0;
        document.querySelectorAll('.subtotal').forEach(el => {
            total += parseInt(el.value) || 0;
        });
        totalInput.value = total;
    }

});
</script>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>



<label><b>Tanda Tangan Digital</b></label><br>

<canvas id="signature-pad" 
style="border:1px solid #000;width:350px;height:150px;"></canvas>

<br><br>

<button type="button" onclick="clearTtd()" class="btn btn-warning btn-sm">
Hapus TTD
</button>

<input type="hidden" name="ttd_digital" id="ttd_digital">


<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

<script>

const canvas = document.getElementById('signature-pad');
const signaturePad = new SignaturePad(canvas);

function clearTtd(){
    signaturePad.clear();
}

document.querySelector("form").addEventListener("submit", function () {

    if (!signaturePad.isEmpty()) {

        let data = signaturePad.toDataURL("image/png");

        document.getElementById("ttd_digital").value = data;

    }

});

</script>

</script>