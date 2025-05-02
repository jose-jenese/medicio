<?php 
session_start(); 
if (!isset($_SESSION['Username'])) {
    header("Location: login.php");
    exit();
}

include("header_a.php");
?>

<section id="appointment" class="appointment section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>MAKE AN APPOINTMENT</h2>
    <p>Book your slot now</p>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">

  <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <div class="alert alert-success text-center">
    Appointment booked successfully!
  </div>
<?php endif; ?>
    <form action="forms/appointment.php" method="post" role="form">
      <div class="row">
        <div class="col-md-4 form-group">
          <input type="text" name="name" class="form-control" placeholder="Your Name" required>
        </div>
        <div class="col-md-4 form-group mt-3 mt-md-0">
          <input type="email" class="form-control" name="email" placeholder="Your Email" required>
        </div>
        <div class="col-md-4 form-group mt-3 mt-md-0">
          <input type="phone" class="form-control" name="phone" placeholder="Your Phone" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group mt-3">
          <input type="datetime-local" name="date" class="form-control" required>
      
        </div>
        <div class="col-md-4 form-group mt-3">
          <select name="department" class="form-select" required>
            <option value="">Select Department</option>
            <option value="Cardiology">Cardiology</option>
            <option value="Neurology">Neurology</option>
            <option value="Ophthalmology">Ophthalmology</option>
            <option value="Nephrology">Nephrology</option>
            <option value="Urology">Urology</option>
            <option value="Psychology">Psychology</option>
            <option value="Pneumology">Pneumology</option>
            <option value="Heptalogy">Heptalogy</option>
          </select>
        </div>
        <div class="col-md-4 form-group mt-3">
          <select name="doctor" class="form-select" required>
            <option value="">Select Doctor</option>
            <option value="Dr. Smith">Dr. Smith</option>
            <option value="Dr. Jane">Dr. Jane</option>
            <option value="Dr. Asher">Dr. Asher</option>
            <option value="Dr. Richy">Dr. Richy</option>
            <option value="Dr. Austin">Dr. Austin</option>
            <option value="Dr. George">Dr. George</option>
            <option value="Dr. Peter">Dr. Peter</option>
            <option value="Dr. John">Dr. John</option>
            <option value="Dr. Seth">Dr. Seth</option>
            <option value="Dr. Marion">Dr. Marion</option>
          </select>
        </div>
      </div>
      <div class="form-group mt-3">
        <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
      </div>
      <div class="text-center mt-4">
        <button class="btn btn-info" type="submit">Make an Appointment</button>
      </div>
    </form>
    <div class="text-center mt-4">
      <a href="my_appointment.php" class="btn btn-info">View My Appointments</a>
    </div>
  </div>
</section>

<?php 
include("footer.php"); 
?>