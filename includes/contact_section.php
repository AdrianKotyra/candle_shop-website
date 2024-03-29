<div class="section contact_section">
        <h3 class="header">Get in touch</h3>
        <div class="contact_container">
         
            
            <div class="inputs_container_contact">
                <form action="contact.php" class="form_contact" method="POST">
                    <input required type="text" name="name" placeholder="Name">
                    <input requiredtype="text" name="email"  placeholder="Email">
                    <textarea required name="message" id="" cols="30" rows="10" placeholder="MESSAGE">

                    </textarea>
                    <button name="send_message" class="button">Message</button>
                </form>
            </div>





        

            <div class="map_container">
                <div class="direction_container">
                    <span>random address</span>
                    <span>0999999999</span>
                    <span>random@yahoo.com</span>
                   
                </div>
               
                <img src="./imgs/WorldMap.svg" alt="">
            </div>



        </div>
        <?php contact_msg()?>



     
     
    


    </div>