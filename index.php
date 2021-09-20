<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <title>Generate the mPDF</title>
</head>
<body>

    <div class="container mt-5">
        <?php if (isset($_GET['error'])) : ?>
            <p class="alert alert-danger"><?= $_GET['error'] ?? "" ?></p>
        <?php endif; ?>

        <form class="offset-md-3 col-md-6" method="post" action="makepdf.php" enctype="multipart/form-data">

        <h1>Create your volonteer passport</h1>
            <p>Fill out the details below and the PDF will download.</p>
            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" value="<?= $fname ?? "" ?>"><?= $fname ?? "" ?>
                </div>
                <div class="col-md-6">
                    <input type="text" name="lname" id="lname" placeholder="Last name" value="<?= $lname ?? "" ?>" class="form-control"><?= $lname ?? "" ?>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
<<<<<<< HEAD
                    <select class="form-select" name="gender" value="<?= $gender ?? "" ?>">
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Other</option>
                    </select>
=======
                        <input type="text" name="gender" placeholder="Sex" class="form-control">
>>>>>>> parent of e5f896a (add validation)
                </div>
                <div class=col-md-6>
                    <input type="number" name="member" value="<?= $member ?? "" ?>" placeholder="membership number" class="form-control"><?= $member ?? "" ?>
                </div>
            </div>
            <div class="mb-2">
                <input type="date" name="date" placeholder="Birth date" class="form-control" value="<?= $date ?? "" ?>">
            </div>
            <div class="mb-2">
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
            </div>
            <div class="mb-2">
                <input type="text" name="nationality" id="nationality" placeholder="Nationality" class="form-control" value="<?= $nationality ?? "" ?>"><?= $nationality ?? "" ?>
            </div>
            <div class="mb-2">
                <input type="text" name="address" placeholder="Current address" class="form-control" value="<?= $address ?? "" ?>"><?= $address ?? "" ?>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="text" name="city" placeholder="City" class="form-control" value="<?= $city ?? "" ?>"><?= $city ?? "" ?>
                </div>
                <div class="col-md-6">
                    <input type="text" name="country" id="country" placeholder="Country" class="form-control" value="<?= $country ?? "" ?>"><?= $country ?? "" ?>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="phone" name="phone" placeholder="Mobile phone +XX" class="form-control" value="<?= $phone ?? "" ?>"><?= $phone ?? "" ?>
                </div>
                <div class="col-md-6">
                    <input type="number" name="emergency" placeholder="Emergency number +XX" class="form-control" value="<?= $emergency ?? "" ?>"><?= $emergency ?? "" ?>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-lg form-control">Create PDF</button>


        </form>
    </div>
<<<<<<< HEAD

    <!-- <script>
        $(document).ready(function() {
            
        })
    </> -->

=======
    
>>>>>>> parent of e5f896a (add validation)
</body>
</html>