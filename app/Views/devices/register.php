<?= $this->extend('templates/base')?>
<?= $this->section('content')?>
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="user">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Device ID</label>
                    <input type="text" class="form-control" name="device_id" id="device_id" placeholder="Device ID"/>
                </div>
                <div class="form-group col-lg-4">
                    <label>Device Name</label>
                    <input type="text" class="form-control" id="name"
                        name="name" placeholder="Device Name">
                </div>
            </div>
            <p class="text-lg bold">Mapping Details</p>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label>Customer ID</label>
                    <select class="form-control" id="customer_id" name="customer_id">
                        <option value="">Select Customer</option>
                        <option value="cst1">Dulux</option>
                        <option value="cst2">Excide</option>
                        <option value="cst3">Nerolac</option>
                    </select>
                </div>
                <div class="form-group col-lg-3">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" id="customer_name"
                        name="customer_name" placeholder="Customer Name">
                </div>
                <div class="form-group col-lg-3">
                    <label>Customer Email</label>
                    <input type="email" class="form-control" id="email"
                        name="email" placeholder="Customer Email">
                </div>
                <div class="form-group col-lg-3">
                    <label>Customer Mobile</label>
                    <input type="text" class="form-control" id="mobile"
                        name="mobile" placeholder="Customer Mobile">
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-primary">Register Device</button>
            </center>
        </form>
    </div>
</div>

<?= $this->endSection()?>


<!-- Script Section -->
<?= $this->section('script')?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#customer_id').change(function(){
            var cid = $('#customer_id').val();
            var name = "";
            var email = "";
            var mobile = "";
            if(cid == 'cst1'){
                name = "Ram";
                email = "admin@dulux.com";
                mobile = "9866932137";
            }else if(cid == 'cst2'){
                name = "Shyam";
                email = "admin@excide.com";
                mobile = "7982658425";
            }else{
                name = "Meena";
                email = "admin@nero.com";
                mobile = "9868789837";
            }
            $("#customer_name").val(name);
            $("#email").val(email);
            $("#mobile").val(mobile);
        });
    });    
    </script>
<?= $this->endSection()?>