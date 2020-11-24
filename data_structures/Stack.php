<?php
namespace data_structures;

require_once 'Node.php'; 
require_once 'DataStructure.php';

/**
 *
 * @author Ortiz David
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @copyright 2020
 * @desc Classe que representa a Stack de Nodos (ou Elementos) de qualquer tipo
 * <br> Os elementos podem ser de Qualquer tipo
 * @name Lista
 *        
 */
class Stack implements DataStructure
{
    /**@var $topo 
     * @desc primeiro elemento ou topo da Stack
     * */
    private $topo;
    
    
    /**
     */
    public function __construct()
    {
        $this->topo = new Node();
        $this->topo = NULL;
    }
    
    public function __destruct()
    {
        $aux = new Node();
        while ($this->topo != NULL) {
            $aux = $this->topo;
            $this->topo = $this->topo->proximo;
            $aux = $this->topo;
            unset($aux);
        }
    }
    
    
    public function isEmpty() : bool
    {
        return ($this->topo == NULL);
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Empilha um elemento no topo da Stack
     * @name push
     * @param mixed $elemento
     * @return void
     */
    public function push($elemento) : void
    {
        $novo = new Node($elemento);
        if($this->isEmpty()){
            $this->topo = $novo;
        }
        else{
            $novo->proximo = $this->topo;
            $this->topo = $novo;
        }
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Desempilha um elemento e retorna o valor
     * @name pop
     * @return $mixed
     */
    public function pop() 
    {
        if($this->isEmpty()){
            echo "A Pilha esta Vazia!";
            return NULL;
        }
        else{
            $aux = new Node();
            $aux = $this->topo;
            $this->topo = $this->topo->proximo;
            $elem = $aux->dado;
            unset($aux);
            return $elem;
        }      
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc retorna o elemento do topo da pilha
     * @name top
     * @return $mixed
     */
    public function top()
    {
        if($this->isEmpty()){
            echo "A Pilha esta Vazia!";
            return NULL;
        }
        else
            return $this->topo->dado;
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc retorna o fundo da pilha
     * @name bottom
     * @return $mixed
     */
    public function bottom()
    {
        if($this->isEmpty()){
            echo "A Pilha esta Vazia!";
            return NULL;
        }
        else
        {
            $cont=1;
            $aux = new Node();
            $aux = $this->topo;
            while($aux != NULL){
                $cont++;
                $aux = $aux->proximo;
                if($cont==$this->size()){
                    $elem = $aux->dado;
                }
            }
           return $elem; 
        }
    }
    
    
    public function size() :  int
    {
        if($this->isEmpty())
            return 0;
        else
        {
            $tam = 0;
            $aux = new Node;
            $aux = $this->topo;
            while ($aux != NULL) {
                $tam++;
                $aux = $aux->proximo;
            }
            return $tam;
        }
    }

    
    public function isObject($objecto) :  bool
    {
        return ($objecto instanceof Stack);
    }

    
    public function show() :  void
    {
        if($this->isEmpty())
        {
            echo "<br>[ ]<br>&nbsp;|<br>==";
            echo "<br>Stack Vazia";
        }
        else 
        {
            $strProx = '<br>&nbsp;&nbsp;|<br>&nbsp;\/'; 
            $cont=0;
            $aux = new Node;
            $aux = $this->topo;
            while ($aux != NULL) {
                $cont++;
                if ($cont==$this->size()){
                    $strProx = "<br>&nbsp;&nbsp;|<br>==";
                }
                echo "<br>[{$aux->dado}]{$strProx}";
                $aux = $aux->proximo;
            }
        }
    }

    
    public function exists($elemento) :  bool
    {
        $aux = $this;
        $retorno = false;
        while(!$aux->isEmpty())
        {
            if($elemento == $aux->pop()){
                $retorno = true;
            }  
        }
        return $retorno;
    }

    
    public function destroy() :  void
    {
        if($this->isEmpty())
            echo "A pilha já está Vazia";
        else 
            $this->__destruct();
    }
    

    public function concat($outra) :  void
    {
        if($this->isObject($outra))
        {
            if($outra->isEmpty())
                echo "A pilha para concatetar esta Vazia!";
            else
            {
                while(!$outra->isEmpty()){
                    $this->push($outra->pop());
                }
            }
        }
        else 
            echo "O objecto passado Não é uma Pilha!";
    }
    

    public function copy()
    {
        if($this->isEmpty())
            return NULL;
        else
        {
           $copiaPilha = $this;
           return $copiaPilha;
        }
    }

    
    public function reverse() :  void
    {
        if($this->isEmpty()) 
            echo "Pilha Vazia..Imposivel Inverter";
        else 
        {
            $vectAux = array();
            while (! $this->isEmpty()) {
                $vectAux[] = $this->pop();
            }
            foreach($vectAux as $elem){
                $this->push($elem);
            }
        }
    }

    
    public function replace($elemento, $valor) :  void
    {
        if($this->isEmpty())
            echo "Pilha Vazia... Impossivel substituir";
        else 
        {
            $vectAux = array();
            while (!$this->isEmpty()) {
                $vectAux[] = $this->pop();
            }
            foreach($vectAux as $elem){
                if($elem == $elemento){
                   $elem = $valor;
                }   
                $this->push($elem);
            } 
            $this->reverse();
        }
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Empilha trás elementos na pilha
     * @name pushMany
     * @param array $elementos
     * @return void
     */
    public function pushMany(...$elementos) :  void
    {
        if(empty($elementos))
            echo "Sem Elementos para Empilhar!";
        else
        {
            foreach ($elementos as $elem){
                $this->push($elem);
            }
        }
    }
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Desempilha trás elementos na pilha e guarda num vector
     * @name popMany
     * @param int $quantidade
     * @return array
     */
    public function popMany(int $quantidade) :  array
    {
        $elementos = array();
        for($i=1; $i<=$quantidade; $i++){
           $elementos[] = $this->pop(); 
        }
        return $elementos;
    }
    
   
}
