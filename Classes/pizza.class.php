<?php
require_once 'itemDoPedido.class.php';
class Pizza_class extends ItemDoPedido_class
{
    private $tamanho, $sabor, $borda, $rangePizza;
    public function setTamanho($tamanho) { $this->tamanho = $tamanho; }
    public function getTamanhoPizza() { return $this->tamanho; }
    public function setSabor($sabor) { $this->sabor = $sabor; }
    public function getSaborPizza() { return $this->sabor; }
    public function setBorda($borda) { $this->borda = $borda; }
    public function getBordaPizza() { return $this->borda; }
    public function setRangePizza($rangePizza) { $this->rangePizza = $rangePizza; } 
    public function getRangePizza() { return $this->rangePizza; }  
    public function calculatedePissa()
    {
        $precoBase = 0;
        switch ($this->tamanho) 
        {
            case 'Magra': $precoBase = 20; break;
            case 'Normal': $precoBase = 25; break;
            case 'Gorda': $precoBase = 30; break;
            case '-': $precoBase = 0; break;
        }
        $precoSabor = 0;
        switch ($this->sabor) 
        {
            case 'Java': $precoSabor = 5; break;
            case 'JavaScript': $precoSabor = 8; break;
            case 'PHP': $precoSabor = 10; break;
            case 'HTML': $precoSabor = 11; break;
            case '-': $precoSabor = 0; break;
        }
        $precoBorda = 0;
        switch ($this->borda) 
        {
            case 'CSS': $precoBorda = 5; break;
            case 'Println': $precoBorda = 4; break;
            case 'Get e Set': $precoBorda = 6; break;
            case '-': $precoBorda = 0; break;
        }
        $precoTotal = $precoBase + $precoSabor + $precoBorda;
        $precoMaisNpizzas = $precoTotal * $this->getRangePizza();   
        $this->setValor($precoMaisNpizzas);
        return $precoMaisNpizzas; 
    }
}
?>
