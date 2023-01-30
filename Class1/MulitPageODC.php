<?php
require('../fpdf/fpdf.php');

//$name = text to be added, $x= x cordinate, $y = y coordinate, $a = alignment , $f= Font Name, $t = Bold / Italic, $s = Font Size, $r = Red, $g = Green Font color, $b = Blue Font Color
function AddText($pdf, $text, $x, $y, $a, $f, $t, $s, $r, $g, $b)
{
    $pdf->SetFont($f, $t, $s);
    $pdf->SetXY($x, $y);
    $pdf->SetTextColor($r, $g, $b);
    $pdf->Cell(0, 10, $text, 0, 0, $a);
}
/*     */
function read(string $fileName)
{
    $pdf = new FPDF('P', 'pt', 'A4');
    # code...
    $csv = fopen($fileName, 'r');
    $i = 0;
    $data = [];
    while (($filedata = fgetcsv($csv, 1000, ";")) !== FALSE) {
        $num = count($filedata);
        // Skip first row (Remove below comment if you want to skip the first row)
        if ($i == 0) {
            $i++;
            continue;
        }
        for ($c = 0; $c < $num; $c++) {
            $data[$i][] = $filedata[$c];
        }
        $i++;
    }
    return $data;
}
//Create A 4 Landscape page

// Check if image file is a actual image or fake image
if (isset($_POST["validate"])) {
    $file = rand(1000, 100000) . "-" . $_FILES['myfile']['name'];
    $file_loc = $_FILES['myfile']['tmp_name'];
    $file_size = $_FILES['myfile']['size'];
    $file_type = $_FILES['myfile']['type'];
    $folder = "../fpdf/uploads/";

    /* new file size in KB */
    $new_size = $file_size / 1024;
    /* new file size in KB */

    /* make file name in lower case */
    $new_file_name = strtolower($file);
    /* make file name in lower case */

    $final_file = str_replace(' ', '-', $new_file_name);

    if (move_uploaded_file($file_loc, $folder . $final_file)) {

        $dataFile = read($folder . $final_file);
        $pdf = new FPDF('P', 'pt', 'A4');
        foreach ($dataFile as $rows) {


            $params = [
                'name' => $rows[0],
                'genre' => $rows[1],
                'fac' => $rows[2],
                'formation' => $rows[3],
                'date1' => $rows[4],
                'date2' => $rows[5],
                'head' => $rows[6],
                'is_student' => $rows[7],
            ];
            CreatePage($pdf, $params);
        }
        $pdf->Output();
        echo "File sucessfully upload";
    }
}


function CreatePage($pdf, $params)
{
    try {
        //code...

        $name = $params['name'] ?? "";
        $genre  = $params['genre'] ?? "";
        $fac  = $params['fac'] ?? "";
        $formation = $params['formation'] ?? "";
        $date1  = $params['date1'] ?? "";
        $date2  = $params['date2'] ?? "";
        $head  = $params['head'] ?? "";
        $is_student  = $params['is_student'] ?? "";
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetCreator('Haneef Puttur');
        $dateFull = "";
        // Add background image for PDF
        $pdf->Image('../template-certificat.jpg', 0, 0, -210);

        //Add a Name to the certificate

        AddText($pdf, ucwords($name), 69, 340, 'L', 'Helvetica', 'B', 32, 3, 84, 156);

        if ($is_student) {
            $student = "Etudiant";
            if ($genre == "female") {
                $student .= 'e';
            }
            $msg =   "{$student} à {$fac}";
            $msg = utf8_decode($msg);
            AddText($pdf, $msg, 69, 373, 'L', 'Helvetica', '', 14, 3, 84, 156);
        }

        AddText($pdf, $formation, 127, 404, 'L', 'Helvetica', 'B', 14, 3, 84, 156);

        if ($date1 == $date2) {
            $dateFull = "le {$date1}";
        } else {
            $dateFull = "du {$date1} au {$date2}";
        }
        AddText($pdf, $dateFull, 147, 420, 'L', 'Helvetica', '', 14, 3, 84, 156);
        AddText($pdf, $head, 69, 582, 'L', 'Helvetica', 'B', 14, 3, 84, 156);
    } catch (\Throwable $th) {
        //throw $th;
        die('exception');
    }
}


$pdf->Output();
