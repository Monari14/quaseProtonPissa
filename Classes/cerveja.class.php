<?php
require_once 'itemDoPedido.class.php';
class Cerveja_class extends ItemDoPedido_class
{
    private $tamanho, $tipo, $rangeCerveja;
    public function setRangeCerveja($rangeCerveja) { $this->rangeCerveja = $rangeCerveja; } 
    public function getRangeCerveja() { return $this->rangeCerveja; }  
    public function setTamanho($tamanho) { $this->tamanho = $tamanho; }
    public function getTamanhoCerveja() { return $this->tamanho; }
    public function setTipo($tipo) { $this->tipo = $tipo; }
    public function getTipoCerveja() { return $this->tipo; }
    public function calculetedeCerveja() 
    {
        $precoBase = 0;
        switch ($this->tamanho) 
        { 
            case 'Latinha': $precoBase = 7; break;
            case 'Lata': $precoBase = 11; break;
            case 'Latão': $precoBase = 19; break; 
            case '-': $precoBase = 0; break; 
        }
        $precoTipo = 0;
        switch ($this->tipo) 
        {
            case 'Skol': $precoTipo = 6; break; 
            case 'Brahma': $precoBase = 7; break; 
            case 'Corona': $precoTipo = 8; break; 
            case '-': $precoBase = 0; break; 
        }
        $precoTotal = $precoBase + $precoTipo;
        $precoMaisNcervejas = $precoTotal * $this->getRangeCerveja();
        $this->setValor($precoMaisNcervejas); 
        return $precoMaisNcervejas; 

    }
}
?>
