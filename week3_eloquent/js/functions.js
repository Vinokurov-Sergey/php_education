function saveUser(userId)
{
    $.post(
        '/UsersAdmin/saveUser',
        {
            id: userId,
            name: $('#user_name_' + userId).val(),
            email: $('#user_email_' + userId).val(),
            password: $('#user_password_' + userId).val(),
        },
        function (r)
        {
            console.log(r);
            if(r.error)
            {
                $('#response_' + userId).html(r.error);
            } else
            {
                $('#response_' + userId).html(r.result);
            }
        }
    );
}

function deleteUser(userId)
{
    $.post(
        '/UsersAdmin/deleteUser',
        {
            id: userId,
        },
        function (r)
        {
            console.log(r);
            if(r.error)
            {
                $('#response_' + userId).html(r.error);
            } else
            {
                $('#user_block_' + userId).remove();
            }
        }
    );
}

function addUser()
{
    $.post(
        '/UsersAdmin/addUser',
        {
            name: $('#user_name').val(),
            email: $('#user_email').val(),
            password: $('#user_password').val(),
        },
        function (r)
        {
            console.log(r);
            if(r.error)
            {
                $('#response').html(r.error);
            } else
            {
                $('#response').html(r.result);
                location.reload();
            }
        }
    );
}