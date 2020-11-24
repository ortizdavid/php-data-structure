<?php
namespace data_structures;

require_once 'Node.php';
require_once 'DataStructure.php';

/**
 *
 * @author Ortiz David
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @copyright 2020
 * @desc Classe que representa a Queue de Nodos (ou Elementos) de qualquer tipo
 * <br> Os elementos podem ser de Qualquer tipo
 * @name Queue
 *        
 */
class Queue implements DataStructure
{
    
    /**
     * @var $frente
     * @desc Frente da Queue ou Primeiro elemento a entrar
     * */
    private $frente;
    
    /**
     * @var $fundo
     * @desc Fundo da Queue ou último elemento a entrar
     * */
    private $fundo;
    
    
    /**
     */
    public function __construct()
    {
        $this->frente = new Node();
        $this->fundo = new Node();
        $this->frente = NULL;
        $this->fundo = NULL;
    }
    
    
    public function __destruct()
    {
        $aux = new Node();
        while ($this->frente != NULL) {
            $aux = $this->frente;
            $this->frente = $this->frente->proximo;
            unset($aux);
        }
        $this->fundo = NULL;
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc retorna o elemento da frente da fila
     * @name front
     * @return $mixed
     */
    public function front()
    {
        return $this->frente->dado;
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc retorna o elemento da frente por trás da fila
     * @name back
     * @return $mixed
     */
    public function back()
    {
        if($this->isEmpty()){
            echo "A Queue esta Vazia!";
            return NULL;
        }
        else
        {
            $cont=1;
            $aux = new Node();
            $aux = $this->frente;
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
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Enfileira um elemento na fila
     * @name enqueue
     * @param mixed $elemento
     * @return void
     */
    public function enqueue($elemento) : void
    {
        $novo = new Node($elemento);
        if($this->isEmpty()){
            $this->frente = $novo;
            $this->fundo = $novo;
        }
        else{
          $this->fundo->proximo = $novo;
          $this->fundo = $novo;
        }
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Desenfileira e retorna o elemento da frente fila
     * @name dequeue
     * @return $mixed
     */
    public function dequeue()
    {
       if($this->isEmpty())
         return  NULL;
       else
       {
           $aux = new Node();
           $aux = $this->frente;
           $this->frente = $this->frente->proximo;
           $elem = $aux->dado;
           unset($aux);
           return $elem;
       }
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Efileira vários elementos na Queue
     * @name enqueueMany
     * @param array $elementos
     * @return void
     */
    public function enqueueMany(...$elementos) : void
    {
        if(empty($elementos))
            echo "Sem Elementos para Empilhar!";
        else
        {
            foreach ($elementos as $elem){
                $this->enqueue($elem);
            }
        }
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Desefileira trás elementos na fila guarda num vector
     * @name dequeueMany
     * @param int $quantidade
     * @return array
     */
    public function dequeueMany(int $quantidade) :  array
    {
        $elementos = array();
        for($i=1; $i<=$quantidade; $i++){
            $elementos[] = $this->dequeue();
        }
        return $elementos;
    }
    
    
    public function size() : int
    {
        if($this->isEmpty())
            return 0;
        else 
        {
            $tam = 0;
            $aux = new Node;
            $aux = $this->frente;
            while ($aux != NULL) {
                $tam++;
                $aux = $aux->proximo;
            }
            return $tam; 
        }
    }

    
    public function isObject($objecto) : bool
    {
        return ($objecto instanceof Queue);
    }

    
    public function isEmpty() : bool
    {
        return ($this->frente == NULL);
    }

    
    public function show() : void
    {
        if($this->isEmpty())
        {
            echo "[]---||<br>";
            echo "<br>Queue esta vazia!";
        }
        else
        {
            $strProx = '--->';
            $cont=0;
            $aux = new Node();
            $aux = $this->frente;
            while ($aux != NULL)
            {
                $cont++;
                if ($cont==$this->size()){
                    $strProx = "---||";
                }
                echo "[{$aux->dado} |]{$strProx}";
                $aux = $aux->proximo;
            }
        }
    }

    
    public function replace($elemento, $valor) : void
    {
        if($this->isEmpty())
            echo "Queue Vazia... Impossivel substituir";
        else
        {
            $vectAux = array();
            while (! $this->isEmpty()) {
                $vectAux[] = $this->dequeue();
            }
            foreach($vectAux as $elem){
                if($elem == $elemento){
                    $elem = $valor;
                }
                $this->enqueue($elem);
            }
        }
    }

    
    public function exists($elemento) : bool
    {
        $aux = $this;
        $retorno = false;
        while(!$aux->isEmpty())
        {
            if($elemento == $aux->dequeue()){
                $retorno = true;
            }
        }
        return $retorno;
    }

    
    public function destroy() : void
    {
        if($this->isEmpty())
            echo "A fila já está Vazia";
        else
            $this->__destruct();
    }

    
    public function concat($outra) : void
    {
        if($this->isObject($outra))
        {
            if($outra->isEmpty())
                echo "A Fila para concatenar esta Vazia!";
            else
            {
                while(!$outra->isEmpty()){
                    $this->enqueue($outra->dequeue());
                }
            }
        }
        else
            echo "O objecto passado Não é uma Fila!";
    }

    
    public function copy()
    {
        if($this->isEmpty())
            return NULL;
        else
        {
            $copiaFila = $this;
            return $copiaFila;
        }
    }

    
    public function reverse() : void
    {
        if($this->isEmpty())
            echo "Fila Vazia..Imposivel Inverter";
        else
        {
            $vectAux = array();
            while (! $this->isEmpty()) {
                $vectAux[] = $this->dequeue(); 
            }
            for($i=count($vectAux)-1; $i>=0; $i--) {
                $this->enqueue($vectAux[$i]);
            }
        }
    }
  
    
}
