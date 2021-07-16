<?= $this->extend('templates/base') ?>

<?= $this->section('content')?>
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="user">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Zone</label>
                    <select class="form-control" id="zone" name="zone">
                        <option value="">Select Zone</option>
                        <option value="north">North</option>
                        <option value="south">South</option>
                        <option value="east">East</option>
                        <option value="west">West</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>State</label>
                    <select class="form-control" id="state" name="state">
                        <option value="">Select State</option>
                        <option value="delhi">Delhi</option>
                        <option value="haryana">Haryana</option>
                        <option value="rajisthan">Rajisthan</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label>City</label>
                    <select class="form-control" id="city" name="city">
                        <option value="">Select City</option>
                        <option value="new_delhi">New Delhi</option>
                        <option value="delhi">Delhi</option>
                        <option value="gurugram">Gurgoan</option>
                        <option value="jaipur">Jaipur</option>
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