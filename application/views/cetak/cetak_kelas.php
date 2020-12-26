<?php
defined('BASEPATH') or exit('No direct script access allowed');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Muhammad Yamin');
$pdf->SetTitle('Laporan Kompetensi Keahlian');
$pdf->SetSubject('Hasil Laporan Kompetensi Keahlian');
$pdf->SetKeywords('Pay SPP, Laporan Kompetensi Keahlian');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 11);

// add a page
$pdf->AddPage();

//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

// create some HTML content
$html = '<h1 style="text-align: center">Laporan Kelas</h1><br>
        <table border="1" cellpadding="5">
        <tr style="background-color: #CCC">
            <td width="40px" align="center">No.</td>
            <td width="120px" align="center">ID Kelas</td>
            <td width="160px" align="center">Nama Kelas</td>
            <td width="300px">Kompetensi Keahlian</td>
        </tr>';
$no=1;
foreach ($query as $cell){
$html .= '<tr>
            <td>'.$no++.'.</td>
            <td>'.$cell['id_kelas'].'</td>
            <td>'.$cell['nama_kelas'].'</td>
            <td>'.$cell['nama_kompetensi_keahlian'].'</td>
        </tr>';
}
$html .= '</table>';
$jumlah_baris = $this->db->from("kelas")->count_all_results();
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('d-m-Y');
$hari = date('l', microtime($tanggal));
$hari_indonesia = array(
    'Monday'  => 'Senin',
    'Tuesday'  => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu',
    'Sunday' => 'Minggu'
);
$bulan = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
);
$html .= '<p align="right">Jumlah Record : <b>'.$jumlah_baris.' Record</b></p>
            <p align="center"><i>-- Dicetak Pada '.$hari_indonesia[$hari].', '.date('d').' '.$bulan[date('m')].' '.date('Y').' Pukul '.date('H:i:s').' WIB --</i></p>';

// output the HTML content
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('Laporan Kelas.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+