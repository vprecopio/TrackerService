<?php
namespace App;

use Dompdf\Dompdf;
use Dompdf\Options;

interface PdfMakerPublic
{
    public function RenderDownload():void;
    public function PdfString():string;
}

class PdfMaker implements PdfMakerPublic
{
    public Dompdf $pdf_maker;
    private Options $options;
    private string $html;

    public function __construct(string $html)
    {
        $this->options = new Options();
        $this->options->set('isHtml5ParserEnabled', true);
        $this->options->set('isPhpEnabled', false);

        $this->pdf_maker = new Dompdf($this->options);
        $this->html = $this->setHtml($html);
        $this->pdf_maker->loadHtml($this->html);
        $this->pdf_maker->setPaper('A4', 'portrait');
    }

    private function setHtml(string $html): string
    {
        return $html;
    }

    public function RenderDownload(): void
    {
        $this->pdf_maker->render();
        $this->pdf_maker->stream();
    }

    public function PdfString(): string
    {
        #header('Content-Type: application/pdf');
        #header('Content-Disposition: inline; filename="documento.pdf"');
        $this->pdf_maker->render();
        return $this->pdf_maker->output();
    }
}
