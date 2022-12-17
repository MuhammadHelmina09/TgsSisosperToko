<?php
include "fpdf.php";
include "koneksi.php";

$pdf->Addpage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 5, 'Toko ATK SERBA ADA', '0', '1', 'C', false);
$pdf->SetFont('Arial', 'i', 8);
$pdf->Cell(0, 5, 'Alamat : Indonesia', '0', '1', 'C', false);
$pdf->Ln(3);
$pdf->Cell(190, 0.6, '' . '0', '1', 'C', false);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 5, 'Laporan Data', '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->SetFont('Arial', 'B', 7);
$pdf->cell(8, 6, 'No', 1, 0, 'C');
$pdf->cell(35, 6, 'Nama Produk', 1, 0, 'C');
$pdf->cell(37, 6, 'Harga Satuan', 1, 0, 'C');
$pdf->cell(8, 6, 'Jumlah', 1, 0, 'C');
$pdf->cell(8, 6, 'Sub Total', 1, 0, 'C');
$pdf->Ln(2);
$no = 0;
$get = mysqli_query($c, "select * from detailpesanan p, produk pr where p.idproduk=pr. idproduk and idpesanan='202100001'");
while ($p = mysqli_fetch_array($get)) {
    $pdf->Cell(30, 4, $p['idproduk'], 1, 0);
    $pdf->Cell(30, 4, $p['iddetailpesanan'], 1, 0);
    $pdf->Cell(30, 4, $p['qty'], 1, 0);
    $pdf->Cell(30, 4, $p['harga'], 1, 0);
    $pdf->Cell(30, 4, $p['namaproduk'], 1, 0);
    $pdf->Cell(30, 4, $p['deskripsi'], 1, 0);
}

$pdf->Output();
