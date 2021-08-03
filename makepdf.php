<?php

require_once __DIR__ . '/vendor/autoload.php';


// Grab the variables 
// if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $member = $_POST['member'];
    $date = $_POST['date'];
    $nationality = $_POST['nationality'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $emergency =$_POST['emergency'];


// }

// create new PDF instance
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [105, 148]]);

// book mark of pdf
$mpdf->Bookmark('Start of the document');


// $data = file_get_contents('content.php');
$data = '
<head>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    
    <!-- ########################## front page ########################## -->
    <div class="container">
            <div class="content">
                <h1 class="title">Volunteer Passport</h1>
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/big_logo.png" width="40%" alt="big-logo"/>
                        <div class="text-container">
                            <p class="text">Service <br>Volontaire<br> International</p>
                        </div>
            </div>
     </div>
        <!-- ########################## logo page  ########################## -->
            <div>
            <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/04.png" style="width:100%;" alt="SVI">
            </div>
        <!-- ########################## second page ########################## -->
            <div class="cover-bg">
                <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/03.png" alt="SVI">
            </div>
            <div class="cover-text">
                <p class="title-header">Service Volontaire international</p>
                <h1 class="title-content">Volunteer passport</h1>
            </div>
        <!-- ########################## profile page one ##########################-->

                    <div class="bg-container">
                        <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/01.png"  alt="SVI">
                    </div>
                    <div class="page-number-left">
                        <h2>2</h2>
                    </div>
                    <div class="profile-pic">
                            <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/06.png" alt="personal photo">
                    </div>
                    <div class="img-border">
                        <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/05.png" class="img-broder-b" alt="border img">
                    </div>
                    <div class="profile-details">
                        <p class="profile-text">First Name: <u>' . $fname . '</u><br><sub class="tgray">(prènom)</sub></p>
                        <p class="profile-text">Last Name: <u>' . $lname . '</u><br><sub class="tgray">(nom)</sub></p>
                        <p class="profile-text">Membership Number: <u>' . $member . '</u><br><sub class="tgray">(numero de membre)</sub></p>
                    </div>
                    <div class="sign">
                        <p class="profile-text">Signature____________<br><sub class="tgray">(signature)</sub></p>
                    </div>
                
                <!-- ########################## profile page two ########################## -->

                <div class="perso-info-bg">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/02.png" alt="">
                </div>
                <div class="page-number-right">
                        <h2>3</h2>
                </div>
                <div class="SVI-heading">
                    <p class="profile-text2">Authority:SVI<br><sub class="tgray2">(autorite)</sub></p>
                    <p class="profile-text2">Code of the issuing organization:SVI<br><sub class="tgray2">(code de l\'organisme emetteur)</sub></p>
                    <p class="profile-text2">Birth date: <u>' . $date . '</u><br><sub class="tgray2">(date de naissance)</sub></p>
                    <p class="profile-text2">Nationality: <u>' . $nationality . '</u><br><sub class="tgray2">(nationalite)</sub></p>
                    <p class="profile-text2">Current address: <u>'. $adress . '</u><br><sub class="tgray2">(addresse actuelle)</sub></p>
                    <p class="profile-text2">City: <u>' . $city . '</u><br><sub class="tgray2">(ville)</sub></p>
                    <p class="profile-text2">Country:<u>' . $country . '</u><br><sub class="tgray2">(pays)</sub></p>
                    <p class="profile-text2">Mobile phone: <u>' . $phone . '</u><br><sub class="tgray2">(numero de portable)</sub></p>
                    <p class="profile-text2">Emergency number: <u>' . $emergency . '</u><br><sub class="tgray2">(numero d\'urgence)</sub></p>
                </div>
                <div class="gender">
                    <p class="profile-text2">Sex: <u>' . $gender . '</u><br><sub class="tgray2">(sexe)</sub></p>
                </div>
                <!-- ########################## Additional information ########################## -->
                <div class="bg-container">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/01.png"  alt="SVI">
                </div>
                <div class="page-number-left">
                        <h2>4</h2>
                </div>
                <div class="header-info">
                    <p class="title-add">Additional information</p>
                </div>
                <div class="SVI-additonal-info">
                    <p class="profile-text3">Insurance number<br><sub class="tgray2">(numero d\'assurance)</sub></p>
                    <p class="profile-text3">Health problems<br><sub class="tgray2">(problemes de sante)</sub></p>
                    <p class="profile-text3">Extra information<br><sub class="tgray2">(informations supplementaires)</sub></p>
                </div> 

            <!-- ########################## Project information right ########################## -->

            <div class="perso-info-bg">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/02.png" alt="">
                </div>
                <div class="page-number-right">
                        <h2>5</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>

                <!-- ########################## Project information left ########################## -->
                <div class="bg-container">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/01.png"  alt="SVI">
                </div>
                <div class="page-number-left">
                        <h2>6</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>
                <!-- ########################## Project information right ########################## -->

            <div class="perso-info-bg">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/02.png" alt="">
                </div>
                <div class="page-number-right">
                        <h2>7</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>
                 <!-- ########################## Project information left ########################## -->
                 <div class="bg-container">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/01.png"  alt="SVI">
                </div>
                <div class="page-number-left">
                        <h2>8</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>
                <!-- ########################## Project information right ########################## -->

            <div class="perso-info-bg">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/02.png" alt="">
                </div>
                <div class="page-number-right">
                        <h2>9</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>
                 <!-- ########################## Project information left ########################## -->
                 <div class="bg-container">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/01.png"  alt="SVI">
                </div>
                <div class="page-number-lefttwo">
                        <h2>10</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>
                <!-- ########################## Project information right ########################## -->

            <div class="perso-info-bg">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/02.png" alt="">
                </div>
                <div class="page-number-righttwo">
                        <h2>11</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>
                 <!-- ########################## Project information left ########################## -->
                 <div class="bg-container">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/01.png"  alt="SVI">
                </div>
                <div class="page-number-lefttwo">
                        <h2>12</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>
                <!-- ########################## Project information right ########################## -->

            <div class="perso-info-bg">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/02.png" alt="">
                </div>
                <div class="page-number-righttwo">
                        <h2>13</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>
                 <!-- ########################## Project information left ########################## -->
                 <div class="bg-container">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/01.png"  alt="SVI">
                </div>
                <div class="page-number-lefttwo">
                        <h2>14</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>
                <!-- ########################## Project information right ########################## -->

            <div class="perso-info-bg">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/02.png" alt="">
                </div>
                <div class="page-number-righttwo">
                        <h2>15</h2>
                </div>
                <div class="header-project">
                    <p class="title-pro">Project informaition</p>
                </div>
                <div class="pro-info">
                    <p class="profile-text2">Name<br><sub class="tgray2">(nom)</sub></p>
                    <p class="profile-text2">Dates<br><sub class="tgray2">(dates)</sub></p>
                    <p class="profile-text2">Location<br><sub class="tgray2">(localisation)</sub></p>
                    <p class="profile-text2">Code<br><sub class="tgray2">(code)</sub></p>
                    <p class="profile-text2">Type<br><sub class="tgray2">(type)</sub></p>
                </div> 
                <div class="pro-sign">
                        <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>________________________</p>
                        <p class="profile-text2">Signature______________<br><sub class="tgray2">(signature)</sub></p>
                </div>

                <!-- ########################## Project information left ########################## -->
                <div class="bg-container">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/01.png"  alt="SVI">
                </div>
                <div class="page-number-lefttwo">
                        <h2>16</h2>
                </div>
                  <!-- ########################## Project information right ########################## -->

            <div class="perso-info-bg">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/02.png" alt="">
                </div>
                <div class="page-number-righttwo">
                        <h2>17</h2>
                </div>
                <!-- ########################## Project information left ########################## -->
                <div class="bg-container">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/01.png"  alt="SVI">
                </div>
                <div class="page-number-lefttwo">
                        <h2>18</h2>
                </div>
                  <!-- ########################## Project information right ########################## -->

            <div class="perso-info-bg">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/02.png" alt="">
                </div>
                <div class="page-number-righttwo">
                        <h2>19</h2>
                </div>

                <!-- ########################## address page ########################## -->
            <div class="cover-bg">
                <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/03.png" alt="SVI">
            </div>
            <div class="newsletter">
                <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/logo_newsletter.png" alt="newsletter SVI">
            </div>
            <div class="cover-text1">
                <p class="title-header">Service Volontaire international</p>
            </div>
            <div class="address-container">
                <div>
                    <h4>Postal address</h4>
                    <p>21, Boucle des metiers, 1348 Louvain-La-Neuve</p>
                    <hr class="red-line">
                </div>
                <div class="address-content">
                <h4>Website</h4>
                <p>WWW.servicevolontaire.org</p>
                <hr class="red-line">
                </div>
                <div class="address-content">
                <h4>Office hours</h4>
                <p>Monday - Friday 9 AM to 18 PM (GMT + 2:00)</p>
                <hr class="red-line">
                </div>
                <div class="address-content">
                <h4>Phone</h4>
                <p>+32 2 888 67 13</p>
                <p>+32 2 840 72 00</p>
                <p>+32 69 60 90 65</p>
                <hr class="red-line">
                </div>
                <div class="address-content">
                <h4>Email</h4>
                <p>info@servicevolontaire.org</p>
                <hr class="red-line">
                </div>
                <div class="address-content">
                <h4>Facebook</h4>
                <p>facebook.com/servicevolontaireinternational</p>
                <hr class="red-line">
                </div>
            </div>
                 <!-- ########################## logo page  ########################## -->
                 <div>
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/04.png" style="width:100%;" alt="SVI">
                </div>
                <!-- ########################## last page ########################## -->
            <div class="footer-content">
                    <img src="/Applications/XAMPP/xamppfiles/htdocs/pdfapp/images/logo_newsletter.png" width="46%" alt="big-logo"/>
                        <div class="footer-container">
                            <p class="text-footer">+32 2 888 67 13</p>
                        </div>
            </div>
            
</body>
';

$mpdf->showImageErrors = true;
$mpdf->WriteHTML($data);

// output to browser
$mpdf->Output();

