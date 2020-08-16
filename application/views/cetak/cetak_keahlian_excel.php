<?php
defined('BASEPATH') or exit('No direct script access allowed');

$excel = new PHPExcel();

$excel->setActiveSheetIndex(0);
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(24);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
$excel->getActiveSheet()
    ->mergeCells('A1:C1')
    ->setCellValue('A1','Data Kompetensi Keahlian')
    ->getStyle('A1')
    ->applyFromArray(
        array(
            'font'=>array(
                'size'=>20
            ),
            'alignment'=>array(
                'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
            )
        )
    );

$kolom_tabel = array("No","ID Kompetensi Keahlian","Nama Kompetensi Keahlian");

$kolom = 0;

foreach ($kolom_tabel as $field){
    $excel->getActiveSheet()->setCellValueByColumnAndRow($kolom, 3, $field);
    $kolom++;
}

$baris_excel = 4;
$no = 1;

foreach ($query as $q){
    $excel->getActiveSheet()->setCellValueByColumnAndRow(0, $baris_excel, $no.".");
    $excel->getActiveSheet()->setCellValueByColumnAndRow(1, $baris_excel, $q['id_kompetensi_keahlian']);
    $excel->getActiveSheet()->setCellValueByColumnAndRow(2, $baris_excel, $q['nama_kompetensi_keahlian']);
    $no++;
    $baris_excel++;
}

$excel->getActiveSheet()->getStyle('A3:C3')->applyFromArray(
    array(
        'font'=>array(
            'bold'=>true
        ),
        'alignment'=>array(
            'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
        ),
        'borders'=>array(
            'allborders'=>array(
                'style'=>PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

$excel->getActiveSheet()->getStyle('A4:C'.($baris_excel-1))->applyFromArray(
    array(
        'borders'=>array(
            'allborders'=>array(
                'style'=>PHPExcel_Style_Border::BORDER_THIN
            )
        )
    )
);

$excel->getActiveSheet()->getStyle('A4:B'.($baris_excel))->applyFromArray(
    array(
        'alignment'=>array(
            'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
        )
    )
);

$excel_writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="Data Kompetensi Keahlian.xlsx"');
$excel_writer->save('php://output');