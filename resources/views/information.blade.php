<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (required for Malaysia Postcodes) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Malaysia Postcodes JS -->
    <script src="https://cdn.jsdelivr.net/npm/malaysia-postcodes@2.3.0/dist/malaysia-postcodes.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Register Information</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('information') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="contact_number" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter your contact number">
                            </div>

                            <div class="mb-3">
                                <label for="address_line_1" class="form-label">Address Line 1</label>
                                <input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="Enter address line 1">
                            </div>
                            <div class="mb-3">
                                <label for="address_line_2" class="form-label">Address Line 2 (optional)</label>
                                <input type="text" class="form-control" id="address_line_2" name="address_line_2" placeholder="Enter address line 2">
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select" id="state" name="state">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <select class="form-select" id="city" name="city" disabled>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Enter postal code" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Already registered? <a href="#">Login</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            const stateData = malaysiaPostcodes.getStates();
            const selectState = $('#state');
            const selectCity = $('#city');
            const inputPostcode = $('#postal_code');

            // Populate state dropdown
            $.each(stateData, function (index, state) {
                selectState.append($("<option>", {
                    text: state,
                    value: state
                }));
            });

            // Handle state change
            selectState.on("change", function () {
                const selectedState = $(this).val();
                selectCity.prop("disabled", false);
                inputPostcode.val("").prop("readonly", true);

                if (selectedState) {
                    const cityData = malaysiaPostcodes.getCities(selectedState);

                    selectCity.empty().append($("<option>", {
                        text: "Select City",
                        value: ""
                    }));

                    $.each(cityData, function (index, city) {
                        selectCity.append($("<option>", {
                            text: city,
                            value: city
                        }));
                    });
                }
            });

            // Handle city change
            selectCity.on("change", function () {
                const selectedState = $('#state').val();
                const selectedCity = $(this).val();
                const postcodeData = malaysiaPostcodes.findCities(selectedCity);

                if (postcodeData.found && postcodeData.state === selectedState) {
                    const cityPostcode = postcodeData.postcodes[0];
                    inputPostcode.val(cityPostcode).prop("readonly", true);
                }
            });
        });
    </script>
</body>
</html>
