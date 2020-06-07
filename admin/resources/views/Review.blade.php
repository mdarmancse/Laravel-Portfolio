@extends('layout.app')

@section('content')

    <div id="mainDiv" class="container d-none">

        <div class="row">
            <div class="col-md-12 p-5">
                <button id="addNewBtn" type="button" class="mt-3 btn btn-sm btn-danger">Add New</button>
                <table id="ReviewsDataTable" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="review_table">


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
                    <p id="reviewDeleteId" class="mt-4 d-none"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" id="reviewDeleteConfirmButton" data-id="" class="btn btn-sm btn-danger">Yes</button>
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

                    <p id="reviewEditId" class="mt-4 d-none"></p>

                    <div id="ReviewEditForm" class="d-none">


                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" id="reviewNameId" class="form-control validate" placeholder="Name">
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="text" id="reviewDesId" class="form-control validate" placeholder="Description">
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-image prefix grey-text"></i>
                            <input type="email" id="reviewImgId" class="form-control validate" placeholder="Review Image Link">
                        </div>

                    </div>
                    <div class="text-center">
                        <img id="reviewEditLoader" class="loading-icon m-5" src="{{asset('admin/images/loader.svg')}}">
                        <h5 id="reviewEditWrong" class="d-none">Something Went Wrong!</h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" id="reviewEditConfirmBtn" data-id="" class="btn btn-sm btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add New Review</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input   placeholder="Name" type="text" id="NameAddId" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input   placeholder="Description" type="text" id="DesAddId" class="form-control validate">
                    </div>

                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input   placeholder="Image Link" type="text" id="ImgAddId" class="form-control validate">
                    </div>


                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-sm btn-secondary">Cancel</button>
                    <button id="reviewAddConfirmBtn" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('script')
    <script type="text/javascript">


        getReviewsData();

    </script>


@endsection
