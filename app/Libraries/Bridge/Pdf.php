<?php
namespace App\Libraries\Bridge;

final class Pdf
{
    private \Dompdf\Dompdf $pdf;
    private function __construct(string $html) {
        $options = new \Dompdf\Options(['isRemoteEnabled' => false, 'chroot' => base_path(), 'defaultFont' => 'DejaVu Sans']);
        $this->pdf = new \Dompdf\Dompdf($options);
        $this->pdf->loadHtml($html);
    }
    public static function loadView($view, $data = []) { return new self(app('view')->make($view, $data)->render()); }
    public function setPaper($paper, $orientation = 'portrait') { $this->pdf->setPaper($paper, $orientation); return $this; }
    public function setOptions(array $options) { foreach ($options as $key => $value) $this->pdf->getOptions()->set($key, $value); return $this; }
    public function getDomPDF() { return $this->pdf; }
    public function output() { $this->pdf->render(); return $this->pdf->output(); }
    public function download($name = 'report.pdf') { return response($this->output(), 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'attachment; filename="' . basename($name) . '"']); }
    public function stream($name = 'report.pdf') { return response($this->output(), 200, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'inline; filename="' . basename($name) . '"']); }
}
