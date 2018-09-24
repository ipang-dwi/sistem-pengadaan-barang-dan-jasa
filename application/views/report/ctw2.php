<?php
function rupiah($cur){					// bwt nampilin format rupiah
	echo "Rp. ".number_format($cur, 0, ',', '.').",-</br>";
}
function ctw($cur,$f){
	$l = strlen($cur);
	$c = str_split($cur);
	$w = '';
	$counter = 1;
	$no = 1;
	$non = 1;
	$nonj = 1;
	$nonm = 1;
	$nont = 1;
	$nonb = 1;
	for($i=0;$i<$l;$i++){
		$dec = $l-$i;
		if($c[$i]==1) $v = "satu ";
		if($c[$i]==2) $v = "dua ";
		if($c[$i]==3) $v = "tiga ";
		if($c[$i]==4) $v = "empat ";
		if($c[$i]==5) $v = "lima ";
		if($c[$i]==6) $v = "enam ";
		if($c[$i]==7) $v = "tujuh ";
		if($c[$i]==8) $v = "delapan ";
		if($c[$i]==9) $v = "sembilan ";
		if($c[$i]==0) $v = "";
		if($dec==17){					// puluhan bilyar
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nonb = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==16){					// bilyar
			if($nonb==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." bilyar ";
			}  
			else $w = $w."bilyar ";
		}
		if($dec==14){					// puluhan trilyun
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nont = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==13){					// trilyun
			if($nont==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." trilyun ";
			}  
			else $w = $w."trilyun ";
		}
		if($dec==11){					// puluhan milyar
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nonm = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==10){					// milyar
			if($nonm==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." milyar ";
			} 
			else $w = $w."milyar ";
		}
		if($dec==8){					// puluhan juta
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nonj = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==7){					// jutaan
			if($nonj==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." juta ";
			}
			else $w = $w."juta ";
		}
		if($dec==5){					// puluhan ribu
			if($v=="satu "){
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$non = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==4){					// ribuan
			if($non==1){
				if($v=="satu "&&$l==4) $w = $w."seribu ";
				else if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." ribu ";
			} 
			else $w = $w."ribu ";
		} 
		// ratusan, ratusan ribu, ratusan juta, ratusan milyar, ratusan trilyun, ratusan bilyar >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		if($dec==3||$dec==6||$dec==9||$dec==12||$dec==15||$dec==18){	
			if($v=="satu ") $w = $w."seratus ";
			else if($v=="") $w = $w."";
			else $w = $w."".$v." ratus ";
		} 
		if($dec==2){					// puluhan
			if($v=="satu "){
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$no = 0;
			}
			else if($v=="") $w = $w."";
			else $w = $w."".$v." puluh ";
		} 
		if($dec==1){					// satuan
			if($no==0) $w = $w."";
			else $w = $w."".$v;
		}
		
	}
	if($f==3) return ucwords($w);
	$w = $w." rupiah";
	if($f==0) return $w;
	else if($f==1) return ucfirst($w);
	else if($f==2) return ucwords($w);
}
?>