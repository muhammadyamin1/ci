<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(6);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(27);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(39);
$spreadsheet->getActiveSheet()
    ->mergeCells('A1:D1')
    ->setCellValue('A1','Data Kelas')
    ->getStyle('A1')
    ->applyFromArray(
        array(
            'font'=>array(
                'size'=>20,
                'color' => array('rgb' => 'FFFFFF'),
                'bold'  => true
            ),
            'alignment'=>array(
                'horizontal'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ),
            'fill' => array(
                'fillType'   => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 180,
                'startColor' => array(
                    'rgb' => 'FF007D'
                ),
                'endColor'   => array(
                    'rgb' => 'AA00FF'
                )
            )
        )
    );

    $kolom_tabel = array("No","ID Kelas","Nama Kelas","Kompetensi Keahlian");

    $kolom = 1;
    
    foreach ($kolom_tabel as $field){
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($kolom, 3, $field);
        $kolom++;
    }
    
    $baris_excel = 4;
    $no = 1;
    
    foreach ($query as $q){
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $baris_excel, $no);
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $baris_excel, $q['id_kelas']);
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $baris_excel, $q['nama_kelas']);
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $baris_excel, $q['nama_kompetensi_keahlian']);
        $no++;
        $baris_excel++;
    }
    
    $spreadsheet->getActiveSheet()->getStyle('A3:D3')->applyFromArray(
        array(
            'font'=>array(
                'bold'=>true
            ),
            'alignment'=>array(
                'horizontal'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ),
            'borders'=>array(
                'allBorders'=>array(
                    'borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                )
            )
        )
    );
    
    $spreadsheet->getActiveSheet()->getStyle('A4:D'.(--$baris_excel))->applyFromArray(
        array(
            'borders'=>array(
                'allBorders'=>array(
                    'borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                )
            )
        )
    );
    
    $spreadsheet->getActiveSheet()->getStyle('A4:C'.($baris_excel))->applyFromArray(
        array(
            'alignment'=>array(
                'horizontal'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            )
        )
    );

    $spreadsheet->getActiveSheet()->getStyle('D4:D'.($baris_excel))->applyFromArray(
        array(
            'alignment'=>array(
                'vertical'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            )
        )
    );

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
    $spreadsheet->getActiveSheet()
        ->mergeCells('A'.($baris_excel+2).':D'.($baris_excel+2))
        ->setCellValue('A'.($baris_excel+2),'-- Dicetak Pada '.$hari_indonesia[$hari].', '.date('d').' '.$bulan[date('m')].' '.date('Y').' Pukul '.date('H:i:s').' WIB --')
        ->getStyle('A'.($baris_excel+2))
        ->applyFromArray(
            array(
                'font'=>array(
                    'size'=>12,
                    'color' => array('rgb' => 'FFFFFF'),
                    'bold'  => true,
                    'italic' => true
                ),
                'alignment'=>array(
                    'horizontal'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
                ),
                'fill' => array(
                    'fillType'   => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                    'rotation'   => 180,
                    'startColor' => array(
                        'rgb' => '322dba'
                    ),
                    'endColor'   => array(
                        'rgb' => '2c73d2'
                    )
                )
            )
        );

    $writer = new Xlsx($spreadsheet);
    $filename = 'Laporan Kelas';
    
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
    header('Cache-Control: max-age=0');

    $writer->save('php://output');