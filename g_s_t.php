<!DOCTYPE html>
<html lang="en">

<head>
<title>GST Calculator India</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <!-- Custom fonts for this template -->
 <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
 <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
 <html lang='en'>  <head profile="http://www.w3.org/2005/10/profile">
  <link rel='shortcut icon' href='economica/favicon.jpg' type='image/x-icon' />

  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width; initial-scale=1.0"> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" />
  <script type='text/javascript' src="//www.easycalculation.com/jquery.js"> </script>
  <script language=javascript src="//www.easycalculation.com/numeric.js"></script>
  <script language=javascript src="//www.easycalculation.com/common.js"></script>

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>



  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <style type="text/css">
  .bg-light-gray {
    background-color: #f7f7f7;
  }
  .h1 {
    text-shadow:5px 5px 10px white;
  }
  .footer-social { float: center; margin-top:5px;}
  .footer-social li {  display: inline;float:center;}
  .footer-social span {margin-left: 2 40px; }
  .read-more-state {
    display: none;
  }
  .stand { width:20%!important;}
  .stand_num {
    color: #f27669;
    font: bold 16px/40px Tahoma;
  }

  @media screen and (max-width: 480px) 
  {
    .stand { width:auto !important;max-width:90% !important;}
    .stand_num {   font: bold 12px/30px Tahoma;
    }
  }
</style>
</head>
<body>

  <!-- Navigation -->
  <?php
  include 'navigation.php'
  ?>






  <script>
    var iresult;
    var gstchk = true;
    function calculate() {
      var ahname = easyCommonInputCalculation('a','','Amount');
      var option=$('#ar').val();
      if(ahname=='') {
        alert('Please Enter Valid Amount');
        $('#resR').hide();
      }
      else {
        $('#resR').show();
        var ghname = $('#ghname').val();
        if(ghname == '') {
          ghname = $('#gst').val();
        }
        else {
          rangecheck();
        }
        ghname = parseFloat(ghname);

        if(option=='a') {
          taxAmnt = (ahname/100)*ghname;
          iresult=ahname+parseFloat(taxAmnt);
        }
        else {
          var taxRemv= (100 / (parseFloat(100)+parseFloat(ghname)) );
          iresult=ahname*taxRemv;
          taxAmnt = (ahname -iresult);
        }

        if(gstchk == true) {
          var ihname = easyCommonResultCalculation('i','');
          $('#ihname').html(easyRoundOf(ihname,2)+' &#8377;');
          $('#thname').html(easyRoundOf(ghname,2));
          $('#vhname').html(easyRoundOf(taxAmnt,2)+' &#8377;');
          $('#xhname').html(ahname+' &#8377;');
        }
        else {
          $('#resR').hide();
        }
      }
    }
    
    function rangecheck()
    {
      var ghname = $('#ghname').val();
      if((parseFloat(ghname)<5 || parseFloat(ghname)>28) && ghname != '') {
        alert('Enter Rate of GST between 5 and 28');
        gstchk = false;
      }
      else {
        gstchk = true;
      }
    }
    
    function rst()
    {
      $('#resR').hide();
      gstchk = true;
    }
    
    $(document).ready( function() {
      rst();
    });
  </script><script type='text/javascript'>window.location.href='https://www.easycalculation.com/finance/gst-calculator-india.php''</script><link href="//www.easycalculation.com/css/style.css" rel="stylesheet" type="text/css">
  <link href="//www.easycalculation.com/css/embedded.css" rel="stylesheet" type="text/css">
  <div class="ec_calculator_gen clearfix" style="position:relative; margin:0px !important;">
    <div class="ec_frame_logo"><a href="https://www.easycalculation.com" target="_blank"><img src="//www.easycalculation.com/images/logo-iframe.png" width="236" height="23" alt="ec frame logo"></a></div>
    <form name=first><div id="dispCalcConts">
      <h2 style="text-align:center;margin: 110px"><font size="+3">GST Calculator India</font></h2><div class='calc_tab clearfix' tabindex='0'>
        <ul>

          <li class='sel_tab'><a href='g_s_t.php'>GST Calculator India</a></li>
        </ul>
      </div>
      <div class='clear'> </div>
      <div class='ec_calculator_gen clearfix' style='margin:0px'>
        <h2>Goods and Services Tax Calculator</h2>
        <form>
          <div class='group clearfix'>
            <div class='group_con_40 clearfix'>
              <label>Amount</label>
              <span class='width_100'><input id=ahname type='text' class='easypositive' >
              </span> <span class='units' id='aunit'>&#8377;</span>
            </div>
            <div class='group_con_40'>
              <label>Select</label>
              <span class='width_100'>
                <select onchange='calculate()' id='ar'>
                  <option selected value='a'>Add GST</option>
                  <option value='r'>Remove GST</option>
                </select>
              </span>
            </div>
          </div>

          <div class='group clearfix'>
            <div class='group_con_40'>
              <label>Select Rate of GST</label>
              <span class='width_100'>
                <select onchange='calculate()' id='gst'>
                  <option selected value='5'>5%</option>
                  <option value='12'>12%</option>
                  <option value='18'>18%</option>
                  <option value='28'>28%</option>
                </select>
              </span>
              <span> (or) </span>
            </div>
            <div class='group_con_40'>
              <label>Rate of GST</label>
              <span class='width_100'><input id=ghname type='text' class='easypositive' onkeyup='rangecheck()'>
              </span> <span class='units' id='gunit'>%</span>
            </div>
          </div>

          <input type=button value='Calculate' onclick=calculate()><input type=reset value=Reset onclick=rst()>

          <div id='resR' class='margin_both group clearfix'>
            <div class='stand'>
              <div class='stand_tit'>Original Cost</div>
              <div class='stand_num' id='xhname'> </div>
            </div>
            <div class='stand'>
              <div class='stand_tit'>GST %</div>
              <div class='stand_num' id='thname'> </div>
            </div>
            <div class='stand'>
              <div class='stand_tit'>GST Price</div>
              <div class='stand_num' id='vhname'> </div>
            </div>
            <div class='stand'>
              <div class='stand_tit'>Net Price</div>
              <div class='stand_num' id='ihname'> </div>
            </div>
          </div>
        </form>
      </div></div> </form>
                <script type="text/javascript">
        function alert(val)
        {
          $("#dynErrDisp").show();
          $("#dynErrDisp").html(val);
        }
      </script>
      
      <?php
      include 'footer.php'
      ?>



      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>