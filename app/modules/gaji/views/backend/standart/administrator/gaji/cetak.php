<!DOCTYPE html>
<html>
<head>
    <title>Print Multiple F4 Pages</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .page {
            width: 210mm; /* Lebar kertas F4 */
            height: 330mm; /* Tinggi kertas F4 */
            margin: auto;
            padding: 5mm;
            box-sizing: border-box;
            border: 1px solid #000;
            page-break-after: always;
        }

        .page-break {
            display: block;
            page-break-before: always;
        }
        table,tr,td {
            font-size:10px;
        }
        h5 {
        display: block;
        font-size: 0.83em;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
        unicode-bidi: isolate;
        }

        @media print {
            .page {
                border: none;
                margin: 0;
                width: 210mm; /* Lebar kertas F4 */
                height: 330mm; /* Tinggi kertas F4 */
                page-break-after: always;
            }

            .page-break {
                display: none;
            }
            table,tr,td {
            font-size:10px;
        }
        h5 {
        display: block;
        font-size: 0.83em;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
        unicode-bidi: isolate;
        }
            
        }
    </style>
    <script>
        window.onload = function() {
            let beforePrint = function() {
                window.printCancelled = false;
            };

            let afterPrint = function() {
                if (!window.printCancelled) {
                    setTimeout(() => { window.close(); }, 100); // Menutup setelah cetak selesai
                }
            };

            // Deteksi pembatalan dialog cetak
            window.printCancelled = true;
            window.matchMedia('print').addListener(function(mql) {
                if (!mql.matches) {
                    setTimeout(() => {
                        if (window.printCancelled) {
                            window.close(); // Menutup jika cetak dibatalkan
                        }
                    }, 100);
                }
            });

            window.onbeforeprint = beforePrint;
            window.onafterprint = afterPrint;
            window.print();
        };
    </script>
</head>
<body>
    <?php
    
    $max_row=3; 
    ?>
<?php foreach ($pages as $content) : ?>
    <div class="page">
        
        
        <h3 style="text-align:center;"><b>KOREKSI AJUAN SEKRETARIAT DAERAH  KABUPATEN BLITAR</b></h3>
        <table style="width:100%;">
            <tr>
                <td width="20%">BAGIAN</td>
                <td width="30%">: PROKOPIM</td>
                <td>SUB KEGIATAN</td>
                <td>: FASILITASI KEPROTOKOLAN</td>
            </tr>
            <tr>
                <td>NOMINAL</td>
                <td>4.000.000</td>
                <td>(4 NO BKU)</td>
                <td></td>
            </tr>
        </table>
        
        <table style="width:100%; border:1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border:1px solid black;">NO PENGANTAR</th>
            <th style="border:1px solid black;">NO SPJ/BKU</th>
            <th style="border:1px solid black;">NO & TGL SPP</th>
            <th style="border:1px solid black;">NO & TGL SPM</th>
        </tr>
    </thead>
    <tbody>
        <tr style="height:20px;">
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;"></td>
        </tr>
    </tbody>
</table>

<h5><b>B.P PEMBANTU BAGIAN</b></h5>
<table style="width:100%; border:1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border:1px solid black; width:25px;">NO</th>
            <th style="border:1px solid black;">URAIAN</th>
            <th style="border:1px solid black;width:20%;">DICUKUPI</th>
           
        </tr>
    </thead>
    <tbody>
        <?php for($i=1;$i<=$max_row;$i++){ ?>
        <tr style="height:20px;">
            <td style="border:1px solid black;text-align:center;"><?= $i ?>.</td>
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;"></td>
            
        </tr>
        <?php } ?>
        
    </tbody>
</table>
<table style="width:100%">
    <tr>
        <td width="50%"></td>
        <td style="text-align:center">
            <p>Telah Dikoreksi tgl 12 Januari 2024</p>
            <br><br><br>
            <p><b>FITRA RAHAYU</b></p>
        </td>
    </tr>
</table>

<h5><b>B.P DAN VERIFIKATOR SEKRETARIAT</b></h5>
<table style="width:100%; border:1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border:1px solid black; width:25px;">NO</th>
            <th style="border:1px solid black;">URAIAN</th>
            <th style="border:1px solid black;width:20%;">DICUKUPI</th>
           
        </tr>
    </thead>
    <tbody>
        <?php for($i=1;$i<=$max_row;$i++){ ?>
        <tr style="height:20px;">
            <td style="border:1px solid black;text-align:center;"><?= $i ?>.</td>
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;"></td>
            
        </tr>
        <?php } ?>
        
    </tbody>
</table>
<table style="width:100%">
    <tr>
        <td width="50%"></td>
        <td style="text-align:center">
            <p>Telah Dikoreksi tgl 12 Januari 2024</p>
            <br><br><br>
            <p><b>IVA YUNITASARI</b></p>
        </td>
    </tr>
</table>

<h5><b>VERIFIKATOR</b></h5>
<table style="width:100%; border:1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border:1px solid black; width:25px;">NO</th>
            <th style="border:1px solid black;">URAIAN</th>
            <th style="border:1px solid black;width:20%;">DICUKUPI</th>
           
        </tr>
    </thead>
    <tbody>
        <?php for($i=1;$i<=$max_row;$i++){ ?>
        <tr style="height:20px;">
            <td style="border:1px solid black;text-align:center;"><?= $i ?>.</td>
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;"></td>
            
        </tr>
        <?php } ?>
        
    </tbody>
</table>
<table style="width:100%">
    <tr>
        <td width="50%"></td>
        <td style="text-align:center">
            <p>Telah Dikoreksi tgl 12 Januari 2024</p>
            <br><br><br>
            <p><b>NURUL NURAINI</b></p>
        </td>
    </tr>
</table>

<h5><b>PPK SKPD</b></h5>
<table style="width:100%; border:1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="border:1px solid black; width:25px;">NO</th>
            <th style="border:1px solid black;">URAIAN</th>
            <th style="border:1px solid black;width:20%;">DICUKUPI</th>
           
        </tr>
    </thead>
    <tbody>
        <?php for($i=1;$i<=$max_row;$i++){ ?>
        <tr style="height:20px;">
            <td style="border:1px solid black;text-align:center;"><?= $i ?>.</td>
            <td style="border:1px solid black;"></td>
            <td style="border:1px solid black;"></td>
            
        </tr>
        <?php } ?>
        
    </tbody>
</table>
<table style="width:100%">
    <tr>
        <td width="50%"></td>
        <td style="text-align:center">
            <p>Telah Dikoreksi tgl 12 Januari 2024</p>
            <br><br><br>
            <p><b>PPK SKPD</b></p>
        </td>
    </tr>
</table>

    </div>
    <div class="page-break"></div>
<?php endforeach; ?>
</body>
</html>
