<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Priviu Cetak</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/adminlte.min.css"> <!-- Ganti dengan path ke CSS AdminLTE Anda -->
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        #cetak {
            border: 1px solid #ccc;
            padding: 20px;
        }
        .gaji {
            border: 2px solid #000;
            width: fit-content;
            padding: 10px;
            margin: 0;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
            margin-bottom: 10px;
        }
         h1,h2, h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 5px;
        }
       .no_border{
           
           border: 0;
           
       }
       .tengah{
           text-align: center;
           border:0;
       }
       
       
       
       .border_bawah {
            
            border-top: 0;
            
            border-left: 0;
            border-right: 0;
        }
        .no_kurang {
        width: 5px;
        border: 0;
}


        @media print {
            .page {
                border: none;
                margin: 0;
                width: 210mm;
                height: 330mm;
                overflow: hidden;
                page-break-after: always;
            }
            .page-break {
                display: none;
            }
            #cetak {
                border: 1px solid #ccc;
                padding: 20px;
            }
            .gaji{
                border: 2px solid #000;
                width:100px;
                padding: 10px;
                text-align:center;
                text-align: left;
                margin: 0; /* Menghilangkan margin default */
                line-height: 1.5; /* Menentukan tinggi baris */
            }
            .gaji{
                border: 2px solid #000;
                width:100px;
                padding: 10px;
                text-align:center;
                text-align: left;
                margin: 0; /* Menghilangkan margin default */
                line-height: 1.5; /* Menentukan tinggi baris */
            }
            h1, h2, h3 {
                text-align: center;
                margin: 0; /* Menghilangkan margin default */
                line-height: 1.5; /* Menentukan tinggi baris */
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #ccc;
                padding: 5px;
            }
            
            
        }
    </style>
