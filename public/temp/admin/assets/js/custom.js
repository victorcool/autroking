function start_loader(){
    $.preloader.start({
        modal: true,
        src : 'sprites.png'
    });
  }
  
  function page_reload(){
      location.reload();
  }

  function imageBox() {
    for (let index = 1; index <= 4; index++){
      '<div class="wrap-custom-file col-md-3 col-xs-6"><input type="file" name="images[]" id="images'+index+'"/><label  for="images'+index+'"><span>Image '+index+'</span><i class="icon-plus"></i></label></div>'; 
    }
  }
  
  function stop_loader(){
    $.preloader.stop();
  }
    
    function loaderWithOutcheck(load_url,to_fill,checkdata)
    {
         $(to_fill).html('Loading..');
        setInterval(function(){       
            $.ajax({
            url:load_url,
            type:'POST',
            data:{checkdata: checkdata},
            success:function(result)
            {            
              $(to_fill).html(result);               
            }
        });
        },1000);
        
    }
    
    function show_info_notification(status,message){
      switch (status) {
          case 'success':
              toastr.success(message);
              break;
          case 'info':
              toastr.info(message);
              break;
          case 'warning':
              toastr.warning(message);
              break;    
          default:
              toastr.error(message);
              break;
      }
    }
    
    function show_notification(title,body,status){
        var mkConfig = {
        positionY: 'top',
        positionX: 'right',
        max: 5,
        scrollable: true
        };
        mkNotifications(mkConfig);
    
        mkNoti(
            title,
            body,
            {
                status:status,
                duration: 3000
            }
        );
    }
    
    function loaderWithOutcheck_No_setInterval(load_url,to_fill,checkdata,any_id=null)
    {   $(to_fill).html('Loading..');
        $.ajax({
        url:load_url,
        type:'get',
        data:{checkdata:checkdata,any_id:any_id},
        success:function(result)
        {            
          $(to_fill).html(result);               
        }
      });    
    }
    
    
    function loaderwithcheck(load_url,to_fill,checkdata)
    {
        $(to_fill).html('0');
        setInterval(function(){      
            $.ajax({
            url:load_url,
            type:'get',
            data:{checkdata: checkdata},
            success:function(result)
            {          
              $(to_fill).html(result);           
            }
        });
        
        },1000);    
    }
    
    function page_reload(){
      window.location.reload();
    }
    
    function redirect_page($url){
      window.location.href=$url;
    }
    
    function showAlert(type, message) {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
    
      Toast.fire({
        type: type,
        title: message
      });
    };
  
    function showAlert_popup(hint,type, message) {
      Swal.fire(hint,message,type,{
          position: 'top-end'
      })
  };
    
    
      /*reset Form*/
      
      function reset_form(form_target)
      {
        $(form_target).trigger('reset');
      }
    
    
    //   --------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx----------------------------------------------------
    //   --------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx----------------------------------------------------
    //-----------------------STARTING OF DOM------------------------------------------------------------------
    //   --------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx----------------------------------------------------
    
    $(document).ready(function(){
    
    var $admin_route = '/isonlyadmin/';
    var $ajax__access__tag = '/ajax/';
    var $ajax__load__tag = ''+$ajax__access__tag+'load/ajax_AccountSummary';
    var $document = $(document);
    
    if ('servicWorker' in navigator) {
      navigator.serviceWorker.register('../sw.js')
        .then((reg) => console.log('Service worker registered', reg))
        .catch((err) => console.log('Service Worker not registered', err))
    }
    
    var $email_exist = 'User with email already exist';
    var $added_successuly = 'Added Successfuly';
    
    $status = false;
    
       function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
        }
    
    function PasswordMatchChecker(btnElem)
    {
      $(document).on("keyup","#Confirm_password", function(e){
        e.preventDefault();
        var $this = $(this).val();
        var $password = $("#Password").val();
        if ($this !== $password) {
          $(btnElem).fadeOut('slow');
          show_notification('Ooops','Password Does Not Match','danger')
          // field_required_prompter('.required_elem',4000,'#passwordBtn');
        }else{
          show_notification('Good!','Password matched','success')
          $(btnElem).fadeIn('slow');
        }
      });  
    }
    function ClearPasswordConfirm()
    {
      $(document).on("keyup","#Password", function(e){
        e.preventDefault();
        var $this = $(this).val();
        var $cpassword = $("#Confirm_password").val("");
      });  
    }
    ClearPasswordConfirm();
    PasswordMatchChecker("#passwordBtn")
    
    // checkPasswordChecker(6,"#passwordBtn");
    
    function field_required_prompter(key,timeout,btnElem)
    {
    
        var dataValid = true;
    
        $(key).each(function()
        {
            var cur = $(this);
            if ($.trim(cur.val()) == '')
            { 
                cur.css('background','red');
                
                setTimeout(function() {
                    cur.css('background','');
                }, timeout); 
            
                dataValid = false;
            }
        });
    
        if(dataValid)
        {
            return true
        }
        else
        {
            $(btnElem).attr('disabled','disabled');
            return false;
        }
    }
    
      /*form input library  ----  checker*/
      function formChecker(btnElem,inputElem)
      {
        $(btnElem).attr('disabled','disabled');
    
         $(document).on("keyup",inputElem,function(){
          var dataValid = true;
    
          $(inputElem).each(function()
          {
              var cur = $(this);
               if ($.trim(cur.val()) == '')
               { 
                          
               dataValid = false;
               }
            });
    
          if(dataValid)
           {
            
             $(btnElem).removeAttr('disabled');
    
           }
           else
           {
              $(btnElem).attr('disabled','disabled');
           }
         })
           
      }
    
    
      /*email validation*/
      function emailValidation(emailInput,timeout)
      {
        if(validateEmail($(emailInput).val()))
        {
            return true;
        }
        else
        {
          var emailer = $(emailInput);
          emailer.css('border-color','red');        
          setTimeout(function() {
            emailer.css('border-color','');
          }, timeout);
          return false;
        }
      }
    
    
     
    
     ////////////////////////////////////////////////////////////
    /////////----------- CHECK REQUIRED INPUTS-----------///////
    ///////////////////////////////////////////////////////////
    formChecker("#emailPassResetBtn",'.required_elem')
    formChecker("#updateCategoryBtn",'.required_elem')
    formChecker("#productBtn",'.required_elem')
    formChecker("#categoryBtn",'.required_elem');
    formChecker("#ResetPasswordBtn",'.required_elem')
    formChecker("#loginBtn",'.required_elem')
    formChecker("#registerBtn",'.required_elem')
    formChecker('#passwordBtn','.required_elem');
      formChecker('.generalBtn','.required_elem');
    
    
    
    
      ////////////////////////////////////////////////////////////
    /////////----LOADER INITIATOR FOR ACTION BUTTONS------///////
    ///////////////////////////////////////////////////////////
    
        function FormLoaderIni(elem_target,status)
        {
           var elem_target = $(elem_target)
           if(status===true)
           {
               $('input,button,select').attr('disabled','disabled');
               elem_target.find('.__f_text').hide();
               elem_target.find('.__f_loader').html('Wait pls <svg version="1.1" class="svg-loader" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 80" xml:space="preserve"><path id="spinner" fill="#D43B11" d="M40,72C22.4,72,8,57.6,8,40C8,22.4, 22.4,8,40,8c17.6,0,32,14.4,32,32c0,1.1-0.9,2-2,2 s-2-0.9-2-2c0-15.4-12.6-28-28-28S12,24.6,12,40s12.6, 28,28,28c1.1,0,2,0.9,2,2S41.1,72,40,72z" ><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 40 40" to="360 40 40" dur="0.6s" repeatCount="indefinite" /> </path> </svg>').show();
           }
           else
           {
            $('input,button,select').removeAttr('disabled');
             elem_target.find('.__f_text').show();
               elem_target.find('.__f_loader').empty().hide();
           }
        }
    
      /*function to validate*/
    
        $document.on("submit","#login-form",function(k){
        k.preventDefault();
          //validate email field      
          var $continue = true;
          if(emailValidation('#Email',4000)===false)
          {
            show_info_notification('danger', 'Email is invalid');
            $continue = false;
          }
          /*proceed to submission if continue is true*/
          if($continue===true)
          {	
            this.submit();
            start_loader();
          }
      });
    
        $document.on("submit","#register-form",function(k){
        k.preventDefault();
          //validate email field      
          var $continue = true;
                if(emailValidation('#Email',4000)===false)
                {
            show_notification('Ooop', 'Enter a valid email','danger')
                  $continue = false;
                }
                /*proceed to submission if continue is true*/
                if($continue===true)
                {	
            this.submit();
            FormLoaderIni('#registerBtn',true);
                }
      });
    
      // for emailing of password reset form 
        $document.on("submit","#emailPasswordReset-form",function(k){
        k.preventDefault();
          //validate email field      
          var $continue = true;
                if(emailValidation('#Email',4000)===false)
                {
            show_notification('Ooop', 'Enter a valid email','danger')
                  $continue = false;
                }
                /*proceed to submission if continue is true*/
                if($continue===true)
                {	
            this.submit();
            FormLoaderIni('#emailPassResetBtn',true);
                }
      });
    
      // for resetting of emailed password form 
        $document.on("submit","#resetPassword-form",function(k){
        k.preventDefault();
          //validate email field      
            this.submit();
            FormLoaderIni('#ResetPasswordBtn',true);
      });
    
    
      // for bank to wallet transfer 
        $document.on("submit","#teller-form",function(k){
        k.preventDefault();
          //validate email field      
            this.submit();
            FormLoaderIni('#bankTellerBtn',true);
      });
    
    
     /////////////////////////////////////////////////////////////
      ////////--  for creating of category ------------------//////
      ///////////////////////////////////////////////////////////
      $("#category-form").on("submit",function(k){
          k.preventDefault();
          var thisForm = this;
          var self = this;
          $.ajax({
          url:''+$admin_route+'category/store',
          type:'POST',
          data:new FormData(thisForm),
          cache:false,
          contentType:false,
          processData:false,  
          beforeSend(){
            FormLoaderIni('#categoryBtn',true);
          }, 
          success:function (response) {
              console.log(response);
              FormLoaderIni('#categoryBtn',false);
                 
              if (response.status == 200) {
                  showAlert_popup('Successful!','success',response.message); 
              }else{
                  showAlert_popup('Oh sorry','error',response.message);
              }
                  
              },error:function(response){
                console.log(response);
                stop_loader();
                FormLoaderIni('#categoryBtn',false);
                showAlert_popup('Oh sorry','error','Something went wrong');
              }
          
          });
        });	
  
     /////////////////////////////////////////////////////////////
      ////////--  for creating of subcategory ------------------//////
      ///////////////////////////////////////////////////////////
      $("#subcategory-form").on("submit",function(k){
        k.preventDefault();
        var thisForm = this;
        var self = this;
        $.ajax({
        url:''+$admin_route+'subcategory/store',
        type:'POST',
        data:new FormData(thisForm),
        cache:false,
        contentType:false,
        processData:false,  
        beforeSend(){
          FormLoaderIni('#subcategoryBtn',true);
        }, 
        success:function (response) {
            console.log(response);
            FormLoaderIni('#subcategoryBtn',false);
               
            if (response.status == 200) {
                showAlert_popup('Successful!','success',response.message); 
            }else{
                showAlert_popup('Oh sorry','error',response.message);
            }
                
            },error:function(response){
              console.log(response);
              stop_loader();
              FormLoaderIni('#subcategoryBtn',false);
              showAlert_popup('Oh sorry','error','Something went wrong');
            }        
        });
      });	
     /////////////////////////////////////////////////////////////
      ////////--  for creating of room ------------------//////
      ///////////////////////////////////////////////////////////
      $("#product-form").on("submit",function(k){
          k.preventDefault();
          var thisForm = this;
          var self = this;
          $.ajax({
          url:""+$admin_route+"product/store",
          type:'POST',
          data:new FormData(thisForm),
          cache:false,
          contentType:false,
          processData:false,  
          beforeSend(){
            FormLoaderIni('#productBtn',true);
          }, 
          success:function (response) {
              console.log(response);
              FormLoaderIni('#productBtn',false);
                 
              if (response.status == 200) {
                  showAlert_popup('Successful!','success',response.message); 
                  // page_reload();
              }else{
                  showAlert_popup('Oh sorry','error',response.message);
              }
                  
              },error:function(response){
                console.log(response);
                stop_loader();
                FormLoaderIni('#productBtn',false);
                showAlert_popup('Oh sorry','error','Something went wrong');
              }
          
          });
        });	
   /////////////////////////////////////////////////////////////
      ////////--  for updating of category ------------------//////
      ///////////////////////////////////////////////////////////
      $("#edit-category-form").on("submit",function(k){
        k.preventDefault();
        var thisForm = this;
        var self = this;
        $.ajax({
        url:""+$admin_route+"category/update",
        type:'POST',
        data:new FormData(thisForm),
        cache:false,
        contentType:false,
        processData:false,  
        beforeSend(){
          FormLoaderIni('#updateCategoryBtn',true);
        }, 
        success:function (response) {
            console.log(response);
            FormLoaderIni('#updateCategoryBtn',false);
               
            if (response.status == 200) {
                showAlert_popup('Successful!','success',response.message); 
                page_reload();
            }else{
                showAlert_popup('Oh sorry','error',response.message);
            }
                
            },error:function(response){
              console.log(response);
              stop_loader();
              FormLoaderIni('#updateCategoryBtn',false);
              showAlert_popup('Oh sorry','error','Something went wrong');
            }
        
        });
      });	
   /////////////////////////////////////////////////////////////
      ////////--  for updating of sub category ------------------//////
      ///////////////////////////////////////////////////////////
      $("#edit-subcategory-form").on("submit",function(k){
        k.preventDefault();
        var thisForm = this;
        var self = this;
        $.ajax({
        url:""+$admin_route+"subcategory/update",
        type:'POST',
        data:new FormData(thisForm),
        cache:false,
        contentType:false,
        processData:false,  
        beforeSend(){
          FormLoaderIni('#updateCategoryBtn',true);
        }, 
        success:function (response) {
            console.log(response);
            FormLoaderIni('#updateCategoryBtn',false);
               
            if (response.status == 200) {
                showAlert_popup('Successful!','success',response.message); 
                page_reload();
            }else{
                showAlert_popup('Oh sorry','error',response.message);
            }
                
            },error:function(response){
              console.log(response);
              stop_loader();
              FormLoaderIni('#updateCategoryBtn',false);
              showAlert_popup('Oh sorry','error','Something went wrong');
            }        
        });
      });
   /////////////////////////////////////////////////////////////
      ////////--  for updating of Product ------------------//////
      ///////////////////////////////////////////////////////////
      $("#edit-product-form").on("submit",function(k){
        k.preventDefault();
        var thisForm = this;
        var self = this;
        $.ajax({
        url:""+$admin_route+"product/update",
        type:'POST',
        data:new FormData(thisForm),
        cache:false,
        contentType:false,
        processData:false,  
        beforeSend(){
          FormLoaderIni('#updateProductBtn',true);
        }, 
        success:function (response) {
            console.log(response);
            FormLoaderIni('#updateProductBtn',false);
               
            if (response.status == 200) {
                showAlert_popup('Successful!','success',response.message); 
                page_reload();
            }else{
                showAlert_popup('Oh sorry','error',response.message);
            }
                
            },error:function(response){
              console.log(response);
              stop_loader();
              FormLoaderIni('#updateProductBtn',false);
              showAlert_popup('Oh sorry','error','Something went wrong');
            }        
        });
      });
    /////////////////////////////////////////////////////////////
      ////////--  Password Reset ------------------//////
      ///////////////////////////////////////////////////////////
      $document.on("submit","#personal-details-form",function(k){
        k.preventDefault();
        var thisForm = this;  
        if( emailValidation('#Email',200)){ 
          $.confirm({
            title: ' ',
            buttons: {
                close: function () {
                    //close
                },
            },
            content: function () {
                var self = this;
                return $.ajax({
                  url:""+$myaccount__access__tag+"user/profile/update",
                  type:'POST',
                  data:new FormData(thisForm),
                  cache:false,
                  contentType:false,
                  processData:false,
                  beforeSend(){
                    FormLoaderIni('#UpdateProfileBtn',true);
                  }   
                }).done(function (response) {
                  console.log(response);
                  switch (response.status) {
                      case 200:
                        self.setContent( response.message );
                      break;
                  
                    default:
                      self.setContent( response.message );
                      break;
                  }
                    
                    FormLoaderIni('#UpdateProfileBtn',false);
                }).fail(function(){
                    self.setContent('Something went wrong.');
                    FormLoaderIni('#passwordBtn',false);
                });
            }
          });
        }else{
          show_notification('Ooops',"Please enter a valid Email","danger");
        }
      });
    
  
     
    /////////////////////////////////////////////////////////////
      ////////--  for creating of room type ------------------//////
      ///////////////////////////////////////////////////////////
      $("#roomtype-form").on("submit",function(k){
        k.preventDefault();
        var thisForm = this;
        var self = this;
        $.ajax({
        url:"/roomtype/store",
        type:'POST',
        data:new FormData(thisForm),
        cache:false,
        contentType:false,
        processData:false,  
        beforeSend(){
          FormLoaderIni('#categoryBtn',true);
        }, 
        success:function (response) {
            console.log(response);
            FormLoaderIni('#categoryBtn',false);
               
            if (response.status == 200) {
                showAlert_popup('Successful!','success',response.message); 
            }else{
                showAlert_popup('Oh sorry','error',response.message);
            }
                
            },error:function(response){
              console.log(response);
              stop_loader();
              FormLoaderIni('#categoryBtn',false);
              showAlert_popup('Oh sorry','error','Something went wrong');
            }
        
        });
      });	

    /////////////////////////////////////////////////////////////
      ////////--  for creating of pricing ------------------//////
      ///////////////////////////////////////////////////////////
      $("#pricing-form").on("submit",function(k){
        k.preventDefault();
        var thisForm = this;
        var self = this;
        $.ajax({
        url:"/pricing/store",
        type:'POST',
        data:new FormData(thisForm),
        cache:false,
        contentType:false,
        processData:false,  
        beforeSend(){
          FormLoaderIni('#categoryBtn',true);
        }, 
        success:function (response) {
            console.log(response);
            FormLoaderIni('#categoryBtn',false);
               
            if (response.status == 200) {
                showAlert_popup('Successful!','success',response.message); 
            }else{
                showAlert_popup('Oh sorry','error',response.message);
            }
                
            },error:function(response){
              console.log(response);
              stop_loader();
              FormLoaderIni('#categoryBtn',false);
              showAlert_popup('Oh sorry','error','Something went wrong');
            }
        
        });
      });	
    
    
    
    
      /////////////////////////////////////////////////////////////
      /////////-----------FOR CHANGING PROGILE IMAGE----------////
      ///////////////////////////////////////////////////////////
      
      $('.profile_img').change(function(d){
        d.preventDefault();
        var $formId = '#profile-img-form';     
          $($formId).submit();       
    });
    
      /////////////////////////////////////////////////////////////
      /////////-----------FOR ADDING NEW RECEPTIONIST------///////
      ///////////////////////////////////////////////////////////
      
    
      /////////////////////////////////////////////////////////////
      // If radio button for business transfer is click/
      ////////////////////////////////////////////////////////////
      $('input[type="radio"]').click(function(e){
        var radioValue = $("input[name='r1']:checked").val();
        var $to_show = $('.to_show');
        if(radioValue == 'business') 
        {
          if(!$to_show.hasClass('show_now'))
          {
            $to_show.addClass('show_now');
            $to_show.removeClass('hide_now');
            $to_show.addClass('fade-in');
          }
        }
        else
        {
            $to_show.removeClass('show_now');
            $('#bank-modal').modal('show');
        }
    
      });
     
  
  
  $('.editCategoryBtn').on('click',function(qs)
  {
      qs.preventDefault();
      // Pace.restart();	
      var $category_id = $(this).data('id');
      var $category_name = $(this).data('name');
      $('#ModalCategory-id').attr('value',$category_id);
      $('#ModalCategory-name').attr('value',$category_name);
      $('.editCategory-modal').modal('show');
          
  });
  
  
  $('.editSubCategoryBtn').on('click',function(qs)
  {
      qs.preventDefault();
      // Pace.restart();	
      var $roomtype_id = $(this).data('id');
      var $roomtype_name = $(this).data('name');
      $('#ModalSubcategory-id').attr('value',$roomtype_id);
      $('#ModalSubcategory-name').attr('value',$roomtype_name);
      $('.editSubcategory-modal').modal('show');
          
  });
  
  $('.editProductBtn').on('click',function(qs)
  {
      qs.preventDefault();
      // Pace.restart();	
      var $bookingtype_id = $(this).data('id');
      var $bookingtype_name = $(this).data('name');
      $('#ModalProduct-id').attr('value',$bookingtype_id);
      $('#ModalProduct-name').attr('value',$bookingtype_name);
      $('.editProduct-modal').modal('show');
          
  });
  

   
    
  $('.removeCategoryBtn').on('click',function(qs)
  {
      qs.preventDefault();
      $category_id = $(this).data('id');        
      $btn = $(this);
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url:"/category/remove",
            dataType: 'json',
            method: 'get',
            data:{category_id:$category_id},
            headers: {
              'X-CSRF-Token': '{{ csrf_token() }}',
            },
            beforeSend(){
              start_loader();        
            },   
            success:function(response)
            {   
              console.log(response)       
              if(response.status==200){
                console.log(response);
                stop_loader();
                $btn.closest("tr").fadeOut('slow');
                showAlert_popup('Successful!','success',response.message); 
                
              }else{  
                stop_loader();            
                show_info_notification('error','Error Occured');
              }
            }
  
        })
        }
      })
  });
  
  
  
  
  
  $('.removeSubcategoryBtn').on('click',function(qs)
  {
    qs.preventDefault();
    $roomtype_id = $(this).data('id');        
    $btn = $(this);
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url:"/subcategory/remove",
          dataType: 'json',
          method: 'get',
          data:{roomtype_id:$roomtype_id},
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
          },
          beforeSend(){
            start_loader();        
          },   
          success:function(response)
          {   
            console.log(response)       
            if(response.status==200){
              console.log(response);
              stop_loader();
              $btn.closest("tr").fadeOut('slow');
              showAlert_popup('Successful!','success',response.message); 
            }else{  
              stop_loader();            
              show_info_notification('error','Error Occured');
            }
          }
      })
      }
    })	  
  });
  
  $('.removeProductBtn').on('click',function(qs)
  {
      qs.preventDefault();
      $bookingtype_id = $(this).data('id');        
      $btn = $(this);
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url:"/product/remove",
            dataType: 'json',
            method: 'get',
            data:{bookingtype_id:$bookingtype_id},
            headers: {
              'X-CSRF-Token': '{{ csrf_token() }}',
            },
            beforeSend(){
              start_loader();        
            },   
            success:function(response)
            {   
              console.log(response)       
              if(response.status==200){
                console.log(response);
                stop_loader();
                $btn.closest("tr").fadeOut('slow');
                showAlert_popup('Successful!','success',response.message); 
                
              }else{  
                stop_loader();            
                show_info_notification('error','Error Occured');
              }
            }
  
        })
        }
      })	  
  });
  
  $(document).delegate('#Category','change',function(qs)
  {            
      qs.preventDefault();
      $category_id = $(this).val();
      $.ajax({
          url: ''+$admin_route+'load/team',
          type: 'get',
          data:{team_category_id:$category_id},
          beforeSend(){
              start_loader();
          },
          success:function(response){
              stop_loader();
              console.log(response);
              $('#team').html(response);
              // $('#Subcategory').select2();

          },
          error:function(response){
              stop_loader();
             console.log(response);
          }            
      });   
  });

  $(document).delegate('#position_category','change',function(qs)
  {            
      qs.preventDefault();
      $position_category_id = $(this).val();
      $.ajax({
          url: ''+$admin_route+'load/position',
          type: 'get',
          data:{position_category_id:$position_category_id},
          beforeSend(){
              start_loader();
          },
          success:function(response){
              stop_loader();
              console.log(response);
              $('#position').html(response);
          },
          error:function(response){
              stop_loader();
             console.log(response);
          }            
      });   
  });



  $('#Number_of_items').on('change',function(qs)
  {            
    qs.preventDefault();
    number = $(this).val();
    $output = '';
   
    html = '<div class="col-md-6">'+
   
    '<div class="form-group"><label for="item_name">Item Name</label><input class="form-control" name="item_name"></div>'+
    '<div class="row">'+
      '<div class="form-group col-md-6"><label for="item_name">Item Price</label><input class="form-control" name="item_name"></div>'+
      '<div class="form-group col-md-6"><label for="item_name">Item Quantity</label><input class="form-control" name="item_name"></div>'+
    '</div>'+   
    '<div class="row">'+ 
      '<div class="form-group col-md-6"><label for="item_name">Item Color</label><input class="form-control" name="item_name"></div>'+
      '<div class="form-group col-md-6"><label for="item_name">Item Size</label><input class="form-control" name="item_name"></div>'+
    '</div>'+  
    '<div class="form-group"><label for="item_name">Item Description</label><textarea class="form-control" placeholder="Describe this item here"></textarea></div>'+
    '<div class="wrap-custom-file col-md-3 col-xs-6"><input type="file" name="images[]" id="images1"/><label  for="images1"><span>Image1</span><i class="icon-plus"></i></label></div>'+
    '</div>';  
    div =  $('#number_of_item_row');
    if(div != '')
    {
        div.empty();//make div empty to add a new
        for (let index = 1; index <= number; index++) 
        {
            $('#number_of_item_row').append(html);              
        }
    }        
  });

  $("#item-form").on("submit",function(k){
    k.preventDefault();
    var thisForm = this;
    $.ajax({
    url:""+$admin_route+"item/store",
    type:'POST',
    data:new FormData(thisForm),
    cache:false,
    contentType:false,
    processData:false,  
    beforeSend(){
      FormLoaderIni('#ItemBtn',true);
    }, 
    success:function (response) {
        console.log(response);
        FormLoaderIni('#ItemBtn',false);
        stop_loader();            
        if (response.status == 200) {
            showAlert_popup('Successful!','success',response.message); 
        }else{
            showAlert_popup('Oh sorry','error',response.message);
        }
            
        },error:function(response){
          console.log(response);
          stop_loader();
          FormLoaderIni('#ItemBtn',false);
          showAlert_popup('Oh sorry','error','Something went wrong');
        }
    
    });

  });
    
    $(document).on('click','a[href^="http"]',function() {
      start_loader();
    });
    

    
    
    
    
});