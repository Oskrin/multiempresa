<?php
session_start();
include '../fdpf/fpdf.php';
include '../procesos/base.php';
conectarse();
//header("Content-Type: text/html; charset=iso-8859-1 ");
date_default_timezone_set('UTC');
$fecha= date("Y-m-d");
class PDF extends FPDF
{
	var $widths;
	var $aligns;

	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}

	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}

	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		if($_GET['hoja']=='Personalizar'){
			$h=2*$nb;
		}
		else{
			$h=6*$nb;
		}		
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			
			//$this->Rect($x,$y,$w,$h);
			if($_GET['hoja']=='Personalizar'){
				$this->MultiCell( $w,2,$data[$i],0,$a,false);
			}
			else{
				$this->MultiCell( $w,6,$data[$i],0,$a,false);
			}			
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}

	function Header()
	{
	    $this->SetTextColor(70,119,159);             	
		if($_GET['hoja']=='A3'){
			$this->SetFont('Helvetica','B',20);
			$this->Text(100,27,'LISTA DE PRODUCTOS',0,'C', 0);	        
			$this->Image('../images/logo_empresa.jpg',20,10,25,0,'',''); 
			$this->Image('../images/logo_empresa.jpg',250,10,25,0,'',''); 
			$this->Ln(30);
		}
		if($_GET['hoja']=='A4'){
			$this->SetFont('Helvetica','B',20);
			$this->Text(100,27,'LISTA DE PRODUCTOS',0,'C', 0);	        
			$this->Image('../images/logo_empresa.jpg',20,10,25,0,'',''); 
			$this->Image('../images/logo_empresa.jpg',250,10,25,0,'',''); 
			$this->Ln(25);
		}
		if($_GET['hoja']=='A5'){
			$this->SetFont('Helvetica','B',20);
			$this->Text(70,25,'LISTA DE PRODUCTOS',0,'C', 0);	        
			$this->Image('../images/logo_empresa.jpg',20,10,22,0,'',''); 
			$this->Image('../images/logo_empresa.jpg',180,10,22,0,'',''); 
			$this->Ln(25);
		}
		if($_GET['hoja']=='Letter'){
			$this->SetFont('Helvetica','B',20);
			$this->Text(100,27,'LISTA DE PRODUCTOS',0,'C', 0);	        
			$this->Image('../images/logo_empresa.jpg',20,10,32,0,'',''); 
			$this->Image('../images/logo_empresa.jpg',230,10,32,0,'',''); 
			$this->Ln(30);
		}
		if($_GET['hoja']=='Legal'){
			$this->SetFont('Helvetica','B',20);
			$this->Text(70,27,'LISTA DE PRODUCTOS',0,'C', 0);	        
			$this->Image('../images/logo_empresa.jpg',20,10,22,0,'',''); 
			$this->Image('../images/logo_empresa.jpg',180,10,22,0,'',''); 
			$this->Ln(25);
		}
		if($_GET['hoja']=='Personalizar'){
			$this->SetFont('Helvetica','B',10);
			$this->Text(17,8,'LISTA DE PRODUCTOS',0,'C', 0);	        	
			$this->Image('../images/logo_empresa.jpg',2,3,8,0,'',''); 
			$this->Image('../images/logo_empresa.jpg',63,3,8,0,'',''); 
			
		}			
	}
	function Footer()
	{
		if($_GET['hoja']=='Personalizar'){
			$this->SetY(-15);
			$this->SetFont('Arial','B',5);
			$this->Cell(100,20,'LISTA DE PRODUCTOS',0,0,'L');			
			$this->Cell(0,100,utf8_decode('Página ').$this->PageNo(),00,0,'C');
		}
		else{
			$this->SetY(-15);
			$this->SetFont('Arial','B',8);
			$this->Cell(100,10,'LISTA DE PRODUCTOS',0,0,'L');
			$this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'C');	
		}
	}
}			
	if($_GET['hoja']=='A3' or $_GET['hoja']=='Legal' ){
		$pdf=new PDF('P','mm',$_GET['hoja']);	
	}
	else{
		if($_GET['hoja']=='Personalizar'){
			$pdf=new PDF('P','mm',array($_GET['w'],$_GET['h']));				
		}
		else{
			$pdf=new PDF('L','mm',$_GET['hoja']);					
		}
	}
	if($_GET['hoja']=='Personalizar'){
		$pdf->Open();
		$pdf->AddPage();
		$pdf->SetMargins(2,10,0);
		$pdf->Ln(1);
	}else{
		$pdf->Open();
		$pdf->AddPage();
		$pdf->SetMargins(10,10,10);
		
	}
	if($_GET['hoja']=='A3'){
		$pdf->SetWidths(array(70,85,40,40,40));
	}
	if($_GET['hoja']=='A4'){
		$pdf->SetWidths(array(70,85,40,40,40));
	}	
	if($_GET['hoja']=='A5'){
		$pdf->SetWidths(array(40,55,30,40,30));
	}	
	if($_GET['hoja']=='Letter'){
		$pdf->SetWidths(array(50,85,40,40,40));
	}	
	if($_GET['hoja']=='Legal'){
		$pdf->SetWidths(array(40,60,30,40,30));
	}		
	if($_GET['hoja']=='Personalizar'){
		$pdf->SetWidths(array(20,18,10,12,10));
	}	
	if($_GET['hoja']=='Personalizar'){
		$pdf->SetFont('Arial','B',5);	
    	$pdf->SetTextColor(210,0,0); 
    	$pdf->SetTextColor(70,119,159);  
	}	
	else{
		$pdf->SetFont('Arial','B',10);	
    	$pdf->SetTextColor(210,0,0); 
    	$pdf->SetTextColor(70,119,159);  
	}		
	if($_GET['hoja']=='Personalizar'){
		for($i=0;$i<1;$i++)
		{
			$pdf->Row(array(utf8_decode('Código'), utf8_decode('Producto'), utf8_decode('Minorista'), utf8_decode('Mayorista'), utf8_decode('Stock')));
		}
		$pdf->SetFont('Arial','',3);				
		$pdf->SetFillColor(255,255,255);
    	$pdf->SetTextColor(0);
    }
    else{
    	for($i=0;$i<1;$i++)
		{
			$pdf->Row(array(utf8_decode('Código'), utf8_decode('Producto'), utf8_decode('Precio Minorista'), utf8_decode('Precio Mayorista'), utf8_decode('Stock')));
		}
    	$pdf->SetFont('Arial','',8);				
		$pdf->SetFillColor(255,255,255);
    	$pdf->SetTextColor(0);	
    }
    $sql=pg_query("select codigo,cod_barras,articulo,iva_minorista,iva_mayorista,stock from productos");
	while($row=pg_fetch_row($sql)){						
		$pdf->Row(array(utf8_decode($row[0]), utf8_decode($row[2]), (utf8_decode($row[3])+(utf8_decode($row[3])*0.12)),(utf8_decode($row[3])+(utf8_decode($row[4])*0.12)),utf8_decode($row[5])));			
	}

$pdf->Output();
?>