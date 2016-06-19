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
        url: "Controller/cart_action.php",
        data: queryString,
        type: "POST",
        success: function (data) {
            $("#cart-total").html(data);
            if (action === "add") {
                alert("Đã thêm hàng vào giỏ");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Xay ra loi " + jqXHR.status() + " " + textStatus);
        }
    });
}