function cartAction(action, sanpham_id) {
    var queryString = "";
    if (action !== "") {
        switch (action) {
            case "add":
                queryString = 'action=' + action + '&id=' + sanpham_id;
                break;
            case "remove":
                queryString = 'action=' + action + '&id=' + sanpham_id;
                break;
            case "empty":
                queryString = 'action=' + action;
        }
    }
    $.ajax({
        url: "/WebsiteBanHang/controllers/cart_action.php",
        data: queryString,
        dataType: 'json',
        type: "POST",
        success: function (data) {
            $("#cart-total").html(data.tong_so_luong);
            $('#price').html(data.tong_tien);
            if (action === "add") {
                alert("Đã thêm hàng vào giỏ");
            }
            if (action === "remove") {
                deleteRow(data.rowid);
            }
            if (action === "empty") {
                $("#tbody").html("");
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Xay ra loi " + jqXHR.status() + " " + textStatus);
        }
    });
}

function deleteRow(rowid) {
    var row = document.getElementById(rowid);
    row.parentNode.removeChild(row);
}

function showAlert(action) {
    if (action !== "") {
        switch (action) {
            case "thanhtoan":
                swal({
                    title: "Bạn muốn thanh toán ?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: "btn-primary",
                    confirmButtonText: "Thanh toán",
                    closeOnConfirm: false
                },
                function(){
                    swal("Đã thanh toán!","Cửa hàng sẽ email phiếu giao hàng cho bạn trong vòng 24h nếu qua 24h mà vẫn không thấy email xin hãy report lại với cửa hàng","success");
                });
                break;
        }
    }
}