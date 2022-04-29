<div class="container mt-3">
    <form method="post" action="<?php echo isset($editId) ?  htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $editId : htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3 mt-3">
            <?php if (!empty($firstNameErr)) {
                echo '<div class="alert alert-danger">
                        <strong>Error!</strong> ' . $firstNameErr . '
                    </div>';
            } ?>
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" value="<?php echo $firstName; ?>" placeholder="Enter your first name" name="firstName">
        </div>
        <div class="mb-3 mt-3">
            <?php if (!empty($lastNameErr)) {
                echo '<div class="alert alert-danger">
                        <strong>Error!</strong> ' . $lastNameErr . '
                    </div>';
            } ?>
            <label for="lastName">Last name:</label>
            <input type="text" class="form-control" id="lastName" value="<?php echo $lastName; ?>" placeholder="Enter your last name" name="lastName">
        </div>
        <div class="mb-3 mt-3">
            <?php if (!empty($emailErr)) {
                echo '<div class="alert alert-danger">
                        <strong>Error!</strong> ' . $emailErr . '
                    </div>';
            } ?>
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" placeholder="Enter email" name="email">
        </div>
        <div class="mb-3 mt-3">
            <?php if (!empty($phoneErr)) {
                echo '<div class="alert alert-danger">
                        <strong>Error!</strong> ' . $phoneErr . '
                    </div>';
            } ?>
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" id="phone" value="<?php echo $phone; ?>" placeholder="Enter phone number" name="phone">
        </div>
        <div class="mb-3 mt-3">
            <?php if (!empty($birthdayErr)) {
                echo '<div class="alert alert-danger">
                        <strong>Error!</strong> ' . $birthdayErr . '
                    </div>';
            } ?>
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" id="birthday" min="1900-01-01" max="2022-12-31" value="<?php echo $birthday; ?>" placeholder="Enter birthday" name="birthday">
        </div>
        <div class="mb-3 mt-3">
            <?php if (!empty($numberErr)) {
                echo '<div class="alert alert-danger">
                        <strong>Error!</strong> ' . $numberErr . '
                    </div>';
            } ?>
            <label for="number">Street number:</label>
            <input type="number" class="form-control" id="number" value="<?php echo $number; ?>" placeholder="Enter street number" name="number">
        </div>
        <div class="mb-3 mt-3">
            <?php if (!empty($streetErr)) {
                echo '<div class="alert alert-danger">
                        <strong>Error!</strong> ' . $streetErr . '
                    </div>';
            } ?>
            <label for="street">Street:</label>
            <input type="text" class="form-control" id="street" value="<?php echo $street; ?>" placeholder="Enter email" name="street">
        </div>
        <div class="mb-3 mt-3">
            <?php if (!empty($cityErr)) {
                echo '<div class="alert alert-danger">
                        <strong>Error!</strong> ' . $cityErr . '
                    </div>';
            } ?>
            <label for="email">City:</label>
            <input type="text" class="form-control" id="city" value="<?php echo $city; ?>" placeholder="Enter your city" name="city">
        </div>
        <div class="mb-3 mt-3">
            <?php if (!empty($zipErr)) {
                echo '<div class="alert alert-danger">
                        <strong>Error!</strong> ' . $zipErr . '
                    </div>';
            } ?>
            <label for="email">Zip:</label>
            <input type="number" class="form-control" id="zip" value="<?php echo $zip; ?>" placeholder="Enter zip" name="zip">
        </div>
        <div class="mb-3 mt-3">
            <?php if (!empty($countryErr)) {
                echo '<div class="alert alert-danger">
                        <strong>Error!</strong> ' . $countryErr . '
                    </div>';
            } ?>
            <label for="email">Country:</label>
            <input type="text" class="form-control" id="country" value="<?php echo $country; ?>" placeholder="Enter country" name="country">
        </div>


        <input type="submit" name="submit" class="btn btn-primary" value="<?php echo isset($editId) ?  "Update" : "Submit"; ?>">
</div>
</form>
</div>