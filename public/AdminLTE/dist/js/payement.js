
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
            url:'/checked/niveau/'+ id,
            dataType:'json',
            type:'get',

        }).done(function(reponse){

            $html = '<option value="1">1 Génération</option>'+
            '<option value="2">2 Génération</option>'+
            '<option value="3">3 Génération</option>'+
            '<option value="4">4 Génération</option>'+
            '<option value="5">5 Génération</option>'+
            '<option value="6">6 Génération</option>'+
            '<option value="7">7 Génération</option>'+
            '<option value="8">8 Génération</option>';


            $html1=
            '<option value="2">2 Génération</option>'+
            '<option value="3">3 Génération</option>'+
            '<option value="4">4 Génération</option>'+
            '<option value="5">5 Génération</option>'+
            '<option value="6">6 Génération</option>'+
            '<option value="7">7 Génération</option>'+
            '<option value="8">8 Génération</option>';


            $html2=

            '<option value="3">3 Génération</option>'+
            '<option value="4">4 Génération</option>'+
            '<option value="5">5 Génération</option>'+
            '<option value="6">6 Génération</option>'+
            '<option value="7">7 Génération</option>'+
            '<option value="8">8 Génération</option>';

            $html3=

            '<option value="4">4 Génération</option>'+
            '<option value="5">5 Génération</option>'+
            '<option value="6">6 Génération</option>'+
            '<option value="7">7 Génération</option>'+
            '<option value="8">8 Génération</option>';


            $html4=
            '<option value="5">5 Génération</option>'+
            '<option value="6">6 Génération</option>'+
            '<option value="7">7 Génération</option>'+
            '<option value="8">8 Génération</option>';

            $html5=
            '<option value="6">6 Génération</option>'+
            '<option value="7">7 Génération</option>'+
            '<option value="8">8 Génération</option>';

            $html6=
            '<option value="7">7 Génération</option>'+
            '<option value="8">8 Génération</option>';

            $html7=
            '<option value="8">8 Génération</option>';

            $html8=
            '<option value="8">Abonners a deja récu tout les payements</option>';


              switch (reponse.niveau) {
                  case '1':
            $('#niveau').html($html1);

                      break;
                      case '2':

                        $("#ajouter").attr('hidden',false);

                        $('#niveau').html($html2);

                        break
                        case '3':
                            $('#niveau').html($html3);
                            $("#ajouter").attr('hidden',false);

                            break
                            case '4':
                                $('#niveau').html($html4);
                                $("#ajouter").attr('hidden',false);

                                break
                                case '5':
                                    $('#niveau').html($html5);
                                    $("#ajouter").attr('hidden',false);

                                    break
                                    case '6':
                                        $('#niveau').html($html6);
                                        $("#ajouter").attr('hidden',false);

                                        break
                                        case '7':
                                            $('#niveau').html($html7);
                                        $("#ajouter").attr('hidden',false);

                                            break
                                            case '8':
                                                $("#ajouter").attr('hidden',true);
                                                $('#niveau').html($html8);
                                                break


                                    break
                                    case undefined:
                                        $("#ajouter").attr('hidden',false);

                                        $('#niveau').html($html);
                                        break;

                  default:

                      break;
              }

        }).fail(function(xhr){
            console.log(xhr);
        })

    })
 }
