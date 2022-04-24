<?php
include "Seaching.php";
session_start();
$result = selectWithID($_SESSION["id"]);

while($row = mysqli_fetch_assoc($result)) {


    $name = $row["name"];
    $studbook = $row["studbook"];
    $sex = $row["sex"];
    $born = $row["born"];
    $breeder = $row["breeder"];
    $chip = $row["chip"];
    $colorHair = $row["colorHair"];
    $typeHair = $row["typeHair"];
    $bonite = $row["bonite"];

    $siblings = searchSiblings($row["famili"], $row["ID"], false);
    generatePDF($name,$studbook,$sex,$born,$breeder,$chip,$colorHair,$typeHair,$bonite,$siblings);

}


function generatePDF($name,$studbook,$sex,$born,$breeder,$chip,$colorHair,$typeHair,$bonite,$siblings){

// Include the main TCPDF library (search for installation path).
require_once('PDF/examples/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Prukaz Fretky');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(10, 10, 20);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage('L', 'A4');

$html = "<table>
    <tr>
        <td> <img alt='logo' src='img/logo.png'></td>
        <td>
            <h5>Jméno a chovatelská stanice</h5><h6>Name and the Ferretry Name</h6>
        </td>
        <td>$name</td>
        <td>
            <div><h5>Cip</h5><h6>Chip</h6></div>
        </td>
        <td>$chip</td>
    </tr>


    <tr><td><H3>Spolek Chovatelu fretek</H3> <h6>The Czech Ferret Breeders Association</h6>
        </td>
        <td>
            <div><h5>Zápis v Plemenné knize</h5><h6>Stud Book</h6></div>
        </td>
        <td>$studbook</td>
        <td>
            <div><h5>Barva a druh srsti</h5><h6>Colour and type of hair</h6></div>
        </td>
        <td><p>$colorHair</p><p>$typeHair</p></td>
    </tr>

    <tr>
        <td><h3>PRUKAZ PUVODU FRETKY</h3></td>
        <td>
            <div><h5>Pohlaví</h5><h6>Sex</h6></div>
        </td>
        <td>$sex</td>
    </tr>

    <tr>
        <td>PEDIGREE / STAMMBAUM</td>
        <td>
            <div><h5>Datum narození</h5><h6>Born</h6></div>
        </td>
        <td>$born</td>
        <td>
            <div><h5>Doporučení k bonitaci</h5><h6>Recommended to Breeding Exam</h6></div>
        </td>
        <td>$bonite</td>
    </tr>

    <tr>
        <td></td>

            <td><h5>Chovatel</h5><h6>Breeder</h6></td>

        <td>$breeder</td>

        <td>
            <div><h5>Sourozenci</h5><h6>Siblings</h6></div>
        </td>
        <td><p>$siblings</p></td>
    </tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>

</table>";

$pdf->writeHTML($html, true, false, true, false, '');



// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('Prukaz Fretky.pdf', 'I');}
