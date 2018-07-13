@extends('layouts.app')

@section('content')
    @yield('title')
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hint.min.css') }}" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    

<form role="form" method="post" action="/search/action" class="form-group extra-class">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group extra-class">

        <label for="ex3">Title</label>
        <input class="form-control" id="ex3" type="text" name="query1">

        <label for="ex3">Author</label>
        <input class="form-control" id="ex3" type="text" name="query2">

      <!--  <label for="ex3">Keyword</label>
        <input class="form-control" id="ex3" type="text">-->

        <label for="ex3">ISBN</label>

        <div class="isbninfo">
            <input class="form-control" id="ex3" type="text" name="query3"><i class="fas fa-info-circle"></i>
            <span class="fa-info-circle hint--right hint--bounce" aria-label="you can get it from goodreads"
                  id="rr"></span>
        </div>

    </div>

    <div class="btn-content">
        <button type="submit" class="btn btn-info btn btn-dark form-control" style="width: 20%; font-size:1.3em; " id="submit">
            <span class="glyphicon glyphicon-search"></span> Search
        </button>
    </div>
</form>

<script> 
$(document).ready(function(){
    
    //fetch_book_data();
    
    
    $('#submit').on('click',function(){
       var query = $('#ex3').val();
        
        console.log(query);
        var base_url = 'http://localhost';

        $.ajax({

            url:base_url+"LiveSearch/action", //controller
            
            method:'GET',
         //   data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('tbody').html(data.table_data);
                $('#total_records').text(data.total_data);
            },
               // test somthing
           error:function(){
            return "failure to get data";
            }
            
        });
    });
});
</script>
@endsection


