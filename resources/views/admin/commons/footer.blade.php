<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script>
    $.ajaxSetup({
    headers:{
        'X_CSRF_TOKEN':$('meta[name="_token"]').attr('content')
    }

    });
    $(document).ready(function(){
    $("#category").change(function(){
        var category=$(this).val();
        $.ajax({
            url:'{{url("/Fetchbrands")}}/'+category,
            type:'post',
            datatype:'json',
            success:function(response){
            $('#brand').find('option').remove();

            if(response['brands'].length > 0){
                $.each(response['brands'],function(key,value){
                $("#brand").append("<option id='"+value['id']+"' >"+value['name'])  
              });
            }
               
            
            }
        });

    });

    });
</script>
</body>
</html>