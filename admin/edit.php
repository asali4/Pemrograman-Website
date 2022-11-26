<?php
include 'head.php';
?>
<h3><span class="bi bi-pencil-square"></span> Edit item</h3>
<a class="btn" href="item.php"><span class="bi bi-arrow-left"></span> Kembali</a>
<?php
$id_brg = $_GET['id'];
$det = $conn->query("select * from item where id='$id_brg'") or die($conn->connect_error);
while ($d = mysqli_fetch_array($det)) {
?>
	<form action="update.php" method="post">
		<table class="table">
			<input type="hidden" name="id" value="<?= $d['id'] ?>">
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?= $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td><input type="text" class="form-control" name="jenis" value="<?= $d['jenis'] ?>"></td>
			</tr>
			<tr>
				<td>Suplier</td>
				<td><input type="text" class="form-control" name="suplier" value="<?= $d['suplier'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="number" class="form-control" name="jumlah" value="<?= $d['jumlah'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
<?php include 'footer.php'; ?>