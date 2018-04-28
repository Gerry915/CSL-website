<?php
    $msg = "";
    $msgClass = "";

    if(filter_has_var(INPUT_POST,'submit')){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        

        if(!empty($name) && !empty($email)){
            $mailTo = "request@csltas.com.au";
            $headers = "From: ".$email;
            $txt = "You have received an email from:  " .$name."\n\n".$message;
            $subject = "Quote from CSLTAS website";
    
            if(mail($mailTo, $subject, $txt, $headers)){
                $msg = "Your message has been sent";
                $msgClass = "success";
            }else{
                $msg = "Something went wrong, please try again later";
                $msgClass = "danger";
            }
        }else{
            $msg = "Please enter all field";
            $msgClass = "danger";
        }

        

    }

?>
<!doctype html>
<html lang="en">

<head>
    <title>CSL TAS | Complete storage and logistics</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Zilla+Slab+Highlight:700" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/mystyle.css">
    <!--Font Awesome-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/regular.js" integrity="sha384-t7yHmUlwFrLxHXNLstawVRBMeSLcXTbQ5hsd0ifzwGtN7ZF7RZ8ppM7Ldinuoiif"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c"
        crossorigin="anonymous"></script>
</head>

<body id="main" onscroll="myFun()">
    <nav id="nav" class="navbar navbar-expand-md navbar-light fixed-top">
        <a href="#" class="navbar-brand">
            <img id="logo"  src="./src/img/CSLTAS-LOGO-WITH-BG.png" alt="csltas">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cslnav" aria-controls="cslnav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="cslnav">
            <ul class="test navbar-nav ml-auto pr-3">
                <li class="nav-item active mr-3">
                    <a id="nav-text1" class="nav-link text-muted smoothScroll" href="#main">Home</a>
                </li>
                <li class="nav-item mr-3">
                    <a id="nav-text2" class="nav-link text-muted smoothScroll" href="#services">Services</a>
                </li>
                <li class="nav-item mr-3">
                    <a id="nav-text3" class="nav-link text-muted smoothScroll" href="#where">Location</a>
                </li>
                <li class="nav-item mr-3">
                    <a id="nav-text4" class="nav-link text-muted smoothScroll" href="#contact-us">Contact Us</a>
                </li>
                <li class="nav-item">
                        <button id="quote" type="button" class="btn-success nav-link text-light" data-toggle="modal" data-target="#get-quote">Get a quote</button>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Modal -->
