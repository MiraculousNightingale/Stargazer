<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 5/20/18
 * Time: 12:54 AM
 */


// Dynamic Templates

/**
 * @param $data
 * @throws \PhpOffice\PhpSpreadsheet\Exception
 * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
 */

//
//    public static function exportSpreadsheet($dataType,$data)
//    {
//        $spreadsheet = new Spreadsheet();
//
////        Generally it's shitty, but let it be here till I find another way
//
//        switch ($dataType) {
//            case 'Employee':
//                $headline = 'The list of Employees';
//                $headerCount=4;
//                break;
//            default:
//                $headline = 'Undefined';
//                $headerCount = 'Undefined';
//                break;
//        }
//
////        Editing part
//
//        $spreadsheet->setActiveSheetIndex(0)
//            ->mergeCells('A2:I2')
//            ->setCellValue('A2', $headline);
////            ->setCellValue('A3', 'We have ' . $headerCount . ' columns.');
//        $col='a';
//        foreach($data as $key => $value){
//            $spreadsheet->setActiveSheetIndex(0)
//                ->setCellValue($col.'3',$key);
//            $col++;
//        }
//
//
////        Output
//
//        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        $filename = "Employee_" . date("d-m-Y-His") . ".xlsx";
//        header('Content-Disposition: attachment;filename=' . $filename);
//        header('Cache-Control: max-age=0');
//
//        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//        $writer->save('php://output');
//    }