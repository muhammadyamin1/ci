<?php
defined('BASEPATH') or exit('No direct script access allowed');

$excel = new PHPExcel();

$excel->setActiveSheetIndex(0);

$kolom_tabel = array("No","ID Kompetensi Keahlian","Nama Kompetensi Keahlian");

$kolom = 0;

foreach ($kolom_tabel as $field){
    $excel->getActiveSheet()->setCellValueByColumnAndRow($kolom, 1, $field);
    $kolom++;
}

$baris_excel = 2;
$no = 1;

foreach ($query as $q){
    $excel->getActiveSheet()->setCellValueByColumnAndRow(0, $baris_excel, $no.".");
    $excel->getActiveSheet()->setCellValueByColumnAndRow(1, $baris_excel, $q['id_kompetensi_keahlian']);
    $excel->getActiveSheet()->setCellValueByColumnAndRow(2, $baris_excel, $q['nama_kompetensi_keahlian']);
    $no++;
    $baris_excel++;
}

$excel_writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Data Kompetensi Keahlian.xlsx"');
$excel_writer->save('php://output');