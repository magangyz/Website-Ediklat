<?php

namespace App\Modules\Master\Controllers;

use App\Controllers\BaseController;
use App\Modules\Master\Models\PelatihanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PelatihanModel();
    }

    /* ================= LAPORAN INTERNAL ================= */
    public function internal()
    {
        $tahun = $this->request->getGet('tahun');

        $query = $this->model->where('jenis', 'internal');

        if ($tahun) {
            $query->where('YEAR(waktu)', $tahun);
        }

        $data = $query->orderBy('waktu','DESC')->findAll();

        return view('master/laporan_internal', [
            'data'       => $data,
            'tahun_list' => $this->model
                ->select('YEAR(waktu) as tahun')
                ->where('jenis','internal')
                ->groupBy('YEAR(waktu)')
                ->orderBy('tahun','DESC')
                ->findAll()
        ]);
    }
    public function export_internal_pdf()
    {
        $tahun = $this->request->getGet('tahun');

        $query = $this->model->where('jenis', 'internal');

        if ($tahun) {
            $query->where('YEAR(waktu)', $tahun);
        }

        $data = $query->orderBy('waktu','DESC')->findAll();

        $html = view('master/laporan_pdf', [
            'data' => $data
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream("laporan_internal.pdf", ["Attachment" => false]);
    }

    public function eksternal()
    {
    $tahun = $this->request->getGet('tahun');

    $query = $this->model->where('jenis', 'eksternal');

    if (!empty($tahun)) {
        $query->where("YEAR(waktu)", $tahun, false);
    }

    $data = $query->orderBy('waktu','DESC')->findAll();

    return view('master/laporan_eksternal', [
        'title'       => 'Laporan Pelatihan Eksternal',
        'data'        => $data,
        'tahun_list' => $this->model
                            ->select('YEAR(waktu) as tahun')
                            ->where('jenis','eksternal')
                            ->groupBy('YEAR(waktu)')
                            ->orderBy('tahun','DESC')
                            ->findAll()
    ]);
    }



    /* ================= EXPORT EXCEL INTERNAL ================= */
public function export_internal()
{
    $tahun = $this->request->getGet('tahun');

    $query = $this->model->where('jenis', 'internal');

    if ($tahun) {
        $query->where('YEAR(waktu)', $tahun);
    }

    $data = $query->orderBy('waktu','DESC')->findAll();

    header("Content-Type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan_Internal_" . date('YmdHis') . ".xls");

    echo $this->_render_excel($data);
    exit;
}


/* ================= EXPORT EXCEL EKSTERNAL ================= */
public function export_eksternal()
{
    $tahun = $this->request->getGet('tahun');

    $query = $this->model->where('jenis', 'eksternal');

    if ($tahun) {
        $query->where('YEAR(waktu)', $tahun);
    }

    $data = $query->orderBy('waktu','DESC')->findAll();

    header("Content-Type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan_Eksternal_" . date('YmdHis') . ".xls");

    echo $this->_render_excel($data);
    exit;
}

private function _render_excel($data)
{
    $no = 1;
    $total = 0;

    ob_start();

    echo "<table border='1'>
            <tr>
                <th>No</th>
                <th>Kegiatan</th>
                <th>Peserta</th>
                <th>Jumlah</th>
                <th>Penyelenggara</th>
                <th>Tempat</th>
                <th>Waktu</th>
                <th>Jam/Hari</th>
                <th>Biaya</th>
                <th>Sumber Anggaran</th>
                <th>Keterangan</th>
            </tr>";

    foreach ($data as $r) {
        $total += $r['biaya'];

        echo "<tr>
                <td>{$no}</td>
                <td>{$r['kegiatan']}</td>
                <td>{$r['peserta']}</td>
                <td>{$r['jumlah']}</td>
                <td>{$r['penyelenggara']}</td>
                <td>{$r['tempat']}</td>
                <td>".date('d-m-Y', strtotime($r['waktu']))."</td>
                <td>{$r['jam_hari']}</td>
                <td>{$r['biaya']}</td>
                <td>{$r['sumber_anggaran']}</td>
                <td>{$r['keterangan']}</td>
            </tr>";

        $no++;
    }

    echo "<tr>
            <th colspan='8'>TOTAL</th>
            <th>{$total}</th>
            <th colspan='2'></th>
          </tr>";

    echo "</table>";

    return ob_get_clean();
}

public function export_excel()
{
    $jenis = $this->request->getGet('jenis');

    $data = $this->model
        ->where('jenis_pelatihan', $jenis)
        ->findAll();

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'NO');
    $sheet->setCellValue('B1', 'NAMA PESERTA');
    $sheet->setCellValue('C1', 'INSTANSI');
    $sheet->setCellValue('D1', 'TANGGAL');

    $row = 2;
    $no  = 1;
    foreach ($data as $d) {
        $sheet->setCellValue('A' . $row, $no++);
        $sheet->setCellValue('B' . $row, $d['nama']);
        $sheet->setCellValue('C' . $row, $d['instansi']);
        $sheet->setCellValue('D' . $row, $d['tanggal']);
        $row++;
    }

    $filename = 'laporan_' . $jenis . '_' . date('YmdHis') . '.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}


}
