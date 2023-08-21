

$(document).ready( function () {
    $('#makeTable').DataTable({
        "lengthChange": false
    });
});


const edit_make = (make_id, make) => {
    const modal = document.getElementById('edit_make');
    modal.classList.remove('hidden'); // Show the modal
    $("#make_id").val(make_id);
    $("#make").val(make);               
    $('#update_make').off('click').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url:"../entities/action.php?btn_action=edit_manufacturer",
            type: "POST",
            data:$('#editMake').serialize(),
            dataType: 'json',
            success:function(data){
                location.reload();
            }
        });
    });
}

const hideModal = () => {
    const modal = document.getElementById('edit_make');
    modal.classList.add('hidden');
}


const delete_make = (make_id , make ) => {
    console.log(make_id);
    var proceed = confirm(`Are you sure you want to delete ${make}?`);
    if (proceed) {
        $.ajax({
            url: "../entities/action.php",
            type: "POST",
            cache: false,
            data:{
                btn_action: "delete_manufacturer",
                id: make_id,
            },
            success:function(data){   
                window.location.href = "manufacturer.php";
            }  
        });
    }
}