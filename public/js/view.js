$(document).ready(function() {
    $("#user_table").DataTable();
    $(".view_button, .edit_button").click(function(){
        $( '#popup' ).hide();
        var id = $(this).val();
        edit_row(id);
    });

    $(".delete_button").click(function () {
        var id = $(this).val();
        $(".delete").click(function () {
            delete_row(id);
        });
    });
});

function edit_row(id){
    $.ajax ({
        type: 'post',
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
        url: 'getdata',
        data: {
            edit_row: 'edit_row',
            row_id: id
        },
        datatype : "json",
        success: function(data) {
            $.each(data, function() {
                $("#prefix").val(data['prefix']);
                $("#firstName").val(data['firstName']);
                $("#middleName").val(data['middleName']);
                $("#lastName").val(data['lastName']);
                $("#username").val(data['username']);
                $("#email").val(data['email']);
                $("#dob").val(data['dob']);
                $("#gender").val(data['gender']);
                $("#maritalStatus").val(data['marital']);
                $("#employer").val(data['employer']);
                $("#employment").val(data['employment']);
                $("#comm").val(data['communication']);
                $("#contactType").val(data['contactType']);
                $('#contact').val(data['contact']);
                $("#residentialZip").val(data['resZip']);
                $("#residentialCity").val(data['resCity']);
                $("#residentialState").val(data['resState']);
                $("#officeZip").val(data['ofcZip']);
                $("#officeCity").val(data['ofcCity']);
                $("#officeState").val(data['ofcState']);
                $("#gitName").val([data['gitName']]);
                $("#hidden").val([data['PK_ID']]);
            })

        }
    });
}
function update_row(user_id){
    //Retrieve the checkbox field and convert into an array
    var communicationType = $('input[name="tags[]"]').map(function(){
        return $(this).val();
    }).get();
    communicationType = communicationType.toString();

    var contactType = $('input[name="value[]"]').map(function(){
        return $(this).val();
    }).get();
    contactType = contactType.toString();

    $.ajax ({
        type: 'post',
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
        url: 'update',
        datatype: "json",
        data: {
            update_data: 'update',
            row_id: user_id,
            prefix: $("#prefix").val(),
            firstName: $("#firstName").val(),
            middleName: $("#middleName").val(),
            lastName: $("#lastName").val(),
            username: $("#username").val(),
            email: $("#email").val(),
            dob: $("#dob").val(),
            gender: $("#gender").val(),
            maritalStatus: $("#maritalStatus").val(),
            employer: $("#employer").val(),
            employment: $("#employment").val(),
            communication: communicationType,
            contactType: contactType,
            contact: $('#contact').val(),
            residentialZip: $("#residentialZip").val(),
            residentialCity: $("#residentialCity").val(),
            residentialState: $("#residentialState").val(),
            officeZip: $("#officeZip").val(),
            officeCity: $("#officeCity").val(),
            officeState: $("#officeState").val(),
            githubUserName: $("#gitName").val()
        },
        success: function () {
        },

        error: function(response) {
            var message = jQuery.parseJSON(response.responseText);

            //Displaying the error in the form
            $(".prefix").val(message.prefix);
            $(".firstName").html(message.firstName);
            $(".middleName").html(message.middleName);
            $(".lastName").html(message.lastName);
            $(".userName").html(message.username);
            $(".gitname").html(message.githubUserName);
            $(".dob").html(message.dob).show();
            $(".gender").html(message.gender);
            $(".maritalStatus").html(message.maritalStatus);
            $(".employer").html(message.employer);
            $(".employment").html(message.employment);
            $(".contact").html(message.contact);
            $(".residentialZip").html(message.residentialZip);
            $(".residentialCity").html(message.residentialCity);
            $(".residentialState").html(message.residentialState);
            $(".officeState").html(message.officeState);
            $(".officeCity").html(message.officeCity);
            $(".officeZip").html( message.officeZip);
        }
    });
}

function delete_row(id){
    $.ajax ({
        type:'post',
        headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
        url:'delete',
        data:{
            delete_row:'delete',
            row_id:id
        },
        success:function(id) {
            $('#'+id).remove();
        }
    })
}