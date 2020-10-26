       <?php 
       $item1 = $_POST['category'];
       $conn = mysqli_connect("localhost", "root", '', 'itcc');
        $output = '';
       // $sub_cat = DB::table('cat_has_subcat')->where('cat_id', $item1)->pluck('subcat_id');
       $sub_cat = "SELECT subcat_id FROM  cat_has_subcat where cat_id = '". $item1 ."' ORDER BY subcat_id";
       $result = mysqli_query($conn, $sub_cat );
        $output = '<option value="" >Choose a Subcategory</option>';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '<option value="'.$row["subcat_id"].'" >' .$row["subcat_id"]. '</option>';
        }
        echo $output;
       ?>