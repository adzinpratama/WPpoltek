<div class="page-header">
    <h1>
        Karyawan
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Daftar Karyawan
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <a href="#modal-form" role="button" data-toggle="modal" class="act-btn">
            <span class="glayphicon glyphicon-plus"></span>
        </a>
        <!-- <a href="#" class="act-btn delete">
            <span class="fa fa-trash"></span>
        </a> -->
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nip </th>
                    <th>Nama</th>
                    <th class="hidden-480">Email</th>

                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($record as $data) { ?>
                    <tr>
                        <td><?= $data->nip; ?></td>
                        <td class="hidden-480"><?= $data->name; ?></td>
                        <td><?= $data->email; ?></td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="#">
                                    <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                </a>

                                <a class="green" href="#">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="#">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>

                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                <span class="blue">
                                                    <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
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
                <?php } ?>
            </tbody>

        </table>
        <div id="modal-form" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="blue bigger">Tambah Data</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form-karyawan" method="post" enctype="multipart/form-data">
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
                                        <label for="username">Nip</label>
                                        <input class="form-control" type="text" id="nip" name="nip" placeholder="Nip" />
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


                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <div>
                                            <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone" />
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

    </div>
</div>