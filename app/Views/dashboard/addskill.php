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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Upload Resume</h5>

                        <input class="form-control" type="file" id="formFile">
                        <p style="font-size: 12px; margin-top: 10px;">Upload only pdf file, Max size 5 mb</p>
                    </div>
                </div>
            </div>

            <div class="col-md-1">
                <div class="d-flex align-items-center my-4" style="rotate: 90deg;">
                    <hr class="flex-grow-1">
                    <span class="px-3 text-muted" style="rotate: 270deg;">OR</span>
                    <hr class="flex-grow-1">
                </div>
            </div>
  
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Enter details manually</h5>

                        <form class="row">
                            <h5 class="text-danger mb-3 mt-3">A: Education</h5>
                            <div class="col-md-12 mb-3 candidateDiv">
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
                                        <a href="javascript:void(0)" id="candidateAddMore" class="btn btn-primary">Add</a>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-danger mb-3 mt-3">B: Experience</h5>
                            <div class="col-md-12 mb-3">
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
                                        <button class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-danger mb-3 mt-3">C: Skills</h5>
                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-md-11">
                                        <label for="Company Name" class="form-label">Skills</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter your company name">
                                    </div>
                                    <div class="col-md-1" style="margin-top: 31px;">
                                        <button class="btn btn-primary">Add</button>
                                    </div>
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

    $('#candidateAddMore').on('click',function(e){
        e.preventDefault();
        var candidateEntry = $(
            '<div class="candidate-info">' +
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
                        '<a href="javascript:void(0)" id="candidateAddMore" class="btn btn-danger">Delete</a>'+
                    '</div>'+
                '</div>'+
            '</div>'

            // '<div class="candidate-info">' +
            //     '<div class="row">'+
            //         '<div class="col-md-4">'+
            //            ' <div class="form-group">'+
            //                 '<input type="text" class="form-control" name="name[]" id="name" placeholder="Enter full name" required="">'+
            //             '</div>'+
            //         '</div>'+
            //         '<div class="col-md-3">'+
            //            ' <div class="form-group">'+
            //                 '<input type="text" class="form-control" name="email[]" id="email" placeholder="Enter email id" required="">'+
            //             '</div>'+
            //         '</div>'+
            //         '<div class="col-md-3">'+
            //            ' <div class="form-group">'+
            //                 '<input type="text" class="form-control" name="phone[]" id="phone" placeholder="Enter phone number" required="">'+
            //             '</div>'+
            //         '</div>'+
            //         '<div class="col-md-2">'+
            //             '<label for="bio"></label>'+
            //             '<a href="javascript:void(0)" class="btn btn-danger btn-sm deleteCandidate" style="margin-top: 15px;"><i class="fa fa-times"></i> Delete</a>'+
            //         '</div>'+
            //     '</div>'+
            // '</div>'
        );
        $('.candidateDiv').append(candidateEntry);
    });

    $('.candidateDiv').on('click', '.deleteCandidate', function() {
        $(this).closest('.candidate-info').remove();
    });

</script>