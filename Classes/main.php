<?php
require_once 'pedido.class.php';
require_once 'cliente.class.php';
require_once 'pizza.class.php';
require_once 'itemDoPedido.class.php';
require_once 'batatinha.class.php';
require_once 'cerveja.class.php';
require_once 'refrigerante.class.php';

// pega os dados do html e seta no endereco.class.php
$e = new Endereco_class();
$rua = $_POST['rua'];
$e->setRua($rua);
$bairro = $_POST['bairo'];
$e->setBairro($bairro);
$cidade = $_POST['cidade'];
$e->setCidade($cidade);

// seta o nome e endereço no cliente.class.php
$c = new Cliente_class();
$nome = $_POST['nome'];
$c->setNome($nome);
$c->setEndereco($e);

// Adiciona itens ao pizza.class.php
$pz = new Pizza_class();
$tamanho = $_POST['tamanho'];
$pz->setTamanho($tamanho);
$sabor = $_POST['sabor'];
$pz->setSabor($sabor);
$borda = $_POST['borda'];
$pz->setBorda($borda);
// Adiciona itens ao batatinha.class.php
$b = new Batatinha_class();
$tamanhoB = $_POST['tamanhoB'];
$b->setTamanho($tamanhoB);
$saborB = $_POST['saborB'];
$b->setSabor($saborB);

// Adiciona itens ao cerveja.class.php
$cJ = new Cerveja_class();
$tamanhoC = $_POST['tamanhoC'];
$cJ->setTamanho($tamanhoC);
$saborC = $_POST['saborC'];
$cJ->setTipo($saborC);


// Adiciona itens ao refrigerante.class.php
$r = new Refrigerante_class();
$tamanhoR = $_POST['tamanhoR'];
$r->setTamanho($tamanhoR);
$saborR = $_POST['saborR'];
$r->setTipo($saborR);

$p = new Pedido_class();

$p->setCliente($c);
$p->setPizza($pz);
$p->setBatatinha($b);
$p->setCerveja($cJ);
$p->setRefrigerante($r);
$p->calcularTaxaDeEntrega();

$p->addItemDoPedidoPizza($pz);
$p->addItemDoPedidoBatata($b);
$p->addItemDoPedidoRefri($r);
$p->addItemDoPedidoCerveja($cJ);

// Calcula o total do pedido
$p->calcularTotal();
// Imprime o pedido
$p->imprimir();
?>