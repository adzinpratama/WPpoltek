<div class="page-header">
    <h1>
        User
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Daftar User
        </small>
    </h1>
</div><!-- /.page-header -->
<!-- <?php echo $this->uri->segment(1); ?> -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="row">
            <div class="col-xs-12">
                <?= $this->session->flashdata('message'); ?>
                <a href="#modal-form" role="button" data-toggle="modal" class="act-btn">
                    <span class="glayphicon glyphicon-plus"></span>
                </a>
                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th class="detail-col">Details</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>
                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                Last Login
                            </th>
                            <th class="hidden-480">Status</th>

                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach ($user as $us) : ?>
                        <tbody id="table">
                            <tr>
                                <td class="center">
                                    <label class="pos-rel">
                                        <input type="checkbox" class="ace" value="<?= $us['ID']; ?>" />
                                        <span class="lbl"></span>
                                    </label>
                                </td>

                                <td class="center">
                                    <div class="action-buttons">
                                        <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                            <i class="ace-icon fa fa-angle-double-down"></i>
                                            <span class="sr-only">Details</span>
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <a href="#"><?= $us['username']; ?></a>
                                </td>
                                <td><?= $us['full_name']; ?></td>
                                <td><?= $us['last_login']; ?></td>

                                <td class="hidden-480">
                                    <span class="label label-sm label-warning"><?= $us['active']; ?></span>
                                </td>

                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="#edit?id=<?= $us['ID']; ?>" class="btn btn-xs btn-info">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </a>

                                        <a href="#hapus" id="hapus" data-id="<?= $us['ID']; ?>" class="btn btn-xs btn-danger">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </a>
                                    </div>

                                    <div class="hidden-md hidden-lg">
                                        <div class="inline pos-rel">
                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

                                                <li>
                                                    <a href="#edit?id=<?= $us['ID']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#hapus" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr class="detail-row">
                                <td colspan="8">
                                    <div class="table-detail">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-2">
                                                <div class="text-center">
                                                    <img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="<?= base_url(); ?>upload/avatars/<?= $us['photo'] ?>" />
                                                    <br />
                                                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                                        <div class="inline position-relative">
                                                            <a class="user-title-label" href="#">
                                                                <i class="ace-icon fa fa-circle light-green"></i>
                                                                &nbsp;
                                                                <span class="white"><?= $us['full_name']; ?></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-7">
                                                <div class="space visible-xs"></div>

                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Username </div>

                                                        <div class="profile-info-value">
                                                            <span><?= $us['username']; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Full Name </div>

                                                        <div class="profile-info-value">
                                                            <span><?= $us['full_name']; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Group </div>

                                                        <div class="profile-info-value">
                                                            <span><?= $us['group']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Email </div>

                                                        <div class="profile-info-value">
                                                            <span><?= $us['email']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Phone </div>

                                                        <div class="profile-info-value">
                                                            <span><?= $us['phone']; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Joined </div>

                                                        <div class="profile-info-value">
                                                            <span><?= $us['created_on']; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Last Online </div>

                                                        <div class="profile-info-value">
                                                            <span><?= $us['last_login']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div><!-- /.span -->
        </div><!-- /.row -->

        <div id="modal-form" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="blue bigger">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="form-karyawan" class="tambah" enctype="multipart/form-data">
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
                                        <input class="form-control" type="text" id="username" name="username" placeholder="Username" />
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label for="full_name">Nama Lengkap</label>

                                        <div>
                                            <input class="form-control" type="text" id="full_name" name="full_name" placeholder="Full Name" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>

                                        <div>
                                            <input class="form-control" type="email" id="email" name="email" placeholder="Email" />
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label for="group">Group</label>

                                        <div>
                                            <input class="form-control" type="text" id="group" name="group" placeholder="Group" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <div>
                                            <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone" />
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
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->