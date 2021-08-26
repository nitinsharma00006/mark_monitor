<?= $this->extend('templates/base')?>
<?= $this->section('content')?>
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="user" id="device_registration" method="POST" action="<?= base_url('devices/register')?>">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Device ID</label>
                    <input type="text" class="form-control" name="device_id" id="device_id" placeholder="Device ID" required/>
                </div>
                <div class="form-group col-lg-4">
                    <label>Device Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Device Name" required>
                </div>
            </div>
            <p class="text-lg bold">Mapping Details</p>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label>Customer ID</label>
                    <select class="form-control" id="customer_id" name="customer_id" required>
                        <option value="">Select Customer</option>
                        <?php if (is_array($customers) && count($customers)>0):
                                foreach($customers as $cust):?>
                        <option value="<?= $cust['user_id']?>" data-name="<?= $cust['name']?>" data-email="<?=$cust['email']?>" data-mobile="<?=$cust['mobile']?>"><?= $cust['name']?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" id="customer_name"  name="customer_name" placeholder="Customer Name" readonly required>
                </div>
                <div class="form-group col-lg-3">
                    <label>Customer Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Customer Email" readonly required>
                </div>
                <div class="form-group col-lg-3">
                    <label>Customer Mobile</label>
                    <input type="text" class="form-control" id="mobile"
                        name="mobile" placeholder="Customer Mobile" readonly required>
                </div>
            </div>
            <center>
                <button type="submit" name="submit" class="btn btn-primary">Register Device</button>
            </center>
        </form>
    </div>
</div>

<?= $this->endSection()?>


<!-- Script Section -->
<?= $this->section('script')?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#customer_id').change(() => {
            var cid = $('#customer_id').val();
            var name = $('#customer_id').find(':selected').data("name");
            console.log($('#customer_id').find(':selected').data());
            var email = $('#customer_id').find(':selected').data('email');
            var mobile = $('#customer_id').find(':selected').data('mobile');
            $("#customer_name").val(name);
            $("#email").val(email);
            $("#mobile").val(mobile);
        });
        $('#device_registration').validate();
    });    
    </script>
<?= $this->endSection()?>