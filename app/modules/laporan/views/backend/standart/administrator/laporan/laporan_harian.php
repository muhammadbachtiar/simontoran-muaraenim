<style type="text/css">
  #search {
    margin-left: 20px;
    border: none;
    border-bottom: 1px solid #CECECE;
    padding: 5px;
  }

  .dt-buttons {
    margin-bottom: 15px;
  }

  @media print {
    .no-print {
      display: none;
    }
  }
</style>

<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<!-- DataTables Buttons JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>

<!-- jQuery UI CSS untuk datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- jQuery UI JS untuk datepicker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $title ?>
    <small><?= cclang('list_all', 'Laporan'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-body">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header">
              <div class="row pull-right"></div>
              <div class="widget-user-image">
                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?= $title ?></h3>
              <h5 class="widget-user-desc"><?= cclang('list_all', 'Laporan'); ?></h5>
            </div>
          </div>

          <div>
            <label for="min-date">Filter Berdasarkan Tanggal Dari: </label>
            <input type="text" id="min-date" name="min-date" class="form-control">
            <label for="max-date">Sampai: </label>
            <input type="text" id="max-date" name="max-date" class="form-control">
          </div>

          <hr>
          <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable" id="example">
              <thead>
                <tr class="">
                  <?php foreach ($column_names as $column) { ?>
                  <th><?= cclang($column) ?></th>
                  <?php } ?>
                </tr>
                <tr class="no-print">
                  <?php foreach ($column_names as $column) { ?>
                  <th><input type="text" placeholder="Filter <?= cclang($column) ?>" class="no-print" /></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody id="tbody_sub_kegiatan">
                <?php $tgl_mulai=""; $tgl_akhir=""; $no=0; $qty=0; $total=0;?>
                <?php foreach($harian as $data): ?>
                <?php
                if($no==0){
                    $tgl_akhir=$data->tanggal_pengajuan;
                }
                $tgl_mulai=$data->tanggal_pengajuan;
                
                $qty+=$data->jumlah_pengajuan;
                $total+=$data->jumlah_nominal;
                $no++;
                ?>
                <tr>
                  <?php foreach ($column_names as $column): ?>
                  <?php if ($column == 'jumlah_nominal'): ?>
                  <td align="right"><?= currency_format($data->$column) ?></td>
                  <?php else: ?>
                  <td><?= $data->$column ?></td>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->

<!-- Page script -->
<script>
  $(document).ready(function() {
    // Inisialisasi datepicker pada input tanggal
    $("#min-date, #max-date").datepicker({
      dateFormat: 'yy-mm-dd'
    });

    // Fungsi filter kustom untuk rentang tanggal
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        var min = $('#min-date').datepicker("getDate");
        var max = $('#max-date').datepicker("getDate");
        var date = new Date(data[0]); // gunakan data untuk kolom tanggal

        if (
          (min === null && max === null) ||
          (min === null && date <= max) ||
          (max === null && date >= min) ||
          (date <= max && date >= min)
        ) {
          return true;
        }
        return false;
      }
    );

    var table = $('.dataTable').DataTable({
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json"
      },
      dom: 'Blfrtip', // f - filtering input, B - buttons, r - processing display element, t - table, i - information summary, p - pagination control, l - length changing input control
      buttons: [
        {
          extend: 'copy',
          text: '<i class="fa fa-copy"></i> Salin',
        },
        {
          extend: 'csv',
          title: '<?= $title ?>',
          messageTop: 'Periode <?= tanggal_indo($tgl_mulai) ?> s.d <?= tanggal_indo($tgl_akhir) ?>',
          text: '<i class="fa fa-file-text-o"></i> CSV',
        },
        {
          extend: 'excel',
          text: '<i class="fa fa-file-excel-o"></i> Excel',
          title: '<?= $title ?>',
          messageTop: 'Periode <?= tanggal_indo($tgl_mulai) ?> s.d <?= tanggal_indo($tgl_akhir) ?>',
        },
        {
          extend: 'pdf',
          text: '<i class="fa fa-file-pdf-o"></i> PDF',
          title: '<?= $title ?>',
          messageTop: 'Periode <?= tanggal_indo($tgl_mulai) ?> s.d <?= tanggal_indo($tgl_akhir) ?>',
        },
        {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> Cetak',
                    titleAttr: 'Cetak',
                    title: '<?= $title ?>',
                    customize: function ( win ) {
                        var css = '@page { size: portrait; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                          style.styleSheet.cssText = css;
                        } else {
                          style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);

                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<h3>' + '<?= $title ?>' + '</h3>'
                            );

                        var table = $(win.document.body).find('table');
                        table.addClass('compact')
                             .css('font-size', 'inherit');

                        // Menambahkan header tabel ke dalam body tabel yang akan dicetak
                        if (table.find('thead').length === 0) {
                            table.prepend($('thead').clone());
                        } else {
                            table.find('thead').replaceWith($('thead').clone());
                        }

                        // Menyembunyikan elemen dengan kelas 'no-print' saat mencetak
                        $(win.document.body).find('.no-print').css('display', 'none');
                    }
                }
      ],
      pageLength: 50,
      lengthMenu: [10, 25, 50, 100, 200]
    });

    // Add dynamic filtering for each column
    $('#example thead input').on('keyup change', function() {
      table
        .column($(this).parent().index() + ':visible')
        .search(this.value)
        .draw();
    });

    // Event listener untuk input tanggal
    $('#min-date, #max-date').change(function() {
      table.draw();
    });
  });
</script>
