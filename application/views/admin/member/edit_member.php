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

                <!-- Card  -->
                <div class="card mb-3">
                    <div class="card-header">

                        <a href="<?php echo site_url('admin/members/') ?>"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

                            <input type="hidden" name="id" value="<?php echo $member->id_member ?>" />

                            <div class="form-group">
                                <label for="nama_asli">Nama Asli</label>
                                <input class="form-control <?php echo form_error('nama_asli') ? 'is-invalid' : '' ?>" type="text" name="nama_asli" placeholder="Nama Asli" value="<?php echo $member->nama_asli ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama_asli') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_panggung">Nama Panggung</label>
                                <input class="form-control <?php echo form_error('nama_panggung') ? 'is-invalid' : '' ?>" type="text" name="nama_panggung" placeholder="Nama Panggung" value="<?php echo $member->nama_panggung ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama_panggung') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input class="form-control <?php echo form_error('tanggal_lahir') ? 'is-invalid' : '' ?>" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $member->tanggal_lahir ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('tanggal_lahir') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sub_unit">Sub Unit</label>
                                <input class="form-control <?php echo form_error('sub_unit') ? 'is-invalid' : '' ?>" type="text" name="sub_unit" placeholder="Sub Unit" value="<?php echo $member->sub_unit ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('sub_unit') ?>
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