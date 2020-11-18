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
    <a href="<?= base_url('karyawan'); ?>" class="btn btn-danger btn-sm">
        <i class="ace-icon fa fa-reply icon-only"></i> Back
    </a>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <?php if ($this->uri->segment(2) == 'view') : ?>
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?= base_url(); ?>upload/avatars/<?= $record['photo']; ?>" />
                        </span>

                        <div class="space-4"></div>

                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                            <div class="inline position-relative">
                                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                    <i class="ace-icon fa fa-circle light-green"></i>
                                    &nbsp;
                                    <span class="white"><?= $record['name']; ?></span>
                                </a>

                                <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                                    <li class="dropdown-header"> Change Status </li>

                                    <li>
                                        <a href="#">
                                            <i class="ace-icon fa fa-circle green"></i>
                                            &nbsp;
                                            <span class="green">Available</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ace-icon fa fa-circle red"></i>
                                            &nbsp;
                                            <span class="red">Busy</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="ace-icon fa fa-circle grey"></i>
                                            &nbsp;
                                            <span class="grey">Invisible</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="space-6"></div>

                    <div class="hr hr12 dotted"></div>


                    <div class="hr hr16 dotted"></div>
                </div>

                <div class="col-xs-12 col-sm-9">

                    <div class="space-12"></div>

                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> NIP </div>

                            <div class="profile-info-value">
                                <span class="editable" id="nip"><?= $record['nip']; ?></span>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Lengkap </div>

                            <div class="profile-info-value">
                                <span class="editable" id="username"><?= $record['name']; ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Email </div>

                            <div class="profile-info-value">
                                <?= $record['email']; ?>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Telephone </div>

                            <div class="profile-info-value">
                                <span class="editable" id="age"><?= $record['phone']; ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Joined </div>

                            <div class="profile-info-value">
                                <span class="editable" id="signup"><?= $record['created_on']; ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="space-8"></div>
                    <div class="col-xs-12 col-md-9">
                        <a href="<?= base_url(); ?>karyawan/edit/<?= $record['ID']; ?>" id="submit-edit" class="btn btn-primary">
                            <i class="ace-icon fa fa-pencil bigger-110"></i>Edit</a>
                    </div>

                </div>
            </div>
        <?php elseif ($this->uri->segment(2) == 'edit') : ?>
            <div id="user-profile-1" class="user-profile row">
                <form action="" id="form-karyawan" class="edit" method="POST" enctype="multipart/form-data">
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
                                <div class="profile-info-name"> NIP </div>

                                <div class="profile-info-value">
                                    <input type="text" class="col-xs-10 col-sm-5" name="nip" value="<?= $record['nip']; ?>">
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Nama Lengkap </div>

                                <div class="profile-info-value">
                                    <input type="text" class="col-xs-10 col-sm-5" name="name" value="<?= $record['name']; ?>">
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

                        </div>
                        <div class="space-8"></div>
                    </div>
                    <div class="col-xs-12 col-sm-8 align-right">
                        <button id="submit-karyawan" class="btn btn-primary">Submit
                            <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i></button>
                    </div>
                </form>
            </div>


        <?php endif; ?>
    </div>
</div>
</div>