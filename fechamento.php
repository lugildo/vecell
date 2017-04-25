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
		
		<link rel="stylesheet" href="../assets/css/daterangepicker.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.full.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/ui.jqgrid.css" />

		<style> 
			.datepicker {
				z-index: 99999 !important;
			}
		</style>

		<!-- fonts -->

		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />

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
								<li>
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
										<li>
											<a href="conveniada.php">
												<i class="icon-double-angle-right"></i>
												Conveniada
											</a>
										</li>
										<li>
											<a href="#" class="dropdown-toggle">
												<i class="icon-double-angle-right"></i>

												Comercial 
												<b class="arrow icon-angle-down"></b>
											</a>

											<ul class="submenu">
												<li>
													<a href="produtos.php">
														<i class="icon-double-angle-right"></i>
														Produtos
													</a>
												</li>

												<li>
													<a href="incidencias.php">
														<i class="icon-double-angle-right"></i>
														Incidencias
													</a>
												</li>
												<li>
													<a href="regras.php">
														<i class="icon-double-angle-right"></i>
														Regras
													</a>
												</li>
												
											</ul>
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
								<li class="active open">
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
										<li class="active">
											<a href="#modal-form" role="button" class="blue" data-toggle="modal"> 
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
								<a href="#">Associações</a>
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
								Relatório
								<small>
									<i class="icon-double-angle-right"></i>
									Fechamento
								</small>
							</h1><br>
							
						</div><!-- /.page-header -->
						<button id="novaconsulta" type="button" class="btn btn-sm btn-default" style="display:none">Nova Consulta</button>
						<div id="loading" style="display: none;"><img src="/assets/img/loading.gif"/>Carregando...</div>
						<div id="filtros">
							<form id="report">
								<div class="col-xs-3">
								
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-calendar"></i>
											<i>Dia de corte:</i>
										</span>
										<select  id="sDiaCorte" placeholder="Dia">
											<option value="">Dia de corte</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-calendar"></i>
											<i>Mês:</i>
										</span>
										<select  id="sMesComp" placeholder="Mês">
											<option value="">Mês</option>
											<option value="1">Janeiro</option>
											<option value="2">Fevereiro</option>
											<option value="3">Março</option>
											<option value="4">Abril</option>
											<option value="5">Maio</option>
											<option value="6">Junho</option>
											<option value="7">Julho</option>
											<option value="8">Agosto</option>
											<option value="9">Setembro</option>
											<option value="10">Outubro</option>
											<option value="11">Novembro</option>
											<option value="12">Dezembro</option>
										</select>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-calendar"></i>
											<i>Ano:</i>
										</span>
										<select  id="sAno" placeholder="Ano">
											<option value="">Ano</option>
											<option value="2014">2014</option>
											<option value="2015">2015</option>
											<option value="2016">2016</option>
											<option value="2017" selected>2017</option>
										</select>
									</div>
								</div>
								<div class="col-xs-5">
									<span>Lojas:</span>
									<select  id="lojasproprias">
										<option value="sim">Sim</option>
										<option value="nao">Não</option>
									</select>
									<span>Bloq.:</span>
									<select  id="bloqueados">
										<option value="sim">Sim</option>
										<option value="nao">Não</option>
									</select>
									<span>Resc.:</span>
									<select  id="rescindidos">
										<option value="sim">Sim</option>
										<option value="nao">Não</option>
									</select>
								</div>
									
								<div class="col-xs-12">
									<select id="iAssociacao">
										<option>Associação</option>
									</select>
									
									<button class="btn btn-sm btn-default" type="button" id="sGerar">
										Gerar!
									</button>
									<button id="gerar-excel" type="button" class="btn btn-sm btn-default">Gerar Excel</button>
									<div id="loading" style="display: none;"><img src="/assets/img/loading.gif"/>Carregando...</div>
								</div>
									
								
							</form>
						</div>
						<div class="row">
						<!-- PAGE CONTENT BEGINS -->
							
							
							<div id="modal-excel" class="modal fade" role="dialog">
								  <div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Exportar para EXCEL</h4>
									  </div>
									  <div class="modal-body">
									    <p>Confirma exportação dos dados para Excel?</p>
										<button id="gerar-excel" type="button" class="btn btn-default">Gerar arquivo</button>
										
									    <div id="loading" style="display: none;"><img src="/assets/img/loading.gif"/>Carregando...</div>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

									  </div>
									</div>

								  </div>
							</div>
							<div id="modal-csv" class="modal fade" role="dialog">
								  <div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Exportar para CSV</h4>
									  </div>
									  <div class="modal-body">
										<p>Some text in the modal.</p>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									  </div>
									</div>

								  </div>
							</div>
							
							<table id="grid-table"></table>

							<div id="grid-pager"></div>
							<!-- PAGE CONTENT ENDS -->
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
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->
		
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jqGrid/i18n/grid.locale-en.js"></script>
		
		<script src="assets/js/date-time/moment.min.js"></script>
		<script src="assets/js/date-time/daterangepicker.min.js"></script>
		<script src="assets/js/jqGrid/jquery.jqGrid.min.js"></script>
		<script src="assets/js/jqGrid/i18n/grid.locale-pt-br.js"></script>
		

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/bootstrap-select.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		
		$('#novaconsulta').click(function(){
			$('#report')[0].reset();			
			location.reload();
		});
		
		$('#gerar-excel').click(function(){	
			$('#filtros').hide();
			$('#novaconsulta').show();
			var sDiaCorte = $('#sDiaCorte').val();
			var sMesComp = $('#sMesComp').val();
			var sAno = $('#sAno').val();
			$("#loading").show();
			var iAssociacao = $('#iAssociacao').val();
			var sLojasProprias = $('#lojasproprias').val();
			var sBloqueados = $('#bloqueados').val();
			var sRescindidos = $('#rescindidos').val();
				
			$.ajax({
				type:'POST',
				url:"http://104.236.0.195/PHPExcel/Examples/30template.php?sTipo=analitico&sDiaCorte="+sDiaCorte+"&sAno="+sAno+"&sRescindidos="+sRescindidos+"&sBloqueados="+sBloqueados+"&sLojasProprias="+sLojasProprias+"&sMesComp="+sMesComp+"&iAssociacao="+iAssociacao,
				data: {},
				dataType:'json'
			}).done(function(data){
				var $a = $("<a>");
				$a.attr("href",data.file);
				$("body").append($a);
				$a.attr("download","fechamento.xls");
				$a[0].click();
				$a.remove();
				$('#modal-excel').modal('hide');
				$("#loading").hide();
			});
		});
		
		$('#sDiaCorte').change(function(){	
			sDiaCorte = $('#sDiaCorte').val();
			<!-- Carrega associações -->
			$('#iAssociacao').ready(function(e){
				var option = '<option>Aguarde carregando dados...</option>';
					$('#iAssociacao').html(option).show();
				$.getJSON('http://104.236.0.195/load.combo.associacoes.php?lookup=associacoes&sdiacorte='+sDiaCorte, function (dados){
					
				   if (dados.length > 0){ 	
					  var option = '<option>Selecione a Associação</option>';
					  $.each(dados, function(i, obj){
						  option += '<option value="'+obj.PK_Codigo+'">'+obj.Sigla+'</option>';
					  })
					  $('#iAssociacao').html(option).show();
					  //console.log(option);
				   }else{
					   var option = '<option>Não há Associações com fechamento no dia '+sDiaCorte+' </option>';
					   $('#iAssociacao').html(option).show();
					   //$('#mensagem').html('<span class="mensagem">Não foram encontradas Associações!</span>');
				   }
				})
			})
		
			
		});
		$('#sGerar').click(function() {
			if( ($('#sDiaCorte').val() > 0) && ($('#sMesComp').val() > 0) && ($('#sAno').val() > 0)  && ($('#iAssociacao').val() > 0)) {
				$('#filtros').hide();
				$('#novaconsulta').show();
				var sDiaCorte = $('#sDiaCorte').val();
				var sMesComp = $('#sMesComp').val();
				var sAno = $('#sAno').val();
				var iAssociacao = $('#iAssociacao').val();
				var sLojasProprias = $('#lojasproprias').val();
				var sBloqueados = $('#bloqueados').val();
				var sRescindidos = $('#rescindidos').val();
				//inicio grid
				jQuery(function($) {
					var grid_selector = "#grid-table";
					var pager_selector = "#grid-pager";
					
					jQuery(grid_selector).jqGrid({
						
						url:'http://104.236.0.195/show_relatorios.php?sConveniada=0&sTipo=analitico&sDiaCorte='+sDiaCorte+'&sAno='+sAno+"&sRescindidos="+sRescindidos+"&sBloqueados="+sBloqueados+'&sLojasProprias='+sLojasProprias+'&sMesComp='+sMesComp+'&iAssociacao='+iAssociacao,
						datatype: "json",
						height: 250,
						colNames:['Associado','Matricula', 'Limite', 'Dt. Compra', 'Conveniada', 'Dt. Parcela', 'Cod. Liberação', 'Parcela', 'Valor Parcela'],
						colModel:[
							{name:'associado',index:'associado', key:true, width:150, editable: true,
							formoptions: {
								colpos: 1, // the position of the column
								rowpos: 2, // the position of the row
								label: "Associado: " // the label to show for each input control                    
								//elmsuffix: " * " // the suffix to show after that
							}},
							{name:'matricula',index:'matricula', width:50, editable: true,editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
							formoptions: {
								colpos: 1, // the position of the column
								rowpos: 3, // the position of the row
								label: "Matricula: " // the label to show for each input control                    
								//elmsuffix: " * " // the suffix to show after that
							}},
							{name:'limite',index:'limite', width:90, editable: true,editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
							formoptions: {
								colpos: 1, // the position of the column
								rowpos: 4, // the position of the row
								label: "Limite: " // the label to show for each input control                    
								//elmsuffix: " * " // the suffix to show after that
							}},
							{name:'datacompra',index:'datacompra', width:90, editable: true,editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
							formoptions: {
								colpos: 1, // the position of the column
								rowpos: 5, // the position of the row
								label: "Data da compra: " // the label to show for each input control                    
								//elmsuffix: " * " // the suffix to show after that
							}},
							{name:'conveniada',index:'datacompra', width:90, editable: true,editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
							formoptions: {
								colpos: 1, // the position of the column
								rowpos: 6, // the position of the row
								label: "Conveniada: " // the label to show for each input control                    
								//elmsuffix: " * " // the suffix to show after that
							}},
							{name:'dataparcela',index:'dataparcela', width:90, editable: true,editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
							formoptions: {
								colpos: 1, // the position of the column
								rowpos: 7, // the position of the row
								label: "Data parcela: " // the label to show for each input control                    
								//elmsuffix: " * " // the suffix to show after that
							}},
							{name:'codigoliberacao',index:'codigoliberacao', width:90, editable: true,editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
							formoptions: {
								colpos: 1, // the position of the column
								rowpos: 8, // the position of the row
								label: "Código de liberação: " // the label to show for each input control                    
								//elmsuffix: " * " // the suffix to show after that
							}},
							{name:'numeroparcela',index:'numeroparcela', width:90, editable: true,editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
							formoptions: {
								colpos: 1, // the position of the column
								rowpos: 9, // the position of the row
								label: "Parcela: " // the label to show for each input control                    
								//elmsuffix: " * " // the suffix to show after that
							}},
							{name:'valorparcela',index:'valorparcela', width:90, editable: true,editrules: {edithidden:true} ,editoptions:{size:"40",maxlength:"90"},
							formoptions: {
								colpos: 1, // the position of the column
								rowpos: 10, // the position of the row
								label: "Valor da parcela: " // the label to show for each input control                    
								//elmsuffix: " * " // the suffix to show after that
							}}
						], 
						
						jsonReader: {
								repeatitems: false,
								root: function(obj) { return obj; },
								page: function(obj) { return 1; },
								total: function(obj) { return 1; },
								records: function(obj) { return obj.length; }
							},
						loadonce: true,
						pager: pager_selector,
						rowNum: 100,
						rowList: [5, 10, 20, 50, 100, 200],
						viewrecords: true,
						toppager: false,
						
						multiselect: false,
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
						
						editurl: 'http://104.236.0.195/crud_produtos.php',//nothing is saved
				
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
				
					//navButtons
					jQuery(grid_selector).jqGrid('navGrid',pager_selector,
						{ 	//navbar options
							edit: false,
							editicon : 'icon-pencil blue',
							add: false,
							addicon : 'icon-plus-sign purple',
							del: false,
							delicon : 'icon-trash red',
							search: false,
							searchicon : 'icon-search orange',
							refresh: false,
							refreshicon : 'icon-refresh green',
							view: true,
							viewicon : 'icon-zoom-in grey',
							refresh:false,
						},
						{
							//edit record form
							//closeAfterEdit: true,
							height: 'auto',
							width: 1024,
							editCaption: "Alterar dados do produto",
							recreateForm: true,
							closeAfterEdit: true,
							beforeShowForm : function(e) {
								var form = $(e[0]);
								form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header"/>')
								style_edit_form(form);
							}
						},
						{
							//new record form
							height: 'auto',
							width: 1024,
							addCaption: "Cadastrar produto",
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
							delCaption: "Excluir produto",
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
							height: 'auto',
							width: 800,
							viewCaption: "Visualizar dados do produto",
							recreateForm: true,
							beforeShowForm: function(e){
								var form = $(e[0]);
								form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
							}
						}
					)
				
					$("#grid-table").navButtonAdd('#grid-pager', {
					  caption: "EXCEL",
					  title: "EXCEL",
					  buttonicon: "ui-icon-wrench",
					  onClickButton: function() {
						  
						  $('#modal-excel').modal('show');
						 // perform something...
					  },
					  position: "past"
					});
					$("#grid-table").navButtonAdd('#grid-pager', {
					  caption: "CSV",
					  title: "CSV",
					  buttonicon: "ui-icon-wrench",
					  onClickButton: function() {
						  
						  $('#modal-csv').modal('show');
						 // perform something...
					  },
					  position: "past"
					});
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
				//fim grid
			} else {
				alert('Por favor, preencha todos os campos para gerar o relatório de fechamento');
			}
			
		});
		
		
		</script>
	</body>
</html>