<section class="section">
    <div class="section-header">
        <h1><?= $title ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('member/telegram') ?>" method="post">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Group</th>
                            <th>Status</th>
                            <th>PJH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($member as $m) { ?>
                            <tr>
                                <td align="center">
                                    <input type="hidden" name="id[]" id="id[]" value="<?= $m['sesepuh_id']; ?>">
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <input type="hidden" name="group[]" id="group[]" value="<?= $m['group_id']; ?>">
                                    <input type="hidden" name="name[]" id="name[]" value="<?= $m['name']; ?>">
                                    <?= $m['name'] ?>
                                </td>
                                <td>Team <?= $m['group_id'] ?></td>
                                <td align="center">
                                    <select name="check[]" class="form-control">
                                        <option value="0">Laporan</option>
                                        <option value="1">Tidak Laporan Sehari</option>
                                        <option value="2">Tidak laporan Dua hari</option>
                                        <option value="3">Tidak laporan Tiga hari</option>
                                    </select>
                                </td>
                                <td align="center">
                                    <input type="checkbox" value="<?= $m['name']; ?>" name="pjh[]">
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="<?= base_url('member') ?>" class="btn btn-danger mb-3 float-left">Back</a>
                <button type="submit" class="btn btn-primary mb-3 float-right">Send</button>
            </form>
        </div>
    </div>
</section>
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