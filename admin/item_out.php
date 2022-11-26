<?php include 'head.php';    ?>

<h3><b>Data Item Keluar</b></h3>
<button style="margin-bottom:20px" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-info col-md-2"><span class="bi bi-pencil"></span> Entry</button>
<form action="" method="get">
    <div class="input-group col-md-5 col-md-offset-7">
        <span class="input-group-addon" id="basic-addon1"></span>
        <!-- <span class="bi bi-calendar"></span></span> -->
        <select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
            <option>Pilih tanggal ..</option>
            <?php
            $pil = $conn->query("select distinct tanggal from item_out order by tanggal desc");
            while ($p = mysqli_fetch_array($pil)) {
            ?>
                <option><?= $p['tanggal'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>

</form>
<br />

<?php
if (isset($_GET['tanggal'])) {
    echo "<h5> Data Penjualan Tanggal  <a style='color:blue'> " . $_GET['tanggal'] . "</a></h5>";
}
?>
<table class="table">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama item</th>
        <th>Jumlah</th>
        <th>Opsi</th>
    </tr>
    <?php
    if (isset($_GET['tanggal'])) {
        $tanggal = $_GET['tanggal'];
        $brg = $conn->query("select * from item_out where tanggal like '$tanggal' order by tanggal desc");
    } else {
        $brg = $conn->query("select * from item_out order by tanggal desc");
    }
    $no = 1;
    while ($b = mysqli_fetch_array($brg)) {

    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $b['tanggal'] ?></td>
            <td><?= $b['nama'] ?></td>
            <td><?= $b['jumlah'] ?></td>
            <td>
                <a href="edit_out.php?id=<?= $b['id']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_out.php?id=<?= $b['id']; ?>&jumlah=<?= $b['jumlah'] ?>&nama=<?= $b['nama']; ?>' }" class="btn btn-danger">Hapus</a>
            </td>
        </tr>

    <?php
    }
    ?>
</table>

<!-- modal input -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Entry
            </div>
            <div class="modal-body">
                <form action="item_out_act.php" method="post">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input name="tanggal" type="text" class="form-control" id="tanggal" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Nama item</label>
                        <select class="form-control" name="nama">
                            <?php
                            $brg = $conn->query("select * from item");
                            while ($b = mysqli_fetch_array($brg)) {
                            ?>
                                <option value="<?= $b['nama']; ?>"><?= $b['nama'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <input type="reset" class="btn btn-danger" value="Reset">
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tanggal").datepicker({
            dateFormat: 'yy/mm/dd'
        });
    });
</script>
<?php include 'footer.php'; ?>