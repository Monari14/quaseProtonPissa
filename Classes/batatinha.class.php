<?php
require_once 'itemDoPedido.class.php';
class Batatinha_class extends ItemDoPedido_class
{
    private $tamanho, $sabor, $tipo, $rangeBatatinha;
    public function setTamanho($tamanho) { $this->tamanho = $tamanho; }
    public function getTamanhoBatata() { return $this->tamanho; }
    public function setSabor($sabor) { $this->sabor = $sabor; }
    public function getSaborBatata() { return $this->sabor; }
    public function setRangeBatatinha($rangeBatatinha) { $this->rangeBatatinha = $rangeBatatinha; } 
    public function getRangeBatatinha() { return $this->rangeBatatinha; }  
    public function calculetedeBatata()
    {
        $precoBase = 0;
        switch ($this->tamanho) 
        {
            case 'Magra': $precoBase = 10; break; 
            case 'Normal': $precoBase = 15; break; 
            case 'Gorda': $precoBase = 25; break; 
            case '-': $precoBase = 0; break; 
        }
        $precoSabor = 0; 
        switch ($this->sabor) 
        {
            case 'Frita': $precoSabor = 5; break; 
            case 'Assada': $precoSabor = 10; break; 
            case '-': $precoSabor = 0; break; 
        }
        $precoTotal = $precoBase + $precoSabor;
        $precoMaisNbatatinhas = $precoTotal * $this->getRangeBatatinha();
        $this->setValor($precoMaisNbatatinhas);
        return $precoMaisNbatatinhas; 
    }
}
?>
