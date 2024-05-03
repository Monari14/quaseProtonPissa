<?php
require_once 'itemDoPedido.class.php';
class Refrigerante_class extends ItemDoPedido_class 
{
    private $tamanho, $tipo, $rangeRefrigerante;
    public function setRangeRefrigerante($rangeRefrigerante) { $this->rangeRefrigerante = $rangeRefrigerante; } 
    public function getRangeRefrigerante() { return $this->rangeRefrigerante; }  
    public function setTamanho($tamanho){ $this->tamanho = $tamanho; }
    public function getTamanhoRefri() { return $this->tamanho; }
    public function setTipo($tipo){ $this->tipo = $tipo; }
    public function getTipoRefri() { return $this->tipo; }
    public function calculetedeRefri() 
    {
        $precoBase = 0;
        switch ($this->tamanho) 
        {
            case '600ml': $precoBase = 6; break; 
            case '1L': $precoBase = 8; break; 
            case '2L': $precoBase = 12; break; 
            case '3L': $precoBase = 14; break; 
            case '-': $precoBase = 0; break; 

        }
        $precoTipo = 0; 
        switch ($this->tipo) 
        {
            case 'Coca-Cola': $precoTipo = 10; break; 
            case 'Guaraná': $precoTipo = 10; break; 
            case 'Fanta': $precoTipo = 10; break; 
            case 'Dolly': $precoTipo = 15; break;
            case '-': $precoTipo = 0; break; 
        }
        $precoTotal = $precoBase + $precoTipo;
        $precoMaisNbatatinhas = $precoTotal * $this->getRangeRefrigerante();
        $this->setValor($precoMaisNbatatinhas);
        return $precoMaisNbatatinhas; 
    }
}
?>
