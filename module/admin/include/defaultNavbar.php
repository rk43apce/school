<nav id="sidebar">
	<div class="sidebar-header">
		<a href="./dashboard.php">
			<h3>Success Point</h3>
		</a>
	</div>

	<ul class="list-unstyled components">
		<p>Welcome Admin!</p>

		<li class="active">
			<a href="./new-admission.php">New Admission</a>
		</li>  

		<li >
			<a href="#StudentSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Student</a>
			<ul class="collapse list-unstyled" id="StudentSubmenu">
				<li>
					<a href="./manageStudent.php">Student Dashboard</a>
				</li> 

			</ul>
		</li>
		<li>
			<a href="#TeacherSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Faculty</a>
			<ul class="collapse list-unstyled" id="TeacherSubmenu">
				<li>
					<a href="./manageFaculty.php">Faculty Dashboard</a>
				</li>

			</ul>
		</li>
		<li>
			<a href="#CourseSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Course</a>
			<ul class="collapse list-unstyled" id="CourseSubmenu">
				<!-- <li>
					<a href="./manageCourse.php">Add Class</a>
				</li>  -->
				<li>
					<a href="./manageCourse.php">Manage Course</a>
				</li> 
				             
			</ul>
		</li>
		<!-- <li>
			<a href="#FeesDetails" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Fees Details</a>
			<ul class="collapse list-unstyled" id="FeesDetails">
				
				<li>
					<a href="./makePayment.php">Make Payment</a>
				</li> 
								<li>
					<a href="./getFeeStatus.php">Get Fee Status</a>
				</li> 
								<li>
					<a href="./checkRep.php">Check Receipt</a>
				</li>               
			</ul>
		</li>
	
		<li>
			<a href="#paymentSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Payment</a>
			<ul class="collapse list-unstyled" id="paymentSubmenu">
				<li>
					<a href="#">Page 1</a>
				</li>
				<li>
					<a href="#">Page 2</a>
				</li>
				<li>
					<a href="#">Page 3</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="report.php">Report</a>
		</li>  -->      
	</ul>

	<ul class="list-unstyled CTAs">
		<li> 
			<a href="./dashboard.php" class="download">Back to Dashbaord</a>
		</li>      
	</ul>
</nav>