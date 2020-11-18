<div class="page-header">
    <h1>
        Karyawan
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Edit Karyawan
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="pull-right">
    <a href="<?= base_url('admin/karyawan'); ?>" class="btn btn-danger btn-sm">
        <i class="ace-icon fa fa-reply icon-only"></i> Back
    </a>
</div>

<form action="<?= base_url('admin/karyawan/do_update'); ?>" id="form-karyawan" class="edit" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $record['ID']; ?>">
    <div class="row">
        <div class="col-xs-12 col-sm-5">
            <div class="space"></div>

            <div class="form-group">
                <input type="file" name="image" id="image" class="dropify" data-default-file="<?= base_url(); ?>upload/avatars/<?= $record['photo']; ?>">
            </div>
            <div class="alert alert-info">Sentuh Untuk edit, Biarkan Jika tidak diedit !!</div>

        </div>

        <div class="col-xs-12 col-sm-7">

            <div class="space-4"></div>

            <div class="form-group">
                <label for="username">Nip</label>
                <input class="form-control" type="text" id="nip" name="nip" value="<?= $record['nip']; ?>" />
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label for="full_name">Nama Lengkap</label>

                <div>
                    <input class="form-control" type="text" id="full_name" name="full_name" value="<?= $record['name']; ?>" />
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <div>
                    <input class="form-control" type="email" id="email" name="email" value="<?= $record['email']; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <div>
                    <input class="form-control" type="text" id="phone" name="phone" value="<?= $record['phone']; ?>" />
                </div>
            </div>

        </div>



    </div>

    <div class="modal-footer">
        <button class="btn btn-sm btn-primary">
            <i class="ace-icon fa fa-check"></i>
            Save
        </button>
    </div>
</form>