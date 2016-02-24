<?php 
/**
  * pessoas
  *
  * @package   VECELL
  * @name      Classe para acesso às tabelas de cadastros 
  * @module    CADASTROS
  * @copyright CREATIVEIT. (c) 2016
  * @version   1.0
  * @author    Luciano Terres - 51 8418.5443 - luciano@creativeit.com.br
  **/
    
    // Inclusão do arquivo com a conexão ao banco de dados, e o controle de sessão.
    require("vecell_cfg.php");
    

/**
  * Classe Pessoas
  *
  * @package CREATIVEIT
  * @author  Luciano Terres - luciano@creativeit.com.br
  * @access  public
  *
  **/
class Pessoas {
	var $aAssociacoes;
	var $iLinhas;

	function __construct() {
		
		return true;
	}
	
	
	/**
	  * Função getAssociacao - busca a lista de associações cadastradas
	  *
	  * @author  Luciano Terres - luciano@creativeit.com.br
	  * @access  public
      * @return  array $aAssociacoes 
	  *
	**/
	function getAssociacao($sFiltro = 'PK_Codigo > 0') {
        global $db;
        
        $query = $db->query(" SELECT 	PK_Codigo, 
									 	Nome, 
										Sigla,
										IsNull(Invisivel_Btn_Ass, Cast('0' as Bit)) As Oculto
  		  						FROM TB_Associacoes
							   WHERE $sFiltro "); 
			   		
        $this->iLinhas = 1;
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
	
            $this->iLinhas ++;
				$this->aAssociacoes[] = $row;
			
		}
		
		return $this->aAssociacoes;
	}	
	
}
?>