<div class="modal fade" id="get-quote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Get a quote</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Name: <span class="text-muted">(*Require)</span></label>
                        <input type="name" name="name" class="form-control" id="name" placeholder="Name..." required
                        value="<?php echo isset($_POST['name']) ? $name : '';?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address: <span class="text-muted">(*Require)</span></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email..." required
                        value="<?php echo isset($_POST['email']) ? $email : '';?>">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                        value="<?php echo isset($_POST['message']) ? $message : '';?>"></textarea>
                    </div>
                    <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
              <button type="submit" name="submit" class="btn btn-success" value="submit">Submit</button>
            </div>
            <div class="alert-<?php echo $msgClass;?> row w-100 m-auto" >
                    <h4 class="text-center lead"><?php echo $msg;?></h4>
            </div>
                </form>
            </div>
            
          </div>
        </div>
      </div>

    <section id="main-title">
        <div id="test" class="d-flex title-div container justify-content-center">
            <h1 id="title" class="text-uppercase main-title-heading display-5">CSL provides a complete Logistics partner in Tasmania Tailoring to your Fleet, Freight and Warehousing needs.</h1>    
        </div>
    </section>

    <section id="subtitle">
        <div id="sub-title" class="d-flex container title-div justify-content-center hide">
            <h2 class="display-3 text-uppercase">Our Services</h2>
        </div>
    </section>

    <section id="home">
        <div class="main">
            <div class="overlay"></div>
                <figure id="main-img" class="main-img"></figure>
                <figure id="blur-img" class="blur-img"></figure>
        </div>
    </section>

    <section id="services" class="w-100">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-lg-4 s-card">
                        <div class="card service-card m-auto">
                                <img class="card-img-top service-img" src="./src/img/warehousing.jpg" alt="sample">
                                <div class="card-body bg-dark text-light">
                                    <h5 class="card-title lead">Warehouse</h5>
                                    <p class="card-text">With a fully customized and adapting WMS, CSL provides its 
                                        customers with an unrivalled accountability and reporting system to make sure your goods are kept in good
                                         hands. </p>
                                    <a href="#services" class="btn btn-info my-3 services-btn">Read more</a>
                                </div>
                            </div>
                </div>
                <div class="col-lg-4 s-card">
                        <div class="card service-card m-auto">
                                <img class="card-img-top service-img" src="./src/img/distribution.jpg" alt="sample">
                                <div class="card-body bg-dark text-light">
                                    <h5 class="card-title lead">Distribution</h5>
                                    <p class="card-text">From collection to delivery or management of your entire inventory CSL and <a href="https://www.empirecouriers.com.au/page/homepage">Empire Couriers</a> seamlessly
                                        provide fully integrated systems customised to your business requirements.
                                    </p>
                                    <a href="#distribution-fleet" class="btn btn-info my-3 services-btn">Read more</a>
                                </div>
                            </div>
                </div>
                <div class="col-lg-4 s-card">
                        <div class="card service-card m-auto">
                                <img class="card-img-top service-img" src="./src/img/fleet-management.jpg" alt="sample">
                                <div class="card-body bg-dark text-light">
                                    <h5 class="card-title lead">Fleet Management</h5>
                                    <p class="card-text">Complete Storage and Logistics provides comprehensive fleet management solution, improve efficiency and productivity of your 
                                        business. Reduce your overall transportation and staff costs.
                                    </p>
                                    <a href="#distribution-fleet" class="btn btn-info my-3 services-btn">Read more</a>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </section>

    <section id="warehouse" class="mb-5">
        <div class="container">
            <h1 class="display-5 pb-3 mb-3 main-title-heading">Warehouse</h1>
            <hr>
            <div class="row">
                <div class="col-lg-8">
                    <h3>Features</h3>
                    <p>With a fully customized and adapting WMS (Warehouse Management System) CSL provides its customers with an unrivalled 
                        accountability and reporting system to make sure your goods are kept in good hands. All orders received by 3pm will be dispatched the same day, 
                        and everything else within 24 hours.
                            Find out how competitive we are buy getting a no obligation quote 3pm despatched that day!</p>
                    <button id="quote" type="button" class="btn btn-outline-dark float-right mr-3">Get a quote</button>
                </div>
                <div class="col-lg-4">
                    <h3>Abilities include</h3>
                    <ul>
                        <li>Stock Take Reports</li>
                        <li>Activity Reports</li>
                        <li>Costing Breakdown</li>
                        <li>Stock Analysis</li>
                        <li>Bin Allocation</li>
                        <li>Re-order reminder</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="showcase">
        <div class="text-center showcase-div">
            <h3 class="text-capitalize text-light" style="padding-top:150px; ">CSL offer a specialised end-to-end management of 3PL Distribution and Storage solutions. <br>
                Saving you Money,Time and Capital investment</h3>
            <button type="button" id="quote" class="mt-5 btn-lg btn-success">Get a Quote</button>
        </div>
    </section>

    <section id="grid-features" class="my-5">
        <div class="container">
            <div id="first-row" class="row">
                <div class="feature col-md-4 text-center p-5">
                    <i class="fas fa-desktop feature-icon" style="height:70px; width: auto; color:darkslategrey"></i>
                    <p class="lead">Integrated Software</p>
                    <p class="text-muted">Customized Warehouse Management System</p>
                </div>
                <div class="feature col-md-4 text-center p-5">
                        <i class="fas fa-paperclip feature-icon" style="height:70px; width: auto; color:darkslategrey"></i>
                        <p class="lead">Flexible Contracts</p>
                        <p class="text-muted">
                                CSL offers customised contractual options making it practical and 
                                affordable for a business of any size to house items in our warehouse</p>
                </div>
                <div class="feature col-md-4 text-center p-5">
                        <i class="far fa-handshake feature-icon" style="height:70px; width: auto; color:darkslategrey"></i>
                        <p class="lead">Partnerships</p>
                        <p class="text-muted">With the high freight movement and our strategic partners, CSL 
                            generates the lowest cost freight around the State, Nation and even World-wide</p>
                </div>
            </div>
            <div id="first-row" class="row">
                    <div class="feature col-md-4 text-center p-5">
                        <i class="fas fa-lock feature-icon" style="height:70px; width: auto; color:darkslategrey"></i>
                        <p class="lead">Extensive Security Monitoring</p>
                        <p class="text-muted">
                            With nothing less than 17 Cameras and state of the art alarm systems, customers can rest assured their 
                            product is safe. All stock is kept safe in our fully alarmed warehouse with back to base monitoring.</p>    
                    </div>
                    <div class="feature col-md-4 text-center p-5">
                        <i class="fas fa-users feature-icon" style="height:70px; width: auto; color:darkslategrey"></i>
                        <p class="lead">Professional Staff</p>
                        <p class="text-muted">
                            CSL company culture prides itself on accuracy, efficiency and customer service. Our fully trained team are professional 
                            and friendly, and look forward to working with you and the needs of your business.</p>    
                    </div>
                    <div class="feature col-md-4 text-center p-5">
                        <i class="far fa-compass feature-icon" style="height:70px; width: auto; color:darkslategrey"></i>
                        <p class="lead">Locations</p>
                        <p class="text-muted">
                            Our competitive advantage comes from having multi locations, with Locations in heart of the commercial business 
                            district of Hobart (Derwent Park) and Launceston, (South Launceston) We offer over 2000 sq meters of undercover secure facilities.
                            </p> 
                    </div>
                </div>
        </div>
    </section>


