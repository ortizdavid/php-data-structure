<?php
namespace data_structures;

/**
 *
 * @author Ortiz David
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @copyright 2020
 * @desc Classe que representa cada Node( ou nó) da LinkedList
 * @name Node
 *        
 */
class Node
{
    
    /**
     * @var $dado
     * @desc Valor do nodo
     * */
    public $dado;
    
    /**
     * @var $proximo
     * @desc Representa Ponteiro que aponta para  pr�ximo elemento da LinkedList
     * */
    public $proximo;
    
    
    /**
     * @param mixed $valor
     * @desc Construtor que recebe o valor do primeiro elemento
     */
    public function __construct($valor=null)
    {
        $this->dado = $valor;
        $this->proximo = NULL;
    }
    
}

