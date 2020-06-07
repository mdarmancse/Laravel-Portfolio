function getReviewsData() {
    axios.get('/getReviewsData')
        .then(function (response) {

            if(response.status==200){

                $('#mainDiv').removeClass('d-none')
                $('#loaderDiv').addClass('d-none')

                $('#ReviewsDataTable').DataTable().destroy();
                $('#review_table').empty();
                var jsonData=response.data;
                for(var i=0;i<jsonData.length;i++){

                    $('<tr>').html(

                        "<td class='th-sm'><img class='table-img' src=" + jsonData[i].img + "></td>" +
                        "<td>" + jsonData[i].name + "</td>" +
                        "<td>" + jsonData[i].des + "</td>" +
                        "<td><a  class='reviewEditBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a  class='reviewDeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash'></i></a></td>"

                    ).appendTo('#review_table')
                    $('.reviewDeleteBtn').click(function() {

                        var id = $(this).data("id")
                        $('#reviewDeleteId').html(id)
                        $('#deleteModal').modal('show')

                    });
                    $('.reviewEditBtn').click(function() {
                        var id = $(this).attr("data-id");
                        $('#reviewEditId').html(id)
                        reviewUpdateDetails(id)
                        $('#editModal').modal('show')


                    });
                }
                $('#ReviewsDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');
            }
            else{

                $('#loaderDiv').addClass('d-none')
                $('#wrongDiv').removeClass('d-none')
            }



        })
        .catch(function (error) {
            $('#loaderDiv').addClass('d-none')
            $('#wrongDiv').removeClass('d-none')
        })


}

$('#reviewDeleteConfirmButton').click(function () {
    var id=$('#reviewDeleteId').html()

    getReviewDelete(id);
})


function getReviewDelete(deleteId) {
    $("#reviewDeleteConfirmButton").html("<div class='spinner-border spinner-border-sm' role='status'></div>")

    var url='/reviewDelete';
    var id={id:deleteId};


    axios.post(url,id)
        .then(function (response) {

            if (response.status==200){

                if(response.data==1){
                        $('#reviewDeleteConfirmButton').html('Yes')
                    $('#deleteModal').modal('hide');
                    toastr.success('Delete Success');
                    getReviewsData();

                }
                else{
                    $('#deleteModal').modal('hide');
                    toastr.error('Delete Failed');
                    getReviewsData();

                }


            }
            else{
                $('#deleteModal').modal('hide');
                toastr.error('Something went wrong!!');



            }


        })
        .catch(function (error) {
            $('#deleteModal').modal('hide');
            toastr.error('Something went wrong!!');

        })


}

function reviewUpdateDetails(detailsId) {


    var url='/reviewDetails';
    var id={id:detailsId}

    axios.post(url,id)
        .then(function (response) {

            if(response.status==200){

                $('#ReviewEditForm').removeClass('d-none');
                $('#reviewEditLoader').addClass('d-none');

                var jsonData = response.data;
                $('#reviewNameId').val(jsonData[0].name);
                $('#reviewDesId').val(jsonData[0].des);
                $('#reviewImgId').val(jsonData[0].img);

            }
            else{
                $('#reviewEditLoader').addClass('d-none');
                $('#reviewEditWrong').removeClass('d-none');
            }


        })
        .catch(function (error) {

        })

}

$('#reviewEditConfirmBtn').click(function () {

    var id=$('#reviewEditId').html()
    var name=$('#reviewNameId').val()
    var des=$('#reviewDesId').val()
    var img=$('#reviewImgId').val()

    reviewUpdate(id,name,des,img)


})



function reviewUpdate(id,name,des,img) {

    if (name.length == 0) {
        toastr.error('Name is empty !');
    } else if (des.length == 0) {
        toastr.error(' Description  is empty !');

    } else if (img.length == 0) {
        toastr.error('Image  is empty !');
    }else{

        var url='/reviewUpdate';
        var details={
            id:id,
            name:name,
            des:des,
            img:img

        }
        $("#reviewEditConfirmBtn").html("<div class='spinner-border spinner-border-sm' role='status'></div>")
        axios.post(url,details)
            .then(function (response) {
                if(response.status==200){

                    if(response.data=1){
                        $('#reviewEditConfirmBtn').html('Yes')
                        $('#editModal').modal('hide')
                        toastr.success("Update Success")
                        getReviewsData()

                    }
                    else{
                        $('#editModal').modal('hide')
                        toastr.error("Update Failed")
                        getReviewsData()

                    }

                }
                else{
                    $('#editModal').modal('hide')
                    toastr.error("Something went wrong!!")

                }


            })
            .catch(function (error) {
                $('#editModal').modal('hide')
                toastr.error("Something went wrong!!")

            })
    }


}

$('#addNewBtn').click(function () {

    $('#addModal').modal('show');

})

$('#reviewAddConfirmBtn').click(function () {

    let name=$('#NameAddId').val();
    let des=$('#DesAddId').val();
    let img=$('#ImgAddId').val();

    addNewReview(name,des,img);

})


function addNewReview(name,des,img) {

    if(name.length==0) {
        toastr.error("Name is empty");
    }
    else if(des.length==0){
        toastr.error("Description is empty")
    }
    else if(img.length==0){
        toastr.error("Image link is empty")

    }else{

        let url='/reviewAdd';
        let details={
            name:name,
            des:des,
            img:img
        }
        $('#reviewAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
        axios.post(url,details)
            .then(function (response) {

                if(response.status==200){
                    if(response.data==1){
                        $('#reviewAddConfirmBtn').html('Save');
                        $('#addModal').modal('hide')
                        toastr.success('Review insert success');
                        getReviewsData()

                    }
                    else{
                        $('#addModal').modal('hide')
                        toastr.error('Review insert failed!!');
                        getReviewsData()

                    }

                }
                else{
                    $('#addModal').modal('hide')
                    toastr.error('Something went wrong!!');

                }

            })
            .catch(function (error) {
                $('#addModal').modal('hide')
                toastr.error('Something went wrong!!');
            })

    }



}