<!--Services section with button group-->

    <section id="distribution-fleet" class="my-5">
        <div class="container mt-5">
            
                <h1 class="display-5 text-center p-3 main-title-heading">Distribution & Fleet Management</h1>
                <hr>
                <p class="text-muted text-center p-3">CSL provides a complete Logistics partner in Tasmania Tailoring to your Fleet, Freight and Warehousing needs.</p>
                <div class="btn-group d-flex justify-content-center" role="group" aria-label="Basic example">
                        <button id="distribution" type="button" class="long-btn btn btn-outline-dark" onclick="showSection(this.id)">Distribution</button>
                        <button id="fleet" type="button" class="long-btn btn btn-outline-dark" onclick="showSection(this.id)">Fleet Management</button>
                      </div>

            <div id="distribution-list" class="hide-section" style="display: block">
                <ul class="mt-5 text-left services-list">
                    <li><span class="mr-5"><i class="far fa-check-square"></i></span>Partnerships with carriers State-wide, Nationwide and Worldwide</li>
                    <li><span class="mr-5"><i class="far fa-check-square"></i></span>Same Day and Next Day delivery</li>
                    <li><span class="mr-5"><i class="far fa-check-square"></i></span>Urgent Deliveries locally and State-wide</li>
                 </ul>
            </div>
            <div id="fleet-list" class="hide-section">
                <ul class="mt-5 text-left services-list">
                    <li><span class="mr-5"><i class="far fa-check-square"></i></span>Modern Fleet</li>
                    <li><span class="mr-5"><i class="far fa-check-square"></i></span>GPS Tracking</li>
                    <li><span class="mr-5"><i class="far fa-check-square"></i></span>OHS aware</li>
                </ul>
             </div> 
        </div>
    </section>

