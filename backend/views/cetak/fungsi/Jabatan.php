<?php

 	$jab = MyHelper::Jab($mode->pegawai->struk_id);
	$unit1= MyHelper::Unit($mode->pegawai->unit_id);
	$unit2=str_replace(array('Deputi','Sekretariat Utama','Direktorat','Biro','Pusat','Inspektorat','Subdirektorat','Bidang','Bagian','Balai','Subbagian','Seksi','Kelompok'),array('','','','','','','','','','','','',''),$unit1);
	$jabatan1=$jab." ".$unit1;
	$jabatan2=$jab." ".$unit2;
            
?>