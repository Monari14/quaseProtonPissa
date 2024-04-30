<?php
require_once 'itemDoPedido.class.php';
class Refrigerante_class extends ItemDoPedido_class 
{
    private $tamanho, $tipo;
    public function setTamanho($tamanho){ $this->tamanho = $tamanho; }
    public function getTamanhoRefri() { return $this->tamanho; }
    public function setTipo($tipo){ $this->tipo = $tipo; }
    public function getTipoRefri() { return $this->tipo; }
    public function calculetedeRefri() 
    {
        $precoBase = 0;
        switch ($this->tamanho) 
        {
            case 'Ticozinho': $precoBase = 5; break; 
            case 'Padrão': $precoBase = 8; break; 
            case 'Gigante': $precoBase = 12; break; 
        }
        $precoTipo = 0; 
        switch ($this->tipo) 
        {
            case 'Coca': $precoTipo = 5; break; 
            case 'Dolly': $precoTipo = 5; break; 
            case 'Água': $precoTipo = 10; break; 
        }
        $precoTotal = $precoBase + $precoTipo;
        $this->setValor($precoTotal);
        return $precoTotal; 
    }
}
?>
