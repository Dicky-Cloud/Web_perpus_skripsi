<?php
require_once APPPATH . '../vendor/autoload.php'; // Composer autoload

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf {
    public $dompdf;

    public function __construct() {
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $this->dompdf = new Dompdf($options);
    }

    public function loadHtml($html) {
        $this->dompdf->loadHtml($html);
    }

    public function setPaper($size, $orientation = 'portrait') {
        $this->dompdf->setPaper($size, $orientation);
    }

    public function render() {
        $this->dompdf->render();
    }

    public function stream($filename = "document.pdf", $options = []) {
        $this->dompdf->stream($filename, $options);
    }
}


