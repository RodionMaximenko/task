
// ------------------------------------------------------------------------------------------
// Insert value (id) name="parent_comment" Into Input[type="hidden"] <-- "#parrent_comment"
// ------------------------------------------------------------------------------------------
function writeSubComment(id,name,lname) {
    $("#answer").html('Ответить : ' + name + ' ' + lname + ' <a onclick="breakWriteSubComment()">Отменить</a>');
    $("#parrent_comment").val(id);
}

// ------------------------------------------------------------------------------------------
// Insert value (NULL) name="parent_comment" Into Input[type="hidden"] <-- "#parrent_comment"
// ------------------------------------------------------------------------------------------
function breakWriteSubComment() {
    $("#answer").html('');
    $("#parrent_comment").val('NULL');
}

// ------------------------------------------------------------------------------------------
// Exit button (Clear Cookies and Redirect To Start)
// ------------------------------------------------------------------------------------------
function exit() {
    document.cookie.split(";").forEach(function(c) {
        document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); }
        );

    window.location = "/";
}