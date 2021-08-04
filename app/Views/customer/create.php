<?= $this->extend('templates/base') ?>

<?= $this->section('content')?>
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="user" method="post" action="<?= base_url('customer/create')?>">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Zone</label>
                    <select class="form-control" id="zone" name="zone" onchange="loadState(event)">
                        <option value="">Select Zone</option>
                        <option value="North">North</option>
                        <option value="South">South</option>
                        <option value="East">East</option>
                        <option value="West">West</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>State</label>
                    <select class="form-control" id="state" name="state" onchange="loadCity(event)">
                        <option value="">Select State</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>City</label>
                    <select class="form-control" id="city" name="city">
                        <option value="">Select City</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name">
                </div>
                <div class="form-group col-lg-4">
                    <label>Customer Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Customer Email">
                </div>
                <div class="form-group col-lg-4">
                    <label>Customer Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Customer Mobile">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address..">
                </div>
                <div class="form-group col-lg-4">
                    <label>Pincode</label>
                    <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Pincode">
                </div>
                <div class="form-group col-lg-4">
                    <label>GST</label>
                    <input type="text" class="form-control" id="gst" name="gst" placeholder="GST NO.">
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-primary">Create Customer</button>
            </center>
        </form>
    </div>
</div>
<?= $this->endSection()?>

<?= $this->section('script') ?>
<script>
   loadState = (event) => {
       let zone = event.target.value;
        $.ajax({
            url : `<?=base_url()?>/filters/loadState/${zone}`,
            type : 'POST',
            data : {
                '<?= csrf_token()?>' : '<?= csrf_hash()?>'
            },
            success : (response) => {
                renderState(response)
            },
            error : (error)=>{
                console.log(error.status);
                toastr.error(error.status,{closeButton: true,timeOut:6000,showMethod:'slideDown' , hideMethod:'slideUp'});
            }

        });
    }
    renderState = (res) =>{
        let option = `<option>Select State</option>`;
        res.map((key,index)=>{
            option += `<option value='${key.statename}'>${key.statename}</option>`;
        });
        $("#state").html('');
        $("#city").html(`<option>Select City</option>`);
        $("#state").html(option);
    }

    loadCity = (event) => {
        let state = event.target.value;
        $.ajax({
            url : `<?= base_url() ?>/filters/loadCity/${state}`,
            type:'POST',
            data:{
                '<?=csrf_token()?>':'<?=csrf_hash()?>'
            },
            success : (response)=>{
                renderCity(response)
            },
            error : (error)=>{
                console.log(error.status);
                toastr.error(error.status,{closeButton:true,timeOut:6000,showMethod:'slideDown',hideMethod:'slideUp'});
            }
        });
    }
    renderCity = (res) => {
        let option = `<option>Select City</option>`;
        res.map((key,index)=>{
            option += `<option value="${key.cityname}">${key.cityname}</option>`;
        });
        $("#city").html(option);
    }

    $(document).ready(()=>{
        
    })
</script>
<?= $this->endSection()?>