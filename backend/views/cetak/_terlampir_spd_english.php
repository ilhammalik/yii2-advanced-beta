<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
?>      

 <style type="text/css">
.list{
    
    border-collapse: collapse;
    width: 100%;
    display: table-header-group;

}
.list tr td{
    border: 1px solid black;
    padding: 4px;
    border-collapse: collapse;
}
.list tr th{
    text-align: center; 
    font-weight: bold;
    border: 1px solid black;
    padding: 5px;
    border-collapse: collapse;
    background-color: #3c8dbc;
    color:#fff;
}
.list tr.even td {
    background-color: #d6eaff;
}




.lis{
    
    border-collapse: collapse;
    width: 100%;
    display: table-header-group;

}
.lis tr td{
    border: 1px solid black;
    padding: 0px;
    border-collapse: collapse;
}
.lis tr th{
    text-align: center; 
    font-weight: bold;
    border: 1px solid black;
    padding: 0px;
    border-collapse: collapse;
    background-color: #3c8dbc;
    color:#fff;
}
.lis tr.even td {
    background-color: #d6eaff;
}

.noborder{
    border:none;
}
.noborder td {
    border:none;
    }

.noborder tr td {
    border:none;
    }

 </style>
    <?php
    foreach ($model2 as $model) {
        $no = 1;
        ?>

        <h5 align="center">
            <?php echo Html::img('@web/images/logo.png'); ?>
        </h5>

        <h5 align="center"><b>
                BADAN PENGAWAS TENAGA NUKLIR <br/>
                <font size="3">Jl. Gajah Mada No. 8 Jakarta Pusat</font> <?php echo $model3; ?></b>
        </h5>

        <table >

            <tr>

                <td width="400"></td>

                <td>
                    <table>

                        <tr>
                            <td width="100"><font size="1">Lembar Ke</font></td>
                            <td>:</td>

                            <td><font size="1"> 1 (satu)</font></td>
                        </tr>
                        <tr>
                            <td><font size="1">Kode No </font></td>
                            <td>:</td>

                            <td></td>
                        </tr>
                        <tr>
                            <td><font size="1">Nomor </font> </td>
                            <td>:</td>
                            <td><font size="1">79/TU 01 01/K/IV/2015 </font></td>

                        </tr>
                    </table></td>
            </tr>

        </table>

        <h6 align="center"><b>SURAT PERJALANAN DINAS (SPD)</b></h6>

        <table  width="100%" class='list'>
            <tbody>
                <tr>                
                    <td height="30" width='10'><font size="1">1</font></td>
                    <td height="30" width="260"> <font size="1">Pejabat Pembuat Komitmen</font></td>
                    <td height="30" width="10">:</td>
                    <td height="30" colspan="3"></td>

                </tr>
                <tr>
                    <td height="30"><font size="1">2</font></td>
                    <td height="30" width="240"><font size="1">Nama / Nip Pegawai yang melaksanakan Perjalanan Dinas</font></td>
                    <td height="30" width="10">:</td>
                    <td height="30" colspan="3"></td>

                </tr>

                <tr>
                    <td height="30"><font size="1">2</font></td>
                    <td height="50">
                        <font size="1">
                        a. Pangkat dan Golongan<br/>
                        b. Jabatan / Instansi<br/>
                        c. Tingkat Biaya Perjalanan Dinas
                        </font>
                    </td>
                    <td height="30" width="10">:</td>
                    <td height="30" colspan="3"></td>

                </tr>

                <tr>
                    <td><font size="1">4</font></td>
                    <td height="30"><font size="1">Maksud Perjalanan Dinas </font></td>
                    <td width="10">:</td>
                    <td colspan="3"></td>

                </tr>

                <tr>
                    <td><font size="1">5</font></td>
                    <td height="30"><font size="1">Alat angkut yang dipergunakan</font></td>
                     <td width="10">:</td>
                    <td colspan="3"></td>

                </tr>

                <tr>
                    <td><font size="1">6</font></td>
                    <td height="50">
                        <font size="1">
                        a. Tempat Berangkat<br/>
                        b. Tempat Tujuan<br/>
                        </font>
                    </td>
                     <td width="10">:</td>
                    <td colspan="3"></td>

                </tr>

                <tr>
                    <td><font size="1">7</font></td>
                    <td height="60">
                        <font size="1">
                        a. Lama Perjalanan Dinas<br/>
                        b. Tanggal Berangkat<br/>        
                        c. Tanggal harus kembali/tiba ditempat baru *)


                        </font>
                    </td>
                     <td width="10">:</td>
                    <td colspan="3"></td>

                </tr>

                <tr>
                    <td>
                        <font size="1">
                        8
                        </font>
                    </td>
                    <td> <font size="1"> Pengikut: Nama </font></td>
                    <td width="10">:</td>
                    <td ><font size="1">Tanggal Lahir </font></td>       
                    <td colspan="2"><font  size="1"><center>Keterangan</center> </font></td>


                </tr>

                <tr>
                    <td></td>
                    <td height="80">
                        <font size="1">
                        1. <br/>
                        2. <br/>
                        3. <br/>
                        4. <br/>
                        5. 
                        </font>
                    </td>
                    <td ></td> 
                    <td ></td>
                    <td colspan="2"></td>


                </tr>

                <tr>
                    <td valign="top"><font size="1">9</font></td>
                    <td height="50">
                        <font size="1">
                        Pembebanan Anggaran: <br/>
                        a. Instansi <br/>
                        b. Akun 
                        </font>
                    </td>
                    <td colspan="4"></td>

                </tr>

                <tr>
                    <td><font size="1">10</font></td>
                    <td>                 <font size="1">
                        Keterangan Lain-lain</font></td>
                    <td colspan="4" ></td>

                </tr>


            </tbody>
        </table> 
