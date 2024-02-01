
<script>
$(".add_cart").click(function(e){
    e.preventDefault();
var product_id = $(this).attr("id_product");

$.ajax({
    url:"{{ route('web/dataCart') }}",
    method:"POST",
    data:{product_id:product_id ,_token:"{{ csrf_token() }}" },
    success:function(data){
        //======================== load
        $(".shopping-list").load(location.href+" .shopping-list",function(){
                            var num_pro=$(".item_pro").length;
                            var price =document.querySelectorAll(".price_pro");
                            var count =document.querySelectorAll(".count_pro");
                            var total=0;
                            for(var i=0 ;i<price.length ;i++){
                            var total=total+ +price[i].innerHTML*count[i].innerHTML;

                            }
                            $(".total-amount").html("$ "+total);
                            $(".Items_pro").html(num_pro+" Items");
                            $(".total-items").html(num_pro);
                            console.log(total);



            $(".del_pro").click(function(){
                        $(this).closest(".item_pro").remove();
                        var id_pro=$(this).attr("del_pro");
                        var num_pro=$(".item_pro").length;
                        var price =document.querySelectorAll(".price_pro");
                        var count =document.querySelectorAll(".count_pro");
                        var total=0;
                        for(var i=0 ;i<price.length ;i++){
                        var total=total+ +price[i].innerHTML*count[i].innerHTML;

                        }
                        $(".total-amount").html("$ "+total);
                        $(".Items_pro").html(num_pro+" Items");
                        $(".total-items").html(num_pro);


                        $.ajax({
                        url:"{{ route('web/remove') }}",
                        method:"POST",
                        data:{id_pro:id_pro , _token:"{{ csrf_token() }}"},
                        success:function(data){console.log(data);},
                        error:function(error){console.log(error);}

                        });

                });

        });

        //===============================endload
        console.log(data);
    },
    error:function(error){
    console.log(error);

    }
});
});


</script>


<script>
$(".del_pro").click(function(){
    $(this).closest(".item_pro").remove();
    var id_pro=$(this).attr("del_pro");
    var num_pro=$(".item_pro").length;
    var price =document.querySelectorAll(".price_pro");
    var count =document.querySelectorAll(".count_pro");
    var total=0;
    for(var i=0 ;i<price.length ;i++){
        var total=total+ +price[i].innerHTML*count[i].innerHTML;

    }
    $(".total-amount").html("$ "+total);
    $(".Items_pro").html(num_pro+" Items");
    $(".total-items").html(num_pro);


    $.ajax({
        url:"{{ route('web/remove') }}",
        method:"POST",
        data:{id_pro:id_pro , _token:"{{ csrf_token() }}"},
        success:function(data){console.log(data);},
        error:function(error){console.log(error);}

    });






});
</script>


<script>
$("._search").keyup(function(){
    var search = $(this).val();

    $.ajax({
        url:"{{ route('web/search') }}",
        method:"POST",
        data:{search:search , _token:"{{ csrf_token() }}"},
        success:function(data){$(".all_search").html(data);},
        error:function(error){console.log(error);},
    })

});
</script>


