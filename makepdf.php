<?php

use Mpdf\Mpdf;

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

    // upload images
    $profieImage = $_FILES['fileToUpload'];
    $img_name = $_FILES['fileToUpload']['name'];
    $img_size = $_FILES['fileToUpload']['size'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $error = $_FILES['fileToUpload']['error'];
    if ($error === 0) {
        if ($img_size > 200000) {
            $em = "Sorry, Your file is too large.";
            header("Location: index.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            // echo ($img_ex);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // insert into database
                // $sql = $conn->prepare("INSERT INTO images(image_url) VALUES('$new_img_name')");
                // $sql->execute();
                // header("Location: index.php");
            } else {
                $em = "You can't upload files of this type";
                header("Location: index.php?error=$em");
            }
        }
    } else {
        $em = "unknown error occurred!";
        header("Location: index.php?error=$em");
    }
} else {
    header("Location: index.php");
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
    $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];

    $mpdf = new \Mpdf\Mpdf(
        ['mode' => 'utf-8', 'format' => [105, 148]],
        [
            'fontDir' => array_merge($fontDirs, [
                __DIR__ . '/custom/font/directory',
            ]),
            'fontdata' => $fontData + [
                'gothic' => [
                    'R' => 'GOTHIC.ttf',
                    'B' => "GOTHICB.ttf",
                    'BI' => "GOTHICBI.TTF",
                    'I' => "GOTHICI.TTF",
                    'useOTL' => 0xFF,
                    'useKashida' => 75,
                ]
            ],
            'default_font' => 'gothic'

        ]
    );


    // book mark of pdf
    $mpdf->Bookmark('Start of the document');

    // function projectInfoLeft($left)
    // {
    //     $left =
    //         '
    //         <div class="header-project">
    //             <p class="title-pro">Project informaition</p>
    //         </div>
    //         <div class="pro-info">
    //             <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
    //             <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
    //             <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
    //             <p class="profile-text2">Code _________________________________<br><sub class="tgray2">(code)</sub></p>
    //             <p class="profile-text2">Type __________________________________<br><sub class="tgray2">(type)</sub></p>
    //         </div>
    //         <div class="pro-sign">
    //             <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
    //             <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
    //         </div>

    //     ';

    //     return $left;
    // }

    // function projectInfoRight($right)
    // {
    //     $right =
    //         '
    //     <div class="header-greetins">
    //         <p class="title-pro">Greetins page</p>
    //     </div>
    //     <div class="greetins-page">
    //     <p class="text3">Feel free to ask your friends to write something memorable about your project<br><sub class="tgray2">(FRENCH: N\'hésitez pas à demander à vos amis d\'écrire quelque chose de mémorable sur votre projet)</sub></p>
    //     </div>
    //     ';
    //     return $right;
    // }

    // $data = file_get_contents('content.php');
    $data = '
    <head>
    <link rel="stylesheet" href="src/css/style.css">
    </head>

