<?php

$js = <<<Modal
//fungsi untuk Tranport
$('#satuan1').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseFloat($('#volume1').val());
  var dat2 = parseFloat($('#satuan1').val());
  var hasil =  parseFloat(dat1*dat2);

  $('#jml1').val(hasil);
  $('#uraian1').val(" "+$('#simpelkeg-tgl_selesai').val());
 $('#uraian1').val("Asuransi tertanggung dari tanggal "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan1').val()+" x "+$('#volume1').val()+" = Rp. "+hasil+"");


});

//fungsi untuk Airort Tax
$('#satuan2').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseFloat($('#volume2').val());
  var dat2 = parseFloat($('#satuan2').val());
  var hasil =  parseFloat(dat1*dat2);

  $('#jml2').val(hasil);
  $('#uraian2').val("Airport tax ");

});

//fungsi untuk Tiket
$('#satuan3').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseFloat($('#volume3').val());
  var dat2 = parseFloat($('#satuan3').val());
  var hasil =  parseFloat(dat1*dat2);

  $('#jml3').val(hasil);
  $('#uraian3').val("Tiket ");

});

//fungsi untuk lumpsum
$('#satuan4').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseFloat($('#volume4').val());
  var dat2 = parseFloat($('#pagu4').val());
  var dat3 = parseFloat($('#satuan4').val());
  var dat4 = parseFloat($('#persen4').val());
  var hasil =  parseFloat(dat1*dat2*dat3*dat4);

  $('#jml4').val(hasil);
  
  $('#uraian4').val("Lumpsum dari tanggal "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan4').val()+" x "+$('#volume4').val()+" = Rp. "+hasil+"");


});

//fungsi untuk lumpsum 30%
$('#satuan5').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseFloat($('#volume5').val());
  var dat2 = parseFloat($('#pagu5').val());
  var dat3 = parseFloat($('#satuan5').val());
  var dat4 = parseFloat($('#persen5').val());
  var hasil =  parseFloat(dat1*dat2*dat3*dat4);

  $('#jml5').val(hasil);
  $('#uraian5').val("Lumpsum 30% Tanggal ");
   
  $('#uraian5').val("Lumpsum 30% dari tanggal "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan5').val()+" x "+$('#volume5').val()+" = Rp. "+hasil+"");

});

//fungsi untuk lumpsum 40%
$('#satuan6').on('keyup', function(){

  //membuat variabel penjumlahan
  var dat1 = parseFloat($('#volume6').val());
  var dat2 = parseFloat($('#pagu6').val());
  var dat3 = parseFloat($('#satuan6').val());
  var dat4 = parseFloat($('#persen6').val());
  var hasil =  parseFloat(dat1*dat2*dat3*dat4);

  $('#jml6').val(hasil);
  $('#uraian6').val("Lumpsum 40% dari tanggal "+$('#dtg').html()+" sd "+$('#kmbl').html()+" @ Rp. "+$('#satuan6').val()+" x "+$('#volume6').val()+" = Rp. "+hasil+"");

});





Modal;
$this->registerJs($js);
?>

