<?php if (!isset($conn)) {
    include 'db_connect.php';
} ?>
<style>
    textarea {
        resize: none;
    }
</style>
<div>
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form action="" id="manage-franchise">
                <input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '' ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div id="msg" class=""></div>
                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Street/Building</label>
                                <input type="text" required placeholder="Enter street" name="street" id="street" class="form-control" value="<?php echo isset($street) ? $street : '' ?>">
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">City</label>
                                <input type="text" required placeholder="Enter city" name="city" id="city" class="form-control" value="<?php echo isset($city) ? $city : '' ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">State</label>
                                <input type="text" required placeholder="Enter state" name="state" id="state" class="form-control" value="<?php echo isset($state) ? $state : '' ?>">
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Zip Code/ Postal Code</label>
                                <input type="text" required placeholder="Enter zip code" name="zip_code" id="zip_code" class="form-control" value="<?php echo isset($zip_code) ? $zip_code : '' ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Country</label>
                                <input type="text" required placeholder="Enter country" name="country" id="country" class="form-control" value="<?php echo isset($country) ? $country : '' ?>">
                            </div>
                            <div class="col-sm-6 form-group ">
                                <label for="" class="control-label">Contact</label>
                                <input type="text" required placeholder="Enter contact" name="contact" id="contact" class="form-control" value="<?php echo isset($contact) ? $contact : '' ?>">
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer border-top border-info">
            <div class="d-flex w-100 justify-content-center align-items-center">
                <button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-franchise">Save</button>
                <a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=franchise_list">Cancel</a>
            </div>
        </div>
    </div>
</div>
<script>
    $('#manage-franchise').submit(function (e) {
        e.preventDefault()
        start_load();
        $.ajax({
            url: 'ajax.php?action=save_franchise',
            data:  new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function (resp) {
                if(resp == 1){
                    alert_toast("Franchise Created Successfully", "success");
                    setTimeout(function () {
                        location.href = 'index.php?page=franchise_list'
                    }, 2000)
                }
            }
        })
    })

    function displayImgCover(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cover').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>