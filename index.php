<?php
//start the session
session_start();


// Top Navigationbar Connection
include_once('lib/layout/top Nav_main.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>PIXELZONE Home</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--Link Bootstrap css file-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!--Link Font awesome css file-->
  <link rel="stylesheet" href="css/all.min.css">
  <!--Link Style sheet css file-->
  <link rel="stylesheet" href="css/style.css">

  <!--Link Font awesome bootstrap and Jquery scrip files-->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/index.js"></script>

  <style>
    #loadallplans {
      position: relative;
    }

    .controls {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }

    .controls button {
      background-color: #ccc;
      margin-top: -270;
      border: none;
      color: blue;
      padding: 8px 16px;
      cursor: pointer;
    }

    .card {
      padding: 10px;
      margin-bottom: 10px;
      background-color: none;
      border: none;

    }

    .card-background-color {
      opacity: 0;
    }

    .box.gray {
  background-color: LightGreen;
}
  </style>
</head>

<body>
  <input class="form-control mx-1 my-1" type="hidden" value="<?php
                                    //chek the user session
                                  if(empty($_SESSION['user_id'])){}

                                  else{print_r($_SESSION['user_id']);}?>" id="input_user_id">
  <section id="home">
    <div class="container-image">
      <h5>NEW PACKAGES</h5>
      <h1><span>BEST PRICES </span>THIS SEASON</h1>
      <p>Reserve Your Movement Today</p>
      <a href="#">
        <button onclick="resavenow(); return false" class="button-shop-now">RESERVE NOW</button>
      </a>
    </div>
  </section>

  <section id="makeresavation" style="margin-top: 150px">

    <div class="container">
      <h4>Book Your Day With us Now!</h4>
      <label for="category" style="margin-bottom: 3px;">Event Type</label>
      <select name="category" class="form-control" id="category" style="margin-bottom: 10px;  width:400px;">
        <option value="0">Select Category</option>
        <option value="Marital Photography">Marital Photography</option>
        <option value="Party / Special Photography">Party / Special Photography</option>
        <option value="Newborn Photography">Newborn Photography</option>
        <option value="Birthday Photography">Birthday Photography</option>
        <option value="Maternity Photography">Maternity Photography</option>
        <option value="Commercial Photography">Commercial Photography</option>
      </select>

      <label for="category" style="margin-bottom: 3px">Date</label>
      <input type="date" class="form-control" id="myDatePicker" style=" width:400px;" name="event" />
      <div style="text-align: center; margin-top: 20px; margin-bottom: 50px">
        <input type="submit" value="Check Now" class="button-shop-now" id="checkButton"
          onclick="clickedAction(); return false" />
      </div>

    </div>
  </section>

  <section id="success" style="margin-top: 150px; margin-bottom: 150px;">
    <div class="container">
      <h2>Congratulation</h2>
      <h4>Your Date is : <span style="color:lightgreen;"><b>Available</b></span></h4>
      <button class="btn btn-info" onclick="redate(); return false">Tey Another Date</button> <button
        class="btn btn-success" onclick="proceed();return false">Proceed</button> <button class="btn btn-warning"
        onclick="calcle(); return false">Cancel</button>
    </div>
  </section>

  <section id="erroe" style="margin-top: 150px; margin-bottom: 150px">
    <div class="container">
      <h2>Sorry!</h2>
      <h4>Your Date is : <span style="color:red;"><b>Unavailable</b></span></h4>
      <button class="btn btn-info" onclick="redate(); return false">Tey Another Date</button> <button
        class="btn btn-warning" onclick="calcle(); return false">Cancel</button>
    </div>
  </section>

  <section id="select_plan" style="margin-top: 100px; margin-bottom: 150px">
    <div class="container" id="loadallplans" style="text-align:center;">
      <h2>Basic Package Details</h2>
      <p>Choose Your Service Plan</p>
      <div>
        <div class="row">
          <div class="col-2">
            <div class="justify-content-md-center">
              <div class="py-2 px-2 my-2" style="text-align:right; 
              font-family: arial, sans-serif;">
                <h5><b>Package</b></h5>
                <h6 class="my-3">Edited Photos</h6>
                <h6 class="my-3">Unedited Photos</h6>
                <h6 class="my-3">Work Hours</h6>
                <h6 class="my-3">No of Photographers</h6>
                <h6 class="my-3">Distance</h6>
                <h6 class="my-3"><b>Price</b></h6>

              </div>
            </div>
          </div>
          <div class="col-10">
            <div class="row justify-content-md-center" id="loadpackegers">
              <!-- load packagers -->
            </div>
            <div class="controls">
              <button id="prevBtn"><i class="fas fa-chevron-left fa-lg"></i></button>
              <button id="nextBtn"><i class="fas fa-chevron-right fa-lg"></i></button>
            </div>
          </div>
        </div>
      </div>
      <h4>--Or--</h4>
      <h2>Customize Your Own Plan</h2>
      <p>Customize Your Service Plan to compatible for your event</p>
      <button onclick="customplan(); return false" class="button-shop-now">CUSTAMIZE NOW</button>
    </div>
    <div class="container" id="custamizeplan" style="text-align:center;">
      
      <h2>Customize Your Own Plan</h2>
      <p>Customize Your Service Plan to compatible for your event</p>
      <div class="row">
        <div class="col-8">
        <form id="addcusProductForm">
          <div class="row">
              <div class="col-6" style="text-align:right; font-family: arial, sans-serif;"> 
                <h5 class="my-2"><b>Package Type</b></h5>
              </div>
              <div class="col-6" style="text-align:left; font-family: arial, sans-serif;">
              <select name="type" class="form-control my-1" id="category" style="width:400px;">
                <option value="0">Select Category</option>
                <option value="Marital Photography">Marital Photography</option>
                <option value="Party / Special Photography">Party / Special Photography</option>
                <option value="Newborn Photography">Newborn Photography</option>
                <option value="Birthday Photography">Birthday Photography</option>
                <option value="Maternity Photography">Maternity Photography</option>
                <option value="Commercial Photography">Commercial Photography</option>
              </select>
              </div>
          </div>
          <div class="row">
              <div class="col-6" style="text-align:right; font-family: arial, sans-serif;"> 
                <h5 class="my-2">Location</h5>
              </div>
              <div class="col-6" style="text-align:left; font-family: arial, sans-serif;">
              <select name="location" onchange="caltotal();" class="form-control my-1" id="location" style="width:400px;">
                <option value="0">Select Location</option>
              </select>
              </div>
          </div>
          <div class="row">
              <div class="col-6" style="text-align:right; font-family: arial, sans-serif;"> 
                <h5 class="my-2">Extra Distance(Km)</h5>
              </div>
              <div class="col-3" style="text-align:left; font-family: arial, sans-serif;">
                <input class="form-control my-1 col-6" mic="0" onchange="caltotal();" name="distance" id="distance" type="number">
              </div>
          </div>
          <div class="row">
              <div class="col-6" style="text-align:right; font-family: arial, sans-serif;"> 
                <h5 class="my-2">Edited Photographs</h5>
              </div>
              <div class="col-3" style="text-align:left; font-family: arial, sans-serif;">
                <input class="form-control my-1 col-6" mic="0" onchange="caltotal();" name="edited" id="edited" type="number">
              </div>
          </div>
          <div class="row">
              <div class="col-6" style="text-align:right; font-family: arial, sans-serif;"> 
                <h5 class="my-2">Unedited Photographs</h5>
              </div>
              <div class="col-3" style="text-align:left; font-family: arial, sans-serif;">
                <input class="form-control my-1 col-6" mic="0" onchange="caltotal();" name="unedited" id="unedited" type="number">
              </div>
          </div>
          <div class="row">
              <div class="col-6" style="text-align:right; font-family: arial, sans-serif;"> 
                <h5 class="my-2">Working hours</h5>
              </div>
              <div class="col-3" style="text-align:left; font-family: arial, sans-serif;">
                <input class="form-control my-1 col-6" mic="0" onchange="caltotal();" name="work" id="work" type="number">
              </div>
          </div>
          <div class="row">
              <div class="col-6" style="text-align:right; font-family: arial, sans-serif;"> 
                <h5 class="my-2">Number of Albums</h5>
              </div>
              <div class="col-3" style="text-align:left; font-family: arial, sans-serif;">
                <input class="form-control my-1 col-6" mic="0" onchange="caltotal();" name="album" id="album" type="number">
              </div>
          </div>
          <div class="row">
              <div class="col-6" style="text-align:right; font-family: arial, sans-serif;"> 
                <h5 class="my-2">Number of Enliargements</h5>
              </div>
              <div class="col-3" style="text-align:left; font-family: arial, sans-serif;">
                <input class="form-control my-1 col-6" mic="0" onchange="caltotal();" name="enlargments" id="enlargments" type="number">
              </div>
          </div>
          <div class="row">
              <div class="col-6" style="text-align:right; font-family: arial, sans-serif;"> 
                <h5 class="my-2">Number of Thankyou cards</h5>
              </div>
              <div class="col-3" style="text-align:left; font-family: arial, sans-serif;">
                <input class="form-control my-1 col-6" mic="0" onchange="caltotal();" name="thankuou" id="thankyou" type="number">
                <input class="form-control my-1 col-6"  name="price" id="price" type="hidden">
              </div>
          </div>
          </form>
        </div>
        <div class="col-4">
        <div class="container my-2" style="text-align:center;">
          <div style="width:100%; height:140px; background-color: MediumBlue; color:white;" class="mx-2 my-2">
          <div style="width:100%; height:30%; background-color: DodgerBlue;"><h2 class="my-2" >Total</h2></div>
            
            <h2 class="my-2" id="finaltotal">00.00 LKR</h2>
          </div>
          <div class="my-4">
          <button onclick="startpayment(); return false" class="button-shop-now">Select Plan</button>
          </div>
          
        </div>
        </div>
      </div>
      <button onclick="basicpack(); return false" class="button-shop-now">Basic Packagers</button>
    </div>
  </section>

  <section id="payment" style="margin-top: 150px; margin-bottom: 150px">
    <div class="container" style="text-align:center;">
    <h2>Payment Methord</h2>
      <p>Reservation Summary</p>
      <hr>
      <div class="row">
          <div class="col-6">
            Customer Details
            <div class="row">
              <div class="col-6" style="text-align:right;">Customer Name</div>
              <div class="col-6" style="text-align:left;"><b id="sunmane">--</b></div>
            </div>
            <div class="row">
              <div class="col-6" style="text-align:right;">Phone Number</div>
              <div class="col-6" style="text-align:left;"><b id="sumphone">--</b></div>
            </div>
            <div class="row">
              <div class="col-6" style="text-align:right;">Reservation Type</div>
              <div class="col-6" style="text-align:left;"><b id="sumrestype">--</b></div>
            </div>
          </div>
          <div class="col-6">
            Pacakge Details
            <div class="row">
              <div class="col-6" style="text-align:right;">Package Name</div>
              <div class="col-6" style="text-align:left;"><b id="sumpname">--</b></div>
            </div>
            <div class="row">
              <div class="col-6" style="text-align:right;">Date</div>
              <div class="col-6" style="text-align:left;"><b id="sumdate">--</b></div>
            </div>
            <div class="row">
              <div class="col-6" style="text-align:right;">Price</div>
              <div class="col-6" style="text-align:left;"><b id="sumprice">--</b></div>
            </div>
          </div>
      </div>
      <hr>
      <b style="color:red;">You have to pay more than 40% of your toal amount fo make resavation. Your Minimum Advance Payment Amount - <span id="sumadvance"></span></b>
      <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div id="box1" class="box" style=" border-style: ridge; border-radius: 15px; padding:10px;">
          <label>Online Payment</label>
            <input type="checkbox" id="checkbox1" class="checkbox">
            <hr>  
            <div class="form-group px-5">
              <label class="form-label mt-2 ">Payed Amount</label>
              <input type="number" class="form-control" id="amount" name="advance">
            </div>
            <div class="form-group px-5">
              <label class="form-label mt-2 ">Card Number</label>
              <input type="card_Number" class="form-control" id="card_Number" name="card_Number" placeholder="1234 5678 9012 3456">
            </div>
            <div class="form-group px-5">
              <label class="form-label mt-2 ">Name On Card</label>
              <input type="card_Name" class="form-control" id="card_Name" name="card_Name" placeholder="Ex  Jone Smith">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group px-5">
                        <label class="form-label mt-2 ">Expiry date</label>
                        <input type="card_Ed" class="form-control" id="card_Exd" name="card_Exd" placeholder="01/23">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group px-5">
                        <label class="form-label mt-2 ">Security code</label>
                        <input type="password" class="form-control" id="card_key" name="card_Key" placeholder="***">
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div id="box2" class="box" style="border-style: ridge; border-radius: 15px; padding:10px;">
          <label>Offline Payment</label>
            <input type="checkbox" id="checkbox2" class="checkbox">
            <hr>
              <ul>
                <li>Deposit this amount on company bank account BOC Bank:0123456789</li>
                <li>Visit our studio at this address to make a payment.</li>
              </ul>  
          </div>
        </div>
      </div>
      <div class="my-2">
      <button onclick="placeresavation(); return false" class="button-shop-now">Place Resavation</button>
      </div>
    </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="footer_title">
            <h4 style="color: red">About Company</h4>
          </div>
          <div class="footer_content">
            <div class="footer_logo">

            </div>
            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
              dolores eos qui ratione voluptatem sequi nesciunt. Neque porro </p>

            <div class="footer_social">
              <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="footer_title">
            <h4 style="color: red">Contact us </h4>
          </div>
          <div class="footer_content">
            <ul class="contact_details">
              <li><a href="#"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>No.242/1, Dambahena Rd,
                  Maharagama.
                </a></li>
              <li><a href="#"><span><i class="fa fa-envelope"
                      aria-hidden="true"></i></span>Pixelzone.gallery.gmail.com</a></li>
              <li><a href="#"><span><i class="fa fa-phone" aria-hidden="true"></i></span>0711 50 50 85<br></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.3499708177337!2d79.92218231477247!3d6.848583995050653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259d3d43d2d23%3A0x3dbfce0d62cfd670!2sSuper%20Digital%20Zone!5e0!3m2!1sen!2slk!4v1685735246908!5m2!1sen!2slk"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </footer>
