@extends('layout.app')
@section('content')

    <div id="mainDiv" class="container d-none">

        <div class="row">
            <div class="col-md-12 p-5">
                <button id="addFormBtn" type="button" class="mt-3 btn btn-sm btn-danger">Add New</button>
                <table id="ServiceDataTable" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="service_table">


                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!--------------------------LOADER ----------------->

    <div id="loaderDiv" class="container">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img class="loading-icon m-5" src="{{asset('admin/images/loader.svg')}}" alt="">
            </div>
        </div>
    </div>

    <div id="wrongDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5 text-center">

                <h2>Something Went Wrong!</h2>
            </div>
        </div>
    </div>
    <!-------------------------------DELETE MODAL------------------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center p-2 mt-3">
                    <p class="">Do You Want to Delete?</p>
                    <p id="serviceDeleteId" class="mt-4 d-none"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" id="serviceDeleteConfirmButton" data-id="" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <!-------------------------------Edit MODAL------------------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body mx-3">

                    <p id="serviceEditId" class="mt-4 d-none"></p>

                    <div id="serviceEditForm" class="d-none">


                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" id="serviceNameId" class="form-control validate" placeholder="Service Name">
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="text" id="serviceDesId" class="form-control validate" placeholder="Service Description">
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-image prefix grey-text"></i>
                            <input type="email" id="serviceImgId" class="form-control validate" placeholder="Service Image Link">
                        </div>

                    </div>
                    <div class="text-center">
                        <img id="serviceEditLoader" class="loading-icon m-5" src="{{asset('admin/images/loader.svg')}}">
                        <h5 id="serviceEditWrong" class="d-none">Something Went Wrong!</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" id="serviceEditConfirmBtn" data-id="" class="btn btn-sm btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-------------------------------Insert MODAL------------------------------------------->


    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Service</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input   placeholder="Service Name" type="text" id="serviceNameAddId" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input   placeholder="Service Description" type="text" id="serviceDesAddId" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input   placeholder="Service Image Link" type="text" id="serviceImgAddId" class="form-control validate">
                    </div>




                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-sm btn-secondary">Cancel</button>
                    <button id="serviceAddConfirmBtn" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('script')
    <script type="text/javascript">
        getServicesData();


        function getServicesData() {

            axios.get("/getServicesData")
                .then(function(response) {

                    if (response.status == 200) {

                        $('#mainDiv').removeClass('d-none')
                        $('#loaderDiv').addClass('d-none')

                        $('#ServiceDataTable').DataTable().destroy();
                        $('#service_table').empty();
                        var jsonData = response.data;
                        // $.each(jsonData, function (i, item) {   })
                        for (var i = 0; i < jsonData.length; i++) {

                            // var obj = jsonData[i];
                            // console.log(obj.id);
                            $('<tr>').html(
                                "<td class='th-sm'><img class='table-img' src=" + jsonData[i].service_img + "></td>" +
                                "<td>" + jsonData[i].service_name + "</td>" +
                                "<td>" + jsonData[i].service_des + "</td>" +
                                "<td><a  class='serviceEditBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                                // "<td><a  data-toggle='modal' data-target='#deleteModal'><i class='fas fa-trash'></i></a></td>"
                                "<td><a  class='serviceDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash'></i></a></td>"
                            ).appendTo('#service_table');
                        }

                        //Service Table Delete Icon Click
                        $('.serviceDeleteBtn').click(function() {
                            //  var id = $(this).attr("data-id") alrernative  data('id')
                            var id = $(this).data("id")
                            $('#serviceDeleteId').html(id)
                            //ID SEND TO SERVICES PAGES BUTTON AND SET IT TO DYNAMIC ID
                            //$('#serviceDeleteConfirmButton').attr('data-id', id);
                            $('#deleteModal').modal('show')

                        });


                        //Service Table Edit Icon Click
                        $('.serviceEditBtn').click(function() {
                            var id = $(this).attr("data-id");
                            $('#serviceEditId').html(id)
                            ServiceUpdateDetails(id)
                            $('#editModal').modal('show')


                        });

                        $('#ServiceDataTable').DataTable({"order":false});
                        $('.dataTables_length').addClass('bs-select');

                    } else {
                        $('#loaderDiv').addClass('d-none')
                        $('#wrongDiv').removeClass('d-none')
                    }
                }).catch(function(error) {
                $('#loaderDiv').addClass('d-none')
                $('#wrongDiv').removeClass('d-none')

            })

        }

        $('#serviceDeleteConfirmButton').click(function() {
            var id = $('#serviceDeleteId').html()
            // var id = $(this).data("id")
            getServiceDelete(id)


        });

        function getServiceDelete(id) {
            $("#serviceDeleteConfirmButton").html("<div class='spinner-border spinner-border-sm' role='status'></div>")

            axios.get('/serviceDelete/' + id)
                .then(function(response) {

                    if (response.status == 200) {
                        if (response.data == 1) {
                            $("#serviceDeleteConfirmButton").html("Delete"); //etar kaj holo 1stly jkn loader set korce tokon loader ta soltey takbey eta stop korar jonno agin "DELETE/YES" string diye set kore jatey next step e delete korar time e loader ta na gorey moto
                            $('#deleteModal').modal('hide')
                            toastr.success('Delete Success');
                            getServicesData()
                        } else {
                            $('#deleteModal').modal('hide')
                            toastr.error('Delete Failed');
                            getServicesData()
                        }
                    } else {

                        $('#deleteModal').modal('hide')
                        toastr.error('Something Went Wrong');
                    }
                }).catch(function() {

                $('#deleteModal').modal('hide')
                toastr.error('Something Went Wrong');
            })
        }


        //EACH SERVICES UPDATE DETAILS

        function ServiceUpdateDetails(detailsID) {

            var url = '/serviceDetails';
            var jsonObj = {
                id: detailsID
            }
            axios.post(url, jsonObj)
                .then(function(response) {

                    if (response.staus = 200) {

                        $('#serviceEditForm').removeClass('d-none')
                        $('#serviceEditLoader').addClass('d-none');

                        var jsonData = response.data;
                        $('#serviceNameId').val(jsonData[0].service_name);
                        $('#serviceDesId').val(jsonData[0].service_des);
                        $('#serviceImgId').val(jsonData[0].service_img);

                    } else {
                        $('#serviceEditLoader').addClass('d-none');
                        $('#serviceEditWrong').removeClass('d-none');
                    }

                }).catch(function() {
                $('#serviceEditLoader').addClass('d-none');
                $('#serviceEditWrong').removeClass('d-none');
            })
        }


        $("#serviceEditConfirmBtn").click(function() {
            var id = $('#serviceEditId').html()
            var name = $('#serviceNameId').val()
            var des = $('#serviceDesId').val()
            var img = $('#serviceImgId').val()

            ServiceUpdate(id, name, des, img)

        })


        function ServiceUpdate(serviceID, serviceName, serviceDes, serviceImg) {

            if (serviceName.length == 0) {
                toastr.error('Service Name is empty !');
            } else if (serviceDes.length == 0) {
                toastr.error('Service Description  is empty !');

            } else if (serviceImg.length == 0) {
                toastr.error('Service Image  is empty !');

            } else {

                var url = '/serviceUpdate';
                var jsonObj = {
                    id: serviceID,
                    name: serviceName,
                    des: serviceDes,
                    img: serviceImg
                }
                $("#serviceEditConfirmBtn").html("<div class='spinner-border spinner-border-sm' role='status'></div>")

                axios.post(url, jsonObj)
                    .then(function(response) {
                        if (response.status == 200) {
                            if (response.data == 1) {
                                $("#serviceEditConfirmBtn").html("YES");
                                $('#editModal').modal('hide')
                                toastr.success('Update Success');
                                getServicesData()
                            } else {
                                $('#editModal').modal('hide')
                                toastr.error('Update Failed');
                                getServicesData()
                            }
                        } else {
                            $('#editModal').modal('hide')
                            toastr.error('Something Went Wrong');
                        }
                    }).catch(function() {
                    $('#editModal').modal('hide')
                    toastr.error('Something Went Wrong');
                })



            }
        }

        //Insert Service Codes

        $('#addFormBtn').click(function () {
            $('#addModal').modal('show');
        })

        $("#serviceAddConfirmBtn").click(function() {
            var name = $('#serviceNameAddId').val()
            var des = $('#serviceDesAddId').val()
            var img = $('#serviceImgAddId').val()

            ServiceAdd(name, des, img)

        })



        function ServiceAdd(serviceName, serviceDes, serviceImg) {

            if (serviceName.length == 0) {
                toastr.error('Service Name is empty !');
            } else if (serviceDes.length == 0) {
                toastr.error('Service Description  is empty !');

            } else if (serviceImg.length == 0) {
                toastr.error('Service Image  is empty !');

            } else {

                var url = '/serviceAdd';
                var jsonObj = {
                    name: serviceName,
                    des: serviceDes,
                    img: serviceImg
                }
                $("#serviceAddConfirmBtn").html("<div class='spinner-border spinner-border-sm' role='status'></div>")

                axios.post(url, jsonObj)
                    .then(function(response) {
                        if (response.status == 200) {
                            if (response.data == 1) {
                                $("#serviceAddConfirmBtn").html("YES");
                                $('#addModal ').modal('hide')
                                toastr.success('Insert Success');
                                getServicesData()
                            } else {
                                $('#addModal ').modal('hide')
                                toastr.error('Insert Failed');
                                getServicesData()
                            }
                        } else {
                            $('#addModal').modal('hide')
                            toastr.error('Something Went Wrong');
                        }
                    }).catch(function() {
                    $('#addModal').modal('hide')
                    toastr.error('Something Went Wrong');
                })



            }
        }

    </script>

@endsection
