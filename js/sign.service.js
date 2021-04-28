
(function(){
     
    //Login Controller 
    var controller;
    var host='https://syrol.org/'
    
   app.find('input,textarea,select').on('click',function(){
        var value=Prepare(this).getValue();
        if(value==''){
             Prepare(this).removeClass('active')
        }else{
            Prepare(this).addClass('active')
        }
    });
    app.find('input,textarea,select').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value==''){
            Prepare(this).setError();
             Prepare(this).removeClass('active')
        }else{
            Prepare(this).addClass('active')
            Prepare(this).removeError();
        }
    }); 
    app.find('input[type="tel"]').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value=='' || count(value)<11 || notNumbers(value)){
            Prepare(this).setError();
        }else{
            Prepare(this).removeError();
        }
    }); 
    app.find('input[type="email"]').on('keyup',function(){
        var value=Prepare(this).getValue();
        if(value=='' || notMail(value)){
            Prepare(this).setError();
        }else{
            Prepare(this).removeError();
        }
    });
    
    app.find('$contact-send-trigger').on('click',function(){
         var inName=Prepare('$name'),
             inEmail=Prepare('$email'),
             inMobile=Prepare('$mobile'),
             inMessage=Prepare('$message'),
             name=inName.getValue(),
             email=inEmail.getValue(),
             mobile=inMobile.getValue(),
             message=inMessage.getValue(),
             controller=Prepare(this);
        
         if(name=='' || count(name)<3){
            inName.setError();
         }else{
            inName.removeError(); 
         }
         
         if(email=='' || count(email)<3){
            inEmail.setError();
         }else{
            inEmail.removeError(); 
         }
         
         if(mobile=='' || count(mobile)<11 || notNumbers(mobile) || notMail(email)){
            inMobile.setError();
         }else{
            inMobile.removeError(); 
         }
        
         if(message=='' || count(message)<3){
            inMessage.setError();
         }else{
            inMessage.removeError(); 
         }
         
    
        if(name!=='' && count(name)>=3 && email!=='' && count(email)>=3 && isMail(email) && mobile!=='' && count(mobile)>=10
        && isNumbers(mobile) && message!=='' && count(message)>=3){
            
            controller.setHtml('<img src="images/loader.gif" class="btn-loader">');
        
                var httpReq=new ayralHttpRequest('POST','server/app.sign-service.php?request=CONTACT','default',true);
                httpReq.execute(function(response){
                   if(response=='progress'){
                       controller.setHtml('<img src="images/loader.gif" class="btn-loader">');
                    }else{
                        try{
                          var result=response.target.responseText;
                          if(result.match(/Success/)){
                              document.location.href="info?type=contact"
                          }
                          else{
                            print(result)
                            controller.setHtml('Try Again');
                            alert("Oops! Unable to send your Message!");
                          }
                        }
                        catch(error){
                          controller.setHtml('Try Again');
                        }
                     
                    }
                });
        }
    });

    app.find('$assignment-submit-trigger').on('click',function(){
         var inRgeId=Prepare('$regid'),
             inTitle=Prepare('$title'),
             inAttachment=Prepare('$attachement'), 
             inContent=Prepare('$content'),
             inMessage=Prepare('$message'),
             regid=inRgeId.getValue(),
             title=inTitle.getValue(),
             attachement=inAttachment.getValue(),
             content=inContent.getValue(), 
             message=inMessage.getValue(),
             controller=Prepare(this);
        
         if(title=='' || count(title)<3){
            inTitle.setError();
         }else{
            inTitle.removeError(); 
         }
         
         if(content=='' || count(content)<3){
            inContent.setError();
         }else{
            inContent.removeError(); 
         }
        
         if(message=='' || count(message)<3){
            inMessage.setError();
         }else{
            inMessage.removeError(); 
         }
         
    
        if(title!=='' && count(title)>=3 && content!=='' && count(content)>=3 && message!=='' && count(message)>=3){
            
            controller.setHtml('<img src="images/loader.gif" class="btn-loader">');
        
                var httpReq=new ayralHttpRequest('POST','server/app.sign-service.php?request=ASSIGNMENT','default',true);
                httpReq.execute(function(response){
                   if(response=='progress'){
                       controller.setHtml('<img src="images/loader.gif" class="btn-loader">');
                    }else{
                        try{
                          var result=response.target.responseText;
                          print(result);
                            
                          if(result.match(/Success/)){
                              document.location.href="info?type=assignment"
                          }
                          else  if(result.match(/Invalid/)){
                             controller.setHtml('Try Again');
                              errorAlert("Oops! Invalid Registration Number");
                          }
                          else{
                            controller.setHtml('Try Again');
                            errorAlert("Oops! Unable to submit your Assignment!");
                          }
                        }
                        catch(error){
                          controller.setHtml('Try Again');
                        }
                    }
                });
        }
    });


    app.find('#apply-career-trigger').on('click',function(){
        var inName=Prepare('$name'),
            inEmail=Prepare('$email'),
            inMobile=Prepare('$mobile'),
            inStack=Prepare('$stack'),
            inNote=Prepare('$note'),
            name=inName.getValue(),
            email=inEmail.getValue(),
            mobile=inMobile.getValue(),
            stack=inStack.getValue(),
            note=inNote.getValue(),
            cid=Prepare(this).getAttribute('cid'),
            mode=Prepare(this).getAttribute('mode'),
            req=Prepare(this).getAttribute('req'),
            controller=Prepare(this);
        

                if(name=='' || count(name)<3){
                   inName.setError();
                }else{
                   inName.removeError(); 
                }
                
                if(email=='' || count(email)<3){
                   inEmail.setError();
                }else{
                   inEmail.removeError(); 
                }
                
                if(mobile=='' || count(mobile)<11 || notNumbers(mobile) || notMail(email)){
                   inMobile.setError();
                }else{
                   inMobile.removeError(); 
                }
               
                if(stack=='' || count(stack)<3){
                    inStack.setError();
                 }else{
                    inStack.removeError(); 
                 }
                
                if(note=='' || count(note)<3){
                   inNote.setError();
                }else{
                   inNote.removeError(); 
                }
                
           
               if(name!=='' && count(name)>=3 && email!=='' && count(email)>=3 && isMail(email) && mobile!=='' && count(mobile)>=10
               && isNumbers(mobile)  &&stack!='' && count(stack)>3 && note!=='' && count(note)>=3){
                   
                  if(mode=='NONE'){
                      $('#openModel').click()
                  }
                  else{
                          
                   controller.setHtml('<img src="images/loader.gif" class="btn-loader">');
                       var httpReq=new ayralHttpRequest('POST','server/app.sign-service.php?request=CAREER&cid='+cid+'&mode='+mode+'&req='+req,'default',true);
                       httpReq.execute(function(response){
                          if(response=='progress'){
                              controller.setHtml('<img src="images/loader.gif" class="btn-loader">');
                           }else{
                               try{
                                 var result=response.target.responseText;
                                   print(result)
                                 if(result.match(/success:/) || result.match(/failed:/)){
                                     var address =result.replace('success:','')
                                         address =address.replace('failed:','')
                                         address=address.trim();
         
                                     if(address.match(/https:/)){
                                        document.location.href=address;
                                     }else{
                                       print(result)
                                       controller.setHtml('Try Again');
                                       alert("Oops! Something Went Wrong!");  
                                     }
                                 }
                                 else if(result.match(/:success/)){
                                      document.location.href='info?type=career&res=s200';
                                 }
                                 else{
                                     print(result)
                                   controller.setHtml('Try Again');
                                   alert("Oops! Something Went Wrong!");
                                 }
                               }
                               catch(error){
                                      print(error)
                                  controller.setHtml('Try Again');
                                 alert("Oops! Something Went Wrong!");
                               }
                            
                           }
                       });
                       
                  }
               }
        
   });

 
   
   app.find('$hire-engineer-trigger').on('click',function(){
    var inName=Prepare('$name'),
        inEmail=Prepare('$email'),
        inMobile=Prepare('$mobile'),
        inType=Prepare('$type'),
        inStack=Prepare('$stack'),
        inNote=Prepare('$note'),
        name=inName.getValue(),
        email=inEmail.getValue(),
        mobile=inMobile.getValue(),
        type=inType.getValue(),
        stack=inStack.getValue(),
        note=inNote.getValue(),
        controller=Prepare(this);

    if(name=='' || count(name)<3){
       inName.setError();
    }else{
       inName.removeError(); 
    }
    
    if(email=='' || count(email)<3){
       inEmail.setError();
    }else{
       inEmail.removeError(); 
    }
    
    if(mobile=='' || count(mobile)<11 || notNumbers(mobile) || notMail(email)){
       inMobile.setError();
    }else{
       inMobile.removeError(); 
    }

    if(type=='' || count(type)<3){
        inType.setError();
     }else{
        inType.removeError(); 
     }
   
    if(stack=='' || count(stack)<3){
        inStack.setError();
     }else{
        inStack.removeError(); 
     }

    if(note=='' || count(note)<3){
       inNote.setError();
    }else{
       inNote.removeError(); 
    }
    

   if(name!=='' && count(name)>=3 && email!=='' && count(email)>=3 && isMail(email) && mobile!=='' && count(mobile)>=10
   && isNumbers(mobile)  &&stack!='' && count(stack)>3   &&type!='' && count(type)>3  && note!=='' && count(note)>=3){
       
       controller.setHtml('<img src="images/loader.gif" class="btn-loader">');
           var httpReq=new ayralHttpRequest('POST','server/app.sign-service.php?request=HIRE','default',true);
           httpReq.execute(function(response){
              if(response=='progress'){
                  controller.setHtml('<img src="images/loader.gif" class="btn-loader">');
               }else{
                   try{
                     var result=response.target.responseText;
                     if(result.match(/Success/)){
                         document.location.href="info?type=hire"
                     }
                     else{
                        print(result)
                       controller.setHtml('Try Again');
                       alert("Oops! Something Went Wrong!");
                     }
                   }
                   catch(error){
                     controller.setHtml('Try Again');
                   }
                
               }
           });
      }
  });
    
    
  app.find('$send-message-trigger').on('click',function(){
         var inReceiver=Prepare('$receiver'),
             inSubject=Prepare('$subject'),
             inCC=Prepare('$cc'),
             inBody=Prepare('$body'),
             receiver=inReceiver.getValue(),
             subject=inSubject.getValue(),
             cc=inCC.getValue(),
             body=inBody.getValue(),
             controller=Prepare(this);
    
         if(receiver=='' || count(receiver)<3){
            inReceiver.setError();
         }else{
            inReceiver.removeError(); 
         }
         if(subject=='' || count(subject)<3){
            inSubject.setError();
         }else{
            inSubject.removeError(); 
         }
         if(body=='' || count(body)<3){
            inBody.setError();
         }else{
            inBody.removeError(); 
         }
         
        if(receiver!=='' && count(receiver)>=3 && subject!=='' && count(subject)>=3 && body!=='' && count(body)>=3){
            
            controller.setHtml('<img src="../images/loader.gif" class="btn-loader">');
        
                var httpReq=new ayralHttpRequest('POST','server/app.sign-service.php?request=MESSAGE','default',true);
                httpReq.execute(function(response){
                   if(response=='progress'){
                       controller.setHtml('<img src="../images/loader.gif" class="btn-loader">');
                    }else{
                        try{
                          var result=response.target.responseText;
                          if(result.match(/Success/)){
                              document.location.href="info?type=message"
                          }
                          else if(result.match(/AUC/)){
                             print(result)
                             controller.setHtml('Try Again');
                             alert(" Message Failed! Unable to send attachment!");
                          }
                          else{
                            print(result)
                            controller.setHtml('Try Again');
                            alert("Oops! Something Went Wrong!");
                          }
                        }
                        catch(error){
                          controller.setHtml('Try Again');
                        }
                     
                    }
                });
        }
        else{
            alert('Please fill the form Correctly')
        }
    });
    
    app.find('$login-trigger').on('click',function(){
         var inUsername=Prepare('$username'),
             inPassword=Prepare('$password'),
             username=inUsername.getValue(),
             password=inPassword.getValue(),
             controller=Prepare(this);
    
         if(username=='' || count(username)<3 || !username.match(/@syrol.org$/)){
            inUsername.setError();
         }else{
            inUsername.removeError(); 
         }
         if(password=='' || count(password)<6){
            inPassword.setError();
         }else{
            inPassword.removeError(); 
         }
        
         if(username!=='' && count(username)>=3 && username.match(/@syrol.org$/) && password!=='' && count(password)>=5){
            controller.setHtml('<img src="images/loader.gif" class="btn-loader">');
        
                var httpReq=new ayralHttpRequest('POST','server/app.sign-service.php?request=LOGIN&un='+username+'&pw='+password,'default',true);
                httpReq.execute(function(response){
                   if(response=='progress'){
                       controller.setHtml('<img src="images/loader.gif" class="btn-loader">');
                    }else{
                        try{
                          var result=response.target.responseText;
                          if(result.match(/Success/)){
                              document.location.href=hist+"admin"
                          }
                          else{
                            print(result)
                            controller.setHtml('Try Again');
                            alert("Unable to Authenticate you as a Syrol Staff!");
                          }
                        }
                        catch(error){
                          controller.setHtml('Try Again');
                        }
                     
                    }
                });
        }
        
    });
})();