<?php
#Agregar los select de las llaves foráneas

namespace App\View\EnterpriseGroup;
defined("APPPATH") OR die("Access denied");

use \App\data\DataGridView as DGV;
		
		if (isset($_SESSION['loggedin']) & $_SESSION['loggedin'] == true){}
		else{
				echo "Esta pagina es solo para usuarios registrados.<br>";
			echo "<a href='" . $url . "'>Login Here!</a>";
			exit;
		}
		$now = time(); 
		if($now > $_SESSION['expire']){
		session_destroy();
		echo "Su sesion a terminado, <a href='" . $url . "'>
			  Necesita Hacer Login</a>";
		exit;
		}
		$outputTableCompany=DGV::getInstance($dt_Company)
		->setGridAttributes(array('class' => 'table table-striped table-bordered table-hover dataTables-example'))
		->enableSorting(false)
		->removeColumn('pkiBUser')
		->removeColumn('pkCompany')
		->removeColumn('pkSubCompany')
		->removeColumn('pkBranchOffice')
		->setup(array(
			'username' => array('header' => 'Usuario'),
			'realname' => array('header' => 'Nombre del usuario'),
			'BOName' => array('header' => 'Sucursal'),
			'Name' => array('header' => 'Perfil asignado')
		))
		->addColumnAfter('actions', 
									'<a href="'.$url.'private/User/showProfile">Ver Perfil</a>',
									'Actions', array('align' => 'center'))
		//->addColumnBefore('counter', '%counter%.', 'Counter', array('align' => 'right'))
		//->setStartingCounter(1)
		//->setRowClass('')
		//->setAlterRowClass('alterRow');
		
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>iBrain 2.0</title>
	<!-- Mainly CSS -->
    <link href="<?php echo $url; ?>/App/web/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/App/web/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo $url; ?>/App/web/css/animate.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/App/web/css/style.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo $url; ?>/App/web/css/plugins/iCheck/custom.css" rel="stylesheet">
	<!-- Wizard CSS -->
    <link href="<?php echo $url; ?>/App/web/css/plugins/steps/jquery.steps.css" rel="stylesheet">
	<!-- dataTable CSS-->
    <link href="<?php echo $url; ?>/App/web/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
	
</head>
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
			<div class="row wrapper border-bottom white-bg">
			<nav class="navbar navbar-static-top" role="navigation">
				<div class="navbar-header">
					<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
					<i class="fa fa-reorder"></i>
					</button>
					<a href="<?php echo $url; ?>private/home" class="navbar-brand">Inicio</a>
					</div>
					<div class="navbar-collapse collapse" id="navbar">
					<ul class="nav navbar-nav">
						<?php print_r($currentMainMenu);?>
					</ul>
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<a href="<?php echo $url; ?>private/logout">Salir</a>
						</li>
					</ul>
				</div>
			</nav>
			</div>
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-sm-4">
				<h2>Usuarios</h2>
					<ol class="breadcrumb">
						<li>
							<a href="<?php echo $url; ?>private/home">Inicio</a>
						</li
						><li>
							<a href="<?php echo $url; ?>private/EnterpriseGroup/showCompany">Cuentas maeastras</a>
						</li>
						<li class="active">
							<a href="<?php echo $url; ?>private/EnterpriseGroup/showSubcompany">Sub cuentas maeastras</a>
						</li>
						<li class="active">
							<a href="<?php echo $url; ?>private/EnterpriseGroup/showBranchOffice">AASP</a>
						</li>
						<li class="active">
							<strong>Usuario</strong>
						</li>
					</ol>
				</div>
			</div>	
			<div class="wrapper wrapper-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Cuenta maestra</h5>
									<div class="ibox-tools">
										<a class="collapse-link">
											<i class="fa fa-chevron-up"></i>
										</a>
										<a class="close-link">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="ibox-content">					
								<div class="pull-right">
									<a onclick="" href="<?php echo $url; ?>private/User/addUser" class="btn btn-primary btn-lg btn-block">Nuevo usuario</a>
								</div>
								<br />
								<br />
								<br />
									<div class="table-responsive">
									<?php $outputTableCompany->render();?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="pull-right">
				</div>
				<div>
					<strong>Copyright</strong> Example Company © 2014-2015
				</div>
			</div>
		</div>
    </div>



    <!-- Mainly scripts -->
    <script src="<?php echo $url; ?>/App/web/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $url; ?>/App/web/js/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>/App/web/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $url; ?>/App/web/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	
	
    <!-- Custom and plugin javascript -->
    <script src="<?php echo $url; ?>/App/web/js/inspinia.js"></script>
    <script src="<?php echo $url; ?>/App/web/js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="<?php echo $url; ?>/App/web/js/plugins/staps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo $url; ?>/App/web/js/plugins/validate/jquery.validate.min.js"></script>

	<!-- dataTables-->
	<script src="<?php echo $url; ?>/App/web/js/plugins/dataTables/datatables.min.js"></script>
	<script src="<?php echo $url; ?>/App/web/js/plugins/jeditable/jquery.jeditable.js"></script>
	
   <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ],
                language : {
						buttons : {
								copy : 'Copiar',
								print : 'Imprimir'
						}
				},
				"language" : {
						"lengthMenu": "Mostrar _MENU_ registros por p&aacute;gina",
						"zeroRecords": "No se encontraron registros.",
						"info": "Mostrando p&aacute;gina _PAGE_ de _PAGES_",
						"infoEmpty": "No registros disponibles",
						"infoFiltered": "(filtrado desde _MAX_ registros totales)",
						"search":         "Buscar:",
						"paginate": {
						"first":      "Primero",
						"last":       "&Uacute;ltimo",
						"next":       "Siguiente",
						"previous":   "Anterior"
						}
				}

            });
			
			$.ajax({
				url: '',
				type: 'post',
				data:{tag:'getCompany'},
				dataType:'json',
				succes: function (data){
					if (data.succes){
						$.each(data,function (index,record ){
						})
					}
				}
			});
            
			
			
			
			
			
			/* Init DataTables */
            var oTable = $('#AddTD').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
</body>
</html>