</head>
<body>
    <section class="content-header">
        <h1>Priviu Cetak</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url('administrator/gaji'); ?>">Register SPJ</a></li>
            <li class="active"><?= cclang('detail'); ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="box box-widget widget-user-2">
                            <div class="widget-user-header">
                                
                                <div class="row pull-right">
                                    <button id="printButton" onclick="cetak()" class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
                                    
                                </div>
                                <div class="widget-user-image">
                                    <a href="<?= site_url('administrator/gaji/'.$jenis_gaji)?>" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                </div>
                                
                              <br>
                                <div id="cetak">
                                    <div class="gaji"><?= $register_spj->uraian ?></div>
                                    <h3>TANDA TERIMA DAN PENELITIAN KELENGKAPAN BERKAS AJUAN</h3>
                                    <h3>(SPM, SPP, dan Dokumen Lainnya)</h3>
                                    
                                    
                                    
                                    <table>
                                        <tr>
                                            <td class="no_border" width="200px">Diterima Tanggal</td>
                                            <td class="no_border">:</td>
                                            <td class="border_bawah" width="50%">
                                            <?= tanggal_indo($register_spj->tanggal_pengajuan) ?>
                                            </td class="no_border">
                                            <td class="no_border" colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="no_border">SKPD</td>
                                            <td class="no_border">:</td>
                                            <td class="border_bawah">
                                            Bagian <?= $register_spj->masterbagian_nama_bagian ?>
                                            </td class="no_border">
                                            <td class="no_border" colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="no_border">Terdiri Dari</td>
                                            <td class="no_border">:</td>
                                            <td class="no_border" colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td class="no_border" colspan="5"></td>
                                        </tr>
                                        
                                        <tr>
                                        <td class="no_border">1. SPP-GD Nomor</td>
                                        <td class="no_border">:</td>
                                        <td class="border_bawah"><?= $register_spj->no_spp ?></td>
                                        <td width="100px" class="no_border">Tanggal</td>
                                        <td  width="200px" class="no_border">: <?= tanggal_indo($register_spj->tanggal_spp) ?></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                        <td class="no_border">2. SPM-GD Nomor</td>
                                        <td class="no_border">:</td>
                                        <td class="border_bawah"><?= $register_spj->no_spm ?></td>
                                        <td class="no_border">Tanggal</td>
                                        <td class="no_border">: <?= tanggal_indo($register_spj->tanggal_spm) ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="no_border">3. Dokumen Lainnya:</td>
                                            
                                            <td class="no_border" colspan="4"></td>
                                        </tr>
                                    </table>

                                    

                                    <table>
                                        <thead>
                                            <tr>
                                                <th width="10px">No.</th>
                                                <th>Jenis Dokumen</th>
                                                <th colspan="2">Hasil Penelitian</th>
                                                <th width="150px">Ket.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td><b>BENDEL PERTAMA</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            
                                            <?php
                                            $no = 1;
                                            foreach($bendel_pertama as $berkas){
                                                ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                <td><?= $berkas->nama_berkas ?></td>
                                                <td>ada</td>
                                                <td>tidak</td>
                                                <td></td>
                                                </tr>
                                           <?php
                                           
                                                $no++;
                                            }
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td><b>BENDEL KEDUA</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            
                                            <?php
                                            $no = 1;
                                            foreach($bendel_kedua as $berkas){
                                                ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                <td><?= $berkas->nama_berkas ?></td>
                                                <td>ada</td>
                                                <td>tidak</td>
                                                <td></td>
                                                </tr>
                                           <?php
                                           
                                                $no++;
                                            }
                                            ?>
                                            
                                        </tbody>
                                        <tr>
                                            <td class="no_border" colspan="5"><i>*Urutan sesuai ceklist</i></td>
                                        </tr>
                                    </table>

                                    <b>Kekurangan Berkas:</b>
                                    <table>
                                        <?php
                                        $no=1;
                                        $baris=3;
                                        $sisa_baris = $baris;
                                        foreach($verifikasi as $row){
                                            ?>
                                            
                                            <tr>
                                            <td class="no_kurang" width="5px"><?= $no ?>. </td>
                                            <td width="95%"class="border_bawah"><?= $row->uraian ?></td>
                                        </tr>
                                            
                                            <?php
                                            $no++;
                                            $sisa_baris = $baris-$no;
                                        }
                                        
                                        
                                        if($sisa_baris>0){
                                            for($i=0;$i<$sisa_baris;$i++){
                                                ?>
                                                <tr>
                                            <td class="no_kurang" width="5px"><?= $no ?>. </td>
                                            <td width="95%"class="border_bawah"></td>
                                            </tr>
                                                
                                                <?php
                                                $no++;
                                            }
                                        }
                                        
                                        ?>
                                        
                                        
                                        
                                    </table>
                                    <br>
                                    <table>
                                        <tr>
                                            <td width="60%" class="tengah"></td>
                                            <td class="tengah">
                                                
                                                Blitar, 01 Juli 2024<br>
                                                PPK
                                                <br><br><br><br><br>
                                                ENDANG PURNOMOSARI, S.E<br>
                                                NIP. 19720526 199803 2006
                                               
                                                
                                            </td>
                                        </tr>
                                    </table>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function cetak() {
            var divToPrint = document.getElementById('cetak');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><head><title>Print Multiple F4 Pages</title>');
            newWin.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">');
            newWin.document.write('<style>@media print { .page { border: none; margin: 0; width: 210mm; height: 330mm;  overflow: hidden; page-break-after: always;} .page-break { display: none; } #cetak{border:1px solid #ccc;padding:20px;}h1,h2,h3{text-align:center;margin:0;line-height:1.5;}h4{text-align:left;margin:0;line-height:1.5;}table{width:100%;border-collapse:collapse;}th,td{border:1px solid #ccc;padding:5px;} .gaji { border: 2px solid #000; width: fit-content; padding: 10px; margin: 0; font-weight: bold; text-align: center; font-size: 20px; margin-bottom: 10px;} .no_border{border:0;}.border_bawah{border-top:0;border-left:0;border-right:0;}.no_kurang {width: 5px;border: 0;}.tengah{ text-align: center;border:0;}}</style>');
            newWin.document.write('</head><body onload="window.print();window.close()">');
            newWin.document.write(divToPrint.innerHTML);
            newWin.document.close();
        }
    </script>
</body>
</html>
