<?php

$js = <<<Modal
//fungsi untuk Tranport
$('#satuan1').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseInt($('#volume1').val());
  var dat2 = parseInt($('#satuan1').val());
  var hasil =  parseInt(dat1*dat2);

  $('#jml1').val(hasil);
  $('#uraian1').val("Transport ");

});

//fungsi untuk Taksi
$('#satuan2').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseInt($('#volume2').val());
  var dat2 = parseInt($('#satuan2').val());
  var hasil =  parseInt(dat1*dat2);

  $('#jml2').val(hasil);
  $('#uraian2').val("Taksi "+$('#kdtg').html());


});

//fungsi untuk Taksi PULANG
$('#satuan3').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseInt($('#volume3').val());
  var dat2 = parseInt($('#satuan3').val());
  var hasil =  parseInt(dat1*dat2);

  $('#jml3').val(hasil);
  $('#uraian3').val("Taksi "+$('#kkmbl').html());

});

//fungsi untuk UANG Harian
$('#satuan4').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseInt($('#volume4').val());
  var dat2 = parseInt($('#satuan4').val());
  var hasil =  parseInt(dat1*dat2);
  var tmulai =$('#simpelkeg-tgl_mulai').val();
  var tselesai =$('#simpelkeg-tgl_selesai').val();
  var ptg = tmulai.substr(8, 2)+" & "+tselesai.substr(8, 2);
  var thn = tmulai.substr(0, 4);
 
       
  $('#jml4').val(hasil);
$('#uraian4').val(" Uang harian selama "+$('#idmakan').val()+"    hari di "+$('#kkmbl').html()+", "+$('#kprov').html()+" tgl. "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan4').val()+" x "+$('#volume4').val()+" = Rp. "+hasil+"");
});

//fungsi untuk Uang Saku Fullboard
$('#satuan5').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseInt($('#volume5').val());
  var dat2 = parseInt($('#satuan5').val());
  var hasil =  parseInt(dat1*dat2);

  $('#jml5').val(hasil);
$('#uraian5').val(" Uang Saku Fullboard selama "+$('#idmakan').val()+"    hari di "+$('#kkmbl').html()+", "+$('#kprov').html()+" tgl. "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan5').val()+" x "+$('#volume5').val()+" = Rp. "+hasil+"");

});



//fungsi untuk Penginapan 
$('#satuan6').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseInt($('#volume6').val());
  var dat2 = parseInt($('#satuan6').val());
  var hasil =  parseInt(dat1*dat2);

  $('#jml6').val(hasil);
  $('#uraian6').val(" Penginapan selama "+$('#idmakan').val()+"    hari di "+$('#kkmbl').html()+", "+$('#kprov').html()+" tgl. "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan6').val()+" x "+$('#volume6').val()+" = Rp. "+hasil+"");

});

//fungsi untuk Penginapan Fullboard
$('#satuan7').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseInt($('#volume7').val());
  var dat2 = parseInt($('#satuan7').val());
  var hasil =  parseInt(dat1*dat2);

  $('#jml7').val(hasil);
$('#uraian7').val(" Penginapan Fullboard selama "+$('#idmakan').val()+"    hari di "+$('#kkmbl').html()+", "+$('#kprov').html()+" tgl. "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan7').val()+" x "+$('#volume7').val()+" = Rp. "+hasil+"");

});


//fungsi untuk Representatif
$('#satuan8').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseInt($('#volume8').val());
  var dat2 = parseInt($('#satuan8').val());
  var hasil =  parseInt(dat1*dat2);

  $('#jml8').val(hasil);
  $('#uraian8').val(" Representatif selama "+$('#idmakan').val()+"    hari di "+$('#kkmbl').html()+", "+$('#kprov').html()+" tgl. "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan8').val()+" x "+$('#volume8').val()+" = Rp. "+hasil+"");


});


//fungsi untuk Transport Pimpinan / Expert / Inspeksi
$('#satuan9').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseInt($('#volume9').val());
  var dat2 = parseInt($('#satuan9').val());
  var hasil =  parseInt(dat1*dat2);

  $('#jml9').val(hasil);
  $('#uraian9').val(" Transport Pimpinan / Expert / Inspeksi selama "+$('#idmakan').val()+"    hari di "+$('#kkmbl').html()+", "+$('#kprov').html()+" tgl. "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan9').val()+" x "+$('#volume9').val()+" = Rp. "+hasil+"");

});


//fungsi untuk Penginapan Lain 30%
$('#satuan10').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseInt($('#volume10').val());
  var dat2 = parseInt($('#satuan10').val());
  var hasil =  parseInt(dat1*dat2);

  $('#jml10').val(hasil);
  $('#uraian10').val("Ini Adalah Uraian Tranport "+hasil);
  $('#uraian10').val(" Penginapan Lain 30% selama "+$('#idmakan').val()+"    hari di "+$('#kkmbl').html()+", "+$('#kprov').html()+" tgl. "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan9').val()+" x "+$('#volume9').val()+" = Rp. "+hasil+"");

});
Modal;
$this->registerJs($js);
?>

