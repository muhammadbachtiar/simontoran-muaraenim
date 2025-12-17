<style type="text/css">
   .widget-user-header {
      padding-left: 20px !important;
   }
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
    <h1>
        <?= cclang('dashboard') ?>
        <small>
            
        <?= cclang('Keuangan SETDA') ?>
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard">
                </i>
                <?= cclang('home') ?>
            </a>
        </li>
        <li class="active">
            <?= cclang('dashboard') ?>
        </li>
    </ol>
</section>

<section class="content">

    
    <div class="row">
        <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
                <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                
            <caption><center><h4>REKAPITULASI PENGAJUAN PENCAIRAN</h4></center>
           <center><h4>SEKRETARIAT KABUPATEN MUARA ENIM</h4></cenTer></caption>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">NAMA BAGIAN</th>
                    <!--<th colspan="2">JUMLAH PENGAJUAN</th>-->
                    <th colspan="2">NOMINAL PENGAJUAN</th>
                    <th rowspan="2">PAGU <br>ANGGARAN</th>
                    <th rowspan="2">PENYERAPAN <br>ANGGARAN</th>
                    
                </tr>
                <tr>
                    <th>GU</th>
                    <th>LS</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $jumlah_gu=0;
                $jumlah_ls=0;
                $nominal_gu=0;
                $nominal_ls=0;
                $pagu=0;
                foreach ($rekap as $data):
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td>Bagian <?= $data->nama_bagian ?></td>
                    <!--<td style="text-align:right"><?= $data->jumlah_gu ?></td>-->
                    <!--<td style="text-align:right"><?= $data->jumlah_ls ?></td>-->
                    <td style="text-align:right"><?= currency_format($data->nominal_gu) ?></td>
                    <td style="text-align:right"><?= currency_format($data->nominal_ls) ?></td>
                    <td style="text-align:right"><?= currency_format($data->pagu_anggaran) ?></td>
                    <td style="text-align:right"><?= number_format((($data->nominal_gu+$data->nominal_ls)/$data->pagu_anggaran)*100,2) ?>%</td>
                    
                </tr>
                <?php 
                $no++;
                $jumlah_gu+=$data->jumlah_gu;
                $jumlah_ls+=$data->jumlah_ls;
                $nominal_gu+=$data->nominal_gu;
                $nominal_ls+=$data->nominal_ls;
                $pagu+=$data->pagu_anggaran;
                
                endforeach; 
                $total_nominal = $nominal_gu+$nominal_ls;
                $penyerapan = number_format(($total_nominal/$pagu)*100,2);
                
                ?>
                <thead>
                    <tr>
                        <th colspan="2">TOTAL</th>
                        <!--<th style="text-align:right"><?= $jumlah_gu ?></th>-->
                        <!--<th style="text-align:right"><?= $jumlah_ls ?></th>-->
                        <th style="text-align:right"><?= currency_format($nominal_gu) ?></th>
                        <th style="text-align:right"><?= currency_format($nominal_ls) ?></th>
                        <th style="text-align:right"><?= currency_format($pagu) ?></th>
                        <th style="text-align:right"><?= $penyerapan ?>%</th>
                    </tr>
                </thead>
            </tbody>
        </table>
    </div>
    
    </div>
                </div>
            </div>
         </div>
         
         
         
             <div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Grafik Penyerapan Anggaran</h3>
      </div>
      <div class="box-body">
        <canvas id="penyerapanChart" height="600"></canvas>
      </div>
    </div>
  </div>
</div>

             <div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Gaji dan Tunjangan ASN</h3>
      </div>
      <div class="box-body">
        <canvas id="chartGajiJenis" style="display: block; height: 352px;"></canvas>
      </div>
    </div>
  </div>
</div>

 <div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Gaji dan Tunjangan Kepala Daerah dan Wakil Kepala Daerah</h3>
      </div>
      <div class="box-body">
        <canvas id="chartkdh" style="display: block; height: 352px;"></canvas>
      </div>
    </div>
  </div>
