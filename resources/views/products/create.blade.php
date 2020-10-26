@extends('layouts.sidebar')

@section('content')

    <section class="content-header">
      <h1>
      Products Lists
        <small></small>
      </h1>
   
      
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('products.store') }}" method="POST">
    	@csrf
        <!-- <script>
        jQuery(document).ready(function(){
            jQuery("#sel1").change(function() {
            var name = $(this).val();

    jQuery.ajax({
            type: 'GET',                           
            data:{name : name},
            dataType:'json',                
            success: function(response)
            {
                alert("success");
                //jQuery('#sel2').text('name : ' + response);
               
                
            }
        });  
});+
});        
 </script> -->
 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script>
        jQuery(document).ready(function(){
            jQuery("#sel1").change(function() {
            var category = $(this).val();

    jQuery.ajax({
            url: "/fetch.php",            
            method: 'POST',                           
            data:{category : category},
            dataType:'text',                
            success: function(data)
            {               
                jQuery('#sel2').html(data);              
                
            }
        });  
});
});
</script>  


         <div class="row">         
         

         
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Price:</strong>
		            <input type="text" name="price" class="form-control" placeholder="Price">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Quantity:</strong>
		            <input type="text" name="quantity" class="form-control" placeholder="Quantity">
		        </div>
		    </div>
            <!-- CATGEORY AND SUBCTAEGORY SECTION-->
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong></strong>		            
                    <label for="sel1">Main Categories:</label>
                    <select class="form-control" id="sel1" name="category" >
                        <option value='' selected="selected">Choose a category</option>
                        <?php
                        // A sample product array
                        $rows = DB::table('category')->pluck('cat_name');    
                        //print_r($rows);die();    
                        // Iterating through the product array
                        foreach($rows as $item){
                        echo "<option value='$item'>$item</option>";                      
                        }
                        ?>
                    </select>

                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12" >
                            <div class="form-group">
                                <strong></strong>
                                
                                <label for="sel2">Sub Categories:</label>

                    <select class="form-control" id="sel2" name="subcategory" >
                    <option value='' >Choose a Subcategory</option>
                
                </select>

            </div>
            </div>
             <!-- CATGEORY AND SUBCTAEGORY SECTION-->

            <div class="col-xs-12 col-sm-12 col-md-12 hidden">
		        <div class="form-group">
		            <strong>User id:</strong>
		            <input type="text" name="user_id" class="form-control" placeholder="{{ Auth::user()->id }}" value='{{ Auth::user()->id }}'>
		        </div>
		    </div>
		    
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

        
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection
