@extends('Layout.app')
@section('title','Photo Gallery')
@section('content')

    <div  class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3">
                <button id="addBtnId" class="btn my-3 btn-sm btn-danger">Add New </button>

            </div>
        </div>
    </div>

    <div  class="container-fluid">
        <div class="row photoRow" >


        </div>
    </div>


        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Photo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" id="imgInput" type="file">
                        <img class="imgPreview" id="imgPreview" src="{{asset('images/defaultImg.png')}}">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                        <button  id="saveId" type="button" class="btn  btn-sm  btn-danger">Save</button>
                    </div>
                </div>
            </div>
        </div>


@endsection


@section('script')

    <script type="text/javascript">

        $('#addBtnId').click(function () {
            $('#addModal').modal('show')
        });

        $('#imgInput').change(function () {

            let reader=new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload=function (event) {

                let imgSource=event.target.result;
                $('#imgPreview').attr('src',imgSource);

            }
        });

        $('#saveId').on('click',function () {

            $('#saveId').html("<div class='spinner-border spinner-border-sm' role='status'></div>");

            let PhotoFile=$('#imgInput').prop('files')[0];
            let formData=new FormData();
            formData.append('photo',PhotoFile);


            axios.post('/PhotoUpload',formData)
                .then(function (response) {
               if(response.status==200 && response.data==1){
                   $('#addModal').modal('hide');
                   $('#saveId').html('Save');
                   toastr.success('Photo upload succesfully');

               }
               else {
                   $('#addModal').modal('hide');
                   toastr.success('Photo upload failed');
               }
            })
                .catch(function (error) {
                    $('#addModal').modal('hide');
                    toastr.success('Photo upload failed');
                })

        });


        LoadPhoto();
        function LoadPhoto() {

            axios.get('/PhotoRow')
                .then(function (response) {
                    $.each(response.data, function(i, item) {
                        $("<div class='col-md-3 p-2'>").html(
                        "<img class='imageOnRow' src="+item['location']+">"
                        ).appendTo('.photoRow');
                    });

                })
                .catch(function (error) {

            })

        }

    </script>

@endsection

