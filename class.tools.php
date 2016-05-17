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
        //global $db;
        
        $query = $db->query(" SELECT Categoria
  		  						FROM TB_Permissoes
							   WHERE (PK_Usuario = '".$sIdUser."' AND Senha = '".$sSenha."')"); 
			   		
        $this->iLinhas = 1;
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
	
            $this->iLinhas ++;
				$this->aAssociacoes[] = $row;
			
		}
		
		return $this->aAssociacoes;
	}	
	
	$aPermissoes = array(	'MASTER' 		=> array(	'CONVENIADA'	=>	array(	'VISUALIZAR' 	=> array(	0 => 'NEGADO',
																												//1 => 'PERMITIDO',
																												//2 => 'INDEFINIDO'
																											),
																					'EDITAR' 		=> array(	//0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												//2 => 'INDEFINIDO'
																											),
																					'EXCLUIR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																					'REL_COMISSOES' => array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											)
																																																										),
														'ASSOCIADO'		=>	array(	'VISUALIZAR' 	=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																					'EDITAR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																					'EXCLUIR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																																																										),
														'ASSOCIACAO'	=>	array(	'VISUALIZAR' 	=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																					'EDITAR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																					'EXCLUIR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																																																										),
														'MASTER'		=>	array(	'VISUALIZAR' 	=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																					'EDITAR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																					'EXCLUIR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																																																										),
																																																		),
							'ASSOCIADO'		=> array(	'EXTRATO'		=> array(	'VISUALIZAR' 	=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																					'EDITAR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																					'EXCLUIR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																																					 
																				),
														'REDE'			=> array(	'VISUALIZAR' 	=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																					'EDITAR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																												),
																					'EXCLUIR' 		=> array(	0 => 'NEGADO',
																												1 => 'PERMITIDO',
																												2 => 'INDEFINIDO'
																											),
																																					 
																				)
																				
													),
							'CONVENIADA' 	=> XXX,
							'ASSOCIACAO'	=> XXX
						)
	
}
?>