<?php
namespace App;

use Dompdf\Dompdf;
use Dompdf\Options;

interface PdfMakerPublic
{
    public function PdfDownload():void;
    public function PdfString():string|null;
}


class PdfMaker implements PdfMakerPublic
{
    public Dompdf $pdf_maker;
    private Options $options;
    private string $html;
    private bool $is_route;

    public function __construct(string $html, bool $is_route = false)
    {
        $this->is_route = $is_route;

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
        if($this->is_route)
        {
            $html = file_get_contents(__DIR__ . '/../views/pdf/' . $html );
            return $html;
        }
        else
        {
            return $html;
        }
    }

    public function PdfDownload(): void
    {
        $this->pdf_maker->render();
        $this->pdf_maker->stream();
    }

    public function PdfString():string|null
    {
        #header('Content-Type: application/pdf');
        #header('Content-Disposition: inline; filename="documento.pdf"');
        $this->pdf_maker->render();
        return $this->pdf_maker->output();
    }
}
