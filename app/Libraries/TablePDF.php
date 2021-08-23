<?php
class TablePDF extends TCPDF
{
    public function load($file)
    {
        // baca data
        $lines = file($file);
    }
}
