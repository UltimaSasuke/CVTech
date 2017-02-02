/**
 * Created by Diego on 06/01/2017.
 */

(function(){var c;c=jQuery;c.bootstrapGrowl=function(f,a){var b,e,d;a=c.extend({},c.bootstrapGrowl.default_options,a);b=c("<div>");b.attr("class","bootstrap-growl alert");a.type&&b.addClass("alert-"+a.type);a.allow_dismiss&&(b.addClass("alert-dismissible"),b.append('<button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'));b.append(f);a.top_offset&&(a.offset={from:"top",amount:a.top_offset});d=a.offset.amount;c(".bootstrap-growl").each(function(){return d= Math.max(d,parseInt(c(this).css(a.offset.from))+c(this).outerHeight()+a.stackup_spacing)});e={position:"body"===a.ele?"fixed":"absolute",margin:0,"z-index":"9999",display:"none"};e[a.offset.from]=d+"px";b.css(e);"auto"!==a.width&&b.css("width",a.width+"px");c(a.ele).append(b);switch(a.align){case "center":b.css({left:"50%","margin-left":"-"+b.outerWidth()/2+"px"});break;case "left":b.css("left","20px");break;default:b.css("right","20px")}b.fadeIn();0<a.delay&&b.delay(a.delay).fadeOut(function(){return c(this).alert("close")}); return b};c.bootstrapGrowl.default_options={ele:"body",type:"info",offset:{from:"top",amount:20},align:"right",width:250,delay:4E3,allow_dismiss:!0,stackup_spacing:10}}).call(this);

function notif(message, zone) {

    $.bootstrapGrowl(message, {

            type: 'success',
            align: zone,
            width: 'auto',
            allow_dismiss: false

    });



}



function messageCompteOk() {


    $.bootstrapGrowl("Votre compte a été créer avec succes. Avant de vous connecter veuillez attendre qu'un Administrateur valide votre compte.", {
        type: 'success',
        align: 'center',
        width: 'auto',
        allow_dismiss: false
    });

}

function messageCompteKo(type) {

    switch(type) {
        case "password":
            v = "Les mots de passe ne correspondent pas !";
            break;
        case "password_size":
            v = "Le mot de passe est trop court ou trop long ! Entre 8 et 20 caractères.";
            break;
        case "nom_size":
            v = "Le nom est trop court ou trop long ! Entre 2 et 12 caractères.";
            break;
        case "prenom_size":
            v = "Le prenom est trop court ou trop long ! Entre 2 et 12 caractères.";
            break;
        case "email_size":
            v = "L'adresse mail n'est pas valide !";
            break;
        case "email_already_exist":
            v = "Cette email est déjà associé à une compte !";
            break;
    }


    $.bootstrapGrowl(v, {
        type: 'danger',
        align: 'center',
        width: 'auto',
        allow_dismiss: false
    });

}

function refreshDivPage(div, page) {

    $(div).load(location.href +"?page=" + page  + " " + div);

}

function refreshNoMessage(div, url) {

    $.ajax({
        url: url,
        async:true

    })
        .done(function(data) {
            if(data=='ok'){

                $(div).load(location.href + " " + div);

            }else{
// show errors.
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

}

function refreshGlobal(div, url, message, type) {


    $.ajax({
        url: url,
        async:true

    })
        .done(function(data) {
            if(data=='ok'){

                $.bootstrapGrowl(message, {
                    type: type,
                    align: 'center',
                    width: 'auto',
                    allow_dismiss: false
                });
                $(div).load(location.href + " " + div);

            }else{
// show errors.
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });


}


function refresh(id, nom){

    url = 'validermembre.php?id=' +id;
    div = '#relo';
    message = "Le compte de " + nom + " vient d'être validé.";
    type = 'success';

    refreshGlobal(div, url, message, type);

}

