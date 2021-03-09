<?php include_once "includes/header.php"; ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Configuración</h1>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Información Personal
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nombre: <strong><?php echo $_SESSION['nombre']; ?></strong></label>
                    </div>
                    <div class="form-group">
                        <label>Correo: <strong><?php echo $_SESSION['email']; ?></strong></label>
                    </div>
                    <div class="form-group">
                        <label>Rol: <strong><?php echo $_SESSION['rol_name']; ?></strong></label>
                    </div>
                    <div class="form-group">
                        <label>Usuario: <strong><?php echo $_SESSION['user']; ?></strong></label>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item active">Cambiar Contraseña</li>
                        <form action="" method=" post" name="frmChangePass" id="frmChangePass" class="p-3">
                            <div class="form-group">
                                <label>Contraseña Actual</label>
                                <input type="password" name="actual" id="actual" placeholder="Clave Actual" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nueva Contraseña</label>
                                <input type="password" name="nueva" id="nueva" placeholder="Nueva Clave" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirmar Contraseña</label>
                                <input type="password" name="confirmar" id="confirmar" placeholder="Confirmar clave" required class="form-control">
                            </div>
                            <div class="alertChangePass" style="display:none;">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btnChangePass">Cambiar Contraseña</button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <?php if ($_SESSION['rol'] == 1) { ?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Datos de la Empresa
                    </div>
                    <div class="card-body">
                        <form action="empresa.php" method="post" id="frmEmpresa" class="p-3">
                            <div class="form-group">
                                <label>Ruc:</label>
                                <input type="number" name="txtDni" value="<?php echo $dni; ?>" id="txtDni" placeholder="Dni de la Empresa" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" name="txtNombre" class="form-control" value="<?php echo $nombre_empresa; ?>" id="txtNombre" placeholder="Nombre de la Empresa" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Razon Social:</label>
                                <input type="text" name="txtRSocial" class="form-control" value="<?php echo $razonSocial; ?>" id="txtRSocial" placeholder="Razon Social de la Empresa">
                            </div>
                            <div class="form-group">
                                <label>Teléfono:</label>
                                <input type="number" name="txtTelEmpresa" class="form-control" value="<?php echo $telEmpresa; ?>" id="txtTelEmpresa" placeholder="teléfono de la Empresa" required>
                            </div>
                            <div class="form-group">
                                <label>Correo Electrónico:</label>
                                <input type="email" name="txtEmailEmpresa" class="form-control" value="<?php echo $emailEmpresa; ?>" id="txtEmailEmpresa" placeholder="Correo de la Empresa" required>
                            </div>
                            <div class="form-group">
                                <label>Dirección:</label>
                                <input type="text" name="txtDirEmpresa" class="form-control" value="<?php echo $dirEmpresa; ?>" id="txtDirEmpresa" placeholder="Dirreción de la Empresa" required>
                            </div>
                            <?php echo isset($alert) ? $alert : ''; ?>
                            <div>
                                <button type="submit" class="btn btn-primary btnChangePass"><i class="fas fa-save"></i> Guardar Datos</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Datos de la Empresa
                    </div>
                    <div class="card-body">
                        <div class="p-3">
                            <div class="form-group">
                                <strong>Ruc:</strong>
                                <h6><?php echo $dni; ?></h6>
                            </div>
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                <h6><?php echo $nombre_empresa; ?></h6>
                            </div>
                            <div class="form-group">
                                <strong>Razon Social:</strong>
                                <h6><?php echo $razonSocial; ?></h6>
                            </div>
                            <div class="form-group">
                                <strong>Teléfono:</strong>
                                <?php echo $telEmpresa; ?>
                            </div>
                            <div class="form-group">
                                <strong>Correo Electrónico:</strong>
                                <h6><?php echo $emailEmpresa; ?></h6>
                            </div>
                            <div class="form-group">
                                <strong>Dirección:</strong>
                                <h6><?php echo $dirEmpresa; ?></h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>