<?= $this->extend('templates/base')?>

<?= $this->section('content')?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Zone</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Email ID</th>
                        <th>Mobile</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Zone</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Email ID</th>
                        <th>Mobile</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php 
                        if(is_array($customer) && count($customer)>0):
                            $count = 1;
                            foreach ($customer as $cust) :
                    ?>

                    <tr>
                        <td><?= $count ?></td>
                        <td>
                            <!-- Switch -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" <?= $cust['status'] == 'active' ? 'checked' : ''?>>
                                <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                        </td>
                        <td><?= $cust['zone'] ?></td>
                        <td><?= $cust['email'] ?></td>
                        <td><?= $cust['name'] ?></td>
                        <td><?= $cust['email'] ?></td>
                        <td><?= $cust['mobile'] ?></td>
                        <td><a href="<?= base_url('customer/edit').'/'.cust_encode($cust['id'])?>" class="btn btn-primary btn-sm"><i
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