<br/>
        <table width="100%" >
            <tr>
                <td width="50%"></td>
                <td>Dikeluarkan di</td>
                <td width="10">:</td>
                <td>Jakarta</td>
            </tr>
             <tr>
                <td width="65%"></td>
                <td>Tanggal</td>
                <td>:</td>
                <td>11 Mei 2015</td>
            </tr>
             <tr>
                <td width="65%"><img src="<?= Url::to(['daftar-keg/qrcode']) ?> " width="30%"/></td>
                <td colspan="3"><hr/><br/><center>Pejabat Pembuat Komitmen</center><br/><br/><br/><br/><br/></td>
              
            </tr>

             <tr>
                <td width="65%"></td>
                <td colspan="3">
                <center>Afrizal S.T</center>
                <hr/>
                </td>
            </tr>
             <tr>
                <td width="65%"></td>
                <td  >NIP :
                </td>
                <td></td>
                <td>129309798789427</td>
            </tr>

        </table>
<pagebreak>
        <h6 align="right"><font size="1"><br/></font> </h6>
        <table class="lis" width="100%">


            <tr>
                <td width="500"> 

                </td>
                <td width="500"> 
                    <table class="table  ">
                        <tr>
                            <td   height="40" width="200">I. Berangkat dari</td>
                            <td width="5" >:</td>
                            <td colspan="1">Jakartaklk</td>
                        </tr>
                        <tr>
                            <td height="40" width="200">Ke</td>
                            <td width="5" >:</td>
                            <td>Bandung</td>
                        </tr>
                        <tr>
                            <td width="200">Pada Tanggal</td>
                            <td width="5" >:</td>
                            <td>12 Mei 2015</td>
                        </tr>
                        <tr>
                            <td height="0" colspan="3"width="200">Kepala Biro Perencanaan,</td>

                        </tr>
                        <tr>
                            <td  coslpan="2" width="270"><u><b>Drs. Hendriyanto Hadi Tjahyono, M.Si</b></u></td>

            </tr>
            <tr>
                <td  coslpan="2"  width="270"><u><b>NIP. 196105041984091001</b></u></td>

    </tr>

    </table>
    </td>
    </tr>


    <tr>
        <td width="500"> 
            <table class="lis  ">
                <tr>
                    <td   height="20" width="200">II. Tiba di </td>
                    <td width="5" >:</td>
                    <td>Bandung</td>
                </tr>

                <tr>
                    <td width="200">Pada Tanggal</td>
                    <td width="5" >:</td>
                    <td>12 Mei 2015</td>
                </tr>
                <tr>
                    <td height="90" colspan="3">Kepala </td>

                </tr>
                <tr>
                    <td  colspan="3" ><u><b>(.........................................................................................................................)</b></u></td>

    </tr>


    </table>
    </td>

    <td width="500"> 
        <table class="lis  ">
            <tr>
                <td   height="20" width="260">Berangkat dari </td>
                <td width="5" >:</td>
                <td></td>
            </tr>

            <tr>
                <td width="10">ke</td>
                <td width="5" >:</td>
                <td></td>
            </tr>
            <tr>
                <td width="10">Pada Tanggal</td>
                <td width="5" >:</td>
                <td></td>
            </tr>
            <tr>
                <td height="90" colspan="3" >Kepala </td>

            </tr>
            <tr>
                <td  colspan="3"><u><b>(.........................................................................................................................)</b></u></td>

    </tr>


    </table>
    </td>

    </tr>

    <tr>
        <td width="500"> 
            <table class="lis  ">
                <tr>
                    <td   height="20" width="200">III. Tiba di </td>
                    <td width="5" >:</td>
                    <td></td>
                </tr>

                <tr>
                    <td width="200">Pada Tanggal</td>
                    <td width="5" >:</td>
                    <td></td>
                </tr>
                <tr>
                    <td height="90" colspan="3">Kepala </td>

                </tr>
                <tr>
                    <td  colspan="3"><u><b>(.........................................................................................................................)</b></u></td>

    </tr>


    </table>
    </td>

    <td width="500"> 
        <table class="table  ">
            <tr>
                <td   height="20" width="260">Berangkat dari </td>
                <td width="5" >:</td>
                <td></td>
            </tr>

            <tr>
                <td width="10">ke</td>
                <td width="5" >:</td>
                <td></td>
            </tr>
            <tr>
                <td width="10">Pada Tanggal</td>
                <td width="5" >:</td>
                <td></td>
            </tr>
            <tr>
                <td height="90" colspan="3" >Kepala </td>

            </tr>
            <tr>
                <td  colspan="3"><u><b>(.........................................................................................................................)</b></u></td>

    </tr>


    </table>
    </td>
    </tr>

    <tr>
        <td width="500"> 
            <table class="table  ">
                <tr>
                    <td   height="20" width="200">IV. Tiba di </td>
                    <td width="5" >:</td>
                    <td></td>
                </tr>

                <tr>
                    <td width="200">Pada Tanggal</td>
                    <td width="5" >:</td>
                    <td></td>
                </tr>
                <tr>
                    <td height="90" colspan="3">Kepala </td>

                </tr>
                <tr>
                    <td  colspan="3" ><u><b>(.........................................................................................................................)</b></u></td>

    </tr>


    </table>
    </td>

    <td width="500"> 
        <table class="table  ">
            <tr>
                <td   height="20" width="260">Berangkat dari </td>
                <td width="5" >:</td>
                <td></td>
            </tr>

            <tr>
                <td width="10">ke</td>
                <td width="5" >:</td>
                <td></td>
            </tr>
            <tr>
                <td width="10">Pada Tanggal</td>
                <td width="5" >:</td>
                <td></td>
            </tr>
            <tr>
                <td height="90" colspan="3" >Kepala </td>

            </tr>
            <tr>
                <td  colspan="3"><u><b>(.........................................................................................................................)</b></u></td>

    </tr>


    </table>
    </td>

    </tr>
    <tr>
        <td width="500"> 
            <table class="table  ">
                <tr>
                    <td   height="20" width="200">V. Tiba di </td>
                    <td width="5" >:</td>
                    <td></td>
                </tr>

                <tr>
                    <td width="200">Pada Tanggal</td>
                    <td width="5" >:</td>
                    <td></td>
                </tr>
                <tr>
                    <td height="90" colspan="3">Kepala </td>

                </tr>
                <tr>
                    <td  colspan="3"><u><b>(.........................................................................................................................)</b></u></td>

    </tr>


    </table>
    </td>

    <td width="500"> 
        <table class="table  ">
            <tr>
                <td   height="20" width="260">Berangkat dari </td>
                <td width="5" >:</td>
                <td></td>
            </tr>

            <tr>
                <td width="10">ke</td>
                <td width="5" >:</td>
                <td></td>
            </tr>
            <tr>
                <td width="10">Pada Tanggal</td>
                <td width="5" >:</td>
                <td></td>
            </tr>
            <tr>
                <td height="90" colspan="3" >Kepala </td>

            </tr>
            <tr>
                <td  colspan="3"><u><b>(.........................................................................................................................)</b></u></td>

    </tr>


    </table>
    </td>

    </tr>

    <tr>
        <td width="500"> 
            <table class="table  ">
                <tr>
                    <td height="20" width="200">VI. Tiba di <br/> (tempat kedudukan)</td>
                    <td width="5" >:</td>
                    <td>Bandung</td>
                </tr>

                <tr>
                    <td width="200">Pada Tanggal</td>
                    <td width="5" >:</td>
                    <td>12 Mei 2015</td>
                </tr>
                <tr>
                    <td height="90" colspan="3"\>Kepala </td>

                </tr>
                <tr>
                    <td valign="center" colspan="3" ><u><b>(.........................................................................................................................)</b></u></td>

    </tr>


    </table>
    </td>

    <td width="400"> 
        <table class="table  ">
            <tr>
                <td colspan="3" height="90" width="400">Telah diperiksa dengan keterangan bahwa perjalanan
                    tersebut atas perintahnya dan semata-mata untuk
                    kepentingan jabatan dalam waktu yang sesingkat-singkatnya.  </td>

            </tr>
            <tr>
                <td colspan="3" height="90" width="200">Pejabat Pembuat Komitmen </td>

            </tr>

            <tr>
                <td colspan="3" width="200"><u><b>Afrizal, S.T <br/> NIP 07589745047504</b></u> </td>

    </tr>



    </table>
    </td>

    </tr>
    <tr>
        <td   height="90" colspan="3">VII Catatan Lain-lain <br/></td>
    </tr>

    <tr>
        <td height="30" colspan="3">VIII. PERHATIAN: <br/> <br/> <br/>
            PPK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba,
            serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila negara menderita
            rugi akibat kesalahan, kelalaian, dan kealpaannya.


        </td>
    </tr>


    </table>
 <!-- <img src="<?= Url::to(['daftar-keg/qrcode']) ?>" />  -->

    <?php
}
?>
</body>