</div>

      <!--<?php cicool()->eventListen('dashboard_content_top'); ?>-->

       <!--<div class="col-md-3 col-sm-6 col-xs-12">-->
       <!--     <div class="info-box button" onclick="goUrl('administrator/crud')">-->
       <!--         <span class="info-box-icon bg-aqua">-->
       <!--             <i class="ion ion-ios-gear">-->
       <!--             </i>-->
       <!--         </span>-->
       <!--         <div class="info-box-content">-->
       <!--             <span class="info-box-text">-->
       <!--                 <?= cclang('crud_builder') ?>-->
       <!--             </span>-->
       <!--         </div>-->
       <!--     </div>-->
       <!-- </div>-->
        <!--<div class="col-md-3 col-sm-6 col-xs-12">-->
        <!--    <div class="info-box button" onclick="goUrl('administrator/rest')">-->
        <!--        <span class="info-box-icon bg-yellow">-->
        <!--            <i class="ion ion-social-chrome">-->
        <!--            </i>-->
        <!--        </span>-->
        <!--        <div class="info-box-content">-->
        <!--            <span class="info-box-text">-->
        <!--                <?= cclang('api_builder') ?>-->
        <!--            </span>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

        <!-- <div class="col-md-3 col-sm-6 col-xs-12">-->
        <!--    <div class="info-box button" onclick="goUrl('administrator/page')">-->
        <!--        <span class="info-box-icon bg-aqua">-->
        <!--            <i class="ion ion-ios-paper">-->
        <!--            </i>-->
        <!--        </span>-->
        <!--        <div class="info-box-content">-->
        <!--            <span class="info-box-text">-->
        <!--                <?= cclang('page_builder') ?>-->
        <!--            </span>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="col-md-3 col-sm-6 col-xs-12">-->
        <!--    <div class="info-box button" onclick="goUrl('administrator/form')">-->
        <!--        <span class="info-box-icon bg-yellow">-->
        <!--            <i class="ion ion-android-list">-->
        <!--            </i>-->
        <!--        </span>-->
        <!--        <div class="info-box-content">-->
        <!--            <span class="info-box-text">-->
        <!--                <?= cclang('form_builder') ?>-->
        <!--            </span>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        
        

    </div>
  
      <!-- /.row -->
      <?php cicool()->eventListen('dashboard_content_bottom'); ?>

</section>
<!-- /.content -->

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js"></script>



<!-- Script -->
<script>
  window.onload = function () {
    const ctx = document.getElementById('penyerapanChart').getContext('2d');

    const chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?= json_encode(array_column($chart_data, 'nama_bagian')) ?>,
        datasets: [
          {
            label: 'Pagu',
            data: <?= json_encode(array_column($chart_data, 'pagu_anggaran')) ?>,
            backgroundColor: 'rgba(0,166,90,0.2)',
            borderColor: 'rgba(0,166,90,1)',
            borderWidth: 1,
            order: 1,
            type: 'bar',
            datalabels: {
              display: true,
              anchor: 'end',
              align: 'end',
              formatter: formatRupiahSingkat,
              color: '#000',
              font: {
                  style: 'italic',
                  weight: 'normal',
                  size: 10 // atau 9 sesuai kebutuhan
                },
              clip: false
            }
          },
          {
            label: 'GU',
            data: <?= json_encode(array_column($chart_data, 'nominal_gu')) ?>,
            // backgroundColor: 'rgba(60,141,188,0.9)',
            backgroundColor: 'rgba(255, 99, 132, 0.9)',
            stack: 'Realisasi',
            order: 2,
            datalabels: {
              display: true,
              anchor: 'end',
              align: 'end',
              formatter: formatRupiahSingkat,
              color: '#000',
              font: {
                  style: 'italic',
                  weight: 'normal',
                  size: 10 // atau 9 sesuai kebutuhan
                },
              clip: false
            }
          },
          {
            label: 'LS',
            data: <?= json_encode(array_column($chart_data, 'nominal_ls')) ?>,
            backgroundColor: 'rgba(54, 162, 235, 1)',
            stack: 'Realisasi',
            order: 2,
            datalabels: {
              display: true,
              anchor: 'end',
              align: 'end',
              formatter: formatRupiahSingkat,
              color: '#000',
              font: {
                  style: 'italic',
                  weight: 'normal',
                  size: 10 // atau 9 sesuai kebutuhan
                },
              clip: false
            }
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
          padding: {
            top: 40
          }
        },
        plugins: {
          legend: {
            position: 'top'
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                const value = context.raw || 0;
                return context.dataset.label + ': Rp ' + value.toLocaleString('id-ID');
              }
            }
          },
          datalabels: {
            // Global default, bisa override di tiap dataset
          }
        },
        scales: {
          x: {
            stacked: true,
            ticks: {
              autoSkip: false
            }
          },
          y: {
            type: 'logarithmic',
            min: 100000,
            stacked: false,
            ticks: {
              callback: function(value) {
                return 'Rp ' + value.toLocaleString('id-ID');
              }
            }
          }
        }
      },
      plugins: [ChartDataLabels]
    });

    // Fungsi untuk format nilai singkat
    function formatRupiahSingkat(value) {
      if (value >= 1_000_000_000) {
        return 'Rp ' + (value / 1_000_000_000).toFixed(2) + ' M';
      } else if (value >= 1_000_000) {
        return 'Rp ' + (value / 1_000_000).toFixed(2) + ' JT';
      } else if (value >= 1_000) {
        return 'Rp ' + (value / 1_000).toFixed(2) + ' RB';
      }
      return 'Rp ' + value.toLocaleString('id-ID');
    }
  };
