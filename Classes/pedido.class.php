<?php
include "conexao.class.php";
class Pedido_class {
private Cliente_class $cliente;
private Endereco_class $endereco;
private Pizza_class $pizza;
private Batatinha_class $batatinha;
private Cerveja_class $cerveja;
private Refrigerante_class $refri;

    private array $itemDoPedido = [];
    private $total, $taxaDeEntrega;
    private $rangePizza, $rangeBatatinha, $rangeCerveja, $rangeRefrigerante;
    public function addItemDoPedidoPizza($itemDoPedido) { $this->itemDoPedido[] = $itemDoPedido; $this->addTotal($itemDoPedido->calculatedePissa()); }
    public function addItemDoPedidoBatata($itemDoPedido) { $this->itemDoPedido[] = $itemDoPedido; $this->addTotal($itemDoPedido->calculetedeBatata()); } 
    public function addItemDoPedidoRefri($itemDoPedido) { $this->itemDoPedido[] = $itemDoPedido; $this->addTotal($itemDoPedido->calculetedeRefri()); } 
    public function addItemDoPedidoCerveja($itemDoPedido) { $this->itemDoPedido[] = $itemDoPedido; $this->addTotal($itemDoPedido->calculetedeCerveja()); } 
    public function getItemDoPedido() { return $this->itemDoPedido; }

    public function setEndereco(Endereco_class $endereco) { $this->endereco = $endereco; }
    public function getEndereco() { return $this->endereco; }  
    public function setCliente(Cliente_class $cliente) { $this->cliente = $cliente; } 
    public function getCliente() { return $this->cliente; }  
    public function setPizza(Pizza_class $pizza) { $this->pizza = $pizza; } 
    public function getPizza() { return $this->pizza; }  
    
    public function setBatatinha(Batatinha_class $batatinha) { $this->batatinha = $batatinha; } 
    public function getBatatinha() { return $this->batatinha; }  

    public function setCerveja(Cerveja_class $cerveja) { $this->cerveja = $cerveja; } 
    public function getCerveja() { return $this->cerveja; } 

    public function setRefrigerante(Refrigerante_class $refri) { $this->refri = $refri; } 
    public function getRefrigerante() { return $this->refri; }  

    public function setTotal($total) { $this->total = $total; } 
    public function addTotal($valor){ $this->total += $valor; } 
    public function getTotal() { return $this->total; } 

    public function setTaxaDeEntrega($taxaDeEntrega) {   $this->taxaDeEntrega = $taxaDeEntrega; }  
    public function getTaxaDeEntrega() { return $this->taxaDeEntrega; } 
    public function calcularTaxaDeEntrega() 
    { 
        $bairro = $this->getEndereco()->getBairro(); 
        switch ($bairro) 
        { 
            case 'Centro': $this->taxaDeEntrega = 8; break;
            case 'Periferia':$this->taxaDeEntrega = 9; break;
            case 'Mato':$this->taxaDeEntrega = 10; break;    
            default: $this->taxaDeEntrega = 15; break;
        }
    } 
    public function calcularTotal()
    { 
        $this->total = 0;
        // calcula o total dos itens do pedido
        foreach ($this->itemDoPedido as $itemDoPedido) { $this->total += $itemDoPedido->getValor(); }
        // adiciona a taxa de entrega ao total
        $this->total += $this->taxaDeEntrega;
    } 

