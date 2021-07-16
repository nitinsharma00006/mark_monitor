<?= $this->extend('templates/base')?>
<?= $this->section('content')?>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Device ID</th>
                        <th>Device Name</th>
                        <th>Customer</th>
                        <th class="nosort">Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Device ID</th>
                        <th>Device Name</th>
                        <th>Customer</th>
                        <th class="nosort">Edit</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <!-- Switch -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                        </td>
                        <td>211111</td>
                        <td>Excide</td>
                        <td>admin@exide.com</td>
                        <td class="nosort"><a href="<?= base_url('devices/edit/1')?>" class="btn btn-primary btn-sm"><i
                                    class="fas fa-edit"></i></a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <!-- Switch -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2"></label>
                            </div>
                        </td>
                        <td>211111</td>
                        <td>Excide</td>
                        <td>9999999999</td>
                        <td class="nosort"><a href="<?= base_url('devices/edit/1')?>" class="btn btn-primary btn-sm"><i
                                    class="fas fa-edit"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection()?>