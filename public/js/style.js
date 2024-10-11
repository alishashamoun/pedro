$(document).on('click', '.wallet-dep-modal', function () {
    $('#deposit').val($(this).data('id'));
    // $('#exampleModalSizeDefault2').modal('show');
});

$(document).on('click', '.wallet-with-modal', function () {
    $('#withdraw').val($(this).data('id'));
    // $('#exampleModalSizeDefault3').modal('show');
});
$('#jobDetTabs a').on('click', function (e) {
    e.preventDefault();
    $(this).tab('show');
});


function validateForm() {
    // Check if at least one phone number is added
    const phoneInputs = $('input[name="phone[]"]');
    let isPhoneValid = false;
    phoneInputs.each(function () {
        if ($(this).val().trim() !== '') {
            isPhoneValid = true;
            return false; // Exit the loop early if a valid phone number is found
        }
    });



    const extsInputs = $('select[name="ext_id[]"]');
    let isextsValid = false;

    extsInputs.each(function () {
        const selectedValue = $(this).val();

        // Check if the selected option's value is not empty
        if (selectedValue && selectedValue.trim() !== '') {
            isextsValid = true;
            return false; // Exit the loop early if a valid option is selected
        }
    });

    const extInputs = $('input[name="ext[]"]');
    let isextValid = false;
    extInputs.each(function () {
        if ($(this).val().trim() !== '') {
            isextValid = true;
            return false; // Exit the loop early if a valid phone number is found
        }
    });

    // Check if at least one email is added
    const emailInputs = $('input[name="email[]"]');
    let isEmailValid = false;
    emailInputs.each(function () {
        if ($(this).val().trim() !== '') {
            isEmailValid = true;
            return false; // Exit the loop early if a valid email is found
        }
    });
    // Show/hide the error messages based on validation results
    if (!isPhoneValid) {
        $('.phone-error').show();
    } else {
        $('.phone-error').hide();
    }

    if (!isextsValid) {
        $('.exts-error').show();
    } else {
        $('.exts-error').hide();
    }

    if (!isextValid) {
        $('.ext-error').show();
    } else {
        $('.ext-error').hide();
    }

    if (!isEmailValid) {
        $('.email-error').show();
    } else {
        $('.email-error').hide();
    }
    // Return true if at least one phone and email is valid, otherwise false
    return isPhoneValid && isextsValid && isextValid && isEmailValid;
}


$('#add-primary').click(function () {

    var newPrimaryInput = $(

        '<div class="new-primary">' +
        '<div class="row" >' +
        '<div class="col-md-4">&nbsp;</div>' +
        '<div class="col-md-4">' +
        '<div class="form-group">' +
        '<input type="tel" class="form-control" name="phone[]" placeholder="Phone number" >' +
        '  <p class="phone-error" style="display: none; color: red"> Please add at least phone number </p>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<div class="form-group">' +
        '<input type="tel" class="form-control" name="ext[]" placeholder="Ext" >' +
        '<p class="ext-error" style="display: none; color: red;">Please add at least one ext</p>' +
        '</div>' +
        '</div>' +

        '</div>'+
        '<div class="row" id="new-email">' +
        '<div class="col-md-4">&nbsp;</div>' +
        '<div class="col-md-6">' +
        '<div class="form-group">' +
        '<input type="tel" class="form-control" name="email[]" placeholder="Email" >' +
        '<p class="email-error" style="display: none; color: red;">Please add at least one email.</p>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<button type="button" class="btn remove-primary"><i class="fas fa-trash text-danger"></i></button>' +
        '</div>' +
        '</div>' +
        '</div>'
        );

    $('.primary_append').append(newPrimaryInput);
});

$(document).on('click', '.remove-primary', function () {
    $(this).closest('.new-primary').remove();
});