    function listaPedido() {
        $database = new Conexao(); //nova instância da conexao
        $db = $database->getConnection(); // tenta conectar

        $sql = "SELECT * FROM pedido";
        try {
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch(PDOException $e) {
            echo 'Erro ao listar pedido: ' . $e->getMessage(); 
        }   
    }

    function inserir(){
		$database = new Conexao(); //nova instância da conexao
		$db = $database->getConnection(); // tenta conectar

        $total = $this->getTotal();
        $rua = $this->getEndereco()->getRua();
        $bairro = $this->getEndereco()->getBairro();
        $cidade = $this->getEndereco()->getCidade();
        $nome_cliente = $this->getCliente()->getNome();
        $taxa_de_entrega = $this->getTaxaDeEntrega();
        $tamanho_pizza = $this->getPizza()->getTamanhoPizza();
        $sabor_pizza = $this->getPizza()->getSaborPizza();
        $borda_pizza = $this->getPizza()->getBordaPizza();
        $tamanho_batatinha = $this->getBatatinha()->getTamanhoBatata();
        $sabor_batatinha = $this->getBatatinha()->getSaborBatata();
        $tamanho_cerveja = $this->getCerveja()->getTamanhoCerveja();
        $sabor_cerveja = $this->getCerveja()->getTipoCerveja();
        $tamanho_refrigerante = $this->getRefrigerante()->getTamanhoRefri();
        $sabor_refrigerante = $this->getRefrigerante()->getTipoRefri();
		$sql = "INSERT INTO pedido 
		(total, rua, bairro, cidade, nome_cliente, taxa_de_entrega, tamanho_pizza, 
        sabor_pizza, borda_pizza, tamanho_batatinha, sabor_batatinha, tamanho_cerveja,
        sabor_cerveja, tamanho_refrigerante, sabor_refrigerante) VALUES 
		(:total, :rua, :bairro, :cidade, :nome_cliente, :taxa_de_entrega, :tamanho_pizza, 
        :sabor_pizza, :borda_pizza, :tamanho_batatinha, :sabor_batatinha, :tamanho_cerveja,
        :sabor_cerveja, :tamanho_refrigerante, :sabor_refrigerante)";
		try {


            
			$stmt = $db->prepare($sql);

			$stmt->bindParam(':total', $total);

            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':cidade', $cidade);

			$stmt->bindParam(':nome_cliente', $nome_cliente);
			$stmt->bindParam(':taxa_de_entrega', $taxa_de_entrega);

            $stmt->bindParam(':tamanho_pizza', $tamanho_pizza);
            $stmt->bindParam(':sabor_pizza', $sabor_pizza);
            $stmt->bindParam(':borda_pizza', $borda_pizza);

            $stmt->bindParam(':tamanho_batatinha', $tamanho_batatinha);
            $stmt->bindParam(':sabor_batatinha', $sabor_batatinha);            

			$stmt->bindParam(':tamanho_cerveja', $tamanho_cerveja);
            $stmt->bindParam(':sabor_cerveja', $sabor_cerveja);

			$stmt->bindParam(':tamanho_refrigerante', $tamanho_refrigerante);
			$stmt->bindParam(':sabor_refrigerante', $sabor_refrigerante);

			$stmt->execute(); // Executa a consulta preparada
			return true;
	
		} catch(PDOException $e) { 
			echo "Erro ao inserir pessoa: " . $e->getMessage();
			return false;
		}
	}


    public function imprimir()
    { 
        echo "<link rel='stylesheet' href='../style.css'>";
        echo "<div class='divi'>";
        echo "<p>Total: R$" . $this->getTotal() . "</p>";
        echo "<p>Taxa de Entrega: R$" . $this->getTaxaDeEntrega() . "</p>"; 
        echo "<p>Cliente: " . $this->getCliente()->getNome() . "</p>";

        echo "<p>Rua: " . $this->getEndereco()->getRua() . "</p>";
        echo "<p>Bairro: " . $this->getEndereco()->getBairro() . "</p>";
        echo "<p>Cidade: " . $this->getEndereco()->getCidade() . "</p>";

        echo "<p>N° Pizzas: " . $this->getPizza()->getRangePizza() . "</p>";
        echo "<p>Tamanho Pizza: " . $this->getPizza()->getTamanhoPizza() . "</p>";
        echo "<p>Sabor Pizza: " . $this->getPizza()->getSaborPizza() . "</p>";
        echo "<p>Borda Pizza: " . $this->getPizza()->getBordaPizza() . "</p>";

        echo "<p>N° Batatinhas: " . $this->getBatatinha()->getRangeBatatinha() . "</p>";
        echo "<p>Tamanho Batata: " . $this->getBatatinha()->getTamanhoBatata() . "</p>";
        echo "<p>Tipo Batata: " . $this->getBatatinha()->getSaborBatata() . "</p>";

        echo "<p>N° Cervejas: " . $this->getCerveja()->getRangeCerveja() . "</p>";
        echo "<p>Tamanho Cerveja: " . $this->getCerveja()->getTamanhoCerveja() . "</p>";
        echo "<p>Tipo Cerveja: " . $this->getCerveja()->getTipoCerveja() . "</p>";

        echo "<p>N° Refris: " . $this->getRefrigerante()->getRangeRefrigerante() . "</p>";
        echo "<p>Tamanho Refri: " . $this->getRefrigerante()->getTamanhoRefri() . "</p>";
        echo "<p>Tipo Refri: " . $this->getRefrigerante()->getTipoRefri() . "</p>";
        echo "</div>";
    }
    
    


}
?>

