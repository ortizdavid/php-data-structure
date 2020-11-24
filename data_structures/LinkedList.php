<?php
namespace data_structures;

require_once 'Node.php'; 
require_once 'DataStructure.php';

/**
 *
 * @author Ortiz David
 * <br>Email: ortizaad1994@gmail.com <br>Tel: +244936166699
 * @copyright 2020
 * @desc Classe que representa a LinkedList de Nodos (ou Elementos) de qualquer tipo
 * @name LinkedList
 *        
 */
class LinkedList implements DataStructure
{
    
    /**
     * @var $primeiro
     * @desc Primeiro elemento da LinkedList
     * */
    private $primeiro;
    
    
    /**
     */
    public function __construct()
    {
        $this->primeiro = new Node();
        $this->primeiro = NULL;
    }
    
    
    public  function __destruct()
    {
        $aux = new Node();
        while ($this->primeiro != NULL) {
            $aux = $this->primeiro;
            $this->primeiro = $this->primeiro->proximo;
            $aux = $this->primeiro;
            unset($aux);
        }
    }
    
    
    public function isEmpty() : bool
    {
        return ($this->primeiro == NULL);
    }
    
    
    public function size() : int
    {
        if ($this->isEmpty()) 
            return 0;
        else
        {
            $tam = 0;
            $aux = new Node();
            $aux = $this->primeiro;
            while ($aux != NULL){
                $tam++;
                $aux = $aux->proximo;
            }
            return $tam;
        }
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Retorna o elemento na posição passada por parâmetro
     * @name get
     * @param int $posicao
     * @return mixed
     */
    public function get(int $posicao)
    {
        if($posicao>0 && $posicao<=$this->size())
        {
            $cont = 1;
            $aux = new Node();
            $aux = $this->primeiro;
            while ($aux && $cont<$posicao){
                $aux = $aux->proximo;
                $cont++;
            }
            return $aux->dado;
        }    
    }
    
    
    public function show() : void
    {
        if($this->isEmpty())
        {
            echo "[]---||<br>";
            echo "<br>Lista vazia!";
        }
       else
       {
           $strProx = '--->';
           $cont=0;
           $aux = new Node();
           $aux = $this->primeiro;
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
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Adiciona um elemento no início da LinkedList 
     * @name addBegin
     * @param $mixed $elem
     * @return void
     */
    public function addBegin($elem) : void
    {
        $novo = new Node($elem);
        if($this->isEmpty())
            $this->primeiro = $novo;
        else
        {
            $novo->proximo = $this->primeiro;
            $this->primeiro = $novo;
        }      
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Adiciona um elemento no fim da LinkedList
     * @name addEnd
     * @param $mixed $elem
     * @return void
     */
    public function addEnd($elem) : void
    {
        $novo = new Node($elem);
        
        if($this->isEmpty())
            $this->primeiro = $novo;
        else
        {
            $aux = new Node();
            $aux = $this->primeiro;
            while ($aux->proximo != NULL){
                $aux = $aux->proximo;
            }
            $aux->proximo = $novo;
        }
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Insere um elemento numa posição da LinkedList
     * @name insert
     * @param $mixed $elemento
     * @param int $posicao
     * @return void
     */
    public function insert($elemento, int $posicao) : void
    {
        $novo = new Node($elemento);
        
        if($posicao==1 && $this->isEmpty())//insert na primeira posição
            $this->primeiro = $novo;
        if($posicao==1 && !$this->isEmpty())
        {
            $novo->proximo = $this->primeiro;
            $this->primeiro = $novo;
        }
        if($posicao>1 && $posicao<=$this->size()+1)
        {
            $posAnt = 1;
            $aux = new Node(); 
            $aux = $this->primeiro;
            while($posAnt+1 != $posicao){
                $aux = $aux->proximo;
                $posAnt++;
            }
            $novo->proximo = $aux->proximo;
            $aux->proximo = $novo;
        }
        else
            echo "Posicao invalida";
    }
    
   
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Elimina um elemento de uma posição na LinkedList
     * @name delete
     * @param int $posicao
     * @return void
     */
    public function delete(int $posicao) : void
    {
        if($posicao>0 && $posicao <= $this->size())
        {
            $aux = new Node();
            $aux = $this->primeiro;
            $aux1 = new Node();
            $posAnt = 1;
            if($posicao==1)
            {
                $this->primeiro = $this->primeiro->proximo;
                unset($aux);
            }
            else
            {
                while ($posAnt+1 != $posicao)
                {
                    $aux = $aux->proximo;
                    $posAnt++;    
                }
                $aux1 = $aux->proximo;
                $aux->proximo = $aux1->proximo;
                unset($aux1);
            }
        }
        else 
            echo "Posicao invalida";
    }
    
    
    
    //-------------------------------------------------------------------------
    //----------------------------------OUTROS MÉTODOS------------------------------
    
    
    public  function isObject($objecto) : bool
    {
        return ($objecto instanceof LinkedList);
    }
    
    
    
    public function exists($elemento) : bool
    {
        for ($i = 1; $i <= $this->size(); $i++) {
            if($this->get($i) == $elemento)
                return true;
        }
    }
    
    
    public function destroy() : void
    {
        if($this->isEmpty())
            echo  "A Lista já está vazia!";
        else 
            $this->__destruct();
    }
   
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Adiciona vários elementos no início da LinkedList
     * @name addBeginMany
     * @param array $elementos
     * @return void
     */
    public function addBeginMany(...$elementos) : void
    {
        if(empty($elementos))
            echo "Sem elementos para adicionar";
        else
        {
            foreach ($elementos as $elemento){
                $this->addBegin($elemento);
            }
        }
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Adiciona vários elementos no fim da LinkedList
     * @name addEndMany
     * @param array $elementos
     * @return void
     */
    public function addEndMany(...$elementos) : void
    {
        if(empty($elementos))
            echo "Sem elementos para adicionar";
        else
        {
            foreach ($elementos as $elemento){
                $this->addEnd($elemento);
            }
        }
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Elimina os elementos nas posições passadas por parámetro
     * @name deleteMany
     * @param array $posicoes
     * @return void
     */
    public function deleteMany(...$posicoes) : void
    {
        if(empty($posicoes))
            echo "Sem elementos para eliminar";
        else
        {
            foreach ($posicoes as $pos){
                $this->delete($pos);
            }
        }
    }
    
    
     
    public function copy() 
    {
        if($this->isEmpty())
            return NULL;
        else
        {
            $copiaLista = new LinkedList();
            for ($i=1; $i<=$this->size(); $i++){
                $copiaLista->addEnd($this->get($i));
            }
            return $copiaLista;
        }
        
    }
    
    
    public function concat($outra) : void
    {
        if($this->isObject($outra))
        {
            if($outra->isEmpty())
                echo "A Lista para concatenar esta Vazia!";
            else
            {
                for($i=1; $i<=$outra->size(); $i++){
                    $this->addEnd($outra->get($i));
                }
            }
        }
        else echo "O objecto passado Não é uma Lista!";
        
    }
    
    
    public function reverse() : void
    {
        if($this->isEmpty())
            echo "Lista Vazia! Impossivel Inverter!";
        else 
        {
            $invertida = new LinkedList();
            for($i=1; $i<=$this->size(); $i++){
                $invertida->addBegin($this->get($i));
            }
            $this->destroy();
            for ($i= 1; $i<=$invertida->size(); $i++) {
                $this->addEnd($invertida->get($i));
            }
            $invertida->destroy();
        }     
    }
    
    
    public function replace($elemento, $valor) : void
    {
        if($this->exists($elemento))
        {
            for ($i=1; $i<=$this->size(); $i++){
                if ($this->get($i) == $elemento){
                    $this->delete($i);
                    $this->insert($valor, $i);
                }
            }
        }else echo "Elemento inexistsnte";
    }
   
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Elimina um elemento da LinkedList, passando o valor do elemento
     * @name deleteElement
     * @param mixed $elemento
     * @return void
     */
    public function deleteElement($elemento)  : void
    { 
        if($this->exists($elemento))
        {
            for($i=1; $i<=$this->size(); $i++){
                if($this->get($i)==$elemento){
                    $this->delete($i);
                    break;
                }
            }
        }
        else 
            echo "Elemento inexistente na Lista";
    }
    
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Retorna uma sublista de uma posição inicial até a final
     * @name subLista
     * @param int $inicio
     * @param int $fim
     * @return LinkedList
     */
    public function subLista(int $inicio, int $fim) : LinkedList
    {
        if($inicio<$fim && $fim<$this->size())
        { 
            $nova = new LinkedList();
            for($i=$inicio; $i<=$fim; $i++){
                $nova->addEnd($this->get($i));
            }
            return $nova;
        }
        else 
            return NULL;
    }
           
    
    /**
     * @author Ortiz David
     * @copyright 2020
     * @desc Troca as posiçoes dos elementos
     * @name swap
     * @param int $pos1
     * @param int $pos2
     * @return void
     */
    public function swap(int $pos1, int $pos2) : void//incompleto
    {
        if(!$this->isEmpty())
        {
            if($pos1<=$this->size() && $pos2<=$this->size())
            {
                $elem1 = $this->get($pos1);
                $elem2 = $this->get($pos2);
                $this->delete($pos2);
                $this->delete($pos1);
                $this->insert($elem1, $pos2);
                $this->insert($elem2, $pos1);
            }
            else
                echo "As Posicoes $pos1 e $pos2 sao invalidas!!";
        }
        else 
            echo "Impossivel Trocar as Posicoes... Lista Vazia!!";
    }
    
    
}