//Validation Form
$(document).ready(function () {
    // Function to validate the form
    function validateForm() {
        let isValid = true;

        // Validate Customer
        const customerId = $('#customer_id').val();
        if (customerId === '') {
            $('#customer_id').addClass('error');
            $('#customer_id_error').text('Please select a customer');
            isValid = false;
        } else {
            $('#customer_id').removeClass('error');
            $('#customer_id_error').text('');
        }

        // Validate Primary Contact First Name
        const firstName = $('#first_name').val().trim();
        if (firstName === '') {
            $('#first_name').addClass('error');
            $('#first_name_error').text('First Name is required');
            isValid = false;
        } else {
            $('#first_name').removeClass('error');
            $('#first_name_error').text('');
        }

        // Validate Primary Contact Last Name
        const lastName = $('#last_name').val().trim();
        if (lastName === '') {
            $('#last_name').addClass('error');
            $('#last_name_error').text('Last Name is required');
            isValid = false;
        } else {
            $('#last_name').removeClass('error');
            $('#last_name_error').text('');
        }

        // Validate Job Category
        const jobCategoryId = $('#job-cat-id').val();
        if (jobCategoryId === '') {
            $('#job-cat-id').addClass('error');
            $('#job-cat-id_error').text('select a job category');
            isValid = false;
        } else {
            $('#job-cat-id').removeClass('error');
            $('#job-cat-id_error').text('');
        }

        // Validate Job Sub Category
        // const jobSubcategoryId = $('#jobSubcategory').val();
        // if (jobSubcategoryId === '') {
        //     $('#jobSubcategory').addClass('error');
        //     $('#jobSubcategory_error').text('select a job subcategory');
        //     isValid = false;
        // } else {
        //     $('#jobSubcategory').removeClass('error');
        //     $('#jobSubcategory_error').text('');
        // }

        // Validate Job Source
        const jobSource = $('#job_sour').val();
        if (jobSource === '') {
            $('#job_sour').addClass('error');
            $('#job_sour_error').text('Please select a job source');
            isValid = false;
        } else {
            $('#job_sour').removeClass('error');
            $('#job_sour_error').text('');
        }

        // Additional validations for dynamic fields if applicable

        // Validate Phone
        const phones = $('input[name="phone[]"]').map(function () { return this.value.trim(); }).get();
        if (phones.length === 0 || phones.every(phone => phone === '')) {
            $('.phone-error').show();
            isValid = false;
        } else {
            $('.phone-error').hide();
        }

        // Validate Ext
        const exts = $('input[name="ext[]"]').map(function () { return this.value.trim(); }).get();
        if (exts.length > 0 && exts.every(ext => ext === '')) {
            $('.ext-error').show();
            isValid = false;
        } else {
            $('.ext-error').hide();
        }

        // Validate Email
        const emails = $('input[name="email[]"]').map(function () { return this.value.trim(); }).get();
        if (emails.length === 0 || emails.every(email => email === '')) {
            $('.email-error').show();
            isValid = false;
        } else {
            $('.email-error').hide();
        }

        // Validate Image
        // const imageInput = $('input[name="image"]');
        // const imageFile = imageInput[0].files[0];
        // if (!imageFile) {
        //     imageInput.addClass('error');
        //     $('.image-error').show();
        //     isValid = false;
        // } else {
        //     imageInput.removeClass('error');
        //     $('.image-error').hide();

        //     // Optional: Validate file extension if needed
        //     const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        //     const fileExtension = imageFile.name.split('.').pop().toLowerCase();
        //     if (!allowedExtensions.includes(fileExtension)) {
        //         imageInput.addClass('error');
        //         $('.image-error').text('Please select a valid image file (JPG, JPEG, PNG, GIF)');
        //         $('.image-error').show();
        //         isValid = false;
        //     }
        // }

        // // Validate Documents
        // const documentInput = $('input[name="document"]');
        // const documentFile = documentInput[0].files[0];
        // if (documentFile) {
        //     const allowedExtensions = ['pdf', 'doc', 'docx'];
        //     const fileExtension = documentFile.name.split('.').pop().toLowerCase();
        //     if (!allowedExtensions.includes(fileExtension)) {
        //         documentInput.addClass('error');
        //         $('.document-error').show();
        //         isValid = false;
        //     } else {
        //         documentInput.removeClass('error');
        //         $('.document-error').hide();
        //     }
        // }

        // Validate Current Status
        const currentStatus = $('#fruits').val();
        if (currentStatus === '') {
            $('#fruits').addClass('error');
            $('.current-status-error').show();
            isValid = false;
        } else {
            $('#fruits').removeClass('error');
            $('.current-status-error').hide();
        }

        // Validate Start & End Dates
        const startDate = $('input[name="start_date"]').val();
        const endDate = $('input[name="end_date"]').val();
        if (startDate === '' || endDate === '') {
            $('input[name="start_date"]').addClass('error');
            $('input[name="end_date"]').addClass('error');
            $('.start-date-error').show();
            $('.end-date-error').show();
            isValid = false;
        } else {
            $('input[name="start_date"]').removeClass('error');
            $('input[name="end_date"]').removeClass('error');
            $('.start-date-error').hide();
            $('.end-date-error').hide();
        }

        // Validate Arrival Time Window
        const startTime = $('input[name="start_time"]').val();
        const endTime = $('input[name="end_time"]').val();
        if (startTime === '' || endTime === '') {
            $('input[name="start_time"]').addClass('error');
            $('input[name="end_time"]').addClass('error');
            $('.start-time-error').show();
            $('.end-time-error').show();
            isValid = false;
        } else {
            $('input[name="start_time"]').removeClass('error');
            $('input[name="end_time"]').removeClass('error');
            $('.start-time-error').hide();
            $('.end-time-error').hide();
        }

        // Validate Estimated Duration
        const startDuration = $('input[name="start_duration"]').val();
        const endDuration = $('input[name="end_duration"]').val();
        if (startDuration === '' || endDuration === '') {
            $('input[name="start_duration"]').addClass('error');
            $('input[name="end_duration"]').addClass('error');
            $('.start-duration-error').show();
            $('.end-duration-error').show();
            isValid = false;
        } else {
            $('input[name="start_duration"]').removeClass('error');
            $('input[name="end_duration"]').removeClass('error');
            $('.start-duration-error').hide();
            $('.end-duration-error').hide();
        }

        // Validate Job Priority
        const jobPriority = $('#job_pro').val();
        if (jobPriority === '') {
            $('#job_pro').addClass('error');
            $('.job-priority-error').show();
            isValid = false;
        } else {
            $('#job_pro').removeClass('error');
            $('.job-priority-error').hide();
        }

        // Validate Assign Techs
        const assignedTech = $('input[name="assigned_tech"]').val();
        if (assignedTech === '') {
            $('input[name="assigned_tech"]').addClass('error');
            $('.assigned-tech-error').show();
            isValid = false;
        } else {
            $('input[name="assigned_tech"]').removeClass('error');
            $('.assigned-tech-error').hide();
        }

        // Validate Notes For Techs
        const notesForTech = $('textarea[name="notes_for_tech"]').val();
        if (notesForTech === '') {
            $('textarea[name="notes_for_tech"]').addClass('error');
            $('.notes-for-tech-error').show();
            isValid = false;
        } else {
            $('textarea[name="notes_for_tech"]').removeClass('error');
            $('.notes-for-tech-error').hide();
        }

        // Validate Completion Notes
        const completionNotes = $('textarea[name="completion_notes"]').val();
        if (completionNotes === '') {
            $('textarea[name="completion_notes"]').addClass('error');
            $('.completion-notes-error').show();
            isValid = false;
        } else {
            $('textarea[name="completion_notes"]').removeClass('error');
            $('.completion-notes-error').hide();
        }


        return isValid;
    }

    // Handle form submission
    // $('#myForm').submit(function (e) {
    //     e.preventDefault();
    //     if (validateForm()) {
    //         // Submit the form if valid
    //         this.submit();
    //     }
    // });

    // Clear error messages on input focus
    $('input, select, textarea').focus(function () {
        $(this).removeClass('error');
        $(`#${this.id}_error`).text('');
    });

    // Add event handlers for dynamic fields if applicable
});
//End Validation Form



