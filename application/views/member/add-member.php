<section class="section">
    <div class="section-header">
        <h1><?= $title ?></h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#add-book">Add New Book</a>
                <div class="card-header">
                    <h4>Daftar Sahahabat SESEPUH ID</h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>ID SESEPUH</th>
                                    <th>Rank</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($member as $m) { ?>
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td><?= $no++ ?></td>
                                        <td><?= $m['date_buy'] ?></td>
                                        <td><?= $m['author'] ?></td>
                                        <td><?= $m['title'] ?></td>
                                        <td>
                                            <a href="#" data-id="<?= $m['id']; ?>" data-target="#edit-member" data-toggle="modal" class="badge badge-success btn-edit">Edit</a>
                                            <a href="<?= base_url('member/delete/') . $m['id'] ?>" onclick="return myFunction()" class="badge badge-danger">delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.container-fluid -->
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="add-book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('book/add') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal Beli</label>
                        <input type="date" class="form-control" id="date_buy" name="date_buy">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Penulis</label>
                        <input type="text" class="form-control" name="author" id="author">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Judul</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Publisher</label>
                        <input type="text" class="form-control" name="publisher" id="publisher">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tahun</label>
                        <input type="text" class="form-control" name="years" id="years">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ISBN</label>
                        <input type="text" class="form-control" name="isbn" id="isbn">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jumlah</label>
                        <input type="text" class="form-control" name="qty" id="qty">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Deskcripsi</label>
                        <textarea name="descrip" id="descrip" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/') ?>js/jquery-3.3.1.min.js"></script>
<script>
    function myFunction() {
        return confirm('Apakah anda yakin akan menghapus ?');
    }

    $('.btn-edit').on('click', function() {
        const id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('member/editMember/') ?>" + id,
            type: "post",
            dataType: 'JSON',
            success: function(data) {
                $('#email').val(data.email);
                $('#name').val(data.name);
                $('#role').val(data.role_id);
            }
        })
    });
</script>