
<?php

require('fpdf.php');
require('times.php');

class PDF extends FPDF{

    function carregarDados($arquivo){
        $linhas = file($arquivo);
        $dados = array();

        foreach($linhas as $linha){
            $dados[] = explode(';', trim($linha));
        } return $dados;
    }

    function criarTabela($dados) {
    
        foreach($dados as $row) {
            foreach($row as $col)
                $this->Cell(68,6,$col,1);
            $this->Ln();
        }
    }
}
        $pdf = new PDF("L");

        $dados = $pdf -> carregarDados('alunos.CSV');
        $pdf->SetFont('times','',12);
        $pdf->AddPage();
        $pdf->criarTabela($dados);
        $pdf->Output();

?>