function validateForm() {
    // Implement your form validation logic here
    // For example, check if both phone and email fields are not empty
    // and return true if the form is valid, otherwise return false.

    // Example validation:
    const phoneValue = $('#first_name').val();
    const emailValue = $('#last_name').val();

    return phoneValue.trim() !== '' && emailValue.trim() !== '';
}

// Multiple Email Section
$('#add-email').click(function () {
    var newEmailInput = $(
        '<div class="row" id="new-email">' +
        '<div class="col-md-4">&nbsp;</div>' +
        '<div class="col-md-6">' +
        '<div class="form-group">' +
        '<input type="tel" class="form-control" name="email[]" placeholder="Email" >' +
        '<p class="email-error" style="display: none; color: red;">Please add at least one email.</p>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<button type="button" class="btn remove-email"><i class="fas fa-trash text-danger"></i></button>' +
        '</div>' +
        '</div>');
    $('.email_append').append(newEmailInput);
});

$(document).on('click', '.remove-email', function () {
    $('#new-email').remove();
});



// Event listener for job category dropdown change
// $('#job-cat-id').change(function () {

//     var categoryId = $(this).val();

//     if (categoryId) {
//         // Make AJAX request to get job subcategories
//         $.ajax({
//             url: '/admin/get-subcategories',
//             type: 'GET',
//             data: { category_id: categoryId },
//             success: function (data) {

