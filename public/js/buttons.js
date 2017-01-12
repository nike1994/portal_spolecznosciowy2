var pathArray = location.href.split( '/' );
var protocol = pathArray[0];
var host = pathArray[2];
var url = protocol + '//' + host;

$(document).on('click','a.comments',function () {
    var id = this.id;
    var parent = $(this).parent();
    var button = $(this);
    var u ="";
    if(pathArray[4]=="gallery"){
      u=url+"/index.php/gallery/comments";
    }else{
      u=url+"/index.php/home/comments";
    }
    $.ajax({
      type: "POST",
      url: u,
      dataType: 'json',
      data: {id, id}
    }).done(function(result) {
        result=Object.keys(result).map(function(k) { return result[k]; });
        var html = '<div class="comments">';
        if(result[0].text){
          for(var i=0; i<result.length; i++){
            html=html+'<div>'+
                          '<div className="photo" style="background-image: url(data:image/gif;base64,'+result[i].photo_author+'"></div>';

            if(result[i].nick_author == userName){
                html=html+  '<a className="author" href="'+url+'/index.php/home">'+result[i].nick_author+'  '+result[i].name_author+'</a>';
            }else{
                html=html+  '<a className="author" href="'+url+'/index.php/home/profile/'+result[i].nick_author+'">'+result[i].nick_author+'  '+result[i].name_author+'</a>';
            }

            html=html + '<p className="text">'+result[i].text+'</p>'+
                        '<p className="date">'+result[i].date+'</p>'+
                      '</div>';
          }

          html=html+'<a class="removecomments" id='+id+'>ukryj komentarze</a> <br/> <a class="addcomments '+id+'"> dodaj komentarz </a></div>';
        }else{
          html=html+'<a class="removecomments" id='+id+'>brak komentarzy ukryj okno</a> <br/> <a class="addcomments '+id+'"> dodaj komentarz </a> </div>';
        }

        parent.append(html);
        button.remove();
    });
});

$(document).on('click','a.removecomments',function(){
  var id =this.id;
  var parent = $(this).parent();
  var posts = parent.parent();
  parent.remove();
  posts.append('<a class="comments" id='+id+'> Pokarz komentarze </a>');
});

$(document).on('click','a.addcomments', function(){
  var html='<div class="addcommentsbackground">'+
                   '</div>'+
                   '<div class="addcomments ">'+
                    '<form action="" id="addcomments" method="post" >'+
                      '<p>Tekst:</p>'+
                    '</form>'+
                    '<textarea name="text" form="addcomments"></textarea>';
  if(pathArray[4]=="gallery"){
    html=html+'<div id="submitaddphotocomments"> dodaj komentarz </div>';
  }else{
    html=html+'<div id="submitaddpostcomments">dodaj komentarz</div>'
  }
    html=html+'</div>';
  $('body').append(html);
});

$(document).on('click','#submitaddpostcomments',function(){
  var text=document.getElementsByName('text')[0].value;
  var a_addcoments=document.getElementsByClassName('addcomments')[0];
  var classList = a_addcoments.className.split(/\s+/);
  id_post=classList[1];
  if(text!=""){
    $.ajax({
      type: "POST",
      url: url+"/index.php/post/addcomments",
      //dataType: 'json',
      data: {"text":text,"id_post":id_post}
    }).done(function(result) {
        alert("dodano");
        location.reload();
    })
    .fail(function(error){
      alert("error");
      //alert(error.responseText);
    });
  }else{
    alert("uzupełnij wszystkie pola");
  }
});

$(document).on('click','#submitaddphotocomments',function(){
  var text=document.getElementsByName('text')[0].value;
  var a_addcoments=document.getElementsByClassName('addcomments')[0];
  var classList = a_addcoments.className.split(/\s+/);
  var id_photo=classList[1];
  if(text!=""){
    $.ajax({
      type: "POST",
      url: url+"/index.php/photo/addcomments",
      data: {"text":text,"id_photo":id_photo}
    }).done(function(result) {
        alert("dodano");
        location.reload();
    })
    .fail(function(error){
      alert("error");
      //alert(error.responseText);
    });
  }else{
    alert("uzupełnij wszystkie pola")
  }
});

