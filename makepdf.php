<?php

require_once __DIR__ . '/vendor/autoload.php';

// Grab the variables
if (isset($_POST['submit'])) {
    // require_once 'db_conn.php';
    $fname = val($_POST['fname']);
    $lname = val($_POST['lname']);
    $gender = val($_POST['gender']);
    $member = val($_POST['member']);
    $date = val($_POST['date']);
    $nationality = val($_POST['nationality']);
    $adress = val($_POST['address']);
    $city = val($_POST['city']);
    $country = val($_POST['country']);
    $phone = val($_POST['phone']);
    $emergency = val($_POST['emergency']);


    // validation name & last name & nationality $ city & country

    //     if (!preg_match("/^[a-zA-z]*$/", $fname)) {
    //         $em = "You must use charaters";
    //         header("Location: index.php?error=$em");
    //     }

    //     if (!preg_match("/^[a-zA-z]*$/", $lname)) {
    //         $em = "You must use charaters";
    //         header("Location: index.php?error=$em");
    //     }
    //     // if (!filter_var($fname, FILTER_SANITIZE_STRING) || !filter_var($lname, FILTER_SANITIZE_STRING)) {
    //     //     $errorMes = '<div class="alert alert-danger role="alert">You must use charaters</div>';
    //     // }

    //     // Phone validation
    //     if (preg_match("/^[+][1-9][0-9]{9,14}$/", $phone) || preg_match("/^[+][1-9][0-9]{9,14}$/", $emergency)) {
    //         $count = 1;
    //         $phone = str_replace(['+'], '', $phone, $count);
    //         $emergency = str_replace(['+'], '', $emergency, $count);
    //     } else {
    //         $em = "Enter the country code";
    //         header("Location: index.php?error=$em");
    //     }


    //     // number validation
    //     if (!is_numeric($member)) {
    //         $em = "Only numbers are allowed.";
    //         header("Location: index.php?error=$em");
    //     }

    //     // Birth date validation

    //     if (empty($date)) {
    //         $em = "Enter Your Birth Date";
    //         header(("Location: index.php?error=$em"));
    //     }
    //     $strSystemMaxDate = (date('Y') - 15) . '/' . date('m/d');
    //     if (strtotime($date) > strtotime($strSystemMaxDate)) {
    //         $em = "Minimum age is 15 years.";
    //         header(("Location: index.php?error=$em"));
    //     }

    //     // upload images
    //     $profieImage = $_FILES['fileToUpload'];
    //     $img_name = $_FILES['fileToUpload']['name'];
    //     $img_size = $_FILES['fileToUpload']['size'];
    //     $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    //     $error = $_FILES['fileToUpload']['error'];
    //     if ($error === 0) {
    //         if ($img_size > 200000) {
    //             $em = "Sorry, Your file is too large.";
    //             header("Location: index.php?error=$em");
    //         } else {
    //             $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    //             // echo ($img_ex);
    //             $img_ex_lc = strtolower($img_ex);

    //             $allowed_exs = array("jpg", "jpeg", "png");
    //             if (in_array($img_ex_lc, $allowed_exs)) {
    //                 $new_img_name = uniqid("IMG", true) . '.' . $img_ex_lc;
    //                 $img_upload_path = 'uploads/' . $new_img_name;
    //                 move_uploaded_file($tmp_name, $img_upload_path);

    //                 // insert into database
    //                 // $sql = $conn->prepare("INSERT INTO images(image_url) VALUES('$new_img_name')");
    //                 // $sql->execute();
    //                 // header("Location: index.php");
    //             } else {
    //                 $em = "You can't upload files of this type";
    //                 header("Location: index.php?error=$em");
    //             }
    //         }
    //     } else {
    //         $em = "unknown error occurred!";
    //         header("Location: index.php?error=$em");
    //     }
    // } else {
    //     header("Location: index.php");
}

