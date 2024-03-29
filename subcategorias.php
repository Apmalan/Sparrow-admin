<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>MyPHP | Home</title>

    <?php require_once("dist/css/css.php"); ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php require_once("layout/navBar.php"); ?>

        <?php require_once("layout/mainSideBar.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">


                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="m-0 text-dark">Subcategorias de eventos</h3><br>
                        </div><!-- /.col -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        </i>Nova subcategoria</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Nova subcategoria</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST">
                                                    <div class="modal-body">
                                                    <input type="hidden" name="acao" value="insert">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Nova subcategoria</label> 
                                                                    <input type="text" class="form-control" name="txtNomesubcategoria" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-primary">Salvar
                                                            mudanças</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-tools">
                                        <ul class="pagination pagination-sm float-right">
                                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">


                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Descrição</th>
                                                <th>Status</th>
                                                <th style="width: 40px">Açoes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <div class="modal fade" id="modalAlterar" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Alterar</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST">
                                                    <div class="modal-body">
                                                    <input type="hidden" name="acao" value="insert">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Alterar subcategoria</label> 
                                                                    <input type="text" class="form-control" name="txtAlterarNomesubcategoria" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-primary">Salvar
                                                            mudanças</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                            <?php 
                
                require_once realpath(dirname(__FILE__).'/src/models/subcategoriaModel.php');

                $listasubcategorias = subcategoriaModel::listarTodos();
                
                ($listasubcategorias);

                foreach ($listasubcategorias as $subcategoria){
                    ($categoria);
                    echo "<tr>
                         <td>" .$subcategoria['id_categoria']. "</td>
                         <td>".$subcategoria['nome']."</td>
                         <td>".$subcategoria['Status']."</td>
                         <td> 
                         <button class='btn btn-primary' data-toggle='modal' data-target='#modalAlterar'>
                         </i>Editar
                         </button></td>
                         </tr>";
                         
                }

                // if ($categoria['Status'] == 'ativo'){
                //     echo '<span class="badge badge-success">Ativo</span>' . $categoria['Status'] . '</span>';
                // }
                // else
                // {
                //     echo '<span class="badge badge-danger">Inativo</span>' . $categoria['Status'] . '</span>';
                // }

              ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>



                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php require_once("layout/controlSideBar.php"); ?>

    <?php require_once("layout/footer.php"); ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <?php require_once("dist/js/javascript.php"); ?>
</body>

</html>