<section class="section">
    <div class="section-header">
        <h1><?= $title ?></h1>
    </div>
    <div class="row">
        <div class="col-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#add-member">Add New Member</a>
                <div class="card-header">
                    <h4>Daftar Sahahabat SESEPUH</h4>
                    <!-- <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th> -->
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>ID Sesepuh</th>
                                    <th>Group</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($member as $m) { ?>
                                    <tr>
                                        <!-- <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td> -->
                                        <td><?= $no++ ?></td>
                                        <td><?= $m['name'] ?></td>
                                        <td><?= $m['sesepuh_id'] ?></td>
                                        <td><?= $m['group_id'] ?></td>
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
<!-- Modal add member -->
<div class="modal fade" id="add-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('member/addMember') ?>" class="needs-validation" novalidate="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ID SESEPUH</label>
                        <input type="text" class="form-control" name="sesepuh_id" id="sesepuh_id">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Group</label>
                        <select name="group_id" id="group_id" class="form-control">
                            <option value="">Selecet Group</option>
                            <option value="1">1 (satu)</option>
                            <option value="2">2 (dua)</option>
                            <option value="3">3 (tiga)</option>
                            <option value="4">4 (empat)</option>
                            <option value="5">5 (lima)</option>
                            <option value="6">6 (enam)</option>
                        </select>
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

<!-- modal edit member -->
<div class="modal fade" id="edit-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('member/updateMember') ?>" class="needs-validation" novalidate="" method="post">
                <input type="hidden" name="id-member" id="id-member">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="edit-name" name="edit-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ID SESEPUH</label>
                        <input type="text" class="form-control" name="edit-sesepuh_id" id="edit-sesepuh_id">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Group</label>
                        <select name="edit-group_id" id="edit-group_id" class="form-control">
                            <option value="">Selecet Group</option>
                            <option value="1">1 (satu)</option>
                            <option value="2">2 (dua)</option>
                            <option value="3">3 (tiga)</option>
                            <option value="4">4 (empat)</option>
                            <option value="5">5 (lima)</option>
                            <option value="6">6 (enam)</option>
                        </select>
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
            url: "<?= base_url('member/edit_member/') ?>" + id,
            type: "post",
            dataType: 'JSON',
            success: function(data) {
                $('#id-member').val(data.id);
                $('#edit-name').val(data.name);
                $('#edit-sesepuh_id').val(data.sesepuh_id);
                $('#edit-group_id').val(data.group_id);
            }
        })
    });
</script>