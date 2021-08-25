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
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th class="nosort">Set Device Time</th>
                        <th class="nosort">View</th>
                        <th class="nosort">History</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>#</th>
                        <th>Status</th>
                        <th>Device ID</th>
                        <th>Device Name</th>                        
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th class="nosort">Set Device Time</th>
                        <th class="nosort">View</th>
                        <th class="nosort">History</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php 
                        if (is_array($devices) && count($devices) > 0 ):
                            $count = 1;
                            foreach ($devices as $device) :
                    ?>
                    <tr>
                        <td><?= $count?></td>
                        <td>
                            <!-- Switch -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" <?= $device['status'] == 'active' ? 'checked':''?>>
                                <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                        </td>
                        <td><?= $device['device_id']?></td>
                        <td><?= $device['device_name']?></td>
                        <td><?= $device['customer_id']?></td>
                        <td class="nosort"><a href="<?= base_url('devices/edit/1')?>" class="btn btn-primary btn-sm"><i
                                    class="fas fa-edit"></i></a></td>
                    </tr>
                    <?php
                        $count++;
                            endforeach;
                        endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection()?>