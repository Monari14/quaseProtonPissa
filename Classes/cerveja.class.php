<?php
require_once 'itemDoPedido.class.php';
class Cerveja_class extends ItemDoPedido_class
{
    private $tamanho, $tipo;
    public function setTamanho($tamanho) { $this->tamanho = $tamanho; }
    public function getTamanhoCerveja() { return $this->tamanho; }
    public function setTipo($tipo) { $this->tipo = $tipo; }
    public function getTipoCerveja() { return $this->tipo; }
    public function calculetedeCerveja() 
    {
        $precoBase = 0;
        switch ($this->tamanho) 
        { 
            case 'Lata': $precoBase = 9; break;
            case 'Latica': $precoBase = 8; break;
            case 'Latão': $precoBase = 8; break; 
            case '-': $precoBase = 0; break; 
        }
        $precoTipo = 0;
        switch ($this->tipo) 
        {
            case 'Mijo': $precoTipo = 5; break; 
            case 'Suco': $precoTipo = 5; break; 
            case 'Gatorade': $precoBase = 7; break; 
            case '-': $precoBase = 0; break; 
        }
        $precoTotal = $precoBase + $precoTipo;
        $this->setValor($precoTotal); 
        return $precoTotal; 
    }
}
?>