//                 var subcategories = data;
//                 var options = '<option value="">Select a Job Subcategorysss</option>';

//                 subcategories.forEach(function (subcategory) {
//                     options += '<option value="' + subcategory.id + '">' + subcategory.name + '</option>';
//                 });
//                 $('#jobSubcategory').html(options);
//             },
//             error: function (xhr) {
//                 console.log(xhr.responseText);
//             }
//         });
//     } else {
//         // Clear job subcategory dropdown if no category selected
//         $('#job-subcategory').html('<option value="">Select a Job Subcategory</option>');
//         $('#job-sub-description').val('');
//     }
// });

// $('#job-cat-id').change(function () {
//     var subcategoryId = $(this).val();

//     if (subcategoryId) {
//         // Make AJAX request to get job sub-description
//         $.ajax({
//             url: '/admin/get-subdescription',
//             type: 'GET',
//             data: { subcategory_id: subcategoryId },
//             success: function (data) {
//                 // Update job sub-description field
//                 $('#jobSubDescription').val(data.subdescription);
//             },
//             error: function (xhr) {
//                 console.log(xhr.responseText);
//             }
//         });
//     } else {
//         // Clear job sub-description field if no subcategory selected
//         $('#jobSubDescription').val('');
//     }
// });

$(document).ready(function () {

    var JobtotalJobAmount = 0;
    var JobtotalDriveAndLaborTime = 0;
    var JobtotalBillingExpense = 0;
    var JobCost = 0; // Initialize JobCost
    var JobpaymentsAndDeposits = 0;
    var JobtotalDue = 0;

    function JobcalculateRowTotals(row) {
        var job_rate = parseFloat(row.find(".job_inv_rate").val()) || 0;
        var job_qty = parseFloat(row.find(".job_inv_qty").val()) || 0;
        var job_cost = parseFloat(row.find(".job_inv_cost").val()) || 0;
        var job_tax = parseFloat(row.find(".job_inv_tax").val()) || 0;

        var job_total = job_rate * job_qty;
        var jobTotal = job_total + job_cost + job_tax;

        row.find(".job_inv_total").val(jobTotal.toFixed(2));
        return jobTotal;
    }

    //Update update Total Job Amount
    function JobupdateTotalJobAmount() {
        JobtotalJobAmount = 0;
        JobCost = 0;


        $(".job_inv_total").each(function () {
            JobtotalJobAmount += parseFloat($(this).val());
        });
        $(".job_inv_cost").each(function () {
            JobCost += parseFloat($(this).val());
        });


        $("#job-product-and-service-taxes-and-fees").text("$" + JobtotalJobAmount.toFixed(2));
        JobcalculateAndDisplayGrossProfit();
    }

    //Update update Total Drive And Labor Time
    function JobupdateTotalDriveAndLaborTime() {
        var JobdriveTime = parseFloat($("#job_drive_time").val()) || 0;
        var JoblaborTime = parseFloat($("#job_labor_time").val()) || 0;
        var Jobamount = parseFloat($("#job_amount").val()) || 0;
        var JobpaymentsAndDeposits = parseFloat($("#job_payments_and_deposits_input").val()) || 0;

        JobtotalDriveAndLaborTime = JobdriveTime + JoblaborTime;
        JobtotalBillingExpense = Jobamount;
        JobtotalDue = JobtotalJobAmount + JobtotalDriveAndLaborTime + JobtotalBillingExpense - JobpaymentsAndDeposits;
        JobtotalDue = Math.max(JobtotalDue, 0);

        $("#job-total-drive-and-labor-time").text("$" + JobtotalDriveAndLaborTime.toFixed(2));
        $("#job_payments_and_deposits").text("$" + JobpaymentsAndDeposits.toFixed(2));
        $("#job-total-billing-expense").text("$" + JobtotalBillingExpense.toFixed(2));

        if (JobtotalDue < 0) {
            $("#job_total_due").text("$0.00");
        } else {
            $("#job_total_due").text("$" + JobtotalDue.toFixed(2));
        }

        JobcalculateAndDisplayGrossProfit();
    }

    function JobcalculateAndDisplayGrossProfit() {
        var JobAmount = JobtotalJobAmount + JobtotalDriveAndLaborTime + JobtotalBillingExpense;
        var paymentsAndDeposits = parseFloat($("#job_payments_and_deposits_input").val()) || 0;
        var payment = paymentsAndDeposits - JobtotalDriveAndLaborTime - JobtotalBillingExpense;
        var JobgrossProfit = JobtotalJobAmount - payment;
        var JobgrossProfitPercentage = (JobtotalJobAmount === 0) ? 0 : ((JobgrossProfit / JobtotalJobAmount) * 100);

        $("#job-total-job-amount").text("$" + JobAmount.toFixed(2));
        $("#job_total_cost").text("$" + JobCost.toFixed(2));
        $("#job-gross-profit").text("$" + JobgrossProfit.toFixed(2));

        $("#job-gross-profit-percentage").text("(" + Math.min(JobgrossProfitPercentage, 100).toFixed(2) + "%)");
    }

    $(document).on("input", ".job_inv_qty, .job_inv_rate, .job_inv_cost, .job_inv_tax", function () {
        var row = $(this).closest("tr");
        var jobTotal = JobcalculateRowTotals(row);
        JobupdateTotalJobAmount();
    });

    // Listen for input changes on drive and labor time fields
    $("#job_drive_time, #job_labor_time, #job_amount, #job_payments_and_deposits_input").on("input", function () {
        JobupdateTotalDriveAndLaborTime();
    });

    // Only update the corresponding inv_total and total-job-amount on inv_total change
    $(document).on("input", ".job_inv_total", function () {
        var row = $(this).closest("tr");
        JobcalculateRowTotals(row);
        JobupdateTotalJobAmount();
    });


    $("#job-multiple-primary").click(function () {
        var newRow = `
            <tr>
                <td colspan="2"><input type="text" class="form-control job_inv_desc" name="description[]" placeholder="Description"></td>
                <td><input type="text" class="form-control job_inv_whr" name="warehouse[]" placeholder="Warehouse"></td>
                <td><input type="number" class="form-control job_inv_qty" name="qty_hrs[]" placeholder="Qty"></td>
                <td><input type="number" class="form-control job_inv_rate" name="rate[]" placeholder="Rate"></td>
                <td><input type="number" class="form-control job_inv_total" name="total[]" placeholder="Total" readonly></td>
                <td><input type="number" class="form-control job_inv_cost" name="cost[]" placeholder="Cost"></td>
                <td><input type="text" class="form-control job_inv_tax" name="margin_tax[]" placeholder="Tax"></td>
                <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
            </tr>`;
        $("#job-invoice-rows").append(newRow);

        JobcalculateRowTotals($("#job-invoice-rows tr:last"));
        JobupdateTotalJobAmount();
    });

    // Event listener: Remove a row from the invoice table
    $("#job-invoice-rows").on("click", ".remove-row", function () {
        $(this).closest("tr").remove();
        JobupdateTotalJobAmount();
    });


    var EsttotalJobAmount = 0;


    function EstcalculateRowTotals(row) {
        var est_rate = parseFloat(row.find(".est_inv_rate").val()) || 0;
        var est_qty = parseFloat(row.find(".est_inv_qty").val()) || 0;
        var est_cost = parseFloat(row.find(".est_inv_cost").val()) || 0;
        var est_tax = parseFloat(row.find(".est_inv_tax").val()) || 0;


        var est_total = est_rate * est_qty;
        var subtotal = est_total + est_cost;

        // Calculate tax as a percentage of the subtotal
        var taxAmount = subtotal * (est_tax / 100);

        var estTotal = subtotal + taxAmount;
        row.find(".est_inv_total").val(estTotal.toFixed(2));
        return estTotal;
    }

    //Update update Total Job Amount
    function EstupdateTotalJobAmount() {
        EsttotalJobAmount = 0;
        EstCost = 0;
        $(".est_inv_total").each(function () {
            EsttotalJobAmount += parseFloat($(this).val());
        });
        $(".est_inv_cost").each(function () {
            EstCost += parseFloat($(this).val());
        });
        $("#est-product-and-service-taxes-and-fees").text("$" + EsttotalJobAmount.toFixed(2));
        EstcalculateAndDisplayGrossProfit();
    }

    function EstcalculateAndDisplayGrossProfit() {

        var EsttotalAmount = EsttotalJobAmount; // Assuming you have an input field for total job amount
        // var EstCost = EsttotalJobAmount; // Assuming you have an input field for total cost
        var EstgrossProfit = EsttotalAmount - EstCost;
        var EstgrossProfitPercentage = (EsttotalJobAmount === 0) ? 0 : ((EstgrossProfit / EsttotalJobAmount) * 100);

        // Ensure the grossProfitPercentage doesn't exceed 100%
        EstgrossProfitPercentage = Math.min(EstgrossProfitPercentage, 100);

        $("#est-total-job-amount").text("$" + EsttotalAmount.toFixed(2));
        $("#est_total_cost").text("$" + EstCost.toFixed(2));
        $("#est-gross-profit").text("$" + EstgrossProfit.toFixed(2));

        // Display grossProfitPercentage under 100% or display 100% if it's greater
        $("#est-gross-profit-percentage").text("(" + EstgrossProfitPercentage.toFixed(2) + "%)");
    }

    $(document).on("input", ".est_inv_qty, .est_inv_rate, .est_inv_cost, .est_inv_tax", function () {
        var row = $(this).closest("tr");
        var EstTotal = EstcalculateRowTotals(row);
        EstupdateTotalJobAmount();
    });

    // Listen for input changes on drive and labor time fields
    $("#est_drive_time, #est_labor_time, #est_amount, #est_payments_and_deposits_input").on("input", function () {
        EstupdateTotalDriveAndLaborTime();
    });

    // Only update the corresponding inv_total and total-job-amount on inv_total change
    $(document).on("input", ".est_inv_total", function () {
        var row = $(this).closest("tr");
        EstcalculateRowTotals(row);
        EstupdateTotalJobAmount();
    });

    $("#est_multiples_primary").click(function () {

        var newRow = `
            <tr>
                <td colspan="2"><input type="text" class="form-control est_inv_desc" name="description" placeholder="Description"></td>
                <td><input type="number" class="form-control est_inv_qty" name="qty_hrs" placeholder="Qty"></td>
                <td><input type="number" class="form-control est_inv_rate" name="rate" placeholder="Rate"></td>
                <td><input type="number" class="form-control est_inv_tax" name="margin_tax" placeholder="Tax"></td>
                <td><input type="text" class="form-control est_inv_total" name="total" placeholder="Total" readonly></td>
                <td><input type="number" class="form-control est_inv_cost" name="cost1" placeholder="Cost"></td>
                <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
            </tr>`;
        $("#est-invoice-rows").append(newRow);

        EstcalculateRowTotals($("#est-invoice-rows tr:last"));
        EstupdateTotalJobAmount();
    });

    $("#est-invoice-rows").on("click", ".remove-row", function () {
        $(this).closest("tr").remove();
        EstupdateTotalJobAmount();

    });

    // Faraz
    // Multiple Primary Section
    $('#add-pri').click(function () {
        var newDiv = $("#pri_div").clone();

        // Remove the template's ID to avoid duplicates
        newDiv.removeAttr("id");
        newDiv.removeClass("d-none","exclude-from-submission");
        newDiv.find('input[type="text"]').val('');
        // Append the cloned div to the container
        $("#some").append(newDiv);

        // Add a remove button to the cloned form
        newDiv.append('<button type="button"  class="remove-pri btn btn-danger mb-4">Delete </button>');
    });

    $(document).on('click', '.remove-pri', function () {
        $(this).closest('.pri_append').remove();
    });
    // Add Services
    $('#add-ser').click(function () {
        var newElement = $(
            '<div id="new-ser" class=" row">' +

            '<div class="col-sm-2">' +
            '    <div class="mb-3">' +
            '        <label for="exampleInputlocation" class="form-label">Nickname</label>' +
            '        <input type="text" class="form-control" name="nick_name[]" id="exampleInputlocation" placeholder="David Smith">' +
            '    </div>' +
            '</div>' +
            '<div class="col-sm-2">' +
            '    <div class="mb-3">' +
            '        <label for="flexRadioDefaulta" class="form-label">Primary?</label>' +
            '        <select class="form-select form-control" name="primary[]" aria-label="Default select example">' +
            '            <option value="yes">Yes</option>' +
            '            <option value="no">No</option>' +
            '        </select>' +
            '    </div>' +
            '</div>' +
            '<div class="col-sm-2">' +
            '    <div class="mb-3">' +
            '        <label for="flexRadioDefaultd" class="form-label">Billing Address?</label>' +
            '        <select class="form-select form-control" name="billing_address[]" aria-label="Default select example">' +
            '            <option value="yes">Yes</option>' +
            '            <option value="no">No</option>' +
            '        </select>' +
            '    </div>' +
            '</div>' +
            '<div class="col-sm-2">' +
            '    <div class="mb-3">' +
            '        <label for="email-div" class="form-label">Contact</label>' +
            '        <select class="form-select form-control" name="contact_type[]" aria-label="Default select example">' +
            '            <option value="0" disabled>Select Contact</option>' +
            '            <option value="contact 1">contact 1</option>' +
            '            <option value="contact 2">contact 2</option>' +
            '        </select>' +
            '    </div>' +
            '</div>' +
            '<div class="col-sm-2">' +
            '    <div class="mb-3">' +
            '        <label for="flexRadioDefaulte" class="form-label">Active?</label>' +
            '        <select class="form-select form-control" name="active_service[]" aria-label="Default select example">' +
            '            <option value="yes">Yes</option>' +
            '            <option value="no">No</option>' +
            '        </select>' +
            '    </div>' +
            '</div>' +
            '<div class="col-sm-2">' +
            '<button type="button" id="remove-ser" class="add-more-btn mt-4"><i class="fas fa-trash text-danger"></i></button>' +
            '</div>' +
            '<div class="col-sm-12">' +
            '    <div class="location-div">' +
            '        <div class="row">' +
            '            <div class="col-sm-4">' +
            '                <div class="mb-3">' +
            '                    <label for="exampleInputstreet" class="form-label">Street Address or Latitude, Longitude</label>' +
            '                    <input type="text" name="address[]" class="form-control" id="exampleInputstreet" placeholder="Street Address or Latitude, Longitude">' +
            '                </div>' +
            '            </div>' +
            '            <div class="col-sm-2">' +
            '                <div class="mb-3">' +
            '                    <label for="exampleInputapt" class="form-label">Apt/Suite/Unit #</label>' +
            '                    <input type="text" name="aptNo[]" class="form-control" id="exampleInputapt" placeholder="Apt Suite Unit #">' +
            '                </div>' +
            '            </div>' +
            '            <div class="col-sm-2">' +
            '                <div class="mb-3">' +
            '                    <label for="exampleInputcity" class="form-label">City</label>' +
            '                    <input type="text" name="city[]" class="form-control" id="exampleInputcity" placeholder="City Name">' +
            '                </div>' +
            '            </div>' +
            '            <div class="col-sm-2">' +
            '                <div class="mb-3">' +
            '                    <label for="exampleInputstate" class="form-label">State/Province</label>' +
            '                    <input type="text" name="state[]" class="form-control" id="exampleInputstate" placeholder="State Province">' +
            '                </div>' +
            '            </div>' +
            '            <div class="col-sm-2">' +
            '                <div class="mb-3">' +
            '                    <label for="exampleInputzip" class="form-label">Zip/Postal Code</label>' +
            '                    <input type="text" name="zip[]" class="form-control" id="exampleInputzip" placeholder="Zip Postal Code">' +
            '                </div>' +
            '            </div>' +
            '        </div>' +
            '    </div>' +
            '</div>' +
            '</div>');

        // You can now append or manipulate the 'newElement' as needed in your web page.
        $('#ser_append').append(newElement);
    });

    $(document).on('click', '#remove-ser', function () {
        $('#new-ser').remove();
    });

    $('#add-checklist-item').click(function() {
        var newChecklistItem = $(
            '<div class="my-2 new-checklist-item">' +

            '<input type="text" class="form-control my-custom-class" name="checklist_items[]" placeholder="Enter Checklist Item">' +


            '<div class="col-md-3 my-1">' +
            '<button type="button" class="btn btn-danger remove-checklist-item">Remove</button>' +

            '</div>' +
            '</div>'
        );

        $('#checklist-items').append(newChecklistItem);
    });

    $(document).on('click', '.remove-checklist-item', function() {
        $(this).closest('.new-checklist-item').remove();
    });

    // Add Commission
    $('#add-com').click(function () {
        var newElement = $(
            '<div class="agent-inner-div" id="new-com">' +
            '<div class="commission-div">' +
            '<label for="agent-div" class="form-label">Assigned Rep</label>' +
            '<select class="form-select form-control" name="assigned_rep[]" aria-label="Default select example" id="agent-div">' +
            '<option value="1">Do Not Assign Agent/Rep</option>' +
            '</select>' +
            '</div>' +
            '<div class="commission1-div">' +
            '<label for="commission-div" class="form-label">Commission</label>' +
            '<select class="form-select form-control" name="commission_sign[]" aria-label="Default select example" id="commission-div">' +
            '<option value="1">%</option>' +
            '</select>' +
            '</div>' +
            '<div class="commission2-div">' +
            '<input type="text" class="form-control" name="commission[]" id="exampleInputcommtag">' +
            '</div>' +
            '<div class="commission3-div">' +
            '<button type="button" id="remove-com" class="add-sign"><i class="fas fa-trash text-danger"></i></button>' +
            '</div>' +
            '</div>'
        );



        // You can now append or manipulate the 'newElement' as needed in your web page.
        $('#com_append').append(newElement);
    });

    $(document).on('click', '#remove-com', function () {
        $('#new-com').remove();
    });
});
