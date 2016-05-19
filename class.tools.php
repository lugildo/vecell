<?php 
/**
  * tools
  *
  * @package   VECELL
  * @name      Classe de ferramentas 
  * @module    CONFIGURAÇÕES
  * @copyright CREATIVEIT. (c) 2016
  * @version   1.0
  * @author    Luciano Terres - 51 8418.5443 - luciano@creativeit.com.br
  **/
    
    // Inclusão do arquivo com a conexão ao banco de dados, e o controle de sessão.
    require("vecell_cfg.php");
    

/**
  * Classe Tools
  *
  * @package CREATIVEIT
  * @author  Luciano Terres - luciano@creativeit.com.br
  * @access  public
  *
  **/
class Tools {
	var $aPermissões;

	function __construct() {
		
		return true;
	}
	
	
	/**
	  * Função getPermissoes - busca as permissões de acesso do usuário logado
	  *
	  * @author  Luciano Terres - luciano@creativeit.com.br
	  * @access  public
      * @return  array $aPermissoes 
	  *
	**/
	function getPermissoes($sIdUser, $sSenha) {
        global $db;
        $aPermissoes = '';
        $query = $db->query(" SELECT TB_Perfis.Nome as Perfil, TB_Acoes.Modulo, TB_Acoes.Submodulo, TB_Acoes.Acao, TB_Acoes.Situacao
  		  						FROM TB_Acoes
							   INNER JOIN TB_Permissoes on (TB_Permissoes.FK_Perfil = TB_Acoes.FK_Perfil)
							   INNER JOIN TB_Perfis	on (TB_Perfis.PK_Codigo = TB_Acoes.FK_Perfil)
							   WHERE (TB_Permissoes.PK_Usuario = '".$sIdUser."' AND TB_Permissoes.Senha = '".$sSenha."')"); 
	   		
        $this->iLinhas = 1;
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
	
            $this->iLinhas ++;
			$aPermissoes[] = $row;
			
		}
		
		return $aPermissoes;
	}	

}
?>