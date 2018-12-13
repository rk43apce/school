<?php 		
						error_reporting(E_ALL);
                        ini_set('display_errors', 1);

					$headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                    // More headers
                    $headers .= 'From: <webmaster@example.com>' . "\r\n";
					
						$messagebody='
						<body >
							<table style="width:100%">							
								<tr>
								<td><p>Rajesh</p></td>							
								</tr>
								<tr>
								<td>Kumar</td>								
								</tr>							
							</table>
						</body>';
					
					// Send email
					if(mail('rk43apce@gmail.com','SoftSanagm contact form',$messagebody,$headers)){	
					
						echo 'Your contact request have submitted successfully';	
					}
					else{


                        print_r(error_get_last());

                    echo 'Sorry! Something went wrong!';
                    }
                    
                    
					
			

?>