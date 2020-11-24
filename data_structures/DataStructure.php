<?php
namespace data_structures;

/**
 *
 * @author Ortiz David
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @copyright 2020
 * @desc Interface com os métodos necessários para as estruturas:
 * <br> Queue, LinkedList, Stack
 * @name DataStructure
 *        
 */
interface DataStructure
{   
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Verifica se um elemento existe
     * @name exists
     * @return bool
     */
    public function exists($elemento) : bool;
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Verifica se a Estrutura está vazia
     * @name isEmpty
     * @return bool
     */
    public function isEmpty() : bool;
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Inverte a Estrutura
     * @name reverse
     * @return void
     */
    public function reverse() : void;
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Esvazia a estrutura <br>Elimina todos os elementos
     * @name destroy
     * @return void
     */
    public function destroy() : void;
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Concatena a Estrutura com a outra passada como parametro 
     * @name concat
     * @param mixed $outra
     * @return void
     */
    public function concat($outra) : void;
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Percorre a estrutura e retorna o comprimento
     * @name size
     * @return int
     */
    public function size() : int;
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Mostra os Elementos da Estrutura
     * @name show
     * @return void
     */
    public function show() : void;
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Copia a Estrutra corrente e retorna a cópia
     * @name copy
     * @return mixed
     */
    public function copy();
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Substitui um(ou vários) elemento(s) da Estrutura que são iguais ao Elemento
     * <br> pelo passado em parâmetro
     * @name replace
     * @param mixed $elemento
     * @param mixed $valor
     * @return void
     */
    public function replace($elemento, $valor) : void;
      
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc verifica se um objecto é do tipo da estrutura
     * @name isObject
     * @param mixed $objecto
     * @return bool
     */
    public function isObject($objecto) : bool;
  
    
}

