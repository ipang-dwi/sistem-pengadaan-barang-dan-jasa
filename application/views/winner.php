<?php
$query = $this->db->query('select * from harga where id_pekerjaan = '.$idr.';');
$total_nego = 0;
$total_p1 = 0;
$total_p2 = 0;
$total_hps = 0;

foreach ($query->result() as $row)	// untuk harga nego
{
    $total_nego = $total_nego + ($row->harga_nego * $row->volume);
	$total_p1 = $total_p1 + ($row->harga_p1 * $row->volume);
	$total_p2 = $total_p2 + ($row->harga_p2 * $row->volume);
	$total_hps = $total_hps + ($row->hps * $row->volume);
	
	echo "<br>Item ".$row->item." - Harga nego ".$row->harga_nego." - Vol ".$row->volume." - Jumlah ".$total_nego;
	echo "<br>Item ".$row->item." - Harga P1 ".$row->harga_p1." - Vol ".$row->volume." - Jumlah ".$total_p1;
	echo "<br>Item ".$row->item." - Harga P2 ".$row->harga_p2." - Vol ".$row->volume." - Jumlah ".$total_p2;
	echo "<br>Item ".$row->item." - HPS ".$row->hps." - Vol ".$row->volume." - Jumlah ".$total_hps;
}

echo '<br>Total Nego : ' . $total_nego;
echo '<br>Total P1 : ' . $total_p1;
echo '<br>Total P2 : ' . $total_p2;
echo '<br>Total HPS : ' . $total_hps;

$query = $this->db->query('select peserta1, peserta2 from pekerjaan;');
foreach ($query->result() as $u){
	$p1 = $u->peserta1;
	$p2 = $u->peserta2;
}
if($total_p1<$total_p2){
	$query = $this->db->query("UPDATE `pekerjaan` SET `winner` = ".$p1." WHERE `id_pekerjaan` = ".$idr.";");
}
else{
	$query = $this->db->query("UPDATE `pekerjaan` SET `winner` = ".$p2." WHERE `id_pekerjaan` = ".$idr.";");
}

header('location:'.base_url().'dashboard/report_list/'.$idr);
?>