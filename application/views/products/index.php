<div class="container-fluid">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products List</h6>
        </div>
        <div class="col-12 container d-flex justify-content-end">
            <p class="my-4 mx-2"><a class="btn btn-primary" onclick="addProduct()">Add Product</a>
            </p>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title h5" id="product-title">Add Product</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <label for="name">Name <span class="text-danger">*</span></label>
                <input class="form-control modal-values" type="text" id="name" name name="name" /><br />

                <label for="description">Description <span class="text-danger">*</span></label>
                <input class="form-control modal-values" type="text" id="description" name name="description" /><br />

                <label for="picture">Picture <span class="text-danger mb-3">*</span></label>
                <a data-fancybox class="fancy edit-image border" href="" id="picture-img-a"><img id="picture-img"
                        class="edit-img-style" src=""></a>
                <small class="small-edit-img edit-image" onclick="switchPictureItems()">Click to change the
                    image</small>
                <input class="form-control modal-values p-1 add-image" type="file" id="picture" name="picture" /><br />

                <label class="mt-2" for="price">Price <span class="text-danger">*</span></label>
                <input class="form-control modal-values price" type="text" id="price" name="price" /><br />

                <label for="discount">Discount <span class="text-danger">*</span></label>
                <select class="form-control modal-values form-select mb-3" name="discount" id="discount">
                    <option>Seçiniz</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>

            </div>
            <div class="modal-footer">
                <a type="" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <a type="" class="btn btn-primary" onclick="addProduct(1)" id="product-button">Add</a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    datatable();
    $(".fancy").fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        'overlayShow': false
    });
    $('[data-toggle="tooltip"]').tooltip()
});

