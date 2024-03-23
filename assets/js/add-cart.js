//script add cart
$(document).ready(function() {

    $(document).on("click", ".add-cart", function() {
        var id = $(this).attr("id");
        var name = $("#name-sp" + id).val();
        var price = $("#price-sp" + id).val();
        var img = $("#img-sp" + id).val();
        var quantity = 1;
        var cus_id = $("#info-id").val();

        if(cus_id != null){
            $.ajax({
                method: 'POST',
                url: 'inc/process.php',
                data: {
                    add_cart_sp: id,
                    add_cart_name: name,
                    add_cart_price: price,
                    add_cart_img: img,
                    add_cart_quantity: quantity,
                    add_cart_cusID: cus_id
                },
                success: function(response) {
                    alert(response);
                    fetchcartmini();
                }
            });
        }else{
            alert("xin hãy đăng nhập");
            window.location = 'login.php';
        }
    });

    $(document).on("click", ".add-cart-pro", function() {
        var id = $(this).attr("id");
        var name = $("#name-sp").val();
        var price = $("#price-sp").text();
        var img = $("#img-sp").val();
        var quantity = $("#qty-sp").val();
        var cus_id = $("#info-id").val();

        if(cus_id != null){
            $.ajax({
                method: 'POST',
                url: 'inc/process.php',
                data: {
                    add_cart_sp: id,
                    add_cart_name: name,
                    add_cart_price: price,
                    add_cart_img: img,
                    add_cart_quantity: quantity,
                    add_cart_cusID: cus_id
                },
                success: function(response) {
                    alert(response);
                    fetchcartmini();
                }
            });
        }else{
            alert("xin hãy đăng nhập");
            window.location = 'login.php';
        } 
    });
});