</body>
<script>

$('#edited').on('keydown', function(event) {
        if (event.keyCode === 189 || event.keyCode === 109) {
          event.preventDefault(); // Prevent typing minus values
        }
      });

$('#unedited').on('keydown', function(event) {
        if (event.keyCode === 189 || event.keyCode === 109) {
          event.preventDefault(); // Prevent typing minus values
        }
      });
$('#work').on('keydown', function(event) {
        if (event.keyCode === 189 || event.keyCode === 109) {
          event.preventDefault(); // Prevent typing minus values
        }
      });
$('#album').on('keydown', function(event) {
        if (event.keyCode === 189 || event.keyCode === 109) {
          event.preventDefault(); // Prevent typing minus values
        }
      });

$('#enlargments').on('keydown', function(event) {
        if (event.keyCode === 189 || event.keyCode === 109) {
          event.preventDefault(); // Prevent typing minus values
        }
      });
$('#thankyou').on('keydown', function(event) {
        if (event.keyCode === 189 || event.keyCode === 109) {
          event.preventDefault(); // Prevent typing minus values
        }
      });

  localStorage.clear();
  $("#makeresavation").hide();
  $("#success").hide();
  $("#erroe").hide();
  $("#select_plan").hide();
  $("#payment").hide();
  upunedited = 0;
  upedited = 0;
  upword = 0;
  upablem = 0;
  upenlargement = 0;
  upthankyou = 0;
  updistance = 0;

  var cardWidth = $(".card").outerWidth();
  var cardCount = $(".card").length;
  var visibleCards = 3;
  var currentPosition = 0;
    // showCards();
  // updateButtons();

  $userid = $("#input_user_id").val();

  //chek user loged or not
  if ($userid == "") {
    $("#btn_user").hide();
  } else {
    $("#btn_sign").hide();
    $("#btn_reg").hide();
  }

  $('.checkbox').change(function() {
    $('.box').removeClass('gray');
    $(this).closest('.box').addClass('gray');
    $('.checkbox').not(this).prop('checked', false);
  });

  function selectstandedpack($id){
    $("#select_plan").hide();
    $("#payment").show();

    localStorage.setItem("standedplan", $id);
    loadpayment();
  }

  function startpayment(){
    $("#select_plan").hide();
    $("#payment").show();
    var form = $("#addcusProductForm")[0];
    var formData = new FormData(form);
    var locationText = $("#location option:selected").text();
    formData.append('locationname', locationText);
    //addnew plan and get id
    $.ajax({
            url: "lib/routes/pack/addcustompack.php",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
              localStorage.setItem("customplan", data);
              loadpayment();
            },
            error: function(xhr, status, error) {
               
            }
        });
  }

  function loadpayment(){
    $.get("lib/routes/users/getuserdata.php", {
        uid:$("#input_user_id").val()
        }, function (res) {
        var jdata = jQuery.parseJSON(res);

        localStorage.setItem("customerid", jdata.user_id);
        localStorage.setItem("customername", jdata.user_name);
            $("#sunmane").text(jdata.user_name);
            $("#sumphone").text(jdata.user_phone);
            
        })
        let type = localStorage.getItem("category");
        $("#sumrestype").text(type);
        if (localStorage.getItem("customplan") != null) {
          $("#sumpname").text("Custom Plan");}
          let pid = localStorage.getItem("customplan");
          $.get("lib/routes/pack/getcusprodata.php", {
        uid:pid
        }, function (res) {
        var jdata = jQuery.parseJSON(res);
        localStorage.setItem("price", jdata.packagePrice);
        $("#sumprice").text(jdata.packagePrice);
        $("#sumadvance").text((jdata.packagePrice)*40/100);
        })
        if (localStorage.getItem("standedplan") != null) {
          let pid = localStorage.getItem("standedplan");
          $.get("lib/routes/pack/getprodata.php", {
        uid:pid
        }, function (res) {
        var jdata = jQuery.parseJSON(res);
        localStorage.setItem("price", jdata.packagePrice);
        $("#sumpname").text(jdata.productName);
        $("#sumprice").text(jdata.packagePrice);
        $("#sumadvance").text((jdata.packagePrice)*40/100);
        })
         }
         let date = localStorage.getItem("date");
        $("#sumdate").text(date);
        
  }

  function placeresavation(){
    const checkbox1 = document.getElementById('checkbox1');
    const checkbox2 = document.getElementById('checkbox2');
    if (checkbox1.checked || checkbox2.checked) {
      if(checkbox1.checked){
        localStorage.setItem("payment", "online");
        var minpay =localStorage.getItem("price")*40/100;
      
        if($("#amount").val() >= minpay){
          localStorage.setItem("advance", $("#amount").val());
            //make resavation
            let pid="";
            let ptype ="";
            if (localStorage.getItem("customplan") != null) {
              pid = localStorage.getItem("customplan");
              ptype = "custom";
            }
            if (localStorage.getItem("standedplan") != null) {
              pid = localStorage.getItem("standedplan");
              ptype = "standed";
            }
            var data = {
              customer: localStorage.getItem("customerid"),
              date: localStorage.getItem("date"),
              type: localStorage.getItem("category"),
              price: localStorage.getItem("price"),
              payment: localStorage.getItem("payment"),
              advance: localStorage.getItem("advance"),
              ptype: ptype,
              pid: pid
            };

            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Resavation Placed Successfullt',
              showConfirmButton: false,
              timer: 1500
            })

            $.get("lib/routes/reservation/makeresavation.php", data, function(res) {
              localStorage.setItem("orderid", res);
              window.open("lib/view/invoice/invoive_bill_online.php?id=" + res, "PixelZone", "width=700, height=600");
            });
            function redirectAfterDelay() {
            window.location.href = "lib/view/design.php";
          }
          setTimeout(redirectAfterDelay, 3000);
        }else{
          Swal.fire(
            'Payment?',
            'Please Check Payied Amount!',
            'question'
          )
        }
      }
      if(checkbox2.checked){
        localStorage.setItem("payment", "offline");
            if (localStorage.getItem("customplan") != null) {
              pid = localStorage.getItem("customplan");
              ptype = "custom";
            }
            if (localStorage.getItem("standedplan") != null) {
              pid = localStorage.getItem("standedplan");
              ptype = "standed";
            }
            var data = {
              customer: localStorage.getItem("customerid"),
              date: localStorage.getItem("date"),
              type: localStorage.getItem("category"),
              price: localStorage.getItem("price"),
              payment: localStorage.getItem("payment"),
              advance: "0.00",
              ptype: ptype,
              pid: pid
            };
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Resavation Placed Successfullt',
              showConfirmButton: false,
              timer: 1500
            })
            $.get("lib/routes/reservation/makeresavation.php", data, function(res) {
              localStorage.setItem("orderid", res);
              window.open("lib/view/invoice/invoive_bill_online.php?id=" + res, "PixelZone", "width=700, height=600");
            });

            function redirectAfterDelay() {
            window.location.href = "lib/view/design.php";
          }
          setTimeout(redirectAfterDelay, 3000);
      }
    }else{
      Swal.fire(
      'Payment?',
      'Please Select Payment Methord',
      'question'
    )
    }
  }

  function customplan() {
    $("#loadallplans").hide();
    $("#custamizeplan").show();

    $.get("lib/routes/price/loadlocationdrop.php", {}, function (res) {
        $("#location").html(res);
    });

    $.get("lib/routes/price/getpricelist.php", {}, function (res1) {
        var jdata = jQuery.parseJSON(res1);

        upunedited = (jdata.unedited );
        upedited = (jdata.edited );
        upword = (jdata.work );
        upablem = (jdata.albem );
        upenlargement = (jdata.enlargement);
        upthankyou = (jdata.thankyou );
        updistance = (jdata.distance );
    });

  }

  function caltotal(){
    var total = 0.00;
    var location = parseFloat($('#location').val()) || 0;
    var distance = parseFloat($('#distance').val()) || 0;
    var edited = parseFloat($('#edited').val()) || 0;
    var unedited = parseFloat($('#unedited').val()) || 0;
    var work = parseFloat($('#work').val()) || 0;
    var album = parseFloat($('#album').val()) || 0;
    var enlargements = parseFloat($('#enlargments').val()) || 0;
    var thankyou = parseFloat($('#thankyou').val()) || 0;

    total = total + location;
    total = total + distance * updistance;
    total = total + edited * upedited;
    total = total + unedited * upunedited;
    total = total + work * upword;
    total = total + album * upablem;
    total = total + enlargements * upenlargement;
    total = total + thankyou * upthankyou;
    $("#price").val(total);
    $("#finaltotal").text(total.toFixed(2) + " LKR");

  }

  function basicpack() {
    $("#loadallplans").show();
    $("#custamizeplan").hide();
  }

  function showCards() {
    $(".card").hide();
    $(".card").slice(currentPosition, currentPosition + visibleCards).show();
  }

  function updateButtons() {
    $("#prevBtn").prop("disabled", currentPosition <= 0);
    $("#nextBtn").prop("disabled", currentPosition + visibleCards >= cardCount);
  }

  $("#prevBtn").click(function () {
    if (currentPosition > 0) {
      currentPosition--;
      showCards();
      updateButtons();
    }
  });

  $("#nextBtn").click(function () {
    if (currentPosition + visibleCards < cardCount) {
      currentPosition++;
      showCards();
      updateButtons();
    }
  });

  function proceed() {
    if ($userid == "") {
      window.location.href = "lib/view/login.php";
    } else {
      $("#select_plan").show();
      $("#makeresavation").hide();
      $("#success").hide();
      $("#erroe").hide();
      $("#home").hide();

      $("#loadallplans").show();
      $("#custamizeplan").hide();

      $.get("lib/routes/pack/viewallpack.php",
      {type:$("#category").val()}, function (res) {
        //display data 
        $("#loadpackegers").html(res);

        cardWidth = $(".card").outerWidth();
        cardCount = $(".card").length;

        showCards();
        updateButtons();
      })



    }
  }

  function resavenow() {
    $("#home").hide();
    $("#makeresavation").show();
  }

  function calcle() {
    location.reload();
  }

  function redate() {
    $("#makeresavation").show();
    $("#home").hide();
    $("#success").hide();
    $("#erroe").hide();
    $("#category").val("");
    $("#myDatePicker").val("");
  }

  function clickedAction() {
    //get inputs
    $category = $("#category").val();
    $date = $("#myDatePicker").val();

    if ($category == "" || $date == "" || $category == 0) {
      Swal.fire(
        'error',
        'Please Select Category and Date!',
        'question'
      );
    } else {
      $.get("lib/routes/reservation/checkdate.php", {
        date: $date,
        category: $category
      }, function (res1) {
        if (res1 == "01") {
          $("#makeresavation").hide();
          $("#success").show();

          localStorage.setItem("category", $category);
          localStorage.setItem("date", $date);

        } else if (res1 == "02") {
          $("#makeresavation").hide();
          $("#erroe").show();
        }
      });
    }
  }
</script>

</html>