function datatable() {
    var url = '<?php echo site_url('products/get_data'); ?>';

    var datatable = $('#dataTable').DataTable({
        "processing": true,
        "serverSide": true,
        "destroy": true,
        "order": [],
        "ajax": {
            url: url,
            type: "POST"
        },
        "paging": true,
        "dataType": 'json',
        "order": [
            [0, 'desc']
        ],
        "columnDefs": [{
                "targets": [0],
                "orderable": true,
            },
            {
                "targets": [1],
                "orderable": false,
            },
            {
                "targets": [2],
                "orderable": true,
            },
            {
                "targets": [3],
                "orderable": true,
            },
            {
                "targets": [4],
                "orderable": true,
            },
            {
                "targets": [5],
                "orderable": false,
            }
        ],
        "columns": [{
                "data": "id"
            },
            {
                "data": "picture",
                "render": function(data, type, row, meta) {
                    return '<a data-fancybox class="fancy" href="uploads/' + data +
                        '"><img src="uploads/' + data + '" class="list-img-style"></a>';
                }
            },
            {
                "data": "name",
                "render": function(data, type, row, meta) {
                    return data + '&nbsp;<span class="text-muted mouse" data-html="true" data-toggle="tooltip" data-placement="top" title="<u>Product Description</u><br>' + row.description + '"><i class="fa fa-info-circle" style=""></i></span>';
                }
            },
            {
                "data": "price"
            },
            {
                "data": "discount",
                "render": function(data, type, row, meta) {
                    return (data == 1) ? "<i class='fa-solid fa-percent fa-lg text-success'></i>" : "<i class='fa-solid fa-percent fa-lg text-danger'></i>";
                }
            },
            {
                "data": null,
                "render": function(data, type, full, meta) {
                    return '<button class="m-1 btn btn-outline-success" onclick="editRow(' +
                        data.id +
                        ')"><i class="fa fa-edit"></i>&nbsp;Edit</button><button class="m-1 btn btn-outline-danger" onclick="deleteRow(' +
                        data.id +
                        ')"><i class="fa fa-trash"></i>&nbsp;Delete</button>';
                }
            },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).find('a[data-fancybox]').fancybox();
        },
        "drawCallback": function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
}

$('.price').mask('000.000.000.000.000,00', {
    reverse: true
});

function addProduct(process = null) {

    if (process == 1) {

        var url = '<?php echo site_url('products/createWithModal'); ?>';

        var name = $('#name').val();
        var description = $('#description').val();
        var price = $('#price').val();
        var discount = $('#discount').val();
        var picture = $('#picture').val();

        var formData = new FormData();
        formData.append('name', name);
        formData.append('description', description);
        formData.append('price', price);
        formData.append('discount', discount);
        formData.append('picture', $('#picture')[0].files[0]);

        if (name == "" || price == "" || discount == "" || picture == "" || description == "") {
            Swal.fire({
                title: "Error!",
                text: "Please fill in all fields",
                icon: "error"
            });
        } else {
            $.ajax({
                method: "POST",
                dataType: "json",
                url: url,
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function(xhr) {
                    addSpinner('beforeSend');
                },
                success: function(result) {
                    addSpinner('addProduct');
                    $(".modal-values").val('');
                    $("#product").modal('hide');
                    datatable();

                    if (result.status) {
                        Swal.fire({
                            title: "Success!",
                            text: "Product loading completed successfully",
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: result.message,
                            icon: "error"
                        });
                    }
                }
            });
        }

    } else {

        $(".modal-values").val('');
        $(".edit-image").addClass("d-none");
        $(".add-image").removeClass("d-none");
        $('#picture-img').prop('src', '');

        $("#product-button").text("Add");
        $("#product-title").text("Add Product");
        $("#product-button").attr("onclick", "addProduct(1)");
        $("#product").modal("show");

    }
}

function editRow(id, update = 0) {

    if (update > 0) {
        var url = '<?php echo site_url('products/updateWithModal'); ?>';
        var check = 0;

        var name = $('#name').val();
        var description = $('#description').val();
        var price = $('#price').val();
        var discount = $('#discount').val();
        var picture = $('#picture').val();

        var formData = new FormData();
        formData.append('name', name);
        formData.append('description', description);
        formData.append('price', price);
        formData.append('discount', discount);
        formData.append('id', id);
        if (picture != undefined || picture != '') {
            formData.append('picture', $('#picture')[0].files[0]);
            check = 1;
        }

        if (name == "" || price == "" || discount == "" || check == 0 || description == "") {
            Swal.fire({
                title: "Error!",
                text: "Please fill in all fields",
                icon: "error"
            });
        } else {
            $.ajax({
                method: "POST",
                dataType: "json",
                url: url,
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function(xhr) {
                    addSpinner('beforeSend');
                },
                success: function(result) {
                    addSpinner('updateProduct');
                    $(".modal-values").val('');
                    $("#product").modal('hide');
                    datatable();

                    if (result.status) {
                        Swal.fire({
                            title: "Success!",
                            text: "Product update completed successfully",
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            html: result.message,
                            icon: "error"
                        });
                    }
                }
            });
        }
    } else {
        $("#product").modal("show");
        $(".modal-values").val('');
        $("#product-button").text("Update");
        $("#product-title").text("Update Product");
        $("#product-button").attr("onclick", "editRow(" + id + ", 1)");
        $(".edit-image").removeClass("d-none");
        $(".add-image").addClass("d-none");

        var url = '<?php echo site_url('products/getInfoWithModal'); ?>';

        $.ajax({
            method: "POST",
            dataType: "json",
            url: url,
            data: {
                "id": id
            },
            success: function(result) {
                if (result.name != undefined && result.picture != undefined && result.id != undefined &&
                    result
                    .discount != undefined && result.price != undefined) {
                    $("#product").modal('show');
                    var name = $('#name').val(result.name);
                    var description = $('#description').val(result.description);
                    var price = $('#price').val(result.price);
                    var discount = $('#discount').val(result.discount);
                    $('#picture-img').prop('src', 'uploads/' + result.picture);
                    $('#picture-img-a').prop('href', 'uploads/' + result.picture);
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "Please try again later",
                        icon: "error"
                    });
                }
            }
        });
    }
}

function deleteRow(id) {

    Swal.fire({
        title: "Are you sure you want to delete the product?",
        icon: "question",
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: "Delete!",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            var url = '<?php echo site_url('products/deleteProduct'); ?>';

            $.ajax({
                method: "POST",
                dataType: "json",
                url: url,
                data: {
                    "id": id
                },
                success: function(result) {
                    if (result.status) {
                        datatable();
                        Swal.fire({
                            title: "Success",
                            text: "Deletion completed successfully",
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: "Please try again later",
                            icon: "error"
                        });
                    }
                }
            });
        }
    });
}

function switchPictureItems() {
    $(".edit-image").addClass("d-none");
    $(".add-image").removeClass("d-none");
}

function addSpinner(type){
    if(type == 'beforeSend'){
        $("#product-button").html('<div class="spinner-border text-light" role="status"></div>');
    }

    if(type == 'addProduct'){
        $("#product-button").text("Add");
    }

    if(type == 'updateProduct'){
        $("#product-button").text("Update");
    }
}
</script>