<!--<section id="fleet-management" class="mb-5">
        
        <div class="container">
            <div class="card-group">
                <div class="card p-3 text-right">
                    <div class="card-body">
                        <h3 class="card-title">Fleet Managment</h3>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi tenetur 
                            numquam earum similique explicabo fugit deserunt optio eaque inventore, doloremque unde et consequatur 
                            fugiat ipsum totam voluptatibus eveniet, sunt repellat?</p>
                            <a href="#" class="btn btn-outline-primary mt-5">Learn More</a>
                    </div>
                </div>
                <div class="card p-3 text-right">
                    <div class="card-body">
                        <h3 class="card-title">Distribution</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus nihil soluta culpa aperiam,
                             in, explicabo ipsa quisquam iusto consequuntur eos laborum voluptates minima atque! Mollitia nemo quam rem, 
                             id minima laborum quae veritatis magni deserunt.</p>
                        <a href="#" class="btn btn-outline-primary mt-5">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    
    

    <section id="goo-map" class="">
        <div id="google-map" class="container">
            <h1 id="where" class="text-center display-5 mb-3 main-title-heading">OUR LOCATION</h1>
            <p class="text-muted text-center">Complete Storage and Logistics is located in a secure environment which is monitored 24/7 for client satisfaction. 
                    For more information please give us a call or contact via email</p>
            <hr class="mb-5">
        </div>
        <div id="map"></div>
    </section>


    <section id="contact-us" class="my-5 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <img class="w-100" src="./src/img/CLS-SIGN.jpg" alt="about" style="border-radius: 5px">
                    </div>
                    <div class="col-lg-7">

                            <h1 class="display-5 main-title-heading my-3">ABOUT US</h1>
                            <p>Complete Storage & Logistics is a 100% Tasmania owned and operated company. Beginning as a small freight company with just two
                                vans, over the years we have not only grown considerably across the state, but diversified our service. Growing all aspect of the business from the ground up has given
                                us the direction and knowledge of all aspect of the business.
                            </p>
                            <br>
                            <p>We have proudly established a reputation of quality and efficiency within our community and enjoy working for and alongside other local Tasmanian business
                                ,as well as servicing our National and International partners.
                            </p>
                    </div>
                    
                </div>
            </div>
        </section>

    <section id="foot" class="bg-dark text-light py-5" style="font-size: 12px">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <p class="lead">CONTACT INFO</p>
                    <p class="">(P) (03) 62 723 535</p>
                    <p class="">(F) (03) 62 723 118</p>
                    <p class="">(E) info@csltas.com.au</p>
                </div>
                <div class="col-lg-3">
                    <p class="lead">CSL TAS PRICING</p>
                    <p class="">CSL TAS offers some of the most competitive pricing in Tasmania! Simply ask for a no obligtion quote and we
                        will accommodate your needs.
                    </p>
                </div>
                <div class="col-lg-3">
                    <p class="lead">EMPIRE COURIERS</p>
                    <p class=""><span><a href="https://www.empirecouriers.com.au/">Empire Couriers</a></span> is CSL's sister business catering for all of you freighting needs from Letters to Pallets. 
                        There are some fantastic advantages with working with our sister company! Head on over and take a look at what they can offer 
                        for all your couriering needs.
                    </p>
                </div>
                <div class="col-lg-3">
                    <p class="lead">ABOUT US</p>
                    <p class="">CSL offer a specialised end-to-end management of 3PL Distribution and Storage solution. Saving your money, time and capital investment.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <br>
    <div id="end" class="container mt-2">
        <footer class="text-muted" style="font-size: 10px">Visit our sister business at <a href="https://www.empirecouriers.com.au/page/homepage">Empire Couriers</a> and <a href="https://www.budgetbox.com.au/">Budget Box Mobile Storage</a></footer>
        <hr>
        <footer class="text-muted mb-3" style="font-size: 10px">Copyright &copy; 2018 CSL TAS All rights reserved.</footer>
    </div>
    
    <!--Google maps-->
    <script>
        function initMap(){
            var options = {
                zoom: 17,
                center: {lat:-42.8324695,lng:147.2857454}
            }

            var map = new google.maps.Map(document.getElementById('map'),options)

            var marker = new google.maps.Marker({
                position:{lat:-42.832427,lng:147.286887},
                map:map
            })

            var infowindow = new google.maps.InfoWindow({
                content: '<p class="lead">Complete Storage and Logistics</p><p>37 Howard Rd, Glenorchy, TAS 7010</p>'
            })

            marker.addListener('mouseover',function(){
                infowindow.open(map,marker)
            })

        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA5VIEILj9XHxY1mtQbLwpI3_vMoVCEY8&callback=initMap">
    </script>


    <!-- Optional JavaScript -->

    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="./src//js/app.js"></script>

    <script>
        window.sr = ScrollReveal();

        sr.reveal('#title',{
            duration:1000,
            origin: 'left',
            distance: '200px',
            viewFactor: 0.5
        });

        sr.reveal('.feature',{
            duration:1000,
            origin: 'bottom',
            distance: '100px',
            viewFactor: 0.5
        });

        sr.reveal('.service-card',{
            duration: 1000,
            origin: 'bottom',
            distance: '300px',
            viewFactor: 0.5
        })
    </script>
</body>

</html>