</script>


<?php
$labels = array_column($chart_data_jenis, 'jenis_pengajuan');
$data = array_map('intval', array_column($chart_data_jenis, 'total_nominal'));

// Buat warna random atau manual per label
$backgroundColors = [];
$borderColors = [];

foreach ($labels as $label) {
    // Bisa pakai warna tetap per jenis jika perlu
    $r = rand(50, 200);
    $g = rand(100, 200);
    $b = rand(150, 255);

    $backgroundColors[] = "rgba($r, $g, $b, 0.6)";
    $borderColors[] = "rgba($r, $g, $b, 1)";
}
?>




<script>
  const ctx = document.getElementById('chartGajiJenis').getContext('2d');

  // Fungsi untuk konversi ke format singkat: "jt", "m", dll.
  function formatRupiahSingkat(value) {
    if (value >= 1_000_000_000) {
      return (value / 1_000_000_000).toFixed(2) + ' M';
    } else if (value >= 1_000_000) {
      return (value / 1_000_000).toFixed(2) + ' jt';
    } else if (value >= 1_000) {
      return (value / 1_000).toFixed(2) + ' rb';
    } else {
      return 'Rp ' + value.toLocaleString('id-ID');
    }
  }

  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($labels) ?>,
      datasets: [{
        label: 'Jenis Ajuan Gaji',
        data: <?= json_encode($data) ?>,
        backgroundColor: <?= json_encode($backgroundColors) ?>,
        borderColor: <?= json_encode($borderColors) ?>,
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      layout: {
        padding: {
          top: 40
        }
      },
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              return formatRupiahSingkat(context.raw);
            }
          }
        },
        datalabels: {
          anchor: 'end',
          align: 'end',
          color: '#000',
          font: {
            weight: 'bold'
          },
          clip: false,
          formatter: function(value) {
            return formatRupiahSingkat(value);
          }
        }
      },
      scales: {
        y: {
          type: 'logarithmic',
          beginAtZero: false,
          min: 100000,
          ticks: {
            callback: function(value) {
              return formatRupiahSingkat(value);
            }
          }
        },
        x: {
          ticks: {
            autoSkip: false,
            maxRotation: 45,
            minRotation: 0
          }
        }
      }
    },
    plugins: [ChartDataLabels]
  });
</script>



<?php
$labels = array_column($chart_kdh, 'jenis_pengajuan');
$data_kdh = array_map('intval', array_column($chart_kdh, 'total_nominal'));

// Buat warna random atau manual per label
$backgroundColors = [];
$borderColors = [];

foreach ($labels as $label) {
    // Bisa pakai warna tetap per jenis jika perlu
    $r = rand(50, 200);
    $g = rand(100, 200);
    $b = rand(150, 255);

    $backgroundColors[] = "rgba($r, $g, $b, 0.6)";
    $borderColors[] = "rgba($r, $g, $b, 1)";
}
?>
<script>
  const ctx_kdh = document.getElementById('chartkdh').getContext('2d');

  // Fungsi format singkat untuk nilai rupiah
  function formatRupiahSingkat(value) {
    if (value >= 1_000_000_000) {
      return (value / 1_000_000_000).toFixed(2) + ' M';
    } else if (value >= 1_000_000) {
      return (value / 1_000_000).toFixed(2) + ' jt';
    } else if (value >= 1_000) {
      return (value / 1_000).toFixed(2) + ' rb';
    } else {
      return 'Rp ' + value.toLocaleString('id-ID');
    }
  }

  const chart_kdh = new Chart(ctx_kdh, {
    type: 'bar',
    data: {
      labels: <?= json_encode($labels) ?>,
      datasets: [{
        label: 'Jenis Ajuan Gaji',
        data: <?= json_encode($data_kdh) ?>,
        backgroundColor: <?= json_encode($backgroundColors) ?>,
        borderColor: <?= json_encode($borderColors) ?>,
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      layout: {
        padding: {
          top: 40
        }
      },
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              return formatRupiahSingkat(context.raw);
            }
          }
        },
        datalabels: {
          anchor: 'end',
          align: 'end',
          color: '#000',
          font: {
            weight: 'bold'
          },
          clip: false,
          formatter: function(value) {
            return formatRupiahSingkat(value);
          }
        }
      },
      scales: {
        y: {
          type: 'logarithmic',
          beginAtZero: false,
          min: 100000,
          ticks: {
            callback: function(value) {
              return formatRupiahSingkat(value);
            }
          }
        },
        x: {
          ticks: {
            autoSkip: false,
            maxRotation: 45,
            minRotation: 0
          }
        }
      }
    },
    plugins: [ChartDataLabels]
  });
</script>
