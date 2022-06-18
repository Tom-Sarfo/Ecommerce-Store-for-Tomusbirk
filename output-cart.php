<?php  
 $connect = mysqli_connect("localhost", "root", "", "tomusbirk");  
 $output = '';

 $output .= '
            <div class="wrap-table-shopping-cart">
              <table class="table-shopping-cart">
                <tr class="table_head">
                  <th class="column-1">Product</th>
                  <th class="column-2"></th>
                  <th class="column-3">Price</th>
                  <th class="column-4">Quantity</th>
                  <th class="column-5">Total</th>
                </tr>';
  $id = $_SESSION['user'];
  $sql = "SELECT * FROM `shopping_cart` WHERE `mem_id`='$id' ORDER BY id DESC"; 
  $res = mysqli_query($connect, $sql);

      if(mysqli_num_rows($res) > 0)  
      {   
        while($fetch = mysqli_fetch_array($res)) {

       $name = $fetch["nameProduct"];
       $s = ucfirst($name);
       $bar = ucwords(strtolower($s));
       $data = preg_replace('/\s+/', '', $bar);
           $output .= '  
                <tr class="table_row">
                  <td class="column-1">
                    <div class="how-itemcart1">
                      <img src="images/'.$data.'.jpg" alt="IMG">
                    </div>
                  </td>
                  <td class="column-2">'.$fetch["nameProduct"].'</td>
                  <td class="column-3">'.$fetch["price_product"].'</td>
                  <td class="column-4">
                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                      <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-minus"></i>
                      </div>

                      <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="'.$fetch["quantity_product"].'">

                      <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-plus"></i>
                      </div>
                    </div>
                  </td>
                  <td class="column-5">$ 36.00</td>
                </tr>';  
      }  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Your Cart is empty</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>