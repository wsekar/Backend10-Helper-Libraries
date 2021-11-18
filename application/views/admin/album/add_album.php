<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <?php echo validation_errors() ?>
                        <a href="<?php echo site_url('admin/albums/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo site_url('admin/albums/add') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama_album">Nama Album</label>
                                <input class="form-control <?php echo form_error('nama_album') ? 'is-invalid' : '' ?>" type="text" name="nama_album" placeholder="Nama Album" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama_album') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_rilis">Tanggal Rilis</label>
                                <input class="form-control <?php echo form_error('tanggal_rilis') ? 'is-invalid' : '' ?>" type="date" name="tanggal_rilis" placeholder="Tanggal Rilis" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tanggal_rilis') ?>
                                </div>
                            </div>






                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                        </form>

                    </div>

                    <div class="card-footer small text-muted">
                        * required fields
                    </div>


                </div>
                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <?php $this->load->view("admin/_partials/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->


        <?php $this->load->view("admin/_partials/scrolltop.php") ?>

        <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>