<body style="font-family: gothic">

    <!-- ########################## front page ########################## -->
    <div class="container">
        <div class="content">
            <h1 class="title" style="font-family: gothic">International Volunteer Passport</h1>
            <img src="images/svi-circle-whitel.svg" width="55%" alt="big-logo" />
        </div>
    </div>
    <!-- ########################## logo page  ########################## -->
    <div>
        <img src="images/cover-back.png" style="width:100%;" alt="SVI">
    </div>
    <!-- ########################## second page ########################## -->
    <div class="cover-bg">
        <img src="images/03.png" alt="SVI">
    </div>
    <div class="cover-text">
        <p class="title-header">Service Volontaire international</p>
        <h1 class="title-content">International Volunteer passport</h1>
        <div class="issue-date">
            <p class="profile-text2">Date of Issue ' . date("F j, Y") . '<br><sub class="tgray2">(date d\'émission)</sub></p>
        </div>
    </div>
    <!-- ########################## profile page one ##########################-->

    <div class="bg-container">
        <img src="images/cover-hor.png" alt="SVI">
    </div>
        <div width= "260mm" style="position: absolute; left: 13mm; bottom: 13mm; rotate: -90;">
        <table  width= "130mm">
            <tr>
                <td><img src="images/SVI-long.svg" width="14%" alt="svi"/></td>
            </tr>
            <br><br>
            <tr>
                <td><p>Authority: Service Volunteers international<br><sub style="color: gray; font-size:0.8rem;">(autorite)</sub></p></td>
            </tr>
            <br>
            <tr>
                <td><p>Code of the issuing organization:Se<br><sub style="color: gray; font-size:0.8rem;">(code de l\'organisme emetteur)</sub></p></td>
            </tr> 
            <br><br><br><br>
            <tr>   
                <td>
                    <hr width="80%" style="text-align:start; color:black;">
                    <p>Signature of director<br><sub style="color: gray; font-size:0.8rem;">(signature du directeur)</sub></p>
                </td>
                <td>
                    <hr width="90%" style="text-align:start; color:black;">
                    <p>Signature of bearer<br><sub style="color: gray; font-size:0.8rem;">(signature du titulaire)</sub></p>   
                </td>
            </tr>
            <tr>
            <td><p style="font-size:0.8rem;">stamp</p></td>
            </tr>
        </table>
           </div>

    <!-- ########################## profile page two ########################## -->

    <div class="perso-info-bg">
        <img src="images/cover-hor.png" alt="svi">
    </div>
    <div width= "260mm" style="position: absolute; left: 8mm; bottom: 13mm; rotate: -90;">
        <table  width= "130mm">
            <tr>
                <td><p style="text-transform: uppercase; font-size:1.015rem;">international volunteer passport</p></td>
            </tr>
        </table>
        <br>
        <table width= "130mm">
            <tr>
                <td style="width:150px; padding-bottom: 7%;"><img height="170px" width="150px" src="' . $img_upload_path  . '" alt="svi-image"/></td>
                <td>
                    <table style="padding-left:2%; line-height: 1.5">
                        <tr>
                            <td>First Name ' . $fname . '<br><sub style="color: gray; font-size:0.8rem;">(prènom)</sub></td>
                        </tr>
                        <tr>
                            <td>Last Name ' . $lname . '<br><sub style="color: gray; font-size:0.8rem;">(nom)</sub></td>
                        </tr>
                        <tr>
                            <td>Volunteer ID ' . $member . '<br><sub style="color: gray; font-size:0.8rem;">(ID volontaire)</sub></td>
                        </tr>
                        <tr>
                            <td>Birth date ' . $date . '<br><sub style="color: gray; font-size:0.8rem;">(date de naissance)</sub></td>
                            <td style="padding-left:4%;">Sex <u>' . $gender . '</u><br><sub style="color: gray; font-size:0.8rem;" >(sexe)</sub></td>
                        </tr>
                        <tr>
                            <td>Nationality ' . $nationality . '<br><sub style="color: gray; font-size:0.8rem;">(nationalité)</sub></td>
                        </tr>
                    </table>
                    <br><br>
                </td>
            </tr>
        </table>
            <table width= "130mm" style="padding-top:2%">
                <tr>
                    <td style="font-size:1.015rem; text-transform:uppercase;">&#60;&#60;&#60;&#60;&#60;&#60;&#60;&#60;&#60;Service Volontaire International&#60;&#60;&#60;&#60;&#60;&#60;&#60;&#60;&#60;&#60;</td>
                </tr>
            </table>
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
    <div class="svi-heading">
        <p class="profile-text2">Current address ' . $adress . '<br><sub class="tgray2">(addresse actuelle)</sub></p>
        <p class="profile-text2">City ' . $city . '<br><sub class="tgray2">(ville)</sub></p>
        <p class="profile-text2">Country ' . $country . '<br><sub class="tgray2">(pays)</sub></p>
        <p class="profile-text2">Mobile phone ' . $phone . '<br><sub class="tgray2">(numero de portable)</sub></p>
        <p class="profile-text2">Emergency number ' . $emergency . ' <br><sub class="tgray2">(numero d\'urgence)</sub></p>
    </div>

    <!-- ########################## Additional information ########################## -->
    <div class="bg-container">
        <img src="images/05.png" alt="SVI">
    </div>
    <div class="page-number-right">
        <h2>5</h2>
    </div>
    <div class="header-add-info">
        <p class="title-add">Additional information</p>
    </div>
    <div class="SVI-additonal-info">
        <p class="profile-text3">Insurance number _______________________<br><sub class="tgray2">(numéro d\'assurance)</sub></p>
        <p class="profile-text3">Health problems _________________________<br><sub class="tgray2">(problemes de santé)</sub><br>__________________________________________<br><br>__________________________________________</p>
        <p class="profile-text3">Extra information ________________________<br><sub class="tgray2">(informations supplémentaires)</sub><br>__________________________________________<br><br>__________________________________________</p>
    </div>

    <!-- ########################## Project information left ########################## -->
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-left">
                <h2>6</h2>
            </div>
            <div class="header-project">
                <p class="title-pro">Project informaition</p>
            </div>
            <div class="pro-info">
                <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
                <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
                <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
                <p class="profile-text2">Code _________________________________<br><sub class="tgray2">(code)</sub></p>
                <p class="profile-text2">Type __________________________________<br><sub class="tgray2">(type)</sub></p>
            </div>
            <div class="pro-sign">
                <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
                <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
            </div>

    <!-- ########################## Project information right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-right">
            <h2>7</h2>
        </div>
        <div class="header-greetins">
        <p class="title-pro">Greetins page</p>
    </div>
    <div class="greetins-page">
    <p class="text3">Feel free to ask your friends to write something memorable about your project<br><sub class="tgray2">(FRENCH: N\'hésitez pas à demander à vos amis d\'écrire quelque chose de mémorable sur votre projet)</sub></p>
    </div>

    <!-- ########################## Project information left ########################## -->
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-left">
                <h2>8</h2>
            </div>
           <div class="header-project">
                <p class="title-pro">Project informaition</p>
            </div>
            <div class="pro-info">
                <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
                <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
                <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
                <p class="profile-text2">Code _________________________________<br><sub class="tgray2">(code)</sub></p>
                <p class="profile-text2">Type __________________________________<br><sub class="tgray2">(type)</sub></p>
            </div>
            <div class="pro-sign">
                <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
                <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
            </div>

    <!-- ########################## Project information right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-right">
            <h2>9</h2>
        </div>
        <div class="header-greetins">
        <p class="title-pro">Greetins page</p>
    </div>
    <div class="greetins-page">
    <p class="text3">Feel free to ask your friends to write something memorable about your project<br><sub class="tgray2">(FRENCH: N\'hésitez pas à demander à vos amis d\'écrire quelque chose de mémorable sur votre projet)</sub></p>
    </div>

    <!-- ########################## Project information left ########################## -->
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>10</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Project informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Code _________________________________<br><sub class="tgray2">(code)</sub></p>
            <p class="profile-text2">Type __________________________________<br><sub class="tgray2">(type)</sub></p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

    <!-- ########################## Project information right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>11</h2>
        </div>
        <div class="header-greetins">
        <p class="title-pro">Greetins page</p>
    </div>
    <div class="greetins-page">
    <p class="text3">Feel free to ask your friends to write something memorable about your project<br><sub class="tgray2">(FRENCH: N\'hésitez pas à demander à vos amis d\'écrire quelque chose de mémorable sur votre projet)</sub></p>
    </div>

    <!-- ########################## Project information left ########################## -->
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>12</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Project informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Code _________________________________<br><sub class="tgray2">(code)</sub></p>
            <p class="profile-text2">Type __________________________________<br><sub class="tgray2">(type)</sub></p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

    <!-- ########################## Project information right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>13</h2>
        </div>
        <div class="header-greetins">
        <p class="title-pro">Greetins page</p>
    </div>
    <div class="greetins-page">
    <p class="text3">Feel free to ask your friends to write something memorable about your project<br><sub class="tgray2">(FRENCH: N\'hésitez pas à demander à vos amis d\'écrire quelque chose de mémorable sur votre projet)</sub></p>
    </div>

    <!-- ########################## Project information left ########################## -->
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>14</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Project informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Code _________________________________<br><sub class="tgray2">(code)</sub></p>
            <p class="profile-text2">Type __________________________________<br><sub class="tgray2">(type)</sub></p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

    <!-- ########################## Project information right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>15</h2>
        </div>
        <div class="header-greetins">
        <p class="title-pro">Greetins page</p>
    </div>
    <div class="greetins-page">
    <p class="text3">Feel free to ask your friends to write something memorable about your project<br><sub class="tgray2">(FRENCH: N\'hésitez pas à demander à vos amis d\'écrire quelque chose de mémorable sur votre projet)</sub></p>
    </div>

    <!-- ########################## Project information left ########################## -->
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>16</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Project informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Code _________________________________<br><sub class="tgray2">(code)</sub></p>
            <p class="profile-text2">Type __________________________________<br><sub class="tgray2">(type)</sub></p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

    <!-- ########################## Project information right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>17</h2>
        </div>
        <div class="header-greetins">
        <p class="title-pro">Greetins page</p>
    </div>
    <div class="greetins-page">
    <p class="text3">Feel free to ask your friends to write something memorable about your project<br><sub class="tgray2">(FRENCH: N\'hésitez pas à demander à vos amis d\'écrire quelque chose de mémorable sur votre projet)</sub></p>
    </div>

    <!-- ########################## Project information left ########################## -->
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>18</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Project informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Code _________________________________<br><sub class="tgray2">(code)</sub></p>
            <p class="profile-text2">Type __________________________________<br><sub class="tgray2">(type)</sub></p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

    <!-- ########################## Project information right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>19</h2>
        </div>
        <div class="header-greetins">
        <p class="title-pro">Greetins page</p>
    </div>
    <div class="greetins-page">
    <p class="text3">Feel free to ask your friends to write something memorable about your project<br><sub class="tgray2">(FRENCH: N\'hésitez pas à demander à vos amis d\'écrire quelque chose de mémorable sur votre projet)</sub></p>
    </div>

    <!-- ########################## Project information left ########################## -->
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>20</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Project informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Code _________________________________<br><sub class="tgray2">(code)</sub></p>
            <p class="profile-text2">Type __________________________________<br><sub class="tgray2">(type)</sub></p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

    <!-- ########################## Project information right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>21</h2>
        </div>
        <div class="header-greetins">
        <p class="title-pro">Greetins page</p>
    </div>
    <div class="greetins-page">
    <p class="text3">Feel free to ask your friends to write something memorable about your project<br><sub class="tgray2">(FRENCH: N\'hésitez pas à demander à vos amis d\'écrire quelque chose de mémorable sur votre projet)</sub></p>
    </div>

    <!-- ########################## Project training left ########################## -->

    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>22</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Training informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Description ____________________________<br><sub class="tgray2">(description)</sub><br>_______________________________________</p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

        <!-- ########################## Project training right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>23</h2>
        </div>
        <div class="header-project">
            <p class="title-pro">Training informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location _______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Description ____________________________<br><sub class="tgray2">(description)</sub><br>_______________________________________</p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

        <!-- ########################## Project training left ########################## -->
    
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>24</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Training informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Description ____________________________<br><sub class="tgray2">(description)</sub><br>_______________________________________</p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

        <!-- ########################## Project training right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>25</h2>
        </div>
        <div class="header-project">
            <p class="title-pro">Training informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location _______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Description ____________________________<br><sub class="tgray2">(description)</sub><br>_______________________________________</p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

        <!-- ########################## Project training left ########################## -->
    
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>26</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Training informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Description ____________________________<br><sub class="tgray2">(description)</sub><br>_______________________________________</p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

        <!-- ########################## Project training right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>27</h2>
        </div>
        <div class="header-project">
            <p class="title-pro">Training informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location _______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Description ____________________________<br><sub class="tgray2">(description)</sub><br>_______________________________________</p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

        <!-- ########################## Project training left ########################## -->
    
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>28</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Training informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Description ____________________________<br><sub class="tgray2">(description)</sub><br>_______________________________________</p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

        <!-- ########################## Project training right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>29</h2>
        </div>
        <div class="header-project">
            <p class="title-pro">Training informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location _______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Description ____________________________<br><sub class="tgray2">(description)</sub><br>_______________________________________</p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

        <!-- ########################## Project training left ########################## -->
    
    <div class="perso-info-bg">
        <img src="images/06.png" alt="svi">
            </div>
            <div class="page-number-lefttwo">
                <h2>30</h2>
            </div>
            <div class="header-project">
            <p class="title-pro">Training informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location ______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Description ____________________________<br><sub class="tgray2">(description)</sub><br>_______________________________________</p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

        <!-- ########################## Project training right ########################## -->
    <div class="bg-container">
        <img src="images/07.png" alt="SVI">
        </div>
        <div class="page-number-righttwo">
            <h2>31</h2>
        </div>
        <div class="header-project">
            <p class="title-pro">Training informaition</p>
        </div>
        <div class="pro-info">
            <p class="profile-text2">Name ________________________________<br><sub class="tgray2">(nom)</sub></p>
            <p class="profile-text2">Dates _________________________________<br><sub class="tgray2">(dates)</sub></p>
            <p class="profile-text2">Location _______________________________<br><sub class="tgray2">(localisation)</sub></p>
            <p class="profile-text2">Description ____________________________<br><sub class="tgray2">(description)</sub><br>_______________________________________</p>
        </div>
        <div class="pro-sign">
            <p class="profile-text2">Project Manager (name)<br><sub class="tgray2">(chef de projet (nom) )</sub><br>_________________________</p>
            <p class="profile-text2">Signature________________<br><sub class="tgray2">(signature)</sub></p>
        </div>

    <!-- ########################## address page ########################## -->
<div class="cover-bg">
    <img src="images/cover-back2.png" alt="SVI">
</div>
<div class="last-page-address">
    <div class="newsletter">
        <img src="images/SVI-long.svg" alt="newsletter SVI">
    </div>
    <div class="cover-text1">
        <p class="last-header">Service Volontaire international</p>
    </div>
    <div class="address-container">
        <div class="address-content">
            <h4>Website</h4>
            <p>www.servicevolontaire.org</p>
            <hr class="red-line">
        </div>
        <div class="address-content">
            <h4>Postal address</h4>
            <h4>Belgium:</h4>
            <ul>
                <li> 21, Boucle des metiers, 1348 Louvain-La-Neuve</li>
                <li> 8, Bâtiment H, Rue Fritz Toussaint, 1050 Bruxelles</li>
                <li> 21, Clos des Quatre Vent, 1332 Genval</li>
                <li> 14 b, Rue Grégoire Decorte, 7540 Kain</li>
            </ul>
            <h4>France:</h4>
            <ul>
                <li> 7, Rue Jean Bart, 59000 Lille</li>
            </ul>
            <hr class="red-line">
        </div>
        <div class="address-content">
            <h4>Office hours</h4>
            <p>Monday - Friday 9 AM to 18 PM (GMT + 1:00)</p>
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
        </div>
    </div>
</div>
    <!-- ########################## logo page  ########################## -->
    <div>
        <img src="images/cover-back.png" style="width:100%;" alt="SVI">
    </div>
    <!-- ########################## last page ########################## -->
    <div class="footer-content">
        <img src="images/svi-long-blanc.svg" width="56%" alt="big-logo" />
        <div class="footer-container">
            <p class="text-footer">+32 2 888 67 13</p>
        </div>
    </div>

</body>';

    // $mpdf->showImageErrors = true;
    $mpdf->WriteHTML($data);

    // output to browser
    $mpdf->Output("$fname-$lname" . '.pdf', 'D');
} catch (\Mpdf\MpdfException $e) {
    $e->getMessage();
}
