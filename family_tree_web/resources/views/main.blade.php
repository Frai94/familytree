<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Family Tree</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- JQuery & JS bundle -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>
    </head>
    <body>
        <!-- Add Family Member Modal -->
        <div class="modal fade addFamilyMember" id="addFamilyMember" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <form method="POST" action="" role="form" id="addMemberForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Member Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="memID" value="">
                        <label for="fullname" class="col-sm-4">Fullname:</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="fullname" placeholder="Fullname" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="col-sm-4">Gender</label>
                        <div class="col-md-12">
                            <select class="form-control" id="gender" required>
                                <option value="" selected disabled>- Select Gender -</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="age" class="col-sm-4">Age:</label>
                        <div class="col-md-12">
                            <input type="number" min="1" max="120" class="form-control" id="age" placeholder="Age" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btnAddMember" class="btn btn-primary" style="display:block;">Save</button>
                    <button type="button" id="btnUpdateMember" class="btn btn-primary" style="display:none;">Update</button>
                </div>
            </form>
            </div>
        </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <h1 class="text-center p-5">Family Tree</h1>
                   <hr style="height:5px;color:blue;background-color:rgb(13, 71, 161)">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFamilyMember">
                        Add Family Member
                    </button>  
                </div>
                <div class="col-md-4">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle">View Members</button>
                        <div class="dropdown-content" id="members">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 pt-5">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="memberTable">
                            <thead>
                                <tr>
                                    <th>Fullname</th> 
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-body" id="memberDetails">
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                var host = 'http://192.168.0.17:8000/';

                function getAllMembers(){
                    var members = $("#members");
                        members.empty();

                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type:'GET',
                        url: host + 'getAllMember',
                        data:'_token = <?php echo csrf_token() ?>',
                        success: function(data) {
                            var data_count = data.results.length;

                            for(var i=0; i<data_count; i++){
                                var output = '';

                                output += '<a class="fammember" data-memberid="';
                                output += data.results[i].id;
                                output += '">';
                                output += data.results[i].fullname;
                                output += '</a>';

                                members.append(output);
                            }
                        }
                    });
                }

                getAllMembers();

                $('#members').on('click', 'a', function(e){
                    e.preventDefault()

                        var memberDetails = $("#memberDetails");
                            memberDetails.empty();
                        var memberID = $(this).data('memberid');
                        
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            type:'POST',
                            url: host + 'getMember',
                            data:{memberID:memberID, _token:"{{ csrf_token() }}"},
                            success: function(data) {
                                var output = '';

                                output += '<tr><td class="detailFullname">';
                                output += data.results.fullname;
                                output += '</td><td>';
                                output += data.results.gender;
                                output += '</td><td>';
                                output += data.results.age;
                                output += '</td><td>';
                                output += '<button type="button" class="btn btn-sm btn-warning mr-2 btn_edit" data-memid="';
                                output += data.results.id;
                                output += '" data-fullname="';
                                output += data.results.fullname;
                                output += '" data-gender="';
                                output += data.results.gender;
                                output += '" data-age="';
                                output += data.results.age; 
                                output += '">Edit</button><nobr>';
                                output += '<button type="button" class="btn btn-sm btn-danger btn_delete" data-deleteid="'+data.results.id+'">Delete</button>';
                                output += '</td></tr>';

                                memberDetails.append(output);
                            },
                            error: function(data_error){
                                var errors = data_error.responseJSON;
                                console.log(errors);
                            }
                        });

                    return false; 
                });

                $(document).on("click", ".btn_edit", function(e){
                    var detailFullname = $(this).data('fullname');
                    var detailgender = $(this).data('gender');
                    var detailage = $(this).data('age');
                    var memID = $(this).data('memid');
                        
                    $('#addFamilyMember').modal('show');
                    document.getElementById("btnAddMember").style.display = "none";
                    document.getElementById("btnUpdateMember").style.display = "block";

                    $('#memID').val(memID);
                    $('#fullname').val(detailFullname);
                    $('#gender').val(detailgender);
                    $('#age').val(detailage);
                });

                $(document).on("click", ".btn_delete", function(e){
                    var memberID = $(this).data('deleteid');

                    if(!confirm('Do you want to DELETE this Member?')){
                        e.preventDefault();
                    } else {
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            type:'POST',
                            url: host + 'deleteMember',
                            data:{memberID:memberID, _token:"{{ csrf_token() }}"},
                            success: function(data) {
                                getAllMembers();
                                $("#memberDetails").empty();
                                alert(data.results);
                            },
                            error: function(data_error){
                                var errors = data_error.responseJSON;
                                console.log(errors);
                            }
                        });
                    }
                });

                $('#addMemberForm').on('submit', function(e){
                    e.preventDefault();

                    var fullname = $('#fullname').val();
                    var gender = $('#gender').val();
                    var age = $('#age').val();

                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type:'POST',
                        url: host + 'addMember',
                        data:{fullname:fullname,gender:gender,age:age, _token:"{{ csrf_token() }}"},
                        success: function(data) {
                            $('#addFamilyMember').modal('hide');
                            $("#addMemberForm")[0].reset();
                            alert("Saved Successfully!");

                            getAllMembers();
                        },
                        error: function(data_error){
                            var errors = data_error.responseJSON;
                            console.log(errors);
                        }
                    });
                });

                $('#btnUpdateMember').on('click', function(e){
                    e.preventDefault();

                    var memID = $('#memID').val();
                    var fullname = $('#fullname').val();
                    var gender = $('#gender').val();
                    var age = $('#age').val();

                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type:'POST',
                        url: host + 'updateMember',
                        data:{memberID:memID,fullname:fullname,gender:gender,age:age, _token:"{{ csrf_token() }}"},
                        success: function(data) {
                            $('#addFamilyMember').modal('hide');
                            $("#addMemberForm")[0].reset();
                            $("#memberDetails").empty();

                            alert("Updated Successfully!");

                            getAllMembers();
                        },
                        error: function(data_error){
                            var errors = data_error.responseJSON;
                            console.log(errors);
                        }
                    });
                });

                $('#addFamilyMember').on('hidden.bs.modal', function () {
                    $("#addMemberForm")[0].reset();
                    document.getElementById("btnAddMember").style.display = "block";
                    document.getElementById("btnUpdateMember").style.display = "none";
                })
            });
        </script>
    </body>
</html>
