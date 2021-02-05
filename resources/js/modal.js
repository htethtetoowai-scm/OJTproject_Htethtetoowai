 // display a modal (show modal)
 $(document).on('click', '#show', function(event) {
    document.getElementById("show_id").value = $(this).attr('data-id');
    document.getElementById("show_title").value = $(this).attr('data-title');
    document.getElementById("show_description").value = $(this).attr('data-description');
    if($(this).attr('show_data-status')=='1')
    {
        document.getElementById("show_status").value ="Active";
    }
    else{
        document.getElementById("show_status").value ="OffLine";
    }
    document.getElementById("show_create_user").value = $(this).attr('data-create_user');
    document.getElementById("show_created_at").value = $(this).attr('data-created_at');
    document.getElementById("show_updated_user").value = $(this).attr('data-updated_user');
    document.getElementById("show_updated_at").value = $(this).attr('data-updated_at');
    $('#showModal').modal("show");
});   
   // display a modal (show modal)
   $(document).on('click', '#del', function(event) {
    document.getElementById("id").value = $(this).attr('data-id');
    document.getElementById("title").value = $(this).attr('data-title');
    document.getElementById("description").value = $(this).attr('data-description');
    if($(this).attr('data-status')=='1')
    {
        document.getElementById("status").value ="Active";
    }
    else{
        document.getElementById("status").value ="OffLine";
    }
    document.getElementById("create_user").value = $(this).attr('data-create_user');
   
    $('#delModal').modal("show");
});   
 // display a modal (delete user modal)
 $(document).on('click', '#delUser', function(event) {
    document.getElementById("id").value = $(this).attr('data-id');
    document.getElementById("name").value = $(this).attr('data-name');
    document.getElementById("email").value = $(this).attr('data-email');
    if($(this).attr('data-type')=='0')
    {
        document.getElementById("type").value ="Admin";
    }
    else{
        document.getElementById("type").value ="User";
    }
    document.getElementById("phone").value = $(this).attr('data-phone');
    document.getElementById("dob").value = $(this).attr('data-dob');
    document.getElementById("create_user").value = $(this).attr('data-create_user');
    document.getElementById("address").value = $(this).attr('data-address');
    $('#delModal').modal("show");
});   

