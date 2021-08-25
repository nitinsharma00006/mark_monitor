<?= $this->extend('templates/base') ?>

<?= $this->section('content')?>
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="user" id="edit_customer" method="post" action="<?= base_url('customer/edit') .'/'. cust_encode($customer_data[0]['id'])?>">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Zone</label>
                    <select class="form-control" id="zone" name="zone" onchange="loadState(event)" required>
                        <option value="">Select Zone</option>
                        <option value="North" <?=$customer_data[0]['zone'] == 'North' ? 'selected':''?>>North</option>
                        <option value="South" <?=$customer_data[0]['zone'] == 'South' ? 'selected':''?>>South</option>
                        <option value="East" <?=$customer_data[0]['zone'] == 'East' ? 'selected':''?>>East</option>
                        <option value="West" <?=$customer_data[0]['zone'] == 'West' ? 'selected':''?>>West</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>State</label>
                    <select class="form-control" id="state" name="state" onchange="loadCity(event)" required>
                        <option value="">Select State</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>City</label>
                    <select class="form-control" id="city" name="city" required>
                        <option value="">Select City</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Customer Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?=$customer_data[0]['name']?>" placeholder="Customer Name" required>
                </div>
                <div class="form-group col-lg-4">
                    <label>Customer Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=$customer_data[0]['email']?>" placeholder="Customer Email" required>
                </div>
                <div class="form-group col-lg-4">
                    <label>Customer Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?=$customer_data[0]['mobile']?>" placeholder="Customer Mobile" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address.." value="<?=$customer_data[0]['address']?>">
                </div>
                <div class="form-group col-lg-4">
                    <label>Pincode</label>
                    <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?=$customer_data[0]['pincode']?>">
                </div>
                <div class="form-group col-lg-4">
                    <label>GST</label>
                    <input type="text" class="form-control" id="gst" name="gst" placeholder="GST NO." value="<?=$customer_data[0]['gst']?>">
                </div>
            </div>
            <center>
                <button type="submit" name="submit" class="btn btn-primary">Update Customer</button>
            </center>
        </form>
    </div>
</div>
<?= $this->endSection()?>
<?= $this->section('script') ?>
<script>
    let zone = '<?=$customer_data[0]['zone'] ?>';
    let state = '<?=$customer_data[0]['state'] ?>';
    let city = '<?=$customer_data[0]['city'] ?>';
   setState = (zone) => {
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
   setCity = (state) => {
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
   loadState = (event) => {
       let zone = event.target.value;
       setState(zone);        
    }
    renderState = (res) =>{
        let option = `<option>Select State</option>`;
        res.map((key,index)=>{
            let selected = key.statename == state ? 'selected' :'';
            option += `<option value='${key.statename}' ${selected}>${key.statename}</option>`;
        });
        $("#state").html('');
        $("#city").html(`<option value="">Select City</option>`);
        $("#state").html(option);
    }

    loadCity = (event) => {
        let state = event.target.value;
        setCity(state);
    }
    renderCity = (res) => {
        let option = `<option value="">Select City</option>`;
        res.map((key,index)=>{
            let selected = key.cityname == city ? 'selected' :'';
            option += `<option value="${key.cityname}" ${selected}>${key.cityname}</option>`;
        });
        $("#city").html(option);
    }

    $(document).ready(()=>{
        setState(zone);
        setCity(state);
        $("#edit_customer").validate();
    })
</script>
<?= $this->endSection()?>