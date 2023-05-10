<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."libraries/Fpdf/Fpdf.php";

class Pdf  extends FPDF{

    function __construct() {
        parent::__construct();
    }
    
    public function Footer() {
        //$this->SetY(-25);
        //$this->SetFont('Arial', '', 8);
        //$this->Cell(0, 4, ('Pág. ').$this->PageNo().'/{nb}', 'T', 0, 'R');
    }

    public function HeaderImg() {
    $this->ln(-2);
        $this->SetTextColor(0,51,102);
        $this->Image('img/upea.jpg' ,20 ,3,25 ,25,'JPG','');
        $this->SetTextColor(0,51,102);
        $this->SetFont('Arial', 'BI', 23);
        $this->SetFont('monotypecorsiva', 'B', 23);
        $this->Cell(0,5,('Universidad Pública de El Alto'),0,1,'C');                
        $this->SetFont('Times', 'BI', 8);
        $this->Ln(2);
        $this->Cell(0,3,('Creada por Ley Nº 2115 de 05 de Septiembre de 2000'),0,1,'C');
        $this->Cell(0,3,('Autónoma por Ley Nº 2556 de 12 de Noviembre de 2003'),0,1,'C');
        $this->Ln(8);
        $this->Cell(0,3,'','T',1,'L');
    
    }

    public function Titulo($Titulo, $Linea1='', $Linea2='', $Linea3='') {
        $this->SetFont('Arial', '', 10);
        $this->cell(60, 4, ($Linea1), 0, 1, 'C');
        $this->cell(60, 4, ($Linea2), 0, 1, 'C');
        $this->cell(60, 4, ($Linea3), 0, 1, 'C');
    
        $this->SetFont('Arial', 'B', 18);       
        $this->cell(0, 4, ($Titulo), 0, 1, 'C');
        $this->Ln(2);
    }
    
    function ClippingRect($x, $y, $w, $h, $outline=false) {
        $op=$outline ? 'S' : 'n';
        $this->_out(sprintf('q %.2F %.2F %.2F %.2F re W %s',
            $x*$this->k,
            ($this->h-$y)*$this->k,
            $w*$this->k,-$h*$this->k,
            $op));
    }
    
    function UnsetClipping() {
        $this->_out('Q');
    }
    
    function ClippedCell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='') {
        if($border || $fill || $this->y+$h>$this->PageBreakTrigger)
        {
            $this->Cell($w,$h,'',$border,0,'',$fill);
            $this->x-=$w;
        }
        $this->ClippingRect($this->x,$this->y,$w,$h);
        $this->Cell($w,$h,$txt,'',$ln,$align,false,$link);
        $this->UnsetClipping();
    }
    
    function RoundedRect($x, $y, $w, $h, $r, $style = '') {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
        $xc = $x+$w-$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

        $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
        $xc = $x+$w-$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x+$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3) {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }
    
    function AjustaCelda($ancho, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true) {
        $TamanoInicial = $this->FontSizePt;
        $TamanoLetra = $this->FontSizePt;
        $decremento = 0.5;
        while($this->GetStringWidth($txt) > $ancho)
            $this->SetFontSize($TamanoLetra -= $decremento);
        $this->Cell($ancho, $h, $txt, $border, $ln, $align, $fill, $link, $scale, $force);
        $this->SetFontSize($TamanoInicial);
    }

}