/**
 * Created by mindfire on 24/3/17.
 */
$(document).ready(function() {
    $(".gitButton").click(function () {
        var id = $(this).val();
        $.ajax({
            type : 'POST',
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
            url : "gitInfo",
            data :{
                status : 'ready',
                empId : id
            },
            success :function(data) {
                var  user = data;
                var html = "";
                var gitObj = $('#gitdetails');
                gitObj.html('<img src="img/download.png"; alt="Loading..." style="width:100px;height:100px;">');
                $.ajax({
                    url: "https://api.github.com/users/"+ user,
                    dataType: "json",
                    success: function (returndata) {
                        gitObj.html("");
                        var date = new Date(returndata.updated_at);
                        date.toDateString();
                        var month = date.getMonth() + 1;
                        var day = date.getDate();
                        var year = date.getFullYear();
                        var time = month + "/" + day + "/" + year;
                        html += "<h4><p>User Name: " + returndata.login + "</p></h4>";
                        html += "<h4><p>Id: " + returndata.id + "</p></h4>";
                        html += "<h4><p>Repos: " + returndata.public_repos + "</p></h4>";
                        html += "<h4><p>Followers: " + returndata.followers + "</p></h4>";
                        html += "<h4><p>Followings: " + returndata.following + "</p></h4>";
                        html += "<p>Last updated: " + time + "</p>";
                        gitObj.append(html);
                        $('#my_image').attr('src',"https://avatars.githubusercontent.com/u/23655160?v=3");
                    }
                });
                return false;
            }
        });

    }); // close repo click handler

});
