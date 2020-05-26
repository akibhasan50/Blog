<?php include "inc/header.php" ;?>

    <div class="page-wrapper single">
      <!--content////-->
      <div class="content clearfix">
        <!--main content////-->
        <div class="main-content contact">
          <div class="single">
            <div class="post-preview">
              <div class="footer-section contact-form">
                <h2>contract us</h2>

                <br/>
                <?php 
                 if($_SERVER['REQUEST_METHOD'] =="POST"){
                    $name= $fm->validate($_POST['name']);
                    $email= $fm->validate($_POST['email']);
                    $body= $fm->validate($_POST['body']);

                    if($name == "" || $email == "" || $body == "" ){
                     echo "<span  style='color:red;font-size:18px;'>Field must not be empty!!! </span>";

                    }else{
                      $sql= "INSERT INTO db_contact (name,email,body) VALUE('$name','$email','$body')";
                      $data = $db->conn->prepare($sql);
                      $data->execute();


                       if ($data  == true) {
                            echo "<span style='color:green;font-size:18px;'>Message sent Successfully.
                            </span>";
                        }else {
                            echo "<span style='color:red;font-size:18px;'>Message Not sent !</span>";
                        }
                    }
                  }
                
                ?>
                <form action="" method="POST">
                  <table>
                    <tr>
                      <td>Your Name:</td>
                      <td>
                        <input
                          type="text"
                          class="text-input contact-input"
                          name="name"
                          placeholder="Enter your name"
                        />
                      </td>
                    </tr>
                  

                    <tr>
                      <td>Your Email Address:</td>
                      <td>
                        <input
                          type="email"
                          name="email"
                          class="text-input contact-input"
                          placeholder="Enter Email Address"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td>Your Message:</td>
                      <td>
                        <textarea
                          class="text-input contact-input"
                          name="body"
                        ></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <button type="submit" class="btn btn-big contract-btn">
                          <i class="fas fa-envelope"></i>
                          Send
                        </button>
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>

 <?php include "inc/single-side.php" ;?>
 <?php include "inc/footer.php" ;?>              