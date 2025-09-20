<?php 
	$cenaBazowa = 1000.00;
	$wiek = 16;
	$uczen = true;
	$student = false;
	$senior = false;
	$niepelnosprawny = false;
	$strefa = "AB";
	$godzina = 12;
	$dzienTygodnia = 6;
	$przewozBagazu = true;
	$limitDzienny = 15.00;
	$dotychczasWydano = 14.20;
	$kodRabatowy = "STUDENT5";
	$kontrolaBiletu = false;

	if($cenaBazowa <= 0) {
		echo "Błąd konfiguracji";
	} else {
		// 2
		if($strefa == "A"){
		} else if($strefa == "B"){
			$cenaBazowa = ($cenaBazowa) * 0.10;
		} else if ($strefa == "AB"){
			$cenaBazowa = ($cenaBazowa) * 0.30;
		}
		// 3
		if($godzina >= 10.00 && $godzina <= 15.59 || $godzina >= 20.00 && $godzina <= 4.59){
			$cenaBazowa = ($cenaBazowa) * 0.15;
		}
		// 4
		if($dzienTygodnia == 6 || $dzienTygodnia == 7){
			$cenaBazowa = ($cenaBazowa) * 0.10;
		}
		// 5
		if($uczen === true){
			$cenaBazowa = ($cenaBazowa) * 0.37;
		} else if($student === true){
			$cenaBazowa = ($cenaBazowa) * 0.51;
		} else if($senior == true || $wiek >= 60) {
			$cenaBazowa = ($cenaBazowa) * 0.30;
		} else if($niepelnosprawny === true){
			$cenaBazowa = ($cenaBazowa) * 0.78;
		}
		// 6
		if($student === true){
			if($kodRabatowy == "STUDENT5"){
				$cenaBazowa = ($cenaBazowa) * 0.05;
			}
		} else if($dzienTygodnia == 6 || $dzienTygodnia == 7){
			if($kodRabatowy == "WEEKEND10"){
				$cenaBazowa = ($cenaBazowa) * 0.10;
			}
		}
		// 8
		$cena = round($cenaBazowa, 2);
		// 9
		if(($dotychczasWydano + $cena) > $limitDzienny){
			$cena = $limitDzienny - $dotychczasWydano;
		} 
		// 11
		if($cena < 1.00){
			$cena = 1.00;
		}
		// 10
		if($kontrolaBiletu == true) {
			if($kodRabatowy == "STUDENT5" && $student == true || $kodRabatowy == "WEEKEND10" && $dzienTygodnia == 6 || $dzienTygodnia == 7) {
				echo "Kupon jest nie ważny!";
				echo $cena;
				$cena = $cena + 50;
			}
		// 7
		if($przewozBagazu === true){
			$cenaBazowa = ($cenaBazowa) + 1.50;
		}
		}
		echo $cena;

	}

?>

