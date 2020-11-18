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
    <a href="<?= base_url('admin/user'); ?>" class="btn btn-danger btn-sm">
        <i class="ace-icon fa fa-reply icon-only"></i> Back
    </a>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div id="user-profile-1" class="user-profile row">
            <form action="<?= base_url('admin/user/do_update'); ?>" id="form-karyawan" class="edit" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $record['ID']; ?>">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            <input type="file" name="image" id="image" class="dropify" data-default-file="<?= base_url(); ?>upload/avatars/<?= $record['photo']; ?>">
                        </span>

                        <div class="space-4"></div>
                        <div class="alert alert-info">Sentuh Untuk edit, Biarkan Jika tidak diedit !!</div>
                    </div>

                    <div class="space-6"></div>

                    <div class="hr hr12 dotted"></div>


                    <div class="hr hr16 dotted"></div>
                </div>

                <div class="col-xs-12 col-sm-9">

                    <div class="space-12"></div>


                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Username </div>

                            <div class="profile-info-value">
                                <input type="text" class="col-xs-10 col-sm-5" name="username" value="<?= $record['username']; ?>">
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Lengkap </div>

                            <div class="profile-info-value">
                                <input type="text" class="col-xs-10 col-sm-5" name="full_name" value="<?= $record['full_name']; ?>">
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Email </div>
                            <div class="profile-info-value">
                                <input type="text" class="col-xs-10 col-sm-5" name="email" value="<?= $record['email']; ?>">
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Telephone </div>

                            <div class="profile-info-value">
                                <input type="text" class="col-xs-10 col-sm-5" name="phone" value="<?= $record['phone']; ?>">
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Group </div>

                            <div class="profile-info-value">
                                <input type="text" class="col-xs-10 col-sm-5" name="group" value="<?= $record['group']; ?>">
                            </div>
                        </div>

                    </div>
                    <div class="space-8"></div>
                </div>
                <div class="col-xs-12 col-sm-8 align-right">
                    <button class="btn btn-primary">Submit
                        <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- <form action="" method="post" id="form-karyawan" class="tambah" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-12 col-sm-5">
            <div class="space"></div>

            <div class="form-group">
                <input type="file" name="image" id="image" class="dropify">
            </div>

        </div>

        <div class="col-xs-12 col-sm-7">

            <div class="space-4"></div>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" placeholder="Username" value="<?= $record['username']; ?>" />
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label for="full_name">Nama Lengkap</label>

                <div>
                    <input class="form-control" type="text" id="full_name" name="full_name" placeholder="Full Name" value="<?= $record['full_name']; ?>" />
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <div>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Email" value="<?= $record['email']; ?>" />
                </div>
            </div>

        </div>
        <div class="col-xs-8">
            <div class="form-group">
                <label for="group">Group</label>

                <div>
                    <input class="form-control" type="text" id="group" name="group" placeholder="Group" value="<?= $record['group']; ?>" />
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="form-group">
                <label for="phone">Phone</label>
                <div>
                    <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone" value="<?= $record['phone']; ?>" />
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="password">password</label>
                <div>
                    <input class="form-control" type="password" id="password" name="password" placeholder="password" />
                </div>
            </div>
        </div>


    </div>

    <div class="modal-footer">
        <button class="btn btn-sm" data-dismiss="modal">
            <i class="ace-icon fa fa-times"></i>
            Cancel
        </button>

        <button id="submit-karyawan" class="btn btn-sm btn-primary">
            <i class="ace-icon fa fa-check"></i>
            Save
        </button>
    </div>
</form> -->