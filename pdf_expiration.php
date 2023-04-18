<?php

require_once 'vendor/autoload.php'; //dompdf standard 
use Dompdf\Dompdf;

include 'inc/connect.inc.php'; //connection to database
include 'inc/cookie.php'; //cookie status
include 'controller/label_data.php'; //display products



$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrintLabel</title>
    <style>
    * {
        font-family: Helvetica, sans-serif;
        margin: auto;
    }
    
    h2 {
        text-align: center;
        padding: 20px;
    }
    
    th {
        text-align: left;
        padding: 10px 10px 10px 0;
    }</style>
</head>

<body>
    <h2>' . $name . '</h2>
    <table>
    <tbody>
            <tr>
                <th scope="row">DATE</th>
                <td>' . $date . '</td>
            </tr>
            <tr>
                <th scope="row">EXPIRATION DATE</th>
                <td>' . $expiration_date . '</td>
            </tr>
            <tr>
                <th scope="row">EMPLOYEE</th>
                <td>' . $_SESSION['user']['name_user'] . '</td>
            </tr>
        </tbody>
    </table>
</body>

</html>';


$dompdf = new dompdf;
$dompdf->loadHTML($html);
$dompdf->setPaper('A7', 'landscape');
$dompdf->render();
$dompdf->stream('label.pdf', ['Attachment' => 0]);

// Set the headers to start printing automatically
// header('Content-Type: application/pdf');
// header('Content-Disposition: inline; filename="myfile.pdf"');
// header('Cache-Control: private, max-age=0, must-revalidate');
// header('Pragma: public');
// header('Content-Length: ' . strlen($dompdf->output()));
// header('Accept-Ranges: bytes');
// header('Connection: close');

// Output the PDF
// $dompdf->stream('myfile.pdf', array('Attachment' => false));