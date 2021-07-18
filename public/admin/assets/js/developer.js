$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function getPageLengthDatatable(){
    return [[10, 25, 50, -1], [10, 25, 50, "All"]];
}

function deleteValueSet(id) {
    $("#id").val(id);
}

function viewValueSet(id) {
    logo_1 = $('#channel_logo_1').val();
    logo_2 = $('#channel_logo_2').val();
    logo_3 = $('#channel_logo_3').val();

    $.ajax({
        url: baseUrl + '/admin/channel_master/channel_view_modal/' + id,
        type: "GET",
        dataType: 'json',
        data: {
            "_token": "{{ csrf_token() }}"
        },
        success: function (data) {
            console.log(data);
            $('#show_id').val(data.id);
            $('#show_channel_name').val(data.channel_name);
            $('#show_channel_desccription').val(data.channel_description);
            $('#show_region').val(data.region);
            $('#show_channel_catchup').val(data.channel_catchup);
            $('#show_channel_trp').val(data.channel_trp);
            $('#show_channel_status').val(data.status);            
            $('#show_company_id').val(data.company.company_name);
            $('#show_channel_channel_genre_id').val(data.chanelgenre.genre_name);
            $('#show_languages_id').val(data.languages.languages_name);
            $('#show_channel_logo1').attr('src',logo_1+data.channel_logo_1);
            $('#show_channel_logo2').attr('src',logo_2+data.channel_logo_2);
            $('#show_channel_logo3').attr('src',logo_3+data.channel_logo_3);
        }
    });
}

// $(".viewrecord").on("change", function () {
//     var id = $("#view_id").val();
//     alert(id);
//     $('#exampleModalView').modal('hide');

//     $.ajax({
//         url: baseUrl + '/admin/channel_master/channel_view_modal/' + id,
//         type: "GET",
//         dataType: 'json',
//         data: {
//             "_token": "{{ csrf_token() }}"
//         },
//         success: function (data) {
//         }
//     });
// });

function editValueSet(id) {
    $("#edit_id").val(id);
}

function deleteInviteValueSet(id) {
    $("#invite_id").val(id);
}

function resendEmailInviteValueSet(id) {
    $("#resend_invite_id").val(id);
}



function ajaxfunc(url,data,type,callback)
{
    
    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(data) 
        {
            //NProgress.done();
            callback(data)
        },
        error: function (xhr, status, error,data) 
        {
            //NProgress.done();
            errorHandle(xhr.status,xhr)
            //errorHandle(xhr.responseJSON.status,xhr)
        }
    });
}
