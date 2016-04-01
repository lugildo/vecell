<?php
	zray_disable(true);//desativa o servidor zend
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>VECELL CARD</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.full.min.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/ui.jqgrid.css" />

		<!-- fonts -->

		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							VECELL CARD
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-warning-sign"></i>
									8 Notifications
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
												New Comments
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-xs btn-primary icon-user"></i>
										Bob just signed up as an editor ...
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
												New Orders
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-info icon-twitter"></i>
												Followers
											</span>
											<span class="pull-right badge badge-info">+11</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

  <div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li>
							<a href="dashboard.php">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> Dashboard </span>
							</a>
						</li>
						<li class="active open">
							<a href="#" class="dropdown-toggle">
								<i class="icon-usd"></i>
								<span class="menu-text"> Master  </span>

								<b class="arrow icon-angle-down"></b>
							</a>
							
							<ul class="submenu">	
								<li class="active open">
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>

										Cadastros
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="associacao.php">
												<i class="icon-double-angle-right"></i>
												Associações
											</a>
										</li>

										<li>
											<a href="associado.php">
												<i class="icon-double-angle-right"></i>
												Associado
											</a>
										</li>
										<li class="active">
											<a href="conveniada.php">
												<i class="icon-double-angle-right"></i>
												Conveniada
											</a>
										</li>

										
									</ul>
								</li>
								<li>
									<a href="contasapagar.php">
										<i class="icon-double-angle-right"></i>
										Contas a pagar
									</a>
								</li>

								<li>
									<a href="contasareceber.php">
										<i class="icon-double-angle-right"></i>
										Contas a receber
									</a>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>

										Relatórios
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-double-angle-right"></i>
												Administração
											</a>
										</li>

										<li>
											<a href="#">
												<i class="icon-double-angle-right"></i>
												Extrato Associado
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-double-angle-right"></i>
												Fechamento
											</a>
										</li>

										
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="agenda.php">
								<i class="icon-calendar"></i>
								<span class="menu-text">
									Agenda
									<span class="badge badge-transparent tooltip-error" title="2&nbsp;Important&nbsp;Events">
										<i class="icon-warning-sign red bigger-130"></i>
									</span>
								</span>
							</a>
						</li>
						

						
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-group home-icon"></i>
								<a href="#">Conveniadas</a>
							</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Conveniadas
								<small>
									<i class="icon-double-angle-right"></i>
									Listagem de conveniadas
								</small>
							</h1>
						</div><!-- /.page-header -->
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<table id="grid-table"></table>

								<div id="grid-pager"></div>

								<script type="text/javascript">
									var $path_base = "/";//this will be used in gritter alerts containing images
								</script>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/jqGrid/jquery.jqGrid.min.js"></script>
		<script src="assets/js/jqGrid/i18n/grid.locale-en.js"></script>
		

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		
			jQuery(function($) {
				var grid_selector = "#grid-table";
				var pager_selector = "#grid-pager";
			
				jQuery(grid_selector).jqGrid({
					//direction: "rtl",
					url:'http://104.236.0.195/crud_conveniada.php', // link para buscar os dados de conexão
					datatype: "json",
					height: 250,
					colNames:['Código','Nome','Razao','Logotipo','E-mail','CNPJ','Insc_Est','Endereco','Bairro','CEP','Cidade','FK_UF','Site','Email','Fone','Fax','Celular','Ag','Cta','Ag2','Cta2','Condicoes','Bloq','Motivo','OptInNews','Loja_Assoc','Data_Pgto1','Valor_Pgto1','Situacao_Pg1','Data_Pgto2','Valor_Pgto2','Situacao_Pg2','Data_Pgto3','Valor_Pgto3','Situacao_Pg3','Latitude','Longitude','Dt_Cadastro'],
/*
Tabelas Auxiliares:
Bco
Bco2
FK_Segmento
FK_Grupo
-------------
//Alt

'Contato','Fone_Contato'
Tx_Adm_CDC
Pessoa        Fisica ou Juridica
Nro_Contrato
Data_Contrato
Consultor
Valor_Contrato
Anuidade_Contrato
Forma_Pgto

TEF
TEF_Observacao
TEF_Data_Inst

POS_Modelo
POS_Serial
POS_Data_Inst
POS_Valor
POS_Mensal
POS_Condicao
POS_Data_Mensal1
*/
					colModel:[
						{name:'PK_Codigo',index:'PK_Codigo', key:true, width:20, editable: false,
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 1, // the position of the row
                            label: "Código: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Nome',index:'Nome',width:90, editable:true,editoptions:{size:"40",maxlength:"150"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 1, // the position of the row
                            label: "Nome Fantasia: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Razao',index:'Razao',width:90, editable:true,editoptions:{size:"40",maxlength:"150"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 1, // the position of the row
                            label: "Razão Social: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Logotipo',index:'Logotipo',width:90, editable:true,editoptions:{size:"40",maxlength:"150"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 1, // the position of the row
                            label: "Logotipo: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Email',index:'Email', width:90, editable: true,editoptions:{size:"40",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 2, // the position of the row
                            label: "E-mail: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'CNPJ',index:'CNPJ', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 3, // the position of the row
                            label: "CNPJ: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Insc_Est',index:'Insc_Est', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 3, // the position of the row
                            label: "Inscrição Estadual: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Endereco',index:'Endereco', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 3, // the position of the row
                            label: "Endereço: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Bairro',index:'Bairro', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 4, // the position of the row
                            label: "Bairro: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'CEP',index:'CEP', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"10",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 4, // the position of the row
                            label: "CEP: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Cidade',index:'Cidade', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 5, // the position of the row
                            label: "Cidade: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'FK_UF',index:'FK_UF', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"10",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 5, // the position of the row
                            label: "UF: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Site',index:'Site', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 6, // the position of the row
                            label: "Site: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Email',index:'Email', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 6, // the position of the row
                            label: "E-mail: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Fone',index:'Fone', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"10",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 7, // the position of the row
                            label: "Fone: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Fax',index:'Fax', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"10",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 7, // the position of the row
                            label: "Fax: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Celular',index:'Celular', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"10",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 8, // the position of the row
                            label: "Celular: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Ag',index:'Ag', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"10",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Agência: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Cta',index:'Cta', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Conta: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Ag2',index:'Ag2', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"10",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Agência 2: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Cta2',index:'Cta2', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Conta 2: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Condicoes',index:'Condicoes', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Condições: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
				//flag
						{name:'Bloq',index:'Bloq', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Bloqueio" // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Motivo',index:'Motivo', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Motivo do Bloqueio: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
//flag
						{name:'OptInNews',index:'OptInNews', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Aceito receber as Promoções" // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
//flag
						{name:'Loja_Assoc',index:'Loja_Assoc', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Loja da Associação" // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Data_Pgto1',index:'Data_Pgto1', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Data: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Valor_Pgto1',index:'Valor_Pgto1', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Valor: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Situacao_Pg1',index:'Situacao_Pg1', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Situação: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Data_Pgto2',index:'Data_Pgto2', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Data: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Valor_Pgto2',index:'Valor_Pgto2', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Valor: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Situacao_Pg2',index:'Situacao_Pg2', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Situação: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Data_Pgto3',index:'Data_Pgto3', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Data: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Valor_Pgto3',index:'Valor_Pgto3', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Valor: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Situacao_Pg3',index:'Situacao_Pg3', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Situação: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Latitude',index:'Latitude', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Latitude: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Longitude',index:'Longitude', width:90,hidden:true, editable: true, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 2, // the position of the column
                            rowpos: 9, // the position of the row
                            label: "Longitude: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }},
						{name:'Dt_Cadastro',index:'Dt_Cadastro', width:90,hidden:true, editable: false, editrules: {edithidden:true} ,editoptions:{size:"20",maxlength:"90"},
						formoptions: {
                            colpos: 1, // the position of the column
                            rowpos: 35, // the position of the row
                            label: "Cadastrado em: " // the label to show for each input control                    
                            //elmsuffix: " * " // the suffix to show after that
                        }}
					], 
			
					viewrecords : true,
					rowNum:10,
					rowList:[10,20,30],
					pager : pager_selector,
					altRows: true,
					//toppager: true,
					
					multiselect: true,
					//multikey: "ctrlKey",
			        multiboxonly: true,
			
					loadComplete : function() {
						var table = this;
						setTimeout(function(){
							styleCheckbox(table);
							
							updateActionIcons(table);
							updatePagerIcons(table);
							enableTooltips(table);
						}, 0);
					},
			
					editurl: $path_base+"/dummy.html",//nothing is saved
					//caption: "jqGrid with inline editing",
			
			
					autowidth: true
			
				});
			
				//enable search/filter toolbar
				//jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
			
				//switch element when editing inline
				function aceSwitch( cellvalue, options, cell ) {
					setTimeout(function(){
						$(cell) .find('input[type=checkbox]')
								.wrap('<label class="inline" />')
							.addClass('ace ace-switch ace-switch-5')
							.after('<span class="lbl"></span>');
					}, 0);
				}
				//enable datepicker
				function pickDate( cellvalue, options, cell ) {
					setTimeout(function(){
						$(cell) .find('input[type=text]')
								.datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
					}, 0);
				}
			
			
				//navButtons
				jQuery(grid_selector).jqGrid('navGrid',pager_selector,
					{ 	//navbar options
						edit: true,
						editicon : 'icon-pencil blue',
						add: true,
						addicon : 'icon-plus-sign purple',
						del: true,
						delicon : 'icon-trash red',
						search: true,
						searchicon : 'icon-search orange',
						refresh: true,
						refreshicon : 'icon-refresh green',
						view: true,
						viewicon : 'icon-zoom-in grey',
					},
					{
						//edit record form
						//closeAfterEdit: true,

						height: 'auto',
                    	width: 1024,
						recreateForm: true,
						beforeShowForm : function(e) {
							var form = $(e[0]);
							form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
							style_edit_form(form);
						}
					},
					{
						//new record form
						closeAfterAdd: true,
						recreateForm: true,
						viewPagerButtons: false,
						beforeShowForm : function(e) {
							var form = $(e[0]);
							form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
							style_edit_form(form);
						}
					},
					{
						//delete record form
						recreateForm: true,
						beforeShowForm : function(e) {
							var form = $(e[0]);
							if(form.data('styled')) return false;
							
							form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
							style_delete_form(form);
							
							form.data('styled', true);
						},
						onClick : function(e) {
							alert(1);
						}
					},
					{
						//search form
						recreateForm: true,
						afterShowSearch: function(e){
							var form = $(e[0]);
							form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
							style_search_form(form);
						},
						afterRedraw: function(){
							style_search_filters($(this));
						}
						,
						multipleSearch: true,
						/**
						multipleGroup:true,
						showQuery: true
						*/
					},
					{
						//view record form
						recreateForm: true,
						beforeShowForm: function(e){
							var form = $(e[0]);
							form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
						}
					}
				)
			
			
				
				function style_edit_form(form) {
					//enable datepicker on "sdate" field and switches for "stock" field
					form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
						.end().find('input[name=stock]')
							  .addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');
			
					//update buttons classes
					var buttons = form.next().find('.EditButton .fm-button');
					buttons.addClass('btn btn-sm').find('[class*="-icon"]').remove();//ui-icon, s-icon
					buttons.eq(0).addClass('btn-primary').prepend('<i class="icon-ok"></i>');
					buttons.eq(1).prepend('<i class="icon-remove"></i>')
					
					buttons = form.next().find('.navButton a');
					buttons.find('.ui-icon').remove();
					buttons.eq(0).append('<i class="icon-chevron-left"></i>');
					buttons.eq(1).append('<i class="icon-chevron-right"></i>');		
				}
			
				function style_delete_form(form) {
					var buttons = form.next().find('.EditButton .fm-button');
					buttons.addClass('btn btn-sm').find('[class*="-icon"]').remove();//ui-icon, s-icon
					buttons.eq(0).addClass('btn-danger').prepend('<i class="icon-trash"></i>');
					buttons.eq(1).prepend('<i class="icon-remove"></i>')
				}
				
				function style_search_filters(form) {
					form.find('.delete-rule').val('X');
					form.find('.add-rule').addClass('btn btn-xs btn-primary');
					form.find('.add-group').addClass('btn btn-xs btn-success');
					form.find('.delete-group').addClass('btn btn-xs btn-danger');
				}
				function style_search_form(form) {
					var dialog = form.closest('.ui-jqdialog');
					var buttons = dialog.find('.EditTable')
					buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'icon-retweet');
					buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'icon-comment-alt');
					buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'icon-search');
				}
				
				function beforeDeleteCallback(e) {
					var form = $(e[0]);
					if(form.data('styled')) return false;
					
					form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
					style_delete_form(form);
					
					form.data('styled', true);
				}
				
				function beforeEditCallback(e) {
					var form = $(e[0]);
					form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
					style_edit_form(form);
				}
			
			
			
				//it causes some flicker when reloading or navigating grid
				//it may be possible to have some custom formatter to do this as the grid is being created to prevent this
				//or go back to default browser checkbox styles for the grid
				function styleCheckbox(table) {
				/**
					$(table).find('input:checkbox').addClass('ace')
					.wrap('<label />')
					.after('<span class="lbl align-top" />')
			
			
					$('.ui-jqgrid-labels th[id*="_cb"]:first-child')
					.find('input.cbox[type=checkbox]').addClass('ace')
					.wrap('<label />').after('<span class="lbl align-top" />');
				*/
				}
				
			
				//unlike navButtons icons, action icons in rows seem to be hard-coded
				//you can change them like this in here if you want
				function updateActionIcons(table) {
					/**
					var replacement = 
					{
						'ui-icon-pencil' : 'icon-pencil blue',
						'ui-icon-trash' : 'icon-trash red',
						'ui-icon-disk' : 'icon-ok green',
						'ui-icon-cancel' : 'icon-remove red'
					};
					$(table).find('.ui-pg-div span.ui-icon').each(function(){
						var icon = $(this);
						var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
						if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
					})
					*/
				}
				
				//replace icons with FontAwesome icons like above
				function updatePagerIcons(table) {
					var replacement = 
					{
						'ui-icon-seek-first' : 'icon-double-angle-left bigger-140',
						'ui-icon-seek-prev' : 'icon-angle-left bigger-140',
						'ui-icon-seek-next' : 'icon-angle-right bigger-140',
						'ui-icon-seek-end' : 'icon-double-angle-right bigger-140'
					};
					$('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
						var icon = $(this);
						var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
						
						if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
					})
				}
			
				function enableTooltips(table) {
					$('.navtable .ui-pg-button').tooltip({container:'body'});
					$(table).find('.ui-pg-div').tooltip({container:'body'});
				}
			
				//var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');
			
			
			});
		</script>
	</body>
</html>
