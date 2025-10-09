<style>

</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Upload Resume</h5>
                                <input class="form-control" type="file" id="formFile">
                                <p style="font-size: 12px; margin-top: 10px;">Upload only pdf file, Max size 5 mb</p>
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 d-none d-md-flex justify-content-center align-items-center">
                        <div class="position-relative" style="height: 100px; width: 1px; background-color: #ccc;">
                            <span style="
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            background: #fff;
                            padding: 0 4px;
                            font-size: 12px;
                            color: #888;
                            font-weight: bold;
                            ">OR</span>
                        </div>
                    </div>
                </div>
            </div>

            
  
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Enter details manually</h5>
                        <form class="row">

                            <h5 class="text-danger mb-3 mt-3">A: Employement Details</h5>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="Department" class="form-label">Department</label>
                                    <select class="form-select" aria-label="Select department">
                                        <option selected="">Select department</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            
                                <div class="col-md-4">
                                    <label for="Designation" class="form-label">Designation</label>
                                    <select class="form-select" aria-label="Select designation">
                                        <option selected="">Select designation</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>

                            <h5 class="text-danger mb-3 mt-3">A: Education</h5>
                            <div class="col-md-12 mb-3 educationBox">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Qualification" class="form-label">Qualification</label>
                                        <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Enter your qualification">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Subject" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your subject">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="Percentage" class="form-label">Percentage</label>
                                        <input type="text" class="form-control" id="percentage" name="percentage" placeholder="Enter your percentage">
                                    </div>
                                    <div class="col-md-1" style="margin-top: 31px;">
                                        <a href="javascript:void(0)" id="educationAddMore" class="btn btn-primary w-100">Add</a>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-danger mb-3 mt-3">B: Experience</h5>
                            <div class="col-md-12 mb-3 experienceBox">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Company Name" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter your company name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Industry" class="form-label">Industry</label>
                                        <input type="text" class="form-control" id="industry" name="industry" placeholder="Enter your industry">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="Designation" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter your designation">
                                    </div>
                                    <div class="col-md-1" style="margin-top: 31px;">
                                        <a href="javascript:void(0)" id="experienceAddMore" class="btn btn-primary w-100">Add</a>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-danger mb-3 mt-3">C: Skills</h5>
                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Company Name" class="form-label">Skills</label>
                                        <input type="text" class="form-control" id="skill_input" name="skill_input" placeholder="Enter your skills">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="Company Name" class="form-label">Level</label>
                                        <select class="form-select" id="skill_level" name="skill_level" aria-label="Select level">
                                            <option selected="">Select level</option>
                                            <option value="Expert">Expert</option>
                                            <option value="Advanced">Advanced</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Beginner">Beginner</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1" style="margin-top: 31px;">
                                        <a href="javascript:void(0)" id="add_skill" class="btn btn-primary w-100">Add</a>
                                    </div>
                                </div>
                                <!-- <div id="skill_tags" class="mt-3"></div> -->

                                <div class="mt-4" id="skills_table_wrapper" style="display: none;">
                                    <table class="table table-bordered" id="skills_table">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Skill</th>
                                                <th>Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- New rows will be appended here -->
                                        </tbody>
                                    </table>
                                </div>

                                
                            </div>

                            
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>

    $('#educationAddMore').on('click',function(e){
        e.preventDefault();
        var educationEntry = $(
            '<div class="education-box pt-2">' +
                '<div class="row">'+
                    '<div class="col-md-4">'+
                        '<input type="text" class="form-control" id="qualification" name="qualification" placeholder="Enter your qualification">'+
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your subject">'+
                    '</div>'+
                    '<div class="col-md-3">'+
                        '<input type="text" class="form-control" id="percentage" name="percentage" placeholder="Enter your percentage">'+
                    '</div>'+
                    '<div class="col-md-1">'+
                        '<a href="javascript:void(0)" class="btn btn-danger deleteEducation w-100" style="margin-top: -1px;"><i class="bi bi-x-lg"></i></a>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );
        $('.educationBox').append(educationEntry);
    });

    $('.educationBox').on('click', '.deleteEducation', function() {
        $(this).closest('.education-box').remove();
    });


    $('#experienceAddMore').on('click',function(e){
        e.preventDefault();
        var educationEntry = $(
            '<div class="experience-box pt-2">' +
                '<div class="row">'+
                    '<div class="col-md-4">'+
                        '<input type="text" class="form-control" id="qualification" name="qualification" placeholder="Enter your qualification">'+
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your subject">'+
                    '</div>'+
                    '<div class="col-md-3">'+
                        '<input type="text" class="form-control" id="percentage" name="percentage" placeholder="Enter your percentage">'+
                    '</div>'+
                    '<div class="col-md-1">'+
                        '<a href="javascript:void(0)" class="btn btn-danger deleteExperience w-100" style="margin-top: -1px;"><i class="bi bi-x-lg"></i></a>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );
        $('.experienceBox').append(educationEntry);
    });

    $('.experienceBox').on('click', '.deleteExperience', function() {
        $(this).closest('.experience-box').remove();
    });



//   $(document).ready(function () {
//     $('#add_skill').click(function () {
//       const skill = $('#skill_input').val().trim();

//       if (skill !== '') {
//         const tag = `
//           <span class="badge bg-secondary me-1 mb-1">
//             ${skill}
//             <button type="button" class="btn-close btn-close-white btn-sm ms-1 remove-skill" aria-label="Remove"></button>
//           </span>
//         `;
//         $('#skill_tags').append(tag);
//         $('#skill_input').val('');
//       }
//     });

//     $('#skill_tags').on('click', '.remove-skill', function () {
//       $(this).closest('span').remove();
//     });
//   });

    $(document).ready(function () {
        function toggleTableVisibility() {
        if ($('#skills_table tbody tr').length > 0) {
            $('#skills_table_wrapper').show();
        } else {
            $('#skills_table_wrapper').hide();
        }
        }

        $('#add_skill').on('click', function () {
        const skill = $('#skill_input').val().trim();
        const level = $('#skill_level').val();

        if (!skill || !level || level === "Select level") {
            alert("Please enter both skill and level.");
            return;
        }

        const row = `<tr>
                        <td>${skill}</td>
                        <td>${level}</td>
                        <td><button class="btn btn-sm btn-danger delete-skill">Delete</button></td>
                    </tr>`;

        $('#skills_table tbody').append(row);

        $('#skill_input').val('');
        $('#skill_level').val('Select level');

        toggleTableVisibility();
        });

        $(document).on('click', '.delete-skill', function () {
        $(this).closest('tr').remove();
        toggleTableVisibility();
        });

        // Hide initially
        toggleTableVisibility();
    });

</script>