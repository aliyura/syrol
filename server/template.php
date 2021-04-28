<?php
 header("Access-Control-Allow-Origin: *");
class Template{
    
    static function generate($receivers,$topic,$cc,$subject,$body){

        return'
           <html>
                <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <style>
                body{
                    font-family: "lucida grande", tahoma, verdana;
                    font-size:16px;
                    margin: 0;
                    padding: 0;
                }
                .content{
                    background: #fff;
                    box-shadow:  1px 1px 4px rgba(0, 0, 0, 0.21);
                    -webkit-box-shadow:  1px 1px 4px rgba(0, 0, 0, 0.21);
                    -moz-box-shadow:  1px 1px 4px rgba(0, 0, 0, 0.21);
                    -o-box-shadow:  1px 1px 4px rgba(0, 0, 0, 0.21);
                    overflow:hidden;
                    padding:10px;
                    color: #464646;
                }
                .infor-body{
                     font-size: 12px;  
                }
                </style>

                </head>
                <body>
                <div class="content infor-body">
                  <!--- subject should be here!-->
                  <h2 style="font-weight:bold;">'.$subject.'</h2>

                  <!--- subject should be here!-->
                  <p style="margin:0; padding:0">'.$body.'</p>
                </div>
                <br/><br/>
                <div class="content">
                  <strong style="margin:0; padding:0;">Best Regards,</strong>
                  <p style="margin:0; padding:0;">Syrol Technologies</p>
                </div>
                </body>
                </html>        
        ';
    }
}
?>