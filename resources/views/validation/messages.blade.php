

  

@if(session('success'))
    <div class="alert alert-success" id="success">
        {{session('success')}}
    </div>
@endif


<script>

setTimeout(function() {
    $('#success').fadeOut("slow","swing")
}, 5000);
</script>