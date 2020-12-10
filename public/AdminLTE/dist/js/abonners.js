
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'APP_KEY':'',

    }
});
function chekedPayementAbonner(){


}


cheked();

 function cheked(){

    $("#parain").change(function name(params) {

        var id =  $("#parain").val();
        $.ajax({
            url:'/checked/limite/abonners/'+ id,
            dataType:'json',
            type:'get',

        }).done(function(reponse){

            if (reponse ==3) {

                $('#message').html('<h5 class="text-danger">Parain a atteint déja son seuil</h5>').show();
                $("#valider").attr("hidden",true);

            } else {
                $('#message').html('').show();
                $("#valider").attr("hidden",false);

            }
        }).fail(function(xhr){
            console.log(xhr);
        })

    })
 }


$('#submit-data').submit(function name(params) {


    var fields  = ['nom','prenom','sex','tel','adresse','date_naissance','profession','password','password-confirm'];
    fields.forEach(field => {
        if ($('#'+field).val().trim().length === 0 ) {

            alert('okk');
            var message = $('#'+field).attr('data-label');
            $('#messages').html('<h4 style="text-transform:capitalize" class="alert alert-danger">'+message+'</h4>').show().fadeOut(2000);
            $('#'+field).focus(true);
            e.preventDefault();
            return true;
        }else if($('#password').val() != $('#password-confirm').val()){

            $('#messages').html('<h4 style="text-transform:capitalize" class="alert alert-danger"> Mot de passe non identiques</h4>').show().fadeOut(2000);

            return true;

        }

        else{

            return false;

        }
    })

});
