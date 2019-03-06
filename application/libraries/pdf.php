<?php
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

class Pdf extends Dompdf
{
  public function __construct()
    {
        parent::__construct();
           
    }

}	



?>