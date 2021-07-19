<?= $this->extend('templates/base')?>
<?= $this->section('content')?>
<div class="card shadow mb-4">
    <div class="card-body">
        <form class="user">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label>Device ID</label>
                    <select class="form-control" id="device_id" name="device_id">
                        <option value="">Select Device</option>
                        <option value="device1">Device 1</option>
                        <option value="device2">Device 2</option>
                        <option value="device3">Device 3</option>
                    </select>
                </div>
            </div>
            <p class="text-lg bold">Time Details</p>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>ON Time</label>
                    <input type="time" class="form-control" id="on_time"
                        name="on_time" placeholder="ON Time">
                </div>
                <div class="form-group col-lg-6">
                    <label>OFF Time</label>
                    <input type="time" class="form-control" id="off_time"
                        name="off_time" placeholder="OFF Time">
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-primary">Set Time</button>
            </center>
        </form>
    </div>
</div>
<?= $this->endSection()?>