<?php
	function hari($input){
		$input2 = date("m/d/Y",strtotime($input));
		$hari = strftime("%A", strtotime($input2)); // input strtotime("mm/dd/yyyy");
		if($hari=='Sunday') $hari = 'Minggu';
		if($hari=='Monday') $hari = 'Senin';
		if($hari=='Tuesday') $hari = 'Selasa';
		if($hari=='Wednesday') $hari = 'Rabu';
		if($hari=='Thursday') $hari = 'Kamis';
		if($hari=='Friday') $hari = "Jum'at";
		if($hari=='Saturday') $hari = 'Sabtu';
		return $hari;
	}
	
	function bulan($input){
					if(date("m",strtotime($input))==01) return " Januari ";
					if(date("m",strtotime($input))==02) return " Februari ";
					if(date("m",strtotime($input))==03) return " Maret ";
					if(date("m",strtotime($input))==04) return " April ";
					if(date("m",strtotime($input))==05) return " Mei ";
					if(date("m",strtotime($input))==06) return " Juni ";
					if(date("m",strtotime($input))==07) return " Juli ";
					if(date("m",strtotime($input))==08) return " Agustus ";
					if(date("m",strtotime($input))==09) return " September ";
					if(date("m",strtotime($input))==10) return " Oktober ";
					if(date("m",strtotime($input))==11) return " November ";
					if(date("m",strtotime($input))==12) return " Desember ";
	}
?> 