function val($data)
{
    $data = trim($data); // remove unnessary spaces
    $data = stripcslashes($data); // remove unnessary back slashes
    $data = htmlspecialchars($data); // secruity data
    return $data;
}
try {
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
                <h1 class="title">International Volunteer Passport</h1>
                <img src="images/SVI-circle-whitel.svg" width="55%" style="padding-top:5%;" alt="big-logo" />
            </div>
        </div>
        <!-- ########################## logo page  ########################## -->
        <div>
            <img src="images/cover-back.png" style="width:100%;" alt="SVI">
        </div>
        <!-- ########################## second page ########################## -->
        <div class="cover-bg">
            <img src="images/cover-back2.png" alt="SVI">
        </div>
        <div class="cover-text">
            <p class="title-header">Service Volontaire international</p>
            <h1 class="title-content">International Volunteer passport</h1>
            <div class="issue-date">
                <p class="profile-text">Date of Issue: <u>' . date("F j, Y") . '</u><br><sub class="tgray">(date d\'émission)</sub></p>
            </div>
        </div>
        
        <!-- ########################## Main information ########################## -->
        <div class="bg-container">
                <img src="images/04.png" alt="SVI">
        </div>
            <div class="page-number-left">
                <h2>4</h2>
            </div>
            <div class="header-info">
            <p class="title-add">Main information</p>
            </div>
        <!-- ########################## Additional information ########################## -->

        <div class="bg-container">
            <img src="images/05.png" alt="SVI">
        </div>
        <div class="page-number-right">
            <h2>5</h2>
        </div>
        <div class="header-info">
            <p class="title-add">Additional information</p>
        </div>
        <div class="SVI-additonal-info">
            <p class="profile-text3">Insurance number<br><sub class="tgray2">(numero d\'assurance)</sub></p>
            <p class="profile-text3">Health problems<br><sub class="tgray2">(problemes de sante)</sub></p>
            <p class="profile-text3">Extra information<br><sub class="tgray2">(informations supplementaires)</sub></p>
        </div>

        <!-- ########################## Project information left ########################## -->

        <div class="bg-container">
            <img src="images/06.png" alt="svi">
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
        <div class="bg-container">
            <img src="images/07.png" alt="SVI">
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
            <img src="images/06.png" alt="">
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
        <div class="bg-container">
            <img src="images/07.png" alt="SVI">
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
            <img src="images/06.png" alt="svi">
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
        <div class="bg-container">
            <img src="images/07.png" alt="SVI">
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
        <img src="images/06.png" alt="svi">
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
        <div class="bg-container">
            <img src="images/07.png" alt="SVI">
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
            <img src="images/06.png" alt="svi">
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
        <div class="bg-container">
            <img src="images/07.png" alt="SVI">
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
            <img src="images/06.png" alt="svi">
        </div>
        <div class="page-number-lefttwo">
            <h2>16</h2>
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
        <div class="bg-container">
            <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>17</h2>
        </div>
        <!-- ########################## Project information left ########################## -->

        <div class="perso-info-bg">
            <img src="images/06.png" alt="svi">
        </div>
        <div class="page-number-lefttwo">
            <h2>18</h2>
        </div>
        <!-- ########################## Project information right ########################## -->
        <div class="bg-container">
            <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>19</h2>
        </div>
        <!-- ########################## Project information left ########################## -->

        <div class="perso-info-bg">
            <img src="images/06.png" alt="svi">
        </div>
        <div class="page-number-lefttwo">
            <h2>20</h2>
        </div>
        <!-- ########################## Project information right ########################## -->
        <div class="bg-container">
            <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>21</h2>
        </div>
        <!-- ########################## Project information left ########################## -->

        <div class="perso-info-bg">
            <img src="images/22.png" alt="svi">
        </div>
        <div class="page-number-lefttwo">
            <h2>22</h2>
        </div>
        <!-- ########################## Project information right ########################## -->
        <div class="bg-container">
            <img src="images/23.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>23</h2>
        </div>
        <!-- ########################## Project information left ########################## -->

        <div class="bg-container">
            <img src="images/22.png" alt="svi">
        </div>
        <div class="page-number-lefttwo">
            <h2>24</h2>
        </div>
        <!-- ########################## Project information right ########################## -->
        <div class="bg-container">
            <img src="images/23.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>25</h2>
        </div>
        <!-- ########################## Project information left ########################## -->

        <div class="bg-container">
            <img src="images/22.png" alt="svi">
        </div>
        <div class="page-number-lefttwo">
            <h2>26</h2>
        </div>
        <!-- ########################## Project information right ########################## -->
        <div class="bg-container">
            <img src="images/23.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>27</h2>
        </div>
        <!-- ########################## Project information left ########################## -->

        <div class="bg-container">
            <img src="images/22.png" alt="svi">
        </div>
        <div class="page-number-lefttwo">
            <h2>28</h2>
        </div>
        <!-- ########################## Project information right ########################## -->
        <div class="bg-container">
            <img src="images/23.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>29</h2>
        </div>
        <!-- ########################## Project information left ########################## -->

        <div class="bg-container">
            <img src="images/22.png" alt="svi">
        </div>
        <div class="page-number-lefttwo">
            <h2>30</h2>
        </div>
        <!-- ########################## Project information right ########################## -->
        <div class="bg-container">
            <img src="images/23.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>31</h2>
        </div>
        
        <!-- ########################## logo page  ########################## -->
        <div>
            <img src="images/cover-back.png" style="width:100%;" alt="SVI">
        </div>
        <!-- ########################## last page ########################## -->
        <div class="footer-content">
            <img src="images/svi-long-blanc.svg" class="logo-footer" alt="big-logo" />
            <div class="footer-container">
                <p class="text-footer">+32 2 888 67 13</p>
            </div>
        </div>

    </body>
    ';

    // $mpdf->showImageErrors = true;

    $mpdf->WriteHTML($data);
    $mpdf->WriteFixedPosHTML($data, 98, 102, 50, 90, 'auto');
    // output to browser
    // $mpdf->Output("$fname-$lname" . '.pdf', 'D');
    $mpdf->Output();
} catch (\Mpdf\MpdfException $e) {
    $e->getMessage();
}
