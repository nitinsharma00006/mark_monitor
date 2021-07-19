<?= $this->extend('templates/base')?>
<?= $this->section('content')?>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Device ID</th>
                        <th>Customer</th>
                        <th>ON Time</th>
                        <th>OFF Time</th>
                        <th class="nosort">Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Device ID</th>
                        <th>Customer</th>
                        <th>ON Time</th>
                        <th>OFF Time</th>
                        <th class="nosort">Edit</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Device1</td>
                        <td>Excide</td>
                        <td>09:30 PM</td>
                        <td>07:00 AM</td>
                        <td class="nosort"><a href="<?= base_url('devices/edit/1')?>" class="btn btn-primary btn-sm"><i
                                    class="fas fa-edit"></i></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Device2</td>
                        <td>Asus</td>
                        <td>07:30 PM</td>
                        <td>06:00 AM</td>
                        <td class="nosort"><a href="<?= base_url('devices/edit/1')?>" class="btn btn-primary btn-sm"><i
                                    class="fas fa-edit"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection()?>