$(document).on('click','div.header>div.profile', function(){
  window.location.href = url+"/index.php/home";
});

$(document).on('click','div.buttons>a.favourite', function(){
  var nick =pathArray[6];
  $.ajax({
    type: "POST",
    url: url+"/index.php/favourite/liked",
    dataType: 'json',
    data: {"nick": nick}
  }).done(function(result) {
      alert(result.msg);
  })
  .fail(function(error){
    alert("error");
    alert(error.responseText);
  });
});

var click = false;
$(document).on('click', 'a#post', function(){
    $('body').append('<div class="addpostbackground">'+
                     '</div>'+
                     '<div class="addpost">'+
                      '<form action="" id="addpost" method="post" >'+
                        '<p>Tytuł:</p>'+
                        '<input type="text" name="title" />'+
                        '<p>Tekst:</p>'+
                      '</form>'+
                      '<textarea name="text" form="addpost"></textarea>'+
                      '<div id="submitaddpost">dodaj post</div>'+
                    '</div>');
});

$(document).on('click','#submitaddpost',function(){
  var text=document.getElementsByName('text')[0].value;
  var title=document.getElementsByName('title')[0].value;
  if(title!=""&&text!=""){
    $.ajax({
      type: "POST",
      url: url+"/index.php/post",
      dataType: 'json',
      data: {"text":text,"title": title}
    }).done(function(result) {
        alert(result.msg);
        location.reload();
    })
    .fail(function(error){
      alert("error");
    //  alert(error.responseText);
    });
  }else{
    alert("uzupełnij wszystkie pola")
  }
});

$(document).on('click','div.addpostbackground', function(){
  $(this).remove();
  $('div.addpost').remove();
});

$(document).on('click','div.addcommentsbackground', function(){
  $(this).remove();
  $('div.addcomments').remove();
});

$(document).on('click','div#photo', function(){
  $('body').append('<div class="addpostbackground">'+
                   '</div>'+
                   '<div class="addpost">'+
                    '<form action="" id="addpost" method="post" enctype="multipart/form-data">'+
                      '<p>Tytuł:</p>'+
                      '<input type="text" name="title" />'+
                      '<input type="file" name="photo" accept="image/*" multiple/>'+
                      '<p>Opis:</p>'+
                    '</form>'+
                    '<textarea name="text" form="addpost"></textarea>'+
                    '<div id="submitaddphoto">dodaj zdjęcie</div>'+
                  '</div>');
});


$(document).on('click',"#submitaddphoto", function(){
  var photo = document.getElementsByName("photo")[0];
  var filename_extension = photo.value.split( '.' );
  filename_extension=filename_extension[filename_extension.length-1];
  console.log(filename_extension);
  var form = document.forms[0];
  var message ="";
  var error = false;
  if(filename_extension!='jpg'&&filename_extension!='png'&&filename_extension!='gif'){
    message+="obraz musi mieć rozszerzenie jpg,png lub gif";
    error=true;
  }
  if(document.getElementsByName('title')[0].value==""){
    message+="musisz uzupełnić tytuł";
    error=true;
  }

  if(error){
    alert(message);
  }else{
    var data = new FormData();
        data.append('photo', photo.files[0]);
        data.append('text', document.getElementsByName('text')[0].value);
        data.append('title', document.getElementsByName('title')[0].value);

    $.ajax({
        url: url+'/index.php/photo/addphoto',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string reques
    }).done(function(result) {
        alert(result.msg);
        location.reload();
    })
    .fail(function(error){
      alert("error");
    //  alert(error.responseText);
    });
  }
});
