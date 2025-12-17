<!DOCTYPE html>
<html>
<head>
    <title>Print Multiple F4 Pages</title>
    <style>
        body {
            margin: 10;
            padding: 10px;
            font-family: Arial, sans-serif;
        }

        .page {
            width: 210mm; /* Lebar kertas F4 */
            height: 330mm; /* Tinggi kertas F4 */
            margin: auto;
            padding: 20px;
            box-sizing: border-box;
            border: 1px solid #000;
            page-break-after: always;
            overflow: hidden; /* Menghindari konten yang meluap */
        }

        .page-break {
            display: block;
            page-break-before: always;
        }

        table, tr, td {
            font-size: 12px;
            margin: 0;
            padding: 0;
            border-collapse: collapse;
        }

        h5 {
            display: block;
            font-size: 0.83em;
            margin: 0;
            font-weight: bold;
        }
        

        @media print {
            .page {
                border: none;
                margin: 0;
                width: 210mm; /* Lebar kertas F4 */
                height: 330mm; /* Tinggi kertas F4 */
                page-break-after: always;
                overflow: hidden; /* Menghindari konten yang meluap */
            }

            .page-break {
                display: none;
            }

            table, tr, td {
                font-size: 12px;
                margin: 0;
                padding: 0;
                border-collapse: collapse;
            }

            h5 {
                display: block;
                font-size: 0.83em;
                margin: 0;
                font-weight: bold;
            }
            th{
                text-align:center;
            }

            #printButton {
                display: none; /* Sembunyikan tombol cetak saat mencetak */
            }
        }
    </style>
    <script>
        function printDiv() {
            var divToPrint = document.getElementById('printArea');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><head><title>Print Multiple F4 Pages</title>');
            newWin.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">');
            newWin.document.write('<style>@media print { .page { border: none; margin: 0; width: 210mm; height: 330mm;  overflow: hidden; page-break-after: always;} .page-break { display: none; } table, tr, td { font-size: 12px; margin: 0; padding: 0; border-collapse: collapse; } h5 { display: block; font-size: 0.83em; margin: 0; font-weight: bold; } }</style>');
            newWin.document.write('</head><body onload="window.print();window.close()">');
            newWin.document.write(divToPrint.innerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
        }
    </script>
</head>
<body>
   


    <div id="printArea">
        <?php $max_row = 5; ?>
        
            <div class="page">
                <h3 style="text-align:center;"><b>KOREKSI AJUAN SEKRETARIAT DAERAH KABUPATEN MUARA ENIM</b></h3>
                <table style="width:100%;">
                    <tr>
                        <td width="20%">BAGIAN</td>
                        <td width="30%">: <?= $register_spj->masterbagian_nama_bagian ?></td>
                        <td>SUB KEGIATAN</td>
                        <td>: <?= $register_spj->sub_kegiatan_sub_kegiatan ?></td>
                    </tr>
                    <tr>
                        <td>NOMINAL</td>
                        <td>: <?= currency_format($register_spj->nominal) ?></td>
                        <td>No Ajuan SPJ</td>
                        <td>: <?= $register_spj->no_spj ?></td>
                    </tr>
                    <tr>
                        <td>TANGGAL PENGAJUAN</td>
                        <td>: <?= tanggal_indo($register_spj->tanggal_pengajuan) ?></td>
                        <td>JENIS PENGAJUAN</td>
                        <td>: <?= $register_spj->jenis_pengajuan ?></td>
                    </tr>
                </table>
                <br>
                <table style="width:100%; border:1px solid black; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black;" width="25%">NO PENGANTAR</th>
                            <th style="border:1px solid black;" width="25%">NO BKU</th>
                            <th style="border:1px solid black;" width="25%">NO & TGL SPP</th>
                            <th style="border:1px solid black;" width="25%">NO & TGL SPM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="height:20px;">
                            <td style="border:1px solid black;"><?= $register_spj->no_pengantar ?></td>
                            <td style="border:1px solid black;"><?= $register_spj->no_bku ?></td>
                            <td style="border:1px solid black;"><?= $register_spj->no_spp ?> 
                            <?php if($register_spj->tanggal_spp !='0000-00-00'){
                               ?>
                               / <?= tanggal_indo($register_spj->tanggal_spp) ?>
                           <?php } ?>
                            
                            </td>
                            
                            <td style="border:1px solid black;"><?= $register_spj->no_spm ?>
                               <?php if($register_spj->tanggal_spm !='0000-00-00'){
                               ?>
                               / <?= tanggal_indo($register_spj->tanggal_spm) ?>
                           <?php } ?>  
                                
                                
                                 </td>
                        </tr>
                    </tbody>
                </table>
                <br>
<?php /*
                <h5><b>B.P PEMBANTU BAGIAN</b></h5>
                <table style="width:100%; border:1px solid black; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black; width:25px;">NO</th>
                            <th style="border:1px solid black;">URAIAN</th>
                            <th style="border:1px solid black; width:20%;">DICUKUPI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        
                        <?php foreach($bpp as $verif): 
                        $full_name = $verif->full_name;
                        $tanggal_verifikasi = $verif->tanggal;
                        ?>
                        <tr style="height:20px;">
                                <td style="border:1px solid black; text-align:center;"><?= $no ?>.</td>
                                <td style="border:1px solid black;"><?= $verif->uraian ?></td>
                                <td style="border:1px solid black; text-align:center;">
                                    <?php if($verif->dicukupi=='Belum'){ ?>
                                    <i class="fa fa-close"></i>
                                    <?php } elseif($verif->dicukupi=='Ya'){ ?>
                                    <i class="fa fa-check"></i>
                                    <?php } ?>
                                    
                                    
                                    </td>
                            </tr>
                        <?php 
                        $no++;
                        endforeach; ?>
                        
                        <?php 
                        $jumlah_baris = $max_row - (count($bpp));
                        
                        if($jumlah_baris>0){
                        
                        for($i=1; $i<=$jumlah_baris; $i++) : 
                        
                        ?>
                        
                            <tr style="height:20px;">
                                <td style="border:1px solid black; text-align:center;"><?= $no ?>.</td>
                                <td style="border:1px solid black;"></td>
                                <td style="border:1px solid black;"></td>
                            </tr>
                        <?php 
                        $no++;
                        endfor; 
                        }
                        ?>
                    </tbody>
                </table>
                <table style="width:100%">
                    <tr>
                        <td width="50%"></td>
                        <td style="text-align:center">
                            <p>Telah Dikoreksi tgl <?= tanggal_indo($tanggal_verifikasi) ?></p>
                            <br><br><br>
                            <p><b> <?= $register_spj->full_name ?></b></p>
                        </td>
                    </tr>
                </table>
*/
?>
                <h5><b>VERIFIKATOR</b></h5>
                <table style="width:100%; border:1px solid black; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black; width:25px;">NO</th>
                            <th style="border:1px solid black;">URAIAN</th>
                            <th style="border:1px solid black; width:20%;">DICUKUPI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        
                        <?php foreach($verifikator1 as $verif): 
                        $full_name = $verif->full_name;
                        $tanggal_verifikasi = $verif->tanggal;
                        ?>
                        <tr style="height:20px;">
                                <td style="border:1px solid black; text-align:center;"><?= $no ?>.</td>
                                <td style="border:1px solid black;"><?= $verif->uraian ?></td>
                                <td style="border:1px solid black; text-align:center;">
                                    <?php if($verif->dicukupi=='Ya'){ ?>
                                    
                                    <i class="fa fa-check"></i>
                                    <?php
                                    if($verif->tindak_lanjut =='Diperhatikan'){
                                        echo $verif->tindak_lanjut;
                                    }
                                    ?>
                                    <?php } else{ ?>
                                    
                                    <i class="fa fa-close"></i>
                                    <?php } ?>
                                    
                                    
                                    </td>
                            </tr>
                        <?php 
                        $no++;
                        endforeach; ?>
                        
                        <?php 
                        $jumlah_baris = $max_row - (count($verifikator1));
                        
                        if($jumlah_baris>0){
                        
                        for($i=1; $i<=$jumlah_baris; $i++) : 
                        
                        ?>
                        
                            <tr style="height:20px;">
                                <td style="border:1px solid black; text-align:center;"><?= $no ?>.</td>
                                <td style="border:1px solid black;"></td>
                                <td style="border:1px solid black;"></td>
                            </tr>
                        <?php 
                        $no++;
                        endfor; 
                        }
                        ?>
                    </tbody>
                </table>
                <table style="width:100%">
                    <tr>
                        <td width="50%"></td>
                        <td style="text-align:center">
                            <p>Telah Dikoreksi tgl <?= tanggal_indo($tanggal_verifikasi) ?></p>
                            <p>VERIFIKATOR,</p>
                            <br><br><br>
                            <p><b> <?= $nama_verifikator ?></b></p>
                        </td>
                    </tr>
                </table>
<?php 

if($nama_verifikator2 != ''){

?>

                <h5><b>VERIFIKATOR</b></h5>
                <table style="width:100%; border:1px solid black; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black; width:25px;">NO</th>
                            <th style="border:1px solid black;">URAIAN</th>
                            <th style="border:1px solid black; width:20%;">DICUKUPI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        
                        <?php foreach($verifikator2 as $verif): 
                        $full_name = $verif->full_name;
                        $tanggal_verifikasi = $verif->tanggal;
                        ?>
                        <tr style="height:20px;">
                                <td style="border:1px solid black; text-align:center;"><?= $no ?>.</td>
                                <td style="border:1px solid black;"><?= $verif->uraian ?></td>
                                <td style="border:1px solid black; text-align:center;">
                                    <?php if($verif->dicukupi=='Belum'){ ?>
                                    <i class="fa fa-close"></i>
                                    <?php } elseif($verif->dicukupi=='Ya'){ ?>
                                    <i class="fa fa-check"></i>
                                    <?php } ?>
                                    
                                    
                                    </td>
                            </tr>
                        <?php 
                        $no++;
                        endforeach; ?>
                        
                        <?php 
                        $jumlah_baris = $max_row - (count($verifikator2));
                        
                        if($jumlah_baris>0){
                        
                        for($i=1; $i<=$jumlah_baris; $i++) : 
                        
                        ?>
                        
                            <tr style="height:20px;">
                                <td style="border:1px solid black; text-align:center;"><?= $no ?>.</td>
                                <td style="border:1px solid black;"></td>
                                <td style="border:1px solid black;"></td>
                            </tr>
                        <?php 
                        $no++;
                        endfor; 
                        }
                        ?>
                    </tbody>
                </table>
                <table style="width:100%">
                    <tr>
                        <td width="50%"></td>
                        <td style="text-align:center">
                            <p>Telah Dikoreksi tgl <?= tanggal_indo($tanggal_verifikasi) ?></p>
                            <p>VERIFIKATOR,</p>
                            <br><br><br>
                            <p><b> <?= $nama_verifikator2 ?></b></p>
                        </td>
                    </tr>
                </table>
<?php 
}
?>
                <h5><b>PPK SKPD</b></h5>
                <table style="width:100%; border:1px solid black; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black; width:25px;">NO</th>
                            <th style="border:1px solid black;">URAIAN</th>
                            <th style="border:1px solid black; width:20%;">DICUKUPI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        
                        <?php foreach($ppk_skpd as $verif): 
                        $full_name = $verif->full_name;
                        $tanggal_verifikasi = $verif->tanggal;
                        ?>
                        <tr style="height:20px;">
                                <td style="border:1px solid black; text-align:center;"><?= $no ?>.</td>
                                <td style="border:1px solid black;"><?= $verif->uraian ?></td>
                                <td style="border:1px solid black; text-align:center;">
                                    <?php if($verif->dicukupi=='Belum'){ ?>
                                    <i class="fa fa-close"></i>
                                    <?php } elseif($verif->dicukupi=='Ya'){ ?>
                                    <i class="fa fa-check"></i>
                                    <?php } ?>
                                    
                                    
                                    </td>
                            </tr>
                        <?php 
                        $no++;
                        endforeach; ?>
                        
                        <?php 
                        $jumlah_baris = $max_row - (count($ppk_skpd));
                        
                        if($jumlah_baris>0){
                        
                        for($i=1; $i<=$jumlah_baris; $i++) : 
                        
                        ?>
                        
                            <tr style="height:20px;">
                                <td style="border:1px solid black; text-align:center;"><?= $no ?>.</td>
                                <td style="border:1px solid black;"></td>
                                <td style="border:1px solid black;"></td>
                            </tr>
                        <?php 
                        $no++;
                        endfor; 
                        }
                        ?>
                    </tbody>
                </table>
                <table style="width:100%">
                    <tr>
                        <td width="50%"></td>
                        <td style="text-align:center">
                            <p>Telah Dikoreksi tgl <?= tanggal_indo($tanggal_verifikasi) ?></p>
                            <p>PPK SKPD,</p>
                            <br><br><br>
                            <p><b> <?= $nama_ppk_skpd ?></b></p>
                        </td>
                    </tr>
                </table>
            </div>
            
       
    </div>
</body>
</html>
