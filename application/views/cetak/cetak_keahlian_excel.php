<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(6);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(24);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(40);
$spreadsheet->getActiveSheet()
    ->mergeCells('A1:C1')
    ->setCellValue('A1','Data Kompetensi Keahlian')
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

    $kolom_tabel = array("No","ID Kompetensi Keahlian","Nama Kompetensi Keahlian");

    $kolom = 1;
    
    foreach ($kolom_tabel as $field){
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($kolom, 3, $field);
        $kolom++;
    }
    
    $baris_excel = 4;
    $no = 1;
    
    foreach ($query as $q){
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $baris_excel, $no);
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $baris_excel, $q['id_kompetensi_keahlian']);
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $baris_excel, $q['nama_kompetensi_keahlian']);
        $no++;
        $baris_excel++;
    }
    
    $spreadsheet->getActiveSheet()->getStyle('A3:C3')->applyFromArray(
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
    
    $spreadsheet->getActiveSheet()->getStyle('A4:C'.(--$baris_excel))->applyFromArray(
        array(
            'borders'=>array(
                'allBorders'=>array(
                    'borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                )
            )
        )
    );
    
    $spreadsheet->getActiveSheet()->getStyle('A4:B'.($baris_excel))->applyFromArray(
        array(
            'alignment'=>array(
                'horizontal'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            )
        )
    );

    $spreadsheet->getActiveSheet()->getStyle('C4:C'.($baris_excel))->applyFromArray(
        array(
            'alignment'=>array(
                'vertical'=>\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            )
        )
    );

    $writer = new Xlsx($spreadsheet);
    $filename = 'Laporan Kompetensi Keahlian';
    
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
    header('Cache-Control: max-age=0');

    $writer->save('php://output');