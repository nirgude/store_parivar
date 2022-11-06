<?php 
include("header.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light mt-5">
                <h1>MY CART</h1>
            </div> 
            <div class="col-lg-8">
              <table class="table">
              <thead class="text-center">
                <tr>
                <th scope="col">Serial No.</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
                </tr>
              </thead>
                <tbody class="text-center">
                    <?php 
                      $total = 0;
                      if(isset($_SESSION['cart']))
                      {
                      foreach($_SESSION['cart'] as $key => $value)
                      {
                         $sr=$key+1;
                          $total += $value['Price'];
                         echo"
                          <tr>
                            <td>$sr</td>
                            <td>$value[Item_Name]</td>
                            <td>$value[Price]<input type='hidden' class = 'iprice' value='$value[Price]'></td>
                            <td><input class='text-center iquantity' type='number' value='$value[Quantity]' min='1' max='10'></td>
                            <td class='itotal'></td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                            <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>Remove</button>
                            <input type='Hidden' name='Item_Name' value='$value[Item_Name]'>
                            </form>
                            </td>
                          </tr>
                         ";
                      }
                    }
                    ?>
                
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12 text-center p-4">

      <div class="border bg-light rounded p-4">
        <h4>Grand total:</h4>
        <h5 class="text-center" id="gtotal"> </h5>
        <br>  
        <form>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Cash On Delivery
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Online Payment
  </label>
</div>  
        <a href="https://rzp.io/l/64iYKun" class="btn btn-primary btn-block" >Make Purchase</a>
          <!-- <button class="btn btn-primary btn-block">Make Purchase</button> -->
        </form>
      </div>
    </div>

<script>
      var gtotal=0;
      var iprice=document.getElementsByClassName('iprice');
      var iquantity= document.getElementsByClassName('iquantity');
      var itotal= document.getElementsByClassName('itotal');
      var gtotal= document.getElementById('gtotal');
      
      function subTotal()
      {
        gt=0;
        for(i=0;i<iprice.length;i++)
        {
          itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

          gt=gt+(iprice[i].value)*(iquantity[i].value);

        }
        gtotal.innerText=gt;
      }
      subTotal();
      Array.from(iquantity).forEach(iq => {
          iq.addEventListener("change", e => {
              subTotal();
          })
      })
                  
</script>  
    
</body>
</html>