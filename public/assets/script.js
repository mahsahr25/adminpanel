console.log('hi');
$('#deleteimagebtn').on('click',function (){
    var categoryid=$(this).data('value');
    // alert(categoryid);


    var result = confirm("آیا می خواهید تصویر حذف شود؟");
    if (result) {
        $('#'+categoryid).children().hide();

        $.ajax({
            url:"{{url('/categories/deleteimage')}}",
            dataType:'json',
            type:'GET',
            data:{'categoryid':categoryid},
            success:function(response,status){
                // alert(response['category']['title']);
                if(response['status']=='ok')
                {

                    alert('تصویر با موفقیت حذف شد');
                }

            }

        });
    }
});
