<?php
namespace App;

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;


class PdfMaker
{
    public $pdf_maker;
    private string $html;

    public function __construct(string $html,\Dompdf\Options $options)
    {
        $this->pdf_maker = new Dompdf($options);
        $this->html = $this->setHtml($html);
        $this->pdf_maker->loadHtml($this->html);
        $this->pdf_maker->setPaper('A4', 'portrait');
    }

    private function setHtml(string $html):string
    {
        return $html;
    }

    public function RenderPdf()
    {
        $this->pdf_maker->render();
    }
}

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', false);
$dompdf = new Dompdf($options);

$html = '';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait'); // Puedes ajustar el tamaño y orientación del papel según tus necesidades
$dompdf->render();

#header('Content-Type: application/pdf');
#header('Content-Disposition: inline; filename="documento.pdf"');
$pdfContent = $dompdf->output();
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="documento.pdf"');
echo $pdfContent;

// Output the generated PDF to Browser
#$dompdf->stream();