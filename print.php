<?php
include_once 'fpdf/fpdf.php';
include("db.php");
$pdf =new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",16);
$pdf->SetTextColor(252,3,3);
$pdf->cell(200,20,"Marks List","0","1","C");
//table column
$pdf->setLeftMargin(40);
$pdf->setTextColor(0,0,0);
$pdf->Cell(30,10,"S.NO","1","0","C");
$pdf->Cell(50,10,"Sub_Name/Code","1","0","C");
$pdf->Cell(50,10,"Total_Marks","1","1","C");
$pdf->SetFont("Arial","",14);
//table rows
$con = mysqli_connect("localhost","root","","register" );
if(isset($_GET['id']))
{
    $row = $_GET['id'];

    $sel_query="SELECT * FROM new_record ORDER BY id";
    $result = $con->mysqli_query($con,$sel_query);
    while($row = mysqli_fetch_assoc($result))
    $result->execute();
    if($result->rowCount()!=0)
    {
        while($row = $result->fetch())
        {
            $pdf->Cell(30,10,$id,"1","0","C");
            $pdf->Cell(50,10,$name,"1","0","C");
            $pdf->Cell(50,10,$marks,"1","1","C"); 
            $pdf->Ln();
        }

    }
    else
    {
        echo "Not Found Record";

    }

}

$pdf->Output();
?>

