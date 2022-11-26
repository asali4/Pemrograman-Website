<?php
include 'head.php';
?>

<h3><span class="bi bi-briefcase"></span> Detail Item</h3>
<a class="btn" href="item.php"><span class="bi bi-arrow-left"></span> Kembali</a>

<?php
$id_brg = $_GET['id'];


$det = $conn->query("select * from item where id='$id_brg'") or die($conn->connect_error);
while ($d = mysqli_fetch_array($det)) {
?>
    <table class="table">
        <tr>
            <td>Nama</td>
            <td><?= $d['nama'] ?></td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td><?= $d['jenis'] ?></td>
        </tr>
        <tr>
            <td>Suplier</td>
            <td><?= $d['suplier'] ?></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><?= $d['jumlah'] ?></td>
        </tr>
        <tr>
            <td>Satuan</td>
            <td>Box</td>
        </tr>
    </table>
<?php
}
?>
<?php include 'footer.php'; ?>