<?php include 'head.php'; ?>

<h3><b> Data Item </b></h3>
<button style="margin-bottom:20px" data-bs-toggle="modal" data-bs-target="#modalInput" class="btn btn-info col-md-3"><span class="bi bi-plus-circle"></span> Tambah Item</button>
<br>


<?php
$per_hal = 10;
$jumlah_record = $conn->query("SELECT COUNT(*) from item");
$jum = mysqli_result($jumlah_record, 0);
$halaman = ceil($jum / $per_hal);

?>

<div class="col-md-12">
    <table class="col-md-3">
        <tr>
            <td>Jumlah Record</td>
            <td><?php
                echo ": " . number_format($jum);
                ?>
            </td>
        </tr>
        <tr>
            <td>Jumlah Halaman</td>
            <td><?php
                echo ": " . number_format($halaman);
                ?>
            </td>
        </tr>
        <tr>
            <td>Jumlah Item</td>
            <td>
                <?php
                $x = $conn->query("select sum(jumlah) as total from item");
                $xx = mysqli_fetch_array($x);
                echo ": " . number_format($xx['total']);
                ?>
            </td>
        </tr>
    </table>

</div>

<?php
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
?>

<form class="row g-3" method="get">
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="katakunci" value="<?php echo $katakunci ?>" />
    </div>
    <div class="col-auto">
        <input type="submit" name="cari" value="Cari Item" class="btn btn-secondary" />
    </div>
</form>

<br />
<table class="table table-hover">
    <tr>
        <th class="col-md-1">No</th>
        <th class="col-md-3">Nama Item</th>
        <th class="col-md-2">Jumlah</th>
        <th class="col-md-3">Aksi</th>
    </tr>
    <?php

    $sqltambahan = "";
    if ($katakunci != '') {
        $array_katakunci = explode(" ", $katakunci);
        for ($x = 0; $x < count($array_katakunci); $x++) {
            $sqlcari[] = "(nama like '%" . $array_katakunci[$x] . "%' or jenis like '%" . $array_katakunci[$x] . "%')";
        }
        $sqltambahan    = " where " . implode(" or ", $sqlcari);
    }

    $sql1   = "select * from item $sqltambahan";
    $page   = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start  = ($page > 1) ? ($page * $per_hal) - $per_hal : 0;
    $q1     = mysqli_query($conn, $sql1);
    $no  = $start + 1;
    $sql1   = $sql1 . " order by id desc limit $start,$per_hal";
    $q1     = mysqli_query($conn, $sql1);

    while ($b = mysqli_fetch_array($q1)) {

    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $b['nama'] ?></td>
            <td><?= $b['jumlah'] ?></td>
            <td>
                <a href="det_item.php?id=<?= $b['id']; ?>" class="btn btn-info">Detail</a>
                <a href="edit.php?id=<?= $b['id']; ?>" class="btn btn-warning">Edit</a>
                <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?= $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<nav>
    <?php
    $previous = $page - 1;
    $next = $page + 1;
    ?>
    <ul class="pagination justify-content-start">
        <li class="page-item">
            <a class="page-link" <?php if ($page > 1) {
                                        echo "href='?page=$previous'";
                                    } ?>>&laquo;</a>
        </li>
        <?php
        for ($x = 1; $x <= $page; $x++) {
        ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
            </li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" <?php
                                    if ($page < $halaman) {
                                        echo "href='?page=$next'";
                                    } ?>>&raquo;</a>
        </li>
    </ul>
</nav>

<!-- modal input -->
<div id="modalInput" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah item Baru</h4>
            </div>
            <div class="modal-body">
                <form action="tmb_item_act.php" method="post">
                    <div class="form-group">
                        <label>Nama item</label>
                        <input name="nama" type="text" class="form-control" placeholder="Nama item ..">
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <input name="jenis" type="text" class="form-control" placeholder="Jenis item ..">
                    </div>
                    <div class="form-group">
                        <label>Suplier</label>
                        <input name="suplier" type="text" class="form-control" placeholder="Suplier ..">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>