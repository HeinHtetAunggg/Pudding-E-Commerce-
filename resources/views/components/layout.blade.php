<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pudding</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    

{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
crossorigin="anonymous"
></script>
    <link href="/app.css" rel="stylesheet"/>
</head>
<body>
    <x-nav/>
    {{$slot}}
<x-footer/>

<script type="text/javascript">


$(".cart_update").change(function(e){
    e.preventDefault();

    var ele=$(this);
  
    $.ajax({
        url:'{{route('update_cart')}}',
        method:"patch",
        data:{
            _token:'{{csrf_token()}}',
            id: ele.parents("tr").attr("data-id"),
            quantity: ele.parents("tr").find(".quantity").val()
        },
        success: function(response){
            window.location.reload();
        }
    });
});


$(".cart_remove").click(function (e) {
    e.preventDefault();

    var ele=$(this);
    if(confirm('Do You Really Wnat To Remove?')){
        $.ajax({
            url:'{{route('remove_from_cart')}}',
            method: "DELETE",
            data:{
                _token: '{{csrf_token()}}',
                id: ele.parents("tr").attr("data-id")
            },
            success:function(response){
                window.location.reload();
            }
        });
    }
});

</script>

<script src="/ckeditor/ckeditor.js"></script>
		<script>ClassicEditor
				.create( document.querySelector( '.editor' ), {
					licenseKey: '',					
				} )
				.then( editor => {
					window.editor = editor;					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: n83d4es6jcf8-vo64egvrqxia' );
					console.error( error );
				} );
		</script> 
</body>
</html>