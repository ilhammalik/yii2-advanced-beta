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
  

        <h5 align="center">
            <?php echo Html::img('@web/images/logo.png'); ?>
        </h5>

        <h5 align="center"><b>
                BADAN PENGAWAS TENAGA NUKLIR <br/>
                <font size="3">Jl. Gajah Mada No. 8 Jakarta Pusat</font> </b>
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
                    <td height="30" colspan="3">Terlampir</td>

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
                    <td height="30" colspan="3">Terlampir</td>

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
                    <td colspan="3">Terlampir</td>

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

                <tr height="200">
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
                        1. <br/><br/>
                        2. <br/><br/>
                        3. <br/><br/>
                        4. <br/><br/>
                        5. <br/><br/>
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
                <td width="65%"></